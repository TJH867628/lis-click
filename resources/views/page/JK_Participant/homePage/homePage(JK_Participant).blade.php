<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIS-CLICK Home Page</title>
        <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
</head>
<body>
    @include('page.JK_Participant.navigationBar')
    <br><br><br><br><br>
    @include('page.JK_Participant.homePage(JK_Participant).homePageContent')
    @include('page.footer')
</body>


</html>