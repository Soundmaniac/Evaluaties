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
                <div class="positioncontent">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="searchtable">
							<label for="search" class="">Search:</label>
							<input class="" type="search" placeholder="Zoeken"></input>
						</div>
						<br />
						<table>
							<tr>
								<th>Naam</th>
								<th>Tussenvoegsel</th>
								<th>Achternaam</th>
							</tr>
							<!--Genereer tabel hier-->
							<tr>
								<td>
									<input placeholder="Voornaam" type="text" name="cursistFirstName"></input>
								</td>
								<td>
									<input placeholder="Tussenvoegsel" type="text" name="cursistTussenvoegsel"></input>
								</td>
								<td>
									<input placeholder="Achternaam" type="text" name="cursistLastName"></input>
								</td>
							</tr>
						</table>
						<?php
						editSelectedRow();
						?>
						<input type="submit" value="Opslaan" name="submit" class="submit"></input>
						<a href="cursists.php" class="formbtn" >Terug</a>
					</form>
                </div>
            </div>
        </div>
		<script>
		//Eventuele code
		</script>
    </body>
</html>