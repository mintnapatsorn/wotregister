<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// use App\Http\Controllers\Auth\Response;
use Response;

use Carbon\Carbon;


class adminmanagedomainController extends Controller
{

    public function updatedomaindata(Request $request)
    {

        $domain = $request->get('domain');        

        $checkdata = DB::table('domain_default')->where('id',1)->value('domain_name');

        if($checkdata==""){
            //message alert check special char
            if (preg_match('/^[A-Za-z0-9-.]*$/', $domain)){
                    //insert data to admin_add_domain table
                    DB::table('domain_default')->insert(['domain_name' => $domain]);

                    $notification = $arrayName = array('message' => 'DOMAIN UPDATE SUCCESSFUL' , 'alert-type'=>'success');
                    return back()->with($notification);
            }
            else{

                $notification = $arrayName = array('message' => 'Can not input special character ! @ # $ % ^ & 8 ( ) + | / < > , ? [ ] { }' , 'alert-type'=>'error');
                return back()->with($notification);
            }
        }             
        else{
            //message alert check special char
            if (preg_match('/^[A-Za-z0-9-.]*$/', $domain)){
                    //insert data to admin_add_domain table
                    DB::table('domain_default')->where('id',1)->update(['domain_name' => $domain]);

                    $notification = $arrayName = array('message' => 'DOMAIN UPDATE SUCCESSFUL' , 'alert-type'=>'success');
                    return back()->with($notification);
            }
            else{

                $notification = $arrayName = array('message' => 'Can not input special character ! @ # $ % ^ & 8 ( ) + | / < > , ? [ ] { }' , 'alert-type'=>'error');
                return back()->with($notification);
            }
        }
    }

    public function openupdatedomainpage(){
        $checkdata = DB::table('domain_default')->where('id',1)->value('domain_name');
        if($checkdata==""){
            $checkdata = "Not have domain config.";
            return view('adminmanagedomain',['checkdata'=>$checkdata]);
        }else{
            return view('adminmanagedomain',['checkdata'=>$checkdata]);
        }
    }
}
