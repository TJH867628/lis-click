<?php

namespace App\Http\Controllers;

use App\Models\tbl_submission;
use Illuminate\Http\Request;

class JKPendaftaranController extends Controller
{
    public function index(){
        if(session()->has("LoggedJKPendaftaran")){
            session()->start();
            $adminSession = session()->get('LoggedJKPendaftaran');
            return view('page.JKPendaftaranHomePage',['adminSession'=>$adminSession]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }
    public function submissionList(){
        if(session()->has("LoggedJKPendaftaran")){
            session()->start();
            $adminSession = session()->get('LoggedJKPendaftaran');
            $submissionInfo  = tbl_submission::all();
            return view('page.participantsList(JkParticipant)',['adminSession'=>$adminSession,'submissionInfo' => $submissionInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

}
