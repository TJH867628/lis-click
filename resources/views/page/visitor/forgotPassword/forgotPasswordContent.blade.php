<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
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
    </style>
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
            <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <!--login-->
        <div class="center">
          <h1>Reset Password</h1>
          <form method="post">
            @csrf 
            <div class="label1">
            <p>Enter the email address associated with your account and we'll send you a link to reset your password.</p>
            </div>
            <div class="txt_field">
              <input name="email" type="text" required>
              <span></span>
              <label>Email Address</label>
            </div>
            @if($message = Session::get('error'))
                <div class="error">
                    <span class="error">{{ $message }}</span><br> 
                </div>
            @endif
            <input type="submit" value="Continue">
            <div class="signup_link">
              Don't have an account? <a href="/registration">Sign Up</a>
            </div>
          </form>
        </div>
        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>