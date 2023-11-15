    <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<head>
<style>

h1 {
    text-align: center;
}

table {
    margin: auto;
    border-collapse: collapse;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    background-color: white;
}

th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #dee2e6;
}

th {
    background-color: #343a40;
    color: white;
}

form {
    color: black;
    margin: auto;
    margin-top: 50px;
    margin-bottom: 30px;
    width: 500px;
    padding: 20px;
    border: 1px solid #dee2e6;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    background-color: white;
}

input[type="text"], textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 20px;
}

input[type="datetime-local"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 20px;
}

button {
    background-color: #007bff;
    color: white;
    padding: 7px 25px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.deleteButton {
    background-color: red;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
}

button:hover {
    background-color: #0069d9;
}

.title {
    margin-top: 10%;
    text-align: center;
}

.title h2 {
    font-size: 36px;
    font-weight: bold;
    color: #007bff;
}

.file-upload-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}

.file-upload-label {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 200px;
    height: 50px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.file-upload-label:hover {
    background-color: #0062cc;
}

.file-upload-label span {
    margin-right: 10px;
}

#file-upload {
    display: none;
}

.file-upload-button {
    margin-top: 10px;
    padding: 10px 20px;
    background-color: lightgray;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.file-upload-button:hover {
    background-color: grey;
}

.btn-download{
    width: 95%;
}

* {
    margin: 0;
    padding: 0;

    box-sizing: border-box;
    font-family: sans-serif;
}

body {
    min-height: 100vh;
    background: url("../images/tblBackground.jpg") center / cover;
    display: flex;
    justify-content: center;
}

main.table {
    margin-top: -4%;
    width: 82vw;
    height: 75vh;
    background-color: #fff5;
    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;
    overflow: hidden;
}

.table__header {
    width: 100%;
    height: 15%;
    background-color: #fff4;
    padding: 1rem 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table__header .search-container {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;

    display: flex;
    justify-content: center;
    align-items: center;

    transition: .2s;
}

.table__header .search-container:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .search-container img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .search-container input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 95%;
    max-height: calc(84% - 1.6rem);
    background-color: #fffb;

    margin: .8rem auto;
    border-radius: .6rem;

    overflow: auto;
    overflow: overlay;
}

.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{ 
    visibility: visible;
}

table {
    width: 100%;
}

td img {
    width: 36px;
    height: 36px;
    margin-right: .5rem;
    border-radius: 50%;

    vertical-align: middle;
}

table, th, td {
    border-collapse: collapse;
    padding: 1rem;
    text-align: center;
}

thead th {
    position: sticky;
    top: 0;
    left: 0;
    background-color: #d5d1defe;
    cursor: pointer;
    text-transform: capitalize;
    z-index: 1;
}

tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
}

.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}

.status.delivered {
    background-color: #86e49d;
    color: #006b21;
}

.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}

.status.pending {
    background-color: #ebc474;
}

.status.shipped {
    background-color: #6fcaea;
}


@media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;
    
    text-align: center;
    font-size: 1rem;
    
    margin-left: .5rem;
    transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
    border: 1.4px solid #6c00bd;
}

thead th:hover {
    color: #6c00bd;
}

thead th.active span.icon-arrow{
    background-color: #6c00bd;
    color: #fff;
}

thead th.asc span.icon-arrow{
    transform: rotate(180deg);
}

thead th.active,tbody td.active {
    color: #6c00bd;
}

#btn, .download {
    margin-right: 10px;
    margin-top: 5px;
    width: max-content;
}

#formContainer{
    margin-top: 45%;
}
</style>
</head>
<!-- Header-->
<header class="bg-light text text-dark py-5">
    @if($user->isDonePayment == false)
                <div class="container px-5 py-5" id="formContainer" >
                    <div id="contact" class="contact-area section-padding">
                        <div class="container">										
                            <div class="section-title text-center mt-5">
                                <h1>LIS (LIGA ILMU SERANTAU)</h1>
                                <p>"DIGITAL TRANSFORMATION TOWARDS INFINITE POSSIBILITY"</p>
                                <h2 style="margin: auto;">Register As Audience</h2>
                            </div>					
                            <div class="row-register">
                                <div class="col-lg-7">	
                                    <div class="contact">
                                        <form class="form" id="fullpaper-form" name="form" action="{{ route('uploadReceipt',['submissionCode'=>$user->id]) }}" enctype="multipart/form-data" method="POST" onsubmit="return validateAdditionalAuthor(event)">
                                        @csrf
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Full Name:</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Presenter's Full Name (CAPITAL LETTER)" onload="this.value = this.value.toUpperCase()" required="required" value="{{ $user -> name }}" readonly >
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Identification Number / Passport:</label>
                                                    <input type="text" name="IC" class="form-control" placeholder="Presenter's Identification Number (MyKad) *without -" required="required" value="{{ $user -> IC_No }}" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Phone Number:</label>
                                                    <input type="text" name="number" class="form-control" placeholder="Presenter's Contact number" required="required" value="{{ $user -> phoneNumber }}" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Email:</label>
                                                    <input type="text" name="email" class="form-control" placeholder="Presenter's Email Address" required="required" value="{{ $user -> email }}" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Organization Name:</label>
                                                    <input type="text" name="address" class="form-control" placeholder="Presenter's Organization Name" value="{{ $user -> organizationName }}" required="required" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Address:</label>
                                                    <textarea rows="6" name="message" class="form-control" placeholder="Address" required="required" readonly>{{ $user -> organizationAddress }}</textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Postcode:</label>
                                                    <input type="text" name="poscode" class="form-control" placeholder="Poscode" required="required"  value="{{ $user -> postcode }}" readonly>
                                                </div>

                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label>Country:</label>
                                                    <input type="text" name="poscode" class="form-control" placeholder="Poscode" required="required" value="{{ $user -> country }}" readonly>
                                                </div>
                                                <!--End Dropdown-->
                                                
                                                <!--Dropdown-->
                                                <div class="form-group col-md-4">
                                                    <label>State:</label>
                                                    <input type="text" name="poscode" class="form-control" placeholder="Poscode" required="required" value="{{ $user -> state }}" readonly>
                                                </div>
                                                <!--End Dropdown-->

                                                <!-- JavaScript code that will create and show the popup -->
                                                <script>
                                                // Get a reference to the file upload input element
                                                const fileUpload = document.getElementById("file-upload");

                                                // Get a reference to the modal popup element and the close button
                                                const modal = document.getElementById("myModal");
                                                const closeButton = document.getElementsByClassName("close")[0];

                                                // Add a change event listener to the file upload input
                                                fileUpload.addEventListener("change", function() {
                                                    // Get the selected file and its type
                                                    const file = this.files[0];
                                                    const fileType = file.type;

                                                    // If the file type is not .docx, show the modal popup
                                                    if (fileType == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                                                        null;
                                                    }else{
                                                        modal.style.display = "block";
                                                        // Clear the file upload input
                                                        this.value = null;
                                                    }
                                                });

                                                // Add a click event listener to the close button
                                                closeButton.addEventListener("click", function() {
                                                    // Hide the modal popup
                                                    modal.style.display = "none";
                                                });
                                                </script>

                                                </div>
                                                <!-- HTML button element that will trigger the modal popup -->
                                                <button type="button" onclick="showPopup()" id="showPaymentMethod" style="margin: auto;">Show Payment Method</button>
                                                <p style="color: black; font-size: large;">Upload New Receipt</p>
                                                <label for="file-upload" class="file-upload-label">
                                                    <span>Choose a file</span>
                                                    <i class="fas fa-upload"></i>
                                                </label>
                                                <input id="file-upload" type="file" name="file" accept=".jpeg,.jpg,.png,application/pdf" onchange="enableUploadButton()"/>
                                            </div>                                                
                                            </script>
                                            @if($message = Session::get('error'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @elseif ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @endif
                                        <div class="col-md-12 text-center">
                                            <button type="submit" id="submitButton" class="button-submit" title="Submit your form!">Submit</button>
                                        </div>
                                    </form>
                            </div><!--- END ROW -->
                            @else
                            <h1>You had complete the payment</h1>
                            <a href="{{ route('presentationSchedule') }}" style="display: block; margin:auto; text-align:center;"><button>Presentation Schedule</button></a>
                            @endif
                            <table class="table__body">
                            <thead>
                                <tr>
                                    <th style="color: black;"> Receipt</th>
                                    <th style="color: black;"> Status</th>
                                </tr>
                            </thead>
                            @php
                                $i = 0;
                                $isEmpty = true;
                            @endphp
                            @foreach($user->payment as $user->payment)
                                <tr>
                                    @php
                                        $i++;
                                    @endphp
                                    <td>
                                    <a href="{{route('downloadPaymentReceipt', $user->payment->proofOfPayment)}}" target="_blank"><i class="fas fa-receipt"></i> Receipt {{ $i }}</a>
                                    </td>
                                    <td>
                                    @if($user->payment->paymentStatus === 'Complete')
                                        <p class="status delivered">Verified</p>
                                        @php
                                            $allComplete = true;
                                            $isEmpty = false;
                                        @endphp
                                    @elseif($user->payment->paymentStatus === "Pending For Verification")
                                        <p class="status shipped">{{ $user->payment->paymentStatus }}</p>
                                        @php
                                            $allComplete = false;
                                            $isEmpty = false;
                                        @endphp
                                    @else
                                        <p class="status cancelled">{{ $user->payment->paymentStatus }}</p>
                                        @php
                                            $allComplete = false;
                                            $isEmpty = false;
                                        @endphp
                                    @endif

                                    </td>
                                </tr>
                                @endforeach
                                @if($isEmpty == true)
                                <tr>
                                <td colspan="2">
                                    <p>Empty</p>
                                </td>
                                @endif
                                </tr>
                            </table>
                        </td> 
                    </tr>
                        </div><!--- END CONTAINER -->	
                    </div>
                </div>
                <script>
            

            $(document).ready(function() {
                $count = 0;
                button = $('#showPaymentMethod');
                button.click(function showPopup() {
                // Create a new window
                var popup = window.open("", "Payment QR", "width=800,height=700");
            if($count == 0){ 
                popup.document.write("<head><title>Payment</title></head>");
                // Add styles
                popup.document.write("<style>");
                popup.document.write("body { font-family: Arial, sans-serif; text-align: center; background-color: #f2f2f2; }");
                popup.document.write("h1 { color: #333; font-size: 24px; margin-top: -20px; }");
                popup.document.write("img { height: 250px; width: 250px; margin: 0px auto; display: block; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); }");
                popup.document.write("label { color: #555; font-size: 18px; margin-top: 10px; display: block; }");
                popup.document.write("</style>");
                

                // Add content
                popup.document.write("<body>");
                popup.document.write(String.raw`@if(empty($paymentQR))<h1>Payment QR is not available, please contact customer service</h1>@else @if($paymentQR->masterdata_value != NULL) <img src='{{ asset('paymentQR/'.$paymentQR->masterdata_value) }}'><br> @endif @if($paymentQR->masterdata_details != NULL)<textarea column="20" row="10" style="width:100%; height:50%;" readonly>{{ $paymentQR->masterdata_details }}</textarea><br>@endif @if($paymentQR->masterdata_value == NULL && $paymentQR->masterdata_details == NULL) Payment QR is not available, please contact customer service @endif @endif`);        
                popup.document.write("@if(empty($paymentQR->masterdata_value))@else <label style='color: red; font-weight: bold;'>Please save your receipt for upload</label>@endif");
                popup.document.write("</body>");

                // Center the window on the screen
                popup.moveTo((screen.width - popup.outerWidth) / 2, (screen.height - popup.outerHeight) / 2);
                $count++;
            }
                });
            });


            function enableUploadButton() {
            const fileUpload = document.getElementById('file-upload');
            const uploadButton = document.getElementById('upload-button');
            if (fileUpload.value) {
                uploadButton.disabled = false;
            } else {
                uploadButton.disabled = true;
            }
        }
        </script>
            </header>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    