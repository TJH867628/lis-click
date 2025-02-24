

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <style>
        footer {
            position:fixed !important;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    @include('page.visitor.navigationBar')
    @include('page.visitor.login.loginContent')
    @include('page.footer')
</body>
</html>