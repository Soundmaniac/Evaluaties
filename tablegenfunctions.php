<?php
	function generateRows()
	{
		mysql_connect("localhost", "root", "usbw") or die("Error message: " .mysql_error());
		mysql_select_db("project");
		
		$selectstring = "SELECT c.*, t.submitdate AS tsubmitdate, e.submitdate AS esubmitdate FROM cursisten c LEFT JOIN ttsurveyresults t ON c.cursistID = t.cursistID LEFT JOIN eesurveyresults e ON c.cursistID = e.cursistID";
		//$selectstring = "SELECT * FROM cursisten";
		$sql = mysql_query($selectstring);
		while ($sqlvalue = mysql_fetch_array($sql))
		{			
			$showttdate = ($sqlvalue[tsubmitdate] != null ? date('d/m/Y', strtotime($sqlvalue[tsubmitdate])) : "-");
			$showeedate = ($sqlvalue[esubmitdate] != null? date('d/m/Y', strtotime($sqlvalue[esubmitdate])) : "-");
			echo("
				<tr>
					<td>" . $sqlvalue[cursistnaam] . "</td>
					<td>
						<select id='ddlEvaluatie' onchange='copyToClip(this)'>
							<option selected>Selecteer een optie...</option>
							<option value='TussentijdseEvaluatie.php?id=" . $sqlvalue[cursistID] . "'>Tussentijdse evaluatie</option>
							<option value='EindtijdEvaluatie.php?id=" . $sqlvalue[cursistID] . "'>Eind evaluatie</option>
						</select>
					</td>
					<td>
						<a href='results.php?id=" . $sqlvalue[cursistID] . "'>Klik</a>
					</td>
					<td>" . $showttdate . "</td>
					<td>" . $showeedate . "</td>
					<td class='actions'>
						<a href='#'>
							<img src='images/wijzigen.png'></img>
						</a>
						<a class='confirmation' href='delete.php?id=" . $sqlvalue[cursistID] . "'>
							<img src='images/verwijderen.png'></img>
						</a>
					</td>
				</tr>
				");
		}
		mysql_close();
	}
?>