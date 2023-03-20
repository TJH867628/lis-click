<?php

namespace App\Http\Controllers;

use App\Models\homepage;
use Illuminate\Http\Request;
use DB;
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
        $email = $request -> input('email');
        $password = $request -> input('password');
        $name = $request -> input('name');
        $IC_No = $request -> input('IC_No');
        $phoneNumber = $request -> input('phoneNumber');
        $title = $request -> input('title');
        $address = $request -> input('address');
        $postcode = $request -> input('postcode');
        $nation = $request -> input('nation');
        $category = $request -> input('category');
        $date = now();

        $data1 = array('email'=>$email,'password'=>$password,'created_at'=>$date,'updated_at'=>$date);
        $data2 = array('email'=>$email,'IC_No'=>$IC_No,'name'=>$name,'title'=>$title,'phoneNumber'=>$phoneNumber,'organizationAddress'=>$address,'postcode'=>$postcode,'nation'=>$nation,'participantsCategory'=>$category,'dateOfRegister'=>$date,'created_at'=>$date,'updated_at'=>$date);
        DB::table('tbl_account')->insert($data1);
        DB::table('tbl_participants_info')->insert($data2);

        return redirect('login');
    }
}
