<?php
	include_once("functions.php");
	include_once("dbFunctions.php");
	ini_set( "display_errors", 0);
	StartUp();
	AdminOnly();
	
	OpenConnection();
	
	if($_POST['schoolnaam'] != null)
	{
		
		mysql_query("
			INSERT INTO school (ID, naam) VALUES (NULL, '" . $_POST['schoolnaam'] . "');
		");
	}
	else if(isset($_POST['schoolnaam']))
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

					echo("<table class='center'>");
						
						$result = mysql_query("
							SELECT school.ID, school.naam
							FROM school
						");
						if(mysql_num_rows($result) == 0)
						{
							echo("<tr><td>Geen scholen gevonden.</td><td></td></tr>");
						}
						else
						{
						echo("<tr><td >Scholen:</td></tr>");
							while($row = mysql_fetch_array($result))
							{
								
								echo("<tr><td >" . $row["ID"] . "</td><td> " . $row["naam"] . " </td></tr>");
							}
						}					
						echo("</table>");

					
					CloseConnection();
					
					Pages("school", "school.php");	
					
				?>
					<div class="clear"> </div>
					
					<hr/>					
					<h2> Voeg een nieuwe school toe: </h2>
				
					<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
							
						<table class="center">
							<tr>
								<td>School naam:</td><td><input type="text" name="schoolnaam"/></td>
							</tr>
						</table>

						
						<div class='clear'></div>
						<div class='center'><input type='submit' name='submit' value='Nieuwe school toevoegen' class='submit'>  </input>
							
						</div>
					</form>
						
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>
</html>
