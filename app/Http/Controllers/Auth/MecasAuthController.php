<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Socialite;

//add Auth for logout 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\Session;

use Illuminate\Http\Request;


class MecasAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('mecas')->redirect();
    }

    public function handleProviderCallback()
    {

        $user = Socialite::driver('mecas')->user();
        $account = DB::table('accounts')->where('email',$user->email)->get();  
        if(count($account)==0)
        {
            DB::table('accounts')->insert(['email' => $user->email]);


            //Add data to user_permission for keep permission data
            $userid = DB::table('accounts')->where('email',session('email'))->value('id');
            DB::table('user_permission')->insert(['user_id'=>$userid,'userallpermission'=>2]);
        }

        session(['token' => $user->token]);
        session(['email'=>$user->email]);
        session(['name'=>$user->name]);

        $usergetstatus = $user->groups;

        //login 3 status
        if(count($usergetstatus)==3){
            if($usergetstatus[0]=='/namespaces/ino'){
                if($usergetstatus[1]=='/wot/user'){
                    if($usergetstatus[2]=='/wot/administrator'){
                        return redirect('/statuslist');
                    }
                }
            }
            if($usergetstatus[1]=='/namespaces/ino'){
                if($usergetstatus[2]=='/wot/user'){
                    if($usergetstatus[0]=='/wot/administrator'){
                        return redirect('/statuslist');
                    }
                }
            }
            if($usergetstatus[2]=='/namespaces/ino'){
                if($usergetstatus[0]=='/wot/user'){
                    if($usergetstatus[1]=='/wot/administrator'){
                        return redirect('/statuslist');
                    }
                }
            }
        }

        //Login 2 status
        if(count($usergetstatus)==2){
            if($usergetstatus[0]=='/namespaces/ino'){
                if($usergetstatus[1]=='/wot/user'){
                    return redirect('/statustwolistwo');
                }
            }
            if($usergetstatus[1]=='/namespaces/ino'){
                if($usergetstatus[0]=='/wot/user'){
                    return redirect('/statustwolistwo');
                }
            }
            if($usergetstatus[0]=='/namespaces/ino'){
                if($usergetstatus[1]=='/wot/administrator'){
                    return redirect('/statustwolisthree');
                }
            }
            if($usergetstatus[1]=='/namespaces/ino'){
                if($usergetstatus[0]=='/wot/administrator'){
                    return redirect('/statustwolisthree');
                }
            }


            if($usergetstatus[0]=='/wot/administrator'){
                if($usergetstatus[1]=='/wot/user'){
                    return redirect('/statustwolistone');
                }
            }
            if($usergetstatus[1]=='/wot/administrator'){
                if($usergetstatus[0]=='/wot/user'){
                    return redirect('/statustwolistone');   
                }
            }
        }

        //Logint 1 status
        if(count($usergetstatus)==1){
            if($usergetstatus[0]=='/namespaces/ino'){
                return redirect('/news');
            }
            else if($usergetstatus[0]=='/wot/administrator'){
                return redirect('/adminmanagement');
            }
            else if($usergetstatus[0]=='/wot/user'){
                return redirect('/');   
            }
        }

        // foreach ($usergetstatus as $usergetstatus) {
        //     if($usergetstatus=='/namespaces/ino'){
        //         // if($usergetstatus=='/wot/user'){
        //         //     if($usergetstatus=='/wot/administrator'){
        //         //         return redirect('/statuslist');
        //         //     }
        //         // }
        //         return redirect('/statuslist');
        //     }
            // else{
            //     return redirect('/');
            // }
            //}

        // if($usergetstatus='/namespaces/ino'){

        // }else{
            // return redirect('/');
        //}
        
        //select user domain get
        // $idget = DB::table('accounts')->where('id',session('email'))->get();
        // $domainget = DB::table('domains')->where('name',$idget)->get();
        // if(count($domainget)==0){
        //     $domainget = "Empty Domain";
        //     $countdomain = 0;
        // }
        // else{
        //     $countdomain = count($domainget);
        // }
        
        // return redirect('/');
        
    }

    public function getLogout(Request $request){
        $request->session()->flush();
        return redirect('https://sso.mecas.space/auth/realms/mecas/protocol/openid-connect/logout?redirect_uri=http%3A%2F%2Flocalhost%3A8000');
    }
}
