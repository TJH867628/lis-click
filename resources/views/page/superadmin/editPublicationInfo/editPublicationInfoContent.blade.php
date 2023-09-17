<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Publication Info List</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            width: 90vw;
            height: 70vh;
            background-color: #fff5;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            overflow: hidden;
            margin-bottom: 10%;
            margin-top: 5.5%;
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
            border-collapse: collapse;
            padding: 1rem;
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

        #existingTitle{
            width: 100%;
            height:fit-content;
        }

        #titleTableData{
            width: 30%;
        }

        #addButton{
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            text-align: center;
            width: 50px;
            height: 50px;
            cursor: pointer;
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

    </style>
    </head>
    <body class="d-flex flex-column h-100" style="background-color: white; text-align:center;">      
        <main class="table">
            <section class="table__header">
                <h1>PUBLICATION INFO LIST</h1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>File</th>
                            <th>Visibility To User</th>
                            <th>Update At</th>
                            <th>Submit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($publication->isNotEmpty())
                        @php
                            $count = 0;
                        @endphp
                            @foreach($publication->reverse() as $thisPublication)
                            <form method="post" action="{{ route('editExistingPublication',['id' => $thisPublication->field_id]) }}" enctype="multipart/form-data">
                            @csrf
                            @php
                                $count++
                            @endphp
                            <tr>
                                <td>{{ $count }}</td>
                                <td id="titleTableData">
                                    <textarea class="form-control"  type="text" id="existingTitle" name="title">{{ trim($thisPublication->field_details) }}</textarea>
                                </td>
                                <td>
                                    <a href="{{ route('downloadJurnal', ['filename' => $thisPublication->field_value ]) }}" target="_blank">
                                        <div id="downloadButton" class="d-flex justify-content-center align-items-center">
                                            <i class="material-icons">open_in_new</i> View Current File
                                        </div>
                                    </a>
                                <div id="chooseFile">
                                    <input type="file" id="existingFile" name="document" accept=".doc,.docx,.pdf">
                                </div>
                                </td>
                                <td style="text-align: center;">
                                    <label class="switch">
                                        <input type="checkbox" name="visibility" style="display: none;" {{ $thisPublication->field_visibility == 1 ? 'checked' : null }} > <!-- Hide the checkbox -->
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    {{ $thisPublication->updated_at }}
                                </td>
                                <td>
                                    <button>Submit Edit</button>
                                </td>
                            </tr>
                            </form>
                            @endforeach

                        @endif
                        @if($count == 0)
                        <tr>
                            <td colspan="6">The Schedule List Is Empty</td>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="6" style="text-align: center;">
                            <button onclick="openPopup()" id="addButton">
                                <div class="d-flex justify-content-center align-items-center">
                                    <i class="material-icons text-center">add</i>
                                </div>
                            </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div id="popup">
                    <div id="popup-content">
                        <h2>Upload New File <i class="material-icons" onclick="closePopup()">close</i></h2>
                        <form method="post" action="{{ route('uploadNewPublication') }}" enctype="multipart/form-data">
                            @csrf
                            <table border>
                                <tr>
                                    <td>Please Upload New File<br><p>(only accept word or pdf)</p></td>
                                    <td>
                                        <input type="file" name="document" accept=".doc,.docx,.pdf" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>
                                        <input style="margin-top: 1%;" type="text" name="title" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button>Submit Change</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
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
            </section>
        </main>
    </body>
</html>