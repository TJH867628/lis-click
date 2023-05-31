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
            if ($request->hasFile('file_upload')) {
                $file = $request->file('file_upload');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('file_upload/fullpaper', $fileName, 'public');
                $category = $request->input('category');
                dd($category);

                if ($category = 'poster presenter only'){
                    dd($category);
                }
                

                // Perform any additional operations if needed
                
                return redirect()->back()->with('success','File Upload Successful');
            }
            dd($request->file('file_upload'));
            return redirect()->back()->with('error','File Upload Error');
        }
    }
}
