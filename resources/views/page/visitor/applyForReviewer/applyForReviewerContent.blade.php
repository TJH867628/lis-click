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
    width: 500px;
    padding: 20px;
    border: 1px solid #dee2e6;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    background-color: white;
}

    @media (max-width: 523px) {
        /* Adjust the margin-top for smaller screens */
        form {
            max-width: 300px;
        }
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

.navbar{
    position: sticky;
    top:0;
}

body {
    min-height: 120vh;
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

#applyResult{
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

.py-5 {
    padding-top: 40rem !important;
    padding-bottom: 3rem !important;
}

@media (max-width: 768px){
    .py-5 {
        padding-top: 40rem !important;
        padding-bottom: 3rem !important;
    }
    
}

@media (max-width: 522px){
    .py-5 {
        padding-top: 50rem !important;
        padding-bottom: 3rem !important;
    } 
}

@media (max-width: 385px){
    .py-5 {
        padding-top: 60rem !important;
        padding-bottom: 3rem !important;
    } 
}

</style>
</head>
<!-- Header-->
        <header class="bg-light text text-dark py-5">
                            
                            <div class="row-register">
                                <div class="col-lg-7">	
                                    <form class="form" id="fullpaper-form" name="form" action="{{ route('applyForReviewer',['userId'=>'visitor']) }}" enctype="multipart/form-data" method="POST" onsubmit="return validateAdditionalAuthor(event)">
                                        @csrf
                                            <div class="section-title text-center mt-5">
                                                <h1>LIS (LIGA ILMU SERANTAU)</h1>
                                                <p>"DIGITAL TRANSFORMATION TOWARDS INFINITE POSSIBILITY"</p>
                                                <h2 style="margin: auto;">Apply For Reviewer</h2>
                                            </div>	
                                            <div class="form-group col-md-12">
                                                <label>Highest Education:</label>
                                                <select name="highestEducation" class="form-control" required="required">
                                                    <option value="" disabled selected>Select Highest Education Level</option>
                                                    <option value="Bachelor's Degree">Bachelor's Degree</option>
                                                    <option value="Master's Degree">Master's Degree</option>
                                                    <option value="PhD">PhD</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Field:</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="field1" name="field[]" value="Engineering & Technology" style="height: 20px; width: 10%">
                                                    <label class="custom-control-label" for="field1">Engineering & Technology</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="field2" name="field[]" value="Social Science" style="height: 20px; width: 10%">
                                                    <label class="custom-control-label" for="field2">Social Science</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="field3" name="field[]" value="Information Technology & Communication" style="height: 20px; width: 10%">
                                                    <label class="custom-control-label" for="field3">Information Technology & Communication</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="field4" name="field[]" value="Environment and Health" style="height: 20px; width: 10%">
                                                    <label class="custom-control-label" for="field4">Environment and Health</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="field5" name="field[]" value="Technical Vocational Education and Training(TVET)" style="height: 20px; width: 10%">
                                                    <label class="custom-control-label" for="field5">Technical Vocational Education and Training(TVET)</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="field6" name="field[]" value="Renewable Energy" style="height: 20px; width: 10%">
                                                    <label class="custom-control-label" for="field6">Renewable Energy</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="field7" name="field[]" value="Commerce" style="height: 20px; width: 10%">
                                                    <label class="custom-control-label" for="field7">Commerce</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="field8" name="field[]" value="Multi-Discipline" style="height: 20px; width: 10%">
                                                    <label class="custom-control-label" for="field8">Multi-Discipline</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" onchange="toggleSpecifyField()" id="field9" value="Others" style="height: 20px; width: 10%">
                                                    <label class="custom-control-label" for="field9">Others</label>
                                                    <input type="text" name="field[]" class="form-control" placeholder="Please specify" id="specifyField" style="width: 50%; margin-left: 5%;" hidden>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Full Name:</label>
                                                <input type="text" name="name" class="form-control" placeholder="Full Name (CAPITAL LETTER)" onload="this.value = this.value.toUpperCase()" required="required"  >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Identification Number / Passport:</label>
                                                <input type="text" name="IC" class="form-control" placeholder="Identification Number *without -" required="required" >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Phone Number:</label>
                                                <input type="text" name="number" class="form-control" placeholder="Contact number" required="required" >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Email:</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Organization Name:</label>
                                                <input type="text" name="address" class="form-control" placeholder="Organization Name"  required="required">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Address:</label>
                                                <textarea rows="6" name="message" class="form-control" placeholder="Address" required="required"></textarea>
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
                                            <div>
                                                <p style="color: black; font-size: large;">Upload CV</p>
                                                <label for="file-upload" class="file-upload-label">
                                                    <span>Choose a file</span>
                                                    <i class="fas fa-upload"></i>
                                                </label>
                                                <input id="file-upload" type="file" name="file" accept="application/pdf" onchange="enableUploadButton()"/>
                                            </div>                                                
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
                                            <div style="display:flex; margin-top: 20px; margin-bottom: -20px;">
                                                <input type="checkbox" id="checkbox" name="checkbox">
                                                <div style=" margin-left: 2%; font-size:15px;">By selecting this, I agree to use the documents from this event solely within the event itself.</div>
                                            </div>
                                            <div style="display: flex; flex-direction: column; align-items: center; margin-top: 5%;">
                                                <span id="checkboxError" style="display: none; color: red;">Please check the box before submitting.</span>
                                                <button type="submit" id="submitButton" class="button-submit" title="Submit your form!" style="margin-top: 5%;">Submit</button>
                                            </div>
                                        </div>
                                </form>
                        </div><!--- END CONTAINER -->	
                <script>
            $(document).ready(function() {
                $('#fullpaper-form').on('submit', function(e) {
                    if (!$('#checkbox').is(':checked')) {
                        e.preventDefault();
                        $('#checkboxError').show();
                    } else {
                        $('#checkboxError').hide();
                    }
                });
            });

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
                popup.document.write(String.raw`@if(empty($paymentQR))<h1>Payment QR is not available, please contact customer service</h1>@else @if($paymentQR->masterdata_value != NULL) <img src='{{ asset('paymentQR/'.$paymentQR->masterdata_value) }}'><br> @endif @if($paymentQR->masterdata_details != NULL)<textarea column="20" row="10" style="width:100%; height:50%;">{{ $paymentQR->masterdata_details }}</textarea><br>@endif @if($paymentQR->masterdata_value == NULL && $paymentQR->masterdata_details == NULL) Payment QR is not available, please contact customer service @endif @endif`);        
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

        function toggleSpecifyField() {
            var specifyField = document.getElementById("specifyField");
            var checkbox = document.getElementById("field9");

            if (checkbox.checked) {
                specifyField.removeAttribute("hidden");
            } else {
                specifyField.setAttribute("hidden", "true");
            }
        }
        </script>
    </header>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    