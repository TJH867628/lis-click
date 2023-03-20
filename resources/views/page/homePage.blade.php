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
            <form action="homePage.php" method="post">  
                <a href="mainPage.php"><button type="button" name="signOut">Sign Out</button></a>
            </form>
        </div>
        <div>
            <p>homepage paragraph</p>
        </div>
    </body>
</html>