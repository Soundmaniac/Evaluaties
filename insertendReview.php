<?php

include_once("codegenfunctions.php");

OpenConnection();
//session_start();
//$selectIDSQL = mysql_query("SELECT ID FROM account WHERE gebruiker = '$_SESSION[gebruiker]'");
//$selectedID = mysql_fetch_array($selectIDSQL);

$cursistID = $_POST['id'];
$meninga = (isset($_POST['group1a']) ? $_POST['group1a'] : null);
$meningb = (isset($_POST['group1b']) ? $_POST['group1b'] : null);
$meningc = (isset($_POST['group1c']) ? $_POST['group1c'] : null);
$meningcomm = (isset($_POST['txtarea1']) ? mysql_real_escape_string(htmlentities($_POST['txtarea1'])) : null);
$structuura = (isset($_POST['group2a']) ? $_POST['group2a'] : null);
$structuurb = (isset($_POST['group2b']) ? $_POST['group2b'] : null);
$structuurc = (isset($_POST['group2c']) ? $_POST['group2c'] : null);
$structuurd = (isset($_POST['group2d']) ? $_POST['group2d'] : null);
$structuure = (isset($_POST['group2e']) ? $_POST['group2e'] : null);
$structuurf = (isset($_POST['group2f']) ? $_POST['group2f'] : null);
$structuurcomm = (isset($_POST['txtarea2']) ? mysql_real_escape_string(htmlentities($_POST['txtarea2'])) : null);
$cursusmateriaala = (isset($_POST['group3a']) ? $_POST['group3a'] : null);
$cursusmateriaalb = (isset($_POST['group3b']) ? $_POST['group3b'] : null);
$cursusmateriaalc = (isset($_POST['group3c']) ? $_POST['group3c'] : null);
$cursusmateriaald = (isset($_POST['group3d']) ? $_POST['group3d'] : null);
$cursusmateriaale = (isset($_POST['group3e']) ? $_POST['group3e'] : null);
$cursusmateriaalcomm = (isset($_POST['txtarea3']) ? mysql_real_escape_string(htmlentities($_POST['txtarea3'])) : null);
$trainera = (isset($_POST['group4a']) ? $_POST['group4a'] : null);
$trainerb = (isset($_POST['group4b']) ? $_POST['group4b'] : null);
$trainerc = (isset($_POST['group4c']) ? $_POST['group4c'] : null);
$trainerd = (isset($_POST['group4d']) ? $_POST['group4d'] : null);
$trainere = (isset($_POST['group4e']) ? $_POST['group4e'] : null);
$trainerf = (isset($_POST['group4f']) ? $_POST['group4f'] : null);
$trainerg = (isset($_POST['group4g']) ? $_POST['group4g'] : null);
$trainercomm = (isset($_POST['txtarea4']) ? mysql_real_escape_string(htmlentities($_POST['txtarea4'])) : null);
$algemeena = (isset($_POST['group5a']) ? $_POST['group5a'] : null);
$algemeenb = (isset($_POST['group5b']) ? $_POST['group5b'] : null);
$algemeencomm = (isset($_POST['txtarea5']) ? mysql_real_escape_string(htmlentities($_POST['txtarea5'])) : null);
$aanbeveling = (isset($_POST['group6']) ? $_POST['group6'] : null);
$aangesprokenonderdelen = (isset($_POST['txtarea7']) ? mysql_real_escape_string(htmlentities($_POST['txtarea7'])) : null);
$overbodigeonderdelen = (isset($_POST['txtarea8']) ? mysql_real_escape_string(htmlentities($_POST['txtarea8'])) : null);
$nieuwevaardigheden = (isset($_POST['txtarea9']) ? mysql_real_escape_string(htmlentities($_POST['txtarea9'])) : null);
$voorbereiding = (isset($_POST['txtarea10']) ? mysql_real_escape_string(htmlentities($_POST['txtarea10'])) : null);
$lengtecursus = (isset($_POST['group11']) ? $_POST['group11'] : null);;
$vervolgcursus = (isset($_POST['group12']) ? $_POST['group12'] : null);
$wensen = (isset($_POST['txtarea12']) ? mysql_real_escape_string(htmlentities($_POST['txtarea12'])) : null);

$selectstring = "INSERT INTO eesurveyresults(cursistID, meninga, meningb, meningc, meningcomm, structuura, structuurb,structuurc, structuurd, structuure, structuurf, structuurcomm, cursusmateriaala, cursusmateriaalb, cursusmateriaalc, cursusmateriaald, cursusmateriaale, cursusmateriaalcomm, trainera, trainerb, trainerc, trainerd, trainere, trainerf, trainerg, trainercomm, algemeena, algemeenb, algemeencomm, aanbeveling, aangesprokenonderdelen, overbodigeonderdelen, nieuwevaardigheden, voorbereiding, lengtecursus, vervolgcursus, wensen) VALUES('$cursistID', '$meninga', '$meningb', '$meningc', '$meningcomm', '$structuura', '$structuurb', '$structuurc', '$structuurd', '$structuure', '$structuurf', '$structuurcomm', '$cursusmateriaala', '$cursusmateriaalb', '$cursusmateriaalc', '$cursusmateriaald', '$cursusmateriaale', '$cursusmateriaalcomm', '$trainera', '$trainerb', '$trainerc', '$trainerd', '$trainere', '$trainerf', '$trainerg', '$trainercomm', '$algemeena', '$algemeenb', '$algemeencomm', '$aanbeveling', '$aangesprokenonderdelen', '$overbodigeonderdelen', '$nieuwevaardigheden', '$voorbereiding', '$lengtecursus', '$vervolgcursus', '$wensen')";

$sql = mysql_query($selectstring);
if(!$sql)
{
    echo("Could not run query: " . mysql_error());
    exit;
}

CloseConnection();

header( 'Location: profile.php' );
?>