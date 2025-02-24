    <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
    <style>

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

        button:hover {
            background-color: #0069d9;
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
            background: url("../images/tblBackground.jpg") center / cover;
            display: flex;
            justify-content: center;
        }

        main.table {
            margin-top: -4%;
            width: 82vw;
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
</style>

<main class="table">
@if($userSubmissionInfo)
@php
$count = 0;
@endphp
        <section class="table__header">
            <h1>Submission Status</h1>
            <div class="search-container">
                <input type="search" id="searchInput" placeholder="Search by Submission Code">
                <button type="button" onclick="filterTable()"><i class="fas fa-search"></i></button>
            </div>
        </section>
        <section class="table__body" id="submissionTable">
            <table>
                <thead>
                    <tr>
                        <th style="color: black;"> Submission</th>
                        <th style="color: black;"> Document</th>
                        <!-- <th> Evaluation Form</th> -->
                        <!-- <th> Correction</th> -->
                        <th style="color: black;"> Payment Status </th>
                    </tr>
                </thead>
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
                        @if($submissionInfo->withdraw === 1)
                        <div style="margin-top: 10%;">
                            <table>
                                <tr>
                                    <td rowspan="2">
                                        <label style="color:#FF6969; font-weight: bold; font-size: large;">Withdraw</label>
                                    </td>
                                    <td>
                                        <strong>Reason</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="max-width:10px; overflow-wrap: break-word;">{{ $submissionInfo->withdraw_reason }}</td>
                                </tr>
                            </table>
                        </div>
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
                                    Turnitin Report
                                </td>
                                <td>
                                    @if($submissionInfo->turnInReport)
                                        <a href="{{ route('downloadTurnInReport', ['filename' => $submissionInfo->turnInReport]) }}" class="btn btn-primary mb-4 btn-download" target="_blank">
                                            <i class="fas fa-download"></i>Turnitin Report
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
                            @if($allComplete === false)
                                @if( $submissionInfo->withdraw === 0 || $submissionInfo->withdraw == null)
                                <button onclick="showPopup()" id="showPaymentMethod" style="margin: auto;">Show Payment Method</button>
                                <form style="width: fit-content;" action="{{ route('uploadReceipt', ['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data" class="file-upload-form">
                                    @csrf
                                    <p style="color: black; font-size: large;">Upload New Receipt</p>
                                    <label for="file-upload" class="file-upload-label">
                                        <span>Choose a file</span>
                                        <i class="fas fa-upload"></i>
                                    </label>
                                    <input id="file-upload" type="file" name="file" accept=".jpeg,.jpg,.png,application/pdf" onchange="enableUploadButton()"/>
                                    <button type="submit" class="file-upload-button">Upload</button>
                                </form>
                                @endif
                            @endif
                            @if( $submissionInfo->withdraw === 1)
                            <table class="table__body">
                                <tr>
                                    <td style="color:#FF6969; font-weight: bold; font-size:large;">
                                        This submission had been withdrawed
                                    </td>
                                </tr>
                            </table>
                            @endif
                    </td> 
                </tr>
            @endforeach
            @if($count == 0)
            <tr>
                <td colspan="3">
                    <h1 style="color: grey;">No submission found.</h1>
                </td>
            </tr>
            @endif
        @else       
            <p style="color: black;">No submission found.</p>
        @endif
                </tbody>
            </table>
        </section>
    </main>
        <script>
            $count = 0;
            button = $('#showPaymentMethod');

            function showPopup() {
                // Create a new window
                var popup = window.open("", "Payment QR", "width=800,height=700");
                if($count == 0){ 
                    popup.document.write("<head><title>Payment</title></head>");
                    // Add styles
                    popup.document.write("<style>");
                    popup.document.write("body { font-family: Arial, sans-serif; text-align: center; background-color: #f2f2f2; }");
                    popup.document.write("h1 { color: #333; font-size: 24px; margin-top: -20px; }");
                    popup.document.write("img { height: 250px; width: 250px; margin: 0px auto; display: block; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); }");
                    popup.document.write("label { color: #555; font-size: 18px; margin-top: 10px; display: block; }");
                    popup.document.write("</style>");
                    

                    // Add content
                    popup.document.write("<body>");
                    popup.document.write(String.raw`@if(empty($paymentQR))<h1>Payment QR is not available, please contact customer service</h1>@else @if($paymentQR->masterdata_value != NULL) <img src='{{ asset('paymentQR/'.$paymentQR->masterdata_value) }}'><br> @endif @if($paymentQR->masterdata_details != NULL)<textarea column="20" row="10" style="width:100%; height:50%;" readonly>{{ $paymentQR->masterdata_details }}</textarea><br>@endif @if($paymentQR->masterdata_value == NULL && $paymentQR->masterdata_details == NULL) Payment QR is not available, please contact customer service @endif @endif`);        
                    popup.document.write("@if(empty($paymentQR->masterdata_value))@else <label style='color: red; font-weight: bold;'>Please save your receipt for upload</label>@endif");
                    popup.document.write("</body>");

                    // Center the window on the screen
                    popup.moveTo((screen.width - popup.outerWidth) / 2, (screen.height - popup.outerHeight) / 2);
                    $count++;

                    popup.onbeforeunload = function () {
                        $count--;
                    };
                }
            }

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