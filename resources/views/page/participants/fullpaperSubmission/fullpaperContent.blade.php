    <link rel="icon" type="image/x-icon" href="/images/Logo_Title.png" />

<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<head>
    <style>
        .error{
            border: 1px solid red;
            border-radius: 20px;
            background-color: red;
            text-align: center;
            margin-bottom: 10px;
            color: white;
        }

        .success{
            border: 1px solid lightblue;
            border-radius: 20px;
            background-color: lightblue;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<!-- Header-->
<header class="bg-light text text-dark py-5">
                <div class="container px-5 py-5">
                    <div id="contact" class="contact-area section-padding">
                        <div class="container">										
                            <div class="section-title text-center mt-5">
                                <h1>LIS 2023 SUBMISSION</h1>
                                <p>"DIGITAL TRANSFORMATION TOWARDS INFINITE POSSIBILITY"</p>
                            </div>					
                            <div class="row-register">
                                <div class="col-lg-7">	
                                    <div class="contact">
                                        <form class="form" id="fullpaper-form" name="form" enctype="multipart/form-data" method="POST" onsubmit="return validateAdditionalAuthor(event)">
                                        @csrf
                                            <div class="row">
                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label class="category">Please CHOOSE your category :</label>
                                                    <select class="dropdown-option" id="category" name="category" onclick="removeChooseoption()" value="{{ $user -> category }}" required>
                                                        <option selected disabled>Choose</option>
                                                        <option value="Paper Presentation & Publication">Paper Presentation & Publication</option>
                                                        <option value="Paper Presentation ONLY">Paper Presentation ONLY</option>
                                                        <option value="Poster Presentation ONLY">Poster Presentation ONLY</option>
                                                        <option value="Publication ONLY">Publication ONLY</option>
                                                        <option value="Student Presenter">Student Presenter</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->
                                                
                                                <div class="form-group col-md-12">
                                                    <label>Full Name:</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Presenter's Full Name (CAPITAL LETTER)" required="required" value="{{ $user -> name }}" readonly >
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>IC Number:</label>
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
                                                    <input type="text" name="poscode" class="form-control" placeholder="Poscode" required="required" value="{{ $user -> postcode }}" readonly>
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
                                                
                                                <div class="form-group col-md-12">
                                                    <label>Second Author's Email:</label>
                                                    <input type="email" name="participants2_email" class="form-control" placeholder="Second Author's Email">
                                                    <div id="participants2-email-error" class="text-danger"></div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Second Author's Name:</label>
                                                    <input type="text" name="participants2_name" class="form-control" placeholder="Second Author's Name">
                                                    <div id="participants2-name-error" class="text-danger"></div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Third Author's Email:</label>
                                                    <input type="email" name="participants3_email" class="form-control" placeholder="Third Author's Email">
                                                    <div id="participants3-email-error" class="text-danger"></div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Third Author's Name:</label>
                                                    <input type="text" name="participants3_name" class="form-control" placeholder="Third Author's Name">
                                                    <div id="participants3-name-error" class="text-danger"></div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Title:</label>
                                                    <input type="text" name="paper-title" class="form-control" placeholder="Title" required>
                                                </div>

                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label class="category">Sub-themes :</label>
                                                    <select class="dropdown-option" name="sub-theme" id="sub-theme" onclick="removeChooseoption()" required>
                                                        <option selected disabled>Choose</option>
                                                        <option value="Engineering & Technology">Engineering & Technology</option>
                                                        <option value="Social Science">Social Science</option>
                                                        <option value="Information Technology (IT) & Communication">Information Technology (IT) & Communication</option>
                                                        <option value="Environment & Health">Environment & Health</option>
                                                        <option value="Technical Vocational Education and Training (TVET)">Technical Vocational Education and Training (TVET)</option>
                                                        <option value="Renewable Energy">Renewable Energy</option>
                                                        <option value="Commerce">Commerce</option>
                                                        <option value="Multi-Discipline">Multi-Discipline</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->

                                                <!-- HTML button element that will trigger the file upload -->
                                                <label class="upload">Please Upload File :</label>
                                                <p><em>Format : ".docx(word)"</em></p>
                                                <p><em>For more information, please <a href="/conferencesDownload">click here.</a></em></p>
                                                <div class="upload-sect">
                                                    <input type="file" id="file-upload" name="file_upload" required>
                                                </div>

                                                <!-- HTML modal popup element -->
                                                <div id="myModal" class="modal">
                                                <div class="modal-content">
                                                    <span class="close">&times;</span>
                                                    <p>Please upload .docx(word) file only.</p>
                                                </div>
                                                </div>

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

                                                <!--Dropdown-->
                                                <div class="form-group col-md-3 presentMode-Container">
                                                    <label class="category presentMode-label">Please select the presentation mode you will choose for the session :</label>
                                                    <select class="dropdown-option" id="presentMode" name="presentMode" onclick="removeChooseoption()" required>
                                                        <option value="" selected disabled>Choose</option>
                                                        <option value="Face-to-Face">Face-to-Face</option>
                                                        <option value="Online">Online</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->

                                                </div>
                                            </div>
                                            <script>
                                                const categoryDropdown = document.querySelector('select[name="category"]');
                                                const presentModeDropdown = document.querySelector('select[name="presentMode"]');
                                                const presentModeFormGroup = document.querySelector('.presentMode-Container');

                                                // Add change event listener to category dropdown
                                                categoryDropdown.addEventListener('change', () => {
                                                if (categoryDropdown.value === 'Publication ONLY') {
                                                    // Hide presentMode dropdown and add "No Present" option
                                                    presentModeFormGroup.style.display = 'none';
                                                    presentModeDropdown.innerHTML += '<option value="No Present" selected>No Present</option>';
                                                } else {
                                                    // Show presentMode dropdown and remove "No Present" option
                                                    presentModeFormGroup.style.display = 'block';
                                                    const noPresentOption = presentModeDropdown.querySelector('option[value="No Present"]');
                                                    if (noPresentOption) {
                                                    noPresentOption.remove();
                                                    }
                                                }
                                                });
                                                    
                                                function validateAdditionalAuthor(event) {

                                                    const form = document.getElementById('fullpaper-form');
                                                    const participants2Email = form.elements['participants2_email'].value;
                                                    const participants2Name = form.elements['participants2_name'].value;
                                                    const participants3Email = form.elements['participants3_email'].value;
                                                    const participants3Name = form.elements['participants3_name'].value;

                                                    const participants2EmailError = document.getElementById('participants2-email-error');
                                                    const participants2NameError = document.getElementById('participants2-name-error');
                                                    const participants3EmailError = document.getElementById('participants3-email-error');
                                                    const participants3NameError = document.getElementById('participants3-name-error');

                                                    participants2EmailError.textContent = '';
                                                    participants2NameError.textContent = '';
                                                    participants3EmailError.textContent = '';
                                                    participants3NameError.textContent = '';

                                                    let isError = false;

                                                    if (participants2Name && !participants2Email) {
                                                        participants2EmailError.textContent = 'Please enter a valid email address for 2nd author';
                                                        
                                                        isError = true;
                                                    }else if (participants2Email && !isValidEmail(participants2Email)) {
                                                        participants2EmailError.textContent = 'Please enter a valid email address for 2nd author';
                                                        isError = true;
                                                    }else if(participants2Email && isValidEmail(participants2Email)){
                                                        participants2EmailError.textContent = '';
                                                    }

                                                    if (participants2Email && !participants2Name) {
                                                        participants2NameError.textContent = 'Please enter the name for 2nd author';
                                                        isError = true;
                                                    }else if (participants2Name && !isValidEmail(participants2Email)) {
                                                        participants2EmailError.textContent = 'Please enter a valid email address for 2nd author';
                                                        isError = true;
                                                    }else if(participants2Name && isValidEmail(participants2Email)){
                                                        participants2NameError.textContent = '';
                                                    }

                                                    if (participants3Name && !participants3Email) {
                                                        participants3EmailError.textContent = 'Please enter a valid email address for 3rd author';
                                                        isError = true;
                                                    }else if (participants3Email && !isValidEmail(participants3Email)) {
                                                        participants3EmailError.textContent = 'Please enter a valid email address for 3nd author';
                                                        isError = true;
                                                    }else if(participants3Email && isValidEmail(participants3Email)){
                                                        participants3EmailError.textContent = '';
                                                    }

                                                    if (participants3Email && !participants3Name) {
                                                        participants3NameError.textContent = 'Please enter the name for 3rd author';
                                                        isError = true;
                                                    }else if (participants3Email && !isValidEmail(participants3Email)) {
                                                        participants3EmailError.textContent = 'Please enter a valid email address for 3nd author';
                                                        isError = true;
                                                    }else if(participants3Name && isValidEmail(participants3Email)){
                                                        participants3NameError.textContent = '';
                                                    }

                                                    if (isError == true) {
                                                        event.preventDefault();
                                                    }
                                                }

                                                function isValidEmail(email) {
                                                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                                    return emailRegex.test(email);
                                                }
                                                $(document).ready(function(){
                                                    
                                                    var form = $("#fullpaper-form");

                                                    form.on("submit", function(event) {
                                                        event.preventDefault();
                                                        var category = $("#category").val();
                                                        var presentMode = $("#presentMode").val();
                                                        var subTheme = $("#sub-theme").val();
                                                        if (category === null) {
                                                            event.preventDefault();
                                                            alert("Please select a category.");
                                                        }

                                                        if (presentMode === null){
                                                            event.preventDefault();
                                                            alert("Please select a Presentation Mode.");
                                                        }

                                                        if (subTheme === null){
                                                            event.preventDefault();
                                                            alert("Please select a Sub-theme.");
                                                        }

                                                        if(category !== null && presentMode !== null && presentMode !== null){
                                                            form.unbind('submit').submit();
                                                        }
                                                    });
                                                });
                                                
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
                                        <!-- HTML button element that will trigger the modal popup -->
                                        <div class="col-md-12 text-center">
                                            <button type="submit" id="submitButton" class="button-submit" title="Submit your form!">Submit</button>
                                        </div>
                                    </form>
                            </div><!--- END ROW -->
                        </div><!--- END CONTAINER -->	
                    </div>
                </div>
            </header>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
