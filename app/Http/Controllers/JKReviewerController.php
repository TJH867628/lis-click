<?php

namespace App\Http\Controllers;

use App\Models\tbl_account;
use App\Models\tbl_admin_info;
use App\Models\tbl_audience;
use App\Models\tbl_correction;
use App\Models\tbl_evaluation_form;
use App\Models\tbl_submission;
use App\Models\tbl_payment;
use App\Models\tbl_participants_info;
use App\Models\tbl_apply_for_reviewer;
use App\Mail\cameraReady;
use App\Mail\correction_notification;
use App\Mail\application_for_reviewer_approved;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
            $submission->reviewerID = $reviewer->email;
            if($selectedReviewer2 != "None"){
                $reviewer2 = tbl_admin_info::where('email',$selectedReviewer2)->first();
                $submission->reviewer2ID = $reviewer2->email;
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

                $latestReturnCorrection = $correction->where('numberOfTimes',$correctionCount)->first();
                $submission = tbl_submission::where('submissionCode',$submissionCode)->first();

                return view('page.Jk_Reviewer.correctionForm.correctionForm', ['correction' => $correction,'latestReturnCorrection' => $latestReturnCorrection,'submission' => $submission]);
            }elseif(session()->has('LoggedUser')){
                session()->start();
                $correction = tbl_correction::where('submissionCode',$submissionCode)->get();
                $correctionCount = $correction->count();
                $submission = $correction->where('numberOfTimes',$correctionCount)->first();
                $latestCorrection = tbl_correction::where('submissionCode',$submissionCode)->where('numberOfTimes',$correctionCount)->first();

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
                $submission = tbl_submission::where('submissionCode', $submissionCode)->first();
                $participants1Name = tbl_participants_info::where('email',$submission->participants1)->first();
                $mailToUser = new correction_notification;
                $mailToUser->setSubmissionInfo($submission,$participants1Name);
                $validator = Validator::make(['email' => $submission->participants1], [
                    'email' => 'email',
                ]); 

                if ($validator->passes()) {

                    Mail::to($submission->participants1)->send($mailToUser);
                // Validate and send the email to participants2 or participants3
                } 
                    
                if ($submission->participants2 != null) {
                    
                    $validator = Validator::make(['email' => $submission->participants2], [
                        'email' => 'email',
                    ]);

                    if ($validator->passes()) {
                        Mail::to($submission->participants2)->send($mailToUser);
                    }
                }

                    
                    if ($submission->participants3 != null) {

                    $validator = Validator::make(['email' => $submission->participants3], [
                        'email' => 'email',
                    ]);

                    if ($validator->passes()) {
                        Mail::to($submission->participants3)->send($mailToUser);
                    }
                }

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
                    $correction = tbl_correction::where('submissionCode',$submissionCode)->get();
                    $count = $correction->count();
                    $latestCorrection = $correction->where('numberOfTimes',$count)->first();
        
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
            $file = 'storage/returnCorrection/' . $filename;
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

        public function doneCorrection($submissionCode){
            $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
            $submission->correctionPhase = "readyForPresent";
            $submission->save();
            $participants1Name = tbl_participants_info::where('email',$submission->participants1)->first();
            $mailToUser = new cameraReady;
            $mailToUser->setSubmissionInfo($submission,$participants1Name);
            $validator = Validator::make(['email' => $submission->participants1], [
                'email' => 'email',
            ]); 

            if ($validator->passes()) {

                Mail::to($submission->participants1)->send($mailToUser);
            // Validate and send the email to participants2 or participants3
            } 
                
            if ($submission->participants2 != null) {
                
                $validator = Validator::make(['email' => $submission->participants2], [
                    'email' => 'email',
                ]);

                if ($validator->passes()) {
                    Mail::to($submission->participants2)->send($mailToUser);
                }
            }

                
                if ($submission->participants3 != null) {

                $validator = Validator::make(['email' => $submission->participants3], [
                    'email' => 'email',
                ]);

                if ($validator->passes()) {
                    Mail::to($submission->participants3)->send($mailToUser);
                }
            }

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

        public function uploadParticipantsCertificate(Request $request,$submissionCode){
            if(session()->has('LoggedJKReviewer') || session()->has('LoggedSuperAdmin')){
                session()->start();
                $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $timestamp = time();
                    $dateString = date('YmdHis', $timestamp);
                    $filename = 'Participants_Certificate_'. $submission->submissionCode . "_" . $dateString . ".". $file->getClientOriginalExtension();
                    $submission->participants_certificate = $filename;
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

        
        public function uploadPresentationCertificate(Request $request,$submissionCode){
            if(session()->has('LoggedJKReviewer') || session()->has('LoggedSuperAdmin')){
                session()->start();
                $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $timestamp = time();
                    $dateString = date('YmdHis', $timestamp);
                    $filename = 'Presentation_Certificate_'. $submission->submissionCode . "_" . $dateString . ".". $file->getClientOriginalExtension();
                    $submission->presentation_certificate = $filename;
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
        
        public function downloadParticipantsCertificate($filename)
        {
            $file = 'storage/certificate/' . $filename;
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

        public function downloadPresentationCertificate($filename)
        {
            $file = 'storage/certificate/' . $filename;
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

        public function uploadCleanedDocument(Request $request,$submissionCode){
            if(session()->has('LoggedJKReviewer') || session()->has('LoggedSuperAdmin')){
                session()->start();
                $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $timestamp = time();
                    $dateString = date('YmdHis', $timestamp);
                    $filename = 'Cleaned_'. $submission->submissionCode . "_" . $dateString . ".". $file->getClientOriginalExtension();
                    $submission->cleanedDocument = $filename;
                    $file->storeAs('cleanedDocument', $filename, 'public');
                    $submission->save();
                    return redirect()->back()->with('success', 'File uploaded successfully.');
                }else{
                    return redirect()->back();
                }
            }else{
                return redirect('login')->with('fail','Login Session Expire,Please Login again');
            }
        }

        public function downloadCleanedDocument($filename)
        {
            $file = 'storage/cleanedDocument/' . $filename;
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

        public function indexRecommendedSubmissionList(){
            $recommendedSubmissionList = tbl_evaluation_form::where('recommended_as_best_paper',1)->get();
            $recommendedSubmission = [];
            foreach ($recommendedSubmissionList as $thisRecommendedSubmission) {
                $submission = tbl_submission::where('submissionCode', $thisRecommendedSubmission->paper_id_number)->where('reviewStatus','done')->first();
    
                if ($submission && !isset($recommendedSubmission[$submission->submissionCode])) {
                    $recommendedSubmission[] = $submission; // Add the result to the $recommendedSubmission collection
                }
            }

            return view('page.Jk_Reviewer.recommendedSubmissionList.recommendedSubmissionList', ['recommendedSubmission'=>$recommendedSubmission]);
        }

        public function audienceList(){
            if(session()->has('LoggedJKReviewer')){
                session()->start();
                $audienceList = tbl_audience::all();

                return view('page.Jk_Reviewer.audienceList.audienceList', ['audienceList'=>$audienceList]);
            }else{
                return redirect('login')->with('fail','Login Session Expire,Please Login again');
            }
            
        }

        public function uploadAudienceCertificate(Request $request,$id){
            if(session()->has('LoggedJKReviewer') || session()->has('LoggedSuperAdmin')){
                session()->start();
                $audience = tbl_audience::where('id',$id)->first();
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $timestamp = time();
                    $dateString = date('YmdHis', $timestamp);
                    $filename = 'certificate_'. $audience->id . "_" . $dateString . ".". $file->getClientOriginalExtension();
                    $audience->certificate = $filename;
                    $file->storeAs('certificate', $filename, 'public');
                    $audience->save();
                    return redirect()->back()->with('success', 'File uploaded successfully.');
                }else{
                    return redirect()->back();
                }
            }else{
                return redirect('login')->with('fail','Login Session Expire,Please Login again');
            }
        }

        public function downloadAudienceCertificate($filename)
        {
            $file = 'storage/certificate/' . $filename;
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

        public function callForReviewer(){
            if(session()->has('LoggedUser')){
                $user = tbl_participants_info::where('email',session()->get('LoggedUser'))->first();
                $hasApply = null;
                if(tbl_apply_for_reviewer::where('email', $user->email)->first()){
                    $hasApply = tbl_apply_for_reviewer::where('email', $user->email)->first();
                }
                return view('page.participants.applyForReviewer.applyForReviewer',['user' => $user,'hasApply' => $hasApply]);
            }else{
                return view('page.visitor.applyForReviewer.applyForReviewer');
            }
        }

        public function callForReviewerList(){
            if(session()->has('LoggedJKReviewer')){
                $applyForReviewerList = tbl_apply_for_reviewer::all();
                
                return view('page.Jk_Reviewer.callForReviewerList.callForReviewerList',['applyForReviewerList'=>$applyForReviewerList]);
            }
        }

        public function applyForReviewer(Request $request){
            $email = $request->input('email');
            $highestEducation = $request->input('highestEducation');
            if(tbl_apply_for_reviewer::where('email', $email)->first()){
                $applier = tbl_apply_for_reviewer::where('email', $email)->first();
            }else{
                $applier = new tbl_apply_for_reviewer;
            }
            $applier->email = $email;
            $applier->highest_education_level = $highestEducation;
            if($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $timestamp = time();
                $dateString = date('YmdHis', $timestamp);
                $filename = "Support_Doc_" . $email . "_" . $dateString . ".". $extension;
                $file->storeAs('reviewerSupportDocument', $filename, 'public');
                $applier->file_to_support = $filename;
            }
            $applier->created_at = now();
            $applier->updated_at = now();
            $applier->save();
            return redirect()->back()->with('success','Apply for Review Successful, please be patient for approvement');
        }

        public function downloadSupportDocument($filename)
        {
            $file = 'storage/reviewerSupportDocument/' . $filename;
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

        public function approveApplicationForReviewer($userId){
            $application = tbl_apply_for_reviewer::where('id', $userId)->first();
            $email = $application->email;
            $validator = Validator::make(['email' => $email], [
                'email' => 'email',
            ]);

            if(!$validator->passes()){
                $application->remove();
                return redirect()->back()->with('error','The Email for that application is not valid and had been auto removed.');
            }

            $application->isApprove = 1;
            $application->save();
            
            $atPosition = strpos($email, "@");
            $username = substr($email, 0, $atPosition);
            $newReviewer = new tbl_admin_info;
            $newReviewer->IC_No = "please change this field"; 
            $newReviewer->name = "please change this field"; 
            $newReviewer->salutation = "please change this field"; 
            $newReviewer->email = $username; 
            $newReviewer->phoneNumber = "please change this field";
            $newReviewer->organizationName = "please change this field";
            $newReviewer->adminRole = "Reviewer";
            $newReviewer->status = true;
            $newReviewer->created_at = now();
            $newReviewer->updated_at = now();
            $newReviewer->save();

            $password = hash('sha512',$username);
            $newAccount = new tbl_account;
            $newAccount->email = $username;
            $newAccount->password = $password;
            $newAccount->isAdmin = true;
            $newAccount->created_at = now();
            $newAccount->updated_at = now();
            $newAccount->save();

            $mailToUser = new application_for_reviewer_approved;
            $mailToUser->setSubmissionInfo($username,$username);
             
            if ($validator->passes()) {
                Mail::to($email)->send($mailToUser);
            // Validate and send the email to participants2 or participants3
            }

            return redirect()->back()->with('success','New Reviewer Approved');
        }

        public function reviewerList(){
            if(session()->has("LoggedJKReviewer")){
                session()->start();
                $adminSession = session()->get('LoggedJKReviewer');
                $reviewer  = tbl_admin_info::where("adminRole",'Reviewer')->get();
                return view('page.Jk_Reviewer.reviewerList.reviewerList',['adminSession'=>$adminSession,'reviewer' => $reviewer]);
            }else{
                return redirect('login')->with('fail','Login Session Expire,Please Login again');
            }
        }


}
