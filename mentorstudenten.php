<?php
	
	include_once("functions.php");
	include_once("dbFunctions.php");
	StartUp();
	ini_set( "display_errors", 0);
	


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
					
					showMentorlln($_SESSION['showall'], getPage($page));
					
					CloseConnect();
					
					Pages("cursist", "cursist.php");
				
				?>
				
				
				
				
				
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>

</html>
