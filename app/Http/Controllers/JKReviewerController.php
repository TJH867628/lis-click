<?php

namespace App\Http\Controllers;

use App\Models\tbl_admin_info;
use App\Models\tbl_correction;
use App\Models\tbl_submission;
use App\Models\tbl_payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class JKReviewerController extends Controller
{

    function updateReviewer(request $request, $submissionCode){
        if(session()->has('LoggedJKReviewer') || session()->has('LoggedSuperAdmin')){
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
            }else{
                $submission->reviewer2ID = NULL;
            }
            $submission->reviewStatus = 'pending';
            $submission->save();
            return redirect()->back();
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }
    
        function cancelReviewer($submissionCode){
            if(session()->has('LoggedJKReviewer')|| session()->has('LoggedSuperAdmin')){
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


        function correctionForm($submissionCode){
            if(session()->has('LoggedJKReviewer')|| session()->has('LoggedSuperAdmin')){
                session()->start();
                $adminSession = session()->get('LoggedJKReviewer');
                $correction = tbl_correction::where('submissionCode',$submissionCode)->get();
                $correctionCount = $correction->count();

                $latestReturnCorrection = tbl_correction::where('numberOfTimes',$correctionCount)->first();
                $submission = tbl_submission::where('submissionCode',$submissionCode)->first();

                return view('page.Jk_Reviewer.correctionForm.correctionForm', ['correction' => $correction,'latestReturnCorrection' => $latestReturnCorrection,'submission' => $submission]);
            }elseif(session()->has('LoggedUser')){
                session()->start();
                $correction = tbl_correction::where('submissionCode',$submissionCode)->get();
                $correctionCount = $correction->count();
                $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
                $latestCorrection = tbl_correction::where('numberOfTimes',$correctionCount)->first();

                return view('page.participants.correctionForm.correctionForm', ['correction' => $correction,'latestCorrection'=>$latestCorrection,'submissionInfo' => $submission,'submissionCode' => $submissionCode]);

            }else{
                return redirect('login')->with('fail','Login Session Expire,Please Login again');
            }
        }

        function uploadNewCorrection(Request $request,$submissionCode){
            if(session()->has('LoggedJKReviewer') || session()->has('LoggedSuperAdmin')){
                session()->start();
                $correction = tbl_correction::where('submissionCode',$submissionCode)->get();
                $count = $correction->count();
                $comment =  $request->input('commentForCorrection');
                $data = array(
                    'submissionCode' => $submissionCode,
                    'numberOfTimes' => $count + 1,
                    'commentForCorrection' => $comment,
                    'created_at' => now(),
                    'updated_at' => now(),
                );
                DB::table('tbl_correction')->insert($data);
                return redirect()->back();
            }else{
                return redirect('login')->with('fail','Login Session Expire,Please Login again');
            }
        }

        function uploadFileWithCorrection(Request $request,$submissionCode){
            if(session()->has('LoggedUser')){
                session()->start();
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $submissionInfo = tbl_submission::where('submissionCode',$submissionCode)->first();
                    $correction = tbl_correction::where('submissionCode',$submissionCode)->first();
                    $count = $correction->count();
                    $latestCorrection = tbl_correction::where('numberOfTimes',$count)->first();
        
                    $filename = 'Correction_'. $latestCorrection->numberOfTimes . '_'. $submissionInfo->submissionCode . ".". $file->getClientOriginalExtension();
                    $latestCorrection->returnCorrectionLink = $filename;
                    $latestCorrection->updated_at;
                    $file->storeAs('returnCorrection', $filename, 'public');
                    $latestCorrection->save();
                    return redirect()->back()->with('success', 'File uploaded successfully.');
                }else{
                    return redirect()->back()->with('error', 'No File');
                }
            }else{
                return redirect('login')->with('fail','Login Session Expire,Please Login again');
            }
        }
    
        public function downloadReturnCorrection($filename)
        {
            $path = 'storage/returnCorrection/' . $filename;
            return response()->download($path, $filename);
        }

        public function doneCorrection($submissionCode){
            $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
            $submission->correctionPhase = "readyForPresent";
            $submission->save();

            //add payment details to tbl_payment
            $payment = new tbl_payment;
            $payment->submissionCode = $submissionCode;
            $payment->paymentStatus = "incomplete";
            $payment->paymentID = "unavailable";
            $payment->proofOfPayment = 'unavailable';
            $payment->save();

            return redirect()->back();
        }
    
        public function unDoneCorrection($submissionCode){
            $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
            $submission->correctionPhase = "pending";
            $submission->save();

            //remove payment details from tbl_payment
            $payment = tbl_payment::where('submissionCode',$submissionCode)->first();
            if($payment != NULL){
                $payment->delete();
            }

            return redirect()->back();
        }

        public function uploadCertificate(Request $request,$submissionCode){
            if(session()->has('LoggedJKReviewer') || session()->has('LoggedSuperAdmin')){
                session()->start();
                $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $timestamp = time();
                    $dateString = date('YmdHis', $timestamp);
                    $filename = 'Certificate_'. $submission->submissionCode . "_" . $dateString . ".". $file->getClientOriginalExtension();
                    $submission->certificate = $filename;
                    $file->storeAs('certificate', $filename, 'public');
                    $submission->save();
                    return redirect()->back()->with('success', 'File uploaded successfully.');
                }else{
                    return redirect()->back();
                }
            }else{
                return redirect('login')->with('fail','Login Session Expire,Please Login again');
            }
        }
        
}
