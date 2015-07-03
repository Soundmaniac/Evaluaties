<?php
	
	include_once("functions.php");
	include_once("dbFunctions.php");
	StartUp();
	ini_set( "display_errors", 0);
	AdminOnly();
	

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
				
					OpenConnection();
					
					/*$page = getPage($page);
					
					ShowDbTable("
						SELECT mentor.ID, mentor.voornaam, mentor.achternaam, school.naam
						FROM mentor
						INNER JOIN school
						LIMIT " . (string)$page . ", " . strval($page + 10) . "
					", array("Mentor", "School"), array("voornaam", "naam"), array("<a href='showmentor.php?mentor=", ""), array(3, 1));*/
					
					showMentor($_SESSION['showall'], getPage($page));
					
					CloseConnection();
					
					Pages("mentor", "mentor.php");
					
				?>
		
				
				<div class="clear"> </div>
				

			</div>
		</div>
		
	</body>

</html>
