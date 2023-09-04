<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_masterdata;
use App\Models\tbl_payment;
use App\Models\tbl_submission;
use App\Models\tbl_participants_info;
use Illuminate\Support\Facades\Storage;

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
                    $participantsInfo = tbl_participants_info::where('email',$submissionInfo->participants1)->first();

                    $paymentDetails[$key]->submissionInfo = $submissionInfo;
                    $paymentDetails[$key]->participantsInfo = $participantsInfo;
                }
            }

            return view('page.JK_Bendahari.paymentStatus.paymentStatus',['paymentDetails' => $paymentDetails]);
        }
    }

    public function paymentStatusControl(Request $request,$paymentID){
        $paymentStatus = $request->input('statusInput');
        $paymentDetails = tbl_payment::where('paymentID',$paymentID)->first();
        $paymentDetails->paymentStatus = $paymentStatus;
        $now = now();
        if ($paymentDetails->paymentStatus == 'Complete') {
            $paymentDetails->confirmPaymentDate = $now->format('Y-m-d H:i:s');
        }else{
            $paymentDetails->confirmPaymentDate = NULL;
        }
        $paymentDetails->save();

        return redirect()->back()->with('success','Payment Status Updated Successfully');
    }
}
