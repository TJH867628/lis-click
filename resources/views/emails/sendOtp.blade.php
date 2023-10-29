<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LIS-Click Reset Password</title>
    <style>
        .otp{
            width: max-content;
            margin: 50px;
            margin-left: 100px;
            margin-right: 100px;
            justify-content: center;
            text-align: center;
        }

        body{
            text-align: center;
        }
    </style>
</head>
<body style="background-color: white;">
    @include('emails.header')
    <h2>LIS-CLICK Account Password Reset</h2>
    <h3>LIS-CLICK</h3>
    <div class="otp">
        <p style="font-weight: bold; color:black; margin-left:20px; font-size: 30px;">Your OTP is: </p>
        <div style="background-color:darkblue; width:max-content; margin:50px; margin-left:80px; justify-content:center; text-align:center;">
            <p style="color: white; font-size:50px; font-weight:bold; margin:10px;">{{ $otp }}</p>
        </div>
        <p>Thank you for using LIS-CLICK!</p>
    </div>
    
</body>
</html>
