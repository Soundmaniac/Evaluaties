<?php

include_once("codegenfunctions.php");

OpenConnection();
/*
* session_start();
* $result = mysql_query("SELECT * FROM account WHERE gebruiker ='" . $_SESSION['gebruiker'] . "' ");
* $row = mysql_fetch_assoc($result);
*/

/*Every specific column can be handled differently when there is not value being posted
by replacing the null value in the following part of the code:*/
$cursistID = $_POST['id'];
$lang = $_GET['lang'];
$cursusinhouda = (isset($_POST['group1a']) ? $_POST['group1a'] : null);
$cursusinhoudb = (isset($_POST['group1b']) ? $_POST['group1b'] : null);
$cursusinhoudc = (isset($_POST['group1c']) ? $_POST['group1c'] : null);
$cursusinhoudcomm = (isset($_POST['txtarea1']) ? mysql_real_escape_string(htmlentities($_POST['txtarea1'])) : null);
$structuura = (isset($_POST['group2']) ? $_POST['group2'] : null);
$cursusmateriaala = (isset($_POST['group3']) ? $_POST['group3'] : null);
$trainera = (isset($_POST['group4a']) ? $_POST['group4a'] : null);
$trainerb = (isset($_POST['group4b']) ? $_POST['group4b'] : null);
$trainercomm = (isset($_POST['txtarea2']) ? mysql_real_escape_string(htmlentities($_POST['txtarea2'])) : null);
$algemeenoordeela = (isset($_POST['group5']) ? $_POST['group5'] : null);
$algemeenoordeelcomm =(isset($_POST['txtarea3']) ? mysql_real_escape_string(htmlentities($_POST['txtarea3'])) : null);
/*End of setting variables*/

$querystring1 = "SELECT c.`cursistVoornaam`, c.`cursistTussenvoegsel`, c.`cursistAchternaam` FROM `cursisten` c WHERE `cursistID` = '" . $cursistID . "'";
$querystring2 = "SELECT cursistID FROM ttsurveyresults WHERE cursistID = '" . $cursistID . "'";
$querystring3 = "INSERT INTO ttsurveyresults(cursistID, submitdate, cursusinhouda, cursusinhoudb, cursusinhoudc, cursusinhoudcomm, structuura, cursusmateriaala, trainera, trainerb, trainercomm, algemeenoordeela, algemeenoordeelcomm) VALUES('$cursistID', NOW(), '$cursusinhouda', '$cursusinhoudb', '$cursusinhoudc', '$cursusinhoudcomm', '$structuura', '$cursusmateriaala', '$trainera', '$trainerb', '$trainercomm', '$algemeenoordeela', '$algemeenoordeelcomm')";


if(mysql_num_rows(mysql_query($querystring1)) > 0)
{
	if(mysql_num_rows(mysql_query($querystring2)) > 0)
	{
		echo("De resultaten van de persoon met cursistID " . $cursistID . " bestaan al. <a href='profile.php'>Klik hier (href aanpassen!)</a> om terug te gaan");
		/*Wat hierna gebeurd kun je eventueel aanpassen*/
		exit;
	}
	else
	{
		$sql = mysql_query($querystring3);
		if(!$sql)
		{
			echo("Could not run query: " . mysql_error());
			exit;
		}
		else
		{
			$sql = mysql_query($querystring1);
			while ($sqlvalue = mysql_fetch_array($sql))
			{
				$to = "info@pcilanguages.com";
				$subject = "PCI evaluatie";
				$message = 'Beste PCI Languages medewerker,<br /><br />Er is een evaluatie ingevuld door: <br />' . $sqlvalue['cursistVoornaam'] . ' ' . $sqlvalue['cursistTussenvoegsel'] . ' ' . $sqlvalue['cursistAchternaam'] . '<br />De resultaten staat in de volgende link: <a href="http://evaluaties.pcilanguages.com/compactresults.php?id=' . $cursistID . '">Klik hier</a>.<br /><br />Nog een fijne dag.';
				$headers  = "From: info@pcilanguages.com\r\n";
				$headers .= "Content-type: text/html\r\n";
				//options to send to cc+bcc
				//$headers .= "Cc: [email]xxx@xxx.com[/email]";
				mail($to, $subject, $message, $headers);
			}
		}
	}
}

CloseConnection();
header( 'Location: thankpage.php?lang=' . $lang . "&course=" . $_GET['course']);
?>