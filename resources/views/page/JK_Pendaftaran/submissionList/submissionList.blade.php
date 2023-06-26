<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIS-CLICK Home Page</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <style>
        table{
            text-align: center;
            color: black;
            margin: auto;
            background-color: aquamarine;
        }
        table td,table th{
            border: 1px solid black;
        }
        body {
            background-color: white;
        }
    </style>
</head>
<body style="background-color:white;">;
    @include('page.JK_Pendaftaran.navigationBar')
    <br><br><br><br><br>
    <br><br><br><br><br>
    @include('page.JK_Pendaftaran.submissionList.submissionListContent')
    @include('page.footer')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>