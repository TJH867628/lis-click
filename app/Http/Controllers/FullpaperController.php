<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tbl_participants_info;
use Carbon\Carbon;
use App\Models\tbl_submission;
use App\Mail\submission;
use Illuminate\Support\Facades\Mail;
use Exception;

class FullpaperController extends Controller
{
    public function index(){
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $user = tbl_participants_info::where('email',$userSession)->first();
            return view('page.participants.fullpaperSubmission.fullpaper',['userSession'=>$userSession,'user' => $user]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function storeFullpaper(request $request){
        
            if(session()->has('LoggedUser')){
                if ($request->hasFile('file_upload')) {
                    $userSession = session()->get('LoggedUser');
                    $date = now();
                    $user = tbl_participants_info::where('email',$userSession)->first();
                    $file = $request->file('file_upload');
                    // Get the current date and time
                    $currentDateTime = Carbon::now()->format('YmdHis');
    
                    $category = $request->input('category');
                    $submissionTitle = $request-> input('paper-title');
                    $presentMode = $request -> input('presentMode');
                    $category = $request->input('category');
                    $currentYear= Carbon::now()->format('Y');
    
                    if ($category === 'Paper Presentation & Publication'){
                        $submissionType = 'Paper Presentation & Publication';
                        $publish = True;
                    }else if($category === 'Paper Presentation ONLY'){
                        $submissionType = 'Paper Presentation ONLY';
                        $publish = False;
                    }else if($category === 'Poster Presentation ONLY'){
                        $submissionType = 'Poster Presentation ONLY';
                        $publish = False;
                    }else if($category === 'Publication ONLY'){
                        $submissionType = 'Publication ONLY';
                        $publish = True;
                    }else if($category === 'Student Presenter'){
                        $submissionType = 'Student Presenter';
                        $publish = False;
                    }else if($category === 'Audience Presenter'){
                        $submissionType = 'Audience Presenter';
                        $publish = False;
                    }
                    $subTheme = $request -> input('sub-theme');
                    if($subTheme === "Engineering & Technology"){
                        $categoryCode = "ENG";
                        $rows = tbl_submission::where('categoryCode',$categoryCode)->count();
                        if($rowsCurrentYear = tbl_submission::where('submissionCode', 'like', $currentYear . '%')->count() == 0){
                            $rows = 0;
                        }
                        $submissionCode = $currentYear . "_". $categoryCode . str_pad( str($rows + 1), 4, '0', STR_PAD_LEFT);
                    }else if($subTheme === "Social Science"){
                        $categoryCode = "SSC";
                        $rows = tbl_submission::where('categoryCode',$categoryCode)->count();
                        if($rowsCurrentYear = tbl_submission::where('submissionCode', 'like', $currentYear . '%')->count() == 0){
                            $rows = 0;
                        }
                        $submissionCode = $currentYear . "_" . $categoryCode . str_pad( str($rows + 1), 4, '0', STR_PAD_LEFT);
                    }else if($subTheme === "Information Technology (IT) & Communication"){
                        $categoryCode = "ITC";
                        $rows = tbl_submission::where('categoryCode',$categoryCode)->count();
                        if($rowsCurrentYear = tbl_submission::where('submissionCode', 'like', $currentYear . '%')->count() == 0){
                            $rows = 0;
                        }
                        $submissionCode = $currentYear . "_" . $categoryCode . str_pad( str($rows + 1), 4, '0', STR_PAD_LEFT);
                    }else if($subTheme === "Environment & Health"){
                        $categoryCode = "EHE";
                        $rows = tbl_submission::where('categoryCode',$categoryCode)->count();
                        if($rowsCurrentYear = tbl_submission::where('submissionCode', 'like', $currentYear . '%')->count() == 0){
                            $rows = 0;
                        }
                        $submissionCode = $currentYear . "_" . $categoryCode . str_pad( str($rows + 1), 4, '0', STR_PAD_LEFT);
                    }else if($subTheme === "Technical Vocational Education and Training"){
                        $categoryCode = "TVT";
                        $rows = tbl_submission::where('categoryCode',$categoryCode)->count();
                        if($rowsCurrentYear = tbl_submission::where('submissionCode', 'like', $currentYear . '%')->count() == 0){
                            $rows = 0;
                        }
                        $submissionCode = $currentYear . "_" . $categoryCode . str_pad( str($rows + 1), 4, '0', STR_PAD_LEFT);
                    }else if($subTheme === "Renewable Energy"){
                        $categoryCode = "REE";
                        $rows = tbl_submission::where('categoryCode',$categoryCode)->count();
                        if($rowsCurrentYear = tbl_submission::where('submissionCode', 'like', $currentYear . '%')->count() == 0){
                            $rows = 0;
                        }
                        $submissionCode = $currentYear . "_" . $categoryCode . str_pad( str($rows + 1), 4, '0', STR_PAD_LEFT);
                    }else if($subTheme === "Commerce"){
                        $categoryCode = "COM";
                        $rows = tbl_submission::where('categoryCode',$categoryCode)->count();
                        if($rowsCurrentYear = tbl_submission::where('submissionCode', 'like', $currentYear . '%')->count() == 0){
                            $rows = 0;
                        }
                        $submissionCode = $currentYear . "_" . $categoryCode . str_pad( str($rows + 1), 4, '0', STR_PAD_LEFT);
                    }else if($subTheme === "Multi-Discipline"){
                        $categoryCode = "MDC";
                        $rows = tbl_submission::where('categoryCode',$categoryCode)->count();
                        if($rowsCurrentYear = tbl_submission::where('submissionCode', 'like', $currentYear . '%')->count() == 0){
                            $rows = 0;
                        }
                        $submissionCode = $currentYear . "_" . $categoryCode . str_pad( str($rows + 1), 4, '0', STR_PAD_LEFT);
                    }

                    $participants1 = $user->email;//get name from user
                    $participants2 = $request -> input('participants2');
                    $participants3 = $request -> input('participants3');
                    // Generate the unique file name
                    $fileName = $categoryCode . '_' . $currentDateTime . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('paper', $fileName, 'public');
                    $insertData = array('submissionCode'=>$submissionCode,'submissionTitle'=>$submissionTitle,'submissionType'=>$category,'correctionPhase'=>'none','subTheme'=>$subTheme,'presentMode'=>$presentMode,'file_name'=>$fileName,'participants1'=>$participants1,'participants2'=>$participants2,'participants3'=>$participants3,'categoryCode'=>$categoryCode,'reviewStatus' => "None",'paymentID' => "unavailable",'reviewerID' => "pending",'publish'=>$publish,'created_at'=>$date,'updated_at'=>$date);
                    DB::table('tbl_submission')->where('participants1',$user->name)->insert($insertData);
                    $insertData = array('submissionCode'=>$submissionCode,'paymentID'=>'unavailable','paymentStatus'=>'Incomplete','paymentDate'=>null,'proofOfPayment'=>'unavailable');
                    DB::table('tbl_payment')->insert($insertData);
                    $mail = new submission();
                    $mail->setSubmissionCode($submissionCode);
                    Mail::to($user->email)->send($mail);
                    return redirect()->back()->with('success','Submitted Succesfully');
                }
            }
        
    }
}
