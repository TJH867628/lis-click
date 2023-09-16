<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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

    function download($filename)
    {
        $file = public_path('conferences_info/' . $filename);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
    
        if ($extension == 'pdf') {
            return Response::make(file_get_contents($file), 200, [
                'content-type' => 'application/pdf',
            ]);
        } elseif ($extension == 'doc' || $extension == 'docx') {
            return response()->file($file);
        }
    }
}
