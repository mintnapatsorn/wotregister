<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Socialite;

//add Auth for logout 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\Session;

use Illuminate\Http\Request;


class BoxBoxAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('boxbox')->redirect();
    }

    public function handleProviderCallback()
    {

        $user = Socialite::driver('boxbox')->user();
        $account = DB::table('accounts')->where('email',$user->email)->get();

        session(['token' => $user->token]);
        session(['email'=>$user->email]);
        session(['preferred_username'=>$user->preferred_username]);
        session(['groups'=>$user->groups]);


        //Send Email to User for logged in to WoT System 
        //mail(session('email'), "WoT Cloud :) ", "Welcome ".session('name')." to WoT Cloud");
        

        if(count($account)==0)
        {
            DB::table('accounts')->insert(['email' => $user->email,'optout' => 0]);
            mail(session('email'), "WoT Cloud :) ", "Welcome ".session('preferred_username')." to WoT Cloud");

            return redirect('login/getfirstpermission');
        }

        $usergetstatus = $user->groups;

        //login 3 status
        foreach ($usergetstatus as $usergetstatus) {
            if($usergetstatus==env('NAME_SPACE')){
                return redirect('/adminmanagement');
            }
        } 
        return redirect('/');
    }

    public function getLogout(Request $request){
        $request->session()->flush();
        //return redirect('https://sso.box-box.space/auth/realms/mecas/protocol/openid-connect/logout?redirect_uri=http%3A%2F%2Flocalhost%3A8000');
        return redirect(env('AUTH_LOGOUT_DIRECT_URL'));
    }

    //method for get permission default for first login 
    public function userpermissiondefault(){
            //Add data to user_permission for keep permission data
            $userid = DB::table('accounts')->where('email',session('email'))->value('id');
            DB::table('user_permission')->insert(['account_id'=>$userid,'username'=>session('preferred_username'),'total_permission'=>100,'permission_used'=>0,'total'=>100]);  

            $usergetstatus = session('groups');
            //login 3 status
            foreach ($usergetstatus as $usergetstatus) {
                if($usergetstatus==env('NAME_SPACE')){
                    return redirect('/adminmanagement');
                }
            } 
            return redirect('/');
    }


    //load data to home page after login
    public function loaddatatohome(){

        $userid = DB::table('accounts')->where('email',session('email'))->value('id');

        // $userid = 6;

        $alluserdomain = DB::table('domains')->where('account_id',$userid)->get();

        $sumuserdomain = count($alluserdomain);
        
        return view('welcome',['alluserdomain' => $alluserdomain])->with('sumuserdomain',$sumuserdomain);

    }


    //load data to home page after login
    public function mydomain(){

        $userid = DB::table('accounts')->where('email',session('email'))->value('id');

        $data = DB::table('user_permission')->where('id',$userid)->value('total_permission');
        
        $alluserdomain = DB::table('domains')->where('account_id',$userid)->get();

        $sumuserdomain = count($alluserdomain);

        // $percent =10;
        // $percent = ($sumuserdomain*100)/$data;
        // $percent = $percent*100;
        
        return view('mydomain',['alluserdomain' => $alluserdomain]);//->with('percent',$percent);

    }

    //delete domain and return quota
    public function deletedomain($requestId){
        $userid = DB::table('accounts')->where('email',session('email'))->value('id');

        $returnpermission = DB::table('user_permission')->where('account_id',$userid)->value('total');
        $returnpermission+=1;
        DB::table('user_permission')->where('account_id',$userid)->update(['total'=>$returnpermission]);  
        $oldpermissionused = DB::table('user_permission')->where('account_id',$userid)->value('permission_used');
        $oldpermissionused-=1;
        DB::table('user_permission')->where('account_id',$userid)->update(['permission_used'=>$oldpermissionused]);


        DB::table('domains')->where('id',$requestId)->delete();

  
        return back();
    }

}
