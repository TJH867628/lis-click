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
        min-height: 120vh;
        background: url("../images/tblBackground.jpg") center / cover;
        display: flex;
        justify-content: center;
    }

    main.table {
        margin-top: 10.5%;
        width: 82vw;
        height: fit-content;
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
        padding: 0.5em;
        border-collapse: collapse;
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
    </style>
    </head>
    <body>
            <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->

        <main class="table">
            <section class="table__header" style="padding:2%;">
                <h1>Paper/Poster Submission</h1>
            </section>
            
            <section class="table__body">
                <ol>
                    <li>Click 'Submission' on the Navigation Bar and select 'Register Submission'.</li>
                    <li>Submit your Paper or Poster as per the guidelines.</li>
                    <li>Your can make payment since submitted</li>
                    <li>Wait for a Reviewer to review your submission.</li>
                    <li>Make any necessary corrections based on the reviewer's feedback.</li>
                    <li>You can access to the presentation schedule after your payment approve</li>
                    <li>Present your paper or poster according to the assigned schedule and group.</li>
                    <li>Your paper will be published after the presentation.</li>
                    <li>Receive your certificate for participation and presentation.</li>
                </ol>
            </section>
        </main>

        <main class="table" style="margin-top: -2%;">
            <section class="table__header" style="padding:2%;">
                <h1>Register As Audience</h1>
            </section>
            
            <section class="table__body">
                <ol>
                    <li>Click 'Submission' on the Navigation Bar and select 'Register As Audience'.</li>
                    <li>Submit your information and payment receipt</li>
                    <li>Wait for approvement of your payment.</li>
                    <li>You can access to the presentation schedule after your payment approve</li>
                </ol>
            </section>
        </main>
    <script>
        const buttons = document.querySelectorAll('#button');

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                button.classList.add('active');
            });
        });
    </script>
    </body>
</html>