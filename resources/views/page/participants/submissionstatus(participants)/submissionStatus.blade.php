<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Submission Status</title>
        <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        table {
            margin: auto;
            margin-top: 5%;
            margin-bottom: 10%;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        form {
            color: black;
            margin: auto;
            margin-top: 50px;
            margin-bottom: 30px;
            width: 500px;
            padding: 20px;
            border: 1px solid #dee2e6;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 7px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .deleteButton {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        button:hover {
            background-color: #0069d9;
        }
        
        .title{
            margin-top: 10%;
        }

        footer {
            position:fixed !important;
            bottom: 0;
            width: 100%;
        }
    </style>
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
        @include('page.participants.navigationBar')
        <br><br><br><br><br>
        @include('page.participants.submissionstatus(participants).submissionStatusContent')
        </main>
        @include('page.footer')

        <!-- Bootstrap core JS-->
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
    // Declare variables
    var input, filter, table, tr, submissionCodeDiv, i, txtValue, foundMatch;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("submissionTable");
    tr = table.getElementsByTagName("tr");
    foundMatch = false;

    // Loop through all table rows and hide those that don't match the search query
    for (i = 1; i < tr.length; i++) { // Start from 1 to skip the table header row
        submissionCodeDiv = tr[i].querySelector(".submissionCode"); // Find the div with class "submissionCode" within the row
        if (submissionCodeDiv) {
            txtValue = submissionCodeDiv.textContent || submissionCodeDiv.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                foundMatch = true;
1            } else {
                tr[i].style.display = "none";
            }
        }
    }
    var noRecordMessage = table.querySelector('.noRecord');

// Check if no matches were found and display a "No record" message
if (!foundMatch) {
    if (!noRecordMessage) {
            var noRecordMessage = document.createElement('p');
            noRecordMessage.className = 'noRecord'
            noRecordMessage.textContent = 'No records found';
            noRecordMessage.style.textAlign = 'center';
            noRecordMessage.style.fontWeight = 'bold';
            noRecordMessage.style.color = 'black';
            table.appendChild(noRecordMessage);
        }

} else {
  // Remove the "No record" message if it was previously displayed
  if (noRecordMessage) {
    noRecordMessage.remove();
  }
}
    }

    $(document).ready(function() {
        $count = 0;
        button = $('#showPaymentMethod');
        button.click(function showPopup() {
        // Create a new window
        var popup = window.open("", "Payment QR", "width=800,height=700");
       if($count == 0){ 
        popup.document.write("<head><title>Payment</title></head>");
        // Add styles
        popup.document.write("<style>");
        popup.document.write("body { font-family: Arial, sans-serif; text-align: center; background-color: #f2f2f2; }");
        popup.document.write("h1 { color: #333; font-size: 24px; margin-top: -20px; }");
        popup.document.write("img { height: 250px; width: 250px; margin: 0px auto; display: block; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); }");
        popup.document.write("label { color: #555; font-size: 18px; margin-top: 10px; display: block; }");
        popup.document.write("</style>");
        

        // Add content
        popup.document.write("<body>");
        popup.document.write(String.raw`@if(empty($paymentQR))<h1>Payment QR is not available, please contact customer service</h1>@else @if($paymentQR->masterdata_value != NULL) <img src='{{ asset('paymentQR/'.$paymentQR->masterdata_value) }}'><br> @endif @if($paymentQR->masterdata_details != NULL)<textarea column="20" row="10" style="width:100%; height:50%;" readonly>{{ $paymentQR->masterdata_details }}</textarea><br>@endif @if($paymentQR->masterdata_value == NULL && $paymentQR->masterdata_details == NULL) Payment QR is not available, please contact customer service @endif @endif`);        
        popup.document.write("@if(empty($paymentQR->masterdata_value))@else <label style='color: red; font-weight: bold;'>Please save your receipt for upload</label>@endif");
        popup.document.write("</body>");

        // Center the window on the screen
        popup.moveTo((screen.width - popup.outerWidth) / 2, (screen.height - popup.outerHeight) / 2);
        $count++;
    }
        });
    });
    </script>
</html>