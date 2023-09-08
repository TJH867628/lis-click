<link rel="icon" type="image/x-icon" href="assets/favicon.ico" wfd-invisible="true">
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
<style>
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
</style>
<div class="table-container">
                <h2 style="color: black ;">Pending Rewiew List</h2>
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
                        Download<br>
                    </th>
                    <th>    
                        Updated At<br>
                    </th>
                    <th>    
                        Upload Reviewed Document<br>
                    </th>
                    <th>
                        Evaluation Form
                    </th>
                    @foreach($submissionInfo as $submissionInfo)
                        @if($submissionInfo->reviewStatus === 'pending')
                            @if($submissionInfo->reviewer2ID != NULL)
                                @if($submissionInfo->reviewerID === $reviewername)
                                    @if($submissionInfo->evaluationFormLink == null)
                                    <tr>
                                        <div style="font-size:20px; font-weight:bold; color:black;  text-decoration:none;"!important;>
                                            <td>{{ $submissionInfo->submissionCode }}</td>
                                        </div>
                                        <td>{{ $submissionInfo->submissionTitle }}</td>
                                        <td>{{ $submissionInfo->submissionType }}</td>
                                        <td>{{ $submissionInfo->subTheme }}</td>
                                        <td>{{ $submissionInfo->presentMode }}</td>
                                        <td><a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" class="btn btn-primary mb-4">Download</a></td>
                                        <td>{{ $submissionInfo->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('uploadReviewSubmission',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data" class="file-upload-form">
                                                @csrf
                                                <input type="file" name="file" />
                                                <button type="submit" class="file-upload-button">Upload Reviewed Paper</button>
                                            </form>
                                            <form action="{{ route('uploadEvaluationForm',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data" class="file-upload-form">
                                                @csrf
                                                <input type="file" name="file" />
                                                <button type="submit" class="file-upload-button">Upload Evaluation Form</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Evaluate Form</a>
                                        </td>
                                    </tr>
                                    @endif
                                @elseif($submissionInfo->reviewer2ID === $reviewername)
                                    @if(!$submissionInfo->evaluationFormLink2)
                                    <tr>
                                        <td>{{ $submissionInfo->submissionCode }}</td>
                                        <td>{{ $submissionInfo->submissionTitle }}</td>
                                        <td>{{ $submissionInfo->submissionType }}</td>
                                        <td>{{ $submissionInfo->subTheme }}</td>
                                        <td>{{ $submissionInfo->presentMode }}</td>
                                        <td><a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" class="btn btn-primary mb-4">Download</a></td>
                                        <td>{{ $submissionInfo->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('uploadReviewSubmission',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file" />
                                                <button type="submit">Upload Reviewed Paper</button>
                                            </form>
                                            <form action="{{ route('uploadEvaluationForm',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file" />
                                                <button type="submit">Upload Evaluation Form</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Evaluate Form</a>
                                        </td>
                                    </tr>
                                    @endif
                                @endif
                            @else

                            <tr>
                            <td>{{ $submissionInfo->submissionCode }}</td>
                            <td>{{ $submissionInfo->submissionTitle }}</td>
                            <td>{{ $submissionInfo->submissionType }}</td>
                            <td>{{ $submissionInfo->subTheme }}</td>
                            <td>{{ $submissionInfo->presentMode }}</td>
                            <td><a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" class="btn btn-primary mb-4">Download</a></td>
                            <td>{{ $submissionInfo->updated_at }}</td>
                            <td>
                                <form action="{{ route('uploadReviewSubmission',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" />
                                    <button type="submit">Upload Reviewed Paper</button>
                                </form>
                                <form action="{{ route('uploadEvaluationForm',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" />
                                    <button type="submit">Upload Evaluation Form</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4">Evaluate Form</a>
                            </td>
                        </tr>
                            @endif
                        
                        @endif
                    @endforeach
                    
                </table>
                <br>
                <br>
                <br>
                    @else
                        <p style="color: black;">No record found.</p>
                    @endif
            </div>