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
            if($request->hasFile('image')){
                $file = $request->file('image');
                $fileName = "PaymentQR_" . time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('paymentQR'),$fileName);
                $data = [
                    'masterdata_name' => 'paymentQR',
                    'masterdata_value' => $fileName,
                ];
                $qrCode = tbl_masterdata::where('masterdata_name','paymentQR')->first();
                if($qrCode == NULL){
                    tbl_masterdata::create($data);
                }else{
                    $existingFileName = $qrCode->masterdata_value;
                    $existingFilePath = public_path('paymentQR') . '/' . $existingFileName;
                    unlink($existingFilePath);

                    $qrCode->masterdata_value = $fileName;
                    $qrCode->save();
                }
                
                return redirect()->back()->with('success','QR Code Uploaded Successfully');
            }else{
                return redirect()->back()->with('fail','QR Code Upload Failed');
            }
    }
}
