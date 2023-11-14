<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Form</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Popins', sans-serif;
        }

        body {     
            background: url("../images/tblBackground.jpg") center / cover;
            background-attachment: fixed;
            background-blend-mode: multiply;
            font-size: 1.1em;
            
        }

        .heading {
            text-align: center;
            width: 100%;
            margin: auto;
            margin-top: 10px;
        }

        #head {
            font-size: 1.8em;
            font-weight: bold;
        }

        #subheadinng {
            font-size: 18px;
            margin-top: 10px;
            font-weight: bold;
        }

        #content1 {
            width: 90%;
            margin: auto;
        }

        form {
            padding-top: 34px;
            align-items: center;
            justify-content: center;
            width: 54%;
            background-color: #fff5;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            margin: auto;
            margin-top: 10px;
            padding-bottom: 60px;
            margin-bottom: 5%;
        }

        form label {
            font-weight: bold;
            margin-left: 1%;
        }

        form .box {
            left: 5px;
            width: 98.5%;
            height: 2.8em;
            position: relative;
            bottom: 10px;
            border: 0;
            border-radius: 5px;
            background-color: #fff5;
        }

        textarea {
            width: 98%;
            height: 125px;
            position: relative;
            bottom: 17px;
            color: black;
            margin-left: 1%;
            padding-left: 5px;
        }

        button {
            margin-left: 5px;
            width: 98.5%;
            height: 3em;
            position: relative;
            background-color: #0062cc;
            border: none;
            color: rgb(255, 255, 2555);
            cursor: pointer;
            border-radius: 50px;
        }

        textarea::placeholder {
            font-size: 1.4em;
            position: relative;
            top: 8px;
            left: 5px;
            width: 70%;
        }

        .larger {
            width: 20px;
            height: 20px;
            margin-left: 2%;
            /* Change the color of the radio button */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 2px solid #555;
            border-radius: 50%;
            outline: none;
        }

        /* Style the radio button when it's checked */
        .larger:checked {
            background-color: #0062cc;
        }

        @media screen and (max-width: 600px) {
            form {
                width: 100%;
                margin: auto;
            }
        }

        input {
            color: black;
        }

        #reason {
            margin-left: 2%;
        }
    </style>
</head>
<body>
@foreach($dataEvaluationForm as $thisdataEvaluationForm)
<form>
    <div class="heading">
        <h1 id="head">8th INTERNATIONAL CONFERENCE</h1>
        <h2 id="subheadinng"><i>LIGA ILMU SERANTAU 2022 (LIS 2022)</i></h2>
    </div>
    <div class="content1">
        <label for="">Reviewer’s Name:</label> <br><br>
        <input type="text" name="reviewer_name" value="{{ $thisdataEvaluationForm->reviewer_name}}" readonly class="box"> <br><br>
        <label for="">Email:</label> <br><br>
        <input type="text" name="email" value="{{ $thisdataEvaluationForm->email }}" readonly class="box"> <br><br>
        <label for="">Paper Id Number:</label> <br><br>
        <input type="text" name="paper_id_number" value="{{ $thisdataEvaluationForm->paper_id_number }}" readonly class="box"> <br><br>
        <label for="">Title of Paper Reviewed:</label> <br><br>
        <input type="text" name="title_of_paper_reviewed" value="{{ $thisdataEvaluationForm->title_of_paper_reviewed }}" readonly class="box"> <br><br>
        <label for="">Date of Reviewed:</label> <br><br>
        <input type="date" name="date_of_reviewed" value="{{ date('Y-m-d') }}" readonly class="box"> <br><br> 
    </div>
    <br>
    <div class="heading">
        <h1 id="head">Comments per Section of Manuscript</h1>
    </div>
    <label for="" id="head2">Abstact</label> <br><br>
    <textarea name="comments_abstract" readonly>{{ $thisdataEvaluationForm->comments_abstract }}</textarea><br><br>
    <label for="" id="head2">Introduction</label> <br><br>
    <textarea name="comments_introduction" readonly>{{ $thisdataEvaluationForm->comments_introduction }}</textarea><br><br>
    <label for="" id="head2">Literature Review</label> <br><br>
    <textarea name="comments_literature_review" readonly>{{ $thisdataEvaluationForm->comments_literature_review }}</textarea><br><br>
    <label for="" id="head2">Methodology</label> <br><br>
    <textarea name="comments_methodology" readonly>{{ $thisdataEvaluationForm->comments_methodology }}</textarea><br><br>
    <label for="" id="head2">Results</label> <br><br>
    <textarea name="comments_results" readonly>{{ $thisdataEvaluationForm->comments_results }}</textarea><br><br>
    <label for="" id="head2">Discussion</label> <br><br>
    <textarea name="comments_discussion" readonly>{{ $thisdataEvaluationForm->comments_discussion }}</textarea><br><br>
    <label for="" id="head2">References</label> <br><br>
    <textarea name="comments_references" readonly>{{ $thisdataEvaluationForm->comments_references }}</textarea><br><br>
    <div class="heading">
        <h1 id="head">Please rate the following: (1=Excellent) (2=Good) (3=Fair) (4=Poor)</h1>
    </div>
    <label for="" id="head1">Originality:</label> <br><br>
    <input input type="radio" class="larger" name="originality" value="1" <?php echo ($thisdataEvaluationForm->originality == 1) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspExcellent<br><br>
    <input input type="radio" class="larger" name="originality" value="2" <?php echo ($thisdataEvaluationForm->originality == 2) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspGood<br><br>
    <input input type="radio" class="larger" name="originality" value="3" <?php echo ($thisdataEvaluationForm->originality == 3) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspFair<br><br>
    <input input type="radio" class="larger" name="originality" value="4" <?php echo ($thisdataEvaluationForm->originality == 4) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspPoor<br><br>
    <label for="" id="head1">Contribution To The Field:</label> <br><br>
    <input input type="radio" class="larger" name="contribution_to_field" value="1" <?php echo ($thisdataEvaluationForm->contribution_to_field == 1) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspExcellent<br><br>
    <input input type="radio" class="larger" name="contribution_to_field" value="2" <?php echo ($thisdataEvaluationForm->contribution_to_field == 2) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspGood<br><br>
    <input input type="radio" class="larger" name="contribution_to_field" value="3" <?php echo ($thisdataEvaluationForm->contribution_to_field == 3) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspFair<br><br>
    <input input type="radio" class="larger" name="contribution_to_field" value="4" <?php echo ($thisdataEvaluationForm->contribution_to_field == 4) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspPoor<br><br>
    <label for="" id="head1">Technical Quality:</label> <br><br>
    <input input type="radio" class="larger" name="technical_quality" value="1" <?php echo ($thisdataEvaluationForm->technical_quality == 1) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspExcellent<br><br>
    <input input type="radio" class="larger" name="technical_quality" value="2" <?php echo ($thisdataEvaluationForm->technical_quality == 2) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspGood<br><br>
    <input input type="radio" class="larger" name="technical_quality" value="3" <?php echo ($thisdataEvaluationForm->technical_quality == 3) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspFair<br><br>
    <input input type="radio" class="larger" name="technical_quality" value="4" <?php echo ($thisdataEvaluationForm->technical_quality == 4) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspPoor<br><br>
    <label for="" id="head1">Clarity Of Presentation:</label> <br><br>
    <input input type="radio" class="larger" name="clarity_of_presentation" value="1" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 1) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspExcellent<br><br>
    <input input type="radio" class="larger" name="clarity_of_presentation" value="2" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 2) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspGood<br><br>
    <input input type="radio" class="larger" name="clarity_of_presentation" value="3" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 3) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspFair<br><br>
    <input input type="radio" class="larger" name="clarity_of_presentation" value="4" <?php echo ($thisdataEvaluationForm->clarity_of_presentation == 4) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspPoor<br><br>
    <label for="" id="head1">Depth Of Research:</label> <br><br>
    <input input type="radio" class="larger" name="depth_of_research" value="1" <?php echo ($thisdataEvaluationForm->depth_of_research == 1) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspExcellent<br><br>
    <input input type="radio" class="larger" name="depth_of_research" value="2" <?php echo ($thisdataEvaluationForm->depth_of_research == 2) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspGood<br><br>
    <input input type="radio" class="larger" name="depth_of_research" value="3" <?php echo ($thisdataEvaluationForm->depth_of_research == 3) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspFair<br><br>
    <input input type="radio" class="larger" name="depth_of_research" value="4" <?php echo ($thisdataEvaluationForm->depth_of_research == 4) ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspPoor<br><br>
    <div class="heading">
        <h1 id="head">Recommendation: (mark with X)</h1>
    </div>
    <input type="radio" class="larger" id="accept" name="recommendation" value="accept" <?php echo ($thisdataEvaluationForm->recommendation == "accept") ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspAccept As Is<br><br>
    <input type="radio" class="larger" id="minor" name="recommendation" value="minor" <?php echo ($thisdataEvaluationForm->recommendation == "minor") ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspRequires Minor Corrections<br><br>
    <input type="radio" class="larger" id="moderate" name="recommendation" value="moderate" <?php echo ($thisdataEvaluationForm->recommendation == "moderate") ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspRequires Moderate Revision<br><br>
    <input type="radio" class="larger" id="major" name="recommendation" value="major" <?php echo ($thisdataEvaluationForm->recommendation == "major") ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspRequires Major Revision<br><br>
    <input type="radio" class="larger" id="reject" name="recommendation" value="reject" <?php echo ($thisdataEvaluationForm->recommendation == "reject") ? 'checked' : ''; ?> disabled>&nbsp&nbsp&nbspReject On Ground of (Please Be Specific)<br><br>   
    <input type="text"  name="specific_reject_reason" id="reason" placeholder="Reason for rejection" value="<?php echo $thisdataEvaluationForm->specific_reject_reason ?? ''; ?>" ><br>c
    <input type="checkbox" style="margin-left: 2%;" name="recommendedAsBestPaper" <?php echo ($thisdataEvaluationForm->recommended_as_best_paper === 1) ? 'checked' : ''; ?>>Recommended As Best Paper<br>

    <h2 for="" id="head2" style="text-align: left;">Additional Comment:</h2> <br><br>
    <textarea name="additional_comments" placeholder="Enter......" maxlength="1500">{{ $thisdataEvaluationForm->additional_comments }}</textarea><br><br>
</form>
@endforeach

</body>
</html>
