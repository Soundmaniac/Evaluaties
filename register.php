<?php
	include_once("functions.php");
	OpenConnection();
		
		if($_POST['accnaam'] != null && $_POST['accww'] != null && $_POST['vnaam'] != null && $_POST['anaam'] != null)
		{
			$result = mysql_query("SELECT * FROM account WHERE gebruiker='" . $_POST['accnaam'] . "'");
			if(mysql_num_rows($result) == 0)
			{						
				mysql_query("
					INSERT INTO `pcilaaw10_test`.`account` (`gebruiker`, `wachtwoord`, `rol`) 
					VALUES ('" . $_POST['accnaam'] . "', '" . $_POST['accww'] . "', 'mentor');
				");
				
				$result = mysql_query("SELECT ID FROM account WHERE gebruiker='" . $_POST['accnaam'] . "' AND wachtwoord='" . $_POST['accww'] . "'");
				while($row = mysql_fetch_array($result))
				{
					$relatie = $row['ID'];
				}
				
				mysql_query("
					INSERT INTO `pcilaaw10_test`.`contactpersoon` (`voornaam`, `achternaam`, `accountID`) 
					VALUES ('" . $_POST['vnaam'] . "', '" . $_POST['anaam'] . "', '" . $relatie . "')
				");
				$succes = true;
				header( 'Location: indexeng.php' );
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

<DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title></title>

	</head>
	<body>
		
		<div id="container">
		
			
			<div id="content">

					
				<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
					
					<table class="tcenter">
						<tr>
							<td> Username: </td> <td><input type="text" name="accnaam"/></td>
							<?php if($failed == true) { if($_POST['accnaam'] == null) { echo("<td style='color: red;'> *Voer een geldige gebruikersnaam in </td>"); }
														if($giu == true) {echo("<td style='color: red;'>Deze gebruikersnaam is al in gebruik</td>");} } ?>
						</tr>
						<tr>
							<td> Password: </td> <td><input type="text" name="accww"/></td>
							<?php if($failed == true) { if($_POST['accww'] == null) { echo("<td style='color: red;'> *Voer een geldige wachtwoord in </td>"); } } ?>
						</tr>
						<tr>
							<td> First name: </td> <td> <input type="text" name="vnaam"/> </td>
							<?php if($failed == true) { if($_POST['vnaam'] == null) { echo("<td style='color: red;'> *Voer een geldige voornaam in </td>"); } } ?>
						</tr>
						<tr>
							<td> Surname: </td> <td> <input type="text" name="anaam"/> </td>
							<?php if($failed == true) { if($_POST['anaam'] == null) { echo("<td style='color: red;'> *Voer een geldige achternaam in </td>"); } } ?>
						</tr>
						<tr>
							<td></td> <td> <input type="submit" name="submit" value="Register" class="submit"/> </td>
						</tr>
					</table>

				
				</form>
					
				
				<div class="clear"> </div>

				<?php if($failed == true) {echo("<p class='center' style='color: red;'> Toevoegen mislukt </p>");}
				else if($succes == true) {echo("<p class='center' style='color: green;'>U heeft zich nu geregistreerd</p>");}?>
			</div>
		</div>
		
	</body>
</html>