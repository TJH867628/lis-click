<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Confirmation Receipt</title>
    <style>
        /* Reset some default styles for email */
        body, p {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
        }

        /* Container for the email */
        .container {
            margin: 0 auto;
            padding: 20px;
        }

        /* Header styles */
        .header {
            text-align: center;
            background-color: transparent !important;
            color:#1e1e1e;
            padding: 20px 0;
        }

        /* Content container */
        .content {
            padding: 20px;
            background-color: #f4f4f4;
        }

        /* Payment details */
        .payment-details {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        /* Footer styles */
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Payment Confirmation Receipt</h2>
        </div>
        <div class="content">
            @include('emails.header')
            <p>We are writing to inform you that your application for the position of reviewer has been approved. Congratulations! We appreciate your interest in this role and look forward to working with you as a valuable member of our team.</p>
            <p>Below are your username and password for reviewer account : </p>
            <br><br>
            <div class="payment-details">
                <p><strong>Payment Details:</strong></p>
                <ul>
                    <li>
                        <strong>Username:</strong>
                            {{ $username }}
                    </li>
                    <li><strong>Password:</strong> {{ $password }}</li>
                </ul>
            </div>
            <br>
            <br>
            <p>Sincerely,</p>
            <p><strong>LIS(LIGA ILMU SERANTAU)</strong></p>
        </div>
    </div>
</body>
</html>
