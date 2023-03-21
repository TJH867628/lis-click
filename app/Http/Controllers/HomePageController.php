<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class homepageController extends Controller
{
    function index()
    {
        return view('page.homePage');
    }

    function logout()
    {
        return redirect('mainPage');   
    }
}
