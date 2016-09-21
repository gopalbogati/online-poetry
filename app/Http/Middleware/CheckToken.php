<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckToken
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $authToken = $request->get('auth_token');
        if (empty($authToken)) {
            return response(['message' => 'you need an auth token'], 403);
        }
        $user = User::withToken($authToken)->first();
        if (empty($user)) {
            return response(['message' => 'you key does not match'], 401);
        }
        //check present user
        Auth::login($user);

        return $next($request);
    }
}
