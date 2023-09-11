<html>
    <head>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        table {
            margin: auto;
            margin-top: 15%;
            margin-bottom: 10%;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        form {
            color: black;
            margin: auto;
            width: 500px;
            padding: 20px;
            border: 1px solid #dee2e6;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
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
        
        .title{
            margin-top: 10%;
        }
        
        .btn, .download{
            text-align: center;
            width: max-content;
        }
    </style>
    </head>
    <body>
    <table>
        <th>
            Submission
        </th>
        <th>
            Presentation Group
        </th>
        @foreach($submission as $submission)
            @if($submission->submissionType != 'Publication ONLY')
            <tr>
                <td>
                    <a style="font-size:20px; font-weight:bold; color:black;  text-decoration:none;" href="#" class="submission-code" data-submission-code="{{$submission->submissionCode}}" data-submission-type="{{$submission->submissionType}}" data-submission-title="{{$submission->submissionTitle}}" data-submission-type="{{$submission->submissionTitle}}" data-sub-theme="{{$submission->subTheme}}" data-present-mode="{{$submission->presentMode}}">
                        <div class="submissionCode">
                            {{$submission->submissionCode}}
                        </div>
                    </a>
                </td>
                <td>
                    @if($submission->presentationGroup == null)
                        <p>Current Group : </p> <h5 style="color: black;">Not Assigned</h5>
                    @else
                        <p>Current Group : </p> <h5 style="color: black;">{{ $submission->presentationGroup }}</h5>
                    @endif
                    <form method="post" action="{{ route('editSubmissionPresentationGroup', ['submissionCode' => $submission->submissionCode]) }}">
                        @csrf
                        <select name="group" id="group">
                            <option value="Not Assigned">Not Assigned</option>
                            @foreach($schedule as $thisSchedule)
                                <option value="{{ $thisSchedule->presentationGroup }}">{{ $thisSchedule->presentationGroup }}</option>
                            @endforeach
                        </select>  <br>
                        <button>Save Change</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </table>
    <script>
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
                    <span class="submission-details-close" style="color:white; font-size:20px; padding:3%; background-color: #007bff; cursor: pointer; border-radius:5px;">Close</span>
                    </div>
                `;
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
    </body>

</html>