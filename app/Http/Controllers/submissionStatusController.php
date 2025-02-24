<?php

namespace App\Http\Controllers;
use App\Models\tbl_audience;
use App\Models\tbl_participants_info;
use App\Models\tbl_submission;
use App\Models\tbl_admin_info;
use App\Models\tbl_evaluation_form;
use App\Models\tbl_correction;
use App\Models\tbl_payment;
use App\Models\tbl_masterdata;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class submissionStatusController extends Controller
{
    function index(){
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $correctionCount = 0;
            $userSubmissionInfo = tbl_submission::where('participants1', $userSession)->get();

            foreach ($userSubmissionInfo as $key => $submissionInfo) {
                $paymentStatus = tbl_payment::where('submissionCode', $submissionInfo->submissionCode)->get();
                $correction = tbl_correction::where('submissionCode',$submissionInfo->submissionCode)->get();
                $correctionCount = $correction->count();
                $latestReturnCorrection = tbl_correction::where('numberOfTimes',$correctionCount)->first();
                $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionInfo->submissionCode)->first();

                $userSubmissionInfo[$key]->paymentStatus = $paymentStatus;
                $userSubmissionInfo[$key]->dataEvaluationForm = $dataEvaluationForm;
                $userSubmissionInfo[$key]->correction = $correction;
                $userSubmissionInfo[$key]->latestReturnCorrection = $latestReturnCorrection;
            }
            $correction = tbl_correction::all();
            $paymentQR = tbl_masterdata::where('masterdata_name','paymentQR')->first();

            return view('page.participants.submissionstatus(participants).submissionStatus',['userSession'=>$userSession,'userSubmissionInfo' => $userSubmissionInfo,'paymentQR' => $paymentQR]);
        }elseif(session()->has('LoggedSuperAdmin')){
            $userSession = session()->get('LoggedSuperAdmin');
            $allSubmissionInfo = tbl_submission::all();
            $allReviewerInfo = tbl_admin_info::where('adminRole','Reviewer')->get();
            foreach ($allSubmissionInfo as $key => $submissionInfo) {
                $paymentStatus = tbl_payment::where('submissionCode', $submissionInfo->submissionCode)->get();
                $correction = tbl_correction::where('submissionCode',$submissionInfo->submissionCode)->get();
                $correctionCount = $correction->count();
                $latestReturnCorrection = tbl_correction::where('numberOfTimes',$correctionCount)->first();
                $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionInfo->submissionCode)->first();

                $allSubmissionInfo[$key]->paymentStatus = $paymentStatus;
                $allSubmissionInfo[$key]->dataEvaluationForm = $dataEvaluationForm;
                $allSubmissionInfo[$key]->correction = $correction;
                $allSubmissionInfo[$key]->latestReturnCorrection = $latestReturnCorrection;
            }
            
            return view('page.superadmin.submissionStatus(SuperAdmin).submissionStatus',['userSession'=>$userSession,'userSubmissionInfo' => $allSubmissionInfo,'allReviewerInfo' => $allReviewerInfo]);
        }elseif(session()->has('LoggedJKReviewer')){
            $userSession = session()->get('LoggedJKReviewer');
            $allSubmissionInfo = tbl_submission::all();
            $allReviewerInfo = tbl_admin_info::where('adminRole','Reviewer')->get();

            
            foreach ($allSubmissionInfo as $key =>$submissionInfo) {
                $paymentStatus = tbl_payment::where('submissionCode', $submissionInfo->submissionCode)->first();
                $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionInfo->submissionCode)->first();
                $correction = tbl_correction::where('submissionCode',$submissionInfo->submissionCode)->get();
                $correctionCount = $correction->count();
                $latestReturnCorrection = tbl_correction::where('submissionCode',$submissionInfo->submissionCode)->where('numberOfTimes',$correctionCount)->first();

                $allSubmissionInfo[$key]->paymentStatus = $paymentStatus;
                $allSubmissionInfo[$key]->dataEvaluationForm = $dataEvaluationForm;
                $allSubmissionInfo[$key]->correction = $correction;
                $allSubmissionInfo[$key]->latestReturnCorrection = $latestReturnCorrection;
            }

            return view('page.Jk_Reviewer.reviewList.reviewList(JK Reviewer)',['userSession'=>$userSession,'userSubmissionInfo' => $allSubmissionInfo,'allReviewerInfo' => $allReviewerInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }
    
    public function download($filename)
    {
        $file = 'storage/paper/' . $filename;
        $extension = pathinfo($file, PATHINFO_EXTENSION);
    
        if ($extension == 'pdf') {
            return response()->file($file, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline',
            ]);
        } else{
            return response()->file($file);
        }
    }

    public function uploadReceipt(Request $request,$submissionCode){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $paymentID =  "Receipt_".$submissionCode;
            $now = now();
            $now = $now->format('YmdHis');
            $filename = "Receipt_". $now . "_" . $submissionCode . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/receipt'), $filename);
            $currentYear= Carbon::now()->format('Y');
            $totalPaymentReceipt = tbl_payment::where('submissionCode',$submissionCode)->get()->count();
            $thisPaymentID = $paymentID . "_" . $totalPaymentReceipt + 1;

            if(tbl_participants_info::where('id',$submissionCode)->first()){
                $categoryCode = "AUD";
                $rows = tbl_payment::where('submissionCode', 'like', '%' . $categoryCode . '%')->count();
                $userId = $submissionCode;
                $submissionCode = $currentYear . "_" . $categoryCode . str_pad( str($rows + 1), 4, '0', STR_PAD_LEFT);
                $paymentID =  "Receipt_AUD_".tbl_participants_info::where('id',$userId)->first()->name;
                $thisPaymentID = $paymentID . "_" . $rows + 1;
                $paymentInfo = new tbl_payment;
                $paymentInfo->participantsEmail = tbl_participants_info::where('id',$userId)->first()->email;
                $paymentInfo->submissionCode = $submissionCode;
                $paymentInfo->paymentID = $thisPaymentID;
                $paymentInfo->paymentStatus = "Pending For Verification";
                $paymentInfo->paymentDate = $now;
                $paymentInfo->proofOfPayment = $filename;
                $paymentInfo->created_at = now();
                $paymentInfo->updated_at = now();
                $paymentInfo->save();

                $audience = tbl_audience::where('email',tbl_participants_info::where('id',$userId)->first()->email)->first();
                if(!isset($audience)){
                    $audience = new tbl_audience;
                    $audience->email = tbl_participants_info::where('id',$userId)->first()->email;
                    $audience->payment_status = "Pending For Verification";
                    $audience->certificate = null;
                    $audience->save();
                }
        
            }else{
                $paymentInfo = new tbl_payment;
                $paymentInfo->submissionCode = $submissionCode;
                $paymentInfo->paymentID = $thisPaymentID;
                $paymentInfo->paymentStatus = "Pending For Verification";
                $paymentInfo->paymentDate = $now;
                $paymentInfo->proofOfPayment = $filename;
                $paymentInfo->created_at = now();
                $paymentInfo->updated_at = now();
                $paymentInfo->save();
            }
            
            
            return redirect()->back()->with('success', 'Receipt uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No file was uploaded.');
    }

    public function downloadPaymentReceipt($proofOfPayment){
        $file = 'storage/receipt/' . $proofOfPayment;
        $extension = pathinfo($file, PATHINFO_EXTENSION);
    
        if ($extension == 'pdf') {
            return response()->file($file, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline',
            ]);
        } else{
            return response()->download($file);
        }  

    }

}
