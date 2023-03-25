<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    public function index(){
        return view('page.superAdmin');
    }

    public function signUpAdmin(){
        return redirect('signUpAdmin');
    }
}
