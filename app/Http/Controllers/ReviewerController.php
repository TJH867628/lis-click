<?php

namespace App\Http\Controllers;

use App\Models\tbl_submission;
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    public function index(){
        if(session()->has("LoggedReviewer")){
            session()->start();
            $adminSession = session()->get('LoggedReviewer');
            return view('page.reviewer_HomePage',['adminSession'=>$adminSession]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function pendingreviewlist(){
        if(session()->has("LoggedReviewer")){
            session()->start();
            $adminSession = session()->get('LoggedReviewer');
            $submissionInfo  = tbl_submission::where('email',$reviewerSession)->first();
            return view('page.pendingreviewer',['adminSession'=>$adminSession,'submissionInfo' => $submissionInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function donereviewlist(){
        if(session()->has("LoggedReviewer")){
            session()->start();
            $adminSession = session()->get('LoggedReviewer');
            $submissionInfo  = tbl_submission::where('email',$reviewerSession)->first();
            return view('page.donereview',['adminSession'=>$adminSession,'submissionInfo' => $submissionInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function uploadReviewSubmission(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            return redirect()->back()->with('success', 'File uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No file was uploaded.');
    }

}