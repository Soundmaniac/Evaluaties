<?php
include_once("functions.php");
include_once("codegenfunctions.php");
include_once("dbFunctions.php");
ini_set( "display_errors", 0);
StartUp();
AdminOnly();

$failed = null;
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- TO DO: Title veranderen naar gepast titel -->
    <title>PCI Languages - Evaluatie resultaten</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
<div id="container">
<div id="header">
    <?php
    profileFunction()
    ?>
</div>
<div id="menu">
    <?php
    menuFunction();
    ?>

    <div class="clear"></div>
</div>
<div id="content">

<form action="<?php echo("showmentor.php?mentor=" . $_GET['id'] . ""); ?>" method="post">
    <div class="center">
    </div>
</form>

<?php
echo("<table style='table-layout: fixed; width: 100%;' class='ocenter'><tr><td class='center'>Overzicht formulier</td></tr>");
echo("<tr><td></td><td> Tussentijdse Evaluatie </td><td>Eind Evaluatie</td></tr>");

Connect();

$getttdata= mysql_query("SELECT * FROM ttsurveyresults WHERE cursistID='" . $_GET['id'] . "'");
$rowtt = mysql_fetch_array($getttdata);

$geteedata= mysql_query("SELECT * FROM eesurveyresults WHERE cursistID='" . $_GET['id'] . "'");
$rowee = mysql_fetch_array($geteedata);

echo("
                <!--Tabel deel 1: Cursusinhoud-->

                <tr>
                    <td>1.Cursusinhoud: </td>
                    <td> a:" . $rowtt[cursusinhouda] . "</td>
                    <td> a:" . $rowee[meninga]  ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td> b:" . $rowtt[cursusinhoudb]  ."</td>
                    <td> b:" . $rowee[meningb]  ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td> c:" . $rowtt[cursusinhoudc]  ."</td>
                    <td> c:" . $rowee[meningc]  ."</td>
                </tr>
                <tr>
                    <td> Commentaar: </td>
                    <td>" . $rowtt[cursusinhoudcomm] ."</td>
                    <td>" . $rowee[meningcomm]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 2: Structuur van de cursus-->

                <tr>
                    <td>2.Structuur van de cursus: </td>
                    <td> a:" . $rowtt[structuura] . "</td>
                    <td> a:" . $rowee[structuura]  ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> b:" . $rowee[structuurb] ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> c:" . $rowee[structuurc]  ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> d:" . $rowee[structuurd]  ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> e:" . $rowee[structuure]  ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> f:" . $rowee[structuurf] ."</td>
                </tr>
                <tr>
                    <td> Commentaar: </td>
                    <td>" . $rowtt[tideas2] ."</td>
                    <td>" . $rowee[structuurcomm]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 3: Cursusmateriaal-->

                <tr>
                    <td>3.Cursusmateriaal: </td>
                    <td> a:" . $rowtt[cursusmateriaala]  ."</td>
                    <td> a: " . $rowee[cursusmateriaala]  ."</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> b: " . $rowee[cursusmateriaalb]  ."</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> c: " . $rowee[cursusmateriaalc]  ."</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> d: " . $rowee[cursusmateriaald]  ."</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> e: " . $rowee[cursusmateriaale]  ."</td>
                </tr>
                <tr>
                    <td> Commentaar: </td>
                    <td>" . $rowtt[tideas3] ."</td>
                    <td>" . $rowee[cursusmateriaalcomm]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 4: Trainer-->

                <tr>
                    <td>4.Trainer: </td>
                    <td> a:" . $rowtt[trainera]  ."</td>
                    <td> a:" . $rowee[trainera] ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td> b:" . $rowtt[trainerb]  ."</td>
                    <td> b:" . $rowee[trainerb] ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> c:" . $rowee[trainerc]."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> d:" .  $rowee[trainerd] ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> e:" .  $rowee[trainere] ."</td>
                </tr>
                <tr><td> </td>
                    <td></td>
                    <td> f:" .  $rowee[trainerf] ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> g:" .  $rowee[trainerg] ."</td>
                </tr>
                <tr>
                    <td> Commentaar: </td>
                    <td>" . $rowtt[trainercomm] ."</td>
                    <td>" . $rowee[trainercomm]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 5: Algemeen oordeel-->

                <tr>
                    <td>5.Algemeen oordeel: </td>
                    <td> a:" . $rowtt[algemeenoordeela]  ."</td>
                    <td> a:" . $rowee[algemeena]  ."</td>
                </tr>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> b:" . $rowee[algemeenb]  ."</td>
                </tr>
                <tr>
                    <td> Commentaar: </td>
                    <td>" . $rowtt[algemeenoordeelcomm] ."</td>
                    <td>" . $rowee[algemeencomm]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 6: Aanbevelen aan anderen ja/nee-->

                <tr>
                    <td>6. Aanbevelen aan anderen ja/ nee </td>
                    <td></td>
                    <td> " . $rowee[aanbeveling]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 7: Besproken onderdelen-->

                <tr>
                    <td>7. Welke onderdelen hebben u het meest aangesproken en waarom.</td>
                    <td></td>
                    <td> " . $rowee[aangesprokenonderdelen]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 8: Overbodige onderdelen-->

                <tr>
                    <td>8. Waren er onderdelen die u overbodig vond.</td>
                    <td></td>
                    <td> " . $rowee[overbodigeonderdelen]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 9: Vaardigheden-->

                <tr>
                    <td>9. Bij welke onderdelen heeft u nieuwe vaardigheden opgedaan of uw vaardigheden verbeterd.</td>
                    <td></td>
                    <td> " . $rowee[nieuwevaardigheden]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 10: Tijd besteed aan cursus-->

                <tr>
                    <td>10. Hoeveel tijd (uren) totaal besteed aan de cursus</td>
                    <td></td>
                    <td> " . $rowee[voorbereiding]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 11: Duur cursus-->

                <tr>
                    <td>11. Duur cursus </td>
                    <td></td>
                    <td> " . $rowee[lengtecursus]  ."</td>
                </tr>
                <tr style='height: 15px;'></tr>

                <!--Tabel deel 12: Interesse in een vervolgcursus-->

                <tr>
                    <td>12. Interesse in een vervolgcursus </td>
                    <td></td>
                    <td> " . $rowee[vervolgcursus]  ."</td>
                </tr>
                <tr>
                    <td> Opmerkingen:</td>
                    <td></td>
                    <td> " . $rowee[wensen]  ."</td>
                </tr>");

CloseConnect();
echo("</table>");
?>
<div class="clear"> </div>
</div>
</div>
</body>
</html>