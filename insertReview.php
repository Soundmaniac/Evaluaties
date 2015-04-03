<?php
	
	include_once("functions.php");

	if(isset($_POST['testvalues']))
	{
		Connect();
		session_start();

		$result = mysql_query("SELECT * FROM account WHERE gebruiker ='" . $_SESSION['gebruiker'] . "' ");
		$row = mysql_fetch_assoc($result);


		$RB1 = $_POST['group1a'];
		$RB2 = $_POST['group1b'];
		$RB3 = $_POST['group1c'];
		$txt1 = mysql_real_escape_string(htmlentities($_POST['txtarea1']));
		$RB4 = $_POST['group2'];
		$RB5 = $_POST['group3'];
		$RB6 = $_POST['group4a'];
		$RB7 = $_POST['group4b'];
		$txt2 = mysql_real_escape_string(htmlentities($_POST['txtarea2']));
		$RB8 = $_POST['group5'];
		$txt3 = mysql_real_escape_string(htmlentities($_POST['txtarea3']));

		mysql_query("
			INSERT INTO formulieren
			(t1a, t1b, t1c, tideas1, t2, t3, t4a, t4b, tideas2, t5, tideas3, contactgegevensID) 
			VALUES 
			('$RB1','$RB2','$RB3','$txt1','$RB4','$RB5','$RB6','$RB7','$txt2','$RB8','$txt3','" . $row['ID'] . "')

		");
		CloseConnect();
	}
		header( 'Location: profile.php' );
	
?>