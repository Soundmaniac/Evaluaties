<?php
	include_once("functions.php");
	ini_set( "display_errors", 0);
	StartUp();

	$failed = null;


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
			
				<form action="<?php echo("showmmentorstudenten.php?student=" . $_GET['student'] . ""); ?>" method="post">
				
					<?php
					
					OpenConnection();
					$check = mysql_query("Select * From aanwezigheid  WHERE  studentID='" . $_GET['student'] . "'");
					
					echo("<table>");
					echo("<tr><td class='center'>Les nummer</td>");
					echo("<td class='center'>Afwezig</td>");
					echo("<td class='center'>Commentaar</td></tr>");
					while($row = mysql_fetch_array($check))
					{
						echo("<tr><td class='center'>Les ". $row['lesnummer'] .": </td>");
						if ($row['aanwezig'] == 'Afwezig')
						{
							echo("<td class='center'><input type='checkbox' class='radio1' name='les". $row['lesnummer'] ."' value='false' checked/></td>");
						}
						else
						{
							echo("<td class='center'><input type='checkbox' class='radio1' name='les". $row['lesnummer'] ."' value='false' /></td>");
						}

						if ($row['comtaar'] != Null)
						{
							echo("<td class='center'><textarea name='area" . $row['lesnummer'] . "'>" . $row['comtaar'] . " </textarea></td></tr>");
						}
						else
						{
							echo("<td class='center'><textarea name='area" . $row['lesnummer'] . "'></textarea></td></tr>");
						}	
						
						
					}
					echo("</table>");

					CloseConnection();
					?>

				
				</form>
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>
</html>
