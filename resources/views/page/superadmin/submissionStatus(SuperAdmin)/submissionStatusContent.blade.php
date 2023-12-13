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
        h1 {
            text-align: center;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        form {
            color: black;
            margin: auto;
            margin-top: 50px;
            margin-bottom: 30px;
            width: 500px;
            padding: 20px;
            border: 1px solid #dee2e6;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 7px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .deleteButton {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .title {
            margin-top: 10%;
            text-align: center;
        }

        .title h2 {
            font-size: 36px;
            font-weight: bold;
            color: #007bff;
        }

        .file-upload-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 200px;
            height: 50px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .file-upload-label:hover {
            background-color: #0062cc;
        }

        .file-upload-label span {
            margin-right: 10px;
        }

        #file-upload {
            display: none;
        }

        .file-upload-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: lightgray;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .file-upload-button:hover {
            background-color: grey;
        }

        .btn-download{
            width: 95%;
        }

        * {
            margin: 0;
            padding: 0;

            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
        }

        main.table {
            width: 90%;
            height: 75vh;
            background-color: #fff5;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            overflow: hidden;
        }

        .table__header {
            width: 100%;
            height: 15%;
            background-color: #fff4;
            padding: 1rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table__header .search-container {
            width: 35%;
            height: 100%;
            background-color: #fff5;
            padding: 0 .8rem;
            border-radius: 2rem;

            display: flex;
            justify-content: center;
            align-items: center;

            transition: .2s;
        }

        .table__header .search-container:hover {
            width: 45%;
            background-color: #fff8;
            box-shadow: 0 .1rem .4rem #0002;
        }

        .table__header .search-container img {
            width: 1.2rem;
            height: 1.2rem;
        }

        .table__header .search-container input {
            width: 100%;
            padding: 0 .5rem 0 .3rem;
            background-color: transparent;
            border: none;
            outline: none;
        }

        .table__body {
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

        td img {
            width: 36px;
            height: 36px;
            margin-right: .5rem;
            border-radius: 50%;

            vertical-align: middle;
        }

        table, th, td {
            border-collapse: collapse;
            padding: 1rem;
            text-align: center;
        }

        thead th {
            position: sticky;
            top: 0;
            left: 0;
            background-color: #d5d1defe;
            cursor: pointer;
            text-transform: capitalize;
            z-index: 1;
        }

        tbody tr:nth-child(even) {
            background-color: #0000000b;
        }

        tbody tr {
            --delay: .1s;
            transition: .5s ease-in-out var(--delay), background-color 0s;
        }

        tbody tr.hide {
            opacity: 0;
            transform: translateX(100%);
        }

        tbody tr:hover {
            background-color: #fff6 !important;
        }

        tbody tr td,
        tbody tr td p,
        tbody tr td img {
            transition: .2s ease-in-out;
        }

        tbody tr.hide td,
        tbody tr.hide td p {
            padding: 0;
            font: 0 / 0 sans-serif;
            transition: .2s ease-in-out .5s;
        }

        tbody tr.hide td img {
            width: 0;
            height: 0;
            transition: .2s ease-in-out .5s;
        }

        .status {
            padding: .4rem 0;
            border-radius: 2rem;
            text-align: center;
        }

        .status.delivered {
            background-color: #86e49d;
            color: #006b21;
        }

        .status.cancelled {
            background-color: #d893a3;
            color: #b30021;
        }

        .status.pending {
            background-color: #ebc474;
        }

        .status.shipped {
            background-color: #6fcaea;
        }


        @media (max-width: 1000px) {
            td:not(:first-of-type) {
                min-width: 12.1rem;
            }
        }

        thead th span.icon-arrow {
            display: inline-block;
            width: 1.3rem;
            height: 1.3rem;
            border-radius: 50%;
            border: 1.4px solid transparent;
            
            text-align: center;
            font-size: 1rem;
            
            margin-left: .5rem;
            transition: .2s ease-in-out;
        }

        thead th:hover span.icon-arrow{
            border: 1.4px solid #6c00bd;
        }

        thead th:hover {
            color: #6c00bd;
        }

        thead th.active span.icon-arrow{
            background-color: #6c00bd;
            color: #fff;
        }

        thead th.asc span.icon-arrow{
            transform: rotate(180deg);
        }

        thead th.active,tbody td.active {
            color: #6c00bd;
        }

        #btn, .download {
            margin-right: 10px;
            margin-top: 5px;
            width: max-content;
        }

        .content-wrapper{
          width: 110%;
        }
        .fixfooter{
            width: 110%;
        }
</style>
  </head>
  <body>
        <!-- partial -->
        <div class="main-panel" id="mainPanel" style="margin-left: 10%;">
          <div class="content-wrapper">
            <main class="table">
                <section class="table__header">
                    <h1>Submission List</h1>
                </section>
                <section class="table__body">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @elseif($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                  <table id="submissionTable" class="display">
                      <thead>
                        <tr>
                          <th style="color: black;"> Submission</th>
                            <th style="color: black;">Document</th>
                            <th style="color: black;">Payment Status</th>
                            <th style="color: black;">Action</th>
                        </tr>
                      </thead>
                      @if(isset($userSubmissionInfo))
                      @php
                        $count = 0;
                      @endphp
                      <tbody>
                      @foreach($userSubmissionInfo as $submissionInfo)
                            @php
                                $count++;
                            @endphp
                            <tr>
                                <td>
                                    <a style="font-size:20px; font-weight:bold; color:black;  text-decoration:none;" href="#" class="submission-code" data-submission-code="{{$submissionInfo->submissionCode}}" data-submission-type="{{$submissionInfo->submissionType}}" data-submission-title="{{$submissionInfo->submissionTitle}}" data-submission-type="{{$submissionInfo->submissionTitle}}" data-sub-theme="{{$submissionInfo->subTheme}}" data-present-mode="{{$submissionInfo->presentMode}}">
                                        <div class="submissionCode">
                                            <i class="fa-solid fa-circle-info"></i>
                                            {{$submissionInfo->submissionCode}}
                                        </div>
                                    </a>
                                    <div style="color:black; align-items:left;">
                                    <table>
                                        <tr>
                                            <td>Participants 1 :</td> 
                                            <td>{{ $submissionInfo->participants1 }}</td><br>
                                        </tr>
                                        @if($submissionInfo->participants2)
                                            <tr>
                                                <td>Participants 2 :</td> 
                                                <td>{{ $submissionInfo->participants2 }}</td><br>
                                            </tr>
                                        @endif
                                        @if($submissionInfo->participants3)
                                            <tr>
                                                <td>Participants 3 :</td> 
                                                <td>{{ $submissionInfo->participants3 }}</td>
                                            </tr>
                                        @endif
                                    </table>
                                        
                                    </div>
                                    <div style="margin-top:10%;">
                                        <table>
                                            <tr>
                                                <td>
                                                    <p style="color: #343a40; font-size:medium;">Review Status</p>
                                                </td>
                                                <td>
                                                    @if($submissionInfo->reviewStatus == 'pending')
                                                        <p class="status shipped">Waiting For Review</p>
                                                    @elseif($submissionInfo->reviewStatus == 'done')
                                                        <p class="status delivered">Review Completed</p>
                                                    @elseif($submissionInfo->reviewStatus == 'None')
                                                        <p class="status cancelled">Pending For Reviewer</p>
                                                    @else
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    @if($submissionInfo->submissionType != 'Publication ONLY' && $submissionInfo->correctionPhase == 'readyForPresent')
                                        @if($submissionInfo->presentationGroup != null)
                                        <div style="margin-top: 10%;">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <p>Presentation Group:</p>
                                                    </td>
                                                    <td style="color: blue;">{{ $submissionInfo->presentationGroup }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        @else
                                        <div style="margin-top:10%;">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <p style="color: #343a40; font-size:medium;">Presentation Group</p>
                                                    </td>
                                                    <td>
                                                        <h5 style="color:#007bff;">Pending For Assign</h5>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        @endif
                                    @endif
                                </td>


                                <td>
                                    <table>
                                        <tr>
                                            <td style="width: max-content; color:black;">
                                                Orginal Paper
                                            </td>
                                            <td>
                                                <a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" class="btn btn-primary mb-4 btn-download" target="_blank">
                                                    <i class="fas fa-download"></i> Download Original File
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: max-content; color:black;">
                                                Return Paper
                                            </td>
                                            <td>
                                            @if($submissionInfo->returnPaperLink == NULL)
                                                <p class="status cancelled">Return Paper Unavailable</p>
                                            @else
                                            <a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink]) }}" class="btn btn-primary mb-4 btn-download" target="_blank">
                                                <i class="fas fa-download"></i> Download Return File
                                            </a>
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: max-content; color:black;">
                                                Evaluation Form
                                            </td>

                                            @if($submissionInfo->reviewer2ID != NULL)
                                            @if($submissionInfo->evaluationFormLink != NULL || $submissionInfo->evaluationFormLink2 != NULL)
                                                @if($submissionInfo->dataEvaluationForm && $submissionInfo->dataEvaluationForm->paper_id_number == $submissionInfo->submissionCode)
                                                    <td><a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" style="float:none; width:95%;" target="_blank" class="btn btn-primary mb-4 btn-download" id="btn">Download Evaluate Form</a> </td>
                                                @else
                                                    <td><p>Pending</p></td>
                                                @endif
                                            @else
                                                <td><p>Pending</p></td>
                                            @endif
                                            @elseif($submissionInfo->reviewer2ID == NULL)
                                                @if($submissionInfo->evaluationFormLink != NULL)
                                                    @if($submissionInfo->dataEvaluationForm && $submissionInfo->dataEvaluationForm->paper_id_number == $submissionInfo->submissionCode)
                                                        <td>
                                                            <a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" style="float:none; width:95%;" target="_blank" class="btn btn-primary mb-4 btn-download" id="btn">
                                                                <i class="fas fa-download"></i>Download Evaluate Form
                                                            </a> 
                                                        </td>
                                                    @else
                                                        <td><p class="status shipped">Pending</p></td>
                                                    @endif
                                                @else
                                                    <td><p class="status shipped">Pending</p></td>
                                                @endif
                                            @else
                                                <td><p class="status shipped">Pending</p></td>
                                            @endif
                                        </tr>
                                    
                                        <tr>
                                            <td style="width: max-content; color:black;">
                                                Turn In Report
                                            </td>
                                            <td>
                                                @if($submissionInfo->turnInReport)
                                                    <a href="{{ route('downloadTurnInReport', ['filename' => $submissionInfo->turnInReport]) }}" class="btn btn-primary mb-4 btn-download" target="_blank">
                                                        <i class="fas fa-download"></i>Turn In Report
                                                    </a>
                                                @else
                                                    <p class="status shipped"> Pending </p>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: max-content; color:black;">
                                                Correction
                                            </td>

                                            <td>
                                            @if($submissionInfo->correctionPhase == 'pending')
                                                @if(isset($submissionInfo->latestReturnCorrection->submissionCode))
                                                    @if($submissionInfo->latestReturnCorrection->submissionCode == $submissionInfo->submissionCode)
                                                        @if($submissionInfo->latestReturnCorrection->numberOfTimes == $submissionInfo->correction->count())
                                                            @if($submissionInfo->latestReturnCorrection->returnCorrectionLink != NULL)
                                                                <p class="status shipped">Pending For Comment</p>
                                                            @elseif($submissionInfo->latestReturnCorrection->returnCorrectionLink == NULL)
                                                                <p class="status shipped">Pending For Correction</p>
                                                            @endif
                                                        @endif
                                                        <a href="{{ route('correctionForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4 btn-download">
                                                            <i class="fas fa-file-alt"></i>Correction
                                                        </a>
                                                    @else
                                                    <a href="{{ route('correctionForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4 btn-download">
                                                            <i class="fas fa-file-alt"></i>Correction
                                                        </a>
                                                    @endif
                                                @else
                                                    <p class="status shipped">Pending For Comment</p>
                                                @endif
                                            @elseif($submissionInfo->correctionPhase == 'readyForPresent')
                                                @if(isset($submissionInfo->correction) && $submissionInfo->correction->count() > 0)
                                                    <p class="status delivered">
                                                        <a href="{{ route('correctionForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" style="text-decoration:none; color:#006b21;">
                                                            <i class="fas fa-file-alt"></i>Camera Ready
                                                        </a>
                                                    </p>
                                                @else
                                                    <p class="status delivered">Camera Ready</p>
                                                @endif
                                            @else
                                                <p class="status shipped">Pending</p>
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: max-content; color:black;">
                                                Certificate
                                            </td>
                                            
                                            <td>
                                                <!-- download certificate -->
                                                @if($submissionInfo->correctionPhase == 'readyForPresent')
                                                    @if($submissionInfo->participants_certificate == 'pending')
                                                        <p class="status shipped">Pending</p>
                                                    @else
                                                        <a href="{{ route('downloadParticipantsCertificate', ['filename' => $submissionInfo->participants_certificate]) }}" class="btn btn-primary mb-4 btn-download" target="_blank">
                                                            <i class="fas fa-download"></i>Participants Certificate
                                                        </a>
                                                    @endif
                                                    @if($submissionInfo->presentation_certificate == 'pending')
                                                        <p class="status shipped">Pending</p>
                                                    @else
                                                        <a href="{{ route('downloadPresentationCertificate', ['filename' => $submissionInfo->presentation_certificate]) }}" class="btn btn-primary mb-4 btn-download" target="_blank">
                                                            <i class="fas fa-download"></i>Presentation Certificate
                                                        </a>
                                                    @endif
                                                @else
                                                    <p class="status cancelled">Not Ready</p>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    @if($submissionInfo->correctionPhase == 'readyForPresent')
                                        @php
                                            $i = 0;
                                            $allComplete = false;
                                            $isEmpty = true;
                                        @endphp
                                        <table class="table__body">
                                        <thead>
                                            <tr>
                                                <th style="color: black;"> Receipt</th>
                                                <th style="color: black;"> Status</th>
                                            </tr>
                                        </thead>
                                            @foreach($submissionInfo->paymentStatus as $submissionInfo->paymentStatus)
                                            <tr>
                                                @php
                                                    $i++;
                                                @endphp
                                                <td>
                                                <a href="{{route('downloadPaymentReceipt', $submissionInfo->paymentStatus->proofOfPayment)}}" target="_blank"><i class="fas fa-receipt"></i> Receipt {{ $i }}</a>
                                                </td>
                                                <td>
                                                @if($submissionInfo->paymentStatus->paymentStatus === 'Complete')
                                                    <p class="status delivered">Verified</p>
                                                    @php
                                                        $allComplete = true;
                                                        $isEmpty = false;
                                                    @endphp
                                                @elseif($submissionInfo->paymentStatus->paymentStatus === "Pending For Verification")
                                                    <p class="status shipped">{{ $submissionInfo->paymentStatus->paymentStatus }}</p>
                                                    @php
                                                        $allComplete = false;
                                                        $isEmpty = false;
                                                    @endphp
                                                @else
                                                    <p class="status cancelled">{{ $submissionInfo->paymentStatus->paymentStatus }}</p>
                                                    @php
                                                        $allComplete = false;
                                                        $isEmpty = false;
                                                    @endphp
                                                @endif

                                                </td>
                                            </tr>
                                            @endforeach
                                            @if($isEmpty == true)
                                            <tr>
                                                <td colspan="2">
                                                    <p>Empty</p>
                                                </td>
                                                @endif
                                            </tr>
                                        </table>
                                    @else
                                        <p class="status shipped">Waiting To Done The Correction Phase</p>
                                    @endif
                                </td> 
                                <td>
                                  <form action="{{ route('withdrawSubmission',['submissionCode' => $submissionInfo->submissionCode]) }}" method="post">
                                  @csrf
                                  @if($submissionInfo->withdraw === 1)
                                    <strong style="float:left;">Reason : </strong><br><br>
                                    <textarea for="" id="textarea" readonly>{{$submissionInfo->withdraw_reason}}</textarea>
                                    <input type="text" name="reason" hidden value="undoWithdraw"> 
                                    <button type="submit" class="btn btn-secondary">
                                      <i class="fas fa-undo-alt"></i> Undo Withdraw
                                    </button>
                                  @elseif($submissionInfo->withdraw === null || $submissionInfo->withdraw === 0)
                                    <input type="text" name="reason" required> 
                                    <button type="submit" class="btn btn-danger">
                                      <i class="fas fa-trash-alt"></i> Withdraw Submission
                                    </button>
                                @else
                                    Nothing here
                                  @endif
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    @else       
                        <p style="color: black;">No submission found.</p>
                    @endif
                  </table>
            </section>
          </main>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <div class="fixfooter">
            @include('page.footer(Super)')
        </div>
        
        <!-- main-panel ends -->
      </div>
      <script>
      $(document).ready(function() {
        $(".navbar-toggler").click(function() {
          $("#sidebar").toggleClass("sidebar-minimized");
          $("#mainPanel").toggleClass("main-panel-expanded");
        });

        $("#textarea").each(function () {
        this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
        }).on("input", function () {
        this.style.height = 0;
        this.style.height = (this.scrollHeight) + "px";
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
    <script>
            // Get all submission code links
            const submissionCodeLinks = document.querySelectorAll('.submission-code');
            
            // Add click event listener to each link
            submissionCodeLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const submissionCode = link.dataset.submissionCode;
                const submissionTitle = link.dataset.submissionTitle;
                const submissionType = link.dataset.submissionType;
                const subTheme = link.dataset.subTheme;
                const presentMode = link.dataset.presentMode;

                let submissionDetails = document.querySelector(`.submission-details[data-submission-code="${submissionCode}"]`);
                if (!submissionDetails) {
                // Create pop-up window if it doesn't exist
                const popUpWindow = document.createElement('div');
                popUpWindow.classList.add('submission-details');
                popUpWindow.dataset.submissionCode = submissionCode;
                popUpWindow.innerHTML = `

                    <div class="submission-details-content">
                    <p>Submission Code</p>
                    <span style="font-weight:bold;">${submissionCode}</span>
                    <p>Title</p>
                    <span style="font-weight:bold;">${submissionTitle}</span>
                    <p>Type</p>
                    <span style="font-weight:bold;">${submissionType}</span>
                    <p>Theme</p>
                    <span style="font-weight:bold;">${subTheme}</span>
                    <p>Present Mode</p>
                    <span style="font-weight:bold;">${presentMode}</span>
                    </div>
                    <div class="submission-details-header" style=" text-align:center; margin:20px;">
                    <span class="submission-details-close" style="position: absolute;top: 0px;right: 0px;width: 45px;height: 45px;background: #0d6efd;font-size: 2em;color: #fff;display: flex;justify-content: center;align-items: center;border-bottom-left-radius: 20px;border-top-right-radius: 20px;cursor: pointer;z-index: 1;"><i class="fas fa-times"></i></span></div>`;
                document.body.appendChild(popUpWindow);
                submissionDetails = popUpWindow;

                // Apply CSS styles for centering and layering the pop-up window
                submissionDetails.style.position = 'fixed';
                submissionDetails.style.top = '50%';
                submissionDetails.style.left = '50%';
                submissionDetails.style.transform = 'translate(-50%, -50%)';
                submissionDetails.style.zIndex = '9999'; // Set a high z-index value to bring it to the top layer
                submissionDetails.style.backgroundColor = 'white';
                submissionDetails.style.padding = '20px';
                submissionDetails.style.border = '1px solid #ccc';
                submissionDetails.style.borderRadius = '20px';
                submissionDetails.style.boxShadow = '0 0 20px rgba(0, 0, 0, 0.5)';
                submissionDetails.style.color = 'black';
                submissionDetails.style.transition = '0.5s';
                submissionDetails.style.width = "15%";
                submissionDetails.style.opacity = '0';
                submissionDetails.style.display = 'block';
                setTimeout(() => {
                submissionDetails.style.opacity = '1';
                },10);

                // Add click event listener to the close button
                const closeButton = submissionDetails.querySelector('.submission-details-close');
                closeButton.addEventListener('click', () => {
                    submissionDetails.style.opacity = '0';
                    setTimeout(() => {
                    submissionDetails.remove();
                    }, 2000);
                });
                }
                setTimeout(() => {
                submissionDetails.style.opacity = '1';
                }, 10);
            });
            });


            function enableUploadButton() {
            const fileUpload = document.getElementById('file-upload');
            const uploadButton = document.getElementById('upload-button');
            if (fileUpload.value) {
                uploadButton.disabled = false;
            } else {
                uploadButton.disabled = true;
            }
        }
        </script>
    <!-- End custom js for this page -->
  </body>
</html>