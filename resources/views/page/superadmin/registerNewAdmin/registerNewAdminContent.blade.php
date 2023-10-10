<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Super aAdmin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="assets/images/Logo1 (1).png" />
    <style>
      .logo-image {
          width: 200px !important;
          height: 100px !important;
          
      }
  
      .mini-logo-image {
          width: 100px !important;
          height: 50px !important;
      }

      nav{
        background-color: #F8F9F9 !important;
      }
      
      .bgcolor{
        background-color: #F8F9F9 !important;
      }
      .sidebar-minimized {
        width: 70px; /* Adjust as needed */
      }

      /* CSS for the expanded main panel */
      .main-panel-expanded {
        margin-left: 70px !important; /* Adjust to match your sidebar width */
        transition: margin-left 0.3s ease; /* Smooth transition */
      }
  </style>
  </head>
  <body>
        <!-- partial -->
        <div class="main-panel" id="mainPanel" style="margin-left: 260px;">
          <div class="content-wrapper">
            <form  action="registerAdmin" method="post" style>
                @csrf
                <label for="role" class="role">Role</label><br>
                <select name="role" id="role">
                    @foreach($adminRole as $role)
                        <option value="{{$role->roletype}}">{{$role->roletype}}</option>
                    @endforeach
                </select>

                <br><label for="email" class="">Email</label><br>
                <input type="text" name="email" id="email" class="register" placeholder="Email Address" required><br>
                @if($message = Session::get('error'))
                    <span class="error">{{ $message }}</span><br>
                @endif

                <label for="name" class="register">Full Name</label><br>
                <input type="text" name="name" id="name" class="register" placeholder="Name" required><br>

                <label for="IC_No" class="register">IC Number</label><br>
                <input type="text" name="IC_No" id="IC_No" class="register" placeholder="Enter IC Number" required><br>

                <label for="phoneNumber" class="register">Phone Number</label><br>
                <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number"><br>

                <label for="title" class="register">Salutation</label><br>
                <input type="text" name="salutation" id="salutation" placeholder="Dr./Mr/Mrs"><br>
                
                <label for="title" class="register">Organization Name</label><br>
                <input type="text" name="organizationName" id="organizationName" placeholder="Organization Name"><br>

                <label for="password" class="register">Password</label><br>
                <input type="password" name="password" id="password" class="register" placeholder="Password" required><br><br>
                
                <button type="submit" class="register" name="signUp">Sign Up</button>
            </form>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      $(document).ready(function() {
        $(".navbar-toggler").click(function() {
          $("#sidebar").toggleClass("sidebar-minimized");
          $("#mainPanel").toggleClass("main-panel-expanded");
        });
      });
      </script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>