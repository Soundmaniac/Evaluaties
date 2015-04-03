<?php

function getPage()
{
	if($_GET['page'] == null || $_GET['page'] == "0" || !isset($_GET['page']))
	{
		$page = 0;
		return $page;
	}
	else
	{
		$page = (int)$_GET['page'] * 10;
		return $page;
	}
}

function showCursus($inactive, $page)
{
	if(!$inactive)
	{
		$result = mysql_query("
		SELECT cursus.ID AS cID
		FROM cursus
		WHERE cursus.status=1
		LIMIT " . (string)$page . ", " . strval($page + 10) . "");
	}
	else
	{
		$result = mysql_query("
		SELECT cursus.ID AS cID
		FROM cursus
		LIMIT " . (string)$page . ", " . strval($page + 10) . "");
	}
	
	
	echo("<table class='tcenter'><tr><td class='center'>Cursus nummer</td><td class='center'>Vrijwilliger</td><td></td></tr>");
	while($row = mysql_fetch_array($result))
	{
		echo("<tr><td class='center'> <a href='showcursus.php?cursus=" . $row['cID'] . "'>" . $row['cID'] . "</a> </td>");
		
		$result2 = mysql_query("
			SELECT cursus.ID cID, vrijwilliger.ID vID, vrijwilliger.voornaam, vrijwilliger.tussenvgsl, vrijwilliger.achternaam
			FROM cursus
			INNER JOIN vwrelatie ON cursus.ID = vwrelatie.cursusID
			INNER JOIN vrijwilliger ON vwrelatie.vrijwilligerID = vrijwilliger.ID
			WHERE cursus.ID='" . $row['cID'] . "'
		");
		echo("<td class='center'>");
		while($row2 = mysql_fetch_array($result2))
		{
			echo("<a href='showvolunteer.php?vrijwilliger=" . $row2['vID'] . "'>" . $row2['voornaam'] . " " . $row2['tussenvgsl'] . " " . $row2['achternaam'] . "</a><br/>");
		}
		echo("</td>");
		
		echo("<td class='center'><a href='showcursus.php?cursus=" . $row['cID'] . "'> meer </a>/<a href='cursuswijzigen.php?cursus=" . $row['cID'] . "'> wijzigen </a></td></tr>");
	}
	echo("</table>");
}

function showMentor($inactive, $page)
{
	$result = mysql_query("
		SELECT *
		FROM contactpersoon
		LIMIT " . (string)$page . ", " . strval($page + 10) . "");
	
	echo("<table class='tcenter'><tr><td class='center'>Curist</td><td class='center'>Ingevulde datum</td><td></td></tr>");
	while($row = mysql_fetch_array($result))
	{
		echo("<tr><td class='center'> <a href='showmentor.php?mentor=" . $row['accountID'] . "'>" . $row['voornaam'] . " " . $row['achternaam'] . "</a> </td>");

		echo("<td class='center'><a href='showmentor.php?mentor=" . $row['accountID'] . "'>" . $row['datum'] . "</a></td></tr>");
	}
	echo("</table>");
}

function showVrijwilliger($inactive, $page)
{
	$result = mysql_query("
		SELECT vrijwilliger.ID, vrijwilliger.voornaam, vrijwilliger.achternaam
		FROM vrijwilliger
		LIMIT " . (string)$page . ", " . strval($page + 10) . "");
	
	echo("<table class='tcenter'><tr><td class='center'>Vrijwilligers</td><td></td></tr>");
	while($row = mysql_fetch_array($result))
	{
		echo("<tr><td class='center'> <a href='showvolunteer.php?vrijwilliger=" . $row['ID'] . "'>" . $row['voornaam'] . " " . $row['achternaam'] . "</a> </td>");

		echo("<td class='center'><a href='showvolunteer.php?vrijwilliger=" . $row['ID'] . "'> meer </a></td></tr>");
	}
	echo("</table>");
}

function showCursist($inactive, $page)
{
	$result = mysql_query("
		SELECT cursist.ID cID, cursist.voornaam, cursist.tussenvgsl, cursist.achternaam, cursist.cursusID
		FROM cursist
		LIMIT " . (string)$page . ", " . strval($page + 10) . "");
	
	echo("<table class='tcenter'><tr><td class='center'>Cursisten</td><td>Cursus Nummer</td?><td></td></tr>");
	while($row = mysql_fetch_array($result))
	{
		echo("<tr><td class='center'> <a href='showcursist.php?cursist=" . $row['cID'] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</a> </td>");
		if($row['cursusID'] == "")
		{
			echo("<td class='center'> Geen </td>");
		}
		else
		{
			echo("<td class='center'> <a href='showcursus.php?cursus=" . $row['cursusID'] . "'>" . $row['cursusID'] . "</a> </td>");
		}
		echo("<td class='center'><a href='showcursist.php?cursist=" . $row['cID'] . "'> meer </a></td></tr>");
	}
	echo("</table>");
}

function showStudent($inactive, $page)
{
	$result = mysql_query("
		SELECT student.ID, student.voornaam, student.tussenvgsl, student.achternaam
		FROM student
		LIMIT " . (string)$page . ", " . strval($page + 10) . "");
	
	echo("<table class='tcenter'><tr><td class='center'>Studenten</td><td></td></tr>");
	while($row = mysql_fetch_array($result))
	{
		echo("<tr><td class='center'> <a href='showstudent.php?student=" . $row['ID'] . "'>" . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</a> </td>");

		echo("<td class='center'><a href='showstudent.php?student=" . $row['ID'] . "'> meer </a></td></tr>");
	}
	echo("</table>");
}

function showAanwezig($inactive, $page)
{
	$result = mysql_query("
		SELECT student.ID, student.voornaam, student.tussenvgsl, student.achternaam
		FROM student
		LIMIT " . (string)$page . ", " . strval($page + 10) . "");
	
	echo("<table class='tcenter'><tr><td class='center'>Studenten</td><td></td></tr>");
	while($row = mysql_fetch_array($result))
	{
		echo("<tr><td class='center'> " . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</td>");

		echo("<td class='center'><a href='showaanwezig.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	}
	echo("</table>");
}

function showMentorlln($inactive, $page)
{

	$sqlquery1 = mysql_query("SELECT * FROM account WHERE gebruiker ='$_SESSION[gebruiker]'");

	$query1 = mysql_fetch_array($sqlquery1);

	$id = $query1['ID'];

	$sqlquery2 = mysql_query("SELECT * FROM mentor WHERE accountID = '$id'");

	$query2 = mysql_fetch_array($sqlquery2);

	$mentorID = $query2['ID'];

	$sqlquery3 = mysql_query("SELECT * FROM student WHERE mentorID = '$mentorID'");
	
	echo("<table class='tcenter'><tr><td class='center'>Studenten</td><td></td></tr>");
	while($row = mysql_fetch_array($sqlquery3)){

	 echo("<tr><td class='center'> " . $row['voornaam'] . " " . $row['tussenvgsl'] . " " . $row['achternaam'] . "</td>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");
	 echo("<td class='center'><a href='showmentorstudenten.php?student=" . $row['ID'] . "'> aanwezigeid </a></td></tr>");

	}
	echo("</table>");

}

/*function ShowDbTable($query, Array $column, Array $rowValue, Array $link, Array $numValues)
{
	$result = mysql_query($query);
	echo("<table class='tcenter'><tr>");
	foreach($column as $value)
	{
		echo("<td>" . $value . "</td>");
	}
	echo("</tr>");
	
	while($row = mysql_fetch_array($result))
	{
		echo("<tr>");
		foreach(array_combine($rowValue, $link) as $value => $link)
		{
			if($link != "")
			{
				echo("<td>" . $link . "" . $row['ID'] . "'>" . $row[$value] . "</a></td>");
			}
			else
			{
				echo("<td>" . $row[$value] . "</td>");
			}
		}
		echo("</tr>");
	}
	echo("</table>");
}*/

?>
