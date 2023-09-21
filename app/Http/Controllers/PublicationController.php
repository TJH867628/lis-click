<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_conference;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class PublicationController extends Controller
{
    function index(){
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $publication = tbl_conference::where('field_name','Publication E-Jurnal')->get();

            return view('page.participants.publicationInfo.publicationInfo',['userSession' => $userSession,'publication' => $publication]);
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
    

    function uploadNewPublication(Request $request){
        $title = $request->input('title');
        $file = $request->file('document');
        $datetime = now()->format('YmdHms');
        $filename = $datetime . "_" . $file->getClientOriginalName();

        $publication = tbl_conference::where('field_name','Publication E-Jurnal')->get();
        $count = 0;
        foreach ($publication as $thisPublication){
            $numericId = substr($thisPublication->field_id, 4); // Extract the numeric part of the field_id (assuming the prefix is always "PEJ-")
            if($numericId > $count){
                $count = $numericId;
            }
        }
        $newPublication = new tbl_conference;
        $newPublication->field_id = 'PEJ-' . ($count + 1);
        $newPublication->field_name = 'Publication E-Jurnal';
        $newPublication->field_details = $title;
        $newPublication->field_value = $filename;
        $newPublication->field_visibility = 1;
        $newPublication->created_at = now();
        $newPublication->updated_at = now();
        $newPublication->save();

        $file->move(public_path('conferences_info'), $filename);

        return redirect()->back()->with('success','New Publication Info Uploaded');
    }

    function editExistingPublication(Request $request,$id){
        $title = $request->input('title');
        $datetime = now()->format('YmdHms');
        $visibility = $request->input('visibility') == 'on' ? 1 : 0;
        $publication = tbl_conference::where('field_id',$id)->first();
        if($request->hasFile('document')){
            $file = $request->file('document');
            $filename = $datetime . "_" . $file->getClientOriginalName();
            $publication->field_value = $filename;
            $file->move(public_path('conferences_info'), $filename);
        }

        $publication->field_visibility = $visibility;
        $publication->field_details = $title;
        $publication->updated_at = now();
        $publication->save();

        return redirect()->back()->with('success','Publication Info Updated');
    }
    
}
