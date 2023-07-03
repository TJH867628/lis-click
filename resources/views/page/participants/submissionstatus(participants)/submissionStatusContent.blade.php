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
                        Submission Type<br>
                    </th>
                    <th>
                        Theme<br>
                    </th>
                    <th>
                        Present Mode<br>
                    </th>
                    <th>
                        Participants<br>
                    </th>
                    <th>
                        Payment Status
                    </th>
                    <th>
                        Review Status<br>
                    </th>
                    <th>
                        Reviewer<br>
                    </th>
                    <th>    
                        Download<br>

                    </th>
                    <th>
                        Review Paper<br>
                    </th>
                </tr>
                    @foreach($userSubmissionInfo as $submissionInfo)
                        <tr>
                            <td>{{ $submissionInfo->submissionCode }}</td>
                            <td>{{ $submissionInfo->submissionType }}</td>
                            <td>{{ $submissionInfo->subTheme }}</td>
                            <td>{{ $submissionInfo->presentMode }}</td>
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
                                @if($paymentInfo->paymentStatus === "Complete")
                                    Complete
                                    <p>Payment ID : </p>
                                    {{ $submissionInfo->paymentStatus }}
                                @elseif($paymentInfo->paymentStatus === "Pending For Verification")
                                    Pending For Verification
                                    <p>Payment ID:</p>
                                    {{ $paymentInfo->paymentStatus }}
                                @else
                                    Incomplete
                                    <form action="{{ route('uploadReceipt', ['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" />
                                    <button type="submit">Upload</button>
                                </form>
                                @endif
                            </td> 
                            <td>{{ $submissionInfo->reviewStatus }}</td>
                            <td>
                                <p>Reviewer</p>
                                <h5>{{ $submissionInfo->reviewerID }} </h5>
                                @if($submissionInfo->reviewer2ID != NULL)
                                    <p>Reviewer 2</p>
                                    <h5>{{ $submissionInfo->reviewer2ID }} </h5>
                                @endif
                            </td>
                            <td><a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" class="btn btn-primary mb-4">Download</a></td>
                            @if($submissionInfo->returnPaperLink == NULL)
                                <td><a href="#" class="btn btn-primary mb-4" style="color: gray; pointer-events: none; ">Pending Review</a></td>
                            @else
                                <td><a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Return File</a></td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <p style="color: black;">No submission found for the user.</p>
                @endif
                
            </table>
        </div>