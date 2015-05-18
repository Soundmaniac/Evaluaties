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
$cursusinhouda = (isset($_POST['group1a']) ? $_POST['group1a'] : null);
$cursusinhoudb = (isset($_POST['group1b']) ? $_POST['group1b'] : null);
$cursusinhoudc = (isset($_POST['group1c']) ? $_POST['group1c'] : null);
$cursusinhoudcomm = (isset($_POST['txtarea1']) ? mysql_real_escape_string(htmlentities($_POST['txtarea1'])) : null);
$structuura = (isset($_POST['group2']) ? $_POST['group2'] : null);
$cursustmateriaala = (isset($_POST['group3']) ? $_POST['group3'] : null);
$trainera = (isset($_POST['group4a']) ? $_POST['group4a'] : null);
$trainerb = (isset($_POST['group4b']) ? $_POST['group4b'] : null);
$trainercomm = (isset($_POST['txtarea2']) ? mysql_real_escape_string(htmlentities($_POST['txtarea2'])) : null);
$algemeenoordeela = (isset($_POST['group5']) ? $_POST['group5'] : null);
$algemeenoordeelcomm =(isset($_POST['txtarea3']) ? mysql_real_escape_string(htmlentities($_POST['txtarea3'])) : null);
/*End of setting variables*/

$query1 = "SELECT cursistID FROM ttsurveyresults WHERE cursistID = '" . $cursistID . "'";
$query2 = "INSERT INTO ttsurveyresults(cursistID, cursusinhouda, cursusinhoudb, cursusinhoudc, cursusinhoudcomm, structuura, cursustmateriaala, trainera, trainerb, trainercomm, algemeenoordeela, algemeenoordeelcomm) VALUES('$cursistID', '$cursusinhouda', '$cursusinhoudb', '$cursusinhoudc', '$cursusinhoudcomm', '$structuura', '$cursustmateriaala', '$trainera', '$trainerb', '$trainercomm', '$algemeenoordeela', '$algemeenoordeelcomm')";

if(mysql_num_rows(mysql_query($query1)) > 0)
{
	echo("De resultaten van de persoon met cursistID " . $cursistID . " bestaan al.");
	/*Wat hierna gebeurd kun je eventueel aanpassen*/
	exit;
}
else
{
	$sql = mysql_query($query2);
	if(!$sql)
	{
		echo("Could not run query: " . mysql_error());
		exit;
	}
}

CloseConnection();
header( 'Location: profile.php' );
?>