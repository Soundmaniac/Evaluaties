<?php
	
	include_once("functions.php");

	if(isset($_POST['testvalues']))
	{
		Connect();
		session_start();

		$selectIDSQL = mysql_query("SELECT ID FROM account WHERE gebruiker = '$_SESSION[gebruiker]'");
		$selectedID = mysql_fetch_array($selectIDSQL);

		$RB1 = $_POST['group1a'];
		$RB2 = $_POST['group1b'];
		$RB3 = $_POST['group1c'];
		$txt1 = mysql_real_escape_string(htmlentities($_POST['txtarea1']));
		$RB4 = $_POST['group2a'];
		$RB5 = $_POST['group2b'];
		$RB6 = $_POST['group2c'];
		$RB7 = $_POST['group2d'];
		$RB8 = $_POST['group2e'];
		$RB9 = $_POST['group2f'];
		$txt2 = mysql_real_escape_string(htmlentities($_POST['txtarea2']));
		$RB10 = $_POST['group3a'];
		$RB11 = $_POST['group3b'];
		$RB12 = $_POST['group3c'];
		$RB13 = $_POST['group3d'];
		$RB14 = $_POST['group3e'];
		$txt3 = mysql_real_escape_string(htmlentities($_POST['txtarea3']));
		$RB15 = $_POST['group4a'];
		$RB16 = $_POST['group4b'];
		$RB17 = $_POST['group4c'];
		$RB18 = $_POST['group4d'];
		$RB19 = $_POST['group4e'];
		$RB20 = $_POST['group4f'];
		$RB21 = $_POST['group4g'];
		$txt4 = mysql_real_escape_string(htmlentities($_POST['txtarea4']));
		$RB22 = $_POST['group5a'];
		$RB23 = $_POST['group5b'];
		$txt5 = mysql_real_escape_string(htmlentities($_POST['txtarea5']));
		$RB24 = $_POST['group6'];
		$txt7 = mysql_real_escape_string(htmlentities($_POST['txtarea7']));
		$txt8 = mysql_real_escape_string(htmlentities($_POST['txtarea8']));
		$txt9 = mysql_real_escape_string(htmlentities($_POST['txtarea9']));
		$txt10 = mysql_real_escape_string(htmlentities($_POST['txtarea10']));
		$RB25 = $_POST['group11'];
		$RB26 = $_POST['group12'];
		$txt12 = mysql_real_escape_string(htmlentities($_POST['txtarea12']));

		mysql_query("
			UPDATE formulieren 
			SET formulieren.e1a = '" . $RB1 . "', 
			formulieren.e1b = '" . $RB2 . "', 
			formulieren.e1c = '" . $RB3 . "',
			formulieren.eideas1 = '" . $txt1 . "',
			formulieren.e2a = '" . $RB4 . "', 
			formulieren.e2b = '" . $RB5 . "',
			formulieren.e2c = '" . $RB6 . "', 
			formulieren.e2d = '" . $RB7 . "',
			formulieren.e2e = '" . $RB8 . "',
			formulieren.e2f = '" . $RB9 . "',
			formulieren.eideas2 = '" . $txt2 . "',
			formulieren.contactgegevensID='" . $selectedID['ID'] . "',
			formulieren.e4a = '" . $RB15 . "', 
			formulieren.e4b = '" . $RB16 . "', 
			formulieren.e4c = '" . $RB17 . "', 
			formulieren.e4d = '" . $RB18 . "', 
			formulieren.e4e = '" . $RB19 . "', 
			formulieren.e4f = '" . $RB20 . "', 
			formulieren.e4g = '" . $RB21 . "', 
			formulieren.eideas4 = '" . $txt4 . "',
			formulieren.a5a = '" . $RB22 . "', 
			formulieren.e5b = '" . $RB23 . "', 
			formulieren.eideas5 = '" . $txt5 . "',
			formulieren.e6 = '" . $RB24 . "', 
			formulieren.eideas7 = '" . $txt7 . "',
			formulieren.eideas8 = '" . $txt8 . "', 
			formulieren.eideas9 = '" . $txt9 . "',
			formulieren.eideas10 = '" . $txt10 . "',
			formulieren.e11 = '" . $RB25 . "', 
			formulieren.e12 = '" . $RB26 . "',
			formulieren.eideas12 = '" . $txt12 . "',
			formulieren.e3a = '" . $RB10 . "', 
			formulieren.e3b = '" . $RB11 . "', 
			formulieren.e3c = '" . $RB12 . "', 
			formulieren.e3d = '" . $RB13 . "', 
			formulieren.e3e = '" . $RB14 . "',
			formulieren.eideas3 = '" . $txt3 . "'
			WHERE formulieren.contactgegevensID='" . $selectedID['ID'] . "'
		");
		$succes = true;
		CloseConnect();
		header( 'Location: profile.php' );
	}
	
?>