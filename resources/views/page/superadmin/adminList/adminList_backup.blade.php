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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

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
    <main class="table">
        <section class="table__header">
            <h1>Review List</h1>
        </section>
        <section class="table__body">
            <table id="reviewTable" class="display">
            <thead>
            <tr>
                    <th>
                        Email<br>
                    </th>
                    <th>
                        Name<br>
                    </th>
                    <th>
                        Phone Number<br>
                    </th>
                    <th>
                        Status<br>
                    </th>
                    <th>
                        Role<br>
                    </th>
                    <th>
                        Ic No<br>
                    </th>
                    <th>
                        Created At<br>
                    </th>
                    <th>
                        Updated At<br>
                    </th>
                </tr>
                </thead>
                <tbody>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td><td>
                    213
                </td>
                <td>
                    213
                </td>
                <td>
                    213
                </td>
                </tbody>
            </table>
        </section>
    </main>
        </div>
        <br><br><br><br><br><br>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <script>
      $(document).ready(function() {
        $(".navbar-toggler").click(function() {
          $("#sidebar").toggleClass("sidebar-minimized");
          $("#mainPanel").toggleClass("main-panel-expanded");
        });
      });
      </script>
          <script>
        $(document).ready(function() {
            $('#reviewTable').DataTable();
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