<?php

namespace App\Http\Middleware;

use Closure;

class GuestOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (\App\Http\Controllers\UserController::isLoggedIn()) {
            return redirect()->back();
        }

        return $next($request);
    }
}
