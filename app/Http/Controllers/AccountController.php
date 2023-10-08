<?php

namespace App\Http\Controllers;

use App\Models\tbl_participants_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\tbl_admin_info;


class AccountController extends Controller
{
    public function index(){
        session()->start();
        
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $user = tbl_participants_info::where('email',$userSession)->first();
            return view('page.participants.profile.profile',['userSession'=>$userSession,'user' => $user]);
        }elseif(session()->has("LoggedSuperAdmin")){
            $adminSession = session()->get('LoggedSuperAdmin');
            $admin = tbl_admin_info::where('email',$adminSession)->first();
            
            return view('page.account(Admin)',['adminSession'=>$adminSession,'admin' => $admin]);
        }elseif(session()->has('LoggedJKParticipants')){
            $adminSession = session()->get('LoggedJKParticipants');
            $admin = tbl_admin_info::where('email',$adminSession)->first();
            
            return view('page.account(Admin)',['adminSession'=>$adminSession,'admin' => $admin]);
        }elseif(session()->has('LoggedJKReviewer')){
            $adminSession = session()->get('LoggedJKReviewer');
            $admin = tbl_admin_info::where('email',$adminSession)->first();
            
            return view('page.Jk_Reviewer.profile.profile',['adminSession'=>$adminSession,'admin' => $admin]);
        }elseif(session()->has('LoggedReviewer')){
            $adminSession = session()->get('LoggedReviewer');
            $admin = tbl_admin_info::where('email',$adminSession)->first();
            
            return view('page.reviewer.profile.profile',['adminSession'=>$adminSession,'admin' => $admin]);
        }elseif(session()->has('LoggedFloorManager')){
            $adminSession = session()->get('LoggedFloorManager');
            $admin = tbl_admin_info::where('email',$adminSession)->first();
            
            return view('page.Floor_Manager.profile.profile',['adminSession'=>$adminSession,'admin' => $admin]);
        }elseif(session()->has('LoggedJKBendahari')){
            $adminSession = session()->get('LoggedJKBendahari');
            $admin = tbl_admin_info::where('email',$adminSession)->first();
            
            return view('page.JK_Bendahari.profile.profile',['adminSession'=>$adminSession,'admin' => $admin]);
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
            $salutation = $request -> input('salutation');//get title from user
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
            $updateData = array('IC_No'=>$IC_No,'name'=>$name,'salutation'=>$salutation,'phoneNumber'=>$phoneNumber,'organizationName'=>$organizationName,'organizationAddress'=>$address,'postcode'=>$postcode,'country'=>$country,'updated_at'=>$date);
            //insert the data to database with specified table and the dataset that have been create
            DB::table('tbl_participants_info')->where('email',$userSession)->update($updateData);
            
            if ($request->hasFile('profile_picture')) {
                // Delete existing profile picture if it exists
                if ($user->profile_picture) {
                    Storage::disk('public')->delete($user->profile_picture);
                }
            
                $file = $request->file('profile_picture');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('profile_pictures', $fileName, 'public');
                // Update the profile picture path in the database
                $user->profile_picture = 'storage/profile_pictures/' . $fileName;
                $user->save();
                
            }return redirect('account')->with('account-success','Profile Updated Successfully');
            
        }elseif(session()->has("LoggedSuperAdmin") || session()->has('LoggedJKParticipants') || session()->has('LoggedJKReviewer') || session()->has('LoggedReviewer') || session()->has('LoggedJKBendahari') || session()->has('LoggedFloorManager')){
            if(session()->has("LoggedSuperAdmin")){
                $adminSession = session()->get('LoggedSuperAdmin');
            }elseif(session()->has('LoggedJKParticipants')){
                $adminSession = session()->get('LoggedJKParticipants');
            }
            elseif(session()->has('LoggedJKReviewer')){
                $adminSession = session()->get('LoggedJKReviewer');
            }
            elseif(session()->has('LoggedReviewer')){
                $adminSession = session()->get('LoggedReviewer');
            }
            elseif(session()->has('LoggedJKBendahari')){
                $adminSession = session()->get('LoggedJKBendahari');
            }
            elseif(session()->has('LoggedFloorManager')){
                $adminSession = session()->get('LoggedFloorManager');
            }
            $name = $request -> input('name');//get name from user
            $IC_No = $request -> input('IC_No');//get IC_No from user
            $phoneNumber = $request -> input('phoneNumber');//get Phone Number from user
            $salutation = $request -> input('salutation');//get salutation from user
            $organizationName = $request -> input("organizationName");//get organizationName from user
            $date = now();//get timestamp now
            $user = tbl_participants_info::where('email',$adminSession)->first();

            //create a set of data that will be update to database
            $updateData = array('IC_No'=>$IC_No,'name'=>$name,'salutation'=>$salutation,'phoneNumber'=>$phoneNumber,'organizationName'=>$organizationName,'updated_at'=>$date);
            //insert the data to database with specified table and the dataset that have been create
            DB::table('tbl_admin_info')->where('email',$adminSession)->update($updateData);
            
            return redirect('account')->with('account-success','Profile Updated Successfully');
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }


    public function updatePassword(Request $request){
        $request->session()->start();
        if(session()->has('LoggedUser') || session()->has('LoggedUser') || session()->has("LoggedSuperAdmin") || session()->has('LoggedJKParticipants') || session()->has('LoggedJKReviewer') || session()->has('LoggedReviewer') || session()->has('LoggedJKBendahari') || session()->has('LoggedFloorManager')){
            if(session()->has('LoggedUser')){
                $userSession = session()->get('LoggedUser');
            }
            elseif(session()->has("LoggedSuperAdmin")){
                $userSession = session()->get('LoggedSuperAdmin');
            }elseif(session()->has('LoggedJKParticipants')){
                $userSession = session()->get('LoggedJKParticipants');
            }
            elseif(session()->has('LoggedJKReviewer')){
                $userSession = session()->get('LoggedJKReviewer');
            }
            elseif(session()->has('LoggedReviewer')){
                $userSession = session()->get('LoggedReviewer');
            }
            elseif(session()->has('LoggedJKBendahari')){
                $userSession = session()->get('LoggedJKBendahari');
            }
            elseif(session()->has('LoggedFloorManager')){
                $userSession = session()->get('LoggedFloorManager');
            }
            $date = now();//get timestamp now
            $user = DB::table('tbl_account')->where('email', $userSession)->first();
            $currentPassword = $request->input('currentPassword');
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

                    return redirect('account',)->with('password-success','Password Updated Successfully');
                }else{
                    return redirect('account')->with('password-fail','New Password and Confirm Password not match');
                }
            }
            return redirect('account')->with('password-fail','Current Password Invalid');

        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }
}
