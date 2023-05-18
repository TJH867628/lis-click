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
    </style>
</head>
<body style="background-color: white;">
    <h2>LIS-CLICK Account Password Reset</h2>
    <img src="https://scontent.fkul8-2.fna.fbcdn.net/v/t39.30808-6/332192489_543327111225757_6521873914743602229_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=174925&_nc_ohc=7P9FvL3tPlsAX-W2CAm&_nc_ht=scontent.fkul8-2.fna&oh=00_AfCUW500XmOYvRVLdgMGKHxGq3lzhSPYkC2xXBerGANs5g&oe=6469FEA5" style="width: 500px; height:150px;" alt="logoLIS2023" />
    <div class="otp">
        <p style="font-weight: bold; color:black; margin-left:20px; font-size: 30px;">Your OTP is: </p>
        <div style="background-color:darkblue; width:max-content; margin:50px; margin-left:80px; justify-content:center; text-align:center;">
            <p style="color: white; font-size:50px; font-weight:bold; margin:10px;">{{ $otp }}</p>
        </div>
        <p>Thank you for using LIS-CLICK!</p>
    </div>
    
</body>
</html>
