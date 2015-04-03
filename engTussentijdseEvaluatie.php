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

			<form name='reviewForm' action='insertReview.php' method='POST'>

			<table id='Tinhoud'>
				<tr >
					<td class='titel'>
					1.	Please rate the following course elements:
					</td>
				</tr>
				<tr>
					<td>
						
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
						a.  The course fits my starting level
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
						c.  Quality of the course contents
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
					<textarea id="ideas1" name='txtarea1'></textarea>
					</td>
				</tr>

				<tr>
					<td class='titel'>
					Please rate the following course elements:
					</td>
				</tr>
				<tr>
					<td>
						
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
						2.	Structure of the course
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
						3.	Course material
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
						4b. The teaching formats used (e.g. exercises, &#160; &#160; &#160; &#160;introductions, role play)
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
						<p>Comments and suggestions: </p>
					</td>
					<td class='open'>
					<textarea id="ideas2" name='txtarea2'></textarea>
					</td>
				</tr>

				<tr>
					<td class='titel'>
					Overall
					</td>
				</tr>
				<tr>
					<td>
						
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
						5.  What is your general opinion of the course so far?
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
						<p>Comments and suggestions: </p>
					</td>
					<td class='open'>
					<textarea id="ideas3" name='txtarea3'></textarea>
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
