<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    function index()
    {
        return view('page.mainPage');
    }

    function button()
    {
        if(isset($_POST['signUp']))
        {
            return redirect('/registration');
            
        }elseif(isset($_POST['login']))
        {
            return redirect('/login');
        }
    }

}
