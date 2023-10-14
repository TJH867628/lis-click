    <link rel="icon" type="image/x-icon" href="/images/Logo_Title.png" />

<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" wfd-invisible="true">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" wfd-invisible="true">
<style>
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
        margin-bottom: 10vh;
        width: 87vw !important;
        height: 60vh;
        background-color: #fff5;
        backdrop-filter: blur(7px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: .8rem;
        overflow: hidden;
    }

    table th{
        text-align: center;
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
        text-align: center;
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
        width: 98%;
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
        text-align: center;
    }

    th {
        background-color: #d5d1defe !important;
    }

    thead th {
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
        
        form {
            color: black;
            margin: auto;
            margin-bottom: 10px;
            width: 400px;
            padding: 20px;
            border: 1px solid #dee2e6;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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
</style>
<main class="table">
        <section class="table__header">
            <h1>Done Review List</h1>
        </section>
        <section class="table__body">
            <div class="table-container">
                @php
                    $count = 0;
                @endphp
            <table id="reviewTable" class="display">
            <thead>
                <tr>
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
                    </tr>
                </thead>
                    <tbody>
                @if($submissionInfo)
                        @foreach($submissionInfo as $submissionInfo)
                            @if($submissionInfo->reviewer2ID)
                                @if($submissionInfo->reviewerID === $reviewername)
                                    @if($submissionInfo->evaluationFormLink)
                                        @php
                                            $count++;
                                        @endphp
                                        <tr>
                                            <td>{{ $submissionInfo->submissionCode }}</td>
                                            <td>{{ $submissionInfo->submissionTitle }}</td>
                                            <td>{{ $submissionInfo->submissionType }}</td>
                                            <td>{{ $submissionInfo->subTheme }}</td>
                                            <td>{{ $submissionInfo->presentMode }}</td>
                                            <td>
                                            @if($submissionInfo->returnPaperLink)
                                                <a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink]) }}" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Reviewed Paper</a>
                                            @else
                                                <form action="{{ route('uploadReviewSubmission',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="file" />
                                                    <button type="submit"><i class="fas fa-cloud-upload-alt" style="padding: 5px;"></i>Upload Reviewed Paper</button>
                                                </form>
                                            @endif
                                            <a href="{{ route('downloadEvaluationForm', ['filename' => $submissionInfo->evaluationFormLink]) }}" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Evaluation Form</a></td>
                                        </tr>
                                    @endif
                                @elseif($submissionInfo->reviewer2ID === $reviewername)
                                    @if($submissionInfo->evaluationFormLink2)
                                    @php
                                        $count++;
                                    @endphp
                                    <tr>
                                        <td>{{ $submissionInfo->submissionCode }}</td>
                                        <td>{{ $submissionInfo->submissionTitle }}</td>
                                        <td>{{ $submissionInfo->submissionType }}</td>
                                        <td>{{ $submissionInfo->subTheme }}</td>
                                        <td>{{ $submissionInfo->presentMode }}</td>
                                        <td>
                                        @if($submissionInfo->returnPaperLink2)
                                        <a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink2]) }}" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Reviewed Paper</a>
                                        @else
                                        <form action="{{ route('uploadReviewSubmission',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file" />
                                                <button type="submit"><i class="fas fa-cloud-upload-alt" style="padding: 5px;"></i>Upload Reviewed Paper</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('downloadEvaluationForm', ['filename' => $submissionInfo->evaluationFormLink2]) }}" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Evaluation Form</a></td>
                                    </tr>
                                    @endif
                                @endif
                            @else
                               @if($submissionInfo->reviewerID === $reviewername)
                                    @if($submissionInfo->evaluationFormLink)
                                    @php
                                            $count++;
                                        @endphp
                                        <tr>
                                            <td>{{ $submissionInfo->submissionCode }}</td>
                                            <td>{{ $submissionInfo->submissionTitle }}</td>
                                            <td>{{ $submissionInfo->submissionType }}</td>
                                            <td>{{ $submissionInfo->subTheme }}</td>
                                            <td>{{ $submissionInfo->presentMode }}</td>
                                            <td>
                                            @if($submissionInfo->returnPaperLink)
                                                <a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink]) }}" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Reviewed Paper</a>
                                            @else
                                                <form action="{{ route('uploadReviewSubmission',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="file" />
                                                    <button type="submit"><i class="fas fa-cloud-upload-alt" style="padding: 5px;"></i>Upload Reviewed Paper</button>
                                                </form>
                                            @endif
                                            <a href="{{ route('downloadEvaluationForm', ['filename' => $submissionInfo->evaluationFormLink]) }}" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Evaluation Form</a></td>
                                        </tr>
                                    @endif
                                @endif
                            </tr>
                            @endif
                        @endforeach
                @endif
                @if($count==0)
                    <tr>
                        <td colspan="9">No record found.</td>
                    </tr>
                @endif
                </tbody>
            </table>
            </div>
        </section>  
</main>