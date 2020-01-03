<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Socialite;

//add Auth for logout 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\Session;

use Illuminate\Http\Request;


use App\relayserver_list;

use App\mydomain;


class BoxBoxAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('boxbox')->redirect();
    }

    public function handleProviderCallback()
    {

        $user = Socialite::driver('boxbox')->user();
        if($user->email=='default@meca.in.th'){
            return view('alertlogin');
        }
        $account = DB::table('accounts')->where('email',$user->email)->get();

        session(['token' => $user->token]);
        session(['email'=>$user->email]);
        session(['preferred_username'=>$user->preferred_username]);
        session(['roles'=>$user->roles]);


        //Send Email to User for logged in to WoT System 
        //mail(session('email'), "WoT Cloud :) ", "Welcome ".session('name')." to WoT Cloud");
        

        if(count($account)==0)
        {
            DB::table('accounts')->insert(['email' => $user->email,'optout' => 0]);
            mail(session('email'), "WoT Cloud :) ", "Welcome ".session('preferred_username')." to WoT Cloud");

            return redirect('login/getfirstpermission');
        }

        $usergetstatus = $user->roles;

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

        $interserverlist = relayserver_list::all();

        // $percent =10;
        // $percent = ($sumuserdomain*100)/$data;
        // $percent = $percent*100;

        
        return view('mydomain',['alluserdomain' => $alluserdomain,'interserverlist' => $interserverlist]);//->with('percent',$percent);
        // return view('testajaxnew',['alluserdomain' => $alluserdomain,'interserverlist' => $interserverlist]);//->with('percent',$percent);


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

     public function renewreclamtoken($requestId){

        //generate uuid v4
        $uuidBin = random_bytes(16);
        $uuidBin &= "\xFF\xFF\xFF\xFF\xFF\xFF\x0F\xFF\x3F\xFF\xFF\xFF\xFF\xFF\xFF\xFF";
        $uuidBin |= "\x00\x00\x00\x00\x00\x00\x40\x00\x80\x00\x00\x00\x00\x00\x00\x00";
        $uuidHex = bin2hex($uuidBin); //result of uuid generate token

        $arruuid = str_split($uuidHex);
        $generatetoken = $arruuid[0].$arruuid[1].$arruuid[2].$arruuid[3].$arruuid[4].$arruuid[5].$arruuid[6].$arruuid[7]."-".$arruuid[8].$arruuid[9].$arruuid[10].$arruuid[11]."-".$arruuid[12].$arruuid[13].$arruuid[14].$arruuid[15]."-".$arruuid[16].$arruuid[17].$arruuid[18].$arruuid[19]."-".$arruuid[20].$arruuid[21].$arruuid[22].$arruuid[23].$arruuid[24].$arruuid[25].$arruuid[26].$arruuid[27].$arruuid[28].$arruuid[29].$arruuid[30].$arruuid[31];


        DB::table('domains')->where('id',$requestId)->update(['reclamation_token'=>$generatetoken]);

        $notification = array('message' => $requestId , 'alert-type'=>'error');
        return back()->with($notification);

    }

    public function renewreclamtest(Request $request){

        $userid = DB::table('accounts')->where('email',session('email'))->value('id');

        $domain=$request->get('domain');

        $uuidBin = random_bytes(16);
        $uuidBin &= "\xFF\xFF\xFF\xFF\xFF\xFF\x0F\xFF\x3F\xFF\xFF\xFF\xFF\xFF\xFF\xFF";
        $uuidBin |= "\x00\x00\x00\x00\x00\x00\x40\x00\x80\x00\x00\x00\x00\x00\x00\x00";
        $uuidHex = bin2hex($uuidBin); //result of uuid generate token

        $arruuid = str_split($uuidHex);
        $generatetoken = $arruuid[0].$arruuid[1].$arruuid[2].$arruuid[3].$arruuid[4].$arruuid[5].$arruuid[6].$arruuid[7]."-".$arruuid[8].$arruuid[9].$arruuid[10].$arruuid[11]."-".$arruuid[12].$arruuid[13].$arruuid[14].$arruuid[15]."-".$arruuid[16].$arruuid[17].$arruuid[18].$arruuid[19]."-".$arruuid[20].$arruuid[21].$arruuid[22].$arruuid[23].$arruuid[24].$arruuid[25].$arruuid[26].$arruuid[27].$arruuid[28].$arruuid[29].$arruuid[30].$arruuid[31];


       $useridindomain = DB::table('domains')->where('name',$domain)->value('account_id');

       if($userid == $useridindomain){
            DB::table('domains')->where('name',$domain)->update(['reclamation_token'=>$generatetoken]);
            return response()->json([
                'token' => $generatetoken,
                'domain' => $domain
            ]);
       }
        

    }


}
