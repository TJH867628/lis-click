<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    function index(){session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            return view('page.faq',['userSession' => $userSession]);
        }else
        {
            return redirect('login')->with('fail','Login expired,Please Login Again');
        }
    }
}
