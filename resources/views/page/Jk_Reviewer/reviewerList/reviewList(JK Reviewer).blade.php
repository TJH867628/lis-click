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
    </head>
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
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            @include('page.Jk_Reviewer.navigationBar')
            <br><br><br><br><br>
            @include('page.Jk_Reviewer.reviewerList.reviewlistContent')
            <br><br><br><br><br><br>
            @include('page.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
        </main>
    </body>
    <script>
    function filterTable() {
        var input = document.getElementById("searchInput");
        var filter = input.value.toLowerCase();

        var table = document.querySelector(".table-container table");
        var rows = table.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) {
        var submissionCode = rows[i].getElementsByTagName("td")[0].textContent || rows[i].getElementsByTagName("td")[0].innerText;
        submissionCode = submissionCode.toLowerCase();

        if (submissionCode.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
        }
    }

        function rearrangeTable() {
        var table = document.getElementById("submissionTable");
        var rows = Array.from(table.getElementsByTagName("tr"));
        var headerRow = rows.shift(); // Remove the header row

        rows.sort(function(a, b) {
        var aStatus = a.cells[4].innerText.toLowerCase();
        var bStatus = b.cells[4].innerText.toLowerCase();

        if (aStatus === "none") {
            return -1;
        } else if (bStatus === "none") {
            return 1;
        } else if (aStatus === "pending") {
            return bStatus === "none" ? 1 : -1;
        } else if (aStatus === "done") {
            return bStatus === "none" || bStatus === "pending" ? 1 : -1;
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
    </script>
</html>