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

      main.table {
        width: 100% !important;
        height: 70vh;
        margin-bottom: 100px !important;
        background-color: #fff5;
        backdrop-filter: blur(7px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: .8rem;
        overflow: hidden;
      }

      .table__header {
          z-index:0;
          width: 100%;
          height: 15%;
          background-color: #fff4;
          padding: 1rem 1rem;
          display: flex;
          justify-content: space-between;
          align-items: center;
      }

      .table__body {
        position: relative;
        width: 95%;
        max-height: calc(84% - 1.6rem);
        background-color: #fffb;

        margin: .8rem auto;
        border-radius: .6rem;

        overflow: auto;
        overflow: overlay;
      }

      .table__body::-webkit-scrollbar{
          width: 0.5rem;
          height: 0.5rem;
      }

      .table__body::-webkit-scrollbar-thumb{
          border-radius: .5rem;
          background-color: #0004;
          visibility: hidden;
      }

      .table__body:hover::-webkit-scrollbar-thumb{ 
          visibility: visible;
      }

      table {
          width: 100%;
      }

      tr{
        border: solid 1px black;
      }
      
      @media screen and (max-width: 950px) {
        .sidebar-minimized {
          width: 70%; /* Adjust as needed */
        }

        .main-panel{
          margin-left: 0 !important;
        }

        .main-panel-expanded {
          margin-left: 0 !important; /* Adjust to match your sidebar width */
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a shadow */
          transition: margin-left 0.3s ease; /* Smooth transition */
        }

      }
  </style>
  </head>
  <body>
        <!-- partial -->
        <div class="main-panel" id="mainPanel" style="margin-left: 260px;">
          <div class="content-wrapper">
            <main class="table">
                <section class="table__header">
                    <h1>Admin List</h1>
                </section>
                <section class="table__body">
                  @if($message = Session::get('updateSuccess'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                  @endif
                  <table id="adminTable" class="display">
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
                                Organization<br>
                            </th>
                            <th>
                                Created At<br>
                            </th>
                            <th>
                                Updated At<br>
                            </th>
                            <th>
                              Action
                            </th>
                        </tr>
                      </thead>
                      @if(isset($admin))
                      <tbody>
                        @foreach($admin as $admin)
                        <tr>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->phoneNumber }}</td>
                            @if($admin->status === 0)
                              <td>Deactived</td>
                            @elseif($admin->status === 1)
                              <td>Active</td>
                            @endif
                            <td>{{ $admin->adminRole }}</td>
                            <td>{{ $admin->IC_No }}</td>
                            <td>{{ $admin->organizationName }}</td>
                            <td>{{ $admin->created_at }}</td>
                            <td>{{ $admin->updated_at }}</td>
                            @if($admin->status === 0)
                            <td><a href="{{ route('activeAdmin', ['adminEmail' => $admin->email]) }}" class="btn btn-primary mb-4">Active Admin</a></td>
                            @elseif($admin->status === 1)
                                @if($admin->adminRole === "Super")
                                    <td><a href="#" class="btn btn-primary mb-4" style="background-color:gray; pointer-events: none;" >Deactive Admin</a></td>
                                @else
                                    <td><a href="{{ route('deactiveAdmin', ['adminEmail' => $admin->email]) }}" class="btn btn-primary mb-4">Deactive Admin</a></td>
                                @endif
                            @endif
                        </tr>
                        @endforeach
                      </tbody>
                    @else
                      <tr style="color: black;">
                        <td colspan="8">
                          No record found.
                        </td>
                      </tr>
                    @endif
                  </table>
            </section>
          </main>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        @include('page.footer(Super)')
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
    <!-- container-scroller -->
    <!-- plugins:js -->
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
