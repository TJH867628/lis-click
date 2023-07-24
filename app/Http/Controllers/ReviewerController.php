<?php

namespace App\Http\Controllers;

use App\Models\tbl_admin_info;
use App\Models\tbl_submission;
use App\Models\tbl_evaluation_form;
use App\Models\tbl_correction;
use Illuminate\Support\Facades\DB;
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
            $reviewer = tbl_admin_info::where('email',$adminSession)->first();
            $reviewername = $reviewer->name;
            if(tbl_submission::where('reviewerID', $reviewername)->first()){
                $submissionInfo = tbl_submission::where('reviewerID', $reviewername)->get();
            }elseif(tbl_submission::where('reviewer2ID', $reviewername)->first()){
                $submissionInfo = tbl_submission::where('reviewer2ID', $reviewername)->get();
            }
            return view('page.reviewer.pendingreview.pendingreview',['reviewername'=>$reviewername,'submissionInfo' => $submissionInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function donereviewlist(){
        if(session()->has("LoggedReviewer")){
            session()->start();
            $adminSession = session()->get('LoggedReviewer');
            $reviewer = tbl_admin_info::where('email',$adminSession)->first();
            $reviewername = $reviewer->name;
            if(tbl_submission::where('reviewerID', $reviewername)->first()){
                $submissionInfo = tbl_submission::where('reviewerID', $reviewername)->get();
            }elseif(tbl_submission::where('reviewer2ID', $reviewername)->first()){
                $submissionInfo = tbl_submission::where('reviewer2ID', $reviewername)->get();
            }
            return view('page.reviewer.donereview.donereview',['reviewername'=>$reviewername,'submissionInfo' => $submissionInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function uploadReviewSubmission(Request $request,$submisisonCode){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $submissionInfo = tbl_submission::where('submissionCode',$submisisonCode)->first();

            $adminSession = session()->get('LoggedReviewer');
            $reviewer = tbl_admin_info::where('email',$adminSession)->first();
            $reviewername = $reviewer->name;
            if($submissionInfo->reviewerID == $reviewername){
                $filename = $submissionInfo->file_name . '_Reviewed.'.$file->getClientOriginalExtension();
                $submissionInfo->returnPaperLink = $filename;
            }elseif($submissionInfo->reviewer2ID == $reviewername){
                $filename = $submissionInfo->file_name . '_Reviewed2.'.$file->getClientOriginalExtension();
                $submissionInfo->returnPaperLink2 = $filename;
            }
            $file->storeAs('uploads', $filename, 'public');
            $submissionInfo->save();
            return redirect()->back()->with('success', 'File uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No file was uploaded.');
    }

    public function uploadEvaluationForm(Request $request,$submisisonCode){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $submissionInfo = tbl_submission::where('submissionCode',$submisisonCode)->first();
            
            $adminSession = session()->get('LoggedReviewer');
            $reviewer = tbl_admin_info::where('email',$adminSession)->first();
            $reviewername = $reviewer->name;
            if($submissionInfo->reviewerID == $reviewername){
                $filename = $submissionInfo->file_name . '_EvaluationForm.'.$file->getClientOriginalExtension();
                $submissionInfo->evaluationFormLink = $filename;
                if($submissionInfo->reviewer2ID == null){
                    $submissionInfo->reviewStatus = 'done';
                    $submissionInfo->correctionPhase = 'pending';
                    
                }elseif($submissionInfo->reviewer2ID != null){
                    if($submissionInfo->evaluationFormLink2 != null){
                        $submissionInfo->reviewStatus = 'done';
                        $submissionInfo->correctionPhase = 'pending';
                }
                }
            }elseif($submissionInfo->reviewer2ID == $reviewername){
                $filename = $submissionInfo->file_name . '_EvaluationForm2.'.$file->getClientOriginalExtension();
                $submissionInfo->evaluationFormLink2 = $filename;
                if($submissionInfo->evaluationFormLink != null){
                    $submissionInfo->reviewStatus = 'done';
                    $submissionInfo->correctionPhase = 'pending';
                }
            }
            $file->storeAs('EvaluationForm', $filename, 'public');
            $submissionInfo->save();
            return redirect()->back()->with('success', 'File uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No file was uploaded.');
    }

    public function downloadEvaluationForm($filename){
        $path = 'storage/EvaluationForm/' . $filename;
        return response()->download($path, $filename);
    }

    public function downloadReviewSubmission($filename){
        $path = 'storage/uploads/' . $filename;
        return response()->download($path, $filename);
    }

    public function evaluationForm($submissionCode){
        if(session()->has("LoggedReviewer")){
            session()->start();
            $reviewerSession = session()->get('LoggedReviewer');
            $submissionInfo = tbl_submission::where('submissionCode',$submissionCode)->first();
            $reviewer = tbl_admin_info::where('email',$reviewerSession)->first();

            $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number',$submissionCode)->first();
            if($submissionInfo->reviewer2ID == null){
                $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)
                ->where('reviewer_name', $reviewer->name)
                ->first();
                if($dataEvaluationForm){
                    return view('page.reviewer.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm]);
                }else{
                    $data = array(
                        'reviewer_name' => $reviewer->name,
                        'email' => $reviewer->email,
                        'paper_id_number' => $submissionCode,
                        'title_of_paper_reviewed' => $submissionInfo->submissionTitle,
                        'date_of_reviewed' => null,
                        'comments_abstract' => null,
                        'comments_introduction' => null,
                        'comments_literature_review' => null,
                        'comments_methodology' => null,
                        'comments_results' => null,
                        'comments_discussion' => null,
                        'comments_references' => null,
                        'originality' => null,
                        'contribution_to_field' => null,
                        'technical_quality' => null,
                        'clarity_of_presentation' => null,
                        'depth_of_research' => null,
                        'recommendation' => null,
                        'specific_reject_reason' => null,
                        'additional_comments' => null,
                        'created_at' => now(),
                        'updated_at' => now()
                    );
                    DB::table('tbl_evaluation_form')->insert($data);
                    $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)
                    ->where('reviewer_name', $reviewer->name)
                    ->first();
                    return view('page.reviewer.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm]);
                }
            }elseif($submissionInfo->reviewer2ID != null){
                $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)
                    ->where('reviewer_name', $reviewer->name)
                    ->first();
                if($dataEvaluationForm){
                    
                    return view('page.reviewer.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm]);
                }else{
                    $data = array(
                        'reviewer_name' => $reviewer->name,
                        'email' => $reviewer->email,
                        'paper_id_number' => $submissionCode,
                        'title_of_paper_reviewed' => $submissionInfo->submissionTitle,
                        'date_of_reviewed' => now(),
                        'comments_abstract' => null,
                        'comments_introduction' => null,
                        'comments_literature_review' => null,
                        'comments_methodology' => null,
                        'comments_results' => null,
                        'comments_discussion' => null,
                        'comments_references' => null,
                        'originality' => null,
                        'contribution_to_field' => null,
                        'technical_quality' => null,
                        'clarity_of_presentation' => null,
                        'depth_of_research' => null,
                        'recommendation' => null,
                        'specific_reject_reason' => null,
                        'additional_comments' => null,
                        'created_at' => now(),
                        'updated_at' => now()
                    );
                    DB::table('tbl_evaluation_form')->insert($data);
                    $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)
                    ->where('reviewer_name', $reviewer->name)
                    ->first();
                    return view('page.reviewer.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm]);
                }
            }
        }elseif(session()->has("LoggedJKReviewer")){
            $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)->get();
            return view('page.Jk_Reviewer.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm]);

        }elseif(session()->has("LoggedUser")){
            $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)->get();
            return view('page.participants.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm]);

        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }

    }
    public function submitEvaluationForm(Request $request,$submissionCode){
        if(session()->has("LoggedReviewer")){
            session()->start();
            $reviewerSession = session()->get('LoggedReviewer');
            // Retrieve the form field values using $request->input()
            $reviewerName = $request->input('reviewer_name');
            $email = $request->input('email');
            $paperIdNumber = $request->input('paper_id_number');
            $titleOfPaperReviewed = $request->input('title_of_paper_reviewed');
            $dateOfReviewed = $request->input('date_of_reviewed');
            $commentsAbstract = $request->input('comments_abstract');
            $commentsIntroduction = $request->input('comments_introduction');
            $commentsLiteratureReview = $request->input('comments_literature_review');
            $commentsMethodology = $request->input('comments_methodology');
            $commentsResults = $request->input('comments_results');
            $commentsDiscussion = $request->input('comments_discussion');
            $commentsReferences = $request->input('comments_references');
            $originality = $request->input('originality');
            $contributionToField = $request->input('contribution_to_field');
            $technicalQuality = $request->input('technical_quality');
            $clarityOfPresentation = $request->input('clarity_of_presentation');
            $depthOfResearch = $request->input('depth_of_research');
            $recommendation = $request->input('recommendation');
            $specificRejectReason = $request->input('specific_reject_reason');
            $additionalComments = $request->input('additional_comments');
            $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number',$submissionCode)->first();
            $data = array(
                'reviewer_name' => $reviewerName,
                'email' => $email,
                'paper_id_number' => $paperIdNumber,
                'title_of_paper_reviewed' => $titleOfPaperReviewed,
                'date_of_reviewed' => $dateOfReviewed,
                'comments_abstract' => $commentsAbstract,
                'comments_introduction' => $commentsIntroduction,
                'comments_literature_review' => $commentsLiteratureReview,
                'comments_methodology' => $commentsMethodology,
                'comments_results' => $commentsResults,
                'comments_discussion' => $commentsDiscussion,
                'comments_references' => $commentsReferences,
                'originality' => $originality,
                'contribution_to_field' => $contributionToField,
                'technical_quality' => $technicalQuality,
                'clarity_of_presentation' => $clarityOfPresentation,
                'depth_of_research' => $depthOfResearch,
                'recommendation' => $recommendation,
                'specific_reject_reason' => $specificRejectReason,
                'additional_comments' => $additionalComments,
                'updated_at' => now()
            );
        
            DB::table('tbl_evaluation_form')->where('paper_id_number', $paperIdNumber)->update($data);
            return redirect()->refresh();

        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }



}
