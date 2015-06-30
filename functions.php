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
		<a href='courses.php?company=PCI-Languages'>
			<div class='button'>PCI Languages</div>
		</a>
		<a href='courses.php?company=PCI2'>
			<div class='button'>PCI2</div>
		</a>
		<a href='courses.php?company=NT2-Exam-Training'>
			<div class='button'>NT2 Exam Training</div>
		</a>
		<a href='courses.php?company=Business-English-Express'>
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

function CheckGrades($cursistid)
{
    Connect();
    $getttdata= mysql_query("SELECT * FROM ttsurveyresults WHERE cursistID='" . $cursistid . "'");
    $rowtt = mysql_fetch_array($getttdata);

    $geteedata= mysql_query("SELECT * FROM eesurveyresults WHERE cursistID='" . $cursistid . "'");
    $rowee = mysql_fetch_array($geteedata);

    $ttgradecounter = 0;
    $eegradecounter = 0;

    if ($rowtt[cursusinhouda] < 3)
    {
        $ttgradecounter++;
    }
    if ($rowtt[cursusinhoudb] < 3)
    {
        $ttgradecounter++;
    }
    if ($rowtt[cursusinhoudc] < 3)
    {
        $ttgradecounter++;
    }
    if ($rowtt[structuura] < 3)
    {
        $ttgradecounter++;
    }
    if ($rowtt[cursusmateriaala] < 3)
    {
        $ttgradecounter++;
    }
    if ($rowtt[trainera] < 3)
    {
        $ttgradecounter++;
    }
    if ($rowtt[trainerb] < 3)
    {
        $ttgradecounter++;
    }
    if ($rowtt[algemeenoordeela] < 3)
    {
        $ttgradecounter++;
    }
    if ($ttgradecounter > 0)
    {
        switch ($ttgradecounter)
        {
            case 1:
                echo ("<h4>In de tussentijdse evaluatie is <b>" . $ttgradecounter . "</b> onvoldoende ingevuld.</h>");
                break;
            default:
                echo ("<h4>In de tussentijdse evaluatie zijn <b>" . $ttgradecounter . "</b> onvoldoendes ingevuld.</h>");
                break;
        }
    }

    if ($rowee[meninga] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[meningb] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[meningc] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[structuura] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[structuurb] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[structuurc] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[structuurd] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[structuure] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[structuurf] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[cursusmateriaala] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[cursusmateriaalb] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[cursusmateriaalc] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[cursusmateriaald] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[cursusmateriaale] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[trainera] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[trainerb] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[trainerc] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[trainerd] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[trainere] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[trainerf] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[trainerg] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[algemeena] < 3)
    {
        $eegradecounter++;
    }
    if ($rowee[algemeenb] < 3)
    {
        $eegradecounter++;
    }

    if ($eegradecounter > 0)
    {
        switch ($eegradecounter)
        {
            case 1:
                echo ("<h4>In de eindevaluatie is <b>" . $eegradecounter . "</b> onvoldoende ingevuld.</h>");
                break;
            default:
                echo ("<h4>In de eindevaluatie zijn <b>" . $eegradecounter . "</b> onvoldoendes ingevuld.</h>");
                break;
        }
    }
}

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
                echo ("[" .
                    (($rowtt[cursusinhouda] + $rowtt[cursusinhoudb] + $rowtt[cursusinhoudc])/3) . ", " .
                    $rowtt[structuura] . ", " .
                    $rowtt[cursusmateriaala] . ", " .
                    (($rowtt[trainera] + $rowtt[trainerb])/2) . ", " .
                    $rowtt[algemeenoordeela] . ", " .
                    //average
                    (($rowtt[cursusinhouda] + $rowtt[cursusinhoudb] + $rowtt[cursusinhoudc] +
                            $rowtt[structuura] +
                            $rowtt[cursusmateriaala] +
                            $rowtt[trainera] + $rowtt[trainerb] +
                            $rowtt[algemeenoordeela])/8) . "]");
                break;
            case 1:
                echo ("[" .
                    (($rowee[meninga] + $rowee[meningb] + $rowee[meningc])/3) . ", " .
                    (($rowee[structuura] + $rowee[structuurb] + $rowee[structuurc] + $rowee[structuurd] + $rowee[structuure] + $rowee[structuurf])/6) . ", " .
                    (($rowee[cursusmateriaala] + $rowee[cursusmateriaalb] + $rowee[cursusmateriaalc] + $rowee[cursusmateriaald] + $rowee[cursusmateriaale])/5) . ", " .
                    (($rowee[trainera] + $rowee[trainerb] + $rowee[trainerc] + $rowee[trainerd] + $rowee[trainere] + $rowee[trainerf] + $rowee[trainerg])/7) . ", " .
                    (($rowee[algemeena] + $rowee[algemeenb])/2) . ", " .
                    //average
                    (($rowee[meninga] + $rowee[meningb] + $rowee[meningc] +
                            $rowee[structuura] + $rowee[structuurb] + $rowee[structuurc] + $rowee[structuurd] + $rowee[structuure] + $rowee[structuurf] +
                            $rowee[cursusmateriaala] + $rowee[cursusmateriaalb] + $rowee[cursusmateriaalc] + $rowee[cursusmateriaald] + $rowee[cursusmateriaale] +
                            $rowee[trainera] + $rowee[trainerb] + $rowee[trainerc] + $rowee[trainerd] + $rowee[trainere] + $rowee[trainerf] + $rowee[trainerg] +
                            $rowee[algemeena] + $rowee[algemeenb])/23) . "]");
                break;
            case 2:
                echo ("[" .
                    ((($rowtt[cursusinhouda] + $rowtt[cursusinhoudb] + $rowtt[cursusinhoudc])/3) + (($rowee[meninga] + $rowee[meningb] + $rowee[meningc])/3))/2  . ", " .
                    ($rowtt[structuura] + (($rowee[structuura] + $rowee[structuurb] + $rowee[structuurc] + $rowee[structuurd] + $rowee[structuure] + $rowee[structuurf])/6))/2 . ", " .
                    ($rowtt[cursusmateriaala] + (($rowee[cursusmateriaala] + $rowee[cursusmateriaalb] + $rowee[cursusmateriaalc] + $rowee[cursusmateriaald] + $rowee[cursusmateriaale])/5))/2 . ", " .
                    ((($rowtt[trainera] + $rowtt[trainerb])/2) + (($rowee[trainera] + $rowee[trainerb] + $rowee[trainerc] + $rowee[trainerd] + $rowee[trainere] + $rowee[trainerf] + $rowee[trainerg])/7))/2 . ", " .
                    ($rowtt[algemeenoordeela] + (($rowee[algemeena] + $rowee[algemeenb])/2))/2 . "," .
                    ((($rowee[meninga] + $rowee[meningb] + $rowee[meningc] +
                                $rowee[structuura] + $rowee[structuurb] + $rowee[structuurc] + $rowee[structuurd] + $rowee[structuure] + $rowee[structuurf] +
                                $rowee[cursusmateriaala] + $rowee[cursusmateriaalb] + $rowee[cursusmateriaalc] + $rowee[cursusmateriaald] + $rowee[cursusmateriaale] +
                                $rowee[trainera] + $rowee[trainerb] + $rowee[trainerc] + $rowee[trainerd] + $rowee[trainere] + $rowee[trainerf] + $rowee[trainerg] +
                                $rowee[algemeena] + $rowee[algemeenb])/23) +
                        (($rowtt[cursusinhouda] + $rowtt[cursusinhoudb] + $rowtt[cursusinhoudc] +
                                $rowtt[structuura] +
                                $rowtt[cursusmateriaala] +
                                $rowtt[trainera] + $rowtt[trainerb] +
                                $rowtt[algemeenoordeela])/8))/2 . "]");
                break;
        }
    }
    CloseConnect();
}

function GetCourseData($number, $cursusID)
{
    Connect();
    $tt1 = 0;
    $tt2 = 0;
    $tt3 = 0;
    $tt4 = 0;
    $tt5 = 0;
    $ttaverage = 0;

    $ee1 = 0;
    $ee2 = 0;
    $ee3 = 0;
    $ee4 = 0;
    $ee5 = 0;
    $eeaverage = 0;

    $rowcounter = 0;

    $getstudentsdata = mysql_query("SELECT * FROM cursisten WHERE cursusID='" . $cursusID . "'");
    while ($row = mysql_fetch_assoc($getstudentsdata))
    {
        $rowcounter++;
        $getttdata = mysql_query("SELECT * FROM ttsurveyresults WHERE cursistID='" . $row["cursistID"] . "'");
        $rowtt = mysql_fetch_array($getttdata);

        $geteedata = mysql_query("SELECT * FROM eesurveyresults WHERE cursistID='" . $row["cursistID"] . "'");
        $rowee = mysql_fetch_array($geteedata);

        $tt1 = $tt1 + (($rowtt[cursusinhouda] + $rowtt[cursusinhoudb] + $rowtt[cursusinhoudc])/3);
        $tt2 = $tt2 + $rowtt[structuura];
        $tt3 = $tt3 + $rowtt[cursusmateriaala];
        $tt4 = $tt4 + (($rowtt[trainera] + $rowtt[trainerb])/2) ;
        $tt5 = $tt5 + $rowtt[algemeenoordeela];
        $ttaverage = $ttaverage + (($rowtt[cursusinhouda] + $rowtt[cursusinhoudb] + $rowtt[cursusinhoudc] +
                    $rowtt[structuura] +
                    $rowtt[cursusmateriaala] +
                    $rowtt[trainera] + $rowtt[trainerb] +
                    $rowtt[algemeenoordeela])/8);

        $ee1 = $ee1 + (($rowee[meninga] + $rowee[meningb] + $rowee[meningc])/3);
        $ee2 = $ee2 + (($rowee[structuura] + $rowee[structuurb] + $rowee[structuurc] + $rowee[structuurd] + $rowee[structuure] + $rowee[structuurf])/6);
        $ee3 = $ee3 + (($rowee[cursusmateriaala] + $rowee[cursusmateriaalb] + $rowee[cursusmateriaalc] + $rowee[cursusmateriaald] + $rowee[cursusmateriaale])/5);
        $ee4 = $ee4 + (($rowee[trainera] + $rowee[trainerb] + $rowee[trainerc] + $rowee[trainerd] + $rowee[trainere] + $rowee[trainerf] + $rowee[trainerg])/7);
        $ee5 = $ee5 + (($rowee[algemeena] + $rowee[algemeenb])/2);
        $eeaverage = $eeaverage + (($rowee[meninga] + $rowee[meningb] + $rowee[meningc] +
                    $rowee[structuura] + $rowee[structuurb] + $rowee[structuurc] + $rowee[structuurd] + $rowee[structuure] + $rowee[structuurf] +
                    $rowee[cursusmateriaala] + $rowee[cursusmateriaalb] + $rowee[cursusmateriaalc] + $rowee[cursusmateriaald] + $rowee[cursusmateriaale] +
                    $rowee[trainera] + $rowee[trainerb] + $rowee[trainerc] + $rowee[trainerd] + $rowee[trainere] + $rowee[trainerf] + $rowee[trainerg] +
                    $rowee[algemeena] + $rowee[algemeenb])/23);
    }
    $tt1_avg = $tt1/$rowcounter;
    $tt2_avg = $tt2/$rowcounter;
    $tt3_avg = $tt3/$rowcounter;
    $tt4_avg = $tt4/$rowcounter;
    $tt5_avg = $tt5/$rowcounter;
    $ttaverage_avg = $ttaverage/$rowcounter;

    $ee1_avg = $ee1/$rowcounter;
    $ee2_avg = $ee2/$rowcounter;
    $ee3_avg = $ee3/$rowcounter;
    $ee4_avg = $ee4/$rowcounter;
    $ee5_avg = $ee5/$rowcounter;
    $eeaverage_avg = $eeaverage/$rowcounter;

    if(isset($number))
    {
        switch ($number) {
            case 0:
                echo ("[" .
                    $tt1_avg . ", " .
                    $tt2_avg . ", " .
                    $tt3_avg . ", " .
                    $tt4_avg . ", " .
                    $tt5_avg . ", " .
                    //average
                    $ttaverage_avg . "]");
                break;
            case 1:
                echo ("[" .
                    $ee1_avg . ", " .
                    $ee2_avg . ", " .
                    $ee3_avg . ", " .
                    $ee4_avg . ", " .
                    $ee5_avg . ", " .
                    //average
                    $eeaverage_avg  . "]");
                break;
            case 2:
                echo ("[" .
                    ($tt1_avg + $ee1_avg)/2  . ", " .
                    ($tt2_avg + $ee2_avg)/2  . ", " .
                    ($tt3_avg + $ee3_avg)/2  . ", " .
                    ($tt4_avg + $ee4_avg)/2  . ", " .
                    ($tt5_avg + $ee5_avg)/2  . "," .
                    ($ttaverage_avg + $eeaverage_avg)/2   . "]");
                break;
        }
    }
    CloseConnect();
}

function profileFunction()
{
	echo("
	<div class='profile'>Welkom, <a href='profile.php'>" . $_SESSION['gebruiker'] . "</a><br/>
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

/*Function for cross-page*/
function setSession()
{
	if(isset($_GET["course"]) && $_GET["course"] != "")
	{
		$_SESSION["course"] = $_GET["course"];
	}
}
?>
