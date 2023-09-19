<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LIS Registration</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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

          .txt_field {
            position: relative;
        }

        .password-toggle {
            padding: 5px;
            position: absolute;
            width: 2.1em;
            align-items: center;
            border-radius: 50%;
            text-align: center;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            transition: color 0.5s, background-color 0.5s; /* Faster transition */
        }

        /* Adjust padding for input fields with the icon */
        .txt_field input[type="password"] {
            padding-right: 15%; /* Initial padding */
        }

        /* Adjust padding when the icon is visible */
        .txt_field.password-visible input[type="password"] {
            padding-right: 20%; /* Increased padding */
        }

          /* Adjust padding for input fields with the icon */
          .txt_field input[type="text"] {
            padding-right: 15%; /* Initial padding */
        }

        /* Adjust padding when the icon is visible */
        .txt_field.password-visible input[type="text"] {
            padding-right: 20%; /* Increased padding */
        }

        /* Add a circle around the icon on hover */
        .password-toggle:hover {
            padding: 5px;
            color: grey;
            align-items: center;
            text-align: center;
            border-radius: 50%;
            width: 2.1em;
            background-color: rgba(128, 128, 128, 0.2); /* Grey with opacity */
            transition: color 0.5s, background-color 0.5s; /* Faster transition */
        }

        .form-group{
            position: relative;
        }
    </style>
    </head>
    <body>
        <!-- Your HTML code goes here -->
    </body>
</html>

    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">

            <!-- Header-->
            <header class="bg-light text text-dark py-5">
                <div class="container px-5 py-5 mt-xl-5">
                    <div id="contact" class="contact-area section-padding">
                        <div class="container py-5">										
                            <div class="section-title text-center fw-bold">
                                <h1>REGISTER</h1>
                                
                            </div>
                             <div class="row-register">
                                <div class="col-lg-7">	
                                    <div class="contact">
                                        <form class="form" name="enq" id="registrationForm" method="post" action="/registration">
                                                @csrf
                                                <div class="row">
                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label for="salutation">Salutation :</label>
                                                    <select class="dropdown-option" id="salutation" name="salutation" required>
                                                        <option selected disabled>Choose</option>
                                                        <option value="Dr">Dr</option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Dato">Dato</option>
                                                        <option value="Datin">Datin</option>
                                                        <option value="Encik">Encik</option>
                                                        <option value="Prof">Prof</option>
                                                        <option value="Dr prof">Dr Prof</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                    <input type="text" name="salutationInput" id="salutationInput" style='display:none;'/><br>
                                                </div>

                                                <div class="form-group col-md-7">
                                                    <label for="category">Participant Category :</label>
                                                    <select class="dropdown-option category" name="category" id="" required>
                                                        <option value="presenter">Presenter</option>
                                                        <option value="Audience">Audience</option>
                                                    </select><br>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="name">Full Name:</label>
                                                    <input type="text" name="name" id="name" class="form-control name" placeholder="Full Name" required="required">
                                                </div>

                                                <div class="form-group col-md-7">
                                                    <label for="organizationName">Organization Name:</label>
                                                    <input type="text" name="organizationName" id="organizationName"  class="form-control organizationName" placeholder="Organization Name" required="required">
                                                </div>

                                                <div class="form-group col-md-5">
                                                    <label for="email">Email Address:</label>
                                                    <input type="text" name="email" id="email" class="form-control email" placeholder="Email Address" required="required">
                                                    @if($message = Session::get('error'))
                                                    <div class="error">
                                                        <span class="error">{{ $message }}</span><br> 
                                                    </div>
                                                    @endif
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="IC_No">IC Number:</label>
                                                    <input type="text" name="IC_No" id="IC_No" class="form-control IC_No" placeholder="IC Number" required="required">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="phoneNumber">Phone Number:</label>
                                                    <input type="text" name="phoneNumber" id="phoneNumber" class="form-control phoneNumber" placeholder="Phone Number" required="required">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="address">Address:</label>
                                                    <textarea rows="6" name="address" id="address" class="form-control address" placeholder="Address" required="required"></textarea>
                                                </div>

                                                <div class="form-group col-md-4 pe-5">
                                                    <label for="postcode">Postcode:</label>
                                                    <input type="text" name="postcode" id="postcode" class="form-control postcode" placeholder="Postcode" required="required">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="country">Country:</label>
                                                    <select id="country" class="dropdown-option country" name="country" >
                                                        <option selected disabled>Choose</option>
                                                        <option value="malaysia">Malaysia</option>
                                                        <option value="indonesia">Indonesia</option>
                                                        <option value="taiwan">Taiwan</option>
                                                        <option value="vietnam">Vietnam</option>
                                                        <option value="singapore">Singapore</option>
                                                    </select><br>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="state">State:</label>
                                                    <select id="state" class="dropdown-option state" name="state" >
                                                        <option selected disabled>Choose</option>
                                                        <option value="">-- Select State --</option>
                                                    </select><br>
                                                </div>

                                                <div class="form-group col-md-4 pe-5" >
                                                    <label for="password1">Password:</label>
                                                    <input type="password" name="password1" id="password1" class="form-control password" placeholder="Password" minlength="6" maxlength="30" required="required">
                                                    <i class="bi-eye password-toggle" id="togglePassword1" style="color: black;"></i>
                                                </div>

                                                <div class="form-group col-md-4 pe-5" >
                                                    <label for="password2">Confirm Password:</label>
                                                    <input type="password" name="password2" id="password2" class="form-control password" placeholder="Please Confirm Your Password" minlength="6" maxlength="30" required="required">
                                                    <i class="bi-eye password-toggle" id="togglePassword2" style="color: black;"></i>
                                                    <span id="password2Error" class="text-danger" style="display: none;"></span>
                                                </div>
                                                
                                                
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" name="submit" id="submitButton" class="button-submit" title="Submit your form!">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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

                                        $('#salutation').change(function(){
                                            var selectedSalutation = $(this).val();
                                            if (selectedSalutation === "Others") {
                                                $('#salutationInput').show();
                                            }else{
                                                $('#salutationInput').hide();
                                            }

                                        })

                                        $('')
                                    });
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
        <script>
            $(document).ready(function () {
                var passwordVisible1 = false; // Track password1 visibility state
                var passwordVisible2 = false; // Track password2 visibility state
                var form = $('#registrationForm'); // Get the form
                var error = false; //

                // Toggle password visibility for password1
                $("#togglePassword1").on("click", function () {
                    var inputField = $("#password1");
                    var icon = $("#togglePassword1");
                    togglePasswordVisibility1(inputField,icon,passwordVisible1);
                });

                // Toggle password visibility for password2
                $("#togglePassword2").on("click", function () {
                    var inputField = $("#password2");
                    var icon = $("#togglePassword2");
                    togglePasswordVisibility2(inputField,icon,passwordVisible2);
                });

                function togglePasswordVisibility1(inputField,icon) {
                    if (inputField.attr("type") === "password") {
                        passwordVisible1 = true;
                        inputField.attr("type", "text");
                        icon.addClass("bi-eye-slash").removeClass("bi-eye");
                    }else if (passwordVisible1 == false){
                        console.log(1);
                        inputField.attr("type", "password");
                        icon.addClass("bi-eye-slash").removeClass("bi-eye");
                    }
                }

                function togglePasswordVisibility2(inputField,icon) {
                    if (inputField.attr("type") === "password") {
                        passwordVisible2 = true;
                        inputField.attr("type", "text");
                        icon.addClass("bi-eye-slash").removeClass("bi-eye");
                    }else if (passwordVisible2 == false){
                        console.log(1);
                        inputField.attr("type", "password");
                        icon.addClass("bi-eye-slash").removeClass("bi-eye");
                    }
                }

                
            $("#togglePassword1").hover(
                    function () {
                        var inputField = $("#password1");
                        var icon = $("#togglePassword1");
                        if (passwordVisible1 == true) {
                            passwordVisible1 = false; // Toggle visibility state
                            togglePasswordVisibility1(inputField, icon,passwordVisible1,passwordVisible1); 
                        }
                    },
                );

                $("#togglePassword2").hover(
                    function () {
                        var inputField = $("#password2");
                        var icon = $("#togglePassword2");
                        if (passwordVisible2 == true) {
                            passwordVisible2 = false; // Toggle visibility state
                            togglePasswordVisibility2(inputField, icon,passwordVisible2); 
                        }
                    },
                );

                // Attach an event listener to the form's submit event
                form.on("submit", function (event) {
                event.preventDefault(); // Prevent the form from submitting
                console.log(error);

                // Validate passwords here
                var password1 = $("#password1").val();
                var password2 = $("#password2").val();
                var password2Error = $("#password2Error");
                
                password2Error.hide().text("");
                if (password1 !== password2) {
                    password2Error.text("Passwords do not match.").show();
                    error = true;
                }else{
                    error = false;
                }

                if (password1.length > 30 || password2.length > 30) {
                    alert("Passwords should not be more than 30 characters.");
                    error = true;
                }else{
                    error = false;
                }

                if(error == false){
                    form.unbind("submit").submit();
                }
            });
        });

            
        </script>
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>