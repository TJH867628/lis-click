<?php

namespace App\Http\Controllers;
use App\Models\tbl_admin_info;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    public function index(){
        if(session()->has("LoggedSuperAdmin")){
            session()->start();
            $adminSession = session()->get('LoggedSuperAdmin');
            return view('page.superAdmin_HomePage',['adminSession'=>$adminSession]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function adminList(){
        if(session()->has("LoggedSuperAdmin")){
            session()->start();
            $adminSession = session()->get('LoggedSuperAdmin');
            $adminInfo = tbl_admin_info::all();
            return view('page.adminList',['adminSession'=>$adminSession,'admin' => $adminInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

   
}
