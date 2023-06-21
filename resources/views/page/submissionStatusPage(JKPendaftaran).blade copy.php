
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Liga Ilmu Serantau</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            tr td{
                padding: 10px;
                margin: 10px;
                border: 1px solid black;
                color: black;
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
                margin: auto;
                overflow-x: auto;
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

            #searchInput{
                margin: 10px;
                width: 250px;
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
                            <li class="nav-item"><a class="nav-link" href="/homePage">Home</a></li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conference</a>
                            <ul class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdownBlog">      
                                <li><a class="dropdown-item" href="/conferencesInfo">Conference Info</a></li>
                                <li><a class="dropdown-item" href="/conferencesDownload">Downloads</a></li>
                            </ul>
                            <li class="nav-item"><a class="nav-link" href="/publicationInfo">Publication</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Submission</a>
                                    <ul class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdownBlog">
                                        <li><a class="dropdown-item" href="/registerSubmission">Register Submission</a></li>
                                        <li><a class="dropdown-item" href="/submissionStatus">Submission Status</a></li>
                                    </ul>
                            <li class="nav-item"><a class="nav-link" href="/faq">Contact Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="/account">My Profile</a></li>
                            <a href="/logout" class="btn btn-primary">Logout</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
            <br><br><br>    
            <div class="table-container">
                @if($userSubmissionInfo)
                <input type="text" id="searchInput" placeholder="Search by Submission Code" onkeyup="filterTable()" />
                <table id="submissionTable" border>
                <tr>
                    <th>
                        Submission Details<br>
                    </th>
                    <th>
                        Submission Type<br>
                    </th>
                    <th>
                        Theme<br>
                    </th>
                    <th>
                        Present Mode<br>
                    </th>
                    <th>
                        Participants<br>
                    </th>
                    <th>
                        Payment Status
                    </th>
                    <th>
                        Review Status<br>
                    </th>
                    <th>
                        Reviewer<br>
                    </th>
                    <th>    
                        Download<br>

                    </th>
                    <th>
                        Review Paper<br>
                    </th>
                </tr>
                    @foreach($userSubmissionInfo as $submissionInfo)
                        <tr>
                            <td>{{ $submissionInfo->submissionCode }}</td>
                            <td>{{ $submissionInfo->submissionType }}</td>
                            <td>{{ $submissionInfo->subTheme }}</td>
                            <td>{{ $submissionInfo->presentMode }}</td>
                            <td style="overflow-wrap:normal;">
                                    <p>Participants 1 :</p> {{ $submissionInfo->participants1 }}<br>
                                @if($submissionInfo->participants2)
                                    <p>Participants 2 :</p> {{ $submissionInfo->participants2 }}<br>
                                @else
                                    <p>Participants 2 :</p> No Record<br>
                                
                                @endif
                                @if($submissionInfo->participants3)
                                    <p>Participants 3 :</p> {{ $submissionInfo->participants3 }}
                                @else
                                    <p>Participants 3 :</p> No Record<br>
                                @endif

                            </td>
                            <td>
                                @if($paymentInfo->paymentStatus === "Complete")
                                    Complete
                                    <p>Payment ID : </p>
                                    {{ $submissionInfo->paymentStatus }}
                                @elseif($paymentInfo->paymentStatus === "Pending For Verification")
                                    Pending For Verification
                                    <p>Payment ID:</p>
                                    {{ $paymentInfo->paymentStatus }}
                                @else
                                    Incomplete
                                    <form action="{{ route('uploadReceipt', ['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" />
                                    <button type="submit">Upload</button>
                                </form>
                                @endif
                            </td> 
                            <td>{{ $submissionInfo->reviewStatus }}</td>
                            <td>
                                <p>Reviewer</p>
                                <h5>{{ $submissionInfo->reviewerID }} </h5>
                                @if($submissionInfo->reviewer2ID != NULL)
                                    <p>Reviewer 2</p>
                                    <h5>{{ $submissionInfo->reviewer2ID }} </h5>
                                @endif
                            </td>
                            <td><a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" class="btn btn-primary mb-4">Download</a></td>
                            @if($submissionInfo->returnPaperLink == NULL)
                                <td><a href="#" class="btn btn-primary mb-4" style="color: gray; pointer-events: none; ">Pending Review</a></td>
                            @else
                                <td><a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink]) }}" class="btn btn-primary mb-4">Download Return File</a></td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <p style="color: black;">No submission found for the user.</p>
                @endif
                
            </table>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
    <script>
    function rearrangeTable() {
        var table = document.getElementById("submissionTable");
        var rows = Array.from(table.getElementsByTagName("tr"));
        var headerRow = rows.shift(); // Remove the header row

        rows.sort(function(a, b) {
        var aStatus = a.cells[5].innerText.toLowerCase();
        var bStatus = b.cells[5].innerText.toLowerCase();

        if (aStatus === "none") {
            return 1;
        } else if (bStatus === "none") {
            return -1;
        } else if (aStatus === "pending") {
            return bStatus === "none" ? -1 : 1;
        } else if (aStatus === "done") {
            return bStatus === "none" || bStatus === "pending" ? -1 : 1;
        }




        return 0;
        });

        // Reinsert the header row
        table.appendChild(headerRow);

        // Reorder the rows in the table
        for (var i = 0; i < rows.length; i++) {
        table.appendChild(rows[i]);
        }
    }

    // Call the sorting function when the page loads
    window.addEventListener("load", function() {
        rearrangeTable();
    });

    function filterTable() {
    // Get input value and convert it to lowercase
    var input = document.getElementById("searchInput");
    var filter = input.value.toLowerCase();
    
    // Get the table and table rows
    var table = document.getElementById("submissionTable");
    var rows = table.getElementsByTagName("tr");
    
    // Loop through all rows, starting from index 1 to skip the table header
    for (var i = 1; i < rows.length; i++) {
      var submissionCode = rows[i].getElementsByTagName("td")[0].textContent || rows[i].getElementsByTagName("td")[0].innerText;
      submissionCode = submissionCode.toLowerCase();
      
      // If the submission code matches the filter, display the row; otherwise, hide it
      if (submissionCode.indexOf(filter) > -1) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  }
    </script>
</html>