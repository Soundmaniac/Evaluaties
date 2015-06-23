<?php
	function generateRows()
	{
		mysql_connect("localhost", "root", "usbw") or die("Error message: " .mysql_error());
		mysql_select_db("project");
		
		
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(isset($_POST['search']) && $_POST['search'] != null && $_POST['search'] != "")
			{
				$searchq = $_POST['search'];
				if(!preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $searchq))
				{
					echo("Er zijn alleen letters, spaties en interpuncties toegestaan.");
					$selectstring = "SELECT c.*, t.submitdate AS tsubmitdate, e.submitdate AS esubmitdate FROM cursisten c LEFT JOIN ttsurveyresults t ON c.cursistID = t.cursistID LEFT JOIN eesurveyresults e ON c.cursistID = e.cursistID";
				}
				else
				{
					//header("Location: students.php?query=" . $searchq); querystring functie kan worden gemaakt.
					$selectstring = "SELECT c.*, t.submitdate AS tsubmitdate, e.submitdate AS esubmitdate FROM cursisten c LEFT JOIN ttsurveyresults t ON c.cursistID = t.cursistID LEFT JOIN eesurveyresults e ON c.cursistID = e.cursistID WHERE c.cursistVoornaam LIKE '%$searchq%' OR c.cursistAchternaam LIKE '%$searchq%'";
				}
			}
			else
			{
				echo "Zoek invoer was niet ingevoerd.";
				$selectstring = "SELECT c.*, t.submitdate AS tsubmitdate, e.submitdate AS esubmitdate FROM cursisten c LEFT JOIN ttsurveyresults t ON c.cursistID = t.cursistID LEFT JOIN eesurveyresults e ON c.cursistID = e.cursistID";
			}
		}
		else
		{
			$selectstring = "SELECT c.*, t.submitdate AS tsubmitdate, e.submitdate AS esubmitdate FROM cursisten c LEFT JOIN ttsurveyresults t ON c.cursistID = t.cursistID LEFT JOIN eesurveyresults e ON c.cursistID = e.cursistID";
		}
		
		$sql = mysql_query($selectstring);
		while ($sqlvalue = mysql_fetch_array($sql))
		{			
			$cursistTussenvoegsel = ($sqlvalue[cursistTussenvoegsel] != null ? $sqlvalue[cursistTussenvoegsel] : "-");
			$showttdate = ($sqlvalue[tsubmitdate] != null ? date('d/m/Y', strtotime($sqlvalue[tsubmitdate])) : "-");
			$showeedate = ($sqlvalue[esubmitdate] != null? date('d/m/Y', strtotime($sqlvalue[esubmitdate])) : "-");
			echo("
				<tr>
					<td class='string'>" . $sqlvalue[cursistVoornaam] . "</td>
					<td class='string'>" . $cursistTussenvoegsel . "</td>
					<td class='string'>" . $sqlvalue[cursistAchternaam] . "</td>
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
					<td class='date'>" . $showttdate . "</td>
					<td class='date'>" . $showeedate . "</td>
					<td class='actions'>
						<a href='editCursistInfo.php?id=" . $sqlvalue[cursistID] . "'>
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
	
	function generateCourses()
	{
		mysql_connect("localhost", "root", "usbw") or die("Error message: " .mysql_error());
		mysql_select_db("project");
		
		$selectstring = "SELECT * FROM `cursussen`";
		$sql = mysql_query($selectstring);
		while ($sqlvalue = mysql_fetch_array($sql))
		{
			/*Value aanpassen/vervangen:*/
			echo("
			<tr>
				<td>
					<a href='students.php?course=" . $sqlvalue[cursusID] . "' />" . $sqlvalue[cursusID] . " - " . $sqlvalue[cursusnaam] . "</a>
				</td>
				<td class='actions'>
					<a href='editCourse.php?id=" . $sqlvalue[cursusID] . "'>
					<img src='images/wijzigen.png'></img>
					</a>
					<a class='confirmation' href='deleteCourse.php?id=" . $sqlvalue[cursusID] . "'>
						<img src='images/verwijderen.png'></img>
					</a>
				</td>
			</tr>
			");
		}
		mysql_close();
	}
?>