<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;

use Socialite;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }





    //Start Facebook Login
    /**
    * Redirect the user to the Facebook authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    /**
    * Obtain the user information from Facebook.
    *
    * @return void
    */
    public function handleProviderFacebookCallback()
    {
        

        $user = Socialite::driver('facebook')->user();

        //$email = DB::select('accounts')->where('email','=',$user->email)->get();
        //$accountNotExist = DB::table('accounts')->where('email',$user->email)->get();//->doesntExist(); //เช็คว่ามีอเมลหรือไม่     

        $account = DB::table('accounts')->where('email',$user->email)->get();  
        if(count($account)==0)
        {
            DB::table('accounts')->insert(['email' => $user->email]);
        }
        

        session(['token' => $user->token]);
        session(['email'=>$user->email]);
        //$facebookname = session(['name'=>$user->name]);

        //Auth::login($authuser, true);
        return redirect('/');// Redirect to a secure page
        //return view('welcome')->with('facebookname',$facebookname);
    }

    public function getLogout(){
        $request->session()->flush();
        return redirect('welcome');
    }

}
