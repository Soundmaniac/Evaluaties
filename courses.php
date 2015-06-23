<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html;" >
        <title>PCI Languages - Cursussen</title>
        <?php
        include_once("functions.php");
        include_once("dbFunctions.php");
		include_once("tablegenFunctions.php");
        StartUp();
        ini_set( "display_errors", 0);
        AdminOnly();
        ?>
        <link rel="stylesheet" type="text/css" href="style.css">
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
			<!--CSS aanpassen! -->
                <div id="coursesposition">
					<!--Laat alle gegevens zien op basis van gekozen bedrijf-->
					<!--Kan kiezen voor twee mogelijkheden:-->
					<h1>Cursussen</h1>
					<table class="coursestable">
						<tbody>
							<?php
							generateCourses();
							?>
						</tbody>
					</table>
					<div class="positionbtn">
						<a href="addcursus.php" class="formbtn">Cursus toevoegen</a>
					</div>
                </div>
            </div>
        </div>
		<script src="confirm.js"></script>
    </body>
</html>