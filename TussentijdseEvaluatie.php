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
				<p>Kruis voor elke vraag s.v.p. &#233;&#233;n vakje aan en geef een korte toelichting.<br />
				<br />
				Invulvelden zijn gelimiteerd tot 500 karakters.
				</p>
				<form name='reviewForm' action='<?php echo("insertReview.php?lang=nl&course=" . $_GET['course']); ?>' method='POST'>
				<!--Id uit URL opvragen.  TODO: Ergens een check of id wel ingevuld/ correct is-->
				<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>"/>
				<table class="tableforms">
					<tbody>
						<tr >

						</tr>
                        <tr>
                            <td class='titel'>
                                Cursusinhoud
                            </td>
                        </tr>
						<tr>
							<td>
                                Hoe zou u de inhoud van de cursus willen beoordelen voor wat betreft:

                            </td>
							<td class='center'>
								5. Uitstekend
							</td>
							<td class='center'>
								4. Goed
							</td>
							<td class='center'>
								3. Ruim voldoende
							</td>
							<td class='center'>
								2. Voldoende
							</td>
							<td class='center'>
								1. Onvoldoende
							</td>
						</tr>
						<tr>
							<td>
								1a.  Aansluiting op uw startniveau
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
								1b.  Toepasbaarheid op uw situatie
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
								1c.  Kwaliteit van de lesstof
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
								<p>Suggesties en opmerkingen: </p>
							</td>
							<td class='open'>
							<textarea maxlength="500" id="ideas1" name='txtarea1'></textarea>
							</td>
						</tr>

						<tr>

						</tr>
						<tr>
                            <td class='titel'>
                                Wat is uw oordeel over de volgende aspecten van uw cursus:
                            </td>
							<td class='center'>
								5. Uitstekend
							</td>
							<td class='center'>
								4. Goed
							</td>
							<td class='center'>
								3. Ruim voldoende
							</td>
							<td class='center'>
								2. Voldoende
							</td>
							<td class='center'>
								1. Onvoldoende
							</td>
						</tr>
						<tr>
							<td>
								2. Structuur van de cursus
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
								3. Cursusmateriaal
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
							<textarea maxlength="500" id="ideas2" name='txtarea2'></textarea>
							</td>
						</tr>
						<tr>

						</tr>
						<tr>
                            <td class='titel'>
                                Algemeen
                            </td>
							<td class='center'>
								5. Uitstekend
							</td>
							<td class='center'>
								4. Goed
							</td>
							<td class='center'>
								3. Ruim voldoende
							</td>
							<td class='center'>
								2. Voldoende
							</td>
							<td class='center'>
								1. Onvoldoende
							</td>
						</tr>
						<tr>
							<td>
							5. Wat is uw algemeen oordeel over de cursus tot nu toe?
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
								<p>Suggesties en opmerkingen: </p>
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
