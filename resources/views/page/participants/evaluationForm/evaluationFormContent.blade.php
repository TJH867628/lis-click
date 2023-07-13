<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Form</title>
    <style>
        body{
            text-align: center;
        }

        table {
            margin: auto;
            text-align: center;
            border-collapse: collapse;
        }

        table tr td{
            padding: 10px;
        }

        textarea {
            width: 500px;
            height: 100px;
        }

        #form-container{
            margin: auto;
            border: 3px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
@foreach($dataEvaluationForm as $thisdataEvaluationForm)
<div id="form-container">
    <h2>8th INTERNATIONAL CONFERENCE</h2>
    <h2>LIGA ILMU SERANTAU 2022 (LIS 2022)</h2>
    <table border>
        <tr>
            <td><strong>Reviewer’s Name:</strong></td>
            <td><input type="text" name="reviewer_name" value="" readonly></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><input type="text" name="email" value="" readonly></td>
        </tr>
        <tr>
            <td><strong>Paper Id Number:</strong></td>
            <td><input type="text" name="paper_id_number" value="{{ $thisdataEvaluationForm->paper_id_number }}" readonly></td>
        </tr>
        <tr>
            <td><strong>Title of Paper Reviewed:</strong></td>
            <td><input type="text" name="title_of_paper_reviewed" value="{{ $thisdataEvaluationForm->title_of_paper_reviewed }}" readonly></td>
        </tr>
        <tr>
            <td><strong>Date of Reviewed:</strong></td>
            <td><input type="date" name="date_of_reviewed" value="{{ date('Y-m-d') }}" readonly></td>
        </tr>
    </table>

    <h3>Comments per Section of Manuscript</h3>

    <table border>
        <tr>
            <td><strong>Abstract:</strong></td>
            <td><textarea name="comments_abstract" readonly>{{ $thisdataEvaluationForm->comments_abstract }}</textarea></td>
        </tr>
        <tr>
            <td><strong>Introduction:</strong></td>
            <td><textarea name="comments_introduction" readonly>{{ $thisdataEvaluationForm->comments_introduction }}</textarea></td>
        </tr>
        <tr>
            <td><strong>Literature Review:</strong></td>
            <td><textarea name="comments_literature_review" readonly>{{ $thisdataEvaluationForm->comments_literature_review }}</textarea></td>
        </tr>
        <tr>
            <td><strong>Methodology:</strong></td>
            <td><textarea name="comments_methodology" readonly>{{ $thisdataEvaluationForm->comments_methodology }}</textarea></td>
        </tr>
        <tr>
            <td><strong>Results:</strong></td>
            <td><textarea name="comments_results" readonly>{{ $thisdataEvaluationForm->comments_results }}</textarea></td>
        </tr>
        <tr>
            <td><strong>Discussion:</strong></td>
            <td><textarea name="comments_discussion" readonly>{{ $thisdataEvaluationForm->comments_discussion }}</textarea></td>
        </tr>
        <tr>
            <td><strong>References:</strong></td>
            <td><textarea name="comments_references" readonly>{{ $thisdataEvaluationForm->comments_references }}</textarea></td>
        </tr>
    </table>

    <h3>Please rate the following: (1=Excellent) (2=Good) (3=Fair) (4=Poor)</h3>

    <table border>
        <tr>
            <td><strong>Originality:</strong></td>
            <td>
                <label><input type="radio" name="originality" value="1" <?php echo ($thisdataEvaluationForm->originality == 1) ? 'checked' : ''; ?> disabled> Excellent</label>
                <label><input type="radio" name="originality" value="2" <?php echo ($thisdataEvaluationForm->originality == 2) ? 'checked' : ''; ?> disabled> Good</label>
                <label><input type="radio" name="originality" value="3" <?php echo ($thisdataEvaluationForm->originality == 3) ? 'checked' : ''; ?> disabled> Fair</label>
                <label><input type="radio" name="originality" value="4" <?php echo ($thisdataEvaluationForm->originality == 4) ? 'checked' : ''; ?> disabled> Poor</label>
            </td>
        </tr>
        <tr>
            <td><strong>Contribution To The Field:</strong></td>
            <td>
                <label><input type="radio" name="contribution_to_field" value="1" <?php echo ($thisdataEvaluationForm->contribution_to_field == 1) ? 'checked' : ''; ?> disabled> Excellent</label>
                <label><input type="radio" name="contribution_to_field" value="2" <?php echo ($thisdataEvaluationForm->contribution_to_field == 2) ? 'checked' : ''; ?> disabled> Good</label>
                <label><input type="radio" name="contribution_to_field" value="3" <?php echo ($thisdataEvaluationForm->contribution_to_field == 3) ? 'checked' : ''; ?> disabled> Fair</label>
                <label><input type="radio" name="contribution_to_field" value="4" <?php echo ($thisdataEvaluationForm->contribution_to_field == 4) ? 'checked' : ''; ?> disabled> Poor</label>
            </td>
        </tr>
        <tr>
            <td><strong>Technical Quality:</strong></td>
            <td>
                <label><input type="radio" name="technical_quality" value="1" <?php echo ($thisdataEvaluationForm->technical_quality == 1) ? 'checked' : ''; ?> disabled> Excellent</label>
                <label><input type="radio" name="technical_quality" value="2" <?php echo ($thisdataEvaluationForm->technical_quality == 2) ? 'checked' : ''; ?> disabled> Good</label>
                <label><input type="radio" name="technical_quality" value="3" <?php echo ($thisdataEvaluationForm->technical_quality == 3) ? 'checked' : ''; ?> disabled> Fair</label>
                <label><input type="radio" name="technical_quality" value="4" <?php echo ($thisdataEvaluationForm->technical_quality == 4) ? 'checked' : ''; ?> disabled> Poor</label>
            </td>
        </tr>
        <tr>
            <td><strong>Clarity Of Presentation:</strong></td>
            <td>
                <label><input type="radio" name="clarity_of_presentation" value="1" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 1) ? 'checked' : ''; ?> disabled> Excellent</label>
                <label><input type="radio" name="clarity_of_presentation" value="2" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 2) ? 'checked' : ''; ?> disabled> Good</label>
                <label><input type="radio" name="clarity_of_presentation" value="3" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 3) ? 'checked' : ''; ?> disabled> Fair</label>
                <label><input type="radio" name="clarity_of_presentation" value="4" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 4) ? 'checked' : ''; ?> disabled> Poor</label>
            </td>
        </tr>
        <tr>
            <td><strong>Depth Of Research:</strong></td>
            <td>
                <label><input type="radio" name="depth_of_research" value="1" <?php echo ($thisdataEvaluationForm->depth_of_research == 1) ? 'checked' : ''; ?> disabled> Excellent</label>
                <label><input type="radio" name="depth_of_research" value="2" <?php echo ($thisdataEvaluationForm->depth_of_research == 2) ? 'checked' : ''; ?> disabled> Good</label>
                <label><input type="radio" name="depth_of_research" value="3" <?php echo ($thisdataEvaluationForm->depth_of_research == 3) ? 'checked' : ''; ?> disabled> Fair</label>
                <label><input type="radio" name="depth_of_research" value="4" <?php echo ($thisdataEvaluationForm->depth_of_research == 4) ? 'checked' : ''; ?> disabled> Poor</label>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table border>
        <tr>
            <td><h3>Recommendation: (mark with X)</h3></td>
        </tr>
        <tr>
            <td><label for="accept">Accept As Is</label></td>
            <td><input type="radio" id="accept" name="recommendation" value="accept" <?php echo ($thisdataEvaluationForm->recommendation == "accept") ? 'checked' : ''; ?> disabled></td>
        </tr>
        <tr>
            <td><label for="minor">Requires Minor Corrections</label></td>
            <td><input type="radio" id="minor" name="recommendation" value="minor" <?php echo ($thisdataEvaluationForm->recommendation == "minor") ? 'checked' : ''; ?> disabled></td>
        </tr>
        <tr>
            <td><label for="moderate">Requires Moderate Revision</label></td>
            <td><input type="radio" id="moderate" name="recommendation" value="moderate" <?php echo ($thisdataEvaluationForm->recommendation == "moderate") ? 'checked' : ''; ?> disabled></td>
        </tr>
        <tr>
            <td><label for="major">Requires Major Revision</label></td>
            <td><input type="radio" id="major" name="recommendation" value="major" <?php echo ($thisdataEvaluationForm->recommendation == "major") ? 'checked' : ''; ?> disabled></td>
        </tr>
        <tr>
            <td><label for="reject">Reject On Ground of (Please Be Specific)</label></td>
            <td><input type="radio" id="reject" name="recommendation" value="reject" <?php echo ($thisdataEvaluationForm->recommendation == "reject") ? 'checked' : ''; ?> disabled></td>
        </tr>
    </table>
    <button>This is the button to generated pdf</button>
    <br>
    <br>
    <br>
</div>
@endforeach

</body>
</html>
