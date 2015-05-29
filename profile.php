<?php
	include_once("functions.php");	ini_set( "display_errors", 0);

	StartUp();
	$failed = null;

	if(isset($_POST['values']))
	{

		Connect();
		
		$selectIDSQL = mysql_query("SELECT ID FROM account WHERE gebruiker = '$_SESSION[gebruiker]'");
		$selectedID = mysql_fetch_array($selectIDSQL);
		$day = $_POST['dag'];
		$month = $_POST['maand'];
		$year = $_POST['jaar'];
		$dob = $year.'-'.$month.'-'.$day;
		mysql_query("
			UPDATE contactpersoon
			SET contactpersoon.voornaam='" . $_POST['vnaam'] . "', 
			contactpersoon.achternaam='" . $_POST['anaam'] . "',
			contactpersoon.bedrijfnaam='" . $_POST['bnaam'] . "', 
			contactpersoon.cursus='" . $_POST['cnaam'] . "',
			contactpersoon.trainer='" . $_POST['tnaam'] . "', 
			contactpersoon.plaats='" . $_POST['pnaam'] . "',
			contactpersoon.datum='" . $dob . "'
			WHERE accountID='" . $selectedID['ID'] . "'
		");
		
		$succes = true;
		CloseConnect();
	}

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
					profileFunctioneng()
				?>
			</div>
			
			<div id="menu">
				<?php
					menuFunction();
				?>
				<div class="clear"> </div>
			</div>
			
			<div id="content">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<?php
					Connect();
					
					$result = mysql_query("SELECT * FROM account WHERE gebruiker='" . $_SESSION['gebruiker'] . "'");
					while ($row = mysql_fetch_array($result))
					{	
						$gebruiker = $row['ID'];
					}
					
					$result = mysql_query("SELECT * FROM contactpersoon WHERE accountID='" . $gebruiker . "'");
					echo("<table>");
					while ($row = mysql_fetch_array($result))
					{
						echo("<tr><td class='text'>Name: </td> <td class='center'>
								<input type='text' value='" . $row['voornaam'] . "' name='vnaam'> </input>
								<input type='text' value='" . $row['achternaam'] . "' name='anaam'> </input>
						</td></tr>");
						echo("<tr><td class='text'>Company name: </td> <td class='center'>
								<input type='text' value='" . $row['bedrijfnaam'] . "' name='bnaam'> </input>
						</td></tr>");
						echo("<tr><td class='text'>Course: </td> <td class='center'>
								<input type='text' value='" . $row['cursus'] . "' name='cnaam'> </input>
						</td></tr>");
						echo("<tr><td class='text'>Trainer: </td> <td class='center'>
								<input type='text' value='" . $row['trainer'] . "' name='tnaam'> </input>
						</td></tr>");
						echo("<tr><td class='text'>Location: </td> <td class='center'>
								<input type='text' value='" . $row['plaats'] . "' name='pnaam'> </input>
						</td></tr>");
					
						echo("<table><tr><td class='center'>Date DD-MM-YYYY</td></tr>");
						echo("<tr><td class='center'>");

						echo("<select name='dag'>");
						$i = 1;
						echo("<option value='" . date("d", strtotime($startDate. ' + 0 days')) . "'>" . date("d", strtotime($startDate. ' + 0 days')) . "</option>");
						while($i <= 31)
						{
							echo("<option value='" . $i . "'>" . $i . "</option>");
							$i++;
						}
						echo("</select>");
						
						echo("<select name='maand'>");
						$i = 1;
						echo("<option value='" . date("m", strtotime($startDate. ' + 0 days')) . "'>" . date("m", strtotime($startDate. ' + 0 days')) . "</option>");
						while($i <= 12)
						{
							echo("<option value='" . $i . "'>" . $i . "</option>");
							$i++;
						}
						echo("</select>
						<select name='jaar'>");
						$i = 2013;
						echo("<option value='" . date("Y", strtotime($startDate. ' + 0 days')) . "'>" . date("Y", strtotime($startDate. ' + 0 days')) . "</option>");
						while($i <= date("Y") + 2)
						{
							echo("<option value='" . $i . "'>" . $i . "</option>");
							$i++;
						}
						echo("</select>");
						echo("<tr><td>
								<input type='hidden' value='1' name='values'>
								</td><td><input type='submit' class='submit' value='Adjust' name='submit'></input>
						</td></tr>");
												
					}
					echo("</table>");
					
					
					// $result = mysql_query("SELECT * FROM vrijwilliger WHERE accountID='" . $gebruiker . "'");
					// if(mysql_num_rows($result) == 1)
					// {
						// while ($row = mysql_fetch_array($result))
						// {
							// $gebruiker = $row['ID'];
						// }
					// }
					
					// if($_SESSION['rol'] == "vrijwilliger")
					// {
						// echo("<hr/><table>");
						// $result1 = mysql_query("SELECT * FROM cursus INNER JOIN vwrelatie ON cursus.ID = vwrelatie.cursusID WHERE vwrelatie.vrijwilligerID = '" . $gebruiker . "'");
						// while($row1 = mysql_fetch_array($result1))
						// {
							// echo("<tr><td><a href='showcursus.php?cursus=" . $row1['ID'] . "'>" . $row1['ID'] . "</a></td><td>");
							// $result2 = mysql_query("SELECT * FROM student WHERE cursusID = '" . $row1['ID'] . "'");
							// if(mysql_num_rows($result2) != 0)
							// {
								// while($row2 = mysql_fetch_array($result2))
								// {
									// echo("<a href='showstudent.php?student=" . $row2['ID'] . "'>" . $row2['voornaam'] . " " . $row2['tussenvgsl'] . " " . $row2['achternaam'] . ",</a> ");
								// }
							// }
							// else
							// {
								// echo("Geen student gevonden");
							// }
							// echo("</td></tr>");
						// }
						// echo("</table>");
					// }
					
					CloseConnect();
				?>
				</form>
				
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>
</html>
