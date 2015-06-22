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
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<input type="submit" value="Cursus toevoegen" class="submit" />
						<table class="coursestable">
							<tbody>
								<?php
								generateCourses();
								?>
							</tbody>
						</table>
					</form>
                </div>
            </div>
        </div>
    </body>
</html>