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

    table {
        border-collapse: collapse;
        border: 1px solid black;
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
    <span class="header" name="header"><strong>Dear Authors,</strong></span><br><br>

    <span class="content" name="contentAccept">We are pleased to inform you that your manuscript has been accepted for the 9th International Conference Liga limu Serantau (LIS) 2023 which will be held on gth August 2023 at Politeknik Mersing (PMJ) Johor, Malaysia</span>
    <br><br>
    <span class="content" name="contentAccept2">Your manuscript has been corrected after being anonymously reviewed by competent expert reviewers in the specialized areas, independently evaluating the scientific quality of the manuscript.</span>
    <br><br>
    <span class="table-Header"><strong>Your manuscript details are as follow:</strong></span>
    <br><br>
                                                                                                                                @if(isset($submissionInfo))
        <table id="acceptancLetterDetailsTable" style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black; padding:1%;" >ID</td>
            <td style="border: 1px solid black; padding:1%; width:fit-content;" >{{ $submissionInfo->submissionCode }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding:1%; width:fit-content;" >Research Paper Title</td>
            <td style="border: 1px solid black; padding:1%; width:fit-content;" >{{ $submissionInfo->submissionTitle }}</td>    
        </tr>
        <tr>
            <td style="border: 1px solid black; padding:1%; width:fit-content;" >Authors</td>
            <td style="border: 1px solid black; padding:1%; width:fit-content;" >
                {{ $participants1Name->name }}
                @if($submissionInfo->participants2 != null)
                    ,{{ $submissionInfo->participants2_name }}
                @endif
                @if($submissionInfo->participants3 != null)
                    ,{{ $submissionInfo->participants3_name }}
                @endif
            </td>
        </tr>
    </table>
    @else
    <table id="acceptancLetterDetailsTable" style="border: 1px solid black">
        <tr>
            <td style="border: 1px solid black; padding:1%;" >ID</td>
            <td style="border: 1px solid black; padding:1%;" >XXX</td>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding:1%;" >Research Paper Title</td>
            <td style="border: 1px solid black; padding:1%;" >Submission Title</td>    
        </tr>
        <tr>
            <td style="border: 1px solid black; padding:1%;" >Authors</td>
            <td style="border: 1px solid black; padding:1%;" >
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