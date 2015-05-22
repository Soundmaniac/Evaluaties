<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
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
					<form>
						<div class="searchtable">
							<label for="search" class="">Search:</label>
							<input class="" type="search" placeholder="Zoeken"></input>
						</div>
						<table>
							<tr>
								<th>Naam</th>
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
						<a href="codegen.php" class="addcursistbtn">Cursist toevoegen</a>
					</form>
                </div>
            </div>
        </div>
		<script>
		function copyToClip()
		{
			var selectTag = document.getElementById("ddlEvaluatie");
			var optVal = selectTag.value;
			if(optVal != "Selecteer een optie...")
			{
				window.prompt("Druk op CTRL+C om de URL te kopieëren:", "http://localhost:8080/Evaluaties/" + optVal);
			}
		}
		</script>
    </body>
</html>