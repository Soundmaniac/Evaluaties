<?php
	include_once("functions.php");
	ini_set( "display_errors", 0);
	StartUp();
	AdminOnly();
	

	
		
	if($_POST['dag'] != "default" && $_POST['maand'] != "default" && $_POST['jaar'] != "default" && $_POST['dag'] != null && $_POST['maand'] != null && $_POST['jaar'] != null)
	{		
		OpenConnection();
		$startDate1 = "" . $_POST["jaar"] . "-" . $_POST["maand"] . "-" . $_POST["dag"] . "";
		
		
		mysql_query("
			UPDATE les
			SET les.lesdatum = '" . date("Y-m-d", strtotime($startDate1. ' + 0 days')) . "'
			WHERE les.ID = '" . $_GET['les'] . "'
			
		");
		
		CloseConnection();
		header( "Location: showcursus.php?cursus=" . $_GET['cursus'] . "" );
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
				<form action="<?php echo("showles.php?les=" . $_GET['les'] . "&cursus=" . $_GET['cursus'] . ""); ?>" method="post">
				<?php
					OpenConnection();
					
					$result = mysql_query("SELECT * FROM les WHERE les.ID=" . $_GET['les'] . "");
					while($row = mysql_fetch_array($result))
					{
						$startDate = $row['lesdatum'];
						echo("" . date("d", strtotime($startDate. ' + 0 days')) . "-");
						echo("" . date("m", strtotime($startDate. ' + 0 days')) . "-");
						echo("" . date("Y", strtotime($startDate. ' + 0 days')) . " ");
					}
					
					echo("<select name='dag'>");
						$i = 1;
					echo("<option value='default'>Dag</option>");
					while($i <= 31)
					{
						echo("<option value='" . $i . "'>" . $i . "</option>");
						$i++;
					}
						echo("</select>
					<select name='maand'>");
					$i = 1;
					echo("<option value='default'>Maand</option>");
					while($i <= 12)
					{
						echo("<option value='" . $i . "'>" . $i . "</option>");
						$i++;
					}
					echo("</select>
					<select name='jaar'>");
					$i = 2013;
					echo("<option value='default'>Jaar</option>");
					while($i <= date("Y") + 2)
					{
						echo("<option value='" . $i . "'>" . $i . "</option>");
						$i++;
					}
					echo("</select><br/>");
					
					CloseConnection();
				?>
				<input type='submit' name='submit' value='Wijziging toepassen' class='submit'>  </input>
				</form>
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>
</html>
