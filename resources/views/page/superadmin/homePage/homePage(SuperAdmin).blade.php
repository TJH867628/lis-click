<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="icon" type="image/x-icon" href="/images/Logo_Title.png" />
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    @include('page.superadmin.navigationBar')
    @include('page.superadmin.homePage.homePageContent(SuperAdmin)')
    @include('page.footer')
</body>
</html>