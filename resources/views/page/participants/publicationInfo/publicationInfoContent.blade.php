<html>
    <head>
    <style>
    * {
        margin: 0;
        padding: 0;

        box-sizing: border-box;
        font-family: sans-serif;
    }

    body {
        margin-top: 5%;
        min-height: 80%;
        background: url("../images/sunsetBackground.jpg") center / cover;
        display: flex;
        justify-content: center;
    }

    main.table {
        margin-top: 3%;
        width: 82vw;
        height: 80vh;
        background-color: #fff5;
        backdrop-filter: blur(7px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: .8rem;
        overflow: hidden;
    }

    .table__header {
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
        width: 95%;
        max-height: calc(84% - 1.6rem);
        background-color: #fffb;

        margin: .8rem auto;
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

    thead th {
        position: sticky;
        top: 0;
        left: 0;
        background-color: #d5d1defe;
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

    .status {
        padding: .4rem 0;
        border-radius: 2rem;
        text-align: center;
    }

    .status.delivered {
        background-color: #86e49d;
        color: #006b21;
    }

    .status.cancelled {
        background-color: #d893a3;
        color: #b30021;
    }

    .status.pending {
        background-color: #ebc474;
    }

    .status.shipped {
        background-color: #6fcaea;
    }


    @media (max-width: 1000px) {
        td:not(:first-of-type) {
            min-width: 12.1rem;
        }
    }

    thead th span.icon-arrow {
        display: inline-block;
        width: 1.3rem;
        height: 1.3rem;
        border-radius: 50%;
        border: 1.4px solid transparent;
        
        text-align: center;
        font-size: 1rem;
        
        margin-left: .5rem;
        transition: .2s ease-in-out;
    }

    thead th:hover span.icon-arrow{
        border: 1.4px solid #6c00bd;
    }

    thead th:hover {
        color: #6c00bd;
    }

    thead th.active span.icon-arrow{
        background-color: #6c00bd;
        color: #fff;
    }

    thead th.asc span.icon-arrow{
        transform: rotate(180deg);
    }

    thead th.active,tbody td.active {
        color: #6c00bd;
    }

    #button{
        width: 170px;
        height: 50px;
        background: #0d6efd;
        border-radius: 40px;
        color: #fff;
        font-size: 16px;
        border: none;
        outline: none;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        cursor: pointer;
        transition: .7s ease-in-out;
    }

    #button i {
        margin-right: 7px;
    }

    #button.active {
        font-size: 0;
        width: 50px;
        background: #ededed;
    }

    .progress-wrapper{
        position: absolute;
        width: 100px;
        height: 100px;
        background: yellowgreen;
    }

    .progress-wrapper .inner{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        background: #fff;
        border-radius: 50%;
    }

    .progress-wrapper .bar {
        position: absolute;
        width: 100%;
        height: 100%;
        background: #ededed;
        border-radius: 50%;
        clip: rect(0px, 100px, 100px, 50px)
    }

    .circle .bar .progress {
        position: absolute;
        width: 100%;
        height: 100%;
        background: #7d2ae8;
        clip: rect(0px, 50px, 100px, 0px);
    }

    </style>
    </head>
    <body>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->

        <main class="table">
        <section class="table__header">
            <h1>E-Jurnal</h1>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No</th>
                        <th> List of Jurnal</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <th scope="row">1</th>
                <td>EDISI KHAS LIGA ILMU SERANTAU 2022</td>
                <td>
                <a href="{{ route('downloadJurnal', ['filename' => 'Edisi Khas LIS22.pdf']) }}"><button id="button"><i class="fa-solid fa-download"></i>Download
                        <div class="progress-wrapper">
                            <div class="inner">
                                <div class="circle">
                                    <div class="bar-left">

                                        <div class="progress">
                                        <div class="bar-right">

                                        <div class="progress">
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button></a>
                </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>E-Jurnal LiS2021 : Empowering Research in The Pandemic Phase: Oppurtunies and Challenges</td>
                    <td>
                    <a href="{{ route('downloadJurnal', ['filename' => 'Published LIS 2021 ISBN_eISSN.pdf']) }}"><button id="button"><i class="fa-solid fa-download"></i>Download</button></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>E-Jurnal LiS2019 : Enriching The Creativity of Research and Innovation Towards The Industrial Revolution of IR4.0</td>
                    <td>
                    <a href="{{ route('downloadJurnal', ['filename' => 'JILID 1 E-JURNAL LIS2019.pdf']) }}"><button id="button"><i class="fa-solid fa-download"></i>Download</button></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>E-Jurnal LiS2018: Implementation of Competitive Research Toward Local Resources Based Industrialization </td>
                    <td>
                    <a href="{{ route('downloadJurnal', ['filename' => 'Prosiding_LIS_e-_Jurnal_LIS_Liga_Ilmu_Serantau_2018.pdf']) }}"><button id="button"><i class="fa-solid fa-download"></i>Download</button></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>E-Jurnal LiS2017: Mewacanakan Kebitaraan Ilmu</td>
                    <td>
                    <a href="{{ route('downloadJurnal', ['filename' => 'LIS2017.pdf']) }}"><button id="button"><i class="fa-solid fa-download"></i>Download</button></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>E-Jurnal LiS2016: Kelestarian Pendidikan Tanpa Sempadan</td>
                    <td>
                    <a href="{{ route('downloadJurnal', ['filename' => 'LIS 2016 Kota Batam.pdf']) }}"><button id="button"><i class="fa-solid fa-download"></i>Download</button></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>LIS2015: Kelestarian Pendidikan Tanpa Sempadan</td>
                    <td>
                    <a href="{{ route('downloadJurnal', ['filename' => 'LIS2015.pdf']) }}"><button id="button"><i class="fa-solid fa-download"></i>Download
                <div class="progress-wrapper">
                    <div class="inner">
                        <div class="circle">
                            <div class="bar-left">

                                <div class="progress">
                                <div class="bar-right">

                                <div class="progress">
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </button></a>
                    </td>                                    
                </tr>
                </tbody>
            </table>
        </section>
    </main>
    <script>
            const button = document.querySelector('#button');

            if (button) {
            button.addEventListener('click', () => {
                button.classList.add('active');
            });
            } else {
            console.error('Button element not found.');
            }

        </script>
    </body>
</html>