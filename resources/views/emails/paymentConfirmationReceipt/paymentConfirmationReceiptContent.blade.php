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
            <p style="color: #1e1e1e;"><strong>Dear {{ $userName }} ,</strong></p>
            <br>
            <p>We are writing to confirm the receipt of your recent payment. We appreciate your prompt attention to this matter.</p>
            <br><br>
            <div class="payment-details">
                <p><strong>Payment Details:</strong></p>
                <ul>
                    <li>
                        <strong>Payment ID:</strong>
                        @php
                            $count = 0;
                        @endphp
                        @foreach($paymentDetails as $paymentDetails)
                            @if($count > 0)
                            ,
                            @endif
                            {{ $paymentDetails->paymentID }}
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </li>
                    <br>
                    <li><strong>Payment Confirmation Date:</strong> {{ $date }}</li>
                    <br>
                    <li><strong>Submission Code:</strong> {{ $submissionInfo->submissionCode }} </li>
                </ul>
            </div>
            <br>
            <p>If you have any questions or concerns regarding this payment or your account, please do not hesitate to contact our customer support team at lisclick.xyz/faqVisitor</p>
            <br>
            <p>Sincerely,</p>
            <p><strong>LIS(LIGA ILMU SERANTAU)</strong></p>
        </div>
    </div>
</body>
</html>
