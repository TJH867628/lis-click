<?php

namespace App\Http\Controllers;

use App\Models\tbl_participants_info;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    function index(){session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $user = tbl_participants_info::where('email',$userSession)->first();
            return view('page.participants.faq.faq',['userSession' => $userSession,'user' => $user]);

        }
    }

    function visitor(){
        return view('page.visitor.faq.faqVisitor');
    }
}
