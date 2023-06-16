<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicationController extends Controller
{
    function index(){
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            return view('page.publication',['userSession' => $userSession]);
        }else
        {
            return redirect('login')->with('fail','Login expired,Please Login Again');
        }
    }

    function download($filename){
        $path = 'conferences_info/' . $filename;
        return response()->download($path, $filename);
    }
    
}
