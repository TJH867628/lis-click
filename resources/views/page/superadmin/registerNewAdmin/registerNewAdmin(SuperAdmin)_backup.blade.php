<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page List</title>    
        <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        form{
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body>
    @include('page.superadmin.navigationBar')
    @include('page.superadmin.registerNewAdmin.registerNewAdminContent')
    @include('page.footer')
</body>

</html>