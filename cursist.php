<?php
	
	include_once("functions.php");
	include_once("dbFunctions.php");
	StartUp();
	ini_set( "display_errors", 0);
	AdminOnly();
	
		OpenConnection();
		
		if($_POST['woonplaats'] != null && $_POST['adres'] != null && $_POST['vnaam'] != null && $_POST['anaam'] != null 
		&& $_POST['email'] != null && $_POST['tele'] != null && $_POST['dag'] != "default" && $_POST['maand'] != "default" && $_POST['jaar'] != "default")
		{
			$gDate = date("" . $_POST["jaar"] . "-" . $_POST["maand"] . "-" . $_POST["dag"] . "");
			mysql_query("
				INSERT INTO `project`.`cursist` (`voornaam`, `tussenvgsl`, `achternaam`, `geboortedatum`, `adres`, `woonplaats`, `email`, `telefoonnummer`, `ipad`) 
				VALUES ('" . $_POST['vnaam'] . "', '" . $_POST['tsnvgsl'] . "', '" . $_POST['anaam'] . "', " . $gDate . ", '" . $_POST['adres'] . "', '" . $_POST['woonplaats'] . "', '" . $_POST['email'] . "', '" . $_POST['tele'] . "', '" . $_POST['ipad'] . "')
			");
			$succes = true;
		}
		else if(isset($_POST['submit']))
		{
			$failed = true;
		}
					
		CloseConnection();
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
				
				<?php
					
					OpenConnection();
					
					showCursist($_SESSION['showall'], getPage($page));
					
					CloseConnection();
					
					Pages("cursist", "cursist.php");
				
				?>
				
				<hr/>
				
				<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
					
					<table class="tcenter">
						<tr>
							<td> Voornaam: </td> <td> <input type="text" name="vnaam"/> </td>
							<?php if($failed == true) { if($_POST['vnaam'] == null) { echo("<td style='color: red;'> *Voer een geldige voornaam in </td>"); } } ?>
						</tr>
						<tr>
							<td>tussen voegsel: </td> <td><input type="text" name="tsnvgsl"/></td>
						</tr>
						<tr>
							<td> Achternaam: </td> <td> <input type="text" name="anaam"/> </td>
							<?php if($failed == true) { if($_POST['anaam'] == null) { echo("<td style='color: red;'> *Voer een geldige achternaam in </td>"); } } ?>
						</tr>
						<tr>
							<td> Geboortedatum </td>
							<td>
							<?php
								echo("<select name='dag'>");
									$i = 1;
								echo("<option value='default'>Dag</option>");
								while($i <= 31)
								{
									echo("<option value='" . $i . "'>" . $i . "</option>");
									$i++;
								}
									echo("</select>
								<select name='maand'>");
								$i = 1;
								echo("<option value='default'>Maand</option>");
								while($i <= 12)
								{
									echo("<option value='" . $i . "'>" . $i . "</option>");
									$i++;
								}
								echo("</select>
								<select name='jaar'>");
								$i = date("Y") - 60;
								echo("<option value='default'>Jaar</option>");
								while($i <= date("Y") + 0)
								{
									echo("<option value='" . $i . "'>" . $i . "</option>");
									$i++;
								}
								echo("</select></td>");
							
								if($failed == true)
								{
									echo("<td style='color: red;'> *Voer een geldige datum in </td>");
								}
							?>
							</td>
						</tr>
						<tr>
							<td> Adres: </td> <td> <input type="text" name="adres"/> </td>
							<?php if($failed == true) { if($_POST['adres'] == null) { echo("<td style='color: red;'> *Voer een geldige adres in </td>"); } } ?>
						</tr>
						<tr>
							<td> Woonplaats: </td> <td> <input type="text" name="woonplaats"/> </td>
							<?php if($failed == true) { if($_POST['woonplaats'] == null) { echo("<td style='color: red;'> *Voer een geldige woonplaats in </td>"); } } ?>
						</tr>
						<tr>
							<td> E-mail: </td> <td> <input type="text" name="email"/> </td>
							<?php if($failed == true) { if($_POST['email'] == null) { echo("<td style='color: red;'> *Voer een geldige email in </td>"); } } ?>
						</tr>
						<tr>
							<td> Telefoon: </td> <td> <input type="text" name="tele"/> </td>
							<?php if($failed == true) { if($_POST['tele'] == null) { echo("<td style='color: red;'> *Voer een geldige telefoonnummer in </td>"); } } ?>
						</tr>
						<tr>
							<td> Ipad ja/nee: </td> 
							<td> 
								<select name='ipad'>
								  <option value="ja">Ja</option>
								  <option value="nee">Nee</option>
								</select>
							</td>
							<?php if($failed == true) { if($_POST['tele'] == null) { echo("<td style='color: red;'> *Voer een geldige telefoonnummer in </td>"); } } ?>
						</tr>
						<tr>
							<td></td> <td> <input type="submit" name="submit" value="Toevoegen" class="submit"/> </td>
						</tr>
					</table>
				
				</form>
				
				
				<div class="clear"> </div>
				
				<?php if($failed == true) {echo("<p class='center' style='color: red;'> Toevoegen mislukt </p>");}
					else if($succes == true) {echo("<p class='center' style='color: green;'>Cursist Toegevoegd</p>");}?>
			</div>
		</div>
		
	</body>

</html>
