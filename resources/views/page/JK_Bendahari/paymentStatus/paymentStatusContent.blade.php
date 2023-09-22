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
        height: 48vh;
        margin: .3rem auto;
        border-radius: .6rem;

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
            border: 1px solid black;
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

            /* Style the search button */
            #searchButton {
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
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
        </style>
    </head>
    <body>
        
        <main class="table">
        <section class="table__header">
            <h1>Payment Status</h1>
        </section>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search...">
            <select id="searchField">
                <option value="submissionCode">Submission Code</option>
                <option value="participantsName">Participants Name</option>
                <option value="hp">HP</option>
                <option value="paymentStatus">Payment Status</option>
            </select>
            <button id="searchButton">Search</button>
        </div>
        <section class="table__body">
        <table>
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
                        <p> Payment Status : </p>
                        @if($thisPaymentDetails->paymentStatus == 'Complete')<br>
                            <p style="color: green;">Complete</p><br>
                            <p> Payment Date : </p>{{$thisPaymentDetails->paymentDate}}<br>
                            <p> Confirm Payment Date : </p>{{$thisPaymentDetails->confirmPaymentDate}}<br>
                        @elseif($thisPaymentDetails->paymentStatus == 'incomplete')
                            <p style="color: red;">Incomplete</p><br>
                        @else
                            <p style="color: orange;">{{$thisPaymentDetails->paymentStatus}}</p><br>
                            <p> Payment Date : </p>{{ $thisPaymentDetails->paymentDate }}<br>
                        @endif
                        <form action="{{ route('paymentStatusControl', ['paymentID' => $thisPaymentDetails->paymentID]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="statusInput" value="">
                            <select class="statusOption" name="statusOption">
                                <option value="Complete">Complete</option>
                                <option value="Pending For Verification" selected>Pending For Verification</option>
                                <option value="incomplete">Incomplete</option>
                            </select>
                            <input type="text" class="statusInput" id="statusInput" name="statusInput" style="display: none;">
                            <br><button>Submit</button>
                        </form>
                    </td>
                    <td>
                        <p> Payment Receipt : </p>
                        @if($thisPaymentDetails->proofOfPayment == 'unavailable')
                            <p style="color: red;">Unavailable</p><br>
                        @else
                            <a href="{{route('downloadPaymentReceipt', $thisPaymentDetails->proofOfPayment)}}">Download</a>
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
    
    <script>
       document.addEventListener('DOMContentLoaded', function () {
        const paymentRows = document.querySelectorAll('.payment-row');

        paymentRows.forEach((paymentRow) => {
            const statusOption = paymentRow.querySelector('.statusOption');
            const statusInput = paymentRow.querySelector('.statusInput');

            statusInput.value = statusOption.value;

            statusOption.addEventListener('change', () => {
                if (statusOption.value === 'Complete' || statusOption.value === 'Pending For Verification') {
                    statusInput.value = statusOption.value;
                    statusInput.style.display = 'none';
                } else if (statusOption.value === 'incomplete') {
                    statusInput.value = '';
                    statusInput.style.display = 'block';
                    }
                console.log(statusInput.value);

                });
            });
        });

        const paymentRows = document.querySelectorAll('.payment-row');
        const searchButton = document.getElementById('searchButton');

        searchButton.addEventListener('click', () => {
            const filterValue = searchInput.value.toUpperCase();
            const filterField = searchField.value;
            paymentRows.forEach(row => {
                const fieldValue = row.querySelector(`p:nth-child(${getFieldIndex(filterField)})`).textContent.toUpperCase();
                if (fieldValue.includes(filterValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        function getFieldIndex(field) {
            switch (field) {
                case 'submissionCode':
                    return 1;
                case 'participantsName':
                    return 2;
                case 'hp':
                    return 3;
                case 'paymentStatus':
                    return 5;
                default:
                    return 1;
            }
        }
    </script>
</html>