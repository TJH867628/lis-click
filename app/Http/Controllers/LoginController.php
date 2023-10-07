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
use Exception;

class LoginController extends Controller
{
    public $table = 'lis.account';
    function index()
    {
        return view('page.visitor.login.login');
    }

    public function email(){
        return 'email';
    }

    function check(Request $request)
    {
            $request->session()->start();
            $email = $request->input('email');
            $password = hash('sha512',$request->input('password'));
            $maxAttempts = 5;
            // print password
            $userInfo = DB::table('tbl_account')->where('email', $email)->first();
            $request->session()->remove('LoggedUser');
            $request->session()->remove('LoggedAdmin');
            $request->session()->remove('LoggedSuperAdmin');
            $request->session()->remove('LoggedJKReviewer');
            $request->session()->remove('LoggedJKParticipants');
            $request->session()->remove('LoggedReviewer');

            // Check if the user has exceeded the maximum number of login attempts
            $attempts = $request->session()->get('login_attempts',0);
            if ($attempts >= $maxAttempts - 1) {
                if($maxAttempts - $attempts == 1 && !$request->session()->has('suspend_login')){
                    $suspendTime = time() + 60; // Add 5 minute to the current time
                    $request->session()->put('suspend_login', $suspendTime);
                }
                if(time() < $request->session()->get('suspend_login')){
                    return redirect()->back()->with('fail', "Too many attemtps <br> Please try again at " . date("H:i:s" , ($request->session()->get('suspend_login'))));
                }else{
                    $request->session()->put('login_attempts',0);
                    $request->session()->remove('suspend_login');
                    $attempts = $request->session()->get('login_attempts',0);
                }
            }

            if ($userInfo && $userInfo->password == $password) {
                $request->session()->remove('login_attempts');
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
                        }elseif($AdminInfo->adminRole == "JK Pendaftaran"){//check the role of admin
                            $request->session()->put('LoggedJKPendaftaran', $AdminInfo->email);
                            return redirect('JkPendaftaranHomePage');
                        }elseif($AdminInfo->adminRole == "JK Bendahari"){//check the role of admin
                            $request->session()->put('LoggedJKBendahari', $AdminInfo->email);
                            return redirect('JKBendahariHomePage');
                        }elseif($AdminInfo->adminRole == "Reviewer"){//check the role of admin
                            $request->session()->put('LoggedReviewer', $AdminInfo->email);
                            return redirect('ReviewerHomePage');
                        }elseif($AdminInfo->adminRole == "Floor Manager"){//check the role of admin
                            $request->session()->put('LoggedFloorManager', $AdminInfo->email);
                            return redirect('FloorManagerHomePage');
                        }
                    }else{
                        return redirect()->back()->with('fail','Your Admin Status is not Active,Please contact with managment department');
                    }
                }
            }else {
                if ($attempts <= $maxAttempts+1) {
                    $attempts++;
                }
                $request->session()->put('login_attempts', $attempts);

                return redirect()->back()->with('fail','Email or Password is Invalid<br>Remaining Chances: '.($maxAttempts-$attempts));
            }
    } 
}
