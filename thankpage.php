<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
        <title>Thanks! - PCI Languages</title>
        <?php
        include_once("functions.php");
        include_once("dbFunctions.php");
        ini_set( "display_errors", 0);
		session_start();
        ?>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="container">
			<div id="header">
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
					<p>
						Thanks for filling in the review.
						<?php
						backFunction();
						?>
					</p>
                </div>
            </div>
        </div>
		<script>
		</script>
    </body>
</html>