<link rel="icon" type="image/x-icon" href="assets/favicon.ico" wfd-invisible="true">
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
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
                                        <form class="form" name="form" enctype="multipart/form-data" method="POST" onsubmit="return validation();">
                                        @csrf
                                            <div class="row">
                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label class="category">Please CHOOSE your category :</label>
                                                    <select class="dropdown-option" name="category"  onclick="removeChooseoption()" value="{{ $user -> category }}" required="required">
                                                        <option selected disabled>Choose</option>
                                                        <option value="Paper Presentation & Publication">Paper Presentation & Publication</option>
                                                        <option value="Paper Presentation ONLY">Paper Presentation ONLY</option>
                                                        <option value="Poster Presentation ONLY">Poster Presentation ONLY</option>
                                                        <option value="Publication ONLY">Publication ONLY</option>
                                                        <option value="Student Presenter">Student Presenter</option>
                                                        <option value="Audience Presenter">Audience Presenter</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->
                                                
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="name" class="form-control" placeholder="Presenter's Full Name (CAPITAL LETTER)" required="required" value="{{ $user -> name }}" readonly >
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="IC" class="form-control" placeholder="Presenter's Identification Number (MyKad) *without -" required="required" value="{{ $user -> IC_No }}" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="number" class="form-control" placeholder="Presenter's Contact number" required="required" value="{{ $user -> phoneNumber }}" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="email" class="form-control" placeholder="Presenter's Email Address" required="required" value="{{ $user -> email }}" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="address" class="form-control" placeholder="Presenter's Organization Name" value="{{ $user -> organizationName }}" required="required" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <textarea rows="6" name="message" class="form-control" placeholder="Address" required="required" readonly>{{ $user -> organizationAddress }}</textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" name="poscode" class="form-control" placeholder="Poscode" required="required" value="{{ $user -> postcode }}" readonly>
                                                </div>

                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <input type="text" name="poscode" class="form-control" placeholder="Poscode" required="required" value="{{ $user -> country }}" readonly>
                                                </div>
                                                <!--End Dropdown-->
                                                
                                                <!--Dropdown-->
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="poscode" class="form-control" placeholder="Poscode" required="required" value="{{ $user -> state }}" readonly>
                                                </div>
                                                <!--End Dropdown-->
                                                
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="participants2" class="form-control" placeholder="Second Author's Name (CAPITAL LETTER)" oninput="this.value = this.value.toUpperCase()">

                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="participants3" class="form-control" placeholder="Third Author's Name (CAPITAL LETTER)" oninput="this.value = this.value.toUpperCase()">

                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="paper-title" class="form-control" placeholder="Title" required>
                                                </div>

                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label class="category">Sub-themes :</label>
                                                    <select class="dropdown-option" name="sub-theme" onclick="removeChooseoption()" required>
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
                                                    <input type="file" id="file-upload" name="file_upload">
                                                </div>

                                                <!-- HTML modal popup element -->
                                                <div id="myModal" class="modal">
                                                <div class="modal-content">
                                                    <span class="close">&times;</span>
                                                    <p>Please upload .docx(worksheet) file only.</p>
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
                                                <div class="form-group col-md-3">
                                                    <label class="category">Please select the presentation mode you will choose for the session :</label>
                                                    <select class="dropdown-option" name="presentMode" onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                        <option value="Face-to-Face">Face-to-Face</option>
                                                        <option value="Online">Online</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->

                                                </div>
                                            </div>
                                            @if($message = Session::get('error'))
                                            <div class="error">
                                                <span class="error">{{ $message }}</span><br> 
                                            </div>
                                            @elseif ($message = Session::get('success'))
                                            <div class="success">
                                                <span class="successText">{{ $message }}</span><br> 
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