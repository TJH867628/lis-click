<?php

namespace App\Http\Controllers;

use App\Models\tbl_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Helper\Table;
use Validator;

class LoginController extends Controller
{
    public $table = 'lis.account';
    function index()
    {
        return view('page.login');
    }

    public function email(){
        return 'email';
    }

    function check(Request $request)
    {
        $request->session()->start();
        $email = $request->input('email');
        $password = hash('sha512',$request->input('password'));
        // print password
        $userInfo = DB::table('tbl_account')->where('email', $email)->first();
        $request->session()->remove('LoggedUser');
        $request->session()->remove('LoggedAdmin');
        $request->session()->remove('LoggedSuperAdmin');
        $request->session()->remove('LoggedJKReviewer');
        $request->session()->remove('LoggedJKParticipants');
        $request->session()->remove('LoggedReviewer');
        
        if ($userInfo && $userInfo->password == $password) {
            if($userInfo->isAdmin === 0)
            {
            $request->session()->put('LoggedUser', $userInfo->email);
            return redirect('homePage');
            
            } else if($userInfo->isAdmin === 1){
                
                $AdminInfo = DB::table('tbl_admin_info')->where('email',$email)->first();
                if($AdminInfo->status === 1){//check the status of admin
                    if($AdminInfo->adminRole == "Super"){//check the role of admin
                        $request->session()->put('LoggedSuperAdmin', $AdminInfo->email);
                        return redirect('superAdminHomePage');
                    }elseif($AdminInfo->adminRole == "JK Reviewer"){//check the role of admin
                        $request->session()->put('LoggedJKReviewer', $AdminInfo->email);
                        return redirect('JKReviewerHomePage');
                    }
                    elseif($AdminInfo->adminRole == "JK Pendaftaran"){//check the role of admin
                        $request->session()->put('LoggedJKPendaftaran', $AdminInfo->email);
                        return redirect('JkPendaftaranHomePage');
                    }
                    elseif($AdminInfo->adminRole == "Reviewer"){//check the role of admin
                        $request->session()->put('LoggedReviewer', $AdminInfo->email);
                        return redirect('ReviewerHomePage');
                    }
                    
                    
                }else{
                    return redirect()->back()->with('fail','Your Admin Status is not Active,Please contact with managment department');
                }
            }
        }   else {

            return redirect()->back()->with('fail','Email or Password is Invalid');
        }
       
    } 

    
}
