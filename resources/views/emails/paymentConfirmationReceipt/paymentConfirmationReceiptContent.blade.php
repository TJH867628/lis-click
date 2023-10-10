<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Confirmation Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .header {
            text-align: center;
        }
        .details {
            margin-top: 20px;
        }
        .signature {
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
            <h2>Payment Confirmation Receipt</h2>
        </div>
        <div class="details">
            <p><strong>Submission Code :</strong>{{ $submissionCode }}</p>
            <p>
                <strong>Payment ID:</strong>
                @foreach($paymentDetails as $paymentDetails)
                    {{ $paymentDetails->paymentID }}
                @endforeach
            </p>
            <p><strong>Date:</strong>{{ $date }}</p>
            <p>Your payment for <strong>{{ $submissionCode }}</strong> had been verified</p>
        </div>
    </div>
</body>
</html>
