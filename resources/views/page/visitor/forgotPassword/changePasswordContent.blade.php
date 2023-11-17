<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Add Bootstrap icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
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
    </style>
</head>

<body>
<div class="center">
        <h1>Reset Password</h1>
        <form method="post">
            @csrf
            <!-- Your form elements here -->

            <div class="txt_field">
                <input type="password" name="password1" minlength="8" maxlength="30" placeholder="Please Insert New Password" id="password1">
                <label>New Password</label>
                <i class="bi-eye-slash password-toggle" id="togglePassword1" style="color: black;"></i>
            </div>
            <div class="txt_field">
                <input type="password" name="password2" minlength="8" maxlength="30" placeholder="Please Insert The Password Again" id="password2">
                <label>Confirm New Password</label>
                <i class="bi-eye-slash password-toggle" id="togglePassword2" style="color: black;"></i>
            </div>

            <!-- Other form elements -->

            @if($message = Session::get('error'))
            <div>
                <p>{{ $message }}</p>
            </div>
            @endif
            <input type="submit" value="Continue">
            <div class="signup_link">
                Don't have an account? <a href="/registration">Sign Up</a>
            </div>
        </form>
    </div>

    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        var passwordVisible1 = false; // Track password1 visibility state
        var passwordVisible2 = false; // Track password2 visibility state

        // Toggle password visibility for password1
        $("#togglePassword1").on("click", function () {
            var inputField = $("#password1");
            var icon = $("#togglePassword1");
            passwordVisible1 = true;
            togglePasswordVisibility(inputField,icon);
        });

        // Toggle password visibility for password2
        $("#togglePassword2").on("click", function () {
            var inputField = $("#password2");
            var icon = $("#togglePassword2");
            passwordVisible2 = true;
            togglePasswordVisibility(inputField,icon);
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

          
      $("#togglePassword1").hover(
            function () {
                var inputField = $("#password1");
                var icon = $("#togglePassword1");
                if (passwordVisible1 == true) {
                    passwordVisible1 = false; // Toggle visibility state
                    togglePasswordVisibility(inputField, icon); 
                }
            },
        );

        $("#togglePassword2").hover(
            function () {
                var inputField = $("#password2");
                var icon = $("#togglePassword2");
                if (passwordVisible2 == true) {
                    passwordVisible2 = false; // Toggle visibility state
                    togglePasswordVisibility(inputField, icon); 
                }
            },
        );
      });

  </script>

</body>
</html>
