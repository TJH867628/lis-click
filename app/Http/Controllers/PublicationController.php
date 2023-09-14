<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_masterdata;

class PublicationController extends Controller
{
    function index(){
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $publication = tbl_masterdata::where('masterdata_name','Publication E-Jurnal')->get();

            return view('page.participants.publicationInfo.publicationinfo',['userSession' => $userSession,'publication' => $publication]);
        }else
        {
            return redirect('login')->with('fail','Login expired,Please Login Again');
        }
    }

    function download($filename){
        $path = 'conferences_info/' . $filename;
        return response()->download($path, $filename);
    }
    
}
