<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>My Profile</title>
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
            @csrf
            <!-- Navigation-->
            <nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">
                        <img src="assets/Logo1 (1).png" width="200px" alt="logoLIS2023" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conference</a>
                                <ul class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="FeConference.html">Conference Info</a></li>
                                    <li><a class="dropdown-item" href="Fedownload.html">Downloads</a></li>
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
            <header class="bg-light text text-dark py-5" id="sectionBlur">
                <div class="container px-5 py-5">
                    <div id="contact" class="contact-area section-padding">
                        <div class="container">										
                            <div class="section-title text-center mt-5">
                                <h1>My Profile</h1>
                                <p>Welcome to your Profile, the online home of yours.</p>
                            </div>
                            
                            <div class="row">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                                        <i class="fa fa-home text-center mr-1"></i> 
                                        Account
                                    </a>
                                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                                        <i class="fa fa-key text-center mr-1"></i> 
                                        Password
                                    </a>
                                </div>
                                <form method="post">
                                    @csrf
                                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                        <h3 class="mb-4">Profile Settings</h3>
                                        <div class="profile-picture">
                                            <img src="assets/ProfilePic.png" alt="Profile Picture" />
                                          </div>
                                          <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Title :</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $user -> title }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Full Name :</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $user -> name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Mykad :</label>
                                                    <input type="text" name="IC_No" class="form-control" value="{{ $user -> IC_No }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email Address :</label>
                                                    <input type="text" name="email" class="form-control" value="{{ $user -> email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Contact Number :</label>
                                                    <input type="text" name="phoneNumber" class="form-control" value="{{ $user -> phoneNumber }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Organization Name :</label>
                                                    <input type="text" name="organizationName" class="form-control" value="{{ $user -> organizationName }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address :</label>
                                                    <textarea name="address" class="form-control" rows="4" >{{ $user -> organizationAddress }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Postcode :</label>
                                                    <input type="text" name="postcode" class="form-control" value="{{ $user -> postcode }}">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                      <label>Country :</label>
                                                      <select id="country" class="form-control" name="category" onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                        <option value="malaysia">Malaysia</option>
                                                        <option value="indonesia">Indonesia</option>
                                                        <option value="taiwan">Taiwan</option>
                                                        <option value="vietnam">Vietnam</option>
                                                        <option value="singapore">Singapore</option>
                                                    </select><br>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                      <label>State :</label>
                                                      <select id="state" class="form-control" name="category" onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                    </select><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary">Update</button>
                                            <button class="btn btn-primary">Cancel</button>
                                        </div>
                                    </div>
                                         
                                    <!--- PASSWORD -->
                                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                        <h3 class="mb-4">Password Settings</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <label>Current Password :</label>
                                                      <input type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <label>New Password :</label>
                                                      <input type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <label>Confirm New Password :</label>
                                                      <input type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary">Update</button>
                                            <button class="btn btn-primary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
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
                        <a class="link-light small" href="index.html">Home</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="FeConference.html">Conference</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="FeDownload.html">Download</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="FePublication.html">Publication</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="FeRegistration.html">Register</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="FeFaq.html">Contact</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="FePrivacy.html">Privacy</a>
                    </div>
                </div>
            </div>
        </footer>

        <!--Popup Window
        <div id="popup1">
            <h1>SUCCESS</h1>
            <p>Your profile has been updated</p>
            <button class="button-submit" onclick="toggle()">Done</button>
        </div>
        <div id="popup2">
            <h1>CANCEL</h1>
            <p>Changes will not be saved. Do you want to proceed?</p>
            <button class="button-submit" onclick="toggle()">Discard</button>
            <button class="button-submit" onclick="toggle()">Back</button>
        </div> -->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
            // Define an object that maps countries to states
            var stateOptions = {
            malaysia: ["Johor", "Kedah", "Kelantan", "Melaka", "Negeri Sembilan", "Pahang", "Perak", "Perlis", "Penang", "Sabah", "Sarawak", "Selangor", "Terengganu"],
            indonesia: ["Aceh", "Bali", "Bangka Belitung", "Banten", "Bengkulu", "Gorontalo", "Jakarta", "Jambi", "Jawa Barat", "Jawa Tengah", "Jawa Timur", "Kalimantan Barat", "Kalimantan Selatan", "Kalimantan Tengah", "Kalimantan Timur", "Kepulauan Riau", "Lampung", "Maluku", "Maluku Utara", "Nusa Tenggara Barat", "Nusa Tenggara Timur", "Papua", "Papua Barat", "Riau", "Sulawesi Barat", "Sulawesi Selatan", "Sulawesi Tengah", "Sulawesi Tenggara", "Sulawesi Utara", "Sumatera Barat", "Sumatera Selatan", "Sumatera Utara", "Yogyakarta"],
            taiwan: ["Changhua", "Chiayi", "Hsinchu", "Hualien", "Kaohsiung", "Keelung", "Miaoli", "Nantou", "Penghu", "Pingtung", "Taichung", "Tainan", "Taipei", "Taitung", "Taoyuan", "Yilan", "Yunlin"],
            singapore: ["Central Region", "East Region", "North Region", "North-East Region", "West Region"],
            vietnam: ["Ho Chi Minh City", "Hanoi", "Can Tho", "Da Nang", "Hai Phong", "Ba Ria-Vung Tau", "Bac Giang", "Bac Kan", "Bac Lieu", "Bac Ninh", "Ben Tre", "Binh Dinh", "Binh Duong", "Binh Phuoc", "Binh Thuan", "Ca Mau", "Cao Bang", "Dak Lak", "Dak Nong", "Dien Bien", "Dong Nai", "Dong Thap", "Gia Lai", "Ha Giang", "Ha Nam", "Ha Tinh", "Hai Duong", "Hau Giang", "Hoa Binh", "Hung Yen", "Khanh Hoa", "Kien Giang", "Kon Tum", "Lai Chau", "Lam Dong", "Lang Son", "Lao Cai", "Long An", "Nam Dinh", "Nghe An", "Ninh Binh", "Ninh Thuan", "Phu Tho", "Quang Binh", "Quang Nam", "Quang Ngai", "Quang Ninh", "Quang Tri", "Soc Trang", "Son La", "Tay Ninh", "Thai Binh", "Thai Nguyen", "Thanh Hoa", "Thua Thien-Hue", "Tien Giang", "Tra Vinh", "Yen Bai"]
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
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>