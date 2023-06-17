<?php

namespace App\Http\Controllers;

use App\Models\tbl_admin_info;
use App\Models\tbl_submission;
use Illuminate\Http\Request;

class JKReviewerController extends Controller
{

    function updateReviewer(request $request, $submissionCode){
        if(session()->has('LoggedJKReviewer')){
            session()->start();
            $adminSession = session()->get('LoggedJKReviewer');
            $selectedReviewer = $request->input('reviewer');
            $selectedReviewer2 = $request->input('reviewer2');
            $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
            $reviewer = tbl_admin_info::where('email',$selectedReviewer)->first();
            $submission->reviewerID = $reviewer->name;
            if($selectedReviewer2 != "None"){
                $reviewer2 = tbl_admin_info::where('email',$selectedReviewer2)->first();
                $submission->reviewer2ID = $reviewer2->name;
            }
            $submission->save();
            return redirect()->back();
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

        function cancelReviewer($submissionCode){
        if(session()->has('LoggedJKReviewer')){
            session()->start();
            $adminSession = session()->get('LoggedJKReviewer');
            $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
            $submission->reviewerID = "pending";
            $submission->reviewer2ID = NULL;
            $submission->save();
            return redirect()->back();
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }
}
