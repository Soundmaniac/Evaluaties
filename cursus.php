<?php
	include_once("functions.php");
	include_once("dbFunctions.php");
	ini_set( "display_errors", 0);
	StartUp();
	AdminOnly();
	
	OpenConnection();
	
	if($_POST['dag1'] != "default" && $_POST['maand1'] != "default" && $_POST['jaar1'] != "default" && $_POST['dag1'] != null && $_POST['maand1'] != null && $_POST['jaar1'] != null
		&& $_POST['dag2'] != "default" && $_POST['maand2'] != "default" && $_POST['jaar2'] != "default" && $_POST['dag2'] != null && $_POST['maand2'] != null && $_POST['jaar2'] != null
		&& $_POST['locatie1'] != null && $_POST['adres1'] != null && $_POST['tijd1'] != null)
	{
		
		mysql_query("
			INSERT INTO cursus (ID, status) VALUES (NULL, '1');
		");
		
		$result = mysql_query("SELECT MAX(ID) AS ID FROM cursus");
		while($row = mysql_fetch_array($result))
		{
			$relatie = $row['ID'];
		}
		
		$startDate1 = "" . $_POST["jaar1"] . "-" . $_POST["maand1"] . "-" . $_POST["dag1"] . "";
		$startDate2 = "" . $_POST["jaar2"] . "-" . $_POST["maand2"] . "-" . $_POST["dag2"] . "";
		
		
		mysql_query("
			INSERT INTO les (lesdatum, leslocatie, adres, tijd, cursusID) 
			VALUES 
			('" . date("Y-m-d", strtotime($startDate1. ' + 0 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate2. ' + 0 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate1. ' + 7 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate2. ' + 7 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate1. ' + 14 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate2. ' + 14 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate1. ' + 21 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate2. ' + 21 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate1. ' + 28 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate2. ' + 28 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate1. ' + 35 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "'),
			('" . date("Y-m-d", strtotime($startDate2. ' + 35 days')) . "', '" . $_POST['locatie1'] . "', '" . $_POST['adres1'] . "', '" . $_POST['tijd1'] . "', '" . $relatie . "');
		");
		
		header( "Location: showcursus.php?cursus=" . $relatie . "" );
	}
	else if(isset($_POST['dag']) && isset($_POST['maand']) && isset($_POST['jaar']))
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
				<?php
					
					OpenConnection();

					showCursus($_SESSION['showall'], getPage($page));
					
					CloseConnection();
					
					Pages("cursus", "cursus.php");					
					
				?>
					<div class="clear"> </div>
					
					<hr/>					
					<h2> Maak een nieuwe cursus </h2>
				
					<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
							
						<table class="center">
							<tr>
								<td>								
								<?php
									$x = 1;
									while($x <= 2)
									{
										echo("Les " . $x . ":");
										echo("<select name='dag" . $x . "'>");
											$i = 1;
										echo("<option value='default'>Dag</option>");
										while($i <= 31)
										{
											echo("<option value='" . $i . "'>" . $i . "</option>");
											$i++;
										}
											echo("</select>
										<select name='maand" . $x . "'>");
										$i = 1;
										echo("<option value='default'>Maand</option>");
										while($i <= 12)
										{
											echo("<option value='" . $i . "'>" . $i . "</option>");
											$i++;
										}
										echo("</select>
										<select name='jaar" . $x . "'>");
										$i = 2013;
										echo("<option value='default'>Jaar</option>");
										while($i <= date("Y") + 2)
										{
											echo("<option value='" . $i . "'>" . $i . "</option>");
											$i++;
										}
										echo("</select><br/>");
										$x++;
									}
								?>
								</td>
								<td>
								<?php
								if($failed == true)
								{
									echo("<td style='color: red;'> *Voer geldige data in </td>");
								}
								?>
								</td>
							</tr>
						</table>
						De andere lessen worden automatisch ingevuld op basis van de eerste 2 lessen.<br/>
						<table>
							<tr>
								<td>Locatie Les 1:</td><td><input type="text" name="locatie1"/></td>
							</tr>
							<tr>
								<td>Adres Les 1:</td><td><input type="text" name="adres1"/></td>
							</tr>
							<tr>
								<td>Tijd Les 1:</td><td><input type="text" name="tijd1"/></td>
							</tr>
						</table>

						<div class='clear'></div>
						<div class='center'><input type='submit' name='submit' value='Nieuwe cursus aanmaken' class='submit'>  </input></div>
					</form>

				<div class="clear"> </div>
			</div>
		</div>

	</body>
</html>
