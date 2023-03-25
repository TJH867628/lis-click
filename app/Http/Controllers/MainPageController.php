<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    function index()
    {
        return view('page.mainPage');
    }

}
