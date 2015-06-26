	<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html;" >
        <title>PCI Languages - Bedrijven</title>
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
                <div id="positioncompaniestable">
					<table id="companiestable">
						<tr>
							<td>
								<a href="courses.php?company=PCI-Languages">PCI Languages</a>
							</td>
							<td>
								<a href="courses.php?company=PCI2">PCI2</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="courses.php?company=NT2-Exam-Training">NT2 Exam Training</a>
							</td>
							<td>
								<a href="courses.php?company=Business-English-Express">Business English Express</a>
							</td>
						</tr>
					</table>
                </div>
            </div>
        </div>
    </body>
</html>