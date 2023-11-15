<?php
namespace App\Http\Controllers;

use App\Models\tbl_admin_info;
use App\Models\tbl_submission;
use App\Models\tbl_evaluation_form;
use App\Models\tbl_correction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
            $reviewerEmail = $reviewer->email;
            if(tbl_submission::where('reviewerID', $reviewerEmail)->first()){
                $submissionInfo = tbl_submission::where('reviewerID', $reviewerEmail)->get();
            }elseif(tbl_submission::where('reviewer2ID', $reviewerEmail)->first()){
                $submissionInfo = tbl_submission::where('reviewer2ID', $reviewerEmail)->get();
            }

            if(!isset($submissionInfo)){
                $submissionInfo = null;
            }   
            return view('page.reviewer.pendingreview.pendingreview',['reviewerEmail'=>$reviewerEmail,'submissionInfo' => $submissionInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function donereviewlist(){
        if(session()->has("LoggedReviewer")){
            session()->start();
            $adminSession = session()->get('LoggedReviewer');
            $reviewer = tbl_admin_info::where('email',$adminSession)->first();
            $reviewerEmail = $reviewer->email;
            if(tbl_submission::where('reviewerID', $reviewerEmail)->first()){
                $submissionInfo = tbl_submission::where('reviewerID', $reviewerEmail)->get();
            }elseif(tbl_submission::where('reviewer2ID', $reviewerEmail)->first()){
                $submissionInfo = tbl_submission::where('reviewer2ID', $reviewerEmail)->get();
            }

            if(!isset($submissionInfo)){
                $submissionInfo = null;
            }
            return view('page.reviewer.donereview.donereview',['reviewerEmail'=>$reviewerEmail,'submissionInfo' => $submissionInfo]);

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
            $reviewerEmail = $reviewer->email;
            if($submissionInfo->reviewerID == $reviewerEmail){
                $filename = $submissionInfo->file_name . '_Reviewed.'.$file->getClientOriginalExtension();
                $submissionInfo->returnPaperLink = $filename;
            }elseif($submissionInfo->reviewer2ID == $reviewerEmail){
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
            $reviewerEmail = $reviewer->email;
            if($submissionInfo->reviewerID == $reviewerEmail){
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
            }elseif($submissionInfo->reviewer2ID == $reviewerEmail){
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
        $file = 'storage/EvaluationForm/' . $filename;

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

    public function downloadReviewSubmission($filename){
        $file = 'storage/uploads/' . $filename;
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
    
    function download($filename)
    {
        $file = public_path('conferences_info/' . $filename);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        dd($extension);
    
        if ($extension == 'pdf') {
            return response()->file($file, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline',
            ]);
        } else{
            return response()->file($file);
        }
    }

    public function evaluationForm($submissionCode){
        $year = date('Y');
        if(session()->has("LoggedReviewer")){
            session()->start();
            $reviewerSession = session()->get('LoggedReviewer');
            $submissionInfo = tbl_submission::where('submissionCode',$submissionCode)->first();
            $reviewer = tbl_admin_info::where('email',$reviewerSession)->first();

            $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number',$submissionCode)->first();
            if($submissionInfo->reviewer2ID == null){
                $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)
                ->where('email', $reviewer->name)
                ->first();
                if($dataEvaluationForm){
                    return view('page.reviewer.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm , 'year' => $year]);
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
                        'recommended_as_best_paper' => false,
                        'additional_comments' => null,
                        'created_at' => now(),
                        'updated_at' => now()
                    );
                    DB::table('tbl_evaluation_form')->insert($data);
                    $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)
                    ->where('reviewer_name', $reviewer->name)
                    ->first();
                    return view('page.reviewer.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm , 'year' => $year]);
                }
            }elseif($submissionInfo->reviewer2ID != null){
                $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)
                    ->where('reviewer_name', $reviewer->name)
                    ->first();
                if($dataEvaluationForm){
                    
                    return view('page.reviewer.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm , 'year' => $year]);
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
                        'recommended_as_best_paper' => false,
                        'additional_comments' => null,
                        'created_at' => now(),
                        'updated_at' => now()
                    );
                    DB::table('tbl_evaluation_form')->insert($data);
                    $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)
                    ->where('reviewer_name', $reviewer->name)
                    ->first();
                    return view('page.reviewer.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm , 'year' => $year]);
                }
            }
        }elseif(session()->has("LoggedJKReviewer")){
            $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)->get();
            $logo_lis = public_path('images/Logo1 (1).png');
            $logo_pmj = public_path('images/logo_PMJ.png');
            return view('page.Jk_Reviewer.evaluationForm.evaluationForm',['dataEvaluationForm' => $dataEvaluationForm,'year' => $year,'logo_lis' => $logo_lis,'logo_pmj' => $logo_pmj]);

        }elseif(session()->has("LoggedUser")){
            $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $submissionCode)->get();
            $logo_lis = public_path('images/Logo1 (1).png');
            $logo_pmj = public_path('images/logo_PMJ.png');
            $pdf = PDF::loadView('page.participants.evaluationForm.evaluationFormContent',['dataEvaluationForm' => $dataEvaluationForm,'year' => $year,'logo_lis' => $logo_lis,'logo_pmj' => $logo_pmj]);
            return response($pdf->stream('evaluationForm.pdf'))->header('Content-Type', 'application/pdf');

        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }

    }

    public function generatePDFEvaluationForm($id){
        $year = date('Y');
        if(session()->has("LoggedJKReviewer")){
            session()->start();
            $reviewerSession = session()->get('LoggedJKReviewer');
            $dataEvaluationForm = tbl_evaluation_form::where('paper_id_number', $id)->get();
            $logo_lis = public_path('images/Logo1 (1).png');
            $logo_pmj = public_path('images/logo_PMJ.png');
            $pdf = PDF::loadView('page.Jk_Reviewer.evaluationFormPdfTemplate.evaluationFormPdfTemplateContent',['dataEvaluationForm' => $dataEvaluationForm,'year' => $year,'logo_lis' => $logo_lis,'logo_pmj' => $logo_pmj]);
        }else if(session()->has("LoggedReviewer")){
            session()->start();
            $reviewerSession = session()->get('LoggedReviewer');
            $dataEvaluationForm = tbl_evaluation_form::where('id', $id)->get();
            $logo_lis = public_path('images/Logo1 (1).png');
            $logo_pmj = public_path('images/logo_PMJ.png');
            $pdf = PDF::loadView('page.reviewer.evaluationFormPdfTemplate.evaluationFormPdfTemplateContent',['dataEvaluationForm' => $dataEvaluationForm,'year' => $year,'logo_lis' => $logo_lis,'logo_pmj' => $logo_pmj]);
        }
       
        return response($pdf->stream('evaluationForm.pdf'))->header('Content-Type', 'application/pdf');
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
            $recommendedAsBestPaper = $request->input('recommendedAsBestPaper');
            if($recommendedAsBestPaper === "on"){
                $recommendedAsBestPaper = true;
            }
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
                'recommended_as_best_paper' => $recommendedAsBestPaper,
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
