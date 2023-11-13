<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
<!-- Bootstrap icons-->

<!-- Core theme CSS (includes Bootstrap)-->
<style>
    * {
        margin: 0;
        padding: 0;

        box-sizing: border-box;
        font-family: sans-serif;
    }

    body {
        min-height: 125%;
        background: url("../images/tblBackground.jpg") center / cover;
        display: flex;
        justify-content: center;
    }

    main.table {
        margin-top: 2%;
        width: 97vw !important;
        height: 70%;
        background-color: #fff5;
        backdrop-filter: blur(7px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: .8rem;
        overflow: hidden;
    }

    .table__header {
        z-index:0;
        width: 100%;
        height: 15%;
        background-color: #fff4;
        padding: 1rem 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table__header .input-group {
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

    .table__header .input-group:hover {
        width: 45%;
        background-color: #fff8;
        box-shadow: 0 .1rem .4rem #0002;
    }

    .table__header .input-group img {
        width: 1.2rem;
        height: 1.2rem;
    }

    .table__header .input-group input {
        width: 100%;
        padding: 0 .5rem 0 .3rem;
        background-color: transparent;
        border: none;
        outline: none;
    }

    .table__body {
        position: relative;
        width: 100%;
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
        text-align: left;
    }

    th {
        background-color: #d5d1defe !important;
    }

    thead tr th {
        position: sticky;
        top: 0;
        left: 0;
        cursor: pointer;
        text-transform: capitalize;
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

    .detailsBox{
        margin: auto;
        margin-top: 50px;
        margin-bottom: 30px;
        width: 170px;
        border: 1px solid #dee2e6;
        padding: 2%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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
    }

    .formturnin{
        width: 190px;
        height: 180px;
    }

    input[type="text"]{
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;
        width: 300px;
        margin-top: 15px;
        margin-right: 75%;
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

    .btn{
        float: left;
    }

    </style>
</head>
<body>
    <main class="table">
        <section class="table__header">
            <h1>Recommended Submission List</h1>
        </section>
        <section class="table__body">
            <table id="submissionTable" class="display">
            <thead>
                    <tr>
                        <th>
                            Submission Details<br>
                        </th>
                        <th>    
                            Reviewer<br>
                        </th>
                        <th>    
                            Document<br>
                        </th>
                        <th>    
                            View Evaluation Form<br>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @if($recommendedSubmission)
                    @foreach($recommendedSubmission as $thisRecommendedSubmission)
                        <tr>
                            <td>
                                <p>Submission Code</p>
                                <a style="font-size:20px; font-weight:bold; color:black;  text-decoration:none;" href="#" class="submission-code" data-submission-code="{{$thisRecommendedSubmission->submissionCode}}" data-submission-type="{{$thisRecommendedSubmission->submissionType}}" data-submission-title="{{$thisRecommendedSubmission->submissionTitle}}" data-submission-type="{{$thisRecommendedSubmission->submissionTitle}}" data-sub-theme="{{$thisRecommendedSubmission->subTheme}}" data-present-mode="{{$thisRecommendedSubmission->presentMode}}">
                                    <div class="submissionCode">
                                        {{$thisRecommendedSubmission->submissionCode}}
                                    </div>
                                </a>
                                <br><p>Title</p>
                                {{$thisRecommendedSubmission->submissionTitle}}
                                <br><br><p>Type</p>
                                {{$thisRecommendedSubmission->submissionType}}
                                <br><br><p>Theme</p>
                                {{$thisRecommendedSubmission->subTheme}}
                                <br><br><p>Present Mode</p>
                                {{$thisRecommendedSubmission->presentMode}}
                            </td>
                            <td>
                                <p>Reviewer</p>
                                <h5>{{ $thisRecommendedSubmission->reviewerID }} </h5>
                                @if($thisRecommendedSubmission->reviewer2ID != NULL)
                                    <p>Reviewer 2</p>
                                    <h5>{{ $thisRecommendedSubmission->reviewer2ID }} </h5>
                                @endif
                                <br><p>Review Status</p>
                                {{ $thisRecommendedSubmission->reviewStatus }}
                            </td>             
                            <td>
                                <p>Original File</p>
                                <a href="{{ route('downloadSubmission', ['filename' => $thisRecommendedSubmission->file_name]) }}" target="_blank" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Orginal File</a>
                                <br><p style="width: fit-content;">Reviewed File</p><br>
                                @if($thisRecommendedSubmission->returnPaperLink == NULL)
                                    <p class="status cancelled">Return Paper Unavailable</p>
                                @else
                                    <a href="{{ route('downloadReviewedFile', ['filename' => $thisRecommendedSubmission->returnPaperLink]) }}" target="_blank" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Return File</a>
                                @endif
                                <br><p>Cleaned File</p>
                                @if( $thisRecommendedSubmission->cleanedDocument == null)
                                <label for="">Unavailable</label>
                                @else
                                <a href="{{ route('downloadCleanedDocument', ['filename' => $thisRecommendedSubmission->cleanedDocument]) }}" target="_blank" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Cleaned Document</a>
                                @endif
                            </td>                    
                            <td>
                            @if(empty($submissionInfo->dataEvaluationForm->paper_id_number))
                                <p class="status shipped">Pending</p>
                            @else
                                @if($submissionInfo->dataEvaluationForm->paper_id_number == $submissionInfo->submissionCode)
                                    <a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4" style="float:left; background-color: #4CAF50;"><i class="fas fa-calculator" style="padding: 5px;"></i>Evaluate Form</a><br>
                                @endif
                                @if($submissionInfo->evaluationFormLink != NULL)
                                    <a href="{{ route('downloadEvaluationForm', ['filename' => $submissionInfo->evaluationFormLink]) }}" target="_blank" class="btn btn-primary mb-4" style="float:left; background-color: #4CAF50;"><i class="fa-solid fa-download" style="padding: 5px;"></i>Evaluate Form(Reviewer 1)</a><br>
                                @else
                                    <label style="padding:1%;" class="status cancelled"><strong>Reviewer 1</strong>'s Evaluation Form haven't submitted </label><br>
                                @endif
                                @if($submissionInfo->reviewer2ID != null)
                                    @if($submissionInfo->evaluationFormLink2 != NULL)
                                        <a href="{{ route('downloadEvaluationForm', ['filename' => $submissionInfo->evaluationFormLink2]) }}" target="_blank" class="btn btn-primary mb-4" style="float:left; background-color: #4CAF50;"><i class="fa-solid fa-download" style="padding: 5px;"></i>Evaluate Form(Reviewer 2)</a><br>
                                    @else
                                        <label style="padding:1%;" class="status cancelled"><strong>Reviewer 2</strong>'s Evaluation Form haven't submitted</label><br>
                                    @endif
                                @endif
                            @endif
                            </td>   
                        </tr>
                    @endforeach
                @else
                    <p style="color: black;">No record found</p>
                @endif
                </tbody>
            </table>
        </section>
    </main>
    </body>
    <script>
         const chooseFiles = document.querySelectorAll('.choose-file');

    chooseFiles.forEach(function(chooseFile) {
        const imageUpload = chooseFile.querySelector('input[type="file"]');
        const fileName = chooseFile.querySelector('.file-name');
        const previewImage = chooseFile.querySelector('.preview-image');

        imageUpload.addEventListener('change', function() {
            const files = this.files;
            let fileNames = '';

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    previewImage.src = reader.result;
                    previewImage.style.display = "block";
                });

                reader.readAsDataURL(file);

                fileNames += file.name + ', ';
            }

            fileNames = fileNames.slice(0, -2);
            fileName.textContent = fileNames;
        });
    });

    $(document).ready(function() {
        $('#submissionTable').DataTable({
            search: {
                smart: false  // Disables smart search, enforcing exact match searches
            }
        });
    });


    </script>

</html>