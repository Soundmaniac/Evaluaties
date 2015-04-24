<?php
	
	include_once("functions.php");
	include_once("dbFunctions.php");
	StartUp();
	ini_set( "display_errors", 0);
	AdminOnly();
	
		Connect();
		
		if($_POST['accnaam'] != null && $_POST['accww'] != null)
		{
			$result = mysql_query("SELECT * FROM account WHERE gebruiker='" . $_POST['accnaam'] . "'");
			if(mysql_num_rows($result) == 0)
			{						
				mysql_query("
					INSERT INTO `project`.`account` (`gebruiker`, `wachtwoord`, `rol`) 
					VALUES ('" . $_POST['accnaam'] . "', '" . $_POST['accww'] . "', 'admin');
				");
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
					
		CloseConnect();
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
							<td></td> <td> <input type="submit" name="submit" value="Toevoegen" class="submit"/> </td>
						</tr>
					</table>
				
				</form>
				
				
				<div class="clear"> </div>
				
				<?php if($failed == true) {echo("<p class='center' style='color: red;'> Toevoegen mislukt </p>");}
					else if($succes == true) {echo("<p class='center' style='color: green;'>Administrator Toegevoegd</p>");}?>
			</div>
		</div>
		
	</body>

</html>
