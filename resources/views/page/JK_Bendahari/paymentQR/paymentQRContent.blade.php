<!DOCTYPE html>
<html>
  <head>
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
      }
      .uploadQR {
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        max-width: 800px;
        margin-top: 12%;
        margin-bottom: 9%;
      }
      .uploadQR h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
      }
      .uploadQR label {
        font-size: 18px;
        margin-bottom: 10px;
        display: block;
      }
      .uploadQR textarea {
        width: 100%;
        height: 150px;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
      }
      .uploadQR input[type="file"] {
        margin-bottom: 20px;
      }
      .uploadQR button[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
      }
      .uploadQR button[type="submit"]:hover {
        background-color: #3e8e41;
      }
      .uploadQR a {
        color: #fff;
        text-decoration: none;
      }
      .uploadQR a:hover {
        text-decoration: underline;
      }

      label {
        color: #333;
      }

      button {
        background-color: rgb(255, 102, 102);
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      button:hover {
        background-color: red;
      }

      .fa-trash {
        margin-right: 5px;
      }

      #qrCode{
        width: 30%;
        height: 30%;
        max-width: 30%;
        max-height: 30%;
      }
    </style>
  </head>
  <body>
    <div class="uploadQR">
      @if($qrCode == NULL)
      <h1>QR Code is not available</h1>
      <form action="{{ route('uploadNewPaymentQR') }}" method="POST" enctype="multipart/form-data" style="margin-top: 10%;">
        @csrf
        <label for="details">Please type the payment details below</label>
        <textarea name="details" type="text"></textarea>
        <br>
        <label for="image">Upload new QR code:</label>
        <input type="file" name="image" accept=".jpeg,.jpg,.png">
        <br>
        <button type="submit">Upload</button>
      </form>
      @else
      @if($qrCode->masterdata_value != NULL)
      <h1>Current QR Code</h1>
      <img id="qrCode" src="{{ asset('paymentQR/'.$qrCode->masterdata_value) }}" alt="QR Code">
      <br>
      <button style="margin-top: 1%;"><a href="/removePaymentQR"><i class="fas fa-trash"></i>Remove Current QR</a></button>
      @else
      <h1>No QR Code</h1>
      @endif
      <form action="{{ route('uploadNewPaymentQR') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="details">Please type the payment details below</label>
        @if($qrCode->masterdata_details != NULL)
        <textarea name="details" type="text">{{ $qrCode->masterdata_details }}</textarea>
        <br>
        <button><a href="/removePaymentDetails"><i class="fas fa-trash"></i>Remove Current Payment Details</a></button>
        @else
        <textarea name="details" type="text"></textarea>
        @endif
        <br>
        <label for="image">Upload new QR code:</label>
        <input type="file" name="image" accept=".jpeg,.jpg,.png">
        <br>
        <button type="submit">Upload</button>
      </form>
      @endif
    </div>
  </body>
</html>