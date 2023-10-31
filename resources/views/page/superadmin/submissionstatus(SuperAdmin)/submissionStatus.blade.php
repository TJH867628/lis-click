<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Liga Ilmu Serantau</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
        @include('page.superadmin.navigationBar')
        @include('page.superadmin.submissionStatus(SuperAdmin).submissionStatusContent')

        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    <script>
    $(document).ready(function() {
        $('#submissionTable').DataTable();
    });
    </script>
</html>