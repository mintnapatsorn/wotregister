<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

// use App\ServerList;
use App\relayserver_list;

use Illuminate\Support\Facades\DB;

class adminloadrelayserverdataController extends Controller{

	public function loadserverlist(){

		// $serverlist = relayserver_list::all();
		$serverlist = DB::table('relayserver_lists')->get();
		if(count($serverlist)>0){
			return view('adminmanagerelayserver',['serverlist'=>$serverlist]);
		}else{
			return view('adminshowemtyrelayserver');
		}
	}

	function deleteData($serverId){
		$data = relayserver_list::all()->where('id',$serverId);
		if(count($data)>0){
			DB::table('relayserver_lists')->where('id',$serverId)->delete();
			return redirect('/relayservermanagement');
		}
	}

	function addData(Request $request){

		//$serverid = $request->get('serverid');    
		$relayservername = $request->get('relayservername'); 
		$countrycode = $request->get('relayservercode'); 
		//DB::table('server_lists')->insert(['country_server_list'=>$relayservername,'country_code'=>$countrycode]);

		$checkserverlistcode = DB::table('relayserver_lists')->where('relayserver_code',$countrycode)->get();
        if(count($checkserverlistcode)==0){
            $splitvar = str_split($checkserverlistcode);
            if(count($splitvar)>2){
            	$notification = $arrayName = array('message' => 'Please input code 2 character only' , 'alert-type'=>'error');
            	return back()->with($notification);
            }
            else{
            	DB::table('relayserver_lists')->insert(['relayserver_code'=>$countrycode,'description'=>$relayservername]);
            	return redirect('/relayservermanagement');
            }
        }
        else{

            $notification = $arrayName = array('message' => 'Duplicate Relayserver Code' , 'alert-type'=>'error');
            return back()->with($notification);
        }
	}


	function editclickData($serverId){
		$data = relayserver_list::all()->where('id',$serverId);
		if(count($data)>0){
			//$data2 = DB::table('server_lists')->where('server_id',$serverId);
			//return view('adminmanagerelayserveredit')->with('serverId',$serverId);
			//return view('adminmanagerelayservereditedit',compact(['serverId'=>$serverId,'data2'=>$data2]));

			return view('admineditrelayserver')->with(['data'=>$data]);
			
		}
		
	}

	function editData(Request $request){

			$relayserverid = $request->get('relayserverid'); 
			$countrycode = $request->get('relayservername');
			$relayservername = $request->get('relayservercode');

			DB::table('relayserver_lists')->where('id',$relayserverid)->update(['relayserver_code'=>$countrycode,'description'=>$relayservername]);

		return redirect('/relayservermanagement');
	}

}