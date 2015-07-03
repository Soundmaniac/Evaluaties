<?php
	include_once("functions.php");
	ini_set( "display_errors", 0);
	StartUp();
	AdminOrVw();

	$failed = null;
	if($_POST['submitsa'] != null)
	{
		if($_POST['vnaam'] != null && $_POST['anaam'] != null)
		{
			OpenConnection();
			
			mysql_query("
				UPDATE student
				SET student.voornaam='" . $_POST['vnaam'] . "', student.tussenvgsl='" . $_POST['tsnvgsl'] . "', student.achternaam='" . $_POST['anaam'] . "',
					student.email='" . $_POST['email'] . "', student.telefoonnummer='" . $_POST['tele'] . "'
				WHERE student.ID='" . $_GET['student'] . "'
			");
			
			$succes = true;
			CloseConnection();
		}
	}
	if($_POST['submitaw'] != null)
	{
		OpenConnection();
		
		$i = 1;
		while($i <= 12)
		{
			mysql_query("UPDATE aanwezigheid SET aanwezig='" . $_POST["" . $i . ""] . "' WHERE lesnummer='" . $i . "' AND studentID='" . $_GET['student'] . "'");
			$i++;
		}
		
		CloseConnection();
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
			
				<form action="<?php echo("showstudent.php?student=" . $_GET['student'] . ""); ?>" method="post">
				<?php
				
					OpenConnection();
					
					$result = mysql_query("SELECT * FROM student WHERE ID='" . $_GET['student'] . "'");
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
					}
					echo("</table><div class='center'>");
					if($_SESSION['rol'] == "admin"){echo("<input type='submit' class='submit' value='Student Aanpassen' name='submitsa'></input>");}
					echo("</div>");
					
					echo("<div class='center'>");
					
					echo("</div>");
					
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
