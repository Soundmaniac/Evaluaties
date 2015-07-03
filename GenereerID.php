<?php
	
	include_once("functions.php");
	include_once("dbFunctions.php");
	StartUp();
	ini_set( "display_errors", 0);
	AdminOnly();
	
		OpenConnection();
		
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
				<form id="idform" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
					<div class="contentseperate">
						<label class="labelseperate">Gebruikersnaam:</label> <br />
						<label class="labelseperate"> ID: Hier komt de ID</label>
					</div>
					<div class="seperate">
						<input type="text" name="accnaam"/><br />
						<?php
						if($failed == true) {
							if($_POST['accnaam'] == null) {
								echo("<td style='color: red;'> *Voer een geldige gebruikersnaam in </td>");
							}
							if($giu == true) {
								echo("<td style='color: red;'>Deze gebruikersnaam is al in gebruik</td>");
							}
						}
						?>
						<?php /*mijnFunctie();*/ ?><br />
						<input type="submit" name="submit" value="Toevoegen" class="submit"/>
					</div>
					</form>
				<div class="clear"></div>
				<?php
				if($failed == true) {
					echo("<p class='center' style='color: red;'> Toevoegen mislukt </p>");
				}
				else if($succes == true) {
					echo("<p class='center' style='color: green;'>Administrator Toegevoegd</p>");
				}
				?>
			</div>
		</div>
	</body>
</html>
