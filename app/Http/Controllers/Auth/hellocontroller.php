<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class hellocontroller extends Controller
{
    public function hello()
    {
        $domains = DB::select('select * from domains');

        return view('home', ['domains' => $domains]);
    }
}
