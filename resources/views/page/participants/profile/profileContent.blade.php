@@ -1,311 +1,319 @@
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>My Profile</title>
        <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <style>
            .password-toggle {
                padding: 5px;
                width: 2.1em;
                align-items: center;
                border-radius: 50%;
                text-align: center;
                transform: translateY(-50%);
                cursor: pointer;
                transition: color 0.5s, background-color 0.5s; /* Faster transition */
            }
            /* Add a circle around the icon on hover */
            .password-toggle:hover {
                padding: 5px;
                color: grey;
                text-align: center;
                border-radius: 50%;
                width: 2.1em;
                background-color: rgba(128, 128, 128, 0.2); /* Grey with opacity */
                transition: color 0.5s, background-color 0.5s; /* Faster transition */
            }
        </style>
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
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
                                <form method="post" action="/updateProfile">
                                @csrf
                                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                        <h3 class="mb-4">Profile Settings</h3>
                                          <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Salutation :</label>
                                                    <input type="text" name="salutation" class="form-control" value="{{ $user -> salutation }}">
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
                                                    <label>Identification Number / Passport:</label>
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
                                                      <select id="country" class="form-control" name="country">
                                                        <option selected disabled>Choose</option>
                                                        <option @if($user->country === "malaysia") selected @endif value="malaysia">Malaysia</option>
                                                        <option @if($user->country === "indonesia") selected @endif value="indonesia">Indonesia</option>
                                                        <option @if($user->country === "taiwan") selected @endif value="taiwan">Taiwan</option>
                                                        <option @if($user->country === "vietnam") selected @endif value="vietnam">Vietnam</option>
                                                        <option @if($user->country === "singapore") selected @endif value="singapore">Singapore</option>
                                                    </select><br>
                                                </div>
                                            </div>
                                            <div id="userState" hidden>{{ $user->state }}</div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                      <label>State :</label>
                                                      <select id="state" class="form-control" name="state">
                                                        <option selected disabled>Choose</option>
                                                    </select><br>
                                                </div>
                                            </div>
                                        </div>
                                        @if($message = Session::get('account-success'))
                                            <div class="alert alert-success">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @elseif($message = Session::get('password-success'))
                                            <div class="alert alert-success">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @elseif($message = Session::get('password-fail'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                            <div>
                                                <button class="btn btn-primary">Update</button>
                                            </div>
                                    </div>
                                </form>
                                    <!--- PASSWORD -->
                                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                <form action="/updatePassword" method="post" id="changePasswordForm">
                                    @csrf
                                        <h3 class="mb-4">Password Settings</h3>
                                        <div class="row">
                                            <div class="col-md-6" style="position:relative;">
                                                <div class="form-group">
                                                      <label>Current Password :</label>
                                                      <input type="password" name="currentPassword" class="form-control" id="currentPassword" minlength="8" maxlength="30">
                                                </div>
                                                <i style="height:fit-content; position:absolute; top:50%; left:100%;" class="bi-eye-slash password-toggle" id="toggleCurrentPassword" style="color: black;"></i>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <label>New Password :</label>
                                                      <input type="password" name="newPassword1" class="form-control" id="newPassword1" minlength="8" maxlength="30">
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="position: relative;">
                                                <div class="form-group">
                                                      <label>Confirm New Password :</label>
                                                      <input type="password" name="newPassword2" class="form-control" id="newPassword2" minlength="8" maxlength="30">
                                                </div>
                                                <i style="height:fit-content; position:absolute; top:50%; left:100%;" class="bi-eye-slash password-toggle" id="toggleNewPassword" style="color: black;"></i>
                                            </div>
                                            <span id="password2Error" class="text-danger" style="display: none;"></span>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div><!--- END ROW -->
                        </div><!--- END CONTAINER -->	
                    </div>
                </div>
            </header>

        <!-- Bootstrap core JS-->
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
            var userState = $('#userState').text();
            var selectedCountry = $('#country').val();
            var stateOptionsHtml = '<option value="">-- Select State --</option>';
            if (selectedCountry && stateOptions[selectedCountry]) {
            var states = stateOptions[selectedCountry];
            for (var i = 0; i < states.length; i++) {
                if(states[i] == userState){
                    stateOptionsHtml += '<option value="' + states[i] + '"selected >' + states[i] + '</option>';
                }else{
                    stateOptionsHtml += '<option value="' + states[i] + '">' + states[i] + '</option>';
                }
            }
            }
            $('#state').html(stateOptionsHtml);
            // When a country is selected, update the options in the state dropdown
            $('#country').change(function() {
                var selectedCountry = $(this).val();
                var stateOptionsHtml = '<option value="">-- Select State --</option>';
                console.log(selectedCountry);
                if (selectedCountry && stateOptions[selectedCountry]) {
                var states = stateOptions[selectedCountry];
                for (var i = 0; i < states.length; i++) {
                    stateOptionsHtml += '<option value="' + states[i] + '">' + states[i] + '</option>';
                }
                }
                $('#state').html(stateOptionsHtml);
            });
            });

            $(document).ready(function () {
                var passwordVisible = false; // Track password1 visibility state
                var form = $('#changePasswordForm'); // Get the form
                var error = false; //

                // Toggle password visibility for password1
                $("#toggleCurrentPassword").on("click", function () {
                    var inputField1 = $("#currentPassword");
                    var icon = $("#toggleCurrentPassword");
                    console.log(icon);
                    togglePasswordVisibility(inputField1,null,icon);
                });

                // Toggle password visibility for password2
                $("#toggleNewPassword").on("click", function () {
                    var inputField1 = $("#newPassword1");
                    var inputField2 = $("#newPassword2");
                    console.log(inputField1,inputField2);
                    var icon = $("#toggleNewPassword");
                    togglePasswordVisibility(inputField1,inputField2,icon);
                });

                function togglePasswordVisibility(inputField1,inputField2,icon) {
                    if (inputField1.attr("type") === "password") {
                        passwordVisible = true;
                        inputField1.attr("type", "text");
                        inputField1[0].style.color = "#232434";
                        inputField1[0].style.color = "black";
                        if(inputField2){
                            inputField2.attr("type", "text");
                            inputField2[0].style.color = "#232434";
                            inputField2[0].style.color = "black";
                        }
                        icon.addClass("bi-eye").removeClass("bi-eye-slash");
                    }else if (passwordVisible == false){
                        inputField1.attr("type", "password");
                        if(inputField2){
                            inputField2.attr("type", "password");
                        }
                        icon.addClass("bi-eye-slash").removeClass("bi-eye");
                    }
                }

                
                $("#toggleCurrentPassword").hover(
                        function () {
                            var inputField1 = $("#currentPassword");
                            var icon = $("#toggleCurrentPassword");
                            if (passwordVisible == true) {
                                passwordVisible = false; // Toggle visibility state
                                togglePasswordVisibility(inputField1,null, icon); 
                            }
                        },
                    );

                $("#toggleNewPassword").hover(
                    function () {
                        var inputField1 = $("#newPassword1");
                        var inputField2 = $("#newPassword2");
                        var icon = $("#toggleNewPassword");
                        if (passwordVisible == true) {
                            passwordVisible = false; // Toggle visibility state
                            togglePasswordVisibility(inputField1,inputField2, icon); 
                        }
                    },
                );

                // Attach an event listener to the form's submit event
                $("#changePasswordForm").on("submit", function (event) {
                event.preventDefault(); // Prevent the form from submitting
                console.log(error);

                // Validate passwords here
                var password1 = $("#newPassword1").val();
                var password2 = $("#newPassword2").val();
                var password2Error = $("#password2Error");
                
                password2Error.hide().text("");
                if (password1 != password2) {
                    password2Error.text("Passwords do not match.").show();
                    error = true;
                }else{
                    error = false;
                }

                if(error == false){
                    form.unbind("submit").submit(); // Re-submit the form
                }
            });
        });

            
        </script>   
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>
