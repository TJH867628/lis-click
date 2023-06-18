<?php

namespace App\Http\Controllers;

use App\Models\tbl_admin_info;
use App\Models\tbl_submission;
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    //
    // public function index(){
    //     if(session()->has("LoggedReviewer")){
    //         session()->start();
    //         $adminSession = session()->get('LoggedReviewer');
    //         return view('page.reviewer_HomePage',['adminSession'=>$adminSession]);
    //     }else{
    //         return redirect('login')->with('fail','Login Session Expire,Please Login again');
    //     }
    // }

    public function pendingreviewlist(){
        if(session()->has("LoggedReviewer")){
            session()->start();
            $adminSession = session()->get('LoggedReviewer');
            $reviewername = tbl_admin_info::where('email',$adminSession)->first();
            $submissionInfo = tbl_submission::where('reviewerID', $reviewername->name)
            ->orWhere('reviewer2ID', $reviewername->name)
            ->get();
            return view('page.pendingreview',['adminSession'=>$adminSession,'submissionInfo' => $submissionInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function donereviewlist(){
        if(session()->has("LoggedReviewer")){
            session()->start();
            $adminSession = session()->get('LoggedReviewer');
            $reviewername = tbl_admin_info::where('email',$adminSession)->first();
            $submissionInfo = tbl_submission::where('reviewerID', $reviewername->name)
            ->orWhere('reviewer2ID', $reviewername->name)
            ->get();
            return view('page.donereview',['adminSession'=>$adminSession,'submissionInfo' => $submissionInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function uploadReviewSubmission(Request $request,$submisisonCode){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $submissionInfo = tbl_submission::where('submissionCode',$submisisonCode)->first();
            $filename = $submissionInfo->file_name . '_Reviewed.'.$file->getClientOriginalExtension();
            $file->storeAs('uploads', $filename, 'public');
            $submissionInfo->reviewStatus = 'done';
            $submissionInfo->returnPaperLink = $filename;
            $submissionInfo->save();
            return redirect()->back()->with('success', 'File uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No file was uploaded.');
    }

    public function downloadReviewSubmission($filename){
        $path = 'storage/uploads/' . $filename;
        return response()->download($path, $filename);
    }

}
