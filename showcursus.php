<?php
	include_once("functions.php");
	ini_set( "display_errors", 0);
	StartUp();
	AdminOnly();
		
	


?>

<DOCTYPE html>

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
				<div>
				<div class="cleft">
				<?php
					Connect();
					
					echo("<table>");
					$result = mysql_query("SELECT * FROM cursus WHERE cursus.id='" . $_GET['cursus'] . "'");
					while($row = mysql_fetch_array($result))
					{
						echo("<tr><td>Cursus nummer: </td><td>" . $row['ID'] . " | <a href='cursuswijzigen.php?cursus=" . $_GET['cursus'] . "'>Cursus wijzigen</a></td></tr>");
					}
					
					$result = mysql_query("
						SELECT vrijwilliger.ID, vrijwilliger.voornaam, vrijwilliger.achternaam
						FROM vrijwilliger
						JOIN vwrelatie ON vrijwilliger.ID = vwrelatie.vrijwilligerID
						JOIN cursus ON vwrelatie.cursusID = cursus.ID
						WHERE cursus.ID='" . $_GET['cursus'] . "'
					");
					if(mysql_num_rows($result) == 0)
					{
						echo("<tr><td>Geen vrijwilliger gevonden.</td><td></td></tr>");
					}
					else
					{
						while($row = mysql_fetch_array($result))
						{
							echo("<tr><td>Vrijwilliger:</td><td> <a href='showvolunteer.php?vrijwilliger=" . $row["ID"] . "'>" . $row['voornaam'] . " " . $row['achternaam'] . "</a></td></tr>");
						}
					}					
					
					$result = mysql_query("SELECT * FROM student WHERE cursusID='" . $_GET['cursus'] . "'");
					if(mysql_num_rows($result) == 0)
					{
						echo("<tr><td>Geen student gevonden.</td><td></td></tr>");
					}
					else
					{
						while($row = mysql_fetch_array($result))
						{						
							echo("<tr><td>Student:</td><td> <a href='showstudent.php?student=" . $row["ID"] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</a></td></tr>");
						}
					}
					echo("</table></div>");
					
					echo("<div class='cleft'><table><tr><td>Cursisten</td></tr>");
					$result = mysql_query("SELECT * FROM cursist WHERE cursusID='" . $_GET['cursus'] . "'");
					while($row = mysql_fetch_array($result))
					{
						echo("<tr><td><a href='showcursist.php?cursist=" . $row["ID"] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</a></td></tr>");
					}
					if(mysql_num_rows($result) == 0)
					{
						echo("<tr><td>Geen cursisten gevonden</td></tr>");
					}
					echo("</table></div><div class='clear'></div></div><br/>");
					
					
					$result = mysql_query("SELECT * FROM les WHERE cursusID='" . $_GET['cursus'] . "' ORDER BY lesdatum");
					echo("<table><tr><td class='center'>Datum DD-MM-YYYY</td><td class='center'>Locatie</td>
						<td class='center'>Adres</td><td class='center'>Tijd</td></tr>");
					while($row = mysql_fetch_array($result))
					{
						echo("<tr><td class='center'>");
						
						$result2 = mysql_query("SELECT * FROM les WHERE les.ID = (SELECT MIN(les.ID) FROM les WHERE cursusID = " . $_GET['cursus'] . ")");
						
						$row2 = mysql_fetch_array($result2);
						
						$startDate = $row['lesdatum'];
						
						
						
						echo("<select name='dag" . $row['ID'] . "'>");
						$i = 1;
						echo("<option value='" . date("d", strtotime($startDate. ' + 0 days')) . "'>" . date("d", strtotime($startDate. ' + 0 days')) . "</option>");
						while($i <= 31)
						{
							echo("<option value='" . $i . "'>" . $i . "</option>");
							$i++;
						}
						echo("</select>");
						
						echo("<select name='maand" . $row['ID'] . "'>");
						$i = 1;
						echo("<option value='" . date("m", strtotime($startDate. ' + 0 days')) . "'>" . date("m", strtotime($startDate. ' + 0 days')) . "</option>");
						while($i <= 12)
						{
							echo("<option value='" . $i . "'>" . $i . "</option>");
							$i++;
						}
						echo("</select>
						<select name='jaar" . $row['ID'] . "'>");
						$i = 2013;
						echo("<option value='" . date("Y", strtotime($startDate. ' + 0 days')) . "'>" . date("Y", strtotime($startDate. ' + 0 days')) . "</option>");
						while($i <= date("Y") + 2)
						{
							echo("<option value='" . $i . "'>" . $i . "</option>");
							$i++;
						}
						echo("</select><a href='showles.php?les=" . $row['ID'] . "&cursus=" . $_GET['cursus'] . "'>Wijzigen</a>");
						
						echo("</td> <td class='center'>" . $row['leslocatie'] . "</td>
						<td class='center'>" . $row['adres'] . "</td><td class='center'>" . $row['tijd'] . "</td></tr>");
					}
					echo("</table>");

					
					
					CloseConnect();
				?>
				<div class="clear"> </div>				
			</div>
		</div>
		
	</body>
</html>
