<?php

function menuFunction()
{
	if($_SESSION['rol'] == "admin")
	{
		/*header in index.php wijzigen naar table.php en*/
		echo("
		<a href='cursists.php'>
			<div class='button'>Cursisten</div>
		</a>
		");
	}
	
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
		echo("<a href='mentor.php'> <div class='button'> Gebruikers </div> </a>");
		echo("<a href='account.php'> <div class='button'> Accounts </div> </a>");
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

/*function GetData($number)
{
	Connect();
	$selectstring = mysql_query("SELECT * FROM formulieren WHERE contactgegevensID='" . $_GET['mentor'] . "'");
@@ -83,6 +75,37 @@ function GetData($number)
		}
	}
	CloseConnect();
}*/

function GetData($number, $cursistid)
{
    Connect();
    $getttdata= mysql_query("SELECT * FROM ttsurveyresults WHERE cursistID='" . $cursistid . "'");
    $rowtt = mysql_fetch_array($getttdata);

    $geteedata= mysql_query("SELECT * FROM eesurveyresults WHERE cursistID='" . $cursistid . "'");
    $rowee = mysql_fetch_array($geteedata);

    if(!$getttdata OR !$geteedata)
    {
        echo("Could not run query: " . mysql_error());
        exit;
    }
    if(isset($number))
    {
        switch ($number) {
            case 0:
                echo ("[" . $rowtt[cursusinhouda] . ", " . $rowtt[structuura] . ", " . $rowtt[cursustmateriaala] . "]");
                break;
            case 1:
                echo ("[" . $rowee[meninga] . ", " . $rowee[structuura] . ", " . $rowee[cursusmateriaala] . "]");
                break;
            case 2:
                echo ("[" . ($rowtt[cursusinhouda] + $rowee[meninga])/2 . ", " . ($rowtt[structuura] + $rowee[structuura])/2 . ", " . ($rowtt[cursusmateriaala] + $rowee[cursusmateriaala])/2 . "]");
                break;
        }
    }
    CloseConnect();
}

function profileFunction()
{
	echo("<div class='profile'> 
	Welkom <a href='profile.php'>" . $_SESSION['gebruiker'] . "</a><br/>
	<a href='logout.php'> Uitloggen </a>
	</div> <div class='clear'></div>");
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

?>
