<?php

function menuFunction()
{
	if($_SESSION['rol'] == "admin")
	{
		/*header in index.php wijzigen naar table.php*/
		echo("
		<a href='companies.php'>
			<div class='button'>Bedrijven</div>
		</a>
		<a href='courses.php?selected=PCI-Languages'>
			<div class='button'>PCI Languages</div>
		</a>
		<a href='courses.php?selected=PCI2'>
			<div class='button'>PCI2</div>
		</a>
		<a href='courses.php?selected=PCI-NT2-Exam-Training'>
			<div class='button'>PCI NT2 Exam Training</div>
		</a>
		<a href='courses.php?selected=Business-English-Express'>
			<div class='button'>Business English Express</div>
		</a>
		");
	}
	
	/*Oude code*/
	else if($_SESSION['rol'] == "mentor")
	{
		echo("
		<a href='profiel.php'>
			<div class='button'> Profiel </div>
		</a>
		<a href='EindtijdEvaluatie.php'>
			<div class='button'> Eindevaluatie </div>
		</a>
		");
	}
}

function menuFunctioneng()
{
	if($_SESSION['rol'] == "admin")
	{
		echo("<a href='mentor.php'><div class='button'>Gebruikers</div></a>");
		echo("<a href='account.php'><div class='button'>Accounts</div></a>");
	}
	
	else if($_SESSION['rol'] == "mentor")
	{
		echo("<a href='profile.php'> <div class='button'> Profile </div> </a>");
		echo("<a href='engTussentijdseEvaluatie.php'> <div class='button'> Midterm Course Evaluation </div> </a>");
		echo("<a href='engEindtijdEvaluatie.php'> <div class='button'> Final Course Evaluation </div> </a>");
	}
	
}

function safeSql($value)
{
	return mysql_real_escape_string($value);
}
function Connect()
{
	mysql_connect("localhost", "root", "usbw") or die;
	mysql_select_db("project");
}
function CloseConnect()
{
	mysql_close();
}

function GetData($number)
{
	Connect();
	$selectstring = mysql_query("SELECT * FROM formulieren WHERE contactgegevensID='" . $_GET['mentor'] . "'");
	if(!$selectstring)
	{
		echo("Could not run query: " . mysql_error());
		exit;
	}
	while ($row = mysql_fetch_array($selectstring))
	{
		if(isset($number))
		{
			switch ($number) {
				case 0:
				echo ("[" . $row[t1a] . ", " . $row[t2] . ", " . $row[t3] . "]");
				break;
				case 1:
				echo ("[" . $row[e1a] . ", " . $row[e2a] . ", " . $row[e3a] . "]");
				break;
				case 2:
				echo ("[" . ($row[t1a] + $row[e1a])/2 . ", " . ($row[t2] + $row[e2a])/2 . ", " . ($row[t3] + $row[e3a])/2 . "]");
				break;
			}
		}
	}
	CloseConnect();
}

function profileFunction()
{
	echo("
	<div class='profile'>Welkom <a href='profile.php'>" . $_SESSION['gebruiker'] . "</a><br/>
	<a href='logout.php'>Uitloggen </a>
	</div>
	<div class='clear'></div>");
}
function profileFunctioneng()
{
	echo("<div class='profile'> 
	Welcome <a href='profile.php'>" . $_SESSION['gebruiker'] . "</a><br/>
	<a href='logout.php'> Logout </a>
	</div> <div class='clear'></div>");
}


function StartUp()
{
	session_start();
	if(!isset($_SESSION['gebruiker']))
	{
		header( 'Location: index.php' );
	}
}

function AdminOnly()
{
	if(isset($_SESSION['rol']))
	{
		if($_SESSION['rol'] != "admin")
		{
			header( 'Location: profiel.php' );
		}
	}
}
function AdminOrVw()
{
	if(isset($_SESSION['rol']))
	{
		if($_SESSION['rol'] != "admin" && $_SESSION['rol'] != "vrijwilliger")
		{
			header( 'Location: profiel.php' );
		}
	}
}

function MentorOnly()
{
	if(isset($_SESSION['rol']))
	{
		if($_SESSION['rol'] != "mentor")
		{
			header( 'Location: profiel.php' );
		} 
	}
}


function Pages($table, $page)
{
	Connect();

	$result = mysql_query("SELECT * FROM " . $table . "");
	$amount = mysql_num_rows($result) / 10;
	$amount = ceil($amount);
	$i = 0;

	if($amount > 1)
	{
		echo("<div class='center'>");

		if($_GET['page'] != null && $_GET['page'] != "0")
		{
			echo("<a class='pageselect' href='" . $page . "?page=0'><<</a>");
			echo("<a class='pageselect' href='" . $page . "?page=" . ((int)$_GET['page'] - 1) . "'><</a>");
		}
		
		while($i < (int)$amount)
		{
			echo("<a class='pageselect' href='" . $page . "?page=" . $i . "'>" . ($i + 1) . " </a>");
			$i++;
		}
		
		if($_GET['page'] == null)
		{
			$currentPage = 0;
		}
		else
		{
			$currentPage = (int)$_GET['page'];
		}
		
		if(((int)$_GET['page'] + 1) != (int)$amount)
		{
			echo("<a class='pageselect' href='" . $page . "?page=" . ($currentPage + 1) . "'>> </a>");
			echo("<a class='pageselect' href='" . $page . "?page=" . ((int)$amount - 1) . " '>>> </a>");
		}
		
		echo("<div class='clear'></div></div>");
	}
	
	CloseConnect();
}

/*Functions by Barry*/

function backFunction()
{
	if($_SESSION['rol'] == "admin")
	{
		echo("
		<br /><br /><a href='students.php' class='formbtn' >Terug</a>
		");
	}
}
?>
