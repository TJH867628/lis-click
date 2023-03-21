<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="/css/loginpage_style.css">
    <style>
      
    </style>
  </head>

  </style>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="post">
      @csrf
        <div class="txt_field">
          <input type="text" id="email" name="email" required>
          <span></span>
          <label>Email Address</label>
        </div>
        <div class="txt_field">
          <input type="password" id="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Don't have an account? <a href="#">Sign Up</a>
        </div>
      </form>
    </div>

  </body>
</html>
