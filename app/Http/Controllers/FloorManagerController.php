<?php

namespace App\Http\Controllers;

use App\Models\tbl_presentation_schedule;
use App\Models\tbl_submission;
use App\Models\presentationGroup;
use Illuminate\Http\Request;

class FloorManagerController extends Controller
{
    public function presentationSchedule(){
        if(session()->has('LoggedFloorManager')){
            session()->start();
            $schedule = tbl_presentation_schedule::all();
            $submission = tbl_submission::all();
            foreach ($schedule as $eachSchedule) {
                $eachSchedule->submission = $submission;
            }
            return view('page.Floor_Manager.presentationSchedule.presentationSchedule',["schedule"=>$schedule]);
        }else if(session()->has('LoggedUser')){
            session()->start();
            $schedule = tbl_presentation_schedule::all();
            
            return view('page.participants.presentationSchedule.presentationSchedule',["schedule"=>$schedule]);
        }else{
            $schedule = tbl_presentation_schedule::all();
            return view('page.visitor.presentationSchedule.presentationSchedule',["schedule"=>$schedule]);
        }
    }

    public function uploadNewSchedule(Request $request){
        if(session()->has('LoggedFloorManager')){
            session()->start();

            $group = "Group " . $request->input('group');
            $time = $request->input('time');
            $link = $request->input('link');
            $datetimeWithoutT = str_replace("T", " ", $time);

            $schedule = new tbl_presentation_schedule;
            $schedule->presentationGroup = $group;
            $schedule->presentationTime = $datetimeWithoutT;
            $schedule->presentationLink = $link;
            $schedule->save();

            return redirect()->back()->with('success','New Schedule Uploaded');
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function editSchedule(Request $request,$currentGroup){
        if(session()->has('LoggedFloorManager')){
            session()->start();

            $group = $request->input('group');
            $time = $request->input('time');
            $link = $request->input('link');
            $datetimeWithoutT = str_replace("T", " ", $time);

            $schedule = tbl_presentation_schedule::where('presentationGroup',$currentGroup)->first();
            $schedule->presentationGroup = $group;
            $schedule->presentationTime = $datetimeWithoutT;
            $schedule->presentationLink = $link;
            $schedule->save();

            return redirect()->back()->with('success','Schedule Edited');
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function deleteSchedule($group){
        if(session()->has('LoggedFloorManager')){
            session()->start();

            $schedule = tbl_presentation_schedule::where('presentationGroup',$group)->first();
            $schedule->delete();

            $assignedPaper = tbl_submission::where('presentationGroup',$group)->get();
            foreach($assignedPaper as $thisAssignedPaper){
                $thisAssignedPaper->presentationGroup = null;
                $thisAssignedPaper->save();
            }

            return redirect()->back()->with('success','Schedule Deleted');
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function presentationGroup(){
        if(session()->has('LoggedFloorManager')){
            session()->start();

            $schedule = tbl_presentation_schedule::all();
            $submission = tbl_submission::all();
            
            return view('page.Floor_Manager.presentationGroup.presentationGroup',['schedule' => $schedule,'submission' => $submission]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function editSubmissionPresentationGroup(Request $request,$submissonCode){
        if(session()->has('LoggedFloorManager')){
            session()->start();
            $submission = tbl_submission::where('submissionCode',$submissonCode)->first();

            $group = $request->input('group');

            if($group == 'Not Assigned'){
                $submission->presentationGroup = null;
                $submission->save();
            }else{
                $submission->presentationGroup = $group;
                $submission->save();
            }
            

            return redirect()->back()->with('success','Participants Group Edited');
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }


}
