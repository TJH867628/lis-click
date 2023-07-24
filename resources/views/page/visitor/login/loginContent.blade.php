<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
                  <span></span>
                  <label>Email Address</label>
                </div>
                <div class="txt_field">
                  <input type="password" required name="password" id="password">
                  <span></span>
                  <label>Password</label>
                </div>
                @if($message = Session::get('fail'))
                <div class="error">
                  <span class="errorText">{{ $message }}</span><br> 
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>