<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//use App\Http\Controllers\Auth\Response;
use Response;

use Carbon\Carbon;


class testmodalController extends Controller
{

    public function testgetdatafrommodal(Request $request)
    {
        //search user email id
        $userid = DB::table('accounts')->where('email',session('email'))->value('id');//->get();

        $totalpermission = $request->get('totalpermission');       

        $status = 0;          
        
        //insert domain to domains table
        $countrequest = DB::table('user_request_permissions')->where('user_id',$userid)->get();  
        if(count($countrequest)!=0)
        {
            DB::table('user_request_permissions')->where('user_id',$userid)->update(['total_request'=>$totalpermission,'status'=>$status]);
        }
        else{
            DB::table('user_request_permissions')->insert(['user_id' => $userid,'total_request'=>$totalpermission,'status'=>$status]);
        }


        // DB::table('user_request_permissions')->insert(['user_id' => $userid,'total_request'=>$totalpermission,'status'=>$status]);
        return redirect('/requestpermissionsuccessful');
    }
}
