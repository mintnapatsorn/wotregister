<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//use App\Http\Controllers\Auth\Response;
use Response;

use Carbon\Carbon;


class keepuserpermissionrequestController extends Controller
{
    public function showrequestpermissionpage(){
        $userid = DB::table('accounts')->where('email',session('email'))->value('id');
        $permission_used = DB::table('user_permission')->where('id',$userid)->value('permission_used');
        $allpermission = DB::table('user_permission')->where('id',$userid)->value('total_permission');
        $data = DB::table('permission_request')->where('account_id',$userid)->get();

        // refresh new quota
        $lastid = DB::table('permission_request')->where('account_id',$userid)->max('id');
        $statusrequestpermission = DB::table('permission_request')->where('id',$lastid)->value('status');
        if($statusrequestpermission==1){
            $getamountrequestpermission =DB::table('permission_request')->where('id',$lastid)->value('ammount');
            $permission = $allpermission+$getamountrequestpermission;
            $total = $permission-$permission_used;
            DB::table('user_permission')->where('account_id',$userid)->update(['total_permission'=>$permission,'total'=>$total]);
            
            //update status request =3 for add to all permission of user 
            $getamountrequestpermission =DB::table('permission_request')->where('account_id',$userid)->update(['status'=>3]);

            $permission_used = DB::table('user_permission')->where('id',$userid)->value('permission_used');
            
            $allpermission = DB::table('user_permission')->where('id',$userid)->value('total_permission');
            
            return view('requestpermission',compact('permission_used','allpermission','data'));

        }

        return view('requestpermission',compact('permission_used','allpermission','data'));

    }

    public function requestkeep(Request $request)
    {
        //search user email id
        $userid = DB::table('accounts')->where('email',session('email'))->value('id');//->get();

        $totalpermission = $request->get('totalpermission');    
        $timestamp = Carbon::now()->timestamp;   

        $status = 0;          
        
        //insert domain to domains table
        $countrequest = DB::table('permission_request')->where('account_id',$userid)->get();  
        if(count($countrequest)!=0){

            $lastid = DB::table('permission_request')->where('account_id',$userid)->max('id');

            $statuscheck = DB::table('permission_request')->where('id',$lastid)->value('status');

            if($statuscheck==0){
                DB::table('permission_request')->where('id',$lastid)->update(['ammount'=>$totalpermission,'timestamp'=>$timestamp,'status'=>$status]);        
            }
            if($statuscheck==1){
                DB::table('permission_request')->insert(['account_id' => $userid,'ammount'=>$totalpermission,'timestamp'=>$timestamp,'status'=>$status]);
            }
            if($statuscheck==3){
                DB::table('permission_request')->insert(['account_id' => $userid,'ammount'=>$totalpermission,'timestamp'=>$timestamp,'status'=>$status]);
            }
            if($statuscheck==2){
                DB::table('permission_request')->insert(['account_id' => $userid,'ammount'=>$totalpermission,'timestamp'=>$timestamp,'status'=>$status]);
            }

            return back();
        }else{
            DB::table('permission_request')->insert(['account_id' => $userid,'ammount'=>$totalpermission,'timestamp'=>$timestamp,'status'=>$status]);
        }

        return back();
    }

    public function requestsuccess(){

        $userid = DB::table('accounts')->where('email',session('email'))->value('id');

        $data = DB::table('permission_request')->where('account_id',$userid)->get();

        return view('requestpersuccessful',compact('data'));
    }
}
