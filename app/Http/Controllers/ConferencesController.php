<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConferencesController extends Controller
{
    //
    function conferencesInfo(){
        session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            
            return view('page.participants.conferencesInfo.conferencesInfo',['userSession' => $userSession]);
        }else
        {
            return redirect('login')->with('fail','Login expired,Please Login Again');
        }
        
    }

    function conferencesDownload(){
        session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            
            return view('page.participants.conferencesDownload.conferencesDownload',['userSession' => $userSession]);
        }else
        {
            return redirect('login')->with('fail','Login expired,Please Login Again');
        }
       
    }

    public function download($filename)
    {
        $path = public_path('conferences_info/' . $filename);
        return response()->download($path, $filename);
    }
}
