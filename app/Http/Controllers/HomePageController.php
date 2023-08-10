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
            
            return view('page.participants.homePage.homePage(Participants)',['userSession' => $userSession]);
        }elseif(session()->has("LoggedSuperAdmin")){
            session()->start();
            $adminSession = session()->get('LoggedSuperAdmin');
            return view('page.superadmin.homePage.homePage(SuperAdmin)',['adminSession'=>$adminSession]);
            
        }elseif(session()->has("LoggedJKPendaftaran")){
            session()->start();
            $adminSession = session()->get('LoggedJKPendaftaran');
            return view('page.JK_Pendaftaran.homePage(JK_Pendaftaran).homePage(JK_Pendaftaran)',['adminSession'=>$adminSession]);
        }elseif(session()->has('LoggedJKReviewer')){
            session()->start();
            $adminSession = session()->get('LoggedJKReviewer');
            return view('page.Jk_Reviewer.homePage(Jk_Reviewer).homePage(Jk_Reviewer)',['adminSession'=>$adminSession]);
        }elseif(session()->has('LoggedReviewer')){
            session()->start();
            $adminSession = session()->get('LoggedReviewer');
            return view('page.reviewer.homePage(Reviewer).homePage(Reviewer)',['adminSession'=>$adminSession]);
        }
        else{
            return redirect('login')->with('fail','Login expired,Please Login Again');
        }
    }

    function logout()
    {
        return redirect('mainPage');   
    }
}
