<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class RegisterAdminController extends Controller
{
    function index(){
        return view('page.registerAdmin');
    }
    
    public function store(request $request)
    {
        $email = $request -> input('email');//get email from Super Admin
        $password = $request -> input('password');
        $name = $request -> input('name');//get name from Super Admin
        $IC_No = $request -> input('IC_No');//get IC_No from Super Admin
        $phoneNumber = $request -> input('phoneNumber');//get Phone Number from Super Admin
        $date = now();//get timestamp now

        $hashedPassword = hash('sha512',$password);//encrypt the password that input by user using "Hash:make" function

        //create a set of data that will be insert to database
        $data1 = array('email'=>$email,'password'=>$hashedPassword,'isAdmin'=> 1 ,'created_at'=>$date,'updated_at'=>$date);
        //create a set of data that will be insert to database
        $data2 = array('IC_No'=>$IC_No,'name'=>$name,'email'=>$email,'adminRole'=>'None','status'=>'Active','created_at'=>$date,'updated_at'=>$date);
        //insert the data to database with specified table and the dataset that have been create
        DB::table('tbl_account')->insert($data1);
        //insert the data to database with specified table and the dataset that have been create
        DB::table('tbl_admin_info')->insert($data2);

        //redirect the user to login page
        return redirect('login');
    }
}
