<html>
    <head>
        <style>
            .uploadQR{
                text-align: center;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <br><br><br><br><br>
        <div class="uploadQR">
            @if($qrCode == NULL)
                <h1>QR Code is not available</h1>
                <form action="{{ route('uploadNewPaymentQR') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <label for="details">Please type the payment details below</label><br>
                    <textarea style="width: 500px; height:200px;" name="details" type="text"></textarea><br>
                    UPLOAD NEW QR CODE
                    <input style="margin:auto;" type="file" name="image" accept=".jpeg,.jpg,.png">
                    <button type="submit">Upload</button>
                </form>
            @else
                @if($qrCode->masterdata_value != NULL)
                    <h1 style="color: white;">Current QR Code</h1>
                    <img src="{{ asset('paymentQR/'.$qrCode->masterdata_value) }}" style="max-height: 100px; max-width:100px; " alt="QR Code"><br>
                    <button><a style="margin:auto;" href="/removePaymentQR  ">Remove Current Payment QR</a></button>
                @else
                    <h1 style="color: white;">No QR Code</h1>
                @endif
                <form action="{{ route('uploadNewPaymentQR') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="details">Please type the payment details below</label><br>
                    @if($qrCode->masterdata_details != NULL)
                        <textarea style="width: 500px; height:200px;" name="details" type="text">{{ $qrCode->masterdata_details }}</textarea><br>
                        <button><a style="margin:auto;" href="/removePaymentDetails">Remove Current Payment Details</a></button>
                    @else
                        <textarea style="width: 500px; height:200px;" name="details" type="text"></textarea><br>
                    @endif
                    <br>
                    UPLOAD NEW QR CODE<br>
                    <input style="margin:auto;" type="file" name="image" accept=".jpeg,.jpg,.png">
                    <button type="submit">Upload</button>
                </form>
            @endif
        </div>
    </body>
</html>