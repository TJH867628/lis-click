<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class homepageController extends Controller
{
    function index()
    {
        session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            
            return view('page.homePage',['userSession' => $userSession]);
        }else
        {
            return redirect('login')->with('fail','Login expired,Please Login Again');
        }
    }

    function logout()
    {
        return redirect('mainPage');   
    }
}
