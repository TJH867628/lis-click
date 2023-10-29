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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-+Zvz5lJQ+3WjJzJ0l9yvz5vJQJ6Q9Z6l5zvzL2vZ9U5ZvJW8JQJzv5zJZ7zZzJ4zZJZVJ1zJ5QJzZvzJZJZvzLw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="/path/to/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            @include('page.JK_Bendahari.navigationBar')
            @include('page.JK_Bendahari.paymentQR.paymentQRContent')
            @include('page.footer')
        </main>
        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>
