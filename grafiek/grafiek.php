<html>
	<head>
		<title>Grafiek</title>
		<link rel="stylesheet" type="text/css" href="style.css"></link>
		<?php
		include_once("functions.php");
		?>
		<script type="text/javascript" src="scripts/Chart.js-master/Chart.js"></script>
	</head>
	<body>
	test
		<canvas id="resultChart"></canvas>
		<script type="text/javascript">
							var chartData = {
								labels: ["Value1", "Value2", "Value3"],
								datasets: [
								{
									fillColor: "#48A97",
									strokeColor: "#48A4D1",
									data:
									<?php 
									GetData(1);
									?>
								},
								{
									fillColor: "rgba(73,188,170,0.4)",
									strokeColor: "rgba(72,174,209,0.4)",
									data: 
									<?php
									GetData(2);
									?>
								},
								{
									fillColor: "#48A97",
									strokeColor: "#48A4D1",
									data: 
									<?php
									GetData(3);
									?>
								}
								]
							}
							
							var ctx = document.getElementById("resultChart").getContext("2d");
							new Chart(ctx).Bar(chartData);
		</script>
	</body>
</html>