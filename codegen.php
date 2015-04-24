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
                <div style="margin-left: auto; margin-right: auto; width: 40%;">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <label for="cursistNaam">Cursist naam: </label>
                        <input type="text" name="cursistNaam" /><br />
                        <label for="cursistID">CursistID: </label>
                        <?php
                        GenerateRow();
                        ?>
                        <br />
                        <input type="submit" value="Verzenden" name="submit" class="submit" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>