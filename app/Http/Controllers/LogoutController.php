<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    function logout(Request $request)
    {
        if($request->session()->has('LoggedUser')){
            $request->session()->remove('LoggedUser');
            return redirect('mainPage');
        }else if($request->session()->has('LoggedReviewer')){
            $request->session()->remove('LoggedAdmin');
            return redirect('mainPage');
        }else if($request->session()->has('LoggedSuperAdmin')){
            $request->session()->remove('LoggedSuperAdmin');
            return redirect('mainPage');
        }else if($request->session()->has('LoggedJKReviewer')){
            $request->session()->remove('LoggedJKReviewer');
            return redirect('mainPage');
        }else if($request->session()->has('LoggedJKParticipants')){
            $request->session()->remove('LoggedJKParticipants');
            return redirect('mainPage');
        }else{
            return redirect('mainPage');
        }
    }
}
