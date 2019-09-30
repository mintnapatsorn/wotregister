<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\UserRequestPermission;

use Illuminate\Support\Facades\DB;

class ControllerTest extends Controller{

	function showData(){
		$data = UserRequestPermission::all()->where('status',0);
		return view('viewcontroller',['data'=>$data]);
	}


	function editData($requestId){
		$data = UserRequestPermission::all()->where('request_id',$requestId);
		if(count($data)>0){
			return view('edit',['data'=>$data]);
		}else{
			$data = UserRequestPermission::all();
			// return view('viewcontroller',['data'=>$data]);
			return back()->with(['data'=>$data]);
		}
	}

	function updateData($requestId){
		$data = UserRequestPermission::all()->where('request_id',$requestId);
		$status = 1;
		if(count($data)>0){
			$getamountrequestpermission =DB::table('user_request_permissions')->where('request_id',$requestId)->update(['status'=>1]);
			return back();
		}else{
			return redirect('/adminmanagement');
		}
	}
}