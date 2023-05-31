<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FullpaperController extends Controller
{
    public function index(){
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            return view('page.fullpaper',['userSession'=>$userSession,'user' => $user]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function storeFullpaper(request $request){
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $submissionTitle = input('submissionTitle')
            if ($category === 'Paper Presentation & Publication'){
                $submissionType = 'Paper Presentation & Publication';
            }else if($category === 'Paper Presentation ONLY'){
                $submissionType = 'Paper Presentation ONLY';
            }else if($category === 'Publication ONLY'){
                $submissionType = 'Publication ONLY';
            }else if($category === 'Student Presenter'){
                $submissionType = 'Student Presenter';
            }else if($category === 'Audience Presenter'){
                $submissionType = 'Audience Presenter';
            }
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $paperlink = $request -> $filename;
            $participants1 = $request -> input('participants1');//get name from user
            $participants2 = $request -> input('participants2');
            $participants3 = $request -> input('participants3');
            $date = now();

            $insertData = array('submissionTitle'=>$submissionTitle,$filename=>$paperlink,'participants1'=>$participants1,'participants2'=>$participants2,'participants3'=>$participants3,'updated_at'=>$date)
            DB::table('tbl_participants_info')->where('submissionID',$userSession)->insert($insertData);

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
