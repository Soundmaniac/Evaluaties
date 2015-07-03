<?php
include_once("functions.php");
include_once("dbFunctions.php");
ini_set( "display_errors", 0);
?>

<!DOCTYPE html>

<html>
<head>

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PCI Languages - Final Course Evaluation</title>

</head>
<body>


<div id="container">
<div id="header">
</div>

<div id="menu">
    <?php
    menuFunction();
    ?>
    <div class="clear"></div>
</div>

<div id="content">
<p>
    For each question, please mark one box and provide a short explanation.
</p>
<form name='reviewForm' action='insertendReview.php?lang=eng' method='POST'>
<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>"/> <!--Id uit URL opvragen.  TODO: Ergens een check of id wel ingevuld/ correct is-->
<table class='tableforms'>
<tr >
    <td class='titel'>
        Course Contents
    </td>
</tr>
<tr>
    <td>
        Please rate the following course elements (please tick one box on each time).
    </td>
    <td class='center'>
        5. Very good
    </td>
    <td class='center'>
        4. Good
    </td>
    <td class='center'>
        3. Average
    </td>
    <td class='center'>
        2. Below average
    </td>
    <td class='center'>
        1. Poor
    </td>
</tr>
<tr>
    <td>
        1a. Appropriateness of difficulty level
    </td>
    <td class='center'>
        <input type="radio" name="group1a" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group1a" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group1a" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group1a" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group1a" value="1">
    </td>
</tr>
<tr>
    <td>
        1b. Applicability to your personal situation
    </td>
    <td class='center'>
        <input type="radio" name="group1b" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group1b" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group1b" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group1b" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group1b" value="1">
    </td>
</tr>
<tr>
    <td>
        1c. Quality of the course material
    </td>
    <td class='center'>
        <input type="radio" name="group1c" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group1c" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group1c" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group1c" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group1c" value="1">
    </td>
</tr>
<tr>
    <td class='open'>
        <p>Suggestions and remarks: </p>
    </td>
    <td class='open'>
        <textarea id="ideas1" name='txtarea1'></textarea>
    </td>
</tr>

<tr>

</tr>
<tr>
    <td class='titel'>
        Course structure
    </td>
</tr>
<tr>
    <td>
        Please rate the following aspects of the course (Please tick each one box on each line).
    </td>
    <td class='center'>
        5. Very good
    </td>
    <td class='center'>
        4. Good
    </td>
    <td class='center'>
        3. Average
    </td>
    <td class='center'>
        2. Below average
    </td>
    <td class='center'>
        1. Poor
    </td>
</tr>
<tr>
    <td>
        2a. Topic sequence
    </td>
    <td class='center'>
        <input type="radio" name="group2a" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group2a" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group2a" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group2a" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group2a" value="1">
    </td>
</tr>
<tr>
    <td>
        2b. Tempo
    </td>
    <td class='center'>
        <input type="radio" name="group2b" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group2b" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group2b" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group2b" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group2b" value="1">
    </td>
</tr>
<tr>
    <td>
        2c. Course coverage
    </td>
    <td class='center'>
        <input type="radio" name="group2c" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group2c" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group2c" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group2c" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group2c" value="1">
    </td>
</tr>
<tr>
    <td>
        2d. Theory/practice ratio
    </td>
    <td class='center'>
        <input type="radio" name="group2d" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group2d" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group2d" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group2d" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group2d" value="1">
    </td>
</tr>
<tr>
    <td>
        2e. Level
    </td>
    <td class='center'>
        <input type="radio" name="group2e" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group2e" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group2e" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group2e" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group2e" value="1">
    </td>
</tr>
<tr>
    <td>
        2f. Learning value of the teaching formats used
    </td>
    <td class='center'>
        <input type="radio" name="group2f" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group2f" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group2f" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group2f" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group2f" value="1">
    </td>
</tr>
<tr>
    <td class='open'>
        <p>Suggestions and remarks: </p>
    </td>
    <td class='open'>
        <textarea id="ideas2" name='txtarea2'></textarea>
    </td>
</tr>

<tr>
</tr>
<tr>
    <td class='titel'>
        Course material
    </td>
</tr>
<tr>
    <td>
        Please rate the following aspects of the course material (please tick one box on each line).
    </td>
    <td class='center'>
        5. Very good
    </td>
    <td class='center'>
        4. Good
    </td>
    <td class='center'>
        3. Average
    </td>
    <td class='center'>
        2. Below average
    </td>
    <td class='center'>
        1. Poor
    </td>
</tr>
<tr>
    <td>
        3a. Quality
    </td>
    <td class='center'>
        <input type="radio" name="group3a" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group3a" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group3a" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group3a" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group3a" value="1">
    </td>
</tr>
<tr>
    <td>
        3b. Use of language
    </td>
    <td class='center'>
        <input type="radio" name="group3b" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group3b" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group3b" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group3b" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group3b" value="1">
    </td>
</tr>
<tr>
    <td>
        3c. Content
    </td>
    <td class='center'>
        <input type="radio" name="group3c" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group3c" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group3c" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group3c" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group3c" value="1">
    </td>
</tr>
<tr>
    <td>
        3d. Clarity
    </td>
    <td class='center'>
        <input type="radio" name="group3d" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group3d" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group3d" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group3d" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group3d" value="1">
    </td>
</tr>
<tr>
    <td>
        3e. Applicability
    </td>
    <td class='center'>
        <input type="radio" name="group3e" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group3e" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group3e" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group3e" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group3e" value="1">
    </td>
</tr>
<tr>
    <td class='open'>
        <p>Suggestions and remarks: </p>
    </td>
    <td class='open'>
        <textarea id="ideas3" name='txtarea3'></textarea>
    </td>
</tr>
<tr>
</tr>
<tr>
    <td class='titel'>
        Teacher / Trainer
    </td>
</tr>
<tr>
    <td>
        Please rate the teacher/trainer concerning the following qualities (please tick one box on each line).
    </td>
    <td class='center'>
        5. Very good
    </td>
    <td class='center'>
        4. Good
    </td>
    <td class='center'>
        3. Average
    </td>
    <td class='center'>
        2. Below average
    </td>
    <td class='center'>
        1. Poor
    </td>
</tr>
<tr>
    <td>
        a. Personal presentation
    </td>
    <td class='center'>
        <input type="radio" name="group4a" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group4a" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group4a" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group4a" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group4a" value="1">
    </td>
</tr>
<tr>
    <td>
        b. Explaining the goals of the course
    </td>
    <td class='center'>
        <input type="radio" name="group4b" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group4b" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group4b" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group4b" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group4b" value="1">
    </td>
</tr>
<tr>
    <td>
        c. Using material and exercises efficiently
    </td>
    <td class='center'>
        <input type="radio" name="group4c" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group4c" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group4c" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group4c" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group4c" value="1">
    </td>
</tr>
<tr>
    <td>
        d. Clear explanations
    </td>
    <td class='center'>
        <input type="radio" name="group4d" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group4d" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group4d" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group4d" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group4d" value="1">
    </td>
</tr>
<tr>
    <td>
        e. Tempo
    </td>
    <td class='center'>
        <input type="radio" name="group4e" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group4e" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group4e" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group4e" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group4e" value="1">
    </td>
</tr>
<tr>
    <td>
        f. Teaching formats
    </td>
    <td class='center'>
        <input type="radio" name="group4f" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group4f" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group4f" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group4f" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group4f" value="1">
    </td>
</tr>
<tr>
    <td>
        g. Expertise
    </td>
    <td class='center'>
        <input type="radio" name="group4g" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group4g" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group4g" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group4g" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group4g" value="1">
    </td>
</tr>
<tr>
    <td class='open'>
        <p>Suggestions and remarks: </p>
    </td>
    <td class='open'>
        <textarea id="ideas4" name='txtarea4'></textarea>
    </td>
</tr>
<tr>
</tr>
<tr>
    <td class="titel">
        Overall
    </td>
    <td class='center'>
        5. Very good
    </td>
    <td class='center'>
        4. Good
    </td>
    <td class='center'>
        3. Average
    </td>
    <td class='center'>
        2. Below average
    </td>
    <td class='center'>
        1. Poor
    </td>
</tr>
<tr>
    <td>
        a. What is your overall opinion on the course?
    </td>
    <td class='center'>
        <input type="radio" name="group5a" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group5a" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group5a" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group5a" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group5a" value="1">
    </td>
</tr>
<tr>
    <td>
        b. Did the course meet your expectations? If not, please explain.
    </td>
    <td class='center'>
        <input type="radio" name="group5b" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group5b" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group5b" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group5b" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group5b" value="1">
    </td>
</tr>
<tr>
    <td class='open'>
        <p>Suggestions and remarks: </p>
    </td>
    <td class='open'>
        <textarea id="ideas5" name='txtarea5'></textarea>
    </td>
</tr>
<tr>
    <td>
        6. Would you recommend this course/training to someone else? If not, please explain.
    </td>
    <td class='center'>
        Yes
    </td>
    <td class='center'>
        No
    </td>
</tr>
<tr>
    <td>
    </td>
    <td class='center'>
        <input type="radio" name="group6" value="Ja">
    </td>
    <td class='center'>
        <input type="radio" name="group6" value="Nee">
    </td>
</tr>
<tr>
    <td class='open'>
        <p>7. Which part did you find the most useful and why? </p>
    </td>
    <td class='open'>
        <textarea id="ideas7" name='txtarea7'></textarea>
    </td>
</tr>
<tr>
    <td class='open'>
        <p>8. Did you find any section unnecessary? If so, why? </p>
    </td>
    <td class='open'>
        <textarea id="ideas8" name='txtarea8'></textarea>
    </td>
</tr>
<tr>
    <td class='open'>
        <p>9. On which areas did you learn new skills or make progress? Please elaborate. </p>
    </td>
    <td class='open'>
        <textarea id="ideas9" name='txtarea9'></textarea>
    </td>
</tr>
<tr>
    <td class='open'>
        <p>10. How many hours have you spent preparing for this course? </p>
    </td>
    <td class='open'>
        <textarea id="ideas10" name='txtarea10'></textarea>
    </td>
</tr>
<tr>
    <td>
        11. The length of the course was: 
    </td>
    <td class='center'>
        Just right
    </td>
    <td class='center'>
        Too long
    </td>
    <td class='center'>
        Too short
    </td>
</tr>
<tr>
    <td>
    </td>
    <td class='center'>
        <input type="radio" name="group11" value="Net goed">
    </td>
    <td class='center'>
        <input type="radio" name="group11" value="Te lang">
    </td>
    <td class='center'>
        <input type="radio" name="group11" value="Te kort">
    </td>
</tr>
<tr>
    <td>
        12. Are you interested in a follow-up course?
    </td>
    <td class='center'>
        yes
    </td>
    <td class='center'>
        no
    </td>
</tr>
<tr>
    <td>
    </td>
    <td class='center'>
        <input type="radio" name="group12" value="ja">
    </td>
    <td class='center'>
        <input type="radio" name="group12" value="nee">
    </td>
</tr>
<tr>
    <td class='open'>
        <p>Specific wishes: </p>
    </td>
    <td class='open'>
        <textarea id="ideas12" name='txtarea12'></textarea>
    </td>
</tr>
<tr>
    <td class='open'>
        <p></p>
    </td>
    <td class='open'>
        <input name='testvalues' type='hidden' value='1'>
        <input class="submit" type='submit' name='submit' />
    </td>
</tr>
</table>
</form>
<div class="clear"> </div>
</div>
</div>
</body>
</html>

