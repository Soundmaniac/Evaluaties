<?php
	
	include_once("functions.php");
	include_once("dbFunctions.php");
	StartUp();
	ini_set( "display_errors", 0);
	AdminOnly();
	
		OpenConnection();
		
		if($_POST['vnaam'] != null && $_POST['anaam'] != null && $_POST['email'] != null && $_POST['tele'] != null && $_POST['mentor'] != "select")
		{
			mysql_query("
				INSERT INTO `project`.`student` (`voornaam`, `tussenvgsl`, `achternaam`, `email`, `telefoonnummer`, `mentorID`) 
				VALUES ('" . $_POST['vnaam'] . "', '" . $_POST['tsnvgsl'] . "', '" . $_POST['anaam'] . "', '" . $_POST['email'] . "', '" . $_POST['tele'] . "', '" . $_POST['mentor'] . "')
			");
			
			$result = mysql_query("SELECT MAX(ID) AS ID FROM student");
			while($row = mysql_fetch_array($result))
			{
				$relatie = $row['ID'];
			}
			
			mysql_query("
				INSERT INTO `project`.`aanwezigheid` (studentID, lesnummer)
				VALUES
				('" . $relatie . "', '1'), ('" . $relatie . "', '2'), ('" . $relatie . "', '3'),
				('" . $relatie . "', '4'), ('" . $relatie . "', '5'), ('" . $relatie . "', '6'),
				('" . $relatie . "', '7'), ('" . $relatie . "', '8'), ('" . $relatie . "', '9'),
				('" . $relatie . "', '10'), ('" . $relatie . "', '11'), ('" . $relatie . "', '12')
			");
			$succes = true;
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
				
				<?php
					
					Connect();
					
					showStudent($_SESSION['showall'], getPage($page));
					
					CloseConnect();
					
					Pages("cursist", "cursist.php");
				
				?>
				
				<hr/>
				
				<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
					
					<table class="tcenter">
						<tr>
							<td> Voornaam: </td> <td> <input type="text" name="vnaam"/> </td>
							<?php if($failed == true) { if($_POST['vnaam'] == null) { echo("<td style='color: red;'> *Voer een geldige voornaam in </td>"); } } ?>
						</tr>
						<tr>
							<td>tussen voegsel: </td> <td><input type="text" name="tsnvgsl"/></td>
						</tr>
						<tr>
							<td> Achternaam: </td> <td> <input type="text" name="anaam"/> </td>
							<?php if($failed == true) { if($_POST['anaam'] == null) { echo("<td style='color: red;'> *Voer een geldige achternaam in </td>"); } } ?>
						</tr>
						<tr>
							<td> E-mail: </td> <td> <input type="text" name="email"/> </td>
							<?php if($failed == true) { if($_POST['email'] == null) { echo("<td style='color: red;'> *Voer een geldige email in </td>"); } } ?>
						</tr>
						<tr>
							<td> Telefoon: </td> <td> <input type="text" name="tele"/> </td>
							<?php if($failed == true) { if($_POST['tele'] == null) { echo("<td style='color: red;'> *Voer een geldige telefoonnummer in </td>"); } } ?>
						</tr>
						<tr>
							<td> Mentor: </td> <td> <select name="mentor">
							<option value="select">Selecteer een mentor</option>
							<?php
							Connect();
							
								$result = mysql_query("SELECT mentor.ID, mentor.voornaam, mentor.tussenvgsl, mentor.achternaam, school.naam FROM mentor INNER JOIN school ON school.ID = mentor.schoolID");
								while($row = mysql_fetch_array($result))
								{
									echo("<option value='" . $row['ID'] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . ", " . $row['naam'] . "</option>");
								}
								
							CloseConnect();
							?></select></td>
						</tr>
						<tr>
							<td></td> <td> <input type="submit" name="submit" value="Toevoegen" class="submit"/> </td>
						</tr>
					</table>
				
				</form>
				
				
				<div class="clear"> </div>
				
				<?php if($failed == true) {echo("<p class='center' style='color: red;'> Toevoegen mislukt </p>");}
					else if($succes == true) {echo("<p class='center' style='color: green;'>Cursist Toegevoegd</p>");}?>
			</div>
		</div>
		
	</body>

</html>
