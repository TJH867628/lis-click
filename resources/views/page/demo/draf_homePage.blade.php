<?php
    session_start();
    if(isset($_POST['signOut'])){
        session_destroy();
        header("Location :mainPage.php");
    }
?>


<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
        <div>
            <h1>Welcome to LIS system</h1>
        </div>
        <div>
            <form action="homePage" method="post">  
                @csrf
                <button type="submit" name="signOut">Sign Out</button>
            </form>
        </div>
        <div>
            <p>homepage paragraph</p>
        </div>
    </body>
</html>