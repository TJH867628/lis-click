<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            /* Set the font family and size */
            body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            }

            /* Set the background color */
            body {
            background-color: #f2f2f2;
            }

            /* Style the search container */
            .search-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
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

            /* Style the table */
            table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10%;
            }

            /* Style the table headings */
            th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: left;
            }

            /* Style the table rows */
            .payment-row {
            border-bottom: 1px solid #ddd;
            }

            /* Style the table cells */
            td {
            padding: 10px;
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
        <table>
            <th>
                Submission Details
            </th>
            <th>
                Payment Details
            </th>
            <th>
                Proof Of Payment
            </th>
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
        </table>
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