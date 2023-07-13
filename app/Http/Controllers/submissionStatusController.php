<?php

namespace App\Http\Controllers;
use App\Models\tbl_submission;
use App\Models\tbl_admin_info;
use App\Models\tbl_payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class submissionStatusController extends Controller
{
    function index(){
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $userSubmissionInfo = tbl_submission::where('participants1', $userSession)
                ->orWhere('participants2', $userSession)
                ->orWhere('participants3', $userSession) 
                ->get();

                foreach ($userSubmissionInfo as $submissionInfo) {
                    $paymentStatus = tbl_payment::where('submissionCode', $submissionInfo->submissionCode)->first();
                }
            return view('page.participants.submissionstatus(participants).submissionstatus',['userSession'=>$userSession,'userSubmissionInfo' => $userSubmissionInfo,'paymentInfo' => $paymentStatus]);
        }elseif(session()->has('LoggedSuperAdmin')){
            $userSession = session()->get('LoggedSuperAdmin');
            $allSubmissionInfo = tbl_submission::all();
            $allReviewerInfo = tbl_admin_info::where('adminRole','Reviewer')->get();
            return view('page.submissionStatusPage(Super Admin)',['userSession'=>$userSession,'userSubmissionInfo' => $allSubmissionInfo,'allReviewerInfo' => $allReviewerInfo]);
        }elseif(session()->has('LoggedJKReviewer')){
            $userSession = session()->get('LoggedJKReviewer');
            $allSubmissionInfo = tbl_submission::all();
            $allReviewerInfo = tbl_admin_info::where('adminRole','Reviewer')->get();
            return view('page.Jk_Reviewer.reviewerList.reviewList(JK Reviewer)',['userSession'=>$userSession,'userSubmissionInfo' => $allSubmissionInfo,'allReviewerInfo' => $allReviewerInfo]);
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
