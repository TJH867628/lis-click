<link rel="icon" type="image/x-icon" href="assets/favicon.ico" wfd-invisible="true">
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
        text-align: left;
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
<main class="table">
        <section class="table__header">
            <h1>Done Rewiew List</h1>
        </section>
        <section class="table__body">
            <div class="table-container">
                @if($submissionInfo)
                <table>
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
                    </tbody>
                </table>
                @endif
            </div>
        </section>
</main>