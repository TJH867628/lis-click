<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepageController extends Controller
{
    function index()
    {
        return view('page.homePage');
    }
}
