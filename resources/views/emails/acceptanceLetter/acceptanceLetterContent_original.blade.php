<style>
            .acceptanceLetter {
                background-color: white;
                text-align: left;
                height:100%;
                margin:1%;
            }

            .header{
                font-weight: bold;
            }

            table{
                border: 1px solid black;
                border-collapse: collapse;
                margin-left: 3%;
            }

            table tr td{
                border: 1px solid black;
                padding: 5px;
            }

            .table-Header{
                font-weight: bold;
            }
        </style>
    
    
        <div class="acceptanceLetter">
            <span class="header" name="header">Dear Authors,</span><br><br>

            <span class="content" name="contentAccept">We are pleased to inform you that your manuscript has been accepted for the 10th International Conference Liga limu Serantau (LIS) 2023 which will be held on gth August 2023 at Politeknik Mersing (PMJ) Johor, Malaysia<br></span>
            <br>
            <span class="content" name="contentAccept2">Your manuscript has been corrected after being anonymously reviewed by competent expert reviewers in the specialized areas, independently evaluating the scientific quality of the manuscript.</span>
            <br><br>
            <span class="table-Header">Your manuscript details are as follow:</span>
            <br><br>
                                                                                            @if(isset($submissionInfo))
                <table border="" id="acceptancLetterDetailsTable">
                    <tr>
                        <td>ID</td>
                        <td>{{ $submissionInfo->submissionCode }}</td>
                    </tr>
                    <tr>
                        <td>Research Paper Title</td>
                        <td>{{ $submissionInfo->submissionTitle }}</td>    
                    </tr>
                    <tr>
                        <td>Authors</td>
                        <td>
                            {{ $submissionInfo->participants1 }}
                            @if($submissionInfo->participants2 != null)
                                ,{{ $submissionInfo->participants2 }}
                            @elseif($submissionInfo->participants3 != null)
                                ,{{ $submissionInfo->participants3 }}
                            @endif
                        </td>
                    </tr>
                </table>
            @else
                <table border="" id="acceptancLetterDetailsTable">
                    <tr>
                        <td>ID</td>
                        <td>XXX</td>
                    </tr>
                    <tr>
                        <td>Research Paper Title</td>
                        <td>Submission Title</td>    
                    </tr>
                    <tr>
                        <td>Authors</td>
                        <td>
                            Authors name 1,2,3
                        </td>
                    </tr>
                </table>
            @endif
                                                                                                            
                        <br>
            <span name="content">Kindly make sure to complete the payment before the deadline and thank you for considering the 9th International Conference Liga Ilmu Serantau(LIS) 2023 as your preffered conference.We look forward to seeing you at the conference</span>
            <br><br>
            <span name="contentRegards">Regards,LIS 2023 Committe</span>
        </div>