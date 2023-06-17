<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\tbl_role_jk;
use App\Models\tbl_account;
class RegisterAdminController extends Controller
{
    function index(){
        if(session()->has("LoggedSuperAdmin")){
            $adminSession = session()->get('LoggedSuperAdmin');
            $role = tbl_role_jk::all();
            return view('page.registerNewAdmin',['LoggedSuperAdmin'=>$adminSession,'adminRole'=>$role]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }
    
    public function store(request $request)
    {
        $role = $request -> input ('role');
        $email = $request -> input('email');//get email from Super Admin
        if(!tbl_account::where('email',$email)->first()){
            $password = $request -> input('password');
            $name = $request -> input('name');//get name from Super Admin
            $title = $request -> input('title');//get IC_No from Super Admin
            $IC_No = $request -> input('IC_No');//get IC_No from Super Admin
            $phoneNumber = $request -> input('phoneNumber');//get Phone Number from Super Admin
            $date = now();//get timestamp now
    
            $hashedPassword = hash('sha512',$password);//encrypt the password that input by user using "Hash:make" function
    
            //create a set of data that will be insert to database
            $data1 = array('email'=>$email,'password'=>$hashedPassword,'isAdmin'=> 1 ,'created_at'=>$date,'updated_at'=>$date);
            //create a set of data that will be insert to database
            $data2 = array('IC_No'=>$IC_No,'name'=>$name,'title'=>$title,'email'=>$email,'phoneNumber'=>$phoneNumber,'adminRole'=>$role,'status'=> 1,'created_at'=>$date,'updated_at'=>$date);
            //insert the data to database with specified table and the dataset that have been create
            DB::table('tbl_account')->insert($data1);
            //insert the data to database with specified table and the dataset that have been create
            DB::table('tbl_admin_info')->insert($data2);
    
            //redirect the user to home page
            return redirect('superAdminHomePage');
        }else{
            return redirect()->back()->with('error','account existed');
        }

    }
}
