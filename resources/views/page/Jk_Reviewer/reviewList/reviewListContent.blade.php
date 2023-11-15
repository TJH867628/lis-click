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
        width: 97vw !important;
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

    </style>
</head>
<body>
    <main class="table">
        <section class="table__header">
            <h1>Review List</h1>
        </section>
        <section class="table__body">
            <table id="submissionTable" class="display">
            <thead>
                    <tr>
                        <th>
                            Submission Details<br>
                        </th>
                        <th>
                            Reviewer Info <br>
                        </th>
                        <th>
                            Change Reviewer<br>
                        </th>
                        <th>    
                            Document<br>
                        </th>
                        <th>    
                            View Evaluation Form<br>
                        </th>
                        <th>    
                            Turn In Report<br>
                        </th>
                        <th>
                            Correction
                        </th>
                        <th>
                            Certificate
                        </th>
                    </tr>
                </thead>
                <tbody>
                @if($userSubmissionInfo)
                    @foreach($userSubmissionInfo as $submissionInfo)
                        @php
                            // Convert the submission's updated_at timestamp to a Carbon instance
                            $submissionTimestamp = \Carbon\Carbon::parse($submissionInfo->updated_at);

                            // Calculate the difference in days between the current date and the updated_at timestamp
                            $daysRemaining = now()->diffInDays($submissionTimestamp);

                            // Calculate the number of days remaining for one week (7 days)
                            $daysRemainingForOneWeek = 7 - $daysRemaining;
                            if($daysRemainingForOneWeek < 0)
                                $daysRemainingForOneWeek = 0
                            
                        @endphp
                        <tr>
                            <td>
                                <p>Submission Code</p>
                                <a style="font-size:20px; font-weight:bold; color:black;  text-decoration:none;" href="#" class="submission-code" data-submission-code="{{$submissionInfo->submissionCode}}" data-submission-type="{{$submissionInfo->submissionType}}" data-submission-title="{{$submissionInfo->submissionTitle}}" data-submission-type="{{$submissionInfo->submissionTitle}}" data-sub-theme="{{$submissionInfo->subTheme}}" data-present-mode="{{$submissionInfo->presentMode}}">
                                    <div class="submissionCode">
                                        <i class="fa-solid fa-circle-info"></i>
                                        {{$submissionInfo->submissionCode}}
                                    </div>
                                </a>
                                <br><p>Participants</p>
                                {{$submissionInfo->participants1}}<br>
                                {{$submissionInfo->participants2}}<br>
                                {{$submissionInfo->participants3}}<br>
                            </td>
                            <td>
                                <p>Reviewer</p>
                                <h5>{{ $submissionInfo->reviewerID }} </h5>
                                @if($submissionInfo->reviewer2ID != NULL)
                                    <p>Reviewer 2</p>
                                    <h5>{{ $submissionInfo->reviewer2ID }} </h5>
                                @endif
                                <br><p>Review Status</p>
                                {{ $submissionInfo->reviewStatus }}
                                <br><p>Updated Time</p>
                                {{ date("Y-m-d", strtotime($submissionInfo->updated_at)) }}<br><br>
                                {{(int) $daysRemainingForOneWeek }} Days Remaining For Review
                            </td>             
                            <td>
                            @if( $submissionInfo->cleanedDocument != null)
                            <form action="{{ route('updateReviewer', ['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" onsubmit="return confirm('Are you sure you want to update the reviewer?');">
                                @csrf
                                <select name="reviewer" id="reviewer" style="width: -webkit-fill-available;">
                                    @foreach($allReviewerInfo as $reviewerInfo)
                                        <option value="{{ $reviewerInfo->email }}">{{ $reviewerInfo->email }}</option>
                                    @endforeach
                                </select>
                                <select name="reviewer2" id="reviewer2" style="width: -webkit-fill-available;">
                                    <option value="None">None</option>
                                    @foreach($allReviewerInfo as $reviewerInfo)
                                        <option value="{{ $reviewerInfo->email }}">{{ $reviewerInfo->email }}</option>
                                    @endforeach
                                </select>
                                <div class=btnreview>
                                    <button type="submit" class="btn btn-primary mb-4" style="margin-right: -1%;"><i class="fas fa-sync-alt" style="padding: 5px;"></i>Update Reviewer</button>

                                    <a href="{{ route('cancelReviewer', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4" style="margin-right: 1%; background-color: rgb(255, 102, 102);" onclick="return confirm('Are you sure you want to cancel the reviewer?');"><i class="fas fa-times" style="padding: 5px;"></i>Cancel Reviewer</a>
                                </div>
                            </form>
                            @else
                            <p class="detailsBox">Please upload Cleaned Document Before Assign Reviewer</p>
                            @endif
                            </td>
                            <td>
                                <p>Original File</p>
                                <a href="{{ route('downloadSubmission', ['filename' => $submissionInfo->file_name]) }}" target="_blank" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Orginal File</a>
                                <p>Reviewed File</p>
                                @if($submissionInfo->returnPaperLink == NULL)
                                    <p class="status cancelled">Return Paper Unavailable</p>
                                @else
                                    <a href="{{ route('downloadReviewedFile', ['filename' => $submissionInfo->returnPaperLink]) }}" target="_blank" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Return File</a>
                                @endif
                                <p>Cleaned File</p>
                                @if( $submissionInfo->cleanedDocument == null)
                                <label for="">Unavailable</label>
                                <form method="post" action="{{ route('uploadCleanedDocument',['submissionCode' => $submissionInfo->submissionCode]) }}" style="margin-top:2%;" class="detailsBox" enctype="multipart/form-data">
                                    @csrf
                                    <label>Choose File To Upload</label>
                                    <div class="choose-file">                            
                                        <div style="display: flex; align-items: center; margin-top:3%;">
                                            <label class="btn btn-primary" style="font-size:medium; padding:2%; width:20%; margin-left:5%;">
                                                <i class="fa-solid fa-file-import"></i>
                                                <input type="file" id="turnInReport" accept="application/pdf" name="file" style="display: none;">
                                            </label>
                                            <span class="file-name" id="turnInReport-file-name" style="font-style: italic; color: #999; font-size:small; padding:0; margin-top:2%;">No File Selected</span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-4"><i class="fas fa-cloud-upload-alt" style="padding: 5px;"></i></i>Submit</button>
                                </form>
                                @else
                                <a href="{{ route('downloadCleanedDocument', ['filename' => $submissionInfo->cleanedDocument]) }}" target="_blank" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Cleaned Document</a>
                                @endif
                            </td>

                            <td>
                            @if(empty($submissionInfo->dataEvaluationForm->paper_id_number))
                                <p class="status shipped">Pending</p>
                            @else
                                @if($submissionInfo->dataEvaluationForm->paper_id_number == $submissionInfo->submissionCode)
                                    <a href="{{ route('evaluationForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4" style="float:left; background-color: #4CAF50;"><i class="fas fa-calculator" style="padding: 5px;"></i>Evaluate Form</a><br>
                                @endif
                                @if($submissionInfo->evaluationFormLink != NULL)
                                    <a href="{{ route('downloadEvaluationForm', ['filename' => $submissionInfo->evaluationFormLink]) }}" target="_blank" class="btn btn-primary mb-4" style="float:left; background-color: #4CAF50;"><i class="fa-solid fa-download" style="padding: 5px;"></i>Evaluate Form(Reviewer 1)</a><br>
                                @else
                                    <label style="padding:1%;" class="status cancelled"><strong>Reviewer 1</strong>'s Evaluation Form haven't submitted </label><br>
                                @endif
                                @if($submissionInfo->reviewer2ID != null)
                                    @if($submissionInfo->evaluationFormLink2 != NULL)
                                        <a href="{{ route('downloadEvaluationForm', ['filename' => $submissionInfo->evaluationFormLink2]) }}" target="_blank" class="btn btn-primary mb-4" style="float:left; background-color: #4CAF50;"><i class="fa-solid fa-download" style="padding: 5px;"></i>Evaluate Form(Reviewer 2)</a><br>
                                    @else
                                        <label style="padding:1%;" class="status cancelled"><strong>Reviewer 2</strong>'s Evaluation Form haven't submitted</label><br>
                                    @endif
                                @endif
                            @endif
                            </td>
                            <td>
                                @if($submissionInfo->turnInReport)
                                <div class="downloadturnin">
                                    <a href="{{ route('downloadTurnInReport', ['filename' => $submissionInfo->turnInReport]) }}" target="_blank" class="btn btn-primary mb-4"><i class="fa-solid fa-download" style="padding: 5px;"></i>Download Turn In Report</a>
                                </div>
                                @endif
                                <form action="{{ route('uploadTurnInReport',['submissionCode' => $submissionInfo->submissionCode]) }}" method="POST" enctype="multipart/form-data" class="formturnin">
                                    @csrf
                                    <br>            
                                    <div class="choose-file">                            
                                        <div style="display: flex; align-items: center; margin-top:3%;">
                                            <label class="btn btn-primary" style="font-size:medium; padding:2%; width:20%; margin-left:5%;">
                                                <i class="fa-solid fa-file-import"></i>
                                                <input type="file" id="turnInReport" name="file" style="display: none;">
                                            </label>
                                            <span class="file-name" id="turnInReport-file-name" style="font-style: italic; color: #999; font-size:small; padding:0; margin-top:2%;">No File Selected</span>
                                        </div>
                                    </div>
                                    <br><button type="submit" class="uploadturnin"><i class="fas fa-cloud-upload-alt" style="padding: 5px;"></i>Upload Turn In Report</button>
                                </form>
                            </td>
                            <td>
                                @if($submissionInfo->reviewStatus == 'done')
                                    <p>Correction Phase :</p>
                                    @if( $submissionInfo->correctionPhase == 'pending' )
                                        @if($submissionInfo->latestReturnCorrection && $submissionInfo->latestReturnCorrection->returnCorrectionLink !== NULL)
                                            <p class="status shipped">Pending For Comment</p>
                                        @elseif(!$submissionInfo->latestReturnCorrection)
                                            <p class="status shipped">Pending For Comment</p>
                                        @else
                                            <p class="status shipped">Pending For Correction</p>
                                        @endif
                                    @elseif( $submissionInfo->correctionPhase == 'readyForPresent' )
                                        <p class="status delivered">Ready For Present</p>
                                    @endif
                                    <a href="{{ route('correctionForm', ['submissionCode' => $submissionInfo->submissionCode]) }}" class="btn btn-primary mb-4"><i class="fas fa-calculator" style="padding: 5px;"></i>Correction</a>
                                @else
                                    <p class="status cancelled">Waiting for review</p>
                                 
                                @endif
                            </td>
                            <td>
                                @if($submissionInfo->correctionPhase == 'readyForPresent')
                                    @if($submissionInfo->participants_certificate == 'pending')
                                    <form method="post" action="{{ route('uploadParticipantsCertificate', ['submissionCode' => $submissionInfo->submissionCode]) }}" enctype="multipart/form-data" style="margin:auto; padding-bottom:10%; width:auto; text-align:center;">
                                    <h5>Participants Certificate</h5><br>
                                        @csrf
                                        <div class="choose-file">                            
                                            <div style="display: flex; align-items: center; margin-top:3%;">
                                                <label class="btn btn-primary" style="font-size:medium; padding:2%; width:20%; margin-left:5%;">
                                                    <i class="fa-solid fa-file-import"></i>
                                                    <input type="file" id="participantsCertificate" name="file" accept="application/pdf" style="display: none;">
                                                </label>
                                                <span class="file-name" style="font-style: italic; color: #999; font-size:small; padding:0; margin-top:2%;">No File Selected</span>
                                            </div>
                                        </div>
                                        <br><button type="submit"><i class="fas fa-cloud-upload-alt" style="padding: 5px;"></i>Upload</button>
                                    </form>
                                    @else
                                        <p class="status delivered">Click To Download Certificate:</p>
                                    @endif
                                    @if($submissionInfo->presentation_certificate == 'pending')
                                    <form method="post" action="{{ route('uploadPresentationCertificate', ['submissionCode' => $submissionInfo->submissionCode]) }}" enctype="multipart/form-data" style="margin:auto; padding-bottom:10%; width:auto; text-align:center;">
                                    <h5>Presentation Certificate</h5><br>
                                        @csrf
                                        <div class="choose-file">                            
                                            <div style="display: flex; align-items: center; margin-top:3%;">
                                                <label class="btn btn-primary" style="font-size:medium; padding:2%; width:20%; margin-left:5%;">
                                                    <i class="fa-solid fa-file-import"></i>
                                                    <input type="file" id="presentationCertificate" name="file" accept="application/pdf" style="display: none;">
                                                </label>
                                                <span class="file-name" style="font-style: italic; color: #999; font-size:small; padding:0; margin-top:2%;">No File Selected</span>
                                            </div>
                                        </div>
                                        <br><button type="submit"><i class="fas fa-cloud-upload-alt" style="padding: 5px;"></i>Upload</button>
                                    </form>
                                    @else
                                        <p class="status delivered">Click To Download Certificate:</p>
                                    @endif
                                @else
                                    <p class="status cancelled">Not Ready</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p style="color: black;">No record found</p>
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
        $('#submissionTable').DataTable({
            search: {
                smart: false  // Disables smart search, enforcing exact match searches
            }
        });
    });

    // Get all submission code links
    const submissionCodeLinks = document.querySelectorAll('.submission-code');
            
            // Add click event listener to each link
            submissionCodeLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const submissionCode = link.dataset.submissionCode;
                const submissionTitle = link.dataset.submissionTitle;
                const submissionType = link.dataset.submissionType;
                const subTheme = link.dataset.subTheme;
                const presentMode = link.dataset.presentMode;

                let submissionDetails = document.querySelector(`.submission-details[data-submission-code="${submissionCode}"]`);
                if (!submissionDetails) {
                // Create pop-up window if it doesn't exist
                const popUpWindow = document.createElement('div');
                popUpWindow.classList.add('submission-details');
                popUpWindow.dataset.submissionCode = submissionCode;
                popUpWindow.innerHTML = `

                    <div class="submission-details-content">
                    <p>Submission Code</p>
                    <span style="font-weight:bold;">${submissionCode}</span>
                    <p>Title</p>
                    <span style="font-weight:bold;">${submissionTitle}</span>
                    <p>Type</p>
                    <span style="font-weight:bold;">${submissionType}</span>
                    <p>Theme</p>
                    <span style="font-weight:bold;">${subTheme}</span>
                    <p>Present Mode</p>
                    <span style="font-weight:bold;">${presentMode}</span>
                    </div>
                    <div class="submission-details-header" style=" text-align:center; margin:20px;">
                    <span class="submission-details-close" style="position: absolute;top: 0px;right: 0px;width: 45px;height: 45px;background: #0d6efd;font-size: 2em;color: #fff;display: flex;justify-content: center;align-items: center;border-bottom-left-radius: 20px;border-top-right-radius: 20px;cursor: pointer;z-index: 1;"><i class="fas fa-times"></i></span></div>`;
                document.body.appendChild(popUpWindow);
                submissionDetails = popUpWindow;

                // Apply CSS styles for centering and layering the pop-up window
                submissionDetails.style.position = 'fixed';
                submissionDetails.style.top = '50%';
                submissionDetails.style.left = '50%';
                submissionDetails.style.transform = 'translate(-50%, -50%)';
                submissionDetails.style.zIndex = '9999'; // Set a high z-index value to bring it to the top layer
                submissionDetails.style.backgroundColor = 'white';
                submissionDetails.style.padding = '20px';
                submissionDetails.style.border = '1px solid #ccc';
                submissionDetails.style.borderRadius = '20px';
                submissionDetails.style.boxShadow = '0 0 20px rgba(0, 0, 0, 0.5)';
                submissionDetails.style.color = 'black';
                submissionDetails.style.transition = '0.5s';
                submissionDetails.style.width = "15%";
                submissionDetails.style.opacity = '0';
                submissionDetails.style.display = 'block';
                setTimeout(() => {
                submissionDetails.style.opacity = '1';
                },10);

                // Add click event listener to the close button
                const closeButton = submissionDetails.querySelector('.submission-details-close');
                closeButton.addEventListener('click', () => {
                    submissionDetails.style.opacity = '0';
                    setTimeout(() => {
                    submissionDetails.remove();
                    }, 2000);
                });
                }
                setTimeout(() => {
                submissionDetails.style.opacity = '1';
                }, 10);
            });
            });


    </script>

</html>