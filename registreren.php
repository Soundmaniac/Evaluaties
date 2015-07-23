<?php
	include_once("functions.php");
	OpenConnection();
	
	$giu = false;
	/*TO DO: Remove roles*/
	if(isset($_POST['accnaam']) && isset($_POST['accww']) && isset($_POST['vnaam']) && isset($_POST['anaam']))
	{
		if($_POST['accnaam'] != null && $_POST['accww'] != null && $_POST['vnaam'] != null && $_POST['anaam'] != null)
		{
			$result = mysql_query("SELECT * FROM account WHERE gebruiker='" . $_POST['accnaam'] . "'");
			if(mysql_num_rows($result) == 0)
			{						
				mysql_query("
					INSERT INTO `project`.`account` (`gebruiker`, `wachtwoord`, `rol`) 
					VALUES ('" . $_POST['accnaam'] . "', '" . $_POST['accww'] . "', 'admin');
				");
				
				$result = mysql_query("SELECT ID FROM account WHERE gebruiker='" . $_POST['accnaam'] . "' AND wachtwoord='" . $_POST['accww'] . "'");
				while($row = mysql_fetch_array($result))
				{
					$relatie = $row['ID'];
				}
				
				mysql_query("
					INSERT INTO `project`.`contactpersoon` (`voornaam`, `achternaam`, `accountID`) 
					VALUES ('" . $_POST['vnaam'] . "', '" . $_POST['anaam'] . "', '" . $relatie . "')
				");
				$succes = true;
				header( 'Location: index.php' );
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
	}
	
	CloseConnection();
?>

<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>PCI Languages - Evaluatie registreren</title>
	</head>
	<body>
		<div id="register">
			<h2>Registreer u op PCI Languages - evaluaties</h2>
				<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
					<table class="tcenter">
						<tr>
							<td>Gebruikersnaam: </td>
							<td><input type="text" name="accnaam"/></td>
							<?php
							if(isset($failed) && isset($giu))
							{
								if($failed)
								{
									if($_POST['accnaam'] == null)
									{
										echo("<td style='color: red;'> *Voer een geldige gebruikersnaam in </td>");
									}
									if($giu)
									{
										echo("<td style='color: red;'>Deze gebruikersnaam is al in gebruik</td>");
									}
								}
							}
							?>
						</tr>
						<tr>
							<td>Wachtwoord: </td> <td><input type="text" name="accww"/></td>
							<?php
							if(isset($failed))
							{
								if($failed)
								{
									if($_POST['accww'] == null)
									{
										echo("<td style='color: red;'> *Voer een geldige wachtwoord in </td>");
									}
								}
							}
							?>
						</tr>
						<tr>
							<td>Voornaam: </td>
							<td><input type="text" name="vnaam"/></td>
							<?php
							if(isset($failed))
							{
								if($failed)
								{
									if($_POST['vnaam'] == null)
									{
										echo("<td style='color: red;'> *Voer een geldige voornaam in </td>");
									}
								}
							}
							?>
						</tr>
						<tr>
							<td>Achternaam: </td>
							<td><input type="text" name="anaam"/></td>
							<?php
							if(isset($failed))
							{
								if($failed)
								{
									if($_POST['anaam'] == null)
									{
										echo("<td style='color: red;'> *Voer een geldige achternaam in </td>");
									}
								}
							}
							?>
						</tr>
					</table>
					<div class="clear"> </div>
					<input type="submit" name="submit" value="Aanmaken" class="submit"/>
					<a href="/index.php" class="formbtn">Terug</a>
					<div class="clear"> </div>
				</form>
				<?php
				if(isset($failed) && isset($succes))
				{
					if($failed)
					{
						echo("<p class='center' style='color: red;'> Toevoegen mislukt </p>");
					}
					else if($succes)
					{
						echo("<p class='center' style='color: green;'>U heeft zich nu geregistreerd</p>");
					}
				}
				?>
		</div>
	</body>
</html>