<?php
	function generateRows()
	{
		mysql_connect("localhost", "root", "usbw") or die("Error message: " .mysql_error());
		mysql_select_db("project");
		
		/*TO DO: selecstrings vervangen*/
		$selectstring = "SELECT c.*, t.submitdate AS tsubmitdate, e.submitdate AS esubmitdate, cu.* FROM cursisten c LEFT JOIN ttsurveyresults t ON c.cursistID = t.cursistID LEFT JOIN eesurveyresults e ON c.cursistID = e.cursistID LEFT JOIN cursussen cu ON cu.cursusID = c.cursusID WHERE cu.cursusID = '" . $_GET['course'] . "'";
		//OLD STRING: $selectstring = "SELECT c.*, t.submitdate AS tsubmitdate, e.submitdate AS esubmitdate FROM cursisten c LEFT JOIN ttsurveyresults t ON c.cursistID = t.cursistID LEFT JOIN eesurveyresults e ON c.cursistID = e.cursistID";
		
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(isset($_POST['search']) && $_POST['search'] != null && $_POST['search'] != "")
			{
				$searchq = $_POST['search'];
				if(!preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $searchq))
				{
					echo("Er zijn alleen letters, spaties en interpuncties toegestaan.");
				}
				else
				{
					//TO DO: subquery gaat verloren na postback, waardoor session wordt overschreven. Z.s.m. oplossen!!!
					$selectstring = "SELECT c.*, t.submitdate AS tsubmitdate, e.submitdate AS esubmitdate, cu.* FROM cursisten c LEFT JOIN ttsurveyresults t ON c.cursistID = t.cursistID LEFT JOIN eesurveyresults e ON c.cursistID = e.cursistID LEFT JOIN cursussen cu ON cu.cursusID = c.cursusID WHERE cu.cursusID = '" . $_GET['course'] . "' AND c.cursistVoornaam LIKE '%$searchq%' OR c.cursistAchternaam LIKE '%$searchq%';";
					//OLD STRING: $selectstring = "SELECT c.*, t.submitdate AS tsubmitdate, e.submitdate AS esubmitdate FROM cursisten c LEFT JOIN ttsurveyresults t ON c.cursistID = t.cursistID LEFT JOIN eesurveyresults e ON c.cursistID = e.cursistID WHERE c.cursistVoornaam LIKE '%$searchq%' OR c.cursistAchternaam LIKE '%$searchq%'";
				}
			}
			else
			{
				echo "Zoek invoer was niet ingevoerd.";
			}
		}
		
		$sql = mysql_query($selectstring);
		while ($sqlvalue = mysql_fetch_array($sql))
		{			
			$cursistTussenvoegsel = ($sqlvalue['cursistTussenvoegsel'] != null ? $sqlvalue['cursistTussenvoegsel'] : "-");
			$showttdate = ($sqlvalue['tsubmitdate'] != null ? date('d/m/Y', strtotime($sqlvalue['tsubmitdate'])) : "-");
			$showeedate = ($sqlvalue['esubmitdate'] != null? date('d/m/Y', strtotime($sqlvalue['esubmitdate'])) : "-");
			echo("
				<tr>
					<td class='string'>" . $sqlvalue['cursistVoornaam'] . "</td>
					<td class='string'>" . $cursistTussenvoegsel . "</td>
					<td class='string'>" . $sqlvalue['cursistAchternaam'] . "</td>
					<td>
						<select id='ddlEvaluatie' onchange='copyToClip(this)'>
							<option selected>Selecteer een optie...</option>
							<option value='TussentijdseEvaluatie.php?id=" . $sqlvalue['cursistID'] . "'>Tussentijdse evaluatie</option>
							<option value='EindtijdEvaluatie.php?id=" . $sqlvalue['cursistID'] . "'>Eind evaluatie</option>
						</select>
					</td>
					<td>
						<a href='results.php?id=" . $sqlvalue['cursistID'] . "'>Klik</a>
					</td>
					<td class='date'>" . $showttdate . "</td>
					<td class='date'>" . $showeedate . "</td>
					<td class='actions'>
						<div class='positionaction'>
							<a title='Wijzigen' href='editStudentsInfo.php?course=" . $_GET['course'] . "&id=" . $sqlvalue['cursistID'] . "'>
								<img src='images/wijzigen.png'></img>
							</a>
							<a title='Verwijderen' class='confirmation' href='delete.php?course=" . $_GET['course'] . "&id=" . $sqlvalue['cursistID'] . "'>
								<img src='images/verwijderen.png'></img>
							</a>
						</div>
					</td>
				</tr>
				");
		}
		mysql_close();
	}
	
	function generateCourses($coursevalue, $search)
	{
		mysql_connect("localhost", "root", "usbw") or die("Error message: " .mysql_error());
		mysql_select_db("project");
		
		if($search == false)
		{
			//$selectstring = "SELECT * FROM `cursussen` WHERE `bedrijfnaam`='". $coursevalue ."';";
			$selectstring = "SELECT c.*, b.bedrijfnaam FROM `cursussen` c LEFT JOIN bedrijven b ON c.bedrijfID = b.bedrijfID WHERE b.bedrijfnaam = '". $coursevalue ."';";
		}
		else
		{
			//$selectstring = "SELECT * FROM `cursussen` WHERE `bedrijfnaam`='". "PCI2" ."'";
			$selectstring = "SELECT c.*, b.bedrijfnaam FROM `cursussen` c LEFT JOIN bedrijven b ON c.bedrijfID = b.bedrijfID WHERE c.`cursusnaam` LIKE '%$coursevalue%' OR c.`projectnummer` LIKE '%$coursevalue%' OR c.`trainernaam` LIKE '%$coursevalue%' OR b.`bedrijfnaam` LIKE '%$coursevalue%';";
		}
		$sql = mysql_query($selectstring);
		while ($sqlvalue = mysql_fetch_array($sql))
		{
			/*Value aanpassen/vervangen:*/
			echo("
			<tr>
				<td class='cursusnaam'>
					<a href='students.php?course=" . $sqlvalue["cursusID"] . "' />" . $sqlvalue["cursusID"] . " - " . $sqlvalue["cursusnaam"] . "</a>
				</td>
				<td>" . $sqlvalue["projectnummer"] . "</td>
				<td class='trainernaam'>" . $sqlvalue["trainernaam"] . "</td>
				<td class='date'>" . $sqlvalue["begindatum"] . "</td>
				<td class='date'>" . $sqlvalue["einddatum"] . "</td>
				<td class='actions'>
					<a title='Wijzigen' href='editCourseInfo.php?company=" . $_GET['company'] . "&id=" . $sqlvalue["cursusID"] . "'>
						<img src='images/wijzigen.png'></img>
					</a>
					<a title='Verwijderen' class='confirmation' href='deleteCourse.php?company=" . $_GET['company'] . "&id=" . $sqlvalue["cursusID"] . "'>
						<img src='images/verwijderen.png'></img>
					</a>
				</td>
			</tr>
			");
		}
		mysql_close();
	}
?>