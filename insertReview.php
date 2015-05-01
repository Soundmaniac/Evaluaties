<?php

include_once("codegenfunctions.php");

OpenConnection();
/*
* session_start();
* $result = mysql_query("SELECT * FROM account WHERE gebruiker ='" . $_SESSION['gebruiker'] . "' ");
* $row = mysql_fetch_assoc($result);
*/

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


$selectstring1 = "INSERT INTO ttsurveyresults(cursistID, cursusinhouda, cursusinhoudb, cursusinhoudc, cursusinhoudcomm, structuura, cursustmateriaala, trainera, trainerb, trainercomm, algemeenoordeela, algemeenoordeelcomm) VALUES('$cursistID', '$cursusinhouda', '$cursusinhoudb', '$cursusinhoudc', '$cursusinhoudcomm', '$structuura', '$cursustmateriaala', '$trainera', '$trainerb', '$trainercomm', '$algemeenoordeela', '$algemeenoordeelcomm')";

$sql = mysql_query($selectstring1);
if(!$sql)
{
    echo("Could not run query: " . mysql_error());
    exit;
}

CloseConnection();
header( 'Location: profile.php' );
?>