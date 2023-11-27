<?php

namespace App\Http\Controllers;

use App\Models\tbl_account;
use App\Models\tbl_audience;
use Illuminate\Http\Request;
use App\Models\tbl_masterdata;
use App\Models\tbl_payment;
use App\Models\tbl_submission;
use App\Models\tbl_participants_info;
use App\Models\tbl_conference;
use App\Models\tbl_spend;
use Illuminate\Support\Facades\Storage;
use App\Mail\paymentConfirmationReceipt;
use Illuminate\Support\Facades\Mail;

class JKBendahariController extends Controller
{
    public function paymentQR(){
        $qrCode = tbl_masterdata::where('masterdata_name','paymentQR')->first();
        return view('page.JK_Bendahari.paymentQR.paymentQR',['qrCode' => $qrCode]);
    }

    public function uploadNewPaymentQR(Request $request){
            $file = $request->file('image');
            $paymentDetails = $request->input('details');
            $qrCode = tbl_masterdata::where('masterdata_name','paymentQR')->first();

            if($request->hasFile('image')){
                $fileName = "PaymentQR_" . time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('paymentQR'),$fileName);
                $data = [
                    'masterdata_name' => 'paymentQR',
                    'masterdata_value' => $fileName,
                    'masterdata_details' => $paymentDetails,
                ];

                if($qrCode == NULL){
                    tbl_masterdata::create($data);
                }else{
                    $existingFileName = $qrCode->masterdata_value;
                    $existingFilePath = public_path('paymentQR') . '/' . $existingFileName;
                    if($existingFileName != NULL){
                        unlink($existingFilePath);
                    }

                    $qrCode->masterdata_value = $fileName;
                    $qrCode->masterdata_details = $paymentDetails;
                    $qrCode->save();
                }
                
                return redirect()->back()->with('success','QR Code Uploaded Successfully');
            }else{
                if($qrCode == NULL){
                    return redirect()->back()->with('error','Please upload a QR Code');
                }else{

                    $qrCode->masterdata_details = $paymentDetails;
                    $qrCode->save();
                }
                return redirect()->back()->with('success','Text Upload Succesfully');
            }
    }

    public function removePaymentQR(){
        $qrCode = tbl_masterdata::where('masterdata_name','paymentQR')->first();
        $qrCode->masterdata_value = NULL;
        $qrCode->save();
        $existingFileName = $qrCode->masterdata_value;
        $existingFilePath = public_path('paymentQR') . '/' . $existingFileName;
        if($existingFileName != NULL){
            unlink($existingFilePath);
        }

        return redirect()->back()->with('success','Image Remove Succesfully');
    }

    public function removePaymentDetails(){
        $qrCode = tbl_masterdata::where('masterdata_name','paymentQR')->first();
        $qrCode->masterdata_details = NULL;
        $qrCode->save();
        return redirect()->back()->with('success','Text Remove Succesfully');
    }

    public function paymentStatus(){
        if(session()->has('LoggedJKBendahari')){
            session()->start();
            $paymentDetails = tbl_payment::all();
            foreach($paymentDetails as $key => $eachPaymentStatus){
                if($eachPaymentStatus != NULL){
                    $paymentDetails[$key]->paymentReceipt = "Yes";
                    $submissionInfo = tbl_submission::where('submissionCode',$eachPaymentStatus->submissionCode)->first();
                    if(isset($submissionInfo)){
                        $participants = $submissionInfo->participants1;
                    }else{
                        $participants = $eachPaymentStatus->participantsEmail;
                    }
                    $participantsInfo = tbl_participants_info::where('email',$participants)->first();
                    if(isset($submissionInfo)){
                        $paymentDetails[$key]->submissionInfo = $submissionInfo;
                    }else{
                        $paymentDetails[$key]->submissionInfo = $participantsInfo;
                        $paymentDetails[$key]->submissionInfo->participants1 = $participantsInfo->email;
                    }
                    $paymentDetails[$key]->participantsInfo = $participantsInfo;
                }
            }

            return view('page.JK_Bendahari.paymentStatus.paymentStatus',['paymentDetails' => $paymentDetails]);
        }
    }

    public function paymentStatusControl(Request $request,$paymentID){
        $paymentStatus = $request->input('statusInput');
        $paymentDetails = tbl_payment::where('paymentID',$paymentID)->first();
        $amount = (double)substr($request->input('amount'),$this->isDigit($request->input('amount')));
        $paymentDetails->amount = $amount;
        $paymentDetails->paymentStatus = $paymentStatus;
        $now = now();
        $paymentDetails->updated_at = $now;
        $audience = tbl_audience::where('email',$paymentDetails->participantsEmail)->first();
        if(isset($audience)){
            $audience->payment_status = $paymentStatus;
            $audience->save();
        }
        if ($paymentDetails->paymentStatus == 'Complete') {
            $date = $now->format('Y-m-d H:i:s');
            $paymentDetails->confirmPaymentDate = $date;
            $this->sendPaymentConfirmationReceipt($paymentDetails->submissionCode,$date); //
        }else{
            $paymentDetails->confirmPaymentDate = NULL;
        }
        $paymentDetails->save();

        return redirect()->back()->with('success','Payment Status Updated Successfully');
    }

    function isDigit($str) {
        preg_match('/\d/', $str, $matches, PREG_OFFSET_CAPTURE);
        return $matches[0][1] ?? null;
    }

    public function sendPaymentConfirmationReceipt($submissionCode,$date){
        $paymentDetails = tbl_payment::where('submissionCode',$submissionCode)->get();
        $submissionInfo = tbl_submission::where('submissionCode',$submissionCode)->first();
        if(isset($submissionInfo)){
            $userEmail = $submissionInfo->participants1;
        }else{
            $submissionInfo = new \stdClass();
            $userEmail = $paymentDetails[0]->participantsEmail;
        }
        $submissionInfo->participantsEmail = $userEmail;
        $submissionInfo->submissionCode = $paymentDetails[0]->submissionCode;
        $userName = tbl_participants_info::where('email',$userEmail)->first()->name;
        $paymentMail = new paymentConfirmationReceipt($submissionInfo,$paymentDetails,$date,$userName);
        Mail::to($userEmail)->send($paymentMail);
    }

    public function bendahariDashboard() {
        $paymentDetails = tbl_payment::whereNotNull('amount')->get();
        $submissiontype = tbl_submission::all();
        $audience = tbl_audience::all()->count();
        // Group payments by year
        $paymentsByYear = $paymentDetails->groupBy(function ($payment) {
            return $payment->created_at->format('Y');
        })->sortBy(function ($payment) {
            return $payment->first()->created_at;
        })->reverse();
    
        $dataByYear = [];
    
        foreach ($paymentsByYear as $year => $payments) {
            $amountEachCategory = new \stdClass();
            // Calculate category-wise totals for this year
            $amountENG = 0; // Initialize the total amount for category ITC
            $amountSSC = 0; // Initialize the total amount for category SSC
            $amountITC = 0; // Initialize the total amount for category ITC
            $amountEHE = 0; // Initialize the total amount for category EHE
            $amountTVT = 0; // Initialize the total amount for category TVT
            $amountREE = 0; // Initialize the total amount for category REE
            $amountCOM = 0; // Initialize the total amount for category COM
            $amountMDC = 0; // Initialize the total amount for category MDC
            $amountOTH = 0;
            $amountAUD = 0;
            $totalAmount = 0; // Initialize the total amount for category
            foreach ($payments as $payment) {
                $categoryCode = substr($payment->submissionCode,5,3); // Initialize category code variable
                $totalAmount += $payment->amount; // Calculate the total amount across all payments
    
                $subTheme = $payment->subTheme;
                $categoryCode = substr($payment->submissionCode,5,3); // Initialize category code variable
    
                // Determine category code based on subTheme
                if ($categoryCode === "ENG") {
                    $amountENG += $payment->amount; // Add to the total amount for category ENG
                } elseif ($categoryCode === "SSC") {
                    $amountSSC += $payment->amount; // Add to the total amount for category SSC
                } elseif ($categoryCode === "ITC") {
                    $amountITC += $payment->amount; // Add to the total amount for category ITC
                } elseif ($categoryCode === "EHE") {
                    $amountEHE += $payment->amount; // Add to the total amount for category EHE
                } elseif ($categoryCode === "TVT") {
                    $amountTVT += $payment->amount; // Add to the total amount for category TVT
                } elseif ($categoryCode === "REE") {
                    $amountREE += $payment->amount; // Add to the total amount for category REE
                } elseif ($categoryCode === "COM") {
                    $amountCOM += $payment->amount; // Add to the total amount for category COM
                } elseif ($categoryCode === "MDC") {
                    $amountMDC += $payment->amount; // Add to the total amount for category MDC
                } elseif ($categoryCode === "OTH") {
                    $amountOTH += $payment->amount; // Add to the total amount for category OTH
                } elseif ($categoryCode === "AUD") {
                    $amountAUD += $payment->amount; // Add to the total amount for category OTH
                }
    
            }
    
                // Set the 'amountENG' property in the object
                $amountEachCategory->amountENG = $amountENG;
                $amountEachCategory->amountSSC = $amountSSC; 
                $amountEachCategory->amountITC = $amountITC; 
                $amountEachCategory->amountEHE = $amountEHE; 
                $amountEachCategory->amountTVT = $amountTVT; 
                $amountEachCategory->amountREE = $amountREE; 
                $amountEachCategory->amountCOM = $amountCOM; 
                $amountEachCategory->amountMDC = $amountMDC; 
                $amountEachCategory->amountOTH = $amountOTH; 
                $amountEachCategory->amountAUD = $amountAUD; 
    
            $dataByYear[(string)$year] = [
                'amountEachCategory' => $amountEachCategory,
                'totalAmount' => $totalAmount,
            ];
        }
        $uniqueYears = array_keys($dataByYear);

        $submissiontype = $submissiontype->groupBy('submissionType')
            ->map(function ($group) {
                return $group->count();
            });

        $presentPublic = $submissiontype->get('Paper Presentation & Publication', 0);
        $presentOnly = $submissiontype->get('Paper Presentation ONLY', 0);
        $posterOnly = $submissiontype->get('Poster Presentation ONLY', 0);
        $publicOnly = $submissiontype->get('Publication ONLY', 0);
        $student = $submissiontype->get('Student Presenter', 0);
        $amountPresentPublic = $presentPublic * 300;
        $amountPresenOnly = $presentOnly * 250;
        $amountPosterOnly = $posterOnly * 250;
        $amountPublicationOnly = $publicOnly * 250;
        $amountStudent = $student * 250;
        $totalSubmission = $audience + $presentPublic + $presentOnly + $posterOnly + $publicOnly + $student;
        $amountAudience = $audience * 250;
        $type =[

            'Paper Presentation & Publication'=>$amountPresentPublic,
            'Paper Presentation ONLY'=>$amountPresenOnly,
            'Poster Presentation ONLY'=>$amountPosterOnly,
            'Publication ONLY'=>$amountPublicationOnly,
            'Student Presenter'=>$amountStudent,
            'Audience'=> $amountAudience,
        ];
        return view('page.JK_Bendahari.dashboard.dashboard', [
            'dataByYear' => $dataByYear,
            'uniqueYears' => $uniqueYears,
            'type' => $type,
            'totalSubmission' => $totalSubmission,
        ]);
    }
    
    public function spend(){
        $spend = tbl_spend::all();



        return view('page.JK_Bendahari.spend.spend',['spend' => $spend]);
    }
}
