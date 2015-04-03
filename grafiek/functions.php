<?php
/*Connectionstring*/
function OpenConnection()
{
	mysql_connect("localhost", "root", "usbw") or die("Error message: " .mysql_error());
	mysql_select_db("voorbeeldDB");
}

function CloseConnection()
{
	mysql_close();
}

function GetData($waarde)
{
	OpenConnection();
	$selectstring = mysql_query("SELECT eerstewaarde, tweedewaarde, derdewaarde FROM voorbeeldtabel WHERE ID=" . $waarde);
	if(!$selectstring)
	{
		echo("Could not run query: " . mysql_error());
		exit;
	}
	$myrow = mysql_fetch_row($selectstring);
	echo ("[" . $myrow[0] . ", " . $myrow[1] . ", " . $myrow[2] . "]");
	CloseConnection();
}
?>