<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Form</title>
    <link href="css/styles.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
@if($submissionInfo->correctionPhase == 'pending')
@if($correction->isNotEmpty())
    @if($latestCorrection->returnCorrectionLink == NULL)

    Latest Correction:
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
            Submit File With Correction
        </th>
        <tr>
            <td>
                <p>Submission Code</p>
                {{ $latestCorrection->submissionCode }}
            </td> 
            <td>{{ $latestCorrection->commentForCorrection }}</td>        
            <td>{{ $latestCorrection->created_at }}</td>   
            <td>
                <form action="{{ route('uploadFileWithCorrection',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" />
                    <button type="submit">Upload File With Correction</button>
                </form>
            </td>
        </tr>
        </table>
    @endif
@else
<h5>Correction Phase Has Done</h5>
@endif
    Correction History:
    @foreach($correction as $correction)
            @if($correction->numberOfTimes != $latestCorrection->numberOfTimes)
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
                <td>
                    <a href="{{ route('downloadReturnCorrection', ['filename' => $correction->returnCorrectionLink]) }}" class="btn btn-primary mb-4">Download</a>
                </td>
            </tr>
            </table>
            @else
                @if($correction->returnCorrectionLink != NULL)
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
                @endif
            @endif
    @endforeach
    <br>
    <br>
    <br>
    <br>
    <br>
@else
    <h5>No Correction History</h5>
@endif

</body>
</html>
