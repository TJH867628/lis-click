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
                    <h1>Participants List</h1>
                </section>
                <section class="table__body">
                  @if($message = Session::get('updateSuccess'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                  @endif
                  <table id="userTable" class="display">
                      <thead>
                        <tr>
                          <th>
                              Salutation<br>
                          </th>
                          <th>
                          Name<br>
                        </th>
                          <th>
                              Email<br>
                          </th>
                          <!-- <th>
                                Idenfication Number / Passport<br>
                            </th> -->
                            <th>
                                PhoneNumber<br>
                            </th>
                            <th>
                                Organization<br>
                            </th>
                            <th>
                                Date Of Register<br>
                            </th>
                        </tr>
                      </thead>
                      @if(isset($participants))
                      <tbody>
                        @foreach($participants as $participants)
                        <tr>
                            <td>{{ $participants->salutation }}</td>
                            <td>{{ $participants->name }}</td>
                            <td>{{ $participants->email }}</td>
                            <!-- <td>{{ $participants->IC_No }}</td> -->
                            <td>{{ $participants->phoneNumber }}</td>
                            <td> 
                              <label style="font-size: 15px; font-weight:bold;">Organization Name :</label>
                              {{ $participants->organizationName }}<br><br>
                              <label style="font-size: 15px; font-weight:bold;" for="">Organization Address :</label>
                              {{ $participants->organizationAddress }}<br><br>
                              <label style="font-size: 15px; font-weight:bold;" for="">Postcode :</label>
                              {{ $participants->postcode }}<br><br>
                              <label style="font-size: 15px; font-weight:bold;" for="">Country :</label>
                              {{ $participants->country }}
                            </td>
                            <td>{{ $participants->created_at->format('d-m-Y H:i:s') }}</td>
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
        <!-- main-panel ends -->
        @include('page.footer(Super)')
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
