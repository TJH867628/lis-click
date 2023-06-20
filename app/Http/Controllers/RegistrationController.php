<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\tbl_account;
class RegistrationController extends Controller
{
    //   
    function index()
    {
        session()->start();
        return view('page.registration');
    }

    public function store(request $request)
    {
        $email = $request -> input('email');//get email from user
        if(tbl_account::where('email', $email)->first() != null){
            return redirect()->back()->with('error','Email Already Exist!');
        }else{
            $password = $request -> input('password');
            $name = $request -> input('name');//get name from user
            $IC_No = $request -> input('IC_No');//get IC_No from user
            $phoneNumber = $request -> input('phoneNumber');//get Phone Number from user
            $salutation = $request -> input('salutation');//get title from user
            $organizationName = $request -> input("organizationName");//get organizationName from user
            $address = $request -> input('address');//get address from user
            $postcode = $request -> input('postcode');//get postcode from user
            $country = $request -> input('country');//get country from user
            $state = $request -> input('state');//get state from user
            $category = $request -> input('category');//get category from user
            $date = now();//get timestamp now

            $hashedPassword = hash('sha512',$password);//encrypt the password that input by user using "Hash:make" function
            //create a set of data that will be insert to database
            $data1 = array('email'=>$email,'password'=>$hashedPassword,'created_at'=>$date,'updated_at'=>$date);
            //create a set of data that will be insert to database
            $data2 = array('email'=>$email,'IC_No'=>$IC_No,'name'=>$name,'salutation'=>$salutation,'phoneNumber'=>$phoneNumber,'organizationName'=>$organizationName,'organizationAddress'=>$address,'postcode'=>$postcode,'state'=>$state,'country'=>$country,'participantsCategory'=>$category,'dateOfRegister'=>$date,'created_at'=>$date,'updated_at'=>$date);
            //insert the data to database with specified table and the dataset that have been create
            DB::table('tbl_account')->insert($data1);
            //insert the data to database with specified table and the dataset that have been create
            DB::table('tbl_participants_info')->insert($data2);

            //redirect the user to login page
            return redirect('login');
        
        }
            
    }
}
