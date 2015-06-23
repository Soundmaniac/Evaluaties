<html>
    <head>
        <title>form php</title>
        <?php
        include_once("codegenfunctions.php");
        include_once("functions.php");
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
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<table id="codegentablewidth">
							<tr>
								<td>
									<label for="cursusnaam">* Cursus naam: </label>
								</td>
								<td>
									<input type="text" name="cursusnaam" />
								</td>
							</tr>
							<tr>
								<td>
								</td>
								<td>
									<?php addCourse(); ?>
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