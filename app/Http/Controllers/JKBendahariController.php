<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_masterdata;
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
                    unlink($existingFilePath);

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
        return redirect()->back()->with('success','Image Remove Succesfully');
    }

    public function removePaymentDetails(){
        $qrCode = tbl_masterdata::where('masterdata_name','paymentQR')->first();
        $qrCode->masterdata_details = NULL;
        $qrCode->save();
        return redirect()->back()->with('success','Text Remove Succesfully');
    }
}
