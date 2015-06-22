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
                <div class="positioncontent">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
							<a href="codegen.php" class="formbtn">Cursist toevoegen</a>
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
				window.prompt("Druk op CTRL+C om de URL te kopieëren:", "http://localhost:8080/Evaluaties/" + optVal);
			}
		}
		
		/*Zorgt voor bevestiging*/
		var elementToConfirm = document.getElementsByClassName('confirmation');
		var confirmIt = function (e)
		{
			if (!confirm('Weet u zeker dat u deze cursist wil verwijderen? (Alle gegevens en afgelegde evaluatie informatie zal verloren gaan!)')) e.preventDefault();
		};
		
		for (var i = 0, l = elementToConfirm.length; i < l; i++)
		{
			elementToConfirm[i].addEventListener('click', confirmIt, false);
		}
		/*Einde bevestiging*/
		</script>
    </body>
</html>