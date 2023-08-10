<link rel="icon" type="image/x-icon" href="assets/favicon.ico" wfd-invisible="true">
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
<div class="table-container">
            <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search by Submission Code" />
                @if($userSubmissionInfo)
                <table id="submissionTable" border>
                <tr>
                    <th>
                        Submission Details<br>
                    </th>
                    <th>
                        Review Status<br>
                    </th>
                    <th>
                        Reviewer<br>
                    </th>
                    <th>
                        Change Reviewer<br>
                    </th>
                    <th>    
                        Download Submission File<br>
                    </th>
                    <th>    
                        View Evaluation Form<br>
                    </th>
                    <th>    
                        Turn In Report<br>
                    </th>
                    <th>
                        Correction
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
                            <td>{{ $submissionInfo->reviewStatus}} </td>
                            <td>
                                <p>Reviewer</p>
                                <h5>{{ $submissionInfo->reviewerID }} </h5>
                                @if($submissionInfo->reviewer2ID != NULL)
                                    <p>Reviewer 2</p>
                                    <h5>{{ $submissionInfo->reviewer2ID }} </h5>
                                @endif
                            </td>
                            <td>
                            <form action="{{ route('updateReviewer', ['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST">
                                @csrf
                                <select name="reviewer" id="reviewer">
                                    @foreach($allReviewerInfo as $reviewerInfo)
                                        <option value="{{ $reviewerInfo->email }}">{{ $reviewerInfo->name }}</option>
                                    @endforeach
                                </select>
                                <select name="reviewer2" id="reviewer2">
                                        <option value="None">None</option>
                                        @foreach($allReviewerInfo as $reviewerInfo)
                                            <option value="{{ $reviewerInfo->email }}">{{ $reviewerInfo->name }}</option>
                                        @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mb-4">Update Reviewer</button>
                            </form>

                                <a href="{{ route('cancelReviewer', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Cancel Reviewer</a>
                            </td>
                            <td>
                                <a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" class="btn btn-primary mb-4">Download Orginal File</a>
                                <p>Download Reviewed Paper</p>
                            </td>

                            <td>
                            @if($dataEvaluationForm)
                            @if($dataEvaluationForm->paper_id_number == $submissionInfo->submissionCode)
                                <a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Evaluate Form</a>
                            @else
                                <p>Pending</p>
                            @endif
                            @else
                                <p>Pending</p>
                            @endif
                            </td>
                            <td>
                                @if($submissionInfo->turnInReport)
                                    <a href="{{ route('downloadTurnInReport', ['filename' => $submissionInfo->turnInReport]) }}" class="btn btn-primary mb-4">Download Turn In Report</a>
                                @endif
                                <form action="{{ route('uploadTurnInReport',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" />
                                    <button type="submit">Upload Turn In Report</button>
                                </form>
                            </td>
                            <td>
                                @if($submissionInfo->reviewStatus == 'done')
                                    <p>Correction Phase :</p>
                                    @if( $submissionInfo->correctionPhase == 'pending' )
                                    
                                        @if($correction && $correction->returnCorrectionLink !== NULL)
                                        <h5>Pending For Comment</h5>
                                        @elseif(!$correction)
                                        <h5>Pending For Comment</h5>
                                        @else
                                        <h5>Pending For Correction</h5>
                                        @endif
                                    @elseif( $submissionInfo->correctionPhase == 'done' )
                                        <h5>Done</h5>
                                    @endif
                                    <a href="{{ route('correctionForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Correction</a>
                                @else
                                    <p>Waiting for review</p>
                                 
                                @endif
                               
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p style="color: black;">No record found</p>
                @endif
                
            </table>
        </div>