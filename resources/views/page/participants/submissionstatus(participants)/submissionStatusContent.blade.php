<link rel="icon" type="image/x-icon" href="assets/favicon.ico" wfd-invisible="true">
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
<div class="table-container">
                @if($userSubmissionInfo)
                <input type="text" id="searchInput" placeholder="Search by Submission Code" onkeyup="filterTable()" />
                <table id="submissionTable" border>
                <tr>
                    <th>
                        Submission Details<br>
                    </th>
                    <th>
                        Participants<br>
                    </th>
                    <th>
                        Review Status<br>
                    </th>
                    <!-- <th>
                        Reviewer<br>
                    </th> -->
                    <th>    
                        Download<br>
                    </th>
                    <!-- <th>
                        Review Paper<br>
                    </th> -->
                    <th>
                        Evaluation Form<br>
                    </th>
                    <th>
                        Turn In Report<br>
                    </th>
                    <th>
                        Correction
                    </th>
                    <th>
                        Certificate
                    </th>
                    <th>
                        Payment Status
                    </th>
                </tr>
                    @foreach($userSubmissionInfo as $submissionInfo)
                        <tr>
                            <td>
                                <p>Submission Code</p>
                                {{$submissionInfo->submissionCode}}
                                <p>Title</p>
                                {{$submissionInfo->submissionTitle}}
                                <p>Type</p>
                                {{$submissionInfo->submissionType}}
                                <p>Theme</p>
                                {{$submissionInfo->subTheme}}
                                <p>Present Mode</p>
                                {{$submissionInfo->presentMode}}
                            </td>
                            <td style="overflow-wrap:normal;">
                                    <p>Participants 1 :</p> {{ $submissionInfo->participants1 }}<br>
                                @if($submissionInfo->participants2)
                                    <p>Participants 2 :</p> {{ $submissionInfo->participants2 }}<br>
                                @else
                                    <p>Participants 2 :</p> No Record<br>
                                
                                @endif
                                @if($submissionInfo->participants3)
                                    <p>Participants 3 :</p> {{ $submissionInfo->participants3 }}
                                @else
                                    <p>Participants 3 :</p> No Record<br>
                                @endif

                            </td>

                            <td>
                                {{ $submissionInfo->reviewStatus }}<br>
                                @if($submissionInfo->returnPaperLink == NULL)
                                    <p>Return Paper Unavailable</p>
                                @else
                                    <a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Return File</a>
                                @endif
                            </td>
                            <!-- <td>
                                <p>Reviewer</p>
                                <h5>{{ $submissionInfo->reviewerID }} </h5>
                                @if($submissionInfo->reviewer2ID != NULL)
                                    <p>Reviewer 2</p>
                                    <h5>{{ $submissionInfo->reviewer2ID }} </h5>
                                @endif
                            </td> -->
                            <td><a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" class="btn btn-primary mb-4">Download</a></td>
                            @if($submissionInfo->reviewer2ID != NULL)
                                @if($submissionInfo->evaluationFormLink != NULL || $submissionInfo->evaluationFormLink2 != NULL)
                                    @if($dataEvaluationForm && $dataEvaluationForm->paper_id_number == $submissionInfo->submissionCode)
                                        <td><a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Evaluate Form</a> </td>
                                    @else
                                        <td><p>Pending</p></td>
                                    @endif
                                @else
                                <td><p>Pending</p></td>
                                @endif
                            @elseif($submissionInfo->reviewer2ID == NULL)
                                @if($submissionInfo->evaluationFormLink != NULL)
                                    @if($dataEvaluationForm && $dataEvaluationForm->paper_id_number == $submissionInfo->submissionCode)
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
                            @if($submissionInfo->turnInReport)
                            <td>
                                <a href="{{ route('downloadTurnInReport', ['filename' => $submissionInfo->turnInReport]) }}" class="btn btn-primary mb-4">Download Turn In Report</a>
                            </td>
                            @else
                            <td>
                                Pending
                            </td>
                            
                            @endif
                            <td>
                            @if($submissionInfo->correctionPhase == 'pending')
                            @foreach($correction as $thisCorrection)
                                @if($thisCorrection->submissionCode == $submissionInfo->submissionCode)
                                    @if($thisCorrection->numberOfTimes == $thisCorrection->count())
                                        @if($thisCorrection->returnCorrectionLink != NULL)
                                            <h5>Pending For Comment</h5>
                                        @elseif($thisCorrection->returnCorrectionLink == NULL)
                                            <h5>Pending For Correction</h5>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                                <a href="{{ route('correctionForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Correction</a>
                            @elseif($submissionInfo->correctionPhase == 'readyForPresent')
                                <a href="{{ route('correctionForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Correction</a>
                                Camera Ready
                            @else
                                <p>Pending</p>
                            @endif
                            </td>
                            <td>
                                <!-- download certificate -->
                                @if($submissionInfo->correctionPhase == 'readyForPresent')
                                    @if($submissionInfo->certificate == 'pending')
                                        <p>Pending</p>
                                    @else
                                        <p>Click To Download Certificate: <a href="{{ asset('storage/certificate/' . $submissionInfo->certificate) }}" download="{{ $submissionInfo->certificate }}">{{ $submissionInfo->certificate }}</a></p>
                                    @endif
                                @else
                                    <p>Not Ready</p>
                                @endif

                            </td>
                            <td>
                                @if($submissionInfo->correctionPhase == 'readyForPresent')
                                    @if($paymentInfo->paymentStatus === "Complete")
                                        Complete
                                        <p>Payment ID : </p>
                                        {{ $submissionInfo->paymentStatus }}
                                    @elseif($paymentInfo->paymentStatus === "Pending For Verification")
                                        Uncomplete
                                        <p>Payment ID:</p>
                                        {{ $paymentInfo->paymentStatus }}
                                    @else
                                        Please upload your payment receipt
                                        <button onclick="showPopup()">Show Payment Method</button>
                                        <form action="{{ route('uploadReceipt', ['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="file" />
                                            <button type="submit">Upload</button>
                                        </form>
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
        popup.document.write("<img style='max-height:100px; max-width:100px; margin:auto;' src='{{ asset('paymentQR/'.$paymentQR->masterdata_value) }}'><br><label>{{ $paymentQR->masterdata_details }}</label><br>");
        popup.document.write("Please save your receipt for upload");

        // Center the window on the screen
        popup.moveTo((screen.width - popup.outerWidth) / 2, (screen.height - popup.outerHeight) / 2);
    }
        </script>