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
                            <input type="hidden" name="cursusID" value="<?php echo($_GET["course"]); ?>"/>
							<tr>
								<td>
									<label for="cursistVoornaam">* Cursist voornaam: </label>
								</td>
								<td>
									<input type="text" name="cursistVoornaam" />
								</td>
							</tr>
							<tr>
								<td>
									<label for="cursistTussenvoegsel">Tussenvoegsel: </label>
								</td>
								<td>
									<input type="text" name="cursistTussenvoegsel"></input>
								</td>
							</tr>
							<tr>
							<tr>
								<td>
									<label for="cursistAchternaam">* Achternaam: </label>
								</td>
								<td>
									<input type="text" name="cursistAchternaam"></input>
								</td>
							</tr>
							<tr>
								<td>

								</td>
								<td>
									<?php GenerateRow(); ?>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Toevoegen" name="submit" class="submit" />
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