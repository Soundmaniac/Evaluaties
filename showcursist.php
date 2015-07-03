<?php
	include_once("functions.php");
	ini_set( "display_errors", 0);
	StartUp();
	AdminOnly();

	$failed = null;
	if($_POST['vnaam'] != null && $_POST['anaam'] != null)
	{
		OpenConnection();
		
		mysql_query("
			UPDATE cursist
			SET cursist.voornaam='" . $_POST['vnaam'] . "', cursisr.tussenvgsl='" . $_POST['tsnvgsl'] . "', cursist.achternaam='" . $_POST['anaam'] . "',
				cursist.email='" . $_POST['email'] . "', cursist.telefoonnummer='" . $_POST['tele'] . "', cursist.woonplaats='" . $_POST['woonplaats'] . "'
			WHERE cursist.ID='" . $_GET['cursist'] . "'
		");
		
		$succes = true;
		CloseConnection();
	}
	else if($_POST['submit'] != null)
	{
		$failed = true;
	}
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
					profileFunction()
				?>
			</div>
			
			<div id="menu">
				<?php
					menuFunction();
				?>
				<div class="clear"></div>
			</div>
			
			<div id="content">
			
				<form action="<?php echo("showcursist.php?cursist=" . $_GET['cursist'] . ""); ?>" method="post">
				<?php
				
					OpenConnection();
					
					$result = mysql_query("SELECT * FROM cursist WHERE ID='" . $_GET['cursist'] . "'");
					echo("<table class='tcenter'>");
					while($row = mysql_fetch_array($result))
					{
						echo("<tr><td class='text'>Naam: </td> <td class='center'>
								<input type='text' value='" . $row['voornaam'] . "' name='vnaam'> </input>
								<input style='width: 50px;' type='text' value='" . $row['tussenvgsl'] . "' name='tsnvgsl'> </input>
								<input type='text' value='" . $row['achternaam'] . "' name='anaam'> </input>
						</td></tr>");
						echo("<tr><td class='text'>E-mail: </td><td><input type='text' value='" . $row['email'] . "' name='email'</td></tr>");
						echo("<tr><td class='text'>Telefoonnummer: </td><td><input type='text' value='" . $row['telefoonnummer'] . "' name='tele'</td></tr>");
						echo("<tr><td class='text'>Woonplaats: </td><td><input type='text' value='" . $row['woonplaats'] . "' name='woonplaats'</td></tr>");
						
						echo("<tr><td></td><td><input type='submit' class='submit' value='Aanpassen' name='submit'></input></td></tr>");
					}
					
					echo("</table>");
					
					if($failed == true)
					{
						echo("<p style='color: red;'>Aanpassing mislukt</p>");
					}
					else if($succes == true)
					{
						echo("<p style='color: green;'>Aanpassing gelukt</p>");
					}
					
					CloseConnection();
					
				?>
				</form>
						
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>
</html>
