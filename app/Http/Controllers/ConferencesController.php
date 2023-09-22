<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\tbl_conference;

class ConferencesController extends Controller
{
    //
    function conferencesInfo(){
        session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            
            return view('page.participants.conferencesInfo.conferencesInfo',['userSession' => $userSession]);
        }else
        {
            return redirect('login')->with('fail','Login expired,Please Login Again');
        }
        
    }

    function conferencesDownload(){
        session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $conferencesDownload = tbl_conference::where('field_name','Conferences Download')->get();

            return view('page.participants.conferencesDownload.conferencesDownload',['userSession' => $userSession,'conferencesDownload' => $conferencesDownload]);
        }else
        {
            return redirect('login')->with('fail','Login expired,Please Login Again');
        }
       
    }

    function download($filename)
    {
        $file = public_path('conferences_info/' . $filename);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
    
        if ($extension == 'pdf') {
            return Response::make(file_get_contents($file), 200, [
                'content-type' => 'application/pdf',
            ]);
        } elseif ($extension == 'doc' || $extension == 'docx') {
            return response()->file($file);
        }
    }

    function uploadNewConferencesDownload(Request $request){
        $title = $request->input('title');
        $file = $request->file('document');
        $datetime = now()->format('YmdHms');
        $filename = $datetime . "_" . $file->getClientOriginalName();

        $conferencesDownload = tbl_conference::where('field_name','Conferences Download')->get();
        $count = 0;
        foreach ($conferencesDownload as $thisConferencesDownload){
            $numericId = substr($thisConferencesDownload->field_id, 5); // Extract the numeric part of the field_id (assuming the prefix is always "PEJ-")
            if($numericId > $count){
                $count = $numericId;
            }
        }
        $newConferencesDownload = new tbl_conference;
        $newConferencesDownload->field_id = 'COND-' . ($count + 1);
        $newConferencesDownload->field_name = 'Conferences Download';
        $newConferencesDownload->field_details = $title;
        $newConferencesDownload->field_value = $filename;
        $newConferencesDownload->field_visibility = 1;
        $newConferencesDownload->created_at = now();
        $newConferencesDownload->updated_at = now();
        $newConferencesDownload->save();

        $file->move(public_path('conferences_info'), $filename);

        return redirect()->back()->with('success','New Conferences Download Uploaded');
    }

    function editExistingConferencesDownload(Request $request,$id){
        $title = $request->input('title');
        $datetime = now()->format('YmdHms');
        $visibility = $request->input('visibility') == 'on' ? 1 : 0;
        $conferencesDownload = tbl_conference::where('field_id',$id)->first();
        if($request->hasFile('document')){
            $file = $request->file('document');
            $filename = $datetime . "_" . $file->getClientOriginalName();
            $conferencesDownload->field_value = $filename;
            $file->move(public_path('conferences_info'), $filename);
        }

        $conferencesDownload->field_visibility = $visibility;
        $conferencesDownload->field_details = $title;
        $conferencesDownload->updated_at = now();
        $conferencesDownload->save();

        return redirect()->back()->with('success','Publication Info Updated');
    }
}
