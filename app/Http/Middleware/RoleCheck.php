<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next, $role, $permission)
    {
        if (Auth::guest()) {
            return redirect(url('/login'));
        }

        if (!$request->user()->hasRole($role)) {
            abort(403);
        }

        if (!$request->user()->can($permission)) {
            abort(403);
        }

        return $next($request);
    }


}
