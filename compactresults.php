<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <title>Resultaten (compact)</title>
    <?php
    include_once("functions.php");
    include_once("dbFunctions.php");
    StartUp();
    ini_set( "display_errors", 0);
    AdminOnly();
    ?>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="Chart.js"></script>

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
        <div id="resultstitle">
            <h2>
                <?php
                OpenConnection();
                $sql1 = mysql_query("SELECT * FROM cursisten WHERE cursistID='" . $_GET['id'] . "'");
                $row1 = mysql_fetch_array($sql1);
                $sql2 = mysql_query("SELECT * FROM cursussen WHERE cursusID='" . $row1['cursusID'] . "'");
                $row2 = mysql_fetch_array($sql2);
                $counter = 0;
                echo ("Studentoverzicht: <br/>". $row1["cursistVoornaam"] . " " . $row1["cursistAchternaam"] . " <br/> " . $row2["cursusnaam"] . " - " . $row2["projectnummer"]);
                CloseConnection();
                ?>
            </h2>
            <br/>
        </div>
        <div id="graph">
            <div id="chartContainer">
                <canvas id="resultChart"></canvas>
                <script type="text/javascript">
                    /*Kleuren van de balken en andere instellingen kunnen hier worden gewijzigd.*/
                    var chartData = {
                        labels: ["1. Cursusinhoud", "2. Struktuur van de cursus", "3. Cursus materiaal", "4. Indruk trainer", "5. Algemeen oordeel", "Totaal geminddelde"],
                        datasets: [
                            {
                                label: "Eerste gegevens",
                                fillColor: "rgba(144,195,212,0.4)",
                                strokeColor: "rgba(72,174,209,0.4)",
                                data:
                                <?php
                                GetData(0, $_GET['id']);
                                ?>
                            },
                            {
                                label: "Tweede gegevens",
                                fillColor: "rgba(161,212,144,0.4)",
                                strokeColor: "rgba(72,174,209,0.4)",
                                data:
                                <?php
                                GetData(1, $_GET['id']);
                                ?>
                            },
                            {
                                label: "Gemiddelde",
                                fillColor: "rgba(80, 80, 82, 0.9)",
                                strokeColor: "rgba(212,161,144,0.4)",
                                data:
                                <?php
                                GetData(2, $_GET['id']);
                                ?>
                            },
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
        </div>
		<div id="legend" style="text-align: center;">
			Eerste lijn = Cijfer van tussentijdse evaluatie<br />
			Twee lijn = Cijfer van eindtijd evaluatie<br />
			Derde lijn = Cijfer van het gemiddelde tussen tussentijdse evaluatie en eindetijd evaluatie
		</div>
        <div id="questions" style="text-align: center;">
            <?php
                CheckGrades($_GET['id']);
            ?>
        </div>
        <?php
            OpenConnection();
            $geteedata= mysql_query("SELECT * FROM eesurveyresults WHERE cursistID='" . $_GET['id'] . "'");
            $rowee = mysql_fetch_array($geteedata);
        ?>
        <div id="questions">
            <table>
                <tr>
                    <td>
                        Aanbevelen aan anderen ja/nee
                    </td>
                    <td>
                        <?php
                            echo ($rowee[aanbeveling]);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Hoeveel tijd (in uren) heeft u in totaal besteed aan de voorbereiding van de cursus/training?
                    </td>
                    <td>
                        <?php
                            echo ($rowee[voorbereiding]);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Duur cursus
                    </td>
                    <td>
                        <?php
                            echo ($rowee[lengtecursus]);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Interesse in een vervolgcursus
                    </td>
                    <td>
                        <?php
                            echo ($rowee[vervolgcursus]);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Opmerkingen
                    </td>
                    <td>
                        <?php
                            echo ($rowee[wensen]);
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <?php
            CloseConnection();
        ?>
        <br/>
        <a href="results.php?id=<?php echo ($_GET['id']) ?>" class="formbtn">Alle resulaten</a> | <a href="compactresults_print.php?id=<?php echo ($_GET['id']) ?>" class="formbtn">Printbaar</a>
    </div>
</div>
<script>
</script>
</body>
</html>