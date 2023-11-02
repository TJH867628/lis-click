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
       // Replace 'YOUR_SECRET_KEY' with your actual reCAPTCHA secret key
        $secretKey = env('RECAPTCHA_SECRET_KEY');

        // Get the reCAPTCHA response from the request
        $recaptchaResponse = $request->input('g-recaptcha-response');

        // Build the cURL command
        // Execute the cURL request and capture the response
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $request->input('g-recaptcha-response'),
        ]);
    
        $data = $response->json();
        
        if (!$data['success']) {
            // reCAPTCHA verification failed. Handle accordingly.
            return redirect()->back()->with('error', 'reCAPTCHA verification failed.');
        }
        // Join the lines to create a single string
        
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
