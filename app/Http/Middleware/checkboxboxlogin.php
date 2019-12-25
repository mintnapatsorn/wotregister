<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkboxboxlogin
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
            $account = DB::table('accounts')->where('email',session('email'))->get();       

            if(count($account)==0)
            {
                DB::table('accounts')->insert(['email' => session('email'),'optout' => 0]);
                mail(session('email'), "WoT Cloud :) ", "Welcome ".session('preferred_username')." to WoT Cloud");

                return redirect('login/getfirstpermission');
            }
            return $next($request);
        }
        
        /**
         * Otherwise, redirect him to current socialite driver's authorization page.
         */
        return redirect('/login/boxbox')->with(session('email'));
    }
}
