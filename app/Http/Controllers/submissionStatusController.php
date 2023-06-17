<?php

namespace App\Http\Controllers;
use App\Models\tbl_submission;
use App\Models\tbl_admin_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class submissionStatusController extends Controller
{
    function index(){
        try{
            if(session()->has('LoggedUser')){
                $userSession = session()->get('LoggedUser');
                $userSubmissionInfo = tbl_submission::where('participants1', $userSession)
                    ->orWhere('participants2', $userSession)
                    ->orWhere('participants3', $userSession) 
                    ->get();
                return view('page.submissionStatusPage',['userSession'=>$userSession,'userSubmissionInfo' => $userSubmissionInfo]);
            }elseif(session()->has('LoggedSuperAdmin')){
                $userSession = session()->get('LoggedSuperAdmin');
                $allSubmissionInfo = tbl_submission::all();
                $allReviewerInfo = tbl_admin_info::where('adminRole','Reviewer')->get();
                return view('page.submissionStatusPage(Super Admin)',['userSession'=>$userSession,'userSubmissionInfo' => $allSubmissionInfo,'allReviewerInfo' => $allReviewerInfo]);
            }elseif(session()->has('LoggedJKReviewer')){
                $userSession = session()->get('LoggedJKReviewer');
                $allSubmissionInfo = tbl_submission::all();
                $allReviewerInfo = tbl_admin_info::where('adminRole','Reviewer')->get();
                return view('page.reviewList(JK Reviewer)',['userSession'=>$userSession,'userSubmissionInfo' => $allSubmissionInfo,'allReviewerInfo' => $allReviewerInfo]);
            }else{
                return redirect('login')->with('fail','Login Session Expire,Please Login again');
            }
    
        }
        catch(\Exception $e){

        }

    }
    public function download($filename)
    {
        $path = 'storage/paper/' . $filename;
        return response()->download($path, $filename);
    }
}
