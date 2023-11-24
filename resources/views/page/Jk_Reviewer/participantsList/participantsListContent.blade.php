<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
<!-- Bootstrap icons-->

<!-- Core theme CSS (includes Bootstrap)-->
<style>
    * {
        margin: 0;
        padding: 0;

        box-sizing: border-box;
        font-family: sans-serif;
    }

    body {
        min-height: 125%;
        background: url("../images/tblBackground.jpg") center / cover;
        display: flex;
        justify-content: center;
    }

    main.table {
        margin-top: 2%;
        width: 90% !important;
        height: 70%;
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
        width: 100%;
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

    th {
        background-color: #d5d1defe !important;
    }

    thead tr th {
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

    .detailsBox{
        margin: auto;
        margin-top: 50px;
        margin-bottom: 30px;
        width: 170px;
        border: 1px solid #dee2e6;
        padding: 2%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    form {
        color: black;
        margin: auto;
        margin-top: 50px;
        margin-bottom: 30px;
        width: 170px;
        padding-bottom: 150px;
        padding-top: 10px;
        border: 1px solid #dee2e6;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .formturnin{
        width: 190px;
        height: 180px;
    }

    input[type="text"]{
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;
        width: 300px;
        margin-top: 15px;
        margin-right: 75%;
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
    
    .title {
        margin-top: 10%;
        text-align: center;
    }

    .title h2 {
        font-size: 36px;
        font-weight: bold;
        color: #007bff;
    }

    .file-upload-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
    }

    .file-upload-label {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 200px;
        height: 50px;
        background-color: #007bff;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .file-upload-label:hover {
        background-color: #0062cc;
    }

    .file-upload-label span {
        margin-right: 10px;
    }

    #file-upload {
        display: none;
    }

    .file-upload-button {
        margin-top: 10px;
        padding: 10px 20px;
        background-color: lightgray;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .file-upload-button:hover {
        background-color: grey;
    }

    select {
        margin: 10px;
        padding: 3px;
    }

    .btnreview{
        margin-top: 20px;
    }

    .downloadturnin{
        margin-left: 9px;
    }

    .uploadturnin{
        padding: 10px;
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

    .btn{
        float: left;
    }

    </style>
</head>
<body>
    <main class="table">
        <section class="table__header">
            <h1>Participants List</h1>
        </section>
        <section class="table__body">
            <table id="userTable" class="display">
                <thead>
                    <tr>
                        <th>
                            Salutation<br>
                        </th>
                        <th>
                            Name<br>
                        </th>
                        <th>
                            Email<br>
                        </th>
                        <!-- <th>
                            Idenfication Number / Passport<br>
                        </th> -->
                        <th>
                            PhoneNumber<br>
                        </th>
                        <th>
                            Organization<br>
                        </th>
                        <th>
                            Date Of Register<br>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($participants))
                        @foreach($participants as $participants)
                        <tr>
                            <td>{{ $participants->salutation }}</td>
                            <td>{{ $participants->name }}</td>
                            <td>{{ $participants->email }}</td>
                            <!-- <td>{{ $participants->IC_No }}</td> -->
                            <td>{{ $participants->phoneNumber }}</td>
                            <td> 
                              <label style="font-size: 15px; font-weight:bold;">Organization Name :</label>
                              {{ $participants->organizationName }}<br><br>
                              <label style="font-size: 15px; font-weight:bold;" for="">Organization Address :</label>
                              {{ $participants->organizationAddress }}<br><br>
                              <label style="font-size: 15px; font-weight:bold;" for="">Postcode :</label>
                              {{ $participants->postcode }}<br><br>
                              <label style="font-size: 15px; font-weight:bold;" for="">Country :</label>
                              {{ $participants->country }}
                            </td>
                            <td>{{ $participants->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        @endforeach
                        @else
                      <tr style="color: black;">
                        <td colspan="8">
                          No record found.
                        </td>
                      </tr>
                    @endif
                </tbody>
            </table>
        </section>
    </main>
    </body>
    <script>
         const chooseFiles = document.querySelectorAll('.choose-file');

    chooseFiles.forEach(function(chooseFile) {
        const imageUpload = chooseFile.querySelector('input[type="file"]');
        const fileName = chooseFile.querySelector('.file-name');
        const previewImage = chooseFile.querySelector('.preview-image');

        imageUpload.addEventListener('change', function() {
            const files = this.files;
            let fileNames = '';

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    previewImage.src = reader.result;
                    previewImage.style.display = "block";
                });

                reader.readAsDataURL(file);

                fileNames += file.name + ', ';
            }

            fileNames = fileNames.slice(0, -2);
            fileName.textContent = fileNames;
        });
    });

    $(document).ready(function() {
        $('#userTable').DataTable({
            search: {
                smart: false  // Disables smart search, enforcing exact match searches
            }
        });
    });


    </script>

</html>