<?php

namespace App\Http\Controllers;

use App\Models\tbl_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
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
    //    return $request->input();
       
       $request->validate([
           'email' =>'required|email',
           'password' =>'required|min:3',
       ]);

       $userInfo = tbl_account::where('email','=',$request->email)->first();

       if(!$userInfo){
            return redirect()->back()->with('fail','Email or Password invalid');
       }else{
            $password = Hash::check('password',$userInfo->password);
        
        if($userInfo && $password){
            $request->session()->put('LoggedUser',$userInfo -> id);
            return redirect('homePage');
        }else{
            return redirect()->back()->with('fail','Email or Password invalid');
        }
       }
    } 

    function logout()
    {
        Auth::logout();
        return redirect('mainPage');
    }
}
