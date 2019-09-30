<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkmecaslogin
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /**
         * If user has signed in yet redirect him to somewhere.
         */
        if (session('token')) {
            return $next($request);
        }
        
        /**
         * Otherwise, redirect him to current socialite driver's authorization page.
         */
        return redirect('/login/mecas')->with(session('email'));
    }
}
