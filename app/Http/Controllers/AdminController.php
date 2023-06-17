<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        if(session()->has('LoggedJKParticipants')){
            session()->start();
            $adminSession = session()->get('LoggedAdmin');
            return view('page.JKParticipant_HomePage',['adminSession'=>$adminSession]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

}
