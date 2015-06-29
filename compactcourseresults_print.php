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
<body style="background-color: white">
        <div id="resultstitle">
            <h2>
                <?php
                Connect();
                $sql = mysql_query("SELECT * FROM cursussen WHERE cursusID='" . $_GET['course'] . "'");
                $sql2 = mysql_query("SELECT * FROM cursisten WHERE cursusID='" . $_GET['course'] . "'");
                $row = mysql_fetch_array($sql);
                $counter = 0;
                while ($loop = mysql_fetch_assoc($sql2))
                {
                    $counter++;
                }
                echo ("Cursusoverzicht: <br/>". $row["cursusnaam"] . " - " . $row["projectnummer"] . " (" . $counter . " studenten) <br/>" . $row["trainernaam"] );
                CloseConnect();
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
                                fillColor: "rgba(73,188,170,0.4)",
                                strokeColor: "rgba(72,174,209,0.4)",
                                data:
                                <?php
                                GetCourseData(0, $_GET['course']);
                                ?>
                            },
                            {
                                label: "Tweede gegevens",
                                fillColor: "rgba(73,188,170,0.4)",
                                strokeColor: "rgba(72,174,209,0.4)",
                                data:
                                <?php
                                GetCourseData(1, $_GET['course']);
                                ?>
                            },
                            {
                                label: "Gemiddelde",
                                fillColor: "rgba(80, 80, 82, 0.9)",
                                strokeColor: "rgba(72,174,209,0.4)",
                                data:
                                <?php
                                GetCourseData(2, $_GET['course']);
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
<script>
</script>
</body>
</html>