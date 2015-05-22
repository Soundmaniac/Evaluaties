<?php
	function generateRows()
	{
		mysql_connect("localhost", "root", "usbw") or die("Error message: " .mysql_error());
		mysql_select_db("project");
		
		$selectstring = "SELECT * FROM cursisten";
		$sql = mysql_query($selectstring);
		while ($sqlvalue = mysql_fetch_array($sql))
		{
			echo("
				<tr>
					<td>" . $sqlvalue[cursistnaam] . "</td>
					<td>
						<select id='ddlEvaluatie' onchange='copyToClip()'>
							<option selected>Selecteer een optie...</option>
							<option value='TussentijdseEvaluatie.php?id=" . $sqlvalue[cursistID] . "'>Tussentijdse evaluatie</option>
							<option value='EindtijdEvaluatie.php?id=" . $sqlvalue[cursistID] . "'>Eind evaluatie</option>
						</select>
					</td>
					<td>
						<a href='results.php?id=" . $sqlvalue[cursistID] . "'>Klik</a>
					</td>
					<td>datum1</td>
					<td>datum2</td>
					<td>
						<select>
							<option selected>Selecteer een optie...</option>
							<option value='edit'>Wijzigen</option>
							<option value='delete'>Delete</option>
						</select>
					</td>
				</tr>
				");
		}
		mysql_close();
	}
?>