<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
        <title>form php</title>
        <?php
        include_once("functions.php");
        include_once("dbFunctions.php");
		include_once("codegenfunctions.php");
        StartUp();
        ini_set( "display_errors", 0);
        AdminOnly();
		session_start();
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
                <div class="editCursistInfo">
					<form method="post" action="<?php echo(htmlspecialchars($_SERVER["PHP_SELF"]) . "?company=" . $_GET['company'] . "&id=" . $_GET['id']);?>">
						<table>
							<tr>
								<th>Cursusnaam</th>
								<th>Projectnummer</th>
								<th>Trainernaam</th>
								<th>Begindatum</th>
								<th>Einddatum</th>
							</tr>
							<tr>
								<td>
									<input placeholder="Cursusnaam" type="text" name="cursusnaam"></input>
								</td>
								<td>
									<input placeholder="Projectnummer" type="text" name="projectnummer"></input>
								</td>
								<td>
									<input placeholder="Trainernaam" type="text" name="trainernaam"></input>
								</td>
								<td>
									<input placeholder="Begindatum" type="text" name="begindatum"></input>
								</td>
								<td>
									<input placeholder="Einddatum" type="text" name="einddatum"></input>
								</td>
							</tr>
						</table>
						<?php
						editSelectedCourse();
						?>
						<input type="submit" value="Opslaan" name="submit" class="submit"></input>
						<a href="courses.php?company=<?php echo($_GET["company"]) ?>" class="formbtn" >Terug</a>
					</form>
                </div>
            </div>
        </div>
		<script>
		//Eventuele code
		</script>
    </body>
</html>