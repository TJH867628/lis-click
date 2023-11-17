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
        height: 43vh;
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

        label{
            margin-top: 8px;
            font-size: 18px;
            font-weight: bold;
            margin-right: 10px;
        }

        .form-group{
            display: flex;
            justify-content: space-between;
            margin-right: 420px;
            margin-top: 10px;
            
        }

        .insert{
            width: 300px;
        }

        button{
            margin-left: 20px;
            margin-bottom: 10px;
        }

        
        </style>
    </head>
    <body>
        
        <main class="table">
        <section class="table__header">
            <h1>JK Spend</h1>
        </section>
        <div class="search-container">
            <form action="{{ route('submit-spend') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="item">Item :</label>
                    <input type="text" name="item" id="item" class="insert" placeholder="Item" required>
                    <label for="amount">Amount :</label>
                    <input type="number" name="amount" id="amount" class="insert" placeholder="Amount" required>
                    <button type="submit" class="btn btn-primary" name="insert">Submit</button>
                </div>
            </form>
        </div>
        <section class="table__body">
        <table id="paymenttable">
            <thead>
            <tr>
                <th>
                    Item
                </th>
                <th>
                    Amount
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @if(isset($spend))
                @foreach($spend as $spend)
                <tr>
                    <td>
                        {{ $spend->item }}
                    </td>
                    <td>
                        RM {{ $spend->amount }}
                    </td>
                    <td>
                    <form action="{{ route('delete-item', $spend->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="text-align: left;">Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        </section>
    </main>
    </body>
</html>