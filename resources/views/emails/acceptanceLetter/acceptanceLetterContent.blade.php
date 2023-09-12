<html>
    <body>
        <span for="header">Dear Authors,</span>

        <span for="content">We are pleased to inform you that your manuscript has been accepted for the 9th International Conference Liga limu Serantau (LIS) 2023 which will be held on gth August 2023 at Politeknik Mersing (PMJ) Johor, Malaysia</span>

        <span for="content">Your manuscript has been corrected after being anonymously reviewed by competent expert reviewers in the specialized areas, independently evaluating the scientific quality of the manuscript.\</span>

        <span>Your manuscript details are as follow:</span>

        <table>
            <tr>
                <td>ID</td>
                <td>{{ submissionInfo->submissionCode }}</td>
            </tr>
            <tr>
                <td>Research Paper Title</td>
                <td>{{ submissionInfo->submissionTitle }}</td>    
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

        <span>Kindly make sure to complete the payment before the deadline and thank you for considering the 9th International Conference Liga Ilmu Serantau(LIS) 2023 as your preffered conference.We look forward to seeing you at the conference</span>

        <span>Regards,LIS 2023 Committe</span>
    </body>
</html>