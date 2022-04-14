<?php

namespace App\Http\Middleware;

use App\Models\Token as ModelsToken;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class Token
{
    /**
     * @var Guard
     */
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $userId = ModelsToken::query()->where("token", $token)->first()?->user_id;

        if ($userId) {
            $this->auth->onceUsingId($userId);
        }

        return $next($request);
    }
}
