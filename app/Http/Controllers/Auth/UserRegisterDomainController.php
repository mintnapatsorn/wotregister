<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\ServerList;

use App\relayserver_list;

use App\mydomain;

//use App\Http\Controllers\Auth\Response;
use Response;

use Carbon\Carbon;


class UserRegisterDomainController extends Controller
{

    public function regissubmit(Request $request)
    {
        //search user email id
        $userid = DB::table('accounts')->where('email',session('email'))->value('id');//->get();

        $domain = $request->get('domain');                    
        $description = $request->get('description');   
        $continent1 = $request->get('serverlistbox');   

        //select domain name that admin select
        $admin_domain_select = DB::table('domain_default')->value('domain_name');
        //Marge multiple variable 
        $domain = $domain.$admin_domain_select;

        //generate time stamp
        $timestamp = Carbon::now()->timestamp;

        $dns_challenge=0;                                     
        $verified=0;
        $continent=$continent1;
        //$continent = "AA";                                       

        //generate uuid v4
        $uuidBin = random_bytes(16);
        $uuidBin &= "\xFF\xFF\xFF\xFF\xFF\xFF\x0F\xFF\x3F\xFF\xFF\xFF\xFF\xFF\xFF\xFF";
        $uuidBin |= "\x00\x00\x00\x00\x00\x00\x40\x00\x80\x00\x00\x00\x00\x00\x00\x00";
        $uuidHex = bin2hex($uuidBin); //result of uuid generate token

        $arruuid = str_split($uuidHex);
        $generatetoken = $arruuid[0].$arruuid[1].$arruuid[2].$arruuid[3].$arruuid[4].$arruuid[5].$arruuid[6].$arruuid[7]."-".$arruuid[8].$arruuid[9].$arruuid[10].$arruuid[11]."-".$arruuid[12].$arruuid[13].$arruuid[14].$arruuid[15]."-".$arruuid[16].$arruuid[17].$arruuid[18].$arruuid[19]."-".$arruuid[20].$arruuid[21].$arruuid[22].$arruuid[23].$arruuid[24].$arruuid[25].$arruuid[26].$arruuid[27].$arruuid[28].$arruuid[29].$arruuid[30].$arruuid[31];

        
        // reclamation token
        $uuidBin = random_bytes(16);
        $uuidBin &= "\xFF\xFF\xFF\xFF\xFF\xFF\x0F\xFF\x3F\xFF\xFF\xFF\xFF\xFF\xFF\xFF";
        $uuidBin |= "\x00\x00\x00\x00\x00\x00\x40\x00\x80\x00\x00\x00\x00\x00\x00\x00";
        $uuidHex = bin2hex($uuidBin); //result of uuid generate token

        $arruuid = str_split($uuidHex);
        $reclamationtoken = $arruuid[0].$arruuid[1].$arruuid[2].$arruuid[3].$arruuid[4].$arruuid[5].$arruuid[6].$arruuid[7]."-".$arruuid[8].$arruuid[9].$arruuid[10].$arruuid[11]."-".$arruuid[12].$arruuid[13].$arruuid[14].$arruuid[15]."-".$arruuid[16].$arruuid[17].$arruuid[18].$arruuid[19]."-".$arruuid[20].$arruuid[21].$arruuid[22].$arruuid[23].$arruuid[24].$arruuid[25].$arruuid[26].$arruuid[27].$arruuid[28].$arruuid[29].$arruuid[30].$arruuid[31];

        

        //message alert check special char
        if (preg_match('/^[A-Za-z0-9-.]*$/', $domain)){
            // DB::table('domains')->insert(['name' => $domain,'account_id'=>$userid,'token'=>$uuidHex,'description'=>$description,'timestamp'=>$timestamp,'dns_challenge'=>$dns_challenge,'verified'=>$verified,'continent'=>$continent]);
            //DB::insert('insert into domains name account_id token')
            //return view('regisdomainsuccess')->with('domain', $domain);

            //message alert check domain repeat
            $checktoadddomain = DB::table('domains')->where('name',$domain)->get();
            if(count($checktoadddomain)==0){
                //insert domain to domains table
                // DB::table('domains')->insert(['name' => $domain,'account_id'=>$userid,'token'=>$generatetoken/*$uuidHex*/,'description'=>$description,'timestamp'=>$timestamp,'dns_challenge'=>$dns_challenge,'verified'=>$verified,'continent'=>$continent]);
                if($description==''){
                    DB::table('domains')->insert(['name' => $domain,'account_id'=>$userid,'token'=>$generatetoken,'description'=>'','timestamp'=>$timestamp,'dns_challenge'=>$dns_challenge,'reclamation_token'=>$reclamationtoken,'verification_token'=>0,'verified'=>$verified,'continent'=>$continent]);

                    //add permission used
                    $oldpermissionused = DB::table('user_permission')->where('account_id',$userid)->value('permission_used');
                    $oldpermissionused+=1;
                    $oldpertotal = DB::table('user_permission')->where('account_id',$userid)->value('total_permission');
                    $oldpertotal-=$oldpermissionused;
                    DB::table('user_permission')->where('account_id',$userid)->update(['permission_used'=>$oldpermissionused,'total'=>$oldpertotal]);

                    //Send email to user for user regis subdomain
                    mail(session('email'), "Regis subdomain success ", "From : Admin WoT Cloud System\n\t\tYou have regis subdomain with our cloud\n\t\tYour subdomain : ".$domain."\n\t\t\t\t\t Thank you");

                    // return view('regisdomainsuccess')->with('domain',$domain);
                    return redirect('/mydomain');
                }
                else{
                    DB::table('domains')->insert(['name' => $domain,'account_id'=>$userid,'token'=>$generatetoken,'description'=>$description,'timestamp'=>$timestamp,'dns_challenge'=>$dns_challenge,'reclamation_token'=>$reclamationtoken,'verification_token'=>0,'verified'=>$verified,'continent'=>$continent]);

                    //add permission used
                    $oldpermissionused = DB::table('user_permission')->where('account_id',$userid)->value('permission_used');
                    $oldpermissionused+=1;
                    $oldpertotal = DB::table('user_permission')->where('account_id',$userid)->value('total_permission');
                    $oldpertotal-=$oldpermissionused;
                    DB::table('user_permission')->where('account_id',$userid)->update(['permission_used'=>$oldpermissionused,'total'=>$oldpertotal]);

                    //Send email to user for user regis subdomain
                    mail(session('email'), "Regis subdomain success ", "From : Admin WoT Cloud System\n\t\tYou have regis subdomain with our cloud\n\t\tYour subdomain : ".$domain."\n\t\t\t\t\t Thank you");

                    // return view('regisdomainsuccess')->with('domain',$domain);
                    return redirect('/mydomain');
                }
                

            }
            else{

                $notification = $arrayName = array('message' => 'Duplicate Domain' , 'alert-type'=>'error');
                return back()->with($notification);

            }
        }
        else{
            $notification = $arrayName = array('message' => 'Can not input special character ! @ # $ % ^ & 8 ( ) + | / < > , ? [ ] { }' , 'alert-type'=>'error');
            return back()->with($notification);
        }
            
        // DB::table('domains')->insert(['name' => $domain,'account_id'=>$userid,'token'=>$uuidHex,'description'=>$description,'timestamp'=>$timestamp,'dns_challenge'=>$dns_challenge,'verified'=>$verified,'continent'=>$continent]);
        // //DB::insert('insert into domains name account_id token')

        // return view('regisdomainsuccess')->with('domain', $domain);
    }

    //get relay server list to user regis subdomain page
    public function serverlist(){

        //get user id 
        $userid = DB::table('accounts')->where('email',session('email'))->value('id');

        //get all user domain 
        $alluserdomain = DB::table('domains')->where('account_id',$userid)->get();

        //get domain default from admin 
        $admin_domain_select = DB::table('domain_default')->value('domain_name');

        //count all user permission
        $checkemptypermission = DB::table('user_permission')->where('account_id',$userid)->value('account_id');
        // $permission = DB::table('user_permission')->where('account_id',$userid)->value('total_permission');
        // $permission_used = DB::table('user_permission')->where('account_id',$userid)->value('permission_used');
        if($checkemptypermission == 0){
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
        }else{
            $permission = DB::table('user_permission')->where('account_id',$userid)->value('total_permission');
            $permission_used = DB::table('user_permission')->where('account_id',$userid)->value('permission_used');
        }

        //check permission request was accept
        // $statusrequestpermission =DB::table('permission_request')->where('account_id',$userid)->value('status');
        $lastid = DB::table('permission_request')->where('account_id',$userid)->max('id');
        $statusrequestpermission = DB::table('permission_request')->where('id',$lastid)->value('status');
        if($statusrequestpermission==1){
            $getamountrequestpermission =DB::table('permission_request')->where('id',$lastid)->value('ammount');

            $permission = $permission+$getamountrequestpermission;

            $total = $permission-$permission_used;
            DB::table('user_permission')->where('account_id',$userid)->update(['total_permission'=>$permission,'total'=>$total]);
            

            //update status request =3 for add to all permission of user 
            $getamountrequestpermission =DB::table('permission_request')->where('account_id',$userid)->update(['status'=>3]);

            $permission_used = DB::table('user_permission')->where('id',$userid)->value('permission_used');
            
            $allpermission = DB::table('user_permission')->where('id',$userid)->value('total_permission');
            

            $interserverlist = relayserver_list::all();

            return view('userregisdomain',compact('interserverlist','admin_domain_select','permission_used','allpermission'));
        }
        //check empty permission ro regis domain 
        else if ((count($alluserdomain))>=$permission) {
            if($statusrequestpermission==2){
                $alluserdomain = count($alluserdomain);
                return view('alertuserfulldomain')->with('alluserdomain',$alluserdomain);
            }

            $alluserdomain = count($alluserdomain);
            return view('alertuserfulldomain')->with('alluserdomain',$alluserdomain);
        }
        //permission not full 
        else{

            $userid = DB::table('accounts')->where('email',session('email'))->value('id');
            $permission_used = DB::table('user_permission')->where('id',$userid)->value('permission_used');
            
            $allpermission = DB::table('user_permission')->where('id',$userid)->value('total_permission');

            $interserverlist = relayserver_list::all();

            // return view('userregisdomain',compact('interserverlist','admin_domain_select'));
            return view('userregisdomain',compact('interserverlist','admin_domain_select','permission_used','allpermission'));

        }
    }


    public function updaterelayservermydomain(Request $request){

        $dominid = $request->get('domainid');

        $continent = $request->get('changeserverlistbox');

        DB::table('domains')->where('id',$dominid)->update(['continent'=>$continent]);
  
        return back();
    }
}
