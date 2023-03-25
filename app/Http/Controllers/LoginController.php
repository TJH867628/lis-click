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
        $email = $request->input('email');
        $password = $request->input('password');
        $userInfo = DB::table('tbl_account')->where('email', $email)->first();

        if ($userInfo && Hash::check($password, $userInfo->password)) {
            if($userInfo->isAdmin === 0)
            {
            $request->session()->put('LoggedUser', $userInfo->email);
            return redirect('homePage');
            
            } else if($userInfo->isAdmin === 1){

                return redirect('adminHomePage');
            }
        }   else {

            return redirect()->back()->with('fail','Email or Password is Invalid');
        }
       
    } 

    function logout()
    {
        Auth::logout();
        return redirect('mainPage');
    }
}
