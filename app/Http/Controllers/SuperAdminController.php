<?php

namespace App\Http\Controllers;
use App\Models\tbl_admin_info;
use App\Models\tbl_masterdata;
use App\Models\tbl_participants_info;
use App\Models\tbl_page;
use App\Models\tbl_submission;
use App\Models\tbl_review_info;
use App\Models\tbl_payment;
use Illuminate\Http\Request;
use App\Models\tbl_superadmintask;

class SuperAdminController extends Controller
{

    public function adminList(){
        if(session()->has("LoggedSuperAdmin")){
            session()->start();
            $adminSession = session()->get('LoggedSuperAdmin');
            $adminInfo  = tbl_admin_info::all();
            return view('page.superadmin.adminList.adminList(Super Admin)',['adminSession'=>$adminSession,'admin' => $adminInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function participantsList(){
        if(session()->has("LoggedSuperAdmin")){
            session()->start();
            $adminSession = session()->get('LoggedSuperAdmin');
            $participantsInfo  = tbl_participants_info::all();
            return view('page.superadmin.participantsList.participantsList',['adminSession'=>$adminSession,'participants' => $participantsInfo]);
        }else if(session()->has("LoggedJKReviewer")){
            session()->start();
            $adminSession = session()->get('LoggedJKReviewer');
            $participantsInfo  = tbl_participants_info::all();
            return view('page.Jk_Reviewer.participantsList.participantsList',['adminSession'=>$adminSession,'participants' => $participantsInfo]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function activeAdmin($adminEmail)
    {
        if(session()->has("LoggedSuperAdmin") || session()->has("LoggedJKReviewer")){
            session()->start();
            $admin = tbl_admin_info::where('email',$adminEmail)->first();
            $admin->status = 1;
            $admin->save();
            return redirect()->back()->with('updateSuccess','Status Update Succesfully');
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function deactiveAdmin($adminEmail)
    {
        if(session()->has("LoggedSuperAdmin") || session()->has("LoggedJKReviewer")){
            session()->start();
            $admin = tbl_admin_info::where('email',$adminEmail)->first();
            $admin->status = 0;
            $admin->save();

            $submission = tbl_submission::where('reviewerID',$admin->email)->orWhere('reviewer2ID',$admin->email)->get();
            return redirect()->back()->with('updateSuccess','Status Update Succesfully');
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function pageList()
    {
        if(session()->has("LoggedSuperAdmin")){
            session()->start();
            $pages = tbl_page::all();
            $pageList = tbl_page::where('pageName','Page List')->first();
            
            return view($pageList->pagePath,['pages'=>$pages]);
            }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function editLogo(Request $request,$id){
        $img = $request->file('image');
        $date = now();
        $formatted_date = $date->format('YmdHis');
        $logo = tbl_masterdata::where('id',$id)->first();

        if($img != NULL && $img != ""){
            $imgName = $formatted_date . "_" . $logo->masterdata_name  . "." . $img->getClientOriginalExtension();
            $img->move(public_path('images'),$imgName);
            $imgSrc = '/images/' . $imgName;
            $logo->masterdata_value = $imgSrc;
            $logo->updated_at = $date;
        }

        $logo->save();
        
        return redirect()->back()->with('success','Logo updated successfully');
    }

    public function withdrawSubmission(Request $request,$submissionCode){
        $reason = $request->input('reason');
        $submission = tbl_submission::where('submissionCode',$submissionCode)->first();
        if($reason == '' || is_null($reason)){
            return redirect()->back()->with('error','Please enter a reason for the withdraw of submission Code ' . $submissionCode);
        }else if($reason == 'undoWithdraw'){
            $submission->withdraw = false;
            $submission->withdraw_reason = null;
            $submission->save();
            return redirect()->back()->with('success','Submission '. $submissionCode . ' undo withdraw successfully');
        }

        if(isset($submission)){
            $submission->withdraw = true;
            $submission->withdraw_reason = $reason;
            $submission->save();
            return redirect()->back()->with('success','Submission '. $submissionCode . ' withdraw successfully');
        }else{
            return redirect()->back()->with('error','Submission '. $submissionCode . ' not found');
        }
    }

    public function indexHomePage(){
        if (session()->has("LoggedSuperAdmin")) {
            session()->start();
            $participantsCount = tbl_participants_info::all()->count();
            $submissionsCount = tbl_submission::all()->count();
            $reviewersCount = tbl_review_info::all()->count();
            $checksubmission  = tbl_submission::all();
            $paymentDetails = tbl_payment::whereNotNull('amount')->get();
            $tasks = tbl_superadmintask::latest()->get();

            $submissionCounts = $checksubmission->groupBy('categoryCode')
            ->map(function ($group) {
                return $group->count();
            });

            $amountENG = $submissionCounts->get('ENG', 0);
            $amountITC = $submissionCounts->get('ITC', 0);
            $amountSSC = $submissionCounts->get('SSC', 0);
            $amountEHE = $submissionCounts->get('EHE', 0);
            $amountTVT = $submissionCounts->get('TVT', 0);
            $amountREE = $submissionCounts->get('REE', 0);
            $amountCOM = $submissionCounts->get('COM', 0);
            $amountMDC = $submissionCounts->get('MDC', 0);
            $amountOTH = $submissionCounts->get('OTH', 0);
            $amountAUD = $submissionCounts->get('AUD', 0);

            $amounts = [
                'ENG' => $amountENG,
                'ITC' => $amountITC,
                'SSC' => $amountSSC,
                'EHE' => $amountEHE,
                'TVT' => $amountTVT,
                'REE' => $amountREE,
                'COM' => $amountCOM,
                'MDC' => $amountMDC,
                'OTH' => $amountOTH,
                'AUD' => $amountAUD,
            ];

            $codesContainingENG = tbl_payment::where('submissionCode', 'like', '%ENG%')->get();
            $totalAmountENG = $codesContainingENG->sum('amount');
            $codesContainingSSC = tbl_payment::where('submissionCode', 'like', '%SSC%')->get();
            $totalAmountSSC = $codesContainingSSC->sum('amount');
            $codesContainingITC = tbl_payment::where('submissionCode', 'like', '%ITC%')->get();
            $totalAmountITC = $codesContainingITC->sum('amount');
            $codesContainingEHE = tbl_payment::where('submissionCode', 'like', '%EHE%')->get();
            $totalAmountEHE = $codesContainingEHE->sum('amount');
            $codesContainingTVT = tbl_payment::where('submissionCode', 'like', '%TVT%')->get();
            $totalAmountTVT = $codesContainingTVT->sum('amount');
            $codesContainingREE = tbl_payment::where('submissionCode', 'like', '%REE%')->get();
            $totalAmountREE = $codesContainingREE->sum('amount');
            $codesContainingCOM = tbl_payment::where('submissionCode', 'like', '%COM%')->get();
            $totalAmountCOM = $codesContainingCOM->sum('amount');
            $codesContainingMDC = tbl_payment::where('submissionCode', 'like', '%MDC%')->get();
            $totalAmountMDC = $codesContainingMDC->sum('amount');
            $codesContainingOTH = tbl_payment::where('submissionCode', 'like', '%OTH%')->get();
            $totalAmountOTH = $codesContainingOTH->sum('amount');
            $codesContainingAUD = tbl_payment::where('submissionCode', 'like', '%AUD%')->get();
            $totalAmountAUD = $codesContainingAUD ->sum('amount');
            $total = [
                'ENG' => $totalAmountENG,
                'SSC' => $totalAmountSSC,
                'ITC' => $totalAmountITC,
                'EHE' => $totalAmountEHE,
                'TVT' => $totalAmountTVT,
                'REE' => $totalAmountREE,
                'COM' => $totalAmountCOM,
                'MDC' => $totalAmountMDC,
                'OTH' => $totalAmountOTH,
                'AUD' => $totalAmountAUD,
            ];
        return view('page.superadmin.homePage.homePage(SuperAdmin)', [
            'participantsCount' => $participantsCount,
            'submissionsCount' => $submissionsCount,
            'reviewersCount' => $reviewersCount,
            'checksubmission'=>$checksubmission,
            'amounts' => $amounts,
            'tasks' => $tasks,
            'total' => $total,
        ]);
        } else {
            return redirect('login')->with('fail', 'Login Session Expire, Please Login again');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'task' => 'required|string|max:255',
        ]);

        $task = new tbl_superadmintask();
        $task->task = $validatedData['task'];
        $task->save();

        return redirect()->route('superadminHomePage');
    }

    public function destroy($id)
    {
        $task = tbl_superadmintask::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }


}
