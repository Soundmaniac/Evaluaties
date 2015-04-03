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
					profileFunction();
				?>
			</div>
			
			<div id="menu">
				<?php
					menuFunction();
				?>
				<div class="clear"></div>
			</div>
			
			<div id="content">

		<p>
		Kruis voor elke vraag s.v.p. &#233;&#233;n vakje aan en geef een korte toelichting.
		</p>

			<form name='reviewForm' action='insertReview.php' method='POST'>

			<table id='Tinhoud'>
				<tr >
					<td class='titel'>
					1.	Hoe zou u de inhoud van de cursus willen beoordelen voor wat betreft:
					</td>
				</tr>
				<tr>
					<td>
						
					</td>
					<td class='center'>
						5. Uitstekend
					</td>
					<td class='center'>
						4. Goed
					</td>
					<td class='center'>
						3.Ruim voldoende
					</td>
					<td class='center'>
						2.Voldoende
					</td>
					<td class='center'>
						1.Onvoldoende
					</td>
				</tr>
				<tr>
					<td>
						a.  Aansluiting op uw startniveau
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
						b.  Toepasbaarheid op uw situatie
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
						c.  Kwaliteit van de lesstof
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
						<p>Suggesties  en opmerkingen: </p>
					</td>
					<td class='open'>
					<textarea id="ideas1" name='txtarea1'></textarea>
					</td>
				</tr>

				<tr>
					<td class='titel'>
					Wat is uw oordeel over de volgende aspecten van uw cursus:
					</td>
				</tr>
				<tr>
					<td>
						
					</td>
					<td class='center'>
						5. Uitstekend
					</td>
					<td class='center'>
						4. Goed
					</td>
					<td class='center'>
						3.Ruim voldoende
					</td>
					<td class='center'>
						2.Voldoende
					</td>
					<td class='center'>
						1.Onvoldoende
					</td>
				</tr>
				<tr>
					<td>
						2.  Structuur van de cursus
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
						3.  Cursusmateriaal
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
						4a. Aanpak van de trainer
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
						4b. Gebruikte werkvormen <br>(oefeningen, inleidingen, rollenspellen etc.)
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
						<p>Suggesties  en opmerkingen: </p>
					</td>
					<td class='open'>
					<textarea id="ideas2" name='txtarea2'></textarea>
					</td>
				</tr>

				<tr>
					<td class='titel'>
					Algemeen
					</td>
				</tr>
				<tr>
					<td>
						
					</td>
					<td class='center'>
						5. Uitstekend
					</td>
					<td class='center'>
						4. Goed
					</td>
					<td class='center'>
						3.Ruim voldoende
					</td>
					<td class='center'>
						2.Voldoende
					</td>
					<td class='center'>
						1.Onvoldoende
					</td>
				</tr>
				<tr>
					<td>
						5.  Wat is uw algemeen oordeel<br> over de cursus tot nu toe?
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
						<p>Suggesties  en opmerkingen: </p>
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
					<input type='submit' name='submit' />
					</td>
				</tr>

			</table>
			<p STYLE="color: red;">Let op! na het verzenden ga je direct terug naar het profiel menu.</p>
	

		</form>

				<div class="clear"> </div>
			</div>
		</div>
		
	</body>

</html>
