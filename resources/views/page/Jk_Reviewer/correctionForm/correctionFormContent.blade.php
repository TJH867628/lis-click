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
        }

        table tr td{
            padding: 10px;
        }

        th{
            background-color: aquamarine;
            padding:10px;
        }

        td{
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

        * {
            margin: 0;
            padding: 0;

            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            min-height: 100vh;
            background: url("../images/tblBackground.jpg") center / cover;
            display: flex;
            justify-content: center;
        }

        main.table {
            margin-top: -15%;
            width: 82vw;
            height: fit-content;
            background-color: #fff5;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            overflow: hidden;
        }

        .table__header {
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
            width: 95%;
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
            padding: 0.5em;
            border-collapse: collapse;
            text-align: left;
        }

        thead th {
            position: sticky;
            top: 0;
            left: 0;
            background-color: #d5d1defe;
            cursor: pointer;
            text-transform: capitalize;
            z-index: 1;
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
            background-color: #fff6 ;
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
            background-color: #fff9ae;
        }

        .status.shipped {
            background-color: #6fcaea;
        }


        @media (max-width: 1000px) {
            td:not(:first-of-type) {
                min-width: 12.1rem;
            }
        }

        thead th span.icon-arrow {
            display: inline-block;
            width: 1.3rem;
            height: 1.3rem;
            border-radius: 50%;
            border: 1.4px solid transparent;
            
            text-align: center;
            font-size: 1rem;
            
            margin-left: .5rem;
            transition: .2s ease-in-out;
        }

        thead th:hover span.icon-arrow{
            border: 1.4px solid #6c00bd;
        }

        thead th:hover {
            color: #6c00bd;
        }

        thead th.active span.icon-arrow{
            background-color: #6c00bd;
            color: #fff;
        }

        thead th.asc span.icon-arrow{
            transform: rotate(180deg);
        }

        thead th.active,tbody td.active {
            color: #6c00bd;
        }

        #button{
            float: right;
            margin-right: 50px;
            width: 170px;
            height: 50px;
            background: #0d6efd;
            border-radius: 40px;
            color: #fff;
            font-size: 16px;
            border: none;
            outline: none;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: .7s ease-in-out;
        }

        #button i {
            margin-right: 7px;
        }

        #button.active {
            font-size: 0;
            width: 50px;
            background: #ededed;
        }

        .progress-wrapper {
            position: absolute;
            width: 100px;
            height: 100px;
            transform: scale(0);
            transition: .7s;
            transition-delay: .5s;
        }

        #button.active .progress-wrapper {
            transform: scale(.6);
        }

        .progress-wrapper .inner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: #fff;
            border-radius: 50%;
            z-index: 2;
            transition: 1s ease;
            transition-delay: 4s;
        }

        #button.active .progress-wrapper .inner {
            transform: translate(-50%, -50%) scale(0);
        }

        .progress-wrapper .bar {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #ededed;
            border-radius: 50%;
            clip: rect(0px, 100px, 100px, 50px);
        }

        .circle .bar .progress {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #0d6efd;
            border-radius: 50%;
            z-index: 1;
            clip: rect(0px, 50px, 100px, 0px);
        }

        .circle .bar.left .progress{
            transition: 1.5s linear;
            transition-delay: 1s;
        }

        #button.active .circle .bar.left .progress {
            transform: rotate(180deg);
        }

        .circle .right {
            transform: rotate(180deg);
        }

        .circle .bar.right .progress{
            transition: 1.5s linear;
            transition-delay: 2.5s;
        }

        #button.active .circle .bar.right .progress {
            transform: rotate(180deg);
        }

        .progress-wrapper .checkmark {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            z-index: 2;
        }

        .checkmark span {
            position: absolute;
            display: block;
            width: 30px;
            height: 7px;
            background: #fff;
            border-radius: 5px;
            transform-origin: left;
            transition: .5s;
        }

        .checkmark span:first-child {
            top: 45px;
            left: 22px;
            width: 30px;
            transform: rotate(45deg) scaleX(0);
            transition-delay: 5s;
        }

        #button.active .checkmark span:first-child {
            transform: rotate(45deg) scaleX(1);
        }

        .checkmark span:last-child {
            top: 65px;
            left: 40px;
            width: 50px;
            transform: rotate(-45deg) scaleX(0);
            transition-delay: 5.5s;
        }

        #button.active .checkmark span:last-child {
            transform: rotate(-45deg) scaleX(1);
        }

        #submitButton{
            padding: 3%;
            border-radius: 50%;
            height: fit-content;
            background-color: #007bff;
            color: white;
            display: flex;
            align-items: center;
            margin: auto;
            transition: .2s ease-in-out;
            border:none;
            margin-top: 5%;
        }

        #submitButton:hover{
            background-color: #0069d9;
        }

        #submitButton i{
            font-size: 200%;
        }

        #addButton{
            background-color: transparent;
            color: black;
            text-align: center;
            width: 50px;
            height: 50px;
            cursor: pointer;
            margin-top: -2%;
            margin-right: 2%;
        }

        #addButton i{
            font-size: 300%;
        }

        #popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
            z-index: 9999;
            overflow: scroll;
        }

        #popup.show {
            opacity: 1;
            visibility: visible;
        }

        #popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s, visibility 0.5s;
        }

        #popup.show #popup-content {
            opacity: 1;
            visibility: visible;
        }

        #popup-content h2 {
            margin-top: 0;
        }

        #popup-content button {
            margin: auto;
            margin-top: 20px;
        }

        #popup-content i {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            background-color: red;
            color: #fff;
            cursor: pointer;
        }

        #popup-content table td{
            text-align: center;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 7px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Container for the switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* The slider (circle) */
        /* Container for the switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* The slider (circle) */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        /* Rounded sliders (if desired) */
        .slider.round {
            border-radius: 34px;
        }

        /* The slider handle (circle inside the slider) */
        .slider:before {
            position: absolute;
            border-radius: 50%;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        /* When the checkbox is checked, change the background color of the slider */
        input:checked + .slider {
            background-color: #2196F3;
        }

        /* When the checkbox is checked, move the slider to the right */
        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        #downloadButton{
            border-radius: 5%;
            width:60%;
            height: 40px;
            background-color: #007bff;
            color: white;
        }

        #tdSubmitButton{
            width: 20%;
            text-align: center;
        }

        #submitButton{
            padding: 3%;
            border-radius: 50%;
            height: fit-content;
            background-color: #007bff;
            color: white;
            display: flex;
            align-items: center;
            margin: auto;
            transition: .2s ease-in-out;
        }

        #submitButton:hover{
            background-color: #0069d9;
        }

        #submitButton i{
            font-size: 300%;
        }

        textarea{
            height: auto;
        }
    </style>
</head>
<body>
<main class="table">
<section class="table__header">
<h1>Correction History</h1>
        <button onclick="openPopup()" id="addButton">
            <div class="d-flex justify-content-center align-items-center">
                <i class="material-icons text-center">add</i>
            </div>
        </button>
    </section>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th>
                        Details
                    </th>
                    <th>
                        Comment
                    </th>
                    <th>
                        Created Time
                    </th>
                    <th>
                        Download File With Correction
                    </th>
                </tr>
            </thead>
@if($correction->isNotEmpty())
            <tbody>
        @foreach($correction as $thisCorrection)
            <tr>
                <td>
                    <p>Submission Code</p>
                    {{ $thisCorrection->submissionCode }}
                </td> 
                <td>{{ $thisCorrection->commentForCorrection }}</td>        
                <td>{{ $thisCorrection->created_at }}</td>   
                @if($thisCorrection->returnCorrectionLink != NULL)
                <td>
                    <a href="{{ route('downloadReturnCorrection', ['filename' => $thisCorrection->returnCorrectionLink]) }}" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download</a>
                </td>
                @else
                <td>
                    <p class="status shipped">Waiting Participants To Upload</p>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if($submission->correctionPhase == 'pending')
        <a href="{{ route('doneCorrection', ['submissionCode' => $submission->submissionCode]) }}" class="btn btn-primary mb-4" style="margin-top: 2%; float:none;"><i class="fas fa-check"></i>Done Submission</a>
        @elseif($submission->correctionPhase == 'readyForPresent')
        <a href="{{ route('unDoneCorrection', ['submissionCode' => $submission->submissionCode]) }}" class="btn btn-primary mb-4" style="margin-top: 2%; float:none;"><i class="fas fa-undo"></i>Undone Submission</a>
    @elseif($submission->correctionPhase == 'readyForPresent')
        <h5>Correction Phase is Done</h5>
        @if($submission->correctionPhase == 'pending')
        <a href="{{ route('doneCorrection', ['submissionCode' => $submission->submissionCode]) }}" class="btn btn-primary mb-4" style="margin-top: 2%; float:none;"><i class="fas fa-check"></i>Done Submission</a>
        @elseif($submission->correctionPhase == 'readyForPresent')
        <a href="{{ route('unDoneCorrection', ['submissionCode' => $submission->submissionCode]) }}" class="btn btn-primary mb-4" style="margin-top: 2%; float:none;"><i class="fas fa-undo"></i>Undone Submission</a>
    @endif
@else
<tr>
    <td colspan="4">
        No Record Found
    </td>
</tr>
@endif
    </section>
    </main>
    <div id="popup">
            <div id="popup-content">
                <h2>Correction<i class="material-icons" onclick="closePopup()">close</i></h2>
                @if($submission->correctionPhase == 'pending')
                <form action="{{ route('uploadNewCorrection', ['submissionCode' => $submission->submissionCode]) }}" method="post">
                    @csrf
                    @if(!$correction)
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
                                        @else
                                            no file here
                                        @endif
                                    @else
                                        @if($submission->returnPaperLink != NULL)
                                            <a href="{{ route('downloadReviewedFile', ['filename' => $submission->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                                        @endif
                                        @if($submission->returnPaperLink2 != NULL)
                                            <a href="{{ route('downloadReviewedFile', ['filename' => $submission->returnPaperLink2]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                                        @endif
                                        @if($submission->returnPaperLink == NULL && $submission->returnPaperLink2 == NULL)
                                            no file here
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Comment
                                </td>
                                <td>
                                    <textarea name="commentForCorrection" id="commentForCorrection" cols="30" rows="5" required></textarea>
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
                    @elseif(isset($latestReturnCorrection->returnCorrectionLink) && $latestReturnCorrection->returnCorrectionLink != NULL)
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
                                    @else
                                        no file here
                                    @endif
                                @else
                                    @if($submission->returnPaperLink != NULL)
                                        <a href="{{ route('downloadReviewedFile', ['filename' => $submission->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                                    @endif
                                    @if($submission->returnPaperLink2 != NULL)
                                        <a href="{{ route('downloadReviewedFile', ['filename' => $submission->returnPaperLink2]) }}" class="btn btn-primary mb-4">Download Reviewed Paper</a>
                                    @endif
                                    @if($submission->returnPaperLink == NULL && $submission->returnPaperLink2 == NULL)
                                        no file here
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Comment
                            </td>
                            <td>
                                <textarea name="commentForCorrection" id="commentForCorrection" cols="30" rows="5" required></textarea>
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
                                <textarea name="commentForCorrection" id="commentForCorrection" cols="30" rows="5" ></textarea>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" style="margin-right: 700px;" class="btn btn-primary mb-4">Submit</button>
                @endif
                </form>
                @elseif($submission->correctionPhase == 'done')
                <h5>Correction Phase is Done</h5>
                @endif 
            </div>
        </div>
    <script>
        function openPopup() {
            document.getElementById("popup").classList.add("show");
        }

        function closePopup() {
            document.getElementById("popup").classList.remove("show");
        }

        var textareas = document.querySelectorAll('[id="existingTitle"]');

        function autoResizeTextarea(textarea) {
            textarea.style.height = 'auto'; // Reset the height to auto to calculate the actual content height
            textarea.style.height = (textarea.scrollHeight + 2) + 'px'; // Set the height to the content height
        }

        textareas.forEach(function(textarea) {
            autoResizeTextarea(textarea);
            
            // Call the autoResizeTextarea function when the content changes
            textarea.addEventListener('input', function() {
                autoResizeTextarea(textarea);
            });
        });
    </script>
</body>
</html>
