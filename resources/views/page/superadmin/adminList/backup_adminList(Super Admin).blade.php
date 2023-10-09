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
        <style>
            .success{
                color: white;
                background-color: blue;
            }

            tr td{
                padding: 10px;
                margin: 10px;
                border: 1px solid black;
                color: black;
                overflow-x: auto;
                background-color: aliceblue;
            }
            
            .table-container{
                border: 2px solid black;
                padding: 20px;
                width: 90%;
                margin: auto;
                overflow-x: auto;
                overflow-wrap: break-word;
                align-items: center;
                justify-content: center;
                text-align: center;
            }
            
            table{
                margin-top: 50px;
                overflow-x: auto;
                overflow-wrap: break-word;
                align-items: center;
                justify-content: center;
                text-align: center;
            }

            table th{
                text-align: center;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                color: black;
                background-color:aquamarine;
                border: 1px solid black;
            }

            body{
                background-color: white;
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
            
            <div class="table-container">
                <h2 style="color: black ;">Admin List</h2>
                @if($message = Session::get('updateSuccess'))
                    <span class="success">{{ $message }}</span>
                @endif
                @if($admin)
                <table>
                <tr>
                    <th>
                        Email<br>
                        <input type="text" onchange="filterTable(0, this.value)" placeholder="Search Email">
                    </th>
                    <th>
                        Name<br>
                        <input type="text" onchange="filterTable(1, this.value)" placeholder="Search Name">
                    </th>
                    <th>
                        Phone Number<br>
                        <input type="text" onchange="filterTable(2, this.value)" placeholder="Search Phone Number">
                    </th>
                    <th>
                        Status<br>
                        <input type="text" onchange="filterTable(3, this.value)" placeholder="Search Status">
                    </th>
                    <th>
                        Role<br>
                        <input type="text" onchange="filterTable(4, this.value)" placeholder="Search Role">
                    </th>
                    <th>
                        Ic No<br>
                        <input type="text" onchange="filterTable(5, this.value)" placeholder="Search IC No">
                    </th>
                    <th>
                        Created At<br>
                        <input type="text" onchange="filterTable(6, this.value)" placeholder="Search Created At">
                    </th>
                    <th>
                        Updated At<br>
                        <input type="text" onchange="filterTable(7, this.value)" placeholder="Search Updated At">
                    </th>
                </tr>
                @foreach($admin as $admin)
                <tr>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->phoneNumber }}</td>
                    @if($admin->status === 0)
                        <td>Deactived</td>

                    @elseif($admin->status === 1)
                        <td>Active</td>
                    @endif
                    <td>{{ $admin->adminRole }}</td>
                    <td>{{ $admin->IC_No }}</td>
                    <td>{{ $admin->created_at }}</td>
                    <td>{{ $admin->updated_at }}</td>
                    @if($admin->status === 0)
                    <td><a href="{{ route('activeAdmin', ['adminEmail' => $admin->email]) }}" class="btn btn-primary mb-4">Active Admin</a></td>
                    @elseif($admin->status === 1)
                        @if($admin->adminRole === "Super")
                            <td><a href="#" class="btn btn-primary mb-4" style="background-color:gray; pointer-events: none;" >Deactive Admin</a></td>
                        @else{
                            <td><a href="{{ route('deactiveAdmin', ['adminEmail' => $admin->email]) }}" class="btn btn-primary mb-4">Deactive Admin</a></td>
                            
                        }
                        @endif
                    @endif
                </tr>
                @endforeach

            </table>
                    @else
                        <p style="color: black;">No record found.</p>
                    @endif
            </div>
                
            <br><br><br><br><br><br>
        </main>

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
    </body>
</html>