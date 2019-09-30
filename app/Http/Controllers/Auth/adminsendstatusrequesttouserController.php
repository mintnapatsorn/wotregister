<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//use App\Http\Controllers\Auth\Response;
use Response;

use Carbon\Carbon;

use App\UserRequestPermission;
use App\permission_request;
use App\userpermission;


use Mail;

class adminsendstatusrequesttouserController extends Controller
{
    function showData(){
		//$data = UserRequestPermission::all()->where('status',0);

		// $userpermissiondata = DB::select('select request_id,usid,usname,total_request,allpms,permissionused,status from user_permission left join user_request_permissions on user_permission.usid = user_request_permissions.user_id where status = 0;');

		$userpermissiondata = DB::select('select permission_request.id,permission_request.account_id,username,total_permission,permission_used,ammount,status from user_permission left join permission_request on user_permission.account_id = permission_request.account_id where status=0;');

		if(count($userpermissiondata)>0){
			//return view('adminacceptreject',['data'=>$data]);//->with('username',$username);
			return view('adminacceptreject',compact('userpermissiondata'));
		}
		else{
			return view('adminshowemptyrequest');
		}
	}

	function acceptData($requestId){
		//$data = permission_request::all()->where('id',$requestId);
		$data = DB::table('permission_request')->where('id',$requestId);

		$emails = DB::table('accounts')->where('id',$requestId)->value('email');
		if(count($data)>0){
			//Send Email Accept to user
			// Mail::send('getstarted',['emails'=>$emails], function ($m) use ($emails) {
	  //           $m->from('napatsorn.piapan@nectec.or.th', 'WoT Cloud');

	  //           $m->to($emails->email)->subject('Your Reminder!');
   //      	});
			mail(session('email'), "WoT Cloud : Permission Part", "Your permission request was accepted");


			$getamountrequestpermission = DB::table('permission_request')->where('id',$requestId)->update(['status'=>1]);
			
			// mail($email, "WoT Cloud : Permission Request", "Permission Request was accepted");	
			

			return back();
		}else{
			return redirect('/adminmanagement');
		}
	}

	function rejectData($requestId){
		//$data = permission_request::all()->where('request_id',$requestId);
		$data = DB::table('permission_request')->where('id',$requestId);
		if(count($data)>0){
			$getamountrequestpermission =DB::table('permission_request')->where('id',$requestId)->update(['status'=>2]);
			return back();
		}else{
			return redirect('/adminmanagement');
		}
	}

	function acceptallData(){
		
		DB::table('permission_request')->where('status',0)->update(['status'=>1]);
		return back();

	}


	function getdatachange($requestId){
		//$data = permission_request::all()->where('id',$requestId);
		$data = DB::table('permission_request')->where('id',$requestId)->get();
		if(count($data)>0){

			return view('admineditammount')->with(['data'=>$data]);
			
		}	
	}

	function updateData(Request $request){

		$requestid = $request->get('requestid');
		$ammount = $request->get('ammount');

		DB::table('permission_request')->where('id',$requestid)->update(['ammount'=>$ammount]);
		DB::table('permission_request')->where('id',$requestid)->update(['status'=>1]);
		return redirect('/admincheckuserrequestpermission');
	}

}
