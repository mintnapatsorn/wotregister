<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Socialite;

//add Auth for logout 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\Session;

use Illuminate\Http\Request;

use Carbon\Carbon;



class OpenDistroAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('opendistro')->redirect();
    }

    public function handleProviderCallback()
    {

        $user = Socialite::driver('opendistro')->user();
        if($user->email=='default@meca.in.th'){
            return view('alertlogin');
        }
        $account = DB::table('accounts')->where('email',$user->email)->get();

        session(['token' => $user->token]);
        session(['email'=>$user->email]);
        session(['preferred_username'=>$user->preferred_username]);
        session(['roles'=>$user->roles]);
        // session(['groups'=>$user->groups]);

        if(count($account)==0)
        {
            DB::table('accounts')->insert(['email' => $user->email,'optout' => 0]);
            mail(session('email'), "WoT Cloud :) ", "Welcome ".session('preferred_username')." to WoT Cloud");

            return redirect('login/getfirstpermission');
        }

        // $usergetstatus = $user->groups;
        $usergetstatus = $user->roles;

        //login 3 status
        foreach ($usergetstatus as $usergetstatus) {
            if($usergetstatus==env('NAME_SPACE')){
                return redirect('/adminmanagement');
            }
        } 
        return redirect('/');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect(env('OPENDISTRO_LOGOUT'));
    }

    public function loaddatatohome(){

        $userid = DB::table('accounts')->where('email',session('email'))->value('id');

        // $userid = 6;

        $alluserdomain = DB::table('domains')->where('account_id',$userid)->get();

        $sumuserdomain = count($alluserdomain);
        
        return view('welcome',['alluserdomain' => $alluserdomain])->with('sumuserdomain',$sumuserdomain);

    }

    public function dataplatformtoken(){

        $userid = DB::table('accounts')->where('email',session('email'))->value('id');
        
        $alldtptoken = DB::table('dataplatform_token')->where('account_id',$userid)->get();
        
        return view('opendistro',['alldtptoken' => $alldtptoken]);

    }

    public function curl(Request $request){

        $userid = DB::table('accounts')->where('email',session('email'))->value('id');

        $username=$request->get('username');
        $password=$request->get('password');
        $tokenname=$request->get('tokenname');
        $revoke=0;

        $contenttype = "application/x-www-form-urlencoded";
        $granttype="password";
        $clientid="opendistro-bot";
        $clientsecret="12ac3f14-0e8f-4666-bd9c-ebf34462113b";

        //generate time stamp
        $timestamp = Carbon::now()->timestamp;

        //curl to get token
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://sso.meca.in.th/auth/realms/dataplatform/protocol/openid-connect/token');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_USERPWD, "bot:botbot");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
            'Content-Type'=>$contenttype,
            'username'=>$username,
            'password'=>$password,
            'grant_type'=>$granttype,
            'client_id'=>$clientid,
            'client_secret'=>$clientsecret
        )));

        $result = curl_exec($curl);

        $result1 = json_decode($result); //json encode to data object 

        if(array_key_exists('error_description', $result1)){
            $result1 = $result1->error_description;

            session(['result'=>$result]);
            session(['result1'=>$result1]);

            // return view('testshow');
            $notification = $arrayName = array('message' => 'Invalid username or password. Please try again.' , 'alert-type'=>'error');
            return back()->with($notification);
        }
        else{
            $result = $result1->access_token;

            $explode = explode(".", $result);

            $result1 = $explode[0].".".$explode[1];

            //decode token for expire date of token
            $decodeexpire = base64_decode($explode[1]);
            $decodeexpire = json_decode($decodeexpire);
            $decodeexpire = $decodeexpire->exp;

            // session(['decodeexpire'=>$decodeexpire->exp]);

            // session(['result1'=>$result1]);
            

            DB::table('dataplatform_token')->insert(['account_id'=>$userid,'dtp_token'=>$result1,'timestamp'=>$timestamp,'expire_date'=>$decodeexpire,'token_name'=>$tokenname,'action'=>$revoke]);

            $notification = $arrayName = array('message' => $result , 'alert-type'=>'info');
            return back()->with($notification);

            // return back();
        }
    }

    public function tokendelete($requestId){

        DB::table('dataplatform_token')->where('id',$requestId)->delete();
  
        return back();
    }

    public function revokedtptoken($requestId){

        DB::table('dataplatform_token')->where('id',$requestId)->update(['action'=>1]);
  
        return back();
    }
}
