<?php

namespace App\Http\Controllers;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    function index()
    {
        if(session()->has('LoggedUser') || session()->has("LoggedSuperAdmin") || session()->has('LoggedJKParticipants') || session()->has('LoggedJKReviewer') || session()->has('LoggedReviewer'))
        {
            if (session()->has('LoggedUser')) {
                return redirect('homePage');
            } elseif (session()->has('LoggedSuperAdmin')) {
                return redirect('superAdminHomePage');
            } elseif (session()->has('LoggedJKParticipants')) {
                return redirect('JKParticipantsHomePage');
            } elseif (session()->has('LoggedJKReviewer')) {
                return redirect('JKReviewerHomePage');
            } elseif (session()->has('LoggedReviewer')) {
                return redirect('ReviewerHomePage');
            } elseif (session()->has('LoggedFloorManager')) {
                return redirect('FloorManagerHomePage');
            }
            
        }
        return view('page.visitor.mainPage.mainPage');
    }

}
