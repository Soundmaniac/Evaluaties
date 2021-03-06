<?php
	include("functions.php");
	function generateRows()
	{
		OpenConnection();
		$selectstring = "SELECT c.*, t.submitdate AS tsubmitdate, e.submitdate AS esubmitdate, cu.* FROM cursisten c LEFT JOIN ttsurveyresults t ON c.cursistID = t.cursistID LEFT JOIN eesurveyresults e ON c.cursistID = e.cursistID LEFT JOIN cursussen cu ON cu.cursusID = c.cursusID WHERE cu.cursusID = '" . $_GET['course'] . "'";
		
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

            $sqlcursussen = mysql_query("SELECT * FROM cursussen WHERE cursusID='" . $sqlvalue['cursusID'] . "'");
            $rowcursussen = mysql_fetch_array($sqlcursussen);
            $sqlbedrijven = mysql_query("SELECT * FROM bedrijven WHERE bedrijfID='" . $rowcursussen['bedrijfID'] . "'");
            $rowbedrijven = mysql_fetch_array($sqlbedrijven);

			echo("
				<tr>
					<td class='string'>" . $sqlvalue['cursistVoornaam'] . "</td>
					<td class='string'>" . $cursistTussenvoegsel . "</td>
					<td class='string'>" . $sqlvalue['cursistAchternaam'] . "</td>
					<td>
						<select id='ddlEvaluatie' onchange='copyToClip(this)'>
							<option selected>Selecteer een optie...</option>
							<option value='TussentijdseEvaluatie.php?id=" . $sqlvalue['cursistID'] . "&company=". $rowbedrijven['bedrijfID'] . "&course=" . $_GET['course'] . "'>Tussentijdse evaluatie (NL)</option>
							<option value='EindtijdEvaluatie.php?id=" . $sqlvalue['cursistID'] . "&company=". $rowbedrijven['bedrijfID'] . "&course=" . $_GET['course'] . "'>Eind evaluatie (NL)</option>
							<option value='TussentijdseEvaluatieENG.php?id=" . $sqlvalue['cursistID'] . "&company=". $rowbedrijven['bedrijfID'] . "&course=" . $_GET['course'] . "'>Midterm course evaluation (ENG)</option>
							<option value='EindtijdEvaluatieENG.php?id=" . $sqlvalue['cursistID'] . "&company=". $rowbedrijven['bedrijfID'] . "&course=" . $_GET['course'] . "'>Final course evaluation (ENG)</option>
						</select>
					</td>
					<td>
						<a href='compactresults.php?id=" . $sqlvalue['cursistID'] . "'>Klik</a>
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
		CloseConnection();
	}
	
	function generateCourses($searchvalue, $search)
	{
		OpenConnection();
		if(!$search)
		{
			$selectstring = "SELECT c.*, b.bedrijfnaam FROM `cursussen` c LEFT JOIN bedrijven b ON c.bedrijfID = b.bedrijfID WHERE b.bedrijfnaam = '". $_GET['company'] ."';";
		}
		else
		{
			$selectstring = "SELECT c.*, b.bedrijfnaam FROM `cursussen` c LEFT JOIN bedrijven b ON c.bedrijfID = b.bedrijfID WHERE b.`bedrijfnaam` = '" . $_GET['company'] . "' AND c.`cursusnaam` LIKE '%" . $searchvalue . "%' OR b.`bedrijfnaam` = '" . $_GET['company'] . "' AND c.`projectnummer` LIKE '%" . $searchvalue . "%' OR b.`bedrijfnaam` = '" . $_GET['company'] . "' AND c.`trainernaam` LIKE '%" . $searchvalue . "%';";
		}
		
		$sql = mysql_query($selectstring);
		while ($sqlvalue = mysql_fetch_array($sql))
		{
			$firstdate = ($sqlvalue['begindatum'] != null ? date('d/m/Y', strtotime($sqlvalue['begindatum'])) : "-");
			$lastdate = ($sqlvalue['einddatum'] != null? date('d/m/Y', strtotime($sqlvalue['einddatum'])) : "-");
			echo("
			<tr>
				<td class='cursusnaam'>
					<a href='students.php?course=" . $sqlvalue["cursusID"] . "' />" . $sqlvalue["cursusnaam"] . "</a>
				</td>
				<td>" . $sqlvalue["projectnummer"] . "</td>
				<td class='trainernaam'>" . $sqlvalue["trainernaam"] . "</td>
				<td><a href='compactcourseresults.php?course=" . $sqlvalue['cursusID'] . "'>Klik</a></td>
				<td class='date'>" . $firstdate . "</td>
				<td class='date'>" . $lastdate . "</td>
				<td class='actions'>
					<div class='positionaction'>
						<a title='Wijzigen' href='editCourseInfo.php?company=" . $_GET['company'] . "&id=" . $sqlvalue["cursusID"] . "'>
							<img src='images/wijzigen.png'></img>
						</a>
						<a title='Verwijderen' class='confirmation' href='deleteCourse.php?company=" . $_GET['company'] . "&id=" . $sqlvalue["cursusID"] . "'>
							<img src='images/verwijderen.png'></img>
						</a>
					</div>
				</td>
			</tr>
			");
		}
		CloseConnection();
	}
?>