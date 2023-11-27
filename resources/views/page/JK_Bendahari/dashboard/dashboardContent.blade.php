<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
    * {
        margin: 0;
        padding: 0;

        box-sizing: border-box;
        font-family: sans-serif;
    }

    .navbar{
        position:sticky;
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
        overflow:scroll;
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
            border: 1px solid black;
            background-color: white;
            margin-right: 10px;
            flex-grow: 0.5;
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

        .total-amount-container {
            background-color: white;
            border-radius: 5px;
            width:fit-content;
            margin: auto;
            padding : 0.5%;
            text-align: center;
        }

        .total-amount-value {
            font-size: 24px;
            font-weight: bold;
            color: green; /* Change the color to your preference */
        }

        .card-body{
            background-color: #d3d3d3;
        }
    </style>
</head>
<body>
<main class="table">
    <div class="container">
        <section class="table_header">
            <h1>Bendahari Dashboard</h1>
        </section>
            <div class="search-container">
                <select id="yearFilter">
                    <option value="">All Years</option>
                    @foreach($uniqueYears as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
                <div class="total-amount-container" style="background-color:white;">
                    Total Amount: <span id="totalAmount" class="total-amount-value">0.00</span>
                </div>
                <div class="total-amount-container" style="background-color:white;">
                    Total Submission: <span id="totalSubmission" class="total-amount-value">
                    @if(isset($totalSubmission))
                        {{ $totalSubmission }}
                    @else
                        No Submission
                    @endif
                </span>
                </div>
            </div>
        <section class="row table_body">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Payment Details By Themes in MYR (Ringgit Malaysia)
                    </div>
                    <div class="card-body">
                        <canvas id="paymentChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Payment Breakdown By Category in MYR (Ringgit Malaysia)
                    </div>
                    <div class="card-body">
                        <canvas id="paymentBreakdownChart" width="500" height="300"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    var dataByYear = @json($dataByYear);

    // Get the canvas elements for charts
    var ctx = document.getElementById('paymentChart').getContext('2d');
    var pieChartCtx = document.getElementById('paymentBreakdownChart').getContext('2d');

    // Initialize chart instances
    var paymentChart = null;
    var paymentBreakdownChart = null;

    var types = @json($type);

    var data = Object.values(types);

    // Function to update the charts based on the selected year
    function updateCharts(selectedYear) {
        if(selectedYear == ''){
            // Show data for all years if selectedYear is empty
        dataForSelectedYear = {
            amountEachCategory: {
                'amountENG': 0, // Initialize category amounts to 0
                'amountSSC': 0,
                'amountITC': 0,
                'amountEHE': 0,
                'amountTVT': 0,
                'amountREE': 0,
                'amountCOM': 0,
                'amountMDC': 0,
                'amountOTH': 0,
                'amountAUD': 0,
            },
            totalAmount: 0, // Initialize total amount to 0
        };

        // Iterate through each year's data and aggregate it
        Object.values(dataByYear).forEach((yearData) => {
            Object.keys(dataForSelectedYear.amountEachCategory).forEach((category) => {
                dataForSelectedYear.amountEachCategory[category] += yearData.amountEachCategory[category];
            });
            dataForSelectedYear.totalAmount += yearData.totalAmount;
        });
        }else{
            var dataForSelectedYear = dataByYear[selectedYear];
        }
        // Update charts with data for the selected year
        var categoryLabels = Object.keys(dataForSelectedYear.amountEachCategory).map(function(label) {
            return label.substr(6, label.length);
        });
        var categoryAmounts = Object.values(dataForSelectedYear.amountEachCategory);

        // Destroy the existing chart instances
        if (paymentChart) {
            paymentChart.destroy();
        }

        if (paymentBreakdownChart) {
            paymentBreakdownChart.destroy();
        }

        // Create a new paymentChart (Bar Chart)
        paymentChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: categoryLabels,
                datasets: [{
                    label: 'Payment Amount',
                    data: categoryAmounts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)', // Red
                        'rgba(255, 205, 86, 0.7)', // Yellow
                        'rgba(75, 192, 192, 0.7)', // Teal
                        'rgba(54, 162, 235, 0.7)', // Blue
                        'rgba(153, 102, 255, 0.7)', // Purple
                        'rgba(255, 159, 64, 0.7)', // Orange
                        'rgba(128, 0, 0, 0.7)', // Maroon
                        'rgba(0, 128, 128, 0.7)', // Teal
                        'rgba(34, 139, 34, 0.7)', // Green
                        'rgba(0, 0, 0, 0.7)'    
                    ],
                    borderColor: [
                        'rgba(200, 0, 0, 0.7)', // Darker Red
                        'rgba(200, 150, 0, 0.7)', // Darker Yellow
                        'rgba(0, 150, 150, 0.7)', // Darker Teal
                        'rgba(0, 100, 200, 0.7)', // Darker Blue
                        'rgba(100, 0, 200, 0.7)', // Darker Purple
                        'rgba(200, 100, 0, 0.7)', // Darker Orange
                        'rgba(100, 0, 0, 0.7)', // Darker Maroon
                        'rgba(0, 100, 100, 0.7)', // Darker Teal
                        'rgba(0, 100, 0, 0.7)', // Darker Green
                        'rgba(0, 0, 0, 0.7)'    
                    ],
                    borderWidth: 1,
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });

        

        // Create a new paymentBreakdownChart (Pie Chart)
        paymentBreakdownChart = new Chart(pieChartCtx, {
            type: 'pie',
            data: {
                labels: ['Paper Presentation & Publication','Paper Presentation ONLY','Poster Presentation ONLY','Publication ONLY','Student Presenter','Audience'],
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgba(200, 0, 0, 0.7)', // Darker Red
                        'rgba(200, 150, 0, 0.7)', // Darker Yellow
                        'rgba(0, 150, 150, 0.7)', // Darker Teal
                        'rgba(0, 100, 200, 0.7)', // Darker Blue
                        'rgba(100, 0, 200, 0.7)', // Darker Purple
                        'rgba(200, 100, 0, 0.7)'
                    ],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            },
        });

        // Update the total amount in the HTML element
        document.getElementById('totalAmount').textContent = 'RM' + dataForSelectedYear.totalAmount.toFixed(2);
    }

    // Add an event listener to the Apply button
    $("#yearFilter").change(function () {
        var selectedYear = $("#yearFilter").val();
        updateCharts(selectedYear);
    });

    // Initially update charts with data for all years
    updateCharts('');
</script>
</body>
</html>
