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
            <h2>Overzicht Evaluaties Cursist</h2>
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
                                fillColor: "rgba(73,188,170,0.4)",
                                strokeColor: "rgba(72,174,209,0.4)",
                                data:
                                <?php
                                GetData(0, $_GET['id']);
                                ?>
                            },
                            {
                                label: "Tweede gegevens",
                                fillColor: "rgba(73,188,170,0.4)",
                                strokeColor: "rgba(72,174,209,0.4)",
                                data:
                                <?php
                                GetData(1, $_GET['id']);
                                ?>
                            },
                            {
                                label: "Gemiddelde",
                                fillColor: "rgba(80, 80, 82, 0.9)",
                                strokeColor: "rgba(72,174,209,0.4)",
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
        <div id="questions" style="text-align: center;">
            <?php
                CheckGrades($_GET['id']);
            ?>
        </div>
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
            CloseConnect();
        ?>
    </div>
</div>
<script>
</script>
</body>
</html>