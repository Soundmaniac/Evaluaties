<?php
    
    include_once("functions.php");
    include_once("dbFunctions.php");
    StartUp();
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
            <div id="header">
                <?php
                    profileFunctioneng();
                ?>
            </div>
            
            <div id="menu">
                <?php
                    menuFunctioneng();
                ?>
                <div class="clear"></div>
            </div>
            
            <div id="content">
                <p>
                    For each question, please mark one box and provide a short explanation.
                </p>
                <form name='reviewForm' action='insertendReview.php' method='POST'>
                    <table id='Tinhoud'>
                <tr >
                    <td class='titel'>
                    1.  Please rate the following course &#160;&#160;&#160;&#160;elements (please tick one box on &#160;&#160;&#160;&#160;each line).

                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td class='center'>
                        5.Very Good
                    </td>
                    <td class='center'>
                        4.Good
                    </td>
                    <td class='center'>
                        3.Average
                    </td>
                    <td class='center'>
                        2.Below Average
                    </td>
                    <td class='center'>
                        1.Poor
                    </td>
                </tr>
                <tr>
                    <td>
                       a.  Appropriateness of difficulty level
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
                        b.  Applicability to your personal situation
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
                        c.  Quality of the course material
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
                        <p>Suggestions and remarks : </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas1" name='txtarea1'></textarea>  
                    </td>
                </tr>

                <tr>
                    <td class='titel'>
                    Course Structure
                    </td>
                </tr>
                <tr>
                    <td>
                    2.  Please rate the following aspects of &#160;&#160;&#160;&#160;the course (Please tick one box on &#160;&#160;&#160;&#160;each line).
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td class='center'>
                        5.Very Good
                    </td>
                    <td class='center'>
                        4.Good
                    </td>
                    <td class='center'>
                        3.Average
                    </td>
                    <td class='center'>
                        2.Below Average
                    </td>
                    <td class='center'>
                        1.Poor
                    </td>
                </tr>
                <tr>
                    <td>
                        a.  Topic sequence
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
                        b.  Tempo
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
                        c.  Course coverage
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
                        d.  Theory/ practice ratio
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
                        e.  Level
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
                        f. &#160;Learning value of the teaching formats used
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
                        <p>Suggestions and remarks : </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas2" name='txtarea2'></textarea>
                    </td>
                </tr>

                <tr>
                    <td class='titel'>
                    Course Material
                    </td>
                </tr>
                <tr>
                    <td>
                   3.  Please rate the following aspects of &#160;&#160;&#160;&#160;the course material (please tick one &#160;&#160;&#160;&#160;box on each line).
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td class='center'>
                        5.Very Good
                    </td>
                    <td class='center'>
                        4.Good
                    </td>
                    <td class='center'>
                        3.Average
                    </td>
                    <td class='center'>
                        2.Below Average
                    </td>
                    <td class='center'>
                        1.Poor
                    </td>
                </tr>
                <tr>
                    <td>
                       a. Quality
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
                        b. Use of language
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
                        c. Content
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
                        d. Clarity
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
                        e. Applicability
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
                        <p>Suggestions and  remarks : </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas3" name='txtarea3'></textarea>
                    </td>
                </tr>
                <tr>
                    <td class='titel'>
                    Teacher / Trainer
                    </td>
                </tr>
                <tr>
                    <td>
                   4. Please rate the teacher/ trainer &#160;&#160;&#160;&#160;concerning the following qualities &#160;&#160;&#160;&#160;(please tick one box on each line).
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td class='center'>
                        5.Very Good
                    </td>
                    <td class='center'>
                        4.Good
                    </td>
                    <td class='center'>
                        3.Average
                    </td>
                    <td class='center'>
                        2.Below Average
                    </td>
                    <td class='center'>
                       1.Poor
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
                        c. Using material and exercises &#160;&#160;&#160;&#160;efficiently
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
                        f. &#160;Teaching formats
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
                        <p>Suggestions and  remarks : </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas4" name='txtarea4'></textarea>
                    </td>
                </tr>
                 <tr>
                    <td>
                    5. Overall
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td class='center'>
                        5.Very Good
                    </td>
                    <td class='center'>
                        4.Good
                    </td>
                    <td class='center'>
                       3.Average
                    </td>
                    <td class='center'>
                        2.Below Average
                    </td>
                    <td class='center'>
                        1.Poor
                    </td>
                </tr>
                <tr>
                    <td>
                        a.  Wat is your overall opinion on the &#160;&#160;&#160;&#160;course?
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
                        b.  Did the course meet your &#160;&#160;&#160;&#160;expectations? If not, please explain.
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
                        <p>Suggesties  en opmerkingen: </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas5" name='txtarea5'></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                    6.  Would you recommend this course &#160;&#160;&#160;&#160;/training to someone else? If not, please &#160;&#160;&#160;&#160;explain.
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
                        <p>7.  Which part did you find most useful &#160;&#160;&#160;&#160;and why? </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas7" name='txtarea7'></textarea>
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>8.  Did you find any section &#160;&#160;&#160;&#160;unnecessary? If so, why?  </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas8" name='txtarea8'></textarea>
                    </td>
                </tr>
                 <tr>
                    <td class='open'>               
                        <p>9.  On which areas did you learn new &#160;&#160;&#160;&#160;skills or make progress? Please &#160;&#160;&#160;&#160;elaborate. </p>
                    </td>
                    <td class='open'>
                    <textarea id="ideas9" name='txtarea9'></textarea>
                    </td>
                </tr>
                <tr>
                    <td class='open'>               
                        <p>10.  How many hours in total have you  &#160;&#160;&#160;&#160;&#160;&#160;spent preparing for this course? </p>
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
                    12.  Are you interested in a follow-up &#160;&#160;&#160;&#160;&#160;&#160;course?
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
                    <input type='submit' name='submit' value='Submit'/>
                    </td>
                </tr>           
            </table>
            <p STYLE="color: red;">After submitting you will be send back to the profile menu.</p>
            </form>
                <div class="clear"> </div>
            </div>
        </div>
        
    </body>

</html>

