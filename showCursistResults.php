<?php
include_once("functions.php");
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

            <!--TO DO: URL parameter moet worden aangepast naar cursistID in plaats van mentor-->
            <form action="<?php echo("showmentor.php?mentor=" . $_GET['mentor'] . ""); ?>" method="post">
                <div class="center">
                </div>
            </form>
            <?php
            Connect();
            /*TO DO: Query aanpassen zoddat formulier op cursistID wordt laten zien/database aanpassen*/
            $getDatasql = mysql_query("SELECT * FROM cursistresults WHERE cursistID='" . $_GET['id'] . "'");
            while ($row = mysql_fetch_array($getDatasql))
            {
                /*Alle gegevens in tabel plaatsen*/
                /*TO DO: Variabelen beter/semantischer benoemen*/
                echo("
                <!--Tabel deel 1: Cursusinhoud-->

                <table class='ocenter'>
                    <tr>
                        <td class='center'>Overzicht formulier</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> Tussentijdse Evaluatie </td>
                        <td>Eind Evaluatie</td>
                    </tr>
                    <tr>
                        <td>1.Cursusinhoud: </td>
                        <td> a:" . $row[t1a] . "</td>
                        <td> a:" . $row[e1a]  ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> b:" . $row[t1b]  ."</td>
                        <td> b:" . $row[e1b]  ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> c:" . $row[t1c]  ."</td>
                        <td> c:" . $row[e1c]  ."</td>
                    </tr>
                    <tr>
                        <td> Commentaar: </td>
                        <td>" . $row[tideas1] ."</td>
                        <td>" . $row[eideas1]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 2: Structuur van de cursus-->

                    <tr>
                        <td>2.Structuur van de cursus: </td>
                        <td> a:" . $row[t2] . "</td>
                        <td> a:" . $row[e2a]  ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td> b:" . $row[e2b] ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td> c:" . $row[e2c]  ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td> d:" . $row[e2d]  ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td> e:" . $row[e2e]  ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td> f:" . $row[e2f] ."</td>
                    </tr>
                    <tr>
                        <td> Commentaar: </td>
                        <td>" . $row[tideas2] ."</td>
                        <td>" . $row[eideas2]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 3: Cursusmateriaal-->

                    <tr>
                        <td>3.Cursusmateriaal: </td>
                        <td> a:" . $row[t3]  ."</td>
                        <td> a: " . $row[e3a]  ."</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td> b: " . $row[e3b]  ."</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td> c: " . $row[e3c]  ."</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td> d: " . $row[e3d]  ."</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td> e: " . $row[e3e]  ."</td>
                    </tr>
                    <tr>
                        <td> Commentaar: </td>
                        <td>" . $row[tideas3] ."</td>
                        <td>" . $row[eideas3]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 4: Trainer-->

                    <tr>
                        <td>4.Trainer: </td>
                        <td> a:" . $row[t4a]  ."</td>
                        <td> a:" . $row[e4a] ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> b:" . $row[t4b]  ."</td>
                        <td> b:" . $row[e4b] ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td> c:" . $row[e4c]."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td> d:" .  $row[e4d] ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td> e:" .  $row[e4e] ."</td>
                    </tr>
                    <tr><td> </td>
                        <td></td>
                        <td> f:" .  $row[e4f] ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td> g:" .  $row[e4g] ."</td>
                    </tr>
                    <tr>
                        <td> Commentaar: </td>
                        <td>" . $row[tideas4] ."</td>
                        <td>" . $row[eideas4]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 5: Algemeen oordeel-->

                    <tr>
                        <td>5.Algemeen oordeel: </td>
                        <td> a:" . $row[t5]  ."</td>
                        <td> a:" . $row[a5a]  ."</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td> b:" . $row[e5b]  ."</td>
                    </tr>
                    <tr>
                        <td> Commentaar: </td>
                        <td>" . $row[tideas5] ."</td>
                        <td>" . $row[eideas5]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 6: Aanbevelen aan anderen ja/nee-->

                    <tr>
                        <td>6. Aanbevelen aan anderen ja/ nee </td>
                        <td></td>
                        <td> " . $row[e6]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 7: Besproken onderdelen-->

                    <tr>
                        <td>7. Welke onderdelen hebben u het meest aangesproken en waarom.</td>
                        <td></td>
                        <td> " . $row[eideas7]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 8: Overbodige onderdelen-->

                    <tr>
                        <td>8. Waren er onderdelen die u overbodig vond.</td>
                        <td></td>
                        <td> " . $row[eideas8]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 9: Vaardigheden-->

                    <tr>
                        <td>9. Bij welke onderdelen heeft u nieuwe vaardigheden opgedaan of uw vaardigheden verbeterd.</td>
                        <td></td>
                        <td> " . $row[eideas9]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 10: Tijd besteed aan cursus-->

                    <tr>
                        <td>10. Hoeveel tijd (uren) totaal besteed aan de cursus</td>
                        <td></td>
                        <td> " . $row[eideas10]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 11: Duur cursus-->

                    <tr>
                        <td>11. Duur cursus </td>
                        <td></td>
                        <td> " . $row[e11]  ."</td>
                    </tr>
                    <tr style='height: 15px;'></tr>

                    <!--Tabel deel 12: Interesse in een vervolgcursus-->

                    <tr>
                        <td>12. Interesse in een vervolgcursus </td>
                        <td></td>
                        <td> " . $row[e12]  ."</td>
                    </tr>
                    <tr>
                        <td> Opmerkingen:</td>
                        <td></td>
                        <td> " . $row[eideas12]  ."</td>
                    </tr>
                </table>
                ");
            }
            /*End of while loop*/
            CloseConnect();
            ?>
            <!--Chart will be displayed beneath the PHP-generated table, which will insert the data from the results table above-->
            <div id="chartContainer">
                <canvas id="resultChart"></canvas>
                <script type="text/javascript">

                    /*Kleuren van de balken en andere instellingen kunnen hier worden gewijzigd.*/
                    var chartData = {
                        labels: ["Cursusinhoud", "Structuur van de cursus", "CursusMateriaal"],
                        datasets: [
                            {
                                label: "Eerste gegevens",
                                fillColor: "#48A97",
                                strokeColor: "#48A4D1",
                                data:
                                <?php
                                GetData(0);
                                ?>
                            },
                            {
                                label: "Tweede gegevens",
                                fillColor: "rgba(73,188,170,0.4)",
                                strokeColor: "rgba(72,174,209,0.4)",
                                data:
                                <?php
                                GetData(1);
                                ?>
                            },
                            {
                                label: "Gemiddelde",
                                fillColor: "#48A97",
                                strokeColor: "#48A4D1",
                                data:
                                <?php
                                GetData(2);
                                ?>
                            }
                        ]
                    }

                    /*JavaScript Legenda settings*/
                    var options = {
                        legendTemplate : '<ul>'
                            + '<% for (var i=0; i<datasets.length; i++){%>'
                            + '<li>'
                            + '<span style=\"background-color:<%=datasets[i].fillColor%>\"></span>'
                            + '<%if(datasets[i].label){%><%=datasets[i].label%><%}%>'
                            + '</li>'
                            + '<%}%>'
                            + '</ul>',
                        barDatasetSpacing : 5
                    }

                    /*Draws chart in canvas*/
                    var ctx = document.getElementById("resultChart").getContext("2d");
                    new Chart(ctx).Bar(chartData, options);

                </script>
            </div>
        <div class="clear"> </div>
        </div>
        </div>
    </body>
</html>