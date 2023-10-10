<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            * {
        margin: 0;
        padding: 0;

        box-sizing: border-box;
        font-family: sans-serif;
    }

    body {
        min-height: 100vh;
        background: url("../images/tblBackground.jpg") center / cover;
        display: flex;
        justify-content: center;
    }

    main.table {
        margin-top: 3%;
        width: 87vw !important;
        height: 70vh;
        background-color: #fff5;
        backdrop-filter: blur(7px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: .8rem;
        overflow: hidden;
    }

    .table__header {
        z-index:0;
        width: 100%;
        height: 15%;
        background-color: #fff4;
        padding: 1rem 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table__header .input-group {
        width: 35%;
        height: 100%;
        background-color: #fff5;
        padding: 0 .8rem;
        border-radius: 2rem;

        display: flex;
        justify-content: center;
        align-items: center;

        transition: .2s;
    }

    .table__header .input-group:hover {
        width: 45%;
        background-color: #fff8;
        box-shadow: 0 .1rem .4rem #0002;
    }

    .table__header .input-group img {
        width: 1.2rem;
        height: 1.2rem;
    }

    .table__header .input-group input {
        width: 100%;
        padding: 0 .5rem 0 .3rem;
        background-color: transparent;
        border: none;
        outline: none;
    }

    .table__body {
        position: relative;
        width: 95%;
        background-color: #fffb;
        height: 55vh;
        margin: .3rem auto;
        border-radius: .6rem;
        margin-top: 1%;
        overflow: auto;
        overflow: overlay;
    }

    .table__body::-webkit-scrollbar{
        width: 0.5rem;
        height: 0.5rem;
    }

    .table__body::-webkit-scrollbar-thumb{
        border-radius: .5rem;
        background-color: #0004;
        visibility: hidden;
    }

    .table__body:hover::-webkit-scrollbar-thumb{ 
        visibility: visible;
    }

    table {
        width: 100%;
    }

    td img {
        width: 36px;
        height: 36px;
        margin-right: .5rem;
        border-radius: 50%;

        vertical-align: middle;
    }

    table, th, td {
        border-collapse: collapse;
        padding: 1rem;
        text-align: left;
    }

    th {
        background-color: #d5d1defe !important;
    }

    thead th {
        position: sticky;
        top: 0;
        left: 0;
        cursor: pointer;
        text-transform: capitalize;
    }

    tbody tr:nth-child(even) {
        background-color: #0000000b;
    }

    tbody tr {
        --delay: .1s;
        transition: .5s ease-in-out var(--delay), background-color 0s;
    }

    tbody tr.hide {
        opacity: 0;
        transform: translateX(100%);
    }

    tbody tr:hover {
        background-color: #fff6 !important;
    }

    tbody tr td,
    tbody tr td p,
    tbody tr td img {
        transition: .2s ease-in-out;
    }

    tbody tr.hide td,
    tbody tr.hide td p {
        padding: 0;
        font: 0 / 0 sans-serif;
        transition: .2s ease-in-out .5s;
    }

    tbody tr.hide td img {
        width: 0;
        height: 0;
        transition: .2s ease-in-out .5s;
    }
            /* Style the search container */
            .search-container {
            display: flex;
            align-items: center;
            justify-content: center;
            }

            /* Style the search input */
            #searchInput {
            padding: 10px;
            border-radius: 5px; 
            margin-right: 10px;
            flex-grow: 1;
            }

            #searchField{
                padding: 10px;
                border-radius: 5px;
                background-color: lightgrey;
                margin-right: 10px;
                flex-grow: 1;
            }

            /* Style the select dropdown */
            select {
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-right: 10px;
            flex-grow: 1;
            }

            /* Style the form input */
            input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-right: 10px;
            flex-grow: 1;
            }

            /* Style the form button */
            button {
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            }

            /* Style the payment status text */
            p[style="color: green;"],
            p[style="color: red;"],
            p[style="color: orange;"] {
            font-weight: bold;
            }

        .table__header .search-container {
            width: 35%;
            height: 100%;
            background-color: #fff5;
            padding: 0 .8rem;
            border-radius: 2rem;

            display: flex;
            justify-content: center;
            align-items: center;

            transition: .2s;
        }

        .table__header .search-container:hover {
            width: 45%;
            background-color: #fff8;
            box-shadow: 0 .1rem .4rem #0002;
        }

        .table__header .search-container img {
            width: 1.2rem;
            height: 1.2rem;
        }

        .table__header .search-container input {
            width: 100%;
            padding: 0 .5rem 0 .3rem;
            background-color: transparent;
            border: none;
            outline: none;
        }
        </style>
    </head>
    <body>
        
        <main class="table">
        <section class="table__header">
            <h1>Payment Status</h1>
        
        <div class="search-container">
            <select class="statusFilter" id="filter" onchange="filterTable()">
                <option value="all" selected>All</option>
                <option value="complete">Complete</option>
                <option value="pending">Pending</option>
                <option value="incomplete">Incomplete</option>
            </select>
            <!-- <button type="button" onclick="filterTable()"><i class="fas fa-search"></i></button> -->
        </div>
        </section>
        <section class="table__body">
        <table id="paymenttable">
            <thead>
            <tr>
                <th>
                    Submission Details
                </th>
                <th>
                    Payment Details
                </th>
                <th>
                    Proof Of Payment
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($paymentDetails as $thisPaymentDetails)
                @if(!(empty($thisPaymentDetails->paymentReceipt)))
                <tr class="payment-row">
                    <td>
                        <p> Submission Code : </p>{{$thisPaymentDetails->submissionCode}}<br>
                        <p> Participant Email : </p>{{$thisPaymentDetails->submissionInfo->participants1}}<br>
                        <p> Participant HP : </p>{{$thisPaymentDetails->participantsInfo->phoneNumber}}<br>

                    </td>
                    <td>
                        <p> Payment ID : </p>
                        {{ $thisPaymentDetails->paymentID }}<br>
                        <p> Payment Date : </p>
                        @if($thisPaymentDetails->paymentDate != null)
                        {{$thisPaymentDetails->paymentDate}}<br>
                        @else
                        unavailable
                        @endif
                        <p> Payment Status : </p>
                        @if($thisPaymentDetails->paymentStatus == 'Complete')<br>
                            <p style="color: green;" name="Complete" id="complete" class="paymentStatus">Complete</p><br>
                            <p> Confirm Payment Date : </p>{{$thisPaymentDetails->confirmPaymentDate}}<br>
                        @elseif($thisPaymentDetails->paymentStatus == 'Pending For Verification')
                            <p style="color: orange;" name="Pending" id="pending" class="paymentStatus">{{$thisPaymentDetails->paymentStatus}}</p><br>
                        @else
                            <p style="color: red;" name="Incomplete" id="incomplete" class="paymentStatus">{{$thisPaymentDetails->paymentStatus}}</p><br>
                        @endif
                        <form action="{{ route('paymentStatusControl', ['paymentID' => $thisPaymentDetails->paymentID]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="statusInput" value="">
                            <select class="statusOption" name="statusOption">
                                <option value="Complete">Complete</option>
                                <option value="Pending For Verification" selected>Pending For Verification</option>
                                <option value="Incomplete">Incomplete</option>
                            </select>
                            <input type="text" class="statusInput" id="statusInput" name="statusInput" style="display: none;">
                            <br><button style="margin-top: 1%;">Submit</button>
                        </form>
                    </td>
                    <td>
                        @if($thisPaymentDetails->proofOfPayment == 'unavailable')
                            <p style="color: red;">Payment Receipt Unavailable</p><br>
                        @else
                            <a href="{{route('downloadPaymentReceipt', $thisPaymentDetails->proofOfPayment)}}" style="text-decoration: none;"><i class="fas fa-download" style="padding: 1% ;"></i>Payment Receipt</a>
                        @endif
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        </section>
    </main>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    sc
    
    <script>
       document.addEventListener('DOMContentLoaded', function () {
        const paymentRows = document.querySelectorAll('.payment-row');

        paymentRows.forEach((paymentRow) => {
            const statusOption = paymentRow.querySelector('.statusOption');
            const statusInput = paymentRow.querySelector('.statusInput');

            statusInput.value = statusOption.value;

            statusOption.addEventListener('change', () => {
            console.log(paymentRow);
                if (statusOption.value === 'Complete' || statusOption.value === 'Pending For Verification') {
                    statusInput.value = statusOption.value;
                    statusInput.style.display = 'none';
                    statusInput.required = false;
                } else if (statusOption.value === 'Incomplete') {
                    statusInput.value = '';
                    statusInput.style.display = 'block';
                    statusInput.required = true;
                    }
                console.log(statusInput.value);

                });
            });
        });


        function filterTable() {
        var dropdown = document.getElementById("filter");
        var selectedvalue = dropdown.value;
        var table = document.getElementById("paymenttable");
        var rows = table.querySelectorAll(".payment-row");
        
        rows.forEach(function(row) {
            var payment = row.cells[1].getElementsByClassName("paymentStatus")[0];
            var paymentid= payment.id
            if(selectedvalue == "all" || paymentid == selectedvalue){
            row.style.display = "";
            }
            else {
            row.style.display = "none";
            }
        });
        }
    </script>
</html>