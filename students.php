	<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" >
        <title>form php</title>
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
                <div id="studentsposition">
					<form method="post" action="<?php echo (htmlspecialchars($_SERVER["PHP_SELF"]) . "?course=" . $_GET['course']);?>">
						<div class="searchtable">
							<label for="search" class="">Search:</label>
							<input class="search" name="search" type="search" placeholder="Zoeken" />
							<input type="submit" class="submit" value="Zoeken" />
						</div>
						<table>
							<tr>
								<th>Voornaam</th>
								<th>Tussenvoegsel</th>
								<th>Achternaam</th>
								<th>Soort evaluatie</th>
								<th>Resultaten link</th>
								<th>Tussentijdse evaluatie afgelegde datum</th>
								<th>Eind evaluatie afgelegde datum</th>
								<th>Acties</th>
							</tr>
							<!--Genereer tabel hier-->
							<?php
							generateRows();
							?>
						</table>
						<div class="positionbtn">
							<a href="codegen.php?course=<?php echo ($_GET['course']) ?>" class="formbtn">Cursist toevoegen</a>
						</div>
					</form>
                </div>
            </div>
        </div>
		<script>
		/*Zorgt ervoor dat evaluatie links gekopieerd kunnen worden*/
		function copyToClip(s)
		{
			var optVal = s.options[s.selectedIndex].value;
			if(optVal != "Selecteer een optie...")
			{
				var l = "This is &agrave; string";
				var decoded = HtmlDecode(l);
				window.prompt(decoded, "http://localhost:8080/Evaluaties/" + optVal);
			}
		}
		
		function HtmlDecode(html)
		{
			var div = document.createElement("div");
			div.innerHTML = html;
			return div.childNodes[0].nodeValue;
		}
		</script>
		<script src="confirm.js"></script>
    </body>
</html>