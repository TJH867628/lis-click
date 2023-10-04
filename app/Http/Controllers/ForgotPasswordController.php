<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtp;
use App\Models\tbl_account;
use App\Http\Controllers\generatedMixedCode;



class ForgotPasswordController extends Controller
{
    function generateMixedCode($length = 6,$expirationMinutes = 5) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $otp = '';
    
        $characterCount = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, $characterCount - 1);
            $otp .= $characters[$randomIndex];
            $expirationTime = now()->addMinutes($expirationMinutes); // Calculate the expiration time (e.g., 5 minutes from the current time)
        }
    
        return [
            'otp' => $otp,
            'expires_at' => $expirationTime,
        ];
    }
    public function index(){
        return view("page.visitor.forgotPassword.forgotPassword");
    }



    public function sendOTP(Request $request)
    {
        $email = $request->input('email');  
        session()->put('email' , $email);
        $user = tbl_account::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->with('error','Email Not Found!');
        }else{
            $otpData = $this->generateMixedCode(6, 5);
            $otp = strtoupper($otpData['otp']);
            $expiresAt = $otpData['expires_at'];

            // Save the OTP and expiration time in the session
            $request->session()->put('otp', $otp);
            $request->session()->put('otp_expires_at', $expiresAt);

            $mail = new SendOtp($otp);
            Mail::to($email)->send($mail);
            return redirect()->route('confirmOTP');
        }
    }

    public function indexConfirmOTP()
    {
        $email = session()->get('email');
        return view("page.visitor.forgotPassword.confirmOTP",['email'=> $email]);
    }

    public function confirmOTP(Request $request)
    {
        $otp = $request->input('otp');
        if (session()->get('otp') === $otp && now()->lt(session()->get('otp_expires_at'))) {
            // Clear the OTP and expiration time
            session()->remove('otp');
            session()->remove('otp_expires_at');
            // Redirect or respond with a success message
            return redirect('changePassword');
        }

        // OTP is invalid or expired
        // Redirect or respond with an error message
        return redirect()->back()->with('error', 'Invalid or expired OTP. Please try again.');
    }

    public function indexchangePassword()
    {
        $email = session()->get('email');
        return view('page.visitor.forgotPassword.changePassword',['email'=>$email]);
    }

    public function changePassword(Request $request)
    {
        $email = session()->get('email');
        $user = tbl_account::where('email', $email)->first();
        if ($user) {
            $password1 = $request->input('password1');
            $password2 = $request->input('password2');
            if($password1 == $password2){
                $user->password = hash('sha512',$password1);
                $user->save();
                return redirect('login')->with('resetSuccess','Password Reset Success!');
            }else{
                return redirect()->back()->with('error','Password Not Match!');
            }
        }
    }

    public function resendOTP($email,$otp)
    {
        $mail = new SendOtp($otp);
        Mail::to($email)->send($mail);
    }

    public function OTPSender(Request $request)
    {

    // Generate and send OTP
    $otpData = $this->generateMixedCode(6, 5);
    $otp = strtoupper($otpData['otp']);
    $expiresAt = $otpData['expires_at'];
    $sent = $this->resendOTP($request->input('email'), $otp);

    // Store OTP in session
    $request->session()->put('otp', $otp);
    $request->session()->put('otp_expires_at', $expiresAt);
    $otp = $request->session()->get('otp');
    return response()->json([
        'success' => true,
        'csrf_token' => csrf_token(),
        'otp' => $otp,
        'email' => $request->input('email'),
        ]);
    }


}
