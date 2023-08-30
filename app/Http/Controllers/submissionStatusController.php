<?php

namespace App\Http\Controllers;
use App\Models\tbl_submission;
use App\Models\tbl_admin_info;
use App\Models\tbl_evaluation_form;
use App\Models\tbl_correction;
use App\Models\tbl_payment;
use App\Models\tbl_masterdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class submissionStatusController extends Controller
{
    function index(){
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $correctionCount = 0;
            $userSubmissionInfo = tbl_submission::where('participants1', $userSession)
                ->orWhere('participants2', $userSession)
                ->orWhere('participants3', $userSession) 
                ->get();

                foreach ($userSubmissionInfo as $submissionInfo) {
                    $paymentStatus = tbl_payment::where('submissionCode', $submissionInfo->submissionCode)->first();
                    $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionInfo->submissionCode)->first();
                    if($submissionInfo->participants1 == $userSession){
                        $thisUser = $submissionInfo->where('participants1', $userSession)->get();
                    }else if($submissionInfo->participants2 == $userSession){
                        $thisUser = $submissionInfo->where('participants2', $userSession)->get();
                    }elseif($submissionInfo->participants3 == $userSession){
                        $thisUser = $submissionInfo->where('participants3', $userSession)->get();
                    }
                }
            $correction = tbl_correction::all();
            $paymentQR = tbl_masterdata::where('masterdata_name','paymentQR')->first();

            return view('page.participants.submissionstatus(participants).submissionStatus',['userSession'=>$userSession,'userSubmissionInfo' => $userSubmissionInfo,'paymentInfo' => $paymentStatus,'dataEvaluationForm'=>$dataEvaluationForm,'correction' => $correction,'paymentQR' => $paymentQR]);
        }elseif(session()->has('LoggedSuperAdmin')){
            $userSession = session()->get('LoggedSuperAdmin');
            $allSubmissionInfo = tbl_submission::all();
            $allReviewerInfo = tbl_admin_info::where('adminRole','Reviewer')->get();
            foreach ($allSubmissionInfo as $submissionInfo) {
                $paymentStatus = tbl_payment::where('submissionCode', $submissionInfo->submissionCode)->first();
                $correction = tbl_correction::where('submissionCode',$submissionInfo->submissionCode)->get();
                $correctionCount = $correction->count();
                $latestReturnCorrection = tbl_correction::where('numberOfTimes',$correctionCount)->first();
                $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionInfo->submissionCode)->first();
            }

            return view('page.submissionStatusPage(Super Admin)',['userSession'=>$userSession,'userSubmissionInfo' => $allSubmissionInfo,'allReviewerInfo' => $allReviewerInfo,'dataEvaluationForm'=>$dataEvaluationForm,'correction' => $latestReturnCorrection]);
        }elseif(session()->has('LoggedJKReviewer')){
            $userSession = session()->get('LoggedJKReviewer');
            $allSubmissionInfo = tbl_submission::all();
            $allReviewerInfo = tbl_admin_info::where('adminRole','Reviewer')->get();
            foreach ($allSubmissionInfo as $submissionInfo) {
                $paymentStatus = tbl_payment::where('submissionCode', $submissionInfo->submissionCode)->first();
                $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionInfo->submissionCode)->first();
                $correction = tbl_correction::where('submissionCode',$submissionInfo->submissionCode)->get();
                $correctionCount = $correction->count();
                $latestReturnCorrection = tbl_correction::where('numberOfTimes',$correctionCount)->first();
            }

            return view('page.Jk_Reviewer.reviewerList.reviewList(JK Reviewer)',['userSession'=>$userSession,'userSubmissionInfo' => $allSubmissionInfo,'allReviewerInfo' => $allReviewerInfo,'dataEvaluationForm'=>$dataEvaluationForm,'correction' => $latestReturnCorrection]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }
    
    public function download($filename)
    {
        $path = 'storage/paper/' . $filename;
        return response()->download($path, $filename);
    }

    public function uploadReceipt(Request $request,$submissionCode){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = "Receipt_".$submissionCode;
            $submissionInfo = tbl_submission::where('submissionCode',$submissionCode)->first();
            $paymentInfo = tbl_payment::where('submissionCode',$submissionCode)->first();
            $file->storeAs('uploads', $filename, 'public');
            $paymentInfo->paymentStatus = "Pending For Verification";
            if($paymentInfo->paymentID == $filename){
                $filename = "Receipt_". uniqid() . "_" . $submissionCode;
            }

            if($paymentInfo->paymentID != 'unavailable' && $paymentInfo != 'Complete'){
                $insertData = array('submissionCode'=>$submissionCode,'paymentID'=>$filename,'amount'=> 0 ,'paymentStatus'=>'Pending For Verification','paymentDate'=>now(),'proofOfPayment'=>$filename);
                DB::table('tbl_payment')->insert($insertData);
            }else{
                $paymentInfo->proofOfPayment = $filename;
                $paymentInfo->paymentID = $filename;
                $paymentInfo->paymentDate = now();
                $submissionInfo->paymentID = $filename;
                $submissionInfo->save();
                $paymentInfo->save();
            }

            return redirect()->back()->with('success', 'Receipt uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No file was uploaded.');
    }

}
