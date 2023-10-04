<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
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

            /* CSS spinner animation */
            .spinner {
                display: inline-block;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                border: 2px solid #ccc;
                border-top-color: #333;
                animation: spin 0.8s ease-in-out infinite;
            }

            @keyframes spin {
                to { transform: rotate(360deg); }
            }

            .success-icon {
                display: inline-block;
                width: 20px;
                height: 20px;
                line-height: 20px;
                text-align: center;
                border-radius: 50%;
                background-color: #0f0;
                color: #fff;
            }

            /* CSS shake animation */
            @keyframes shake {
                0% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
                20%, 40%, 60%, 80% { transform: translateX(10px); }
                100% { transform: translateX(0); }
            }

            .shake {
                animation: shake 0.5s ease-in-out;
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
                                                    <input type="text" name="salutationInput" id="salutationInput" style='display:none;' placeholder="Other Salutations"/><br>
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
                                                        <label for="email">Email Address:</label>
                                                    <div style="display: flex;">
                                                        <input type="text" name="email" id="email" class="form-control email" placeholder="Email Address" required="required">
                                                    </div>
                                                    @if($message = Session::get('error'))
                                                    <div class="error">
                                                        <span class="error">{{ $message }}</span><br> 
                                                    </div>
                                                    @endif
                                                </div>

                                                <div class="form-group col-md-5" id="emailVerification">
                                                    <label for="name">Verify Your Email</label>
                                                    <div class="input-group">
                                                        <input type="text" name="otp" id="otp" class="form-control otp" placeholder="OTP(One-Time Password)" minlength="6" maxlength="6" required="required" style='text-transform:uppercase'>
                                                        <div class="input-group-append" style="margin-top:2%; margin-left:5%;">
                                                            <button href="#emailVerification" class="btn btn-primary" id="sendOtp">Send OTP</button>
                                                        </div>
                                                    </div>
                                                    <div id="errorOtpMessage"></div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="organizationName">Organization Name:</label>
                                                    <input type="text" name="organizationName" id="organizationName"  class="form-control organizationName" placeholder="Organization Name" required="required">
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

                                                <div style="margin-top:2%;" class="form-group col-md-3">
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

                                                <div style="margin-top:2%;" class="form-group col-md-4">
                                                    <label for="state">State:</label>
                                                    <select id="state" class="dropdown-option state" name="state" >
                                                        <option selected disabled>Choose</option>
                                                        <option value="">-- Select State --</option>
                                                    </select><br>
                                                </div>

                                                <div class="form-group col-md-4 pe-5" >
                                                    <label for="password1">Password:</label>
                                                    <input type="password" name="password1" id="password1" class="form-control password" placeholder="Password" minlength="6" maxlength="30" required="required">
                                                </div>

                                                <div class="form-group col-md-4 pe-5" >
                                                    <label for="password2">Confirm Password:</label>
                                                    <input type="password" name="password2" id="password2" class="form-control password" placeholder="Please Confirm Your Password" minlength="6" maxlength="30" required="required">
                                                    <i style="margin-top:3%;" class="bi-eye password-toggle" id="togglePassword1" style="color: black;"></i>
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

                                    function toUpperCase() {
                                        var input = document.getElementById('myInput');
                                        input.value = input.value.toUpperCase();
                                    }
                                </script>                                          
                            </div><!--- END ROW -->
                        </div><!--- END CONTAINER -->	
                            
                    </div>
                </div>
            </header>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Core theme JS-->
        <script>
            $(document).ready(function () {
                var passwordVisible = false; // Track password1 visibility state
                var form = $('#registrationForm'); // Get the form
                var error = false; //
                let emailVerified = false;

                // Toggle password visibility for password1
                $("#togglePassword1").on("click", function () {
                    var inputField1 = $("#password1");
                    var icon = $("#togglePassword1");
                    var inputField2 = $("#password2");
                    togglePasswordVisibility(inputField1,inputField2,icon);
                });

                // Toggle password visibility for password2
                $("#togglePassword2").on("click", function () {
                    var inputField = $("#password2");
                    var icon = $("#togglePassword2");
                    togglePasswordVisibility(inputField1,inputField2,icon);
                });

                function togglePasswordVisibility(inputField1,inputField2,icon) {
                    if (inputField1.attr("type") === "password") {
                        passwordVisible = true;
                        inputField1.attr("type", "text");
                        inputField1[0].style.color = "#232434";
                        inputField2.attr("type", "text");
                        inputField2[0].style.color = "#232434";
                        icon.addClass("bi-eye-slash").removeClass("bi-eye");
                    }else if (passwordVisible == false){
                        inputField1.attr("type", "password");
                        inputField2.attr("type", "password");
                        icon.addClass("bi-eye").removeClass("bi-eye-slash");
                    }
                }

                
                $("#togglePassword1").hover(
                        function () {
                            var inputField1 = $("#password1");
                            var icon = $("#togglePassword1");
                            var inputField2 = $("#password2");
                            if (passwordVisible == true) {
                                passwordVisible = false; // Toggle visibility state
                                togglePasswordVisibility(inputField1,inputField2, icon); 
                            }
                        },
                    );

                // Attach an event listener to the form's submit event
                form.on("submit", function (event) {
                event.preventDefault(); // Prevent the form from submitting

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

                if(error == false && emailVerified == true){
                    form.unbind("submit").submit();
                }else if(emailVerified == false){
                    return  
                }
            });

            $.ajaxSetup({

                headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            // Send OTP link click event
            $('#sendOtp').click(function(e) {
                e.preventDefault();
                var button = $(this);
                
                var email = $('#email').val();
                if (email === '') {
                    alert('Please Enter A Valid Email Address')
                    return;
                }

                // Disable the button and show the spinner animation
                button.prop('disabled', true);
                button.prop('title','Sending OTP to your email...');
                button.html('<span class="spinner"></span>Sending OTP...');

                // Send AJAX request to sendOTP function
                $.ajax({
                    url: '{{ route("emailVerification")}}',
                    type: 'POST',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Store CSRF token in a hidden input field
                            $('#csrfToken').val(response.csrf_token);
                           // Show success message and disable the button for 1 minutes
                            var remainingTime =60; // 1 minutes in seconds
                            button.prop('title','Please wait before resend');
                                var countdown = setInterval(function() {
                                    var minutes = Math.floor(remainingTime / 60);
                                    var seconds = remainingTime % 60;
                                    var timeString = minutes.toString().padStart(1, '0') + ':' + seconds.toString().padStart(2, '0');
                                    button.html(timeString);
                                    remainingTime--;
                                    
                                    if (emailVerified) {
                                        clearInterval(countdown);
                                        button.css('background-color','transparent');
                                        button.css('border','none');
                                        button.html('<span class="success-icon">&#10003;</span>');
                                        button.prop('title','Email verified');
                                        return;
                                    } 
                                    if (remainingTime < 0) {
                                        clearInterval(countdown);
                                        button.prop('disabled', false);
                                        button.html('Resend OTP');
                                    }
                                }, 1000); // 1 second interval
                        } else {
                            alert('In , Failed to send OTP.');
                            button.prop('disabled', false);
                            button.html('Resend OTP');
                        }
                    }
                });

            });

            // Validate OTP when input has 6 characters
            $('#otp').on('input', function() {
                var button = $('#sendOtp');
                var otp = $(this).val();
                otp = otp.toUpperCase();
                if (otp.length === 6) {
                    // Send AJAX request to validateOTP function
                    $.ajax({
                        url: '{{ route("emailVerification-confirmOTP")}}',
                        type: 'POST',
                        data: {
                            otp: otp,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#otp').prop('disabled', true);
                                emailVerified = true;
                            } else {
                                $('#otp').css('color','red');
                                setTimeout(function() {
                                    $('#otp').val('').addClass('shake');
                                }, 1000);
                                setTimeout(function() {
                                    $('#otp').css('color','black');
                                    $('#otp').val('').removeClass('shake');
                                }, 1500);
                                
                            }
                        },
                        error: function(response) {
                            alert('Failed to validate OTP.');
                        }
                    });
                }
            });

            $('#submit')
        });
        </script>
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>