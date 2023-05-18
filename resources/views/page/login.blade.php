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
<!-- Navigation-->
            <nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container px-5">
                    <a class="navbar-brand" href="/">
                        <img src="images/Logo1 (1).png" width="200px" alt="logoLIS2023" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item dropdown">
                            <li class="nav-item"><a class="nav-link" href="/faq">Contact Us</a></li> 
                            <li class="nav-item"><a class="nav-link" href="/registration">Register</a></li>
                                </ul>
                            
                            </div>
                            <a href="/login" class="btn btn-primary">Login</a>
                        </ul>
                    </div>
                </div>
            </nav>
            
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
          

              <!-- Footer-->
          <footer class="bg-dark py-4 mt-auto">
              <div class="container px-2">
                  <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                      <div class="col-auto"><div class="small m-0 text-white">© 2023 LIGA ILMU SERANTAU 2023. All Rights Reserved. Design by Politeknik Mersing</div></div>
                      <div class="col-auto">
                          <a class="link-light small" href="index.html">Home</a>
                          <span class="text-white mx-1">&middot;</span>
                          <a class="link-light small" href="FeConference.html">Conference</a>
                          <span class="text-white mx-1">&middot;</span>
                          <a class="link-light small" href="FeDownload.html">Download</a>
                          <span class="text-white mx-1">&middot;</span>
                          <a class="link-light small" href="FePublication.html">Publication</a>
                          <span class="text-white mx-1">&middot;</span>
                          <a class="link-light small" href="FeRegistration.html">Register</a>
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