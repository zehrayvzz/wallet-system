<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AssignPromotionRequest;
use App\Http\Requests\Api\PromotionCodeRequest;
use App\Http\Resources\PromotionCode as PromotionCodeResource;
use App\Models\PromotionCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PromotionCodeContoller extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return response()->success(PromotionCodeResource::collection($user->promotionCodes));
    }

    public function store(PromotionCodeRequest $request)
    {
        $model = new PromotionCode();
        $model->fill($request->only(['start_date', 'end_date', 'amount', 'quota']));
        $model->code = strtoupper(Str::random(12));
        $model->save();

        return response()->success(new PromotionCodeResource($model));
    }

    public function show(Request $request, int $id)
    {
        /** @var User $user */
        $user = $request->user();

        /** @var PromotionCode $model */
        $model = $user->promotionCodes()->find($id);
        if(!$model){
            return response()->error('user.code.not-found');
        }

        return response()->success(new PromotionCodeResource($model));
    }

    public function assignPromotion(AssignPromotionRequest $request)
    {
        /** @var User $user */
        $user = $request->user();
        $code = $request->input('code');
        $promotionCode = PromotionCode::query()->withCount('users')->where('code', $code)->first();
        if (!$promotionCode){
            return response()->error('user.code.invalid');
        }
        if ($promotionCode->users_count >= $promotionCode->quota){
            return response()->error('user.code.limit-full');
        }
        if (! $user->wallet()->exists()){
            $user->wallet()->create(['balance' => 0]);
        }

        $user->promotionCodes()->attach($promotionCode);
        $userBalance = $user->wallet->balance;
        $user->wallet()->update(['balance' => $userBalance + $promotionCode->amount]);

        return response()->json(['success' => true]);
    }
}
