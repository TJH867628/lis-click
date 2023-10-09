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
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="bgcolor">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="/superAdminHomePage"><img src="assets/images/Logo1 (1).png" alt="logo" class="logo-image" /></a>
            <a class="navbar-brand brand-logo-mini" href="/superAdminHomePage"><img src="assets/images/Logo1 (1).png" alt="logo" class="mini-logo-image" /></a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="/logout">
                <i class="mdi mdi-logout me-2 text-primary"></i> 
                <span>Sign Out</span> 
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="position: fixed;">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/superAdminHomePage">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pageList">
                <span class="menu-title">Edit Page</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/adminRegister">
                <span class="menu-title">Register New Admin</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/adminList">
                <span class="menu-title">Admin List</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">Charts</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/tables/basic-table.html">
                <span class="menu-title">Tables</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Sample Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Projects</h6>
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
                <div class="mt-4">
                  <div class="border-bottom">
                    <p class="text-secondary">Categories</p>
                  </div>
                  <ul class="gradient-bullet-list mt-4">
                    <li>Free</li>
                    <li>Pro</li>
                  </ul>
                </div>
              </span>
            </li> -->
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel" id="mainPanel" style="margin-left: 260px;">
          <div class="content-wrapper">
            <div style="text-align: center; background-color: #EBF5FB; height: 100%; display: flex; overflow: auto; flex-wrap: wrap;">
                <div style="margin: auto; max-width: 800px; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); background-color: #f5f5f5;">
                    <style>
                        .button-container {
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: center;
                            gap: 10px;
                        }

                        #button {
                            margin: 5px;
                            width: 300px;
                            height: 50px;
                            background: #0d6efd;
                            border-radius: 40px;
                            color: #fff;
                            font-size: 16px;
                            border: none;
                            outline: none;
                            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                            cursor: pointer;
                            transition: .3s ease-in-out;
                        }

                        #button:hover {
                            background: #0056b3;
                        }
                    </style>

                    <div class="button-container">
                      @foreach($pages as $page)
                          @if($page->editable == true)
                              <a href="{{ route('editPage', ['page' => $page->pageName]) }}" id="page">
                                  <button id="button">{{ $page->pageName }}</button>
                              </a>
                          @endif
                      @endforeach
                    </div>
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- Footer-->
          <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white"><span>© 2023 LIGA ILMU SERANTAU 2023. All Rights Reserved. Design by Politeknik Mersing</span></div></div>
                </div>
            </div>
          </footer>
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