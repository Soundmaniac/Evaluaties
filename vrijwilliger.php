<?php
	
	include_once("functions.php");
	include_once("dbFunctions.php");
	StartUp();
	ini_set( "display_errors", 0);
	AdminOnly();
	
		OpenConnection();
		
		if($_POST['accnaam'] != null && $_POST['accww'] != null && $_POST['vnaam'] != null && $_POST['anaam'] != null 
		&& $_POST['email'] != null && $_POST['tele'] != null)
		{
			$result = mysql_query("SELECT * FROM account WHERE gebruiker='" . $_POST['accnaam'] . "'");
			if(mysql_num_rows($result) == 0)
			{						
				mysql_query("
					INSERT INTO `project`.`account` (`gebruiker`, `wachtwoord`, `rol`) 
					VALUES ('" . $_POST['accnaam'] . "', '" . $_POST['accww'] . "', 'vrijwilliger');
				");
				
				$result = mysql_query("SELECT ID FROM account WHERE gebruiker='" . $_POST['accnaam'] . "' AND wachtwoord='" . $_POST['accww'] . "'");
				while($row = mysql_fetch_array($result))
				{
					$relatie = $row['ID'];
				}
				
				mysql_query("
					INSERT INTO `project`.`vrijwilliger` (`voornaam`, `tussenvgsl`, `achternaam`, `email`, `telefoonnummer`, `accountID`, `cursusID`) 
					VALUES ('" . $_POST['vnaam'] . "', '" . $_POST['tsnvgsl'] . "', '" . $_POST['anaam'] . "', '" . $_POST['email'] . "', '" . $_POST['tele'] . "', '" . $relatie . "')
				");
				$succes = true;
			}
			else
			{
				$failed = true;
				$giu = true;
			}
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
					
					showVrijwilliger($_SESSION['showall'], getPage($page));
					
					CloseConnection();
					
					Pages("mentor", "mentor.php");
				
				?>
				
				<hr/>
				
				<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
					
					<table class="tcenter">
						<tr>
							<td>Gebruikersnaam: </td> <td><input type="text" name="accnaam"/></td>
							<?php if($failed == true) { if($_POST['accnaam'] == null) { echo("<td style='color: red;'> *Voer een geldige gebruikersnaam in </td>"); }
														if($giu == true) {echo("<td style='color: red;'>Deze gebruikersnaam is al in gebruik</td>");} } ?>
						</tr>
						<tr>
							<td>Wachtwoord: </td> <td><input type="text" name="accww"/></td>
							<?php if($failed == true) { if($_POST['accww'] == null) { echo("<td style='color: red;'> *Voer een geldige wachtwoord in </td>"); } } ?>
						</tr>
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
							<td> E-mail: </td> <td> <input type="text" name="email"/> </td>
							<?php if($failed == true) { if($_POST['email'] == null) { echo("<td style='color: red;'> *Voer een geldige email in </td>"); } } ?>
						</tr>
						<tr>
							<td> Telefoon: </td> <td> <input type="text" name="tele"/> </td>
							<?php if($failed == true) { if($_POST['tele'] == null) { echo("<td style='color: red;'> *Voer een geldige telefoonnummer in </td>"); } } ?>
						</tr>
						<tr>
							<td></td> <td> <input type="submit" name="submit" value="Toevoegen" class="submit"/> </td>
						</tr>
					</table>
				
				</form>
				
				
				<div class="clear"> </div>
				
				<?php if($failed == true) {echo("<p class='center' style='color: red;'> Toevoegen mislukt </p>");}
					else if($succes == true) {echo("<p class='center' style='color: green;'>Vrijwilliger Toegevoegd</p>");}?>
			</div>
		</div>
		
	</body>

</html>
