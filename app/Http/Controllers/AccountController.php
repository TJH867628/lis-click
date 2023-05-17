<?php

namespace App\Http\Controllers;

use App\Models\tbl_participants_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function index(){
        session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $user = tbl_participants_info::where('email',$userSession)->first();
            return view('page.account',['userSession'=>$userSession,'user' => $user]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function updateProfile(request $request){
        $request->session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $name = $request -> input('name');//get name from user
            $IC_No = $request -> input('IC_No');//get IC_No from user
            $phoneNumber = $request -> input('phoneNumber');//get Phone Number from user
            $title = $request -> input('title');//get title from user
            $organizationName = $request -> input("organizationName");//get organizationName from user
            $address = $request -> input('address');//get address from user
            $postcode = $request -> input('postcode');//get postcode from user
            $country = $request -> input('country');//get country from user
            $state = $request -> input('state');//get state from user
            $category = $request -> input('category');//get category from user
            $date = now();//get timestamp now
            $user = tbl_participants_info::where('email',$userSession)->first();

            if ($country == ""){
                $country = $user->country;
            }

            //create a set of data that will be update to database
            $updateData = array('IC_No'=>$IC_No,'name'=>$name,'title'=>$title,'phoneNumber'=>$phoneNumber,'organizationName'=>$organizationName,'organizationAddress'=>$address,'postcode'=>$postcode,'country'=>$country,'updated_at'=>$date);
            //insert the data to database with specified table and the dataset that have been create
            DB::table('tbl_participants_info')->where('email',$userSession)->update($updateData);

            return redirect('account'); 
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function updatePassword(request $request){
        $request->session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $date = now();//get timestamp now
            $user = DB::table('tbl_account')->where('email', $userSession)->first();
            $currentPassword = $request->input('password');
            $newPassword = $request->input('newPassword1');
            $confirmPassword = $request->input('newPassword2');
            $password = hash('sha512',$currentPassword);
            if($user->password == $password){
                if($newPassword == $confirmPassword){
                    $hashedPassword = hash('sha512',$newPassword);
                    //create a set of data that will be update to database
                    $updateData = array('password'=>$hashedPassword,'updated_at'=>$date);
                    //insert the data to database with specified table and the dataset that have been create
                    DB::table('tbl_account')->where('email',$userSession)->update($updateData);

                    return redirect('account#password',)->with('password-success','Password Updated Successfully');
                }else{
                    return redirect('account#password')->with('password-fail','New Password and Confirm Password not match');
                }
            }
            return redirect('account#password')->with('password-fail','Current Password Invalid');

        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }
}
