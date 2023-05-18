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
<!-- Navigation-->
<nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light">
  <div class="container px-5">
      <a class="navbar-brand" href="index.html">
          <img src="images/Logo1 (1).png" width="200px" alt="logoLIS2023" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conference</a>
                  <ul class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdownBlog">
                      <li><a class="dropdown-item" href="/conferencesInfo">Conference Info</a></li>
                      <li><a class="dropdown-item" href="/conferencesDownload">Download</a></li>
                      </ul>
              <li class="nav-item"><a class="nav-link" href="/publicationInfo">Publication</a></li>
              <li class="nav-item"><a class="nav-link" href="/registration">Registration</a></li>
              <li class="nav-item"><a class="nav-link" href="/faq">Contact Us</a></li>
              <a href="/login" class="btn btn-primary">Login</a>
              </div>
          </ul>
      </div>
  </div>
</nav>
            
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
                  Don't have an account? <a href="#">Sign Up</a>
                </div>
              </form>
            </div>

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
                    <a class="link-light small" href="FePayment.html">Payment</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="FePublication.html">Publication</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="FeFaq.html">Contact</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="FePrivacy.html">Privacy</a>
                </div>
            </div>
        </div>
    </footer>
            
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>