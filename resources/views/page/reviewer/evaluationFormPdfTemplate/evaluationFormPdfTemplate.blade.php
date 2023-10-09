<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Liga Ilmu Serantau</title>
        <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="/images/Logo_Title.png" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        
    </head>
    <body class="d-flex flex-column h-100" style="background-color: white; color:black;">
        @include('page.reviewer.navigationBar')
        <br><br><br><br><br>
        @include('page.reviewer.evaluationFormPdfTemplate.evaluationFormPdfTemplateContent')
        <br><br><br><br><br>
        </main>
        @include('page.footer')
        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->

    </body>
</html>
