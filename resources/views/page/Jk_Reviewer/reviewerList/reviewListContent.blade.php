<link rel="icon" type="image/x-icon" href="assets/favicon.ico" wfd-invisible="true">
<!-- Bootstrap icons-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
<style>
    th, td{
                padding: 10px;
                margin: 10px;
                text-align: center;
                border: 1px solid #dee2e6 !important;
                color: black;
            }
            
            .table-container{
                margin-top: 20px !important;
                border: 2px solid black;
                padding: 20px;
                width: 90%;
                margin: auto;
                overflow-x: auto;
                overflow-wrap: break-word;
                align-items: center;
                justify-content: center;
                text-align: center;
            }
        body {
            background-color: #f8f9fa!important;
            font-family: Arial, sans-serif !important;
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

        th {
            background-color: #343a40;
            color: white;
        }

        form {
            color: black;
            margin: auto;
            margin-top: 50px;
            margin-bottom: 30px;
            width: 170px;
            padding-bottom: 150px;
            padding-top: 10px;
            border: 1px solid #dee2e6;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .formturnin{
            width: 190px;
            height: 180px;
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

        select {
            margin: 10px;
            padding: 3px;
        }

        .btnreview{
            margin-top: 20px;
        }

        .downloadturnin{
            margin-left: 9px;
        }

        .uploadturnin{
            padding: 10px;
        }
        </style>
<div class="table-container">
            <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search by Submission Code" />
                @if($userSubmissionInfo)
                <table id="submissionTable" border>
                <tr>
                    <th>
                        Submission Details<br>
                    </th>
                    <th>
                        Reviewer Info <br>
                    </th>
                    <th>
                        Change Reviewer<br>
                    </th>
                    <th>    
                        Document<br>
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
                    <th>
                        Certificate
                    </th>
                </tr>
                    @foreach($userSubmissionInfo as $submissionInfo)
                        <tr>
                            <td>
                                <p>Submission Code</p>
                                <a style="font-size:20px; font-weight:bold; color:black;  text-decoration:none;" href="#" class="submission-code" data-submission-code="{{$submissionInfo->submissionCode}}" data-submission-type="{{$submissionInfo->submissionType}}" data-submission-title="{{$submissionInfo->submissionTitle}}" data-submission-type="{{$submissionInfo->submissionTitle}}" data-sub-theme="{{$submissionInfo->subTheme}}" data-present-mode="{{$submissionInfo->presentMode}}">
                                    <div class="submissionCode">
                                        {{$submissionInfo->submissionCode}}
                                    </div>
                                </a>
                                <br><p>Title</p>
                                {{$submissionInfo->submissionTitle}}
                                <br><br><p>Type</p>
                                {{$submissionInfo->submissionType}}
                                <br><br><p>Theme</p>
                                {{$submissionInfo->subTheme}}
                                <br><br><p>Present Mode</p>
                                {{$submissionInfo->presentMode}}
                            </td>
                            <td>
                                <p>Reviewer</p>
                                <h5>{{ $submissionInfo->reviewerID }} </h5>
                                @if($submissionInfo->reviewer2ID != NULL)
                                    <p>Reviewer 2</p>
                                    <h5>{{ $submissionInfo->reviewer2ID }} </h5>
                                @endif
                                <br><p>Reviewer Status</p>
                                {{ $submissionInfo->reviewStatus}}
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
                                <div class=btnreview>
                                    <button type="submit" class="btn btn-primary mb-4">Update Reviewer</button>

                                    <a href="{{ route('cancelReviewer', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Cancel Reviewer</a>
                                </div>
                            </form>

                                
                            </td>
                            <td>
                                <p>Download Submission File</p>
                                <a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" class="btn btn-primary mb-4">Download Orginal File</a>
                                <p>Reviewed File</p>
                                @if($submissionInfo->returnPaperLink == NULL)
                                    Return Paper Unavailable
                                @else
                                    <a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Return File</a>
                                @endif
                            </td>

                            <td>
                            @if(empty($submissionInfo->dataEvaluationForm->paper_id_number))
                                <p>Pending</p>
                            @else
                                @if($submissionInfo->dataEvaluationForm->paper_id_number == $submissionInfo->submissionCode)
                                    <a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Evaluate Form</a>
                                @endif
                            @endif
                            </td>
                            <td>
                                @if($submissionInfo->turnInReport)
                                <div class="downloadturnin">
                                    <a href="{{ route('downloadTurnInReport', ['filename' => $submissionInfo->turnInReport]) }}" class="btn btn-primary mb-4">Download Turn In Report</a>
                                </div>
                                @endif
                                <form action="{{ route('uploadTurnInReport',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data" class="formturnin">
                                    @csrf
                                    <br><input type="file" name="file" />
                                    <br><button type="submit" class="uploadturnin">Upload Turn In Report</button>
                                </form>
                            </td>
                            <td>
                                @if($submissionInfo->reviewStatus == 'done')
                                    <p>Correction Phase :</p>
                                    @if( $submissionInfo->correctionPhase == 'pending' )
                                        @if($submissionInfo->latestReturnCorrection && $submissionInfo->latestReturnCorrection->returnCorrectionLink !== NULL)
                                            <h5>Pending For Comment</h5>
                                        @elseif(!$submissionInfo->latestReturnCorrection)
                                            <h5>Pending For Comment</h5>
                                        @else
                                            <h5>Pending For Correction</h5>
                                        @endif
                                    @elseif( $submissionInfo->correctionPhase == 'readyForPresent' )
                                        <h5>Ready For Present</h5>
                                    @endif
                                    <a href="{{ route('correctionForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Correction</a>
                                @else
                                    <p>Waiting for review</p>
                                 
                                @endif
                            </td>
                            <td>
                                @if($submissionInfo->correctionPhase == 'readyForPresent')
                                    @if($submissionInfo->certificate == 'pending')
                                    <form method="post" action="{{ route('uploadCertificate', ['submissionCode' => $submissionInfo->submissionCode]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" accept="application/pdf">
                                        <button type="submit">Upload Certificate</button>
                                    </form>
                                    @else
                                        <p>Click To Download Certificate:</p>
                                    @endif
                                @else
                                    <p>Not Ready</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p style="color: black;">No record found</p>
                @endif
                
            </table>
        </div>