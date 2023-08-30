<html>
    @if($qrCode == NULL)
        <h1>QR Code is not available</h1>
        <form action="{{ route('uploadNewPaymentQR') }}" method="POST" enctype="multipart/form-data">
            @csrf
            UPLOAD NEW QR CODE
            <input type="file" name="image" accept=".jpeg,.jpg,.png">
            <button type="submit">Upload</button>
        </form>
    @else
        <h1>Current QR Code</h1>
        <img src="{{ asset('paymentQR/'.$qrCode->masterdata_value) }}" style="max-height: 100px; max-width:100px; " alt="QR Code">
        <form action="{{ route('uploadNewPaymentQR') }}" method="POST" enctype="multipart/form-data">
            @csrf
            UPLOAD NEW QR CODE
            <input type="file" name="image" accept=".jpeg,.jpg,.png">
            <button type="submit">Upload</button>
        </form>
    @endif
</html>