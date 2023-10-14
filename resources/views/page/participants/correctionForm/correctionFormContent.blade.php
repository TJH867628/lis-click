<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Form</title>
    <link href="css/styles.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    </style>
</head>
<body>
@if(isset($latestCorrection) && $latestCorrection->returnCorrectionLink == null)
    <div style="background-color: #fff9ae; color: black; padding: 10px; margin-top:11%;">
        <strong>Correction Pending:</strong> You have a correction pending to upload. Please upload the corrected file as soon as possible.
    </div>
@else
<div style=" margin-top:11%;"></div>
@endif
<main class="table">
        <section class="table__header">
            <h1>Correction</h1>
        </section>
        @php
            $count = 0;
        @endphp
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>
                            TImes Of Correction
                        </th>
                        <th>
                        Submission Code
                        </th>
                        <th>
                            Comment
                        </th>
                        <th>
                            Correction Time
                        </th>
                        <th>
                            Correction
                        </th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($correction))
                    @foreach($correction->reverse() as $correction)
                        @if($correction->numberOfTimes != $latestCorrection->numberOfTimes)
                            @php
                                $count++;
                            @endphp
                            <tr>
                                <td scope="row" style="text-align:center;"><h5 style="font-weight: bold;"># {{ $correction->numberOfTimes }}</h5></td>
                                <td>
                                    {{ $correction->submissionCode }}
                                </td> 
                                <td>"{{ $correction->commentForCorrection }}"</td>        
                                <td>{{ $correction->created_at }}</td>   
                                <td>
                                <a href="{{ route('downloadReturnCorrection', ['filename' => $correction->returnCorrectionLink]) }}" target="_blank"><button id="button"><i class="fa-solid fa-download"></i>Download
                                    <div class="progress-wrapper">
                                        <div class="inner"></div>
                                            <div class="checkmark">
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="circle">
                                                <div class="bar left">
                                                    <div class="progress"></div>
                                                </div>
                                                <div class="bar right">
                                                    <div class="progress"></div>
                                                </div>                  
                                            </div>            
                                        </div>
                                    </button></a>
                                </td>
                            </tr>
                        @elseif(isset($latestCorrection) && $latestCorrection->returnCorrectionLink == NULL)
                            <tr style="background-color:#fff9ae;" onmouseover="this.style.backgroundColor= '#fff9ae'">
                                <td scope="row" style="text-align:center;"><h5 style="font-weight: bold;"># {{ $correction->numberOfTimes }}</h5></td>
                                <td>
                                    {{ $latestCorrection->submissionCode }}
                                </td> 
                                <td>"{{ $latestCorrection->commentForCorrection }}"</td>        
                                <td>Pending For Correction</td>   
                                <td>
                                    <form action="{{ route('uploadFileWithCorrection',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="choose-file">
                                            <div style="display: flex; align-items: center; margin-top:3%;">
                                                <label class="btn btn-primary" style="font-size:medium; padding:2%; width:60%;">
                                                    Choose File
                                                    <input type="file" name="file" accept=".pdf , .doc , .docx" style="display: none;">
                                                </label>
                                                <span class="file-name" style="font-style: italic; font-size:small; padding:0; margin-top:2%;">No File Selected</span>
                                            </div>
                                        </div>
                                        <button type="submit" id="submitButton" title="Upload File With Correction">
                                            <i class="material-icons">cloud_upload</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @else
                        <tr>
                            <td scope="row" style="text-align:center;"><h5 style="font-weight: bold;"># {{ $correction->numberOfTimes }}</h5></td>
                            <td>
                                <p>Submission Code</p>
                                {{ $correction->submissionCode }}   
                            </td> 
                            <td>"{{ $correction->commentForCorrection }}"</td>        
                            <td>{{ $correction->created_at }}</td>   
                            <td>
                            @if($correction->returnCorrectionLink != NULL)
                                <a href="{{ route('downloadReturnCorrection', ['filename' => $correction->returnCorrectionLink]) }}" target="_blank"><button id="button"><i class="fa-solid fa-download"></i>Download
                                    <div class="progress-wrapper">
                                        <div class="inner"></div>
                                            <div class="checkmark">
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="circle">
                                                <div class="bar left">
                                                    <div class="progress"></div>
                                                </div>
                                                <div class="bar right">
                                                    <div class="progress"></div>
                                                </div>                  
                                            </div>            
                                        </div>
                                    </button>
                                </a>
                            @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>
            </table>
        </section>
    </main>
</body>
<script>
        const buttons = document.querySelectorAll('#button');

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                button.classList.add('active');
            });
        });

        const chooseFiles = document.querySelectorAll('.choose-file');

        chooseFiles.forEach(function(chooseFile) {
            const imageUpload = chooseFile.querySelector('input[type="file"]');
            const fileName = chooseFile.querySelector('.file-name');

            imageUpload.addEventListener('change', function() {
                const files = this.files;
                let fileNames = '';

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    reader.addEventListener('load', function() {
                        const previewImage = document.createElement('img');
                        previewImage.src = reader.result;
                    });

                    reader.readAsDataURL(file);

                    fileNames += file.name + ', ';
                }

                fileNames = fileNames.slice(0, -2);
                fileName.textContent = fileNames;
            });
        });
    </script>
</html>
