<?php
	include_once("functions.php");
	ini_set( "display_errors", 0);
	StartUp();
	AdminOnly();
	
	$failed = null;
	if($_POST['vnaam'] != null && $_POST['anaam'] != null)
	{
		Connect();
		
		mysql_query("
			UPDATE vrijwilliger
			SET vrijwilliger.voornaam='" . $_POST['vnaam'] . "', vrijwilliger.tussenvgsl='" . $_POST['tsnvgsl'] . "', vrijwilliger.achternaam='" . $_POST['anaam'] . "',
				vrijwilliger.email='" . $_POST['email'] . "', vrijwilliger.telefoonnummer='" . $_POST['tele'] . "'
			WHERE vrijwilliger.ID='" . $_GET['vrijwilliger'] . "'
		");
		
		$succes = true;
		CloseConnect();
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
			
				<form action="<?php echo("showvolunteer.php?vrijwilliger=" . $_GET['vrijwilliger'] . ""); ?>" method="post">
				<?php
				
					Connect();
					
					$result = mysql_query("SELECT * FROM vrijwilliger WHERE ID='" . $_GET['vrijwilliger'] . "'");
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
				?>
				
				<div class="center">
				Cursussen waar deze vrijwilliger bij betrokken is:<br/>
				<?php
					$result = mysql_query("
					SELECT cursus.ID cID
					FROM cursus
					INNER JOIN vwrelatie ON cursus.ID = vwrelatie.cursusID
					WHERE vwrelatie.vrijwilligerID='" . $_GET['vrijwilliger'] . "'");
					while($row = mysql_fetch_array($result))
					{
						echo("<a href=showcursus.php?cursus=" . $row['cID'] . "> " . $row['cID'] . ",</a> ");
					}
					
					CloseConnect();
				?>
				</div>
				</form>
						
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>
</html>
