
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--CSS-->
    <link href="css/superAdmin.css" rel="stylesheet"/>
    <!--END CSS-->
    <title>Dashboard</title>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="images/Logo1 (1).png">
                </span>

            <!--   <div class="text header-text">
                    <span class="name">LIGA ILMU SERANTAU</span>
                    <span class="profession">2023</span>
                </div>--> 
            </div>
            
            <i class="bi bi-arrow-right-circle-fill toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class="bi bi-search icon"></i>
                    <input type="text" placeholder="Search...">
                </li>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class="bi bi-house-door-fill icon"></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bi bi-envelope-fill icon"></i>
                            <span class="text nav-text">Conference</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bi bi-archive-fill icon"></i>
                            <span class="text nav-text">Publication</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bi bi-kanban-fill icon"></i>
                            <span class="text nav-text">Management</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bi bi-back icon"></i>
                            <span class="text nav-text">Registration</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class="bi bi-door-open-fill icon"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="moon-sun">
                        <i class="bi bi-moon-fill moon icon"></i>
                        <i class="bi bi-sun-fill sun icon"></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>
<!--
    <div class="home">
        <div class="title">
            <h1>DASHBOARD</h1>

            <section class="container">
                <header class="box1">
                    <h2>BANNER</h2>
                    <div class="upload-sect">
                        <input type="file" id="file-upload" name="file-upload" style="margin-top: 45px;">
                    </div>
                </header>
            </section>
        </div>
    </div>-->
    
    <!--JAVASCRIPT-->
    <script src="js/script.js"></script>
</body>
</html>