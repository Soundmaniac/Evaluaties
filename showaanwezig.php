<?php
	include_once("functions.php");
	ini_set( "display_errors", 0);
	StartUp();
	VrwijwilligerOnly();

	$failed = null;

	if($_POST['submitaw'] != null)
	{
		Connect();
		
	    
		if ($_POST['area1'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area1'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='1'");
		}
		if ($_POST['area2'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area2'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='2'");
		}
		if ($_POST['area3'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area3'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='3'");
		}
		if ($_POST['area4'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area4'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='4'");
		}
		if ($_POST['area5'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area5'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='5'");
		}
		if ($_POST['area6'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area6'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='6'");
		}
		if ($_POST['area7'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area7'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='7'");
		}
		if ($_POST['area8'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area8'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='8'");
		}
		if ($_POST['area9'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area9'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='9'");
		}
		if ($_POST['area10'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area10'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='10'");
		}
		if ($_POST['area11'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area11'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='11'");
		}
		if ($_POST['area12'] != null)
		{
			mysql_query("
			UPDATE aanwezigheid 
			SET comtaar='" . $_POST['area12'] . "'
			WHERE studentID='" . $_GET['student'] . "' AND lesnummer='12'");
		}
		
		 
		
		$i = 1;
		while ($i <= 12)
		{
			if ($_POST['les1'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='1'");
			}
			if ($_POST['les2'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='2'");
			}
			if ($_POST['les3'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='3'");
			}
			if ($_POST['les4'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='4'");
			}
			if ($_POST['les5'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='5'");
			}
			if ($_POST['les6'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='6'");
			}if ($_POST['les7'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='7'");
			}
			if ($_POST['les8'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='8'");
			}
			if ($_POST['les9'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='9'");
			}
			if ($_POST['les10'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='10'");
			}
			if ($_POST['les11'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='11'");
			}
			if ($_POST['les12'])
			{
				mysql_query("UPDATE aanwezigheid SET aanwezig='Afwezig'  WHERE studentID='" . $_GET['student'] . "' AND lesnummer='12'");
			}
			$i++;
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
			
				<form action="<?php echo("showaanwezig.php?student=" . $_GET['student'] . ""); ?>" method="post">
				
					<?php
					
					Connect();
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
					echo("<input type='submit' class='submit' value='Aanwezigheid Aanpassen' name='submitaw'></input>");
										
					if(isset($_POST['submitaw']))
					{ 
						echo("<p style='color: green;>gelukt</p>");
					}
					else
					{
						echo("<p style='color: red;>mislukt</p>");
					}
					
					CloseConnect();
					?>

				
				</form>
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>
</html>
