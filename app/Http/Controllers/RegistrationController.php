<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class RegistrationController extends Controller
{
    //   
    function index()
    {
        return view('page.registration');
    }

    public function store(request $request)
    {
        $email = $request -> input('email');//get email from user
        $password = $request -> input('password');
        $name = $request -> input('name');//get name from user
        $IC_No = $request -> input('IC_No');//get IC_No from user
        $phoneNumber = $request -> input('phoneNumber');//get Phone Number from user
        $title = $request -> input('title');//get title from user
        $address = $request -> input('address');//get address from user
        $postcode = $request -> input('postcode');//get postcode from user
        $nation = $request -> input('nation');//get nation from user
        $category = $request -> input('category');//get category from user
        $date = now();//get timestamp now

        $hashedPassword = Hash::make($password);//encrypt the password that input by user using "Hash:make" function

        //create a set of data that will be insert to database
        $data1 = array('email'=>$email,'password'=>$hashedPassword,'created_at'=>$date,'updated_at'=>$date);
        //create a set of data that will be insert to database
        $data2 = array('email'=>$email,'IC_No'=>$IC_No,'name'=>$name,'title'=>$title,'phoneNumber'=>$phoneNumber,'organizationAddress'=>$address,'postcode'=>$postcode,'nation'=>$nation,'participantsCategory'=>$category,'dateOfRegister'=>$date,'created_at'=>$date,'updated_at'=>$date);
        //insert the data to database with specified table and the dataset that have been create
        DB::table('tbl_account')->insert($data1);
        //insert the data to database with specified table and the dataset that have been create
        DB::table('tbl_participants_info')->insert($data2);

        //redirect the user to login page
        return redirect('login');
    }
}
