<?php
include_once("functions.php");
include_once("dbFunctions.php");
ini_set( "display_errors", 0);
?>

<!DOCTYPE html>

<html>
<head>

    <link rel="stylesheet" type="text/css" href="style.css">
    <title></title>

</head>
<body>

<div id="container">
<?php
if ($_GET["company"] == 1)
{
    echo ("<div id='formheader1'></div>");
}
if ($_GET["company"] == 2)
{
    echo ("<div id='formheader1'></div>");
}
if ($_GET["company"] == 3)
{
    echo ("<div id='formheader3'></div>");
}
if ($_GET["company"] == 4)
{
    echo ("<div id='formheader4'></div>");
}
?>
<div id="menu">
    <?php
    menuFunction();
    ?>
    <div class="clear"></div>
</div>

<div id="content">
<h2>Intermediate course evaluation</h2>
<p>For each question, please mark one box and provide a short explanation.<br /><br />
Text areas are limited to 500 characters.</p>
<form name='reviewForm' action='<?php echo("insertReview.php?lang=eng&course=" . $_GET['course']); ?>' method='POST'>
<!--Id uit URL opvragen.  TODO: Ergens een check of id wel ingevuld/ correct is-->
<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>"/>
<table class="tableforms">
<tbody>
<tr >

</tr>
<tr>
    <td class='titel'>
        Course Contents
    </td>
</tr>
<tr>
    <td>
        Please rate the following course elements:
    </td>
    <td class='center'>
        5. Very Good
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
        1a.  The course fits my starting level
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
        1b.  Applicability to your personal situation
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
        1c.  Quality of the course contents
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
        <p>Comments and suggestions: </p>
    </td>
    <td class='open'>
        <textarea maxlength="500" id="ideas1" name='txtarea1'></textarea>
    </td>
</tr>

<tr>

</tr>
<tr>
    <td class='titel'>
        Please rate the following course elements:
    </td>
    <td class='center'>
        5. Very Good
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
        2. Structure of the course
    </td>
    <td class='center'>
        <input type="radio" name="group2" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group2" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group2" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group2" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group2" value="1">
    </td>
</tr>
<tr>
    <td>
        3. Course material
    </td>
    <td class='center'>
        <input type="radio" name="group3" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group3" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group3" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group3" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group3" value="1">
    </td>
</tr>
<tr>
    <td>
        4a. Trainer&#39;s approach to teaching
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
        4b. The teaching formats used (e.g. exercises, introductions, role play)
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
    <td class='open'>
        <p>Comments and suggestions:</p>
    </td>
    <td class='open'>
        <textarea maxlength="500" id="ideas2" name='txtarea2'></textarea>
    </td>
</tr>
<tr>

</tr>
<tr>
    <td class='titel'>
        Overall
    </td>
    <td class='center'>
        5. Very Good
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
        5. What is your general opinion of the course so far?
    </td>
    <td class='center'>
        <input type="radio" name="group5" value="5">
    </td>
    <td class='center'>
        <input type="radio" name="group5" value="4">
    </td>
    <td class='center'>
        <input type="radio" name="group5" value="3">
    </td>
    <td class='center'>
        <input type="radio" name="group5" value="2">
    </td>
    <td class='center'>
        <input type="radio" name="group5" value="1">
    </td>
</tr>
<tr>
    <td class='open'>
        <p>Comments and suggestions:</p>
    </td>
    <td class='open'>
        <textarea maxlength="500" id="ideas3" name='txtarea3'></textarea>
    </td>
</tr>
<tr>
    <td>

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
</tbody>
</table>
</form>

<div class="clear"> </div>
</div>
</div>

</body>

</html>
