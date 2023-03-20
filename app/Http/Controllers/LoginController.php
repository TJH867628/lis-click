<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Input;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Helper\Table;
use Validator;

class LoginController extends Controller
{
    public $table = 'lis.account';
    function index()
    {
        return view('page.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(!Auth::attempt($credentials)){ 
            return redirect('login');
        }else{
            return redirect('homePage');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('mainPage');
    }
}
