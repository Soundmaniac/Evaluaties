	<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html;" >
        <title>PCI Languages - Bedrijf: PCI NT2 Exam Training</title>
        <?php
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
			<!--CSS aanpassen! -->
                <div id="coursesposition">
					<!--Laat alle gegevens zien op basis van gekozen bedrijf-->
					<!--Kan kiezen voor twee mogelijkheden:-->
					<h1>PCI NT2 Exam Training</h1>
					<form>
						<select>
							<option>cursusnaam - nummer1</option>
							<option>cursusnaam - nummer2</option>
							<option>cursusnaam - nummer3</option>
							<option>cursusnaam - nummer4</option>
							<option>cursusnaam - nummer5</option>
						</select>
						<input type="submit" value="Gaan" class="submit" />
					</form>
					<!--of:-->
					<p>Of: </p>
					<table class="coursestable">
						<tbody>
							<tr>
								<td>
									<a href="#">cursusnaam - nummer1</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#">cursusnaam - nummer2</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#">cursusnaam - nummer3</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#">cursusnaam - nummer4</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="#">cursusnaam - nummer5</a>
								</td>
							</tr>
						</tbody>
					</table>
					<!--Keuze verwijst naar pagina met studenten.php als huidige naam-->
                </div>
            </div>
        </div>
    </body>
</html>