<?php

namespace App\Http\Controllers;

use App\Models\tbl_presentation_schedule;
use Illuminate\Http\Request;

class FloorManagerController extends Controller
{
    public function presentationSchedule(){
        if(session()->has('LoggedFloorManager')){
            session()->start();
            $schedule = tbl_presentation_schedule::all();
            return view('page.Floor_Manager.presentationSchedule.presentationSchedule',["schedule"=>$schedule]);
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function uploadNewSchedule(Request $request){
        if(session()->has('LoggedFloorManager')){
            session()->start();

            $group = "Group " . $request->input('group');
            $time = $request->input('time');
            $link = $request->input('link');

            $schedule = new tbl_presentation_schedule;
            $schedule->presentationGroup = $group;
            $schedule->presentationTime = $time;
            $schedule->presentationLink = $link;
            $schedule->save();

            return redirect()->back()->with('success','New Schedule Uploaded');
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }

    public function editSchedule(Request $request,$presentationGroup){
        if(session()->has('LoggedFloorManager')){
            session()->start();

            $group = $request->input('group');
            $time = $request->input('time');
            $link = $request->input('link');

            $schedule = tbl_presentation_schedule::where('presentationGroup',$presentationGroup)->first();
            $schedule->presentationGroup = $group;
            $schedule->presentationTime = $time;
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

            return redirect()->back()->with('success','Schedule Deleted');
        }else{
            return redirect('login')->with('fail','Login Session Expire,Please Login again');
        }
    }
}
