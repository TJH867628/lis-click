<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Super Admin Page</title>
        <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/homepage_style.css" rel="stylesheet" />
        <style>
            tr td{
                padding: 10px;
                margin: 10px;
                border: 1px solid black;
            }
            
            
            table{
                margin-top: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            table th{
                text-align: center;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }
        </style>
    </head>
    <body class="d-flex flex-column h-100">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="superAdminHomePage">Liga Ilmu Serantau</a>
                <h1 style="color:aqua; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Super Admin</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="superAdminHomePage">Home</a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="registerAdmin">Admin Registration</a></li>
                                <li><a class="dropdown-item" href="adminList">Admin List</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
        <main>
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
                    <td>{{ $admin->status }}</td>
                    <td>{{ $admin->adminRole }}</td>
                    <td>{{ $admin->IC_No }}</td>
                    <td>{{ $admin->created_at }}</td>
                    <td>{{ $admin->updated_at }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
    <!-- Bootstrap core JS-->
    <script>
       function filterTable(columnIndex, inputText) {
            var table = document.querySelector("table");
            var rows = table.getElementsByTagName("tr");
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var cell = row.getElementsByTagName("td")[columnIndex];
                if (cell) {
                    var cellText = cell.textContent.toLowerCase() || cell.innerText.toLowerCase();
                    if (cellText.indexOf(inputText.toLowerCase()) > -1) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                }
            }
        }
    </script>