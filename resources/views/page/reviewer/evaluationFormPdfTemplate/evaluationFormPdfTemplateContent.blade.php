<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }
        #evaluation-form {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            margin-top: 10%;
        }
        #form-container {
            padding: 20px;
            margin-bottom: 20px;
        }
        h1,h2, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .comment{
            margin:5%; 
            text-align: center;
            align-items: center;
            width: 100%;
            font-size: 20px;
        }
        .comment td{
            width: 90%;
        }

        .comment th{
            width: 10%;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            font-weight: bold;
        }
        textarea {
            width: 100%;
            height: auto;
            overflow-y: hidden;
            font-size:13px;
            font-family: Arial, Helvetica, sans-serif;
        }
        label {
            display: inline-block;
            margin-right: 10px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }

        #paperDetails{
            width: 50%; 
            margin: 0 auto;
        }

        .header{
            margin-top: 30%;
        }


        #paperDetails input{
            width: 100%; 
            margin: 0 auto;
        }
        
        #rating th{
            width: 35%;
            font-size: large;
            font-weight: bolder;
        }

        .page-break {
            page-break-after: always;
        }

        #logo_lis{
            position: absolute;
            top: 10%;
        }

        #logo_pmj{
            position: absolute;
            top: 8%;
            left:50%;
        }
    </style>
</head>
<body>
<div id="evaluation-form">
    @php
        $count = 1;
    @endphp
        @foreach($dataEvaluationForm as $thisdataEvaluationForm)
        @if($count == 1)
            <img src="{{ $logo_lis }}" id="logo_lis" alt="logo_lis" style="width: 300px; height: 150px;">
            <img src="{{ $logo_pmj }}" id="logo_pmj" alt="logo_pmj" style="width: 300px; height: 150px;">
        <div id="form-container">
            <div class="header">
                <h2>INTERNATIONAL CONFERENCE </h2><br>
                <h2>LIGA ILMU SERANTAU {{ $year }} (LIS {{ $year }}) </h2><br>
                <h2>POLITEKNIK MERSING (PMJ) JOHOR</h2><br>
                <h1>EVALUATION FORM</h1>
            </div>
            

            <div id="paper-details">
                <table>
                    <tr>
                        <th><h3>Reviewer Name:</h3>
                        <td style=" text-align:center;"><label type="text" name="paper_id_number" style="font-size:20px;" readonly>{{ $thisdataEvaluationForm->reviewer_name }}</label></td>
                    </tr>
                    <tr>
                        <th><h3>Reviewer Email:</h3></th>
                        <td style=" text-align:center;"><label type="text" name="paper_id_number" style="font-size:20px;" readonly>{{ $thisdataEvaluationForm->email }}</label></td>
                    </tr>
                    <tr>
                        <th><h3>Paper Id Number:</h3></th>
                        <td style=" text-align:center;"><label type="text" name="paper_id_number" style="font-size:20px;" readonly>{{ $thisdataEvaluationForm->paper_id_number }}</label></td>
                    </tr>
                    <tr>
                        <th><h3>Title of Paper Reviewed:</h3></th>
                        <td style=" text-align:center;"><label type="text" name="paper_id_number" style="font-size:20px;" readonly>{{ $thisdataEvaluationForm->title_of_paper_reviewed }}</label></td>
                    </tr>
                    <tr>
                        <th><h3>Date of Reviewed:</h3></th>
                        <td style=" text-align:center;"><label type="text" name="paper_id_number" style="font-size:20px;" readonly>{{ date('d/m/Y', strtotime($thisdataEvaluationForm->date_of_reviewed)) }}</label></td>
                    </tr>
                </table>
            </div>
            @endif
            @php
                $count++;
            @endphp
            <div class="page-break"></div>
            <h1>Comments per Section of Manuscript</h1>
            <h2 for="" id="head2" style="text-align: left;">Abstract:</h2>
            <textarea name="additional_comments" placeholder="Enter......" maxlength="1500" style="font-size:13px;" >{{ $thisdataEvaluationForm->comments_abstract }}</textarea><br><br>
            <h2 for="" id="head2" style="text-align: left;">Introduction:</h2>
            <textarea name="additional_comments" placeholder="Enter......" maxlength="1500" style="font-size:13px;" >{{ $thisdataEvaluationForm->comments_introduction }}</textarea><br><br>
            <h2 for="" id="head2" style="text-align: left;">Literature Review:</h2>
            <textarea name="additional_comments" placeholder="Enter......" maxlength="1500" style="font-size:13px;" >{{ $thisdataEvaluationForm->comments_literature_review }}</textarea><br><br>
            <h2 for="" id="head2" style="text-align: left;">References:</h2>
            <textarea name="additional_comments" placeholder="Enter......" maxlength="1500" style="font-size:13px;" >{{ $thisdataEvaluationForm->comments_references }}</textarea><br><br>
            <h2 for="" id="head2" style="text-align: left;">Methodology:</h2>
            <textarea name="additional_comments" placeholder="Enter......" maxlength="1500" style="font-size:13px;" >{{ $thisdataEvaluationForm->comments_methodology }}</textarea><br><br>
            <h2 for="" id="head2" style="text-align: left;">Results:</h2>
            <textarea name="additional_comments" placeholder="Enter......" maxlength="1500" style="font-size:13px;" >{{ $thisdataEvaluationForm->comments_results }}</textarea><br><br>
            <h2 for="" id="head2" style="text-align: left;">Discussion:</h2>
            <textarea name="additional_comments" placeholder="Enter......" maxlength="1500" style="font-size:13px;" >{{ $thisdataEvaluationForm->comments_discussion }}</textarea><br><br>
            <div class="page-break"></div>
            <div id="rating">
                <table>
                    <tr style="height: fit-content;">
                        <th style="height: 1px" colspan="2">
                            <h3 >Rating:</h3>
                        </th>   
                    </tr>
                    <tr>
                        <th>Originality:</th>
                        <td>
                            <label><input type="radio" name="originality" value="1" <?php echo ($thisdataEvaluationForm->originality == 1) ? 'checked' : ''; ?> disabled> Excellent</label>
                            <label><input type="radio" name="originality" value="2" <?php echo ($thisdataEvaluationForm->originality == 2) ? 'checked' : ''; ?> disabled> Good</label>
                            <label><input type="radio" name="originality" value="3" <?php echo ($thisdataEvaluationForm->originality == 3) ? 'checked' : ''; ?> disabled> Fair</label>
                            <label><input type="radio" name="originality" value="4" <?php echo ($thisdataEvaluationForm->originality == 4) ? 'checked' : ''; ?> disabled> Poor</label>
                        </td>
                    </tr>
                    <tr>
                        <th>Contribution To The Field:</th>
                        <td>
                            <label><input type="radio" name="contribution_to_field" value="1" <?php echo ($thisdataEvaluationForm->contribution_to_field == 1) ? 'checked' : ''; ?> disabled> Excellent</label>
                            <label><input type="radio" name="contribution_to_field" value="2" <?php echo ($thisdataEvaluationForm->contribution_to_field == 2) ? 'checked' : ''; ?> disabled> Good</label>
                            <label><input type="radio" name="contribution_to_field" value="3" <?php echo ($thisdataEvaluationForm->contribution_to_field == 3) ? 'checked' : ''; ?> disabled> Fair</label>
                            <label><input type="radio" name="contribution_to_field" value="4" <?php echo ($thisdataEvaluationForm->contribution_to_field == 4) ? 'checked' : ''; ?> disabled> Poor</label>
                        </td>
                    </tr>
                    <tr>
                        <th>Technical Quality:</th>
                        <td>
                            <label><input type="radio" name="technical_quality" value="1" <?php echo ($thisdataEvaluationForm->technical_quality == 1) ? 'checked' : ''; ?> disabled> Excellent</label>
                            <label><input type="radio" name="technical_quality" value="2" <?php echo ($thisdataEvaluationForm->technical_quality == 2) ? 'checked' : ''; ?> disabled> Good</label>
                            <label><input type="radio" name="technical_quality" value="3" <?php echo ($thisdataEvaluationForm->technical_quality == 3) ? 'checked' : ''; ?> disabled> Fair</label>
                            <label><input type="radio" name="technical_quality" value="4" <?php echo ($thisdataEvaluationForm->technical_quality == 4) ? 'checked' : ''; ?> disabled> Poor</label>
                        </td>
                    </tr>
                    <tr>
                        <th>Clarity Of Presentation:</th>
                        <td>
                            <label><input type="radio" name="clarity_of_presentation" value="1" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 1) ? 'checked' : ''; ?> disabled> Excellent</label>
                            <label><input type="radio" name="clarity_of_presentation" value="2" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 2) ? 'checked' : ''; ?> disabled> Good</label>
                            <label><input type="radio" name="clarity_of_presentation" value="3" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 3) ? 'checked' : ''; ?> disabled> Fair</label>
                            <label><input type="radio" name="clarity_of_presentation" value="4" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 4) ? 'checked' : ''; ?> disabled> Poor</label>
                        </td>
                    </tr>
                    <tr>
                        <th>Depth Of Research:</th>
                        <td>
                            <label><input type="radio" name="depth_of_research" value="1" <?php echo ($thisdataEvaluationForm->depth_of_research == 1) ? 'checked' : ''; ?> disabled> Excellent</label>
                            <label><input type="radio" name="depth_of_research" value="2" <?php echo ($thisdataEvaluationForm->depth_of_research == 2) ? 'checked' : ''; ?> disabled> Good</label>
                            <label><input type="radio" name="depth_of_research" value="3" <?php echo ($thisdataEvaluationForm->depth_of_research == 3) ? 'checked' : ''; ?> disabled> Fair</label>
                            <label><input type="radio" name="depth_of_research" value="4" <?php echo ($thisdataEvaluationForm->depth_of_research == 4) ? 'checked' : ''; ?> disabled> Poor</label>
                        </td>
                    </tr>
                </table>
            </div>

            <table id="recommendation">
                <tr>
                    <td><strong>Recommendation:</strong></td>
                </tr>
                <tr>
                    <td>
                        <label for="accept"><input type="radio" id="accept" name="recommendation" value="accept" <?php echo ($thisdataEvaluationForm->recommendation == "accept") ? 'checked' : ''; ?> disabled> Accept As Is</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="minor"><input type="radio" id="minor" name="recommendation" value="minor" <?php echo ($thisdataEvaluationForm->recommendation == "minor") ? 'checked' : ''; ?> disabled> Requires Minor Corrections</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="moderate"><input type="radio" id="moderate" name="recommendation" value="moderate" <?php echo ($thisdataEvaluationForm->recommendation == "moderate") ? 'checked' : ''; ?> disabled> Requires Moderate Revision</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="major"><input type="radio" id="major" name="recommendation" value="major" <?php echo ($thisdataEvaluationForm->recommendation == "major") ? 'checked' : ''; ?> disabled> Requires Major Revision</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="reject"><input type="radio" id="reject" name="recommendation" value="reject" <?php echo ($thisdataEvaluationForm->recommendation == "reject") ? 'checked' : ''; ?> disabled> Reject On Ground of (Please Be Specific)</label>
                    </td>
                </tr>
                @if($thisdataEvaluationForm->recommendation == "reject")
                <tr>
                    <td>
                        <label name="reject_on_ground" readonly>{{ $thisdataEvaluationForm->specific_reject_reason }}</label>
                    </td>
                </tr>
                @endif
            </table>

            <div class="page-break"></div>

            <h2 for="" id="head2" style="text-align: left;">Additional Comment:</h2> <br><br>
            <textarea name="additional_comments" placeholder="Enter......" maxlength="1500" style="">{{ $thisdataEvaluationForm->additional_comments }}</textarea><br><br>

            <div class="signature">
                <label for="signature" style="font-size: 20px; margin-top:10%;">Signature of Evaluator: …………………………………………… </label>
            </div>
            <div class="date">
                <label for="date" style="font-size: 20px; margin-top:10%;">Date: …………………………………………… </label>
            </div>
            <div class="full-name">
                <label for="full-name" style="font-size: 20px; margin-top:10%;">Full Name: …………………………………………… </label>
            </div>
            <div class="official-stamp">
                <label for="official-stamp" style="font-size: 20px; margin-top:10%;">Official Stamp:</label>
            </div>
        </div>

        @endforeach
    </div>
</body>
</html>