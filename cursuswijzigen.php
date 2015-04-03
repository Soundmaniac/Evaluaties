<?php
	include_once("functions.php");
	include_once("dbFunctions.php");
	ini_set( "display_errors", 0);
	StartUp();
	AdminOnly();
	
	if($_POST['vrijwilliger'] != null && $_POST['submitvw'] != null)
	{
		Connect();
		mysql_query("INSERT INTO vwrelatie (cursusID, vrijwilligerID) VALUES (" . $_GET['cursus'] . ", " . $_POST['vrijwilliger'] . ")");
		CloseConnect();
	}
	if($_POST['verwijdervw'] == 'true' && $_POST['submitvw'] != null)
	{
		Connect();
		mysql_query("DELETE FROM vwrelatie WHERE cursusID=" . $_GET['cursus'] . ";");
		CloseConnect();
	}
	
	if($_POST['submitst'] != null)
	{
		Connect();
		foreach($_POST as $value)
		{
			mysql_query("
				UPDATE student
				SET student.cursusID='" . $_GET['cursus'] . "'
				WHERE student.ID='" . $value . "'
			");
			
			mysql_query("
				INSERT INTO `project`.`aanwezigheid` (`lesID`, `studentID`) 
				VALUES ('" . $_POST['accnaam'] . "', '" . $value . "');
			");
		}
		CloseConnect();
	}
	
	if($_POST['submitdv'] != null)
	{
		Connect();
		foreach($_POST as $value)
		{
			mysql_query("UPDATE cursist SET cursusID = NULL WHERE ID=" . $value . "");
		}
		CloseConnect();
	}
	if($_POST['submitdt'] != null)
	{
		Connect();
		foreach($_POST as $value)
		{
			mysql_query("UPDATE cursist SET cursusID = " . $_GET['cursus'] . " WHERE ID=" . $value . "");
		}
		CloseConnect();
	}
	
	if($_POST['submitsv'] != null)
	{
		Connect();
		foreach($_POST as $value)
		{
			mysql_query("UPDATE aanwezigheid SET lesnummer = NULL");
			mysql_query("UPDATE student	SET student.cursusID = NULL	WHERE student.ID='" . $value . "';");
		}
		CloseConnect();
	}
	
	if($_POST['submitst'] != null)
	{
		Connect();
		$result = mysql_query("SELECT MIN(ID) FROM les WHERE les.cursusID = '" . $_GET['cursus'] . "'");
		while($row = mysql_fetch_array($result))
		{
			$minID = int($row['ID']);
		}
		
		$result = mysql_query("SELECT * FROM les WHERE les.cursusID = " . $_GET['cursus'] . "");
		$aantalLes = mysql_num_rows($result);
		
		foreach($_POST as $value)
		{
			mysql_query("UPDATE student	SET student.cursusID = " . $_GET['cursus'] . " WHERE student.ID='" . $value . "'");
			$i = 0;
			while($i <= 11)
			{
				mysql_query("UPDATE aanwezigheid SET lesnummer = " . $minID + $i . " WHERE student.ID='" . $value . "'");
				$i++;
			}
		}
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
			
				<form action="<?php echo("cursuswijzigen.php?cursus=" . $_GET['cursus'] . "");?>" method="post">
					<?php
						Connect();
						$result = mysql_query("
							SELECT cursus.ID cID, vrijwilliger.ID vID, vrijwilliger.voornaam, vrijwilliger.tussenvgsl, vrijwilliger.achternaam
							FROM cursus
							INNER JOIN vwrelatie ON cursus.ID = vwrelatie.cursusID
							INNER JOIN vrijwilliger ON vwrelatie.vrijwilligerID = vrijwilliger.ID
							WHERE cursus.ID='" . $_GET['cursus'] . "'
						");
						
						echo("<h1>" . $minId . "<a href='showcursus.php?cursus=" . $_GET['cursus'] . "'>Cursus nummer: " . $_GET['cursus'] . "</a></h1><div style='margin-bottom: 10px;'><div class='cleft'>");
						
						if(mysql_num_rows($result) == 0)
						{
							$result = mysql_query("SELECT * FROM vrijwilliger");
							echo("Vrijwilliger: Geen<br/>");
							while($row = mysql_fetch_array($result))
							{
								echo("<input type='radio' name='vrijwilliger' value='" . $row['ID'] . "'/>
								<a href='showvolunteer.php?vrijwilliger=" . $row['ID'] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</a><br/>");
							}
						}
						else
						{
							while($row = mysql_fetch_array($result))
							{
								echo("Vrijwilliger: <a href='showvolunteer.php?vrijwilliger=" . $row['vID'] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</a> /
								<input type='checkbox' name='verwijdervw' value='true'/> Verwijderen van cursus");
							}
						}
						echo("</div>");
						CloseConnect();
						
					?>
					<div class="clear"></div>
					</div>
					
					<div class="center">
						<input type="submit" name="submitvw" value="Vrijwilliger wijzigen" class="submit"/>
					</div><br/>
				
					<hr/>
					<div>
						<h2>Cursisten beheer</h2>
						<div class="cleft">
							<?php
								Connect();
								$result = mysql_query("SELECT * FROM cursist WHERE cursusID=" . $_GET['cursus'] . "");
								if(mysql_num_rows($result) == 0)
								{
									echo("Cursisten: geen<br/>");
								}
								else
								{
									echo("Cursisten: <br/>");
									while($row = mysql_fetch_array($result))
									{
										echo("
											<input type='checkbox' name='dv" . $row['ID'] . "' value='" . $row['ID'] . "'></input>
											<a href='showcursist.php?cursist=" . $row['ID'] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</a><br/>
										");
									}
								}
								CloseConnect();
							?>
							<input type="submit" name="submitdv" value="Deelnemers verwijderen" class="submit"/>
						</div>
						<div class="cright">
							<?php
								Connect();
								echo("Beschikbare cursisten:<br/>");
								$result = mysql_query("SELECT * FROM cursist WHERE cursusID IS NULL");
								while($row = mysql_fetch_array($result))
								{
									echo("
										<input type='checkbox' name='dt" . $row['ID'] . "' value='" . $row['ID'] . "'></input>
										<a href='showcursist.php?cursist=" . $row['ID'] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</a><br/>"
									);
								}
								CloseConnect();
							?>
							<input type="submit" name="submitdt" value="Deelnemers toevoegen" class="submit"/>
						</div>
					</div>
					<div class="clear"></div><br/>
					<hr/><br/>
					
					<hr/>
					<div>
						<h2>Studenten beheer</h2>
						<div class="cleft">
							<?php
								Connect();
								$result = mysql_query("SELECT * FROM student WHERE cursusID=" . $_GET['cursus'] . "");
								if(mysql_num_rows($result) == 0)
								{
									echo("Studenten: geen<br/>");
								}
								else
								{
									echo("Studenten: <br/>");
									while($row = mysql_fetch_array($result))
									{
										echo("
											<input type='checkbox' name='sv" . $row['ID'] . "' value='" . $row['ID'] . "'></input>
											<a href='showcursist.php?cursist=" . $row['ID'] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</a><br/>
										");
									}
								}
								CloseConnect();
							?>
							<input type="submit" name="submitsv" value="Studenten verwijderen" class="submit"/>
						</div>
						<div class="cright">
							<?php
								Connect();
								$result = mysql_query("SELECT * FROM student WHERE cursusID IS NULL");
								if(mysql_num_rows($result) == 0)
								{
									echo("Beschikbare studenten:<br/>geen<br/>");
								}
								else
								{
									echo("Beschikbare studenten: <br/>");
									while($row = mysql_fetch_array($result))
									{
										echo("
											<input type='checkbox' name='st" . $row['ID'] . "' value='" . $row['ID'] . "'></input>
											<a href='showstudent.php?student=" . $row['ID'] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</a><br/>
										");
									}
								}
								CloseConnect();
								echo $s;
							?>
							<input type="submit" name="submitst" value="Studenten toevoegen" class="submit"/>
						</div>
					</div>
					<div class="clear"></div>
					<hr/>
				</form>
				
			</div>
		</div>
		
	</body>
</html>
