<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Form</title>
    <link href="css/styles.css" rel="stylesheet">

    <style>
        form{
            text-align: center  ;
        }
        body{
            text-align: center;
        }

        table {
            margin: auto;
            text-align: center;
            border-collapse: collapse;
        }

        table tr td{
            padding: 10px;
        }

        th{
            background-color: aquamarine;
            border: 1px solid black;
            padding:10px;
        }

        td{
            border: 1px solid black;
            padding:10px;
        }

        textarea {
            width: 500px;
            height: 100px;
        }

        #form-container{
            margin: auto;
            border: 3px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <br><br><br>
    @if($submission->correctionPhase == 'pending')
    <form action="{{ route('uploadNewCorrection', ['submissionCode' => $submission->submissionCode]) }}" method="post">
        @csrf
        @if($correction->isEmpty())
            <h5>First Time Correction</h5>
            <table>
                <tr>
                    <td>
                        Orginal File
                    </td>
                    <td>
                    <a href="{{ route('downloadSubmission', ['filename' => $submission->file_name]) }}" class="btn btn-primary mb-4">Download Orginal File</a>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">
                        File From Reviewer
                    </td>
                    <td>
                        @if($submission->reviewer2ID == NULL)
                        <a href="{{ route('downloadEvaluationForm', ['filename' => $submission->evaluationFormLink]) }}" class="btn btn-primary mb-4">Download Evaluation Form</a>
                        @else
                            <a href="{{ route('downloadEvaluationForm', ['filename' => $submission->evaluationFormLink2]) }}" class="btn btn-primary mb-4">Download Evaluation Form 2</a>
                            <a href="{{ route('downloadEvaluationForm', ['filename' => $submission->evaluationFormLink]) }}" class="btn btn-primary mb-4">Download Evaluation Form</a>
                        @endif
                    </td>

                </tr>
                <tr>
                    <td>
                        @if($submission->reviewer2ID == NULL)
                            @if($submission->returnPaperLink != NULL)
                                <a href="{{ route('downloadReviewedFile', ['filename' => $submission->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                            @endif
                        @else
                            @if($submission->returnPaperLink != NULL)
                                <a href="{{ route('downloadReviewedFile', ['filename' => $submission->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                            @endif
                            @if($submission->returnPaperLink2 != NULL)
                                <a href="{{ route('downloadReviewedFile', ['filename' => $submission->returnPaperLink2]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        Comment
                    </td>
                    <td>
                        <textarea name="commentForCorrection" id="commentForCorrection" cols="30" rows="10" required></textarea>
                    </td>
                </tr>
            </table>
            <button type="submit" style="margin-right: 700px;" class="btn btn-primary mb-4">Submit</button>
        <br><br><br>
        @if($submission->correctionPhase == 'pending')
            <a href="{{ route('doneCorrection', ['submissionCode' => $submission->submissionCode]) }}" class="btn btn-primary mb-4">Done Submission</a>
        @elseif($submission->correctionPhase == 'done')
            <a href="{{ route('unDoneCorrection', ['submissionCode' => $submission->submissionCode]) }}" class="btn btn-primary mb-4">Undone Submission</a>
        @endif
        @elseif($latestReturnCorrection->returnCorrectionLink != NULL)
        <table>
            <tr>
                <td>
                    Return File
                </td>
                <td>
                <a href="{{ route('downloadReturnCorrection', ['filename' => $latestReturnCorrection->returnCorrectionLink]) }}" class="btn btn-primary mb-4">Download Return File</a>
                </td>
            </tr>
            <tr>
                <td rowspan="2">
                    File From Reviewer
                </td>
                <td>
                    @if($submission->reviewer2ID == NULL)
                        <a href="{{ route('downloadEvaluationForm', ['filename' => $submission->evaluationFormLink]) }}" class="btn btn-primary mb-4">Download Evaluation Form</a>
                    @else
                        <a href="{{ route('downloadEvaluationForm', ['filename' => $submission->evaluationFormLink2]) }}" class="btn btn-primary mb-4">Download Evaluation Form 2</a>
                        <a href="{{ route('downloadEvaluationForm', ['filename' => $submission->evaluationFormLink]) }}" class="btn btn-primary mb-4">Download Evaluation Form</a>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($submission->reviewer2ID == NULL)
                        @if($submission->returnPaperLink != NULL)
                            <a href="{{ route('downloadReviewedFile', ['filename' => $submission->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                        @endif
                    @else
                        @if($submission->returnPaperLink != NULL)
                            <a href="{{ route('downloadReviewedFile', ['filename' => $submission->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                        @endif
                        @if($submission->returnPaperLink2 != NULL)
                            <a href="{{ route('downloadReviewedFile', ['filename' => $submission->returnPaperLink2]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                        @endif
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    Comment
                </td>
                <td>
                    <textarea name="commentForCorrection" id="commentForCorrection" cols="30" rows="10" required></textarea>
                </td>
            </tr>
        </table>
        <button type="submit" style="margin-right: 700px;" class="btn btn-primary mb-4">Submit</button>
        @else
        <table>
            <tr>
                <td>
                    Evaluation Form
                </td>
                <td>
                    @if($submission->reviewer2ID == NULL)
                    <a href="{{ route('downloadEvaluationForm', ['filename' => $submission->evaluationFormLink]) }}" class="btn btn-primary mb-4">Download Evaluation Form</a>
                    @else
                        <a href="{{ route('downloadEvaluationForm', ['filename' => $submission->evaluationFormLink2]) }}" class="btn btn-primary mb-4">Download Evaluation Form 2</a>
                        <a href="{{ route('downloadEvaluationForm', ['filename' => $submission->evaluationFormLink]) }}" class="btn btn-primary mb-4">Download Evaluation Form</a>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    Comment
                </td>
                <td>
                    <textarea name="commentForCorrection" id="commentForCorrection" cols="30" rows="10" required></textarea>
                </td>
            </tr>
        </table>
        <button type="submit" style="margin-right: 700px;" class="btn btn-primary mb-4">Submit</button>
    @endif
    </form>
    @elseif($submission->correctionPhase == 'done')
    <h5>Correction Phase is Done</h5>
    @endif
    <br><br><br>

@if($correction->isNotEmpty())
    Correction History:
    @foreach($correction as $correction)
        <h5>#{{ $correction->numberOfTimes }} Time: {{ $correction->created_at }}</h5>
        <table border>
        <th>
            Details
        </th>
        <th>
            Comment:
        </th>
        <th>
            Created Time
        </th>
        <th>
            Download File With Correction
        </th>
        <tr>
            <td>
                <p>Submission Code</p>
                {{ $correction->submissionCode }}
            </td> 
            <td>{{ $correction->commentForCorrection }}</td>        
            <td>{{ $correction->created_at }}</td>   
            @if($correction->returnCorrectionLink != NULL)
            <td>
                <a href="{{ route('downloadReturnCorrection', ['filename' => $correction->returnCorrectionLink]) }}" class="btn btn-primary mb-4">Download</a>
            </td>
            @else
            <td>
                Waiting Participants To Upload
            </td>
            @endif
        </tr>
        </table>
    @endforeach
    @if($submission->correctionPhase == 'pending')
    <a href="{{ route('doneCorrection', ['submissionCode' => $correction->submissionCode]) }}" class="btn btn-primary mb-4">Done Submission</a>
    @elseif($submission->correctionPhase == 'readyForPresent')
    <a href="{{ route('unDoneCorrection', ['submissionCode' => $correction->submissionCode]) }}" class="btn btn-primary mb-4">Undone Submission</a>
    @endif
@elseif($submission->correctionPhase == 'readyForPresent')
    <h5>Correction Phase is Done</h5>
    @if($submission->correctionPhase == 'pending')
    <a href="{{ route('doneCorrection', ['submissionCode' => $submission->submissionCode]) }}" class="btn btn-primary mb-4">Done Submission</a>
    @elseif($submission->correctionPhase == 'readyForPresent')
    <a href="{{ route('unDoneCorrection', ['submissionCode' => $submission->submissionCode]) }}" class="btn btn-primary mb-4">Undone Submission</a>
    @endif
@endif
<br><br><br>
<br><br><br>

</body>
</html>
