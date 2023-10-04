<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\homepage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\tbl_account;
use App\Mail\emailVerficationOTP;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    //   
    function index()
    {
        session()->start();
        return view('page.visitor.registration.registration');
    }

    public function store(request $request)
    {
        $email = $request -> input('email');//get email from user
        $isExist = tbl_account::where('email', $email)->first();
        if($isExist != null){
            return redirect()->back()->with('error','Email Already Exist!');
        }else{
            $password = $request -> input('password1');
            $name = $request -> input('name');//get name from user
            $IC_No = $request -> input('IC_No');//get IC_No from user
            $phoneNumber = $request -> input('phoneNumber');//get Phone Number from user
            $salutation = $request -> input('salutation');//get title from user
            if($salutation == "Others"){
                $salutation = $request -> input('salutationInput');
            }
            $organizationName = $request -> input("organizationName");//get organizationName from user
            $address = $request -> input('address');//get address from user
            $postcode = $request -> input('postcode');//get postcode from user
            $country = $request -> input('country');//get country from user
            $state = $request -> input('state');//get state from user
            $category = $request -> input('category');//get category from user
            $date = now();//get timestamp now

            $hashedPassword = hash('sha512',$password);//encrypt the password that input by user using "Hash:make" function
            //create a set of data that will be insert to database
            $data1 = array('email'=>$email,'password'=>$hashedPassword,'created_at'=>$date,'updated_at'=>$date);
            //create a set of data that will be insert to database
            $data2 = array('email'=>$email,'IC_No'=>$IC_No,'name'=>$name,'salutation'=>$salutation,'phoneNumber'=>$phoneNumber,'organizationName'=>$organizationName,'organizationAddress'=>$address,'postcode'=>$postcode,'state'=>$state,'country'=>$country,'participantsCategory'=>$category,'dateOfRegister'=>$date,'created_at'=>$date,'updated_at'=>$date);
            dd(123);
            //insert the data to database with specified table and the dataset that have been create
            DB::table('tbl_account')->insert($data1);
            //insert the data to database with specified table and the dataset that have been create
            DB::table('tbl_participants_info')->insert($data2);

            //redirect the user to login page
            return redirect('login');
        
        }
            
    }

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

    

    public function sendOTP($email,$otp)
    {
        $mail = new emailVerficationOTP($otp);
        Mail::to($email)->send($mail);
    }

    public function OTPSender(Request $request)
    {

    // Generate and send OTP
    $otpData = $this->generateMixedCode(6, 5);
    $otp = strtoupper($otpData['otp']);
    $expiresAt = $otpData['expires_at'];
    $sent = $this->sendOTP($request->input('email'), $otp);

    // Store OTP in session
    $request->session()->put('otp', $otp);
    $request->session()->put('otp_expires_at', $expiresAt);
    $otp = $request->session()->get('otp');
    return response()->json([
        'success' => true,
        'csrf_token' => csrf_token(),
        'otp' => $otp,
    ]);
}

    public function confirmOTP(Request $request)
    {
        $otp = $request->input('otp');
        $storedOtp = $request->session()->get('otp');

        if ($storedOtp == $otp && now()->lt($request->session()->get('otp_expires_at'))) {
            // Clear the OTP and expiration time
            $request->session()->forget('otp');
            $request->session()->forget('otp_expires_at');
            // Return success response
            return response()->json(['success' => true]);
        } else {
            // Return error response
            return response()->json(['success' => false,'storedOtp' => $storedOtp]);
        }
    }
}
