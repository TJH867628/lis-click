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
            return view('page.superAdmin_homePage',['adminSession'=>$adminSession]);
            
        }elseif(session()->has("LoggedJKParticipants")){
            session()->start();
            $adminSession = session()->get('LoggedJKParticipants');
            return view('page.JkParticipant_HomePage',['adminSession'=>$adminSession]);
        }elseif(session()->has('LoggedJKReviewer')){
            session()->start();
            $adminSession = session()->get('LoggedJKReviewer');
            return view('page.homePage(JK Reviewer)',['adminSession'=>$adminSession]);
        }elseif(session()->has('LoggedReviewer')){
            session()->start();
            $adminSession = session()->get('LoggedReviewer');
            return view('page.reviewer_HomePage',['adminSession'=>$adminSession]);
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
