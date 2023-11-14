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
            $officialEmail = tbl_masterdata::where('masterdata_name','officialEmail')->first();
            $officialAddress = tbl_masterdata::where('masterdata_name','officialAddress')->first();
            $officialWorkingTime = tbl_masterdata::where('masterdata_name','officialWorkingTime')->first();
            $officialContactNumber = tbl_masterdata::where('masterdata_name','officialContactNumber')->first();
            $officialDetails = new \stdClass();
            $officialDetails->officialEmail = $officialEmail;
            $officialDetails->officialAddress = $officialAddress;
            $officialDetails->officialWorkingTime = $officialWorkingTime;
            $officialDetails->officialContactNumber = $officialContactNumber;

            return view('page.participants.faq.faq',['userSession' => $userSession,'user' => $user,'officialDetails' => $officialDetails]);

        }
    }

    function visitor(){
        $officialEmail = tbl_masterdata::where('masterdata_name','officialEmail')->first();
        $officialAddress = tbl_masterdata::where('masterdata_name','officialAddress')->first();
        $officialWorkingTime = tbl_masterdata::where('masterdata_name','officialWorkingTime')->first();
        $officialContactNumber = tbl_masterdata::where('masterdata_name','officialContactNumber')->first();
        $officialDetails = new \stdClass();
        $officialDetails->officialEmail = $officialEmail;
        $officialDetails->officialAddress = $officialAddress;
        $officialDetails->officialWorkingTime = $officialWorkingTime;
        $officialDetails->officialContactNumber = $officialContactNumber;
        return view('page.visitor.faq.faqVisitor',['officialDetails' => $officialDetails]);
    }

    function sendFaq(Request $request){
       // Replace 'YOUR_SECRET_KEY' with your actual reCAPTCHA secret key
        $secretKey = env('RECAPTCHA_SECRET_KEY');

        // Get the reCAPTCHA response from the request
        $recaptchaResponse = $request->input('g-recaptcha-response');

        // Build the cURL command
        // Execute the cURL request and capture the response
        $response = exec("curl --request POST --url 'https://www.google.com/recaptcha/api/siteverify' --data 'secret=$secretKey&response={$request->input('g-recaptcha-response')}'", $output, $status);
        
        // Join the lines to create a single string
        $jsonResponse = implode('', $output);
        
        // Remove any unnecessary characters and decode as JSON
        $responseArray = json_decode($jsonResponse, true);
        
        if (!$responseArray['success']) {
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
