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
    </style>
</head>
<body>
    <form action="{{ route('evaluationForm', ['submissionCode' => $dataEvaluationForm->paper_id_number]) }}" method="post">
        @csrf
        <h2>8th INTERNATIONAL CONFERENCE</h2>
        <h2>LIGA ILMU SERANTAU 2022 (LIS 2022)</h2>

        <table border>
            <tr>
                <td><strong>Reviewer’s Name:</strong></td>
                <td><input type="text" name="reviewer_name" value="{{ $dataEvaluationForm->reviewer_name }}"></td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td><input type="text" name="email" value="{{ $dataEvaluationForm->email }}"></td>
            </tr>
            <tr>
                <td><strong>Paper Id Number:</strong></td>
                <td><input type="text" name="paper_id_number" value="{{ $dataEvaluationForm->paper_id_number }}"></td>
            </tr>
            <tr>
                <td><strong>Title of Paper Reviewed:</strong></td>
                <td><input type="text" name="title_of_paper_reviewed" value="{{ $dataEvaluationForm->title_of_paper_reviewed }}"></td>
            </tr>
            <tr>
                <td><strong>Date of Reviewed:</strong></td>
                <td><input type="date" name="date_of_reviewed" value="{{ $dataEvaluationForm->date_of_reviewed }}"></td>
            </tr>
        </table>

        <h3>Comments per Section of Manuscript</h3>

        <table border>
            <tr>
                <td><strong>Abstract:</strong></td>
                <td><textarea name="comments_abstract">{{ $dataEvaluationForm->comments_abstract }}</textarea></td>
            </tr>
            <tr>
                <td><strong>Introduction:</strong></td>
                <td><textarea name="comments_introduction">{{ $dataEvaluationForm->comments_introduction }}</textarea></td>
            </tr>
            <tr>
                <td><strong>Literature Review:</strong></td>
                <td><textarea name="comments_literature_review">{{ $dataEvaluationForm->comments_literature_review }}</textarea></td>
            </tr>
            <tr>
                <td><strong>Methodology:</strong></td>
                <td><textarea name="comments_methodology">{{ $dataEvaluationForm->comments_methodology }}</textarea></td>
            </tr>
            <tr>
                <td><strong>Results:</strong></td>
                <td><textarea name="comments_results">{{ $dataEvaluationForm->comments_results }}</textarea></td>
            </tr>
            <tr>
                <td><strong>Discussion:</strong></td>
                <td><textarea name="comments_discussion">{{ $dataEvaluationForm->comments_discussion }}</textarea></td>
            </tr>
            <tr>
                <td><strong>References:</strong></td>
                <td><textarea name="comments_references">{{ $dataEvaluationForm->comments_references }}</textarea></td>
            </tr>

        </table>

        <h3>Please rate the following: (1=Excellent) (2=Good) (3=Fair) (4=Poor)</h3>

        <table border>
            <tr>
                <td><strong>Originality:</strong></td>
                <td>
                    <label><input type="radio" name="originality" value="1" <?php echo ($dataEvaluationForm->originality == 1) ? 'checked' : ''; ?>> Excellent</label>
                    <label><input type="radio" name="originality" value="2" <?php echo ($dataEvaluationForm->originality == 2) ? 'checked' : ''; ?>> Good</label>
                    <label><input type="radio" name="originality" value="3" <?php echo ($dataEvaluationForm->originality == 3) ? 'checked' : ''; ?>> Fair</label>
                    <label><input type="radio" name="originality" value="4" <?php echo ($dataEvaluationForm->originality == 4) ? 'checked' : ''; ?>> Poor</label>
                </td>
            </tr>
            <tr>
                <td><strong>Contribution To The Field:</strong></td>
                <td>
                    <label><input type="radio" name="contribution_to_field" value="1" <?php echo ($dataEvaluationForm->contribution_to_field == 1) ? 'checked' : ''; ?>> Excellent</label>
                    <label><input type="radio" name="contribution_to_field" value="2" <?php echo ($dataEvaluationForm->contribution_to_field == 2) ? 'checked' : ''; ?>> Good</label>
                    <label><input type="radio" name="contribution_to_field" value="3" <?php echo ($dataEvaluationForm->contribution_to_field == 3) ? 'checked' : ''; ?>> Fair</label>
                    <label><input type="radio" name="contribution_to_field" value="4" <?php echo ($dataEvaluationForm->contribution_to_field == 4) ? 'checked' : ''; ?>> Poor</label>
                </td>
            </tr>
            <tr>
                <td><strong>Technical Quality:</strong></td>
                <td>
                    <label><input type="radio" name="technical_quality" value="1" <?php echo ($dataEvaluationForm->technical_quality == 1) ? 'checked' : ''; ?>> Excellent</label>
                    <label><input type="radio" name="technical_quality" value="2" <?php echo ($dataEvaluationForm->technical_quality == 2) ? 'checked' : ''; ?>> Good</label>
                    <label><input type="radio" name="technical_quality" value="3" <?php echo ($dataEvaluationForm->technical_quality == 3) ? 'checked' : ''; ?>> Fair</label>
                    <label><input type="radio" name="technical_quality" value="4" <?php echo ($dataEvaluationForm->technical_quality == 4) ? 'checked' : ''; ?>> Poor</label>
                </td>
            </tr>
            <tr>
                <td><strong>Clarity Of Presentation:</strong></td>
                <td>
                    <label><input type="radio" name="clarity_of_presentation" value="1" <?php echo ($dataEvaluationForm->clarity_of_presentation == 1) ? 'checked' : ''; ?>> Excellent</label>
                    <label><input type="radio" name="clarity_of_presentation" value="2" <?php echo ($dataEvaluationForm->clarity_of_presentation == 2) ? 'checked' : ''; ?>> Good</label>
                    <label><input type="radio" name="clarity_of_presentation" value="3" <?php echo ($dataEvaluationForm->clarity_of_presentation == 3) ? 'checked' : ''; ?>> Fair</label>
                    <label><input type="radio" name="clarity_of_presentation" value="4" <?php echo ($dataEvaluationForm->clarity_of_presentation == 4) ? 'checked' : ''; ?>> Poor</label>
                </td>
            </tr>
            <tr>
                <td><strong>Depth Of Research:</strong></td>
                <td>
                    <label><input type="radio" name="depth_of_research" value="1" <?php echo ($dataEvaluationForm->depth_of_research == 1) ? 'checked' : ''; ?>> Excellent</label>
                    <label><input type="radio" name="depth_of_research" value="2" <?php echo ($dataEvaluationForm->depth_of_research == 2) ? 'checked' : ''; ?>> Good</label>
                    <label><input type="radio" name="depth_of_research" value="3" <?php echo ($dataEvaluationForm->depth_of_research == 3) ? 'checked' : ''; ?>> Fair</label>
                    <label><input type="radio" name="depth_of_research" value="4" <?php echo ($dataEvaluationForm->depth_of_research == 4) ? 'checked' : ''; ?>> Poor</label>
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
                <td><input type="radio" id="accept" name="recommendation" value="accept" <?php echo ($dataEvaluationForm->recommendation == "accept") ? 'checked' : ''; ?>></td>
            </tr>
            <tr>
                <td><label for="minor">Requires Minor Corrections</label></td>
                <td><input type="radio" id="minor" name="recommendation" value="minor" <?php echo ($dataEvaluationForm->recommendation == "minor") ? 'checked' : ''; ?>></td>
            </tr>
            <tr>
                <td><label for="moderate">Requires Moderate Revision</label></td>
                <td><input type="radio" id="moderate" name="recommendation" value="moderate" <?php echo ($dataEvaluationForm->recommendation == "moderate") ? 'checked' : ''; ?>></td>
            </tr>
            <tr>
                <td><label for="major">Requires Major Revision</label></td>
                <td><input type="radio" id="major" name="recommendation" value="major" <?php echo ($dataEvaluationForm->recommendation == "major") ? 'checked' : ''; ?>></td>
            </tr>
            <tr>
                <td><label for="reject">Reject On Ground of (Please Be Specific)</label></td>
                <td><input type="radio" id="reject" name="recommendation" value="reject" <?php echo ($dataEvaluationForm->recommendation == "reject") ? 'checked' : ''; ?>></td>
            </tr>
        </table>

        <button type="submit" style="margin: 10px; font-size:larger;">Save</button>
    </form>
    <br>
    <br>
    <br>
    
</body>
</html>