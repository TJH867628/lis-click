<link rel="icon" type="image/x-icon" href="assets/favicon.ico" wfd-invisible="true">
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
<style>
        body {
            margin-top: 20px;
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
            background-color: white !important;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #343a40 !important;
            color: white !important;
        }

        td {
            background-color: white !important;
        }
        form {
            color: black;
            margin: auto;
            margin-bottom: 10px;
            width: 400px;
            padding: 20px;
            border: 1px solid #dee2e6;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 7px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
</style>
<div class="table-container">
                <h2 style="color: black ;">Done Rewiew List</h2>
                @if($submissionInfo)
                <table>
                    <th>
                        Submission Code<br>
                    </th>
                    <th>
                        Submission Title<br>
                    </th>
                    <th>
                        Submission Type<br>
                    </th>
                    <th>
                        Sub Theme<br>
                    </th>
                    <th>
                        Present Mode<br>
                    </th>
                    <th>    
                        File<br>
                    </th>
                        @foreach($submissionInfo as $submissionInfo)
                            @if($submissionInfo->reviewer2ID)
                                @if($submissionInfo->reviewerID === $reviewername)
                                    @if($submissionInfo->evaluationFormLink)
                                        <tr>
                                            <td>{{ $submissionInfo->submissionCode }}</td>
                                            <td>{{ $submissionInfo->submissionTitle }}</td>
                                            <td>{{ $submissionInfo->submissionType }}</td>
                                            <td>{{ $submissionInfo->subTheme }}</td>
                                            <td>{{ $submissionInfo->presentMode }}</td>
                                            <td>
                                            @if($submissionInfo->returnPaperLink)
                                                <a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                                            @else
                                                <form action="{{ route('uploadReviewSubmission',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="file" />
                                                    <button type="submit">Upload Reviewed Paper</button>
                                                </form>
                                            @endif
                                            <a href="{{ route('downloadEvaluationForm', ['filename' => $submissionInfo->evaluationFormLink]) }}" class="btn btn-primary mb-4">Download Evaluation Form</a></td>
                                        </tr>
                                    @endif
                                @elseif($submissionInfo->reviewer2ID === $reviewername)
                                    @if($submissionInfo->evaluationFormLink2)
                                    <tr>
                                        <td>{{ $submissionInfo->submissionCode }}</td>
                                        <td>{{ $submissionInfo->submissionTitle }}</td>
                                        <td>{{ $submissionInfo->submissionType }}</td>
                                        <td>{{ $submissionInfo->subTheme }}</td>
                                        <td>{{ $submissionInfo->presentMode }}</td>
                                        <td>
                                        @if($submissionInfo->returnPaperLink2)
                                        <a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink2]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                                        @else
                                        <form action="{{ route('uploadReviewSubmission',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file" />
                                                <button type="submit">Upload Reviewed Paper</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('downloadEvaluationForm', ['filename' => $submissionInfo->evaluationFormLink2]) }}" class="btn btn-primary mb-4">Download Evaluation Form</a></td>
                                    </tr>
                                    @endif
                                @endif
                               
                            </tr>
                            @endif
                        @endforeach
                    
                </table>
                @endif
            </div>