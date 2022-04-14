<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\Request;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        /** @var User $user */
        $user = User::query()->email($email)->first();
        if(!$user){
            return response()->error('auth.not-registered');
        }

        if (!(Auth::attempt(['email' => $email, 'password' => $password]))) {
            return response()->error('auth.not-login');
        }

        $data = $user->login();
        $data["user"] = new UserResource($user);


        return response()->success($data);
    }

    public function register(RegisterRequest $request)
    {
        /** @var User $user */
        $user = new User();
        $user->fill([
            'user_name'     => $request->input('user_name'),
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'email'         => $request->input('email'),
        ]);
        $user->password = $request->input('password');
        $user->save();

        /** @var User $user */
        $user = User::query()->find($user->id);
        if (!$user) {
            return response()->error('auth.not-registered');
        }

        $data = $user->login();
        $data["user"] = new UserResource($user);

        return response()->success($data);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if (! $user) {
            return response()->error('auth.not-login');
        }

        $user->token()->delete();
        auth()->logout();

        return response()->message('auth.logout');
    }
}
