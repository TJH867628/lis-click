<?php

namespace App\Http\Controllers;
use App\Models\tbl_admin_info;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    public function index(){
        return view('page.superAdmin_homePage');
    }

    public function adminList(){
        $adminInfo = tbl_admin_info::all();

        return view('page.adminList',['admin' => $adminInfo]);
    }

   
}
