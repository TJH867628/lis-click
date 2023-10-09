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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            @include('page.Jk_Reviewer.navigationBar')
            <br><br><br><br><br>
            @include('page.Jk_Reviewer.reviewerList.reviewListContent')
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>