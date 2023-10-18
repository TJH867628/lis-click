<!DOCTYPE html>
<html>
<head>
        <link rel="icon" type="image/x-icon" href="/images/Logo_Title.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
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
        margin-top: 10%;
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

    textarea {
        height: auto;
    }

    .deleteButton {
        background-color: red;
        color: white;
        padding: 7px 25px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .deleteButton:hover {
        background-color: #c0392b;
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

        h5 {
        font-size: 24px;
        margin-bottom: 10px;
        }

        label {
        font-size: 18px;
        margin-top: 10px;
        }

        input[type="text"],
        textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        input[type="datetime-local"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

</style>
</head>
<body>
    <main class="table">
        <section class="table__header">
            <h1>Schedule List</h1>
            <button onclick="openPopup()" id="addButton">
            <div class="d-flex justify-content-center align-items-center">
                <i class="material-icons text-center">add</i>
            </div>
        </button>
        </section>
        <section class="table__body">
            <div class="table-container">
            <table id="scheduleTable" class="display">
            <thead>
                <tr>
                    <th>
                        Group<br>
                    </th>
                    <th>
                        Time<br>
                    </th>
                    <th>
                        Link<br>
                    </th>
                    <th>
                        Edit<br>
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $scheduleCount = 0
                @endphp
                @foreach($schedule as $eachSchedule)
                    @php
                        $scheduleCount++;
                        $hasGroup = 0;
                    @endphp
                    @foreach($eachSchedule->submission as $submission)
                        @if($submission->presentationGroup == $eachSchedule->presentationGroup)
                            @php
                                $hasGroup++;
                            @endphp
                        @endif
                    @endforeach
                <tr>
                    <form method="post" action="{{ route('editSchedule',['currentGroup'=>$eachSchedule->presentationGroup]) }}" enctype="multipart/form-data">
                        @csrf
                        <td><textarea name="group" type="text">{{ $eachSchedule->presentationGroup }}</textarea></td>
                        <td><input type="datetime-local" name="time" value="{{ $eachSchedule->presentationTime }}"></td>
                        <td><textarea name="link" type="text">{{ $eachSchedule->presentationLink }}</textarea></td>
                        <td>
                            <button type="submit"><i class="fas fa-save" style="padding: 5px;"></i>Save</button>
                            
                            @if ($hasGroup != 0)
                            <button class="deleteButton" type="button"><a href="{{ route('deleteSchedule',['group'=>$eachSchedule->presentationGroup]) }}" onclick="return showSecondConfirm(<?php echo $hasGroup ?>)" style="text-decoration: none; color: #fff;"><i class="fas fa-trash-alt" style="padding: 5px;"></i> Delete</a></button>
                            @else
                            <button class="deleteButton" type="button"><a href="{{ route('deleteSchedule',['group'=>$eachSchedule->presentationGroup]) }}" onclick="return confirm('Are you sure you want to delete this schedule?')" style="text-decoration: none; color: #fff;"><i class="fas fa-trash-alt" style="padding: 5px;"></i> Delete</a></button>
                            @endif
                        </td>
                        <script>
                            function showSecondConfirm($hasGroup) {
                                if (confirm('There are ' +  $hasGroup + ' Submission assigned in this group. Are you sure you want to delete?')) {
                                    return alert('The group has been deleted,please assigned back for those submissions');
                                }
                                return false; // User canceled the first confirmation
                            }
                        </script>
                    </form>
                </tr>
                @endforeach
                @if($scheduleCount == 0)
                <tr>
                    <td colspan="4" style="color: black;">The Schedule List Is Empty</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</section>  
</main>
<div id="popup">
    <div id="popup-content">
        <h2>Correction<i class="material-icons" onclick="closePopup()">close</i></h2>
        <form method="post" action="{{ route('newSchedule') }}" enctype="multipart/form-data">
            <h5 for="group">Add New Presentation Shchedule</h5>
            @csrf
            <label for="group">Group:</label>
            <input type="text" name="group" id="group" required>

            <label for="time">Time:</label>
            <input type="datetime-local" name="time" id="time" required>

            <label for="link">Link/Location:</label>
            <textarea name="link" id="link" rows="5" required></textarea>

            <button type="submit">Add Schedule</button>
        </form>
    </div>
</div>

    <script>
        $(document).ready(function() {
            $('#scheduleTable').DataTable();
        });

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