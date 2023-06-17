<?php

namespace App\Http\Controllers;
use App\Models\tbl_participants_info;
use Illuminate\Http\Request;

class JkParticipantController extends Controller
{

    public function participantsList(){
        if(session()->has("LoggedJKParticipants")){
            session()->start();
            $adminSession = session()->get('LoggedJKParticipants');
            $participantsInfo  = tbl_participants_info::all();
            return view('page.participantsList(JkParticipant)',['adminSession'=>$adminSession,'participants' => $participantsInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }
}
