<?php
	
	include_once("functions.php");
	StartUp();
	ini_set( "display_errors", 0);
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
				
				$date = date("2000-10-10");
				echo(date("Y-m-d", strtotime($date. ' + 0 days')));
				
				?>
				
				<input type="text" name="henk" value="TEXTLOL"></input>
				
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>


	<?php








	?>

</html>
