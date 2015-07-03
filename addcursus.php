<html>
    <head>
        <title>form php</title>
        <?php
        include_once("codegenfunctions.php");
        include_once("dbFunctions.php");
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
                <div class="codegenposition">
                    <form method="post" action="<?php echo (htmlspecialchars($_SERVER["PHP_SELF"]) ."?company=" . $_GET['company']);?>">
						<table id="codegentablewidth">
                            <input type="hidden" name="bedrijfnaam" value="<?php echo($_GET["company"]); ?>"/>
							<tr>
								<td>
									<label for="cursusnaam">* Cursusnaam: </label>
								</td>
								<td>
									<input type="text" name="cursusnaam" />
								</td>
							</tr>
							<tr>
								<td>
									<label for="projectnummer">* Projectnummer: </label>
								</td>
								<td>
									<input type="text" name="projectnummer" />
								</td>
							</tr>
							<tr>
								<td>
									<label for="trainernaam">* Trainernaam: </label>
								</td>
								<td>
									<input type="text" name="trainernaam" />
								</td>
							</tr>
							<tr>
								<td>
									<label for="begindatum">Begindatum: </label>
								</td>
								<td>
									<input type="date" name="begindatum" />
								</td>
							</tr>
							<tr>
								<td>
									<label for="einddatum">Einddatum: </label>
								</td>
								<td>
									<input type="date" name="einddatum" />
								</td>
							</tr>
							<tr>
								<td>
								</td>
								<td>
									<?php addCourse($_GET['company']); ?>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Toevoegen" name="submit" class="submit" />
									<!--TO DO: adjust href to selected company-->
									<a href="courses.php?selected=<?php ?>" class="formbtn" >Terug</a>
								</td>
								<td>
								</td>
							</tr>
						</table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>