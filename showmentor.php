<?php
	include_once("functions.php");
	ini_set( "display_errors", 0);
	StartUp();
	AdminOnly();

	$failed = null;
					/*	$tet = ($row[t1a] + $row[t1b] + $row[t1c] + $row[t2] + $row[t3] + $row[t4a] + $row[t4b] + $row[t5])/8;
						$tee = ($row[e1a] + $row[e1b] + $row[e1c] + $row[e2a] + $row[e2b] + $row[e2c] + $row[e2d] + $row[e2e] + $row[e2f] + $row[e3a] + $row[e3b] + $row[e3c] + $row[e3d] + $row[e3e] + $row[e4a] + $row[e4b] + $row[e4c] + $row[e4d] + $row[e4e] + $row[e4f] + $row[e4g] + $row[e5a] + $row[e5b])/23;
						$tete = ($row[t1a] + $row[t1b] + $row[t1c] + $row[t2] + $row[t3] + $row[t4a] + $row[t4b] + $row[t5] + $row[e1a] + $row[e1b] + $row[e1c] + $row[e2a] + $row[e2b] + $row[e2c] + $row[e2d] + $row[e2e] + $row[e2f] + $row[e3a] + $row[e3b] + $row[e3c] + $row[e3d] + $row[e3e] + $row[e4a] + $row[e4b] + $row[e4c] + $row[e4d] + $row[e4e] + $row[e4f] + $row[e4g] + $row[e5a] + $row[e5b])/31;
						$teen = ($row[t1a] + $row[t1b] + $row[t1c])/3;
						$evier = ($row[e4a] + $row[e4b] + $row[e4c] + $row[e4d] + $row[e4e] + $row[e4f] + $row[e4g])/7;
						$edrie = ($row[e3a] + $row[e3b] + $row[e3c] + $row[e3d] + $row[e3e])/5;
						$etwee = ($row[e2a] + $row[e2b] + $row[e2c] + $row[e2d] + $row[e2e] + $row[e2f])/6;
						$eeen = ($row[e1a] + $row[e1b] + $row[e1c])/3;
						$tedrie = ($row[t1a] + $row[t1b] + $row[t1c] + $row[e1a] + $row[e1b] + $row[e1c])/6;
						$teeen = ($row[t1a] + $row[t1b] + $row[t1c] + $row[e1a] + $row[e1b] + $row[e1c])/6;
						$tetwee = ($row[t2] + $row[e2a] + $row[e2b] + $row[e2c] + $row[e2d] + $row[e2e] + $row[e2f])/7;
						$tedrie = ($row[t3] + $row[e3a] + $row[e3b] + $row[e3c] + $row[e3d] + $row[e3e])/6; 
						$tevier = ($row[t4a] + $row[t4b] + $row[e4a] + $row[e4b] + $row[e4c] + $row[e4d] + $row[e4e] + $row[e4f] + $row[e4g])/9;
						$tevijf = ($row[t5] + $row[a5a] + $row[e5b])/3;
						$afgerondtet = round($teen, 2, PHP_ROUND_HALF_EVEN);
						$afgerondtee = round($tee, 2, PHP_ROUND_HALF_EVEN);
						$afgerondtete  = round($tete , 2, PHP_ROUND_HALF_EVEN);
						$afgerondteen = round($teen, 2, PHP_ROUND_HALF_EVEN);
						$afgerondeeen = round($eeen, 2, PHP_ROUND_HALF_EVEN);
						$afgerondetwee = round($etwee, 2, PHP_ROUND_HALF_EVEN);
						$afgerondedrie = round($edrie, 2, PHP_ROUND_HALF_EVEN);
						$afgerondevier = round($evier, 2, PHP_ROUND_HALF_EVEN);
						$afgerondeen = round($teeen, 2, PHP_ROUND_HALF_EVEN);
						$afgerondtwee = round($tetwee, 2, PHP_ROUND_HALF_EVEN);
						$afgeronddrie = round($tedrie, 2, PHP_ROUND_HALF_EVEN);
						$afgerondvier = round($tevier, 2, PHP_ROUND_HALF_EVEN);
						$afgerondvijf = round($tevijf, 2, PHP_ROUND_HALF_EVEN);
			/*1		echo("<tr><td>1.Cursus inhoud: </td> 
							<td>" . $afgerondteen  ."</td>
							<td>" . $afgerondeeen  ."</td>
							<td>" . $afgerondeen  ."</td>
							</tr>");
						echo("<tr><td> Commentaar: </td>
							<td>" . $row[tideas1] ."</td>
							<td>" . $row[eideas1]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*2		echo("<tr><td>2.Structuur van de cursus: </td>
							<td>" . $row[t2]  ."</td>
							<td>" . $afgerondetwee  ."</td>
							<td>" . $afgerondtwee  ."</td>
							</tr>");
						echo("<tr><td> Commentaar: </td>
							<td>" . $row[tideas2] ."</td>
							<td>" . $row[eideas2]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*3		echo("<tr><td>3.Cursus materiaal: </td>
							<td>" . $row[t3]  ."</td>
							<td>" . $afgerondedrie  ."</td>
							<td>" . $afgeronddrie  ."</td>
							</tr>");
						echo("<tr><td> Commentaar: </td>
							<td>" . $row[tideas3] ."</td>
							<td>" . $row[eideas3]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*4		echo("<tr><td>4.Indruk trainer: </td>
							<td>" . ($row[t4a] + $row[t4b])/2  ."</td>
							<td>" . $afgerondevier ."</td>
							<td>" . $afgerondvier  ."</td>
							</tr>");
						echo("<tr><td> Commentaar: </td>
							<td>" . $row[tideas4] ."</td>
							<td>" . $row[eideas4]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*5		echo("<tr><td>5.Algemeen oordeel: </td>
							<td>" . $row[t5]  ."</td>
							<td>" . ($row[a5a] + $row[e5b])/2  ."</td>
							<td>" . $afgerondvijf   ."</td>
							</tr>");
						echo("<tr><td> Commentaar: </td>
							<td>" . $row[tideas5] ."</td>
							<td>" . $row[eideas5]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*totaal	echo("<tr><td>Totaal gemiddeld rapportcijfer: </td>
							<td>" . $afgerondtet ."</td>
							<td>" . $afgerondtee ."</td>
							<td>" . $afgerondtete ."</td>
							</tr>");*/
?>

<!DOCTYPE html>

<html>
	<head>

		<link rel="stylesheet" type="text/css" href="style.css">
		<title></title>
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
			
			
				<form action="<?php echo("showmentor.php?mentor=" . $_GET['mentor'] . ""); ?>" method="post">
					<div class="center">
					</div>
				</form>

				
				
			
				<?php

				echo("<table class='ocenter'><tr><td class='center'>Overzicht formulier</td></tr>");
				echo("<tr><td></td><td> Tussentijdse Evaluatie </td><td>Eind Evaluatie</td></tr>");
				
				Connect();
				
				$getDatasql = mysql_query("SELECT * FROM formulieren WHERE contactgegevensID='" . $_GET['mentor'] . "'");
				while ($row = mysql_fetch_array($getDatasql))
					{
						echo ('
								<canvas id="resultChart"></canvas>
								<script type="text/javascript">
								var chartData = 
								{
									labels: ["1", "2", "3"],
									datasets: [
									{
										fillColor: "#48A97",
										strokeColor: "#48A4D1",
										data: [' . $row[t1a] . ', ' . $row[e1a] . ']
									},
									{
										fillColor: "rgba(73,188,170,0.4)",
										strokeColor: "rgba(72,174,209,0.4)",
										data: [' . $row[t1b] . ', ' . $row[e1b] . ']
									},
									{
										fillColor: "#48A97",
										strokeColor: "#48A4D1",
										data: [' . $row[t1c] . ', ' . $row[e1c] . ']
									}
									]
								}
										
									var ctx = document.getElementById("resultChart").getContext("2d");
									new Chart(ctx).Bar(chartData);
								</script>
						');
						
			/*1*/		echo("<tr><td>1.Cursusinhoud: </td> 
							<td> a:" . $row[t1a] . "</td>
							<td> a:" . $row[e1a]  ."</td>
							</tr>");
						echo("<tr><td> </td> 
							<td> b:" . $row[t1b]  ."</td>
							<td> b:" . $row[e1b]  ."</td>
							</tr>");
						echo("<tr><td> </td> 
							<td> c:" . $row[t1c]  ."</td>
							<td> c:" . $row[e1c]  ."</td>
							</tr>");
						echo("<tr><td> Commentaar: </td>
							<td>" . $row[tideas1] ."</td>
							<td>" . $row[eideas1]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*2*/		echo("<tr><td>2.Structuur van de cursus: </td>
							<td> a:" . $row[t2] . "</td>
							<td> a:" . $row[e2a]  ."</td> 
							</tr>");
						echo("<tr><td> </td> 
							<td></td>
							<td> b:" . $row[e2b] ."</td>
							</tr>");
						echo("<tr><td> </td> 
							<td></td>
							<td> c:" . $row[e2c]  ."</td>
							</tr>");
						echo("<tr><td> </td> 
							<td></td>
							<td> d:" . $row[e2d]  ."</td>
							</tr>");
						echo("<tr><td> </td> 
							<td></td>
							<td> e:" . $row[e2e]  ."</td>
							</tr>");
						echo("<tr><td> </td> 
							<td></td>
							<td> f:" . $row[e2f] ."</td>
							</tr>");
						echo("<tr><td> Commentaar: </td>
							<td>" . $row[tideas2] ."</td>
							<td>" . $row[eideas2]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*3*/		echo("<tr><td>3.Cursusmateriaal: </td> 
							<td> a:" . $row[t3]  ."</td>
							<td> a: " . $row[e3a]  ."</td>
							</tr>");
						echo("<tr><td></td> 
							<td></td>
							<td> b: " . $row[e3b]  ."</td>
							</tr>");
						echo("<tr><td></td> 
							<td></td>
							<td> c: " . $row[e3c]  ."</td>
							</tr>");
						echo("<tr><td></td> 
							<td></td>
							<td> d: " . $row[e3d]  ."</td>
							</tr>");
						echo("<tr><td></td> 
							<td></td>
							<td> e: " . $row[e3e]  ."</td>
							</tr>");
						echo("<tr><td> Commentaar: </td>
							<td>" . $row[tideas3] ."</td>
							<td>" . $row[eideas3]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*4*/		echo("<tr><td>4.Trainer: </td>
							<td> a:" . $row[t4a]  ."</td>
							<td> a:" . $row[e4a] ."</td>
							</tr>");
						echo("<tr><td> </td>
							<td> b:" . $row[t4b]  ."</td>
							<td> b:" . $row[e4b] ."</td>
							</tr>");
						echo("<tr><td> </td>
							<td></td>
							<td> c:" . $row[e4c]."</td>
							</tr>");
						echo("<tr><td> </td>
							<td></td>
							<td> d:" .  $row[e4d] ."</td>
							</tr>");
						echo("<tr><td> </td>
							<td></td>
							<td> e:" .  $row[e4e] ."</td>
							</tr>");
						echo("<tr><td> </td>
							<td></td>
							<td> f:" .  $row[e4f] ."</td>
							</tr>");
						echo("<tr><td> </td>
							<td></td>
							<td> g:" .  $row[e4g] ."</td>
							</tr>");
						echo("<tr><td> Commentaar: </td>
							<td>" . $row[tideas4] ."</td>
							<td>" . $row[eideas4]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*5*/		echo("<tr><td>5.Algemeen oordeel: </td>
							<td> a:" . $row[t5]  ."</td>
							<td> a:" . $row[a5a]  ."</td>
							</tr>");
						echo("<tr><td> </td>
							<td></td>
							<td> b:" . $row[e5b]  ."</td>
							</tr>");
						echo("<tr><td> Commentaar: </td>
							<td>" . $row[tideas5] ."</td>
							<td>" . $row[eideas5]  ."</td>
							</tr>");
			/*6*/		echo("<tr><td>6. Aanbevelen aan anderen ja/ nee </td>
							<td></td>
							<td> " . $row[e6]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*7*/		echo("<tr><td>7. Welke onderdelen hebben u het meest aangesproken en waarom.</td>
							<td></td>
							<td> " . $row[eideas7]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*8*/		echo("<tr><td>8. Waren er onderdelen die u overbodig vond.</td>
							<td></td>
							<td> " . $row[eideas8]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*9*/		echo("<tr><td>9. Bij welke onderdelen heeft u nieuwe vaardigheden opgedaan of uw vaardigheden verbeterd.</td>
							<td></td>
							<td> " . $row[eideas9]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*10*/		echo("<tr><td>10. Hoeveel tijd (uren) totaal besteed aan de cursus</td>
							<td></td>
							<td> " . $row[eideas10]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*11*/		echo("<tr><td>11. Duur cursus </td>
							<td></td>
							<td> " . $row[e11]  ."</td>
							</tr>");
						echo("<tr style='height: 15px;'></tr>");
			/*12*/		echo("<tr><td>12. Interesse in een vervolgcursus </td>
							<td></td>
							<td> " . $row[e12]  ."</td>
							</tr>");
						echo("<tr><td> Opmerkingen:</td>
							<td></td>
							<td> " . $row[eideas12]  ."</td>
							</tr>");
					}
				CloseConnect();
				echo("</table>");
				?>
					
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>
</html>
