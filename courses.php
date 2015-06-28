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
							<thead>
								<tr>
									<th>Cursus</th>
									<th>Projectnummer</th>
									<th>Trainernaam</th>
									<th>Begin datum</th>
									<th>Eind datum</th>
									<th>Acties</th>
								</tr>
							</thead>
							<?php
                            generateCourses($_GET['company']);
							?>
						</tbody>
					</table>
					<div class="positionbtn">
						<a href="addcursus.php?company=<?php echo ($_GET['company']) ?>" class="formbtn">Cursus toevoegen</a>
						<!--TO DO: Cursus verwijderen toevoegen-->
					</div>
                </div>
            </div>
        </div>
		<script src="confirm.js"></script>
    </body>
</html>