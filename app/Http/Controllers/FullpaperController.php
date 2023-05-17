<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FullpaperController extends Controller
{
    public function index(){
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            return view('page.fullpaper',['userSession'=>$userSession]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function storeFullpaper(request $request){
        if(session()->has('LoggedUser')){
        }
    }
}
