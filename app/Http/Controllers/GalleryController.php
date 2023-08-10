<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_gallery;
class GalleryController extends Controller
{
    public function index(){
        $gallery = tbl_gallery::all();
        if(session()->has('LoggedUser') || session()->has('Reviewer') || session()->has('JK Reviewer') || session()->has('JK Pwndaftaran') || session()->has('Super Admin')){
            return view('page.participants.gallery.gallery',['gallery' => $gallery]);
        }else{
            return view('page.visitor.gallery.gallery',['gallery' => $gallery]);
        }
    }

    public function uploadNewPost(Request $request){
        $img = $request->file('image');
        $title = $request->input('title');
        $description = $request->input('description');
        $visible = 1;
        // if($visible == "true"){
        //     $visible = 1;
        // }else{
        //     $visible = 0;
        // }

        $date = now();
        $formatted_date = $date->format('YmdHis');

        $imgName = $formatted_date . "_" . $title  . "_" . "." . $img->getClientOriginalExtension();
        $img->move(public_path('recources/gallery'),$imgName);
        $imgSrc = '/recources/gallery/' . $imgName;
        $gallery = new tbl_gallery;
        $gallery->imageSrc = $imgSrc;
        $gallery->title = $title;
        $gallery->description = $description;
        $gallery->visible = $visible;
        $gallery->created_at = $date;
        $gallery->updated_at = $date;
        $gallery->save();
        
        return redirect()->back();
    }

    public function editExistingPost(Request $request,$id){
        $img = $request->file('image');
        $title = $request->input('title');
        $description = $request->input('description');
        $date = now();
        $formatted_date = $date->format('YmdHis');
        $gallery = tbl_gallery::find($id);

        if($img != NULL && $img != ""){
            $imgName = $formatted_date . "_" . $title  . "_" . "." . $img->getClientOriginalExtension();
            $img->move(public_path('recources/gallery'),$imgName);
            $imgSrc = '/recources/gallery/' . $imgName;
            $gallery->imageSrc = $imgSrc;
            $gallery->updated_at = $date;
        }

        if($title != NULL && $title != ""){
            $gallery->title = $title;
            $gallery->updated_at = $date;
        }

        if($description != NULL && $description != ""){
            $gallery->description = $description;
            $gallery->updated_at = $date;
        }

        $gallery->save();
        
        return redirect()->back();
    }

    public function changeVisible($id){
        $gallery = tbl_gallery::find($id);
        if($gallery->visible == 1){
            $gallery->visible = 0;
        }else{
            $gallery->visible = 1;
        }
        $gallery->save();

        return redirect()->back();
    }
}
