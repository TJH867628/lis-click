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
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
    @include('page.visitor.navigationBar')
            
            <!--login-->
            <div class="center">
              <h1>Reset Password</h1>
              <form method="post">
                @csrf 
                <div>
                  <label style="color:black;"><h5>Email Address</h5> <p style="color: grey;">{{ $email }}</p> </label>
                </div>
                <div class="txt_field">
                  <input name="password1" placeholder="Please Insert New Password">
                  <label>New Password</label>
                </div>
                <div class="txt_field">
                  <input name="password2" placeholder="Please Insert The Password Again">
                  <label>Confirm New Password</label>
                </div>
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

        @include('page.footer')
            
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>