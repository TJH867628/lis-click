<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body>
    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="/images/Logo_Title.png" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style.css" rel="stylesheet" />
        <style>
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

            #sendOtp{
              height: fit-content; 
              margin-top:10%; 
              margin-left:1%;
            }
        </style>
    </head>
    <body class="d-flex flex-column h-100">
      <!--login-->
      <div class="center">
        <h1>Reset Password</h1>
        <form method="post">
          @csrf 
          <div class="label1">
          <p>An OTP had been sent to your email {{ $email }}</p>
          </div>
          <div style="display: flex; width:110%;">
            <div class="txt_field">
              <input name="otp" oninput="this.value = this.value.toUpperCase()" placeholder="Please Insert 6 Digit OTP">
              <label>OTP</label>
            </div>
            <button href="#emailVerification" class="btn btn-primary" style="" id="sendOtp"><span>Resend OTP</span></button>
          </div>
          <div id="email" style="display: none;">{{ $email }}</div>

          @if($message = Session::get('error'))
          <div>
            <p>{{ $message }}</p>
          </div>
          @endif
          <input type="submit" value="Continue">
          <div class="signup_link">
            Don't have an account? <a href="#">Sign Up</a>
          </div>
        </form>
      </div>           
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
        <script>
          $(document).ready(function() {
            // Send OTP link click event
            $('#sendOtp').click(function(e) {
                e.preventDefault();
                var button = $(this);
                var email = $('#email').html();
                if (email === '') {
                    return;
                }

                // Disable the button and show the spinner animation
                button.prop('disabled', true);
                button.prop('title','Sending OTP to your email...');
                button.html('<span class="spinner"></span>');

                // Send AJAX request to sendOTP function
                $.ajax({
                    url: '{{ route("forgotPasswordResendOTP")}}',
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
                            var remainingTime = 60; // 1 minutes in seconds
                            button.prop('title','Please wait before resend');
                                var countdown = setInterval(function() {
                                    var minutes = Math.floor(remainingTime / 60);
                                    var seconds = remainingTime % 60;
                                    var timeString = minutes.toString().padStart(1, '0') + ':' + seconds.toString().padStart(2, '0');
                                    button.html(timeString);
                                    remainingTime--;
                                    if (remainingTime < 0) {
                                        clearInterval(countdown);
                                        button.prop('disabled', false);
                                        button.html('Resend OTP');
                                        button.prop('style','cursor: pointer;')
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

          });
        </script>
    </body>
</html>