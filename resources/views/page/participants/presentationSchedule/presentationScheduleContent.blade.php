<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        table {
            margin: auto;
            margin-top: 10%;
            margin-bottom: 10%;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 10px;
            width: 10%;
            text-align: center;
            border: 1px solid #dee2e6;
        }


        th {
            background-color: #343a40;
            color: white;
        }

        form {
            color: black;
            margin: auto;
            width: 500px;
            padding: 20px;
            border: 1px solid #dee2e6;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
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
        
        .title{
            margin-top: 10%;
        }
        
        .btn, .download{
            text-align: center;
            width: max-content;
        }

        label{
            margin: 0;
            padding: 0;
            border: none;
            font-size: 16px;
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="4">
                    <h3 style="color: white; text-align:center;">Presentation Schedule</h3>
                </th>
            </tr>
            <tr>
                <th>Group</th>
                <th>Time</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            @php
                $scheduleCount = 0
            @endphp
            @foreach($schedule as $eachSchedule)
                @php
                    $scheduleCount++
                @endphp
            <tr>
                <td><label type="text" name="group">{{ $eachSchedule->presentationGroup }}</label></td>
                <td><label type="datetime-local" name="time" >{{ $eachSchedule->presentationTime }}</label></td>
                <td><label type="text" name="link" >{{ $eachSchedule->presentationLink }}</label></td>
            </tr>
            @endforeach
            @if($scheduleCount == 0)
            <tr>
                <td colspan="4" style="color: black;">The Schedule List Is Empty</td>
            </tr>
            @endif
        </tbody>
    </table>
</body>
</html>