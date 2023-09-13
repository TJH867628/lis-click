<link rel="icon" type="image/x-icon" href="assets/favicon.ico" wfd-invisible="true">
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
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

        .paymentStatus td{
            width: 10%;
        }

        .paymentStatus{
            margin-bottom: 5%;
        }

        .btn-download{
            width: 95%;
        }
</style>
<div class="table-container">
    @if($userSubmissionInfo)
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search by Submission Code" style="width:20%; margin-top:3%; text-align:center; margin-left:5%;">
        <button type="button" onclick="filterTable()">Search</button>
    </div>
        <table id="submissionTable" border>
            <tr>
                <th>
                    Submission<br>
                </th>
                <th>
                    Document<br>
                </th>
                <!-- <th>
                    Review Paper<br>
                </th> -->
                <th>
                    Evaluation Form<br>
                </th>
                <th>
                    Correction
                </th>
                <th>
                    Payment Status
                </th>
            </tr>
            @foreach($userSubmissionInfo as $submissionInfo)
                <tr>
                    <td>
                        <p>Click The Code To Access Details</p>
                        <a style="font-size:20px; font-weight:bold; color:black;  text-decoration:none;" href="#" class="submission-code" data-submission-code="{{$submissionInfo->submissionCode}}" data-submission-type="{{$submissionInfo->submissionType}}" data-submission-title="{{$submissionInfo->submissionTitle}}" data-submission-type="{{$submissionInfo->submissionTitle}}" data-sub-theme="{{$submissionInfo->subTheme}}" data-present-mode="{{$submissionInfo->presentMode}}">
                            <div class="submissionCode">
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
                                            <h5 style="color:#007bff;">Waiting For Review</h5>
                                        @elseif($submissionInfo->reviewStatus == 'done')
                                            <h5 style="color:lime;">Review Completed</h5>
                                        @elseif($submissionInfo->reviewStatus == 'None')
                                            <h5 style="color:#007bff;">Pending For Reviewer</h5>
                                        @else
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="margin-top:10%;">
                            <table>
                                <tr>
                                    <td>
                                        <p style="color: #343a40; font-size:medium;">Presentation</p>
                                    </td>
                                    <td>
                                        <h5 style="color:#007bff;">Function is being develop</h5>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        @if($submissionInfo->submissionType != 'Publication ONLY')
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
                            @endif
                        @endif
                    </td>


                    <td>
                        <table>
                            <tr>
                                <td style="width: max-content; color:black;">
                                    Return Paper
                                </td>
                                <td>
                                @if($submissionInfo->returnPaperLink == NULL)
                                    <p>Return Paper Unavailable</p>
                                @else
                                    <a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink]) }}" class="btn btn-primary mb-4 btn-download">Return File</a>
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="width: max-content; color:black;">
                                    Orginal Paper
                                </td>
                                <td><a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" class="btn btn-primary mb-4 btn-download">Original File</a></td>
                            </tr>
                            <tr>
                                <td style="width: max-content; color:black;">
                                    Turn In Report
                                </td>
                                <td>
                                    @if($submissionInfo->turnInReport)
                                        <a href="{{ route('downloadTurnInReport', ['filename' => $submissionInfo->turnInReport]) }}" class="btn btn-primary mb-4 btn-download">Turn In Report</a>
                                    @else
                                        <p> Pending </p>
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
                                        @if($submissionInfo->certificate == 'pending')
                                            <p>Pending</p>
                                        @else
                                            <br><a style="text-align: center; align-items:center; justify-content:center;" href="{{ asset('storage/certificate/' . $submissionInfo->certificate) }}" class="btn btn-primary mb-4 btn-download" download="{{ $submissionInfo->certificate }}">Certificate</a>
                                        @endif
                                    @else
                                        <p>Not Ready</p>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- <td>
                        <p>Reviewer</p>
                        <h5>{{ $submissionInfo->reviewerID }} </h5>
                        @if($submissionInfo->reviewer2ID != NULL)
                            <p>Reviewer 2</p>
                            <h5>{{ $submissionInfo->reviewer2ID }} </h5>
                        @endif
                    </td> -->
                    @if($submissionInfo->reviewer2ID != NULL)
                        @if($submissionInfo->evaluationFormLink != NULL || $submissionInfo->evaluationFormLink2 != NULL)
                            @if($submissionInfo->dataEvaluationForm && $submissionInfo->dataEvaluationForm->paper_id_number == $submissionInfo->submissionCode)
                                <td><a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Evaluate Form</a> </td>
                            @else
                                <td><p>Pending</p></td>
                            @endif
                        @else
                            <td><p>Pending</p></td>
                        @endif
                    @elseif($submissionInfo->reviewer2ID == NULL)
                        @if($submissionInfo->evaluationFormLink != NULL)
                            @if($submissionInfo->dataEvaluationForm && $submissionInfo->dataEvaluationForm->paper_id_number == $submissionInfo->submissionCode)
                                <td><a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Evaluate Form</a> </td>
                            @else
                                <td><p>Pending</p></td>
                            @endif
                        @else
                            <td><p>Pending</p></td>
                        @endif
                    @else
                        <td><p>Pending</p></td>
                    @endif
                    
                    <td>
                        @if($submissionInfo->correctionPhase == 'pending')
                            @if(empty($submissionInfo->latestCorrection->submissionCode))
                                <h5>Pending For Comment</h5>
                            @else
                                @if($submissionInfo->latestCorrection->submissionCode == $submissionInfo->submissionCode)
                                    @if($submissionInfo->latestCorrection->numberOfTimes == $submissionInfo->correction->count())
                                        @if($submissionInfo->latestCorrection->returnCorrectionLink != NULL)
                                            <h5>Pending For Comment</h5>
                                        @elseif($submissionInfo->latestCorrection->returnCorrectionLink == NULL)
                                            <h5>Pending For Correction</h5>
                                        @endif
                                    @endif
                                @endif
                            @endif
                            <p>Click To View Correction: </p>
                            <a href="{{ route('correctionForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Correction</a>
                        @elseif($submissionInfo->correctionPhase == 'readyForPresent')
                            <p>Click To View Correction: </p>
                            <a href="{{ route('correctionForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Correction</a>
                            <p>Camera Ready</p>
                        @else
                            <p>Pending</p>
                        @endif
                    </td>
                    
                    <td>
                        @if($submissionInfo->correctionPhase == 'readyForPresent')
                            @php
                                $i = 0;
                                $allComplete = false;
                                $isEmpty = true;
                            @endphp
                            <table class="paymentStatus">
                                <th>Receipt</th>
                                <th>Status</th>
                                @foreach($submissionInfo->paymentStatus as $submissionInfo->paymentStatus)
                                <tr>
                                    @php
                                        $i++;
                                    @endphp
                                    <td>
                                        <a href="{{route('downloadPaymentReceipt', $submissionInfo->paymentStatus->proofOfPayment)}}">Receipt {{ $i }}</a>
                                    </td>
                                    <td>
                                    @if($submissionInfo->paymentStatus->paymentStatus === 'Complete')
                                        <label style="color:lime;">Verified payment</label>
                                        @php
                                            $allComplete = true;
                                            $isEmpty = false;
                                        @endphp
                                    @elseif($submissionInfo->paymentStatus->paymentStatus === "Pending For Verification")
                                        <label style="color:orange;">{{ $submissionInfo->paymentStatus->paymentStatus }}</label>
                                        @php
                                            $allComplete = false;
                                            $isEmpty = false;
                                        @endphp
                                    @else
                                        <label style="color:red;">{{ $submissionInfo->paymentStatus->paymentStatus }}</label>
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
                            @if(( $allComplete === false))
                                <button onclick="showPopup()" style="margin: auto;">Show Payment Method</button>

                        <form style="width: fit-content;" action="{{ route('uploadReceipt', ['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data" class="file-upload-form">
                            @csrf
                            <p style="color: black; font-size: large;">Upload New Receipt</p>
                            <label for="file-upload" class="file-upload-label">
                                <span>Choose a file</span>
                                <i class="fas fa-upload"></i>
                            </label>
                            <input id="file-upload" type="file" name="file" accept=".jpeg,.jpg,.png,application/pdf" onchange="enableUploadButton()"/>
                            <button type="submit" class="file-upload-button" disabled>Upload</button>
                        </form>
                            @else
                                <br><br><h3> All Payment Done</h3>
                            @endif
                        @else
                            <p>Waiting To Done The Correction Phase</p>
                        @endif
                    </td> 
                </tr>
            @endforeach
        @else       
            <p style="color: black;">No submission found.</p>
        @endif
    </table>
    <br><br><br><br><br><br>
</div>
        <script>
            function showPopup() {
            // Create a new window
            var popup = window.open("Payment QR", "Payment QR", "width=400,height=400");
            // Add an image and some text to the window
            popup.document.write("@if(empty($paymentQR))<h1>Payment QR is not available,please contact with the customer service</h1>@else @if($paymentQR->masterdata_value != NULL) <img style='max-height:100px; max-width:100px; margin:auto;' src='{{ asset('paymentQR/'.$paymentQR->masterdata_value) }}'><br> @endif @if($paymentQR->masterdata_details != NULL)<label>{{ $paymentQR->masterdata_details }}</label><br>@endif @if($paymentQR->masterdata_value == NULL && $paymentQR->masterdata_details == NULL) Payment QR is not available,please contact with the customer service @endif @endif");
            popup.document.write("@if(empty($paymentQR->masterdata_value))@else Please save your receipt for upload @endif");

            // Center the window on the screen
            popup.moveTo((screen.width - popup.outerWidth) / 2, (screen.height - popup.outerHeight) / 2);
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
                    <span class="submission-details-close" style="color:white; font-size:20px; padding:3%; background-color: #007bff; cursor: pointer; border-radius:5px;">Close</span>
                    </div>
                `;
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