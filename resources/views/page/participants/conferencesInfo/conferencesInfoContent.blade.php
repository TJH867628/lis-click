<link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet">
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
        justify-content: center;
        height: fit-content;
    }

    .table-container{
        display: flex;
    }

    main.table {
        width: 82vw;
        height: fit-content;
        background-color: #fff5;
        backdrop-filter: blur(7px);
        box-shadow: 0 .4rem .8rem #0005;
        border-radius: .8rem;
        overflow: hidden;
        font-weight: bold;
        font-size: large;
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
        z-index: 1;
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
        float: right;
        margin-right: 50px;
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
        display: flex;
        justify-content: center;
        align-items: center;
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

    .progress-wrapper {
        position: absolute;
        width: 100px;
        height: 100px;
        transform: scale(0);
        transition: .7s;
        transition-delay: .5s;
    }

    #button.active .progress-wrapper {
        transform: scale(.6);
    }

    .progress-wrapper .inner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        background: #fff;
        border-radius: 50%;
        z-index: 2;
        transition: 1s ease;
        transition-delay: 4s;
    }

    #button.active .progress-wrapper .inner {
        transform: translate(-50%, -50%) scale(0);
    }

    .progress-wrapper .bar {
        position: absolute;
        width: 100%;
        height: 100%;
        background: #ededed;
        border-radius: 50%;
        clip: rect(0px, 100px, 100px, 50px);
    }

    .circle .bar .progress {
        position: absolute;
        width: 100%;
        height: 100%;
        background: #0d6efd;
        border-radius: 50%;
        z-index: 1;
        clip: rect(0px, 50px, 100px, 0px);
    }

    .circle .bar.left .progress{
        transition: 1.5s linear;
        transition-delay: 1s;
    }

    #button.active .circle .bar.left .progress {
        transform: rotate(180deg);
    }

    .circle .right {
        right: -2%;
        transform: rotate(180deg);
    }

    .circle .bar.right .progress{
        transition: 1.5s linear;
        transition-delay: 2.5s;
    }

    #button.active .circle .bar.right .progress {
        transform: rotate(180deg);
    }

    .progress-wrapper .checkmark {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        z-index: 2;
    }

    .checkmark span {
        position: absolute;
        display: block;
        width: 30px;
        height: 7px;
        background: #fff;
        border-radius: 5px;
        transform-origin: left;
        transition: .5s;
    }

    .checkmark span:first-child {
        top: 45px;
        left: 22px;
        width: 30px;
        transform: rotate(45deg) scaleX(0);
        transition-delay: 5s;
    }

    #button.active .checkmark span:first-child {
        transform: rotate(45deg) scaleX(1);
    }

    .checkmark span:last-child {
        top: 65px;
        left: 40px;
        width: 50px;
        transform: rotate(-45deg) scaleX(0);
        transition-delay: 5.5s;
    }

    #button.active .checkmark span:last-child {
        transform: rotate(-45deg) scaleX(1);
    }

    #button.active .inner{
        background-color: #0d6efd;
    }
    </style>
    <div class="table-container">
        <div style="width:50%">
            <main class="table" style="margin-top: 20%; width:fit-content;">
            <section class="table__header">
                <h1>Conference Fees</h1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> No</th>
                            <th> List of Jurnal</th>
                            <th> Fees</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Presentation &amp; Publication</td>
                        <td>RM 300 / USD 70</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Poster / Paper Presentation</td>
                        <td>RM 250 / USD 60</td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>Publication Only</td>
                        <td>RM 250 / USD 60</td>
                    </tr>
                    <tr>
                        <td scope="row">4</td>
                        <td>Participant / Audience</td>
                        <td>RM 250 / USD 60</td>
                    </tr>
                    <tr>
                        <td scope="row">5</td>
                        <td>Student Presenter</td>
                        <td>RM 250 / USD 60</td>
                    </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <div style="width:50%">
        <main class="table" style="margin-top: 20%; width:fit-content;">
            <section class="table__header">
                <h1>Important Dates</h1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> No</th>
                            <th> Title</th>
                            <th> Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Registration &amp; Abstract Submission</td>
                            <td>12 Mac - 30 April 2023</td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Full Paper Submission Deadline</td>
                            <td>15 June 2023</td>
                        </tr>
                        <tr>
                            <td scope="row">3</td>
                            <td>Acceptance of Payment Deadline</td>
                            <td>6 July 2023</td>
                        </tr>
                        <tr>
                            <td scope="row">4</td>
                            <td>Conference Date</td>
                            <td>8 August 2023</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</div>
<main style="margin-top:2%;" class="table">
    <div class="fs-4 fw-bold mb-4 fst-italic" style="text-align:center;"><span>Don't Miss These Amazing Opportunities &amp; The Conference!</span></div>
</main>
<br><br><br><br><br><br>

