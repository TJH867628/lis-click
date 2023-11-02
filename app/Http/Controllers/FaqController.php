<?php

namespace App\Http\Controllers;

use App\Models\tbl_participants_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactUs;
use App\Models\tbl_masterdata;
use Illuminate\Support\Facades\Http;

class FaqController extends Controller
{
    function index(){session()->start();
        if(session()->has('LoggedUser')){
            $userSession = session()->get('LoggedUser');
            $user = tbl_participants_info::where('email',$userSession)->first();
            return view('page.participants.faq.faq',['userSession' => $userSession,'user' => $user]);

        }
    }

    function visitor(){
        return view('page.visitor.faq.faqVisitor');
    }

    function sendFaq(Request $request){
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha_v3.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
        ]);
    
        $data = $response->json();
        
        if (!$data['success']) {
            // reCAPTCHA verification failed. Handle accordingly.
            return redirect()->back()->with('error', 'reCAPTCHA verification failed.');
        }
        
        $name = $request->get('name');
        $userEmail = $request->get('email');
        $subject = $request->get('subject');
        $userMessage = $request->get('message');
        $userMessage = (string) $userMessage; // Convert $message to a string
        $officialEmail = tbl_masterdata::where('masterdata_name','officialEmail')->first();
        $email = new contactUs($name,$userEmail,$subject,$userMessage);
        Mail::to($officialEmail->masterdata_value)->send($email);

        return redirect()->back()->with('success','Your message has been submitted successfully');
    }
}
