<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .navbar{
        position:sticky !important;
    }
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

        .total-amount-container {
            background-color: white;
            border-radius: 5px;
            width:fit-content;
            margin: auto;
            padding : 0.5%;
            text-align: center;
            margin-top: 20px;
        }

        .total-amount-value {
            font-size: 24px;
            font-weight: bold;
            color: #007BFF; /* Change the color to your preference */
        }

        .card-body{
            background-color: white;
        }
        </style>
    </head>
<body>
    <main class="table">
        <div class="container">
            <section class="table_header">
                <h1>Bendahari Dashboard</h1>
            </section>
            <section class="row table_body">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Payment Details in RM(Ringgit Malaysia) 
                        </div>
                        <div class="card-body">
                            <canvas id="paymentChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Add a div for the pie chart -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Payment Breakdown in RM(Ringgit Malaysia)
                        </div>
                        <div class="card-body">
                            <canvas id="paymentBreakdownChart" width="500" height="300"></canvas>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    <!-- Add a div for displaying the total -->
    <div class="total-amount-container">
        Total Amount: <span id="totalAmount" class="total-amount-value">0.00</span>
    </div>
    <br>
    </main>
    <script>
            var amountEachCategory = @json($amountEachCategory);

            // Extract the category labels and corresponding amounts
            var categoryLabels = Object.keys(amountEachCategory);

            // Remove "amount" from each label
            categoryLabels = categoryLabels.map(category => category.substring(6));

            // Extract the corresponding amounts
            var categoryAmounts = categoryLabels.map(category => amountEachCategory[`amount${category}`]);

            // Calculate the total amount
            var totalAmount = categoryAmounts.reduce((total, amount) => total + amount, 0);

            // JavaScript code for rendering the bar chart
            var ctx = document.getElementById('paymentChart').getContext('2d');
            var paymentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: categoryLabels, // X-axis labels as category names
                    datasets: [{
                        label: 'Payment Amount',
                        data: categoryAmounts, // Y-axis data for each category
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // JavaScript code for rendering the pie chart
            var pieChartCtx = document.getElementById('paymentBreakdownChart').getContext('2d');
            var pieChartData = categoryAmounts; // Exclude the total amount
            var pieChartLabels = categoryLabels; // Exclude "Total" label

            var paymentBreakdownChart = new Chart(pieChartCtx, {
                type: 'pie',
                data: {
                    labels: pieChartLabels,
                    datasets: [{
                        data: pieChartData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)',
                            'rgba(0, 0, 139, 0.7)', 
                        ]
                    }]
                },
                options: {
                    responsive: true, // Allows resizing to fit the container
                    maintainAspectRatio: false, // Allows custom aspect ratio
                }
            });

            // Set the total amount in the HTML element
            document.getElementById('totalAmount').textContent = 'RM' + totalAmount.toFixed(2);
        </script>
</body>
</html>