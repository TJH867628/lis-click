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
        <style>
            body{
                background-color: white;
                text-align: center;
                color:black;    
            }

            .error{
                color: white;
                background-color: red;
            }
        </style>
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light">
                <div class="container px-5">
                    <a class="navbar-brand" href="/homePage">
                        <img src="images/Logo1 (1).png" width="200px" alt="logoLIS2023" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/superAdminHomePage">Home</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                                <ul class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="/adminList">Admin List</a></li>
                                    <li><a class="dropdown-item" href="/adminRegister">Register New Admin</a></li>
                                </ul>
                                </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Registration</a>
                                    <ul class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdownBlog">
                                        <li><a class="dropdown-item" href="/submissionStatus">Submission Status</a></li>
                                    </ul>
                                </li>
                            <li class="nav-item"><a class="nav-link" href="/account">My Profile</a></li>
                            <a href="/logout" class="btn btn-primary">Logout</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>

            <form  action="registerAdmin" method="post" style>
                @csrf
                <label for="role" class="role">Role</label><br>
                <select name="role" id="role">
                    @foreach($adminRole as $role)
                        <option value="{{$role->roletype}}">{{$role->roletype}}</option>
                    @endforeach
                </select>

                <br><label for="email" class="">Email</label><br>
                <input type="text" name="email" id="email" class="register" placeholder="Email Address" required><br>
                @if($message = Session::get('error'))
                    <span class="error">{{ $message }}</span><br>
                @endif

                <label for="name" class="register">Full Name</label><br>
                <input type="text" name="name" id="name" class="register" placeholder="Name" required><br>

                <label for="IC_No" class="register">Idenfication Number / Passport</label><br>
                <input type="text" name="IC_No" id="IC_No" class="register" placeholder="Enter Idenfication Number / Passport" required><br>

                <label for="phoneNumber" class="register">Phone Number</label><br>
                <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number"><br>
            
                <label for="title" class="register">Title</label><br>
                <input type="text" name="title" id="title" placeholder="Dr./Mr/Mrs"><br>
                
                <label for="country">Country</label><br>
                <select name="country" id="country">
                    <option value="Malaysia">Malaysia</option>
                    <option value="Indonesia">Indonesia</option>
                </select><br>



                <label for="address" class="register">Address</label><br>
                <textarea name="address" id="address" cols="30" rows="10" placeholder="Address"></textarea><br>

                <label for="postcode">Post Code</label><br>
                <input type="text" name="postcode" id="postcode" placeholder="Post Code"><br>

                <label for="password" class="register">Password</label><br>
                <input type="password" name="password" id="password" class="register" placeholder="Password" required><br><br>
                
                <button type="submit" class="register" name="signUp">Sign Up</button>
            </form>

            <br><br><br><br><br><br>

            <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">© 2023 LIGA ILMU SERANTAU 2023. All Rights Reserved. Design by Politeknik Mersing</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="FeFaq.html">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
        </main>
    </body>
</html>