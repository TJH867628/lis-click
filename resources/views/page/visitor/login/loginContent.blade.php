<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
          .error{
            border: 1px solid red;
            border-radius: 20px;
            background-color: red;
            text-align: center;
            margin-bottom: 10px;
          }

          .success{
            border: 1px solid lightblue;
            border-radius: 20px;
            background-color: lightblue;
            text-align: center;
            margin-bottom: 10px;
          }

          .successText{
            border-radius: 20px;
            color: blue;
            text-align: center;
            margin-bottom: 10px;
          }

          .txt_field {
            position: relative;
        }

        .password-toggle {
            padding: 9px;
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
            padding: 9px;
            color: grey;
            align-items: center;
            text-align: center;
            border-radius: 50%;
            width: 2.1em;
            background-color: rgba(128, 128, 128, 0.2); /* Grey with opacity */
            transition: color 0.5s, background-color 0.5s; /* Faster transition */
        }
        </style>
    </head>
    <body class="d-flex flex-column h-100 bg-light">
        <main class="flex-shrink-0">
            <!--login-->
            <div class="center fw-bolder">
              <h1>Login</h1>
              <form method="post">
                @csrf
                <div class="txt_field">
                  <input type="text" required name="email" id="email">
                  <label>User Id/Email Address</label>
                </div>
                <div class="txt_field">
                  <input type="password" required name="password" id="password">
                  <label>Password</label>
                  <i class="bi-eye-slash password-toggle" id="togglePassword" style="color: black;"></i>
                </div>
                @if($message = Session::get('fail'))
                <div class="error">
                  <span class="errorText">{!! $message !!}</span><br> 
                </div>
                @elseif ($message = Session::get('resetSuccess'))
                <div class="success">
                  <span class="successText">{{ $message }}</span><br> 
                </div>
                @endif
                <a class="pass" href="/forgotPassword">Forgot Password?</a>
                <input type="submit" value="Login">
                <div class="signup_link">
                  Don't have an account? <a href="/registration">Sign Up</a>
                </div>
              </form>
            </div>
        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>


    $(document).ready(function () {
        var passwordVisible = false; 

        // Toggle password visibility for password1
        $("#togglePassword").on("click", function () {
            var inputField = $("#password");
            var icon = $("#togglePassword");
            if(passwordVisible == false){
              passwordVisible = true;
              togglePasswordVisibility(inputField,icon);
            }
        });


        function togglePasswordVisibility(inputField,icon) {
            if (inputField.attr("type") === "password") {
                inputField.attr("type", "text");
                icon.addClass("bi-eye").removeClass("bi-eye-slash ");
            } else {
                inputField.attr("type", "password");
                icon.addClass("bi-eye-slash ").removeClass("bi-eye");
            }
          }

          
      $("#togglePassword").hover(
          function () {
                console.log(123);
                var inputField = $("#password");
                var icon = $("#togglePassword");
                if (passwordVisible == true) {
                    passwordVisible = false; // Toggle visibility state
                    togglePasswordVisibility(inputField, icon); 
                }
            },
        );
      });
</script>

</html>