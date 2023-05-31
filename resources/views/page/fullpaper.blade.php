<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Full Paper Submission</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/Logo1 (1).png" width="200px" alt="logoLIS2023" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conference</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="FeConference.html">Conference Info</a></li>
                                    <li><a class="dropdown-item" href="Fedownload.html">Download</a></li>
                                </ul>
                            <li class="nav-item"><a class="nav-link" href="FePublication.html">Publication</a></li>
                            <li class="nav-item"><a class="nav-link" href="FeFaq.html">Contact Us</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Registration</a>
                                    <ul class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdownBlog">
                                        <li><a class="dropdown-item" href="FeLISregister.html">LIS Registration</a></li>
                                        <li><a class="dropdown-item" href="FePoster.html">Poster Submission</a></li>
                                        <li><a class="dropdown-item" href="FeFullPaper.html">Full Paper Submission</a></li>
                                        <li><a class="dropdown-item" href="FeSubmissionList.html">Submission Status</a></li>
                                        </ul>
                                        <li class="nav-item"><a class="nav-link" href="FeAccount.html">My Profile</a></li>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Header-->
            <header class="bg-light text text-dark py-5">
                <div class="container px-5 py-5">
                    <div id="contact" class="contact-area section-padding">
                        <div class="container">										
                            <div class="section-title text-center mt-5">
                                <h1>LIS 2023 FULL PAPER</h1>
                                <p>"DIGITAL TRANSFORMATION TOWARDS INFINITE POSSIBILITY"</p>
                            </div>					
                            <div class="row-register">
                                <div class="col-lg-7">	
                                    <div class="contact">
                                        <form class="form" name="form" enctype="multipart/form-data" method="post" onsubmit="return validation();">
                                        @csrf
                                            <div class="row">
                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label class="category">Please CHOOSE your category :</label>
                                                    <select class="dropdown-option" name="category"  onclick="removeChooseoption()" value="{{ $user -> category }}">
                                                        <option selected disabled>Choose</option>
                                                        <option value="presenter & publication">Paper Presentation & Publication</option>
                                                        <option value="paper presenter only">Paper Presentation ONLY</option>
                                                        <option value="poster presenter only">Poster Presentation ONLY</option>
                                                        <option value="publication only">Publication ONLY</option>
                                                        <option value="student presenter">Student Presenter</option>
                                                        <option value="audience presenter">Audience Presenter</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->
                                                
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="name" class="form-control" placeholder="Presenter's Full Name (CAPITAL LETTER)" required="required" value="{{ $user -> participants1 }}" readonly >
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
                                                    <input type="text" name="address" class="form-control" placeholder="Presenter's Organization Name" value="{{ $user -> organizationName }}" required="required">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <textarea rows="6" name="message" class="form-control" placeholder="Address" required="required" value="{{ $user -> address }}"  readonly></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" name="poscode" class="form-control" placeholder="Poscode" required="required" value="{{ $user -> postcode }}" readonly>
                                                </div>

                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label class="category">Country :</label>
                                                    <select id="country" class="dropdown-option" name="country"  onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                        <option value="malaysia">Malaysia</option>
                                                        <option value="indonesia">Indonesia</option>
                                                        <option value="taiwan">Taiwan</option>
                                                        <option value="vietnam">Vietnam</option>
                                                        <option value="singapore">Singapore</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->
                                                
                                                <!--Dropdown-->
                                                <div class="form-group col-md-4">
                                                    <label for="state">State :</label>
                                                    <select id="state" class="dropdown-option" name="country"  onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                        <option value="">-- Select State --</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->
                                                
                                            <script>
                                            $(document).ready(function() {
                                            // Define an object that maps countries to states
                                            var stateOptions = {
                                            malaysia: ["Johor", "Kedah", "Kelantan", "Melaka", "Negeri Sembilan", "Pahang", "Perak", "Perlis", "Penang", "Sabah", "Sarawak", "Selangor", "Terengganu"],
                                            indonesia: ["Aceh", "Bali", "Bangka Belitung", "Banten", "Bengkulu", "Gorontalo", "Jakarta", "Jambi", "Jawa Barat", "Jawa Tengah", "Jawa Timur", "Kalimantan Barat", "Kalimantan Selatan", "Kalimantan Tengah", "Kalimantan Timur", "Kepulauan Riau", "Lampung", "Maluku", "Maluku Utara", "Nusa Tenggara Barat", "Nusa Tenggara Timur", "Papua", "Papua Barat", "Riau", "Sulawesi Barat", "Sulawesi Selatan", "Sulawesi Tengah", "Sulawesi Tenggara", "Sulawesi Utara", "Sumatera Barat", "Sumatera Selatan", "Sumatera Utara", "Yogyakarta"],
                                            taiwan: ["Changhua", "Chiayi", "Hsinchu", "Hualien", "Kaohsiung", "Keelung", "Miaoli", "Nantou", "Penghu", "Pingtung", "Taichung", "Tainan", "Taipei", "Taitung", "Taoyuan", "Yilan", "Yunlin"],
                                            singapore: ["Central Region", "East Region", "North Region", "North-East Region", "West Region"],
                                            vietnam: ["Ho Chi Minh City", "Hanoi", "Can Tho", "Da Nang", "Hai Phong", "Ba Ria-Vung Tau", "Bac Giang", "Bac Kan", "Bac Lieu", "Bac Ninh", "Ben Tre", "Binh Dinh", "Binh Duong", "Binh Phuoc", "Binh Thuan", "Ca Mau", "Cao Bang", "Dak Lak", "Dak Nong", "Dien Bien", "Dong Nai", "Dong Thap", "Gia Lai", "Ha Giang", "Ha Nam", "Ha Tinh", "Hai Duong", "Hau Giang", "Hoa Binh", "Hung Yen", "Khanh Hoa", "Kien Giang", "Kon Tum", "Lai Chau", "Lam Dong", "Lang Son", "Lao Cai", "Long An", "Nam Dinh", "Nghe An", "Ninh Binh", "Ninh Thuan", "Phu Tho", "Quang Binh", "Quang Nam", "Quang Ngai", "Quang Ninh", "Quang Tri", "Soc Trang", "Son La", "Tay Ninh", "Thai Binh", "Thai Nguyen", "Thanh Hoa", "Thua Thien-Hue", "Tien Giang", "Tra Vinh", "Yen Bai"]
                                            };

                                            // When a country is selected, update the options in the state dropdown
                                            $('#country').change(function() {
                                                var selectedCountry = $(this).val();
                                                var stateOptionsHtml = '<option value="">-- Select State --</option>';
                                                if (selectedCountry && stateOptions[selectedCountry]) {
                                                var states = stateOptions[selectedCountry];
                                                for (var i = 0; i < states.length; i++) {
                                                    stateOptionsHtml += '<option value="' + states[i] + '">' + states[i] + '</option>';
                                                }
                                                }
                                                $('#state').html(stateOptionsHtml);
                                            });
                                            });
                                            </script>

                                                <div class="form-group col-md-12">
                                                    <input type="text" name="2nd-name" class="form-control" placeholder="Second Author's Name (CAPITAL LETTER)" required="required" value="{{ $user -> participants2 }}" oninput="this.value = this.value.toUpperCase()">

                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="3rd-name" class="form-control" placeholder="Third Author's Name (CAPITAL LETTER)" required="required" value="{{ $user -> participants3 }}" oninput="this.value = this.value.toUpperCase()">

                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="paper-title" class="form-control" placeholder="FULL PAPER Title" required="required" value="{{ $user -> submissionTitle }}">
                                                </div>

                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label class="category">Sub-themes :</label>
                                                    <select class="dropdown-option" name="abstract-category" onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                        <option value="opt">Engineering & Technology</option>
                                                        <option value="opt">Social Science</option>
                                                        <option value="opt">Information Technology (IT) & Communication</option>
                                                        <option value="opt">Environment & Health</option>
                                                        <option value="opt">Technical Vocational Education and Training (TVET)</option>
                                                        <option value="opt">Renewable Energy</option>
                                                        <option value="opt">Commerce</option>
                                                        <option value="opt">Multi-Discipline</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->

                                                <!-- HTML button element that will trigger the file upload -->
                                                <label class="upload">Please Upload FULL Paper :</label>
                                                <p><em>Format : ".docx / .pdf"</em></p>
                                                <p><em>For more information, please <a href="FeDownload.html">click here.</a></em></p>
                                                <div class="upload-sect">
                                                    <input type="file" id="file-upload" name="file_upload">
                                                </div>

                                                <!-- HTML modal popup element -->
                                                <div id="myModal" class="modal">
                                                <div class="modal-content">
                                                    <span class="close">&times;</span>
                                                    <p>Please upload a .docx or a .pdf file.</p>
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
                                                    if (fileType == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || fileType == "application/pdf") {
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
                                                    <select class="dropdown-option" name="mode-category" onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                        <option value="opt">Face-to-Face</option>
                                                        <option value="opt">Online</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->

                                                </div>
                                            </div>
                                        <!-- HTML button element that will trigger the modal popup -->
                                        <div class="col-md-12 text-center">
                                            <button type="submit" id="submitButton" class="button-submit" title="Submit your form!">Submit</button>
                                        </div>
                                        </form>

                                        
                                        <!-- HTML modal popup element -->
                                        <div id="btn-myModal" class="sub-modal">
                                            <div class="sub-modal-content">
                                            <span class="sub-close">&times;</span>
                                            <p>Thank you for submitting!</p>
                                            </div>
                                        </div>
                                        </script>
                                        
                            </div><!--- END ROW -->
                        </div><!--- END CONTAINER -->	
                    </div>
                </div>
            </header>

        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">© 2023 LIGA ILMU SERANTAU 2023. All Rights Reserved. Design by Politeknik Mersing</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>