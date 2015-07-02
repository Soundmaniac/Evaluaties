<?php
/* Connectionstring */
function OpenConnection()
{
    /* !!Aanpassen wanneer er een andere database wordt gebruikt!! */
    mysql_connect("localhost", "root", "usbw") or die("Error message: " .mysql_error());
    mysql_select_db("project");
}

function CloseConnection()
{
    mysql_close();
}

/* Functie voor de chart.js om de grafiek te vullen */
/*
function GetData($number)
{
    OpenConnection();
    $cursistID = "oy6JbJUvjh2" /* Hier kan de $_GET[''] functie ook gebruikt worden;
    $selectstring = "SELECT * FROM `voorbeeldtabel` WHERE cursistID=\"" . $cursistID . "\""; !Aanpassen wanneer een andere database en tabel wordt gebruikt!!
    $sql = mysql_query($selectstring);
    if(!$sql)
    {
        echo("Could not run query: " . mysql_error());
        exit;
    }

    while ($row = mysql_fetch_array($sql))
    {
        if(isset($number))
        {

            switch ($number) {
                /* Stop gegevens op basis van de cursistID in de data attribuut van de grafiek (in de javascript)
                /*  Firstthreevalues (first column)		Secondthreevalues(second column)	Thirdthreevalues(thirdcolumn)
                case 0:
                    echo ("[" . $row['eerstewaarde'] . ", " . $row['vierdewaarde'] . ", " . $row['zevendewaarde'] . "]");
                    break;
                case 1:
                    echo ("[" . $row['tweedewaarde'] . ", " . $row['vijfdewaarde'] . ", " . $row['achtstewaarde'] . "]");
                    break;
                case 2:
                    echo ("[" . $row['derdewaarde'] . ", " . $row['zesdewaarde'] . ", " . $row['negendewaarde'] . "]");
                    break;
            }
        }
    }
    CloseConnection();
}
*/

/* ***Code for generating a row for a student*** */
function GenerateID()
{
    OpenConnection();
    /* $cursistID global gemaakt zodat deze in GenerateRow() functie toegevoegd kan worden aan de database */
    global $cursistID;
	$length = 11;
    $cursistID = "";
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    for($i = 0; $i < $length; $i++)
    {
        $cursistID .= $characters[mt_rand(0, strlen($characters) - 1)];  /* Moet nog lang en uniek gemaakt worden. */
    }

    /* Selectstring aanpassen wanneer er voor deze functie een andere database wordt gebruitkt */
    $selectstring = "SELECT cursistID FROM cursisten WHERE cursistID = '$cursistID'";
    $sql = mysql_query($selectstring);

    /* Controleer of cursistID al bestaat in de database */
    if(!$sql)
    {
        echo("Could not run query: " . mysql_error());
        exit;
    }

    if (mysql_num_rows($sql) > 0) {

        echo($cursistID . " Bestaat al, probeer alstublieft opnieuw.");
    }
    else
    {
        /* Laat cursistID op pagina zien op de pagina. */
        echo($cursistID . "<br />Het is gelukt om een ID te genereren, kopieer de ID.");
        echo("<br/>");
        echo("<br/><a href='TussentijdseEvaluatie.php?id=" . $cursistID . "'>Tussentijdse Evaluatie</a>");
        echo("<br/><a href='EindtijdEvaluatie.php?id=" . $cursistID . "'>Eindtijdse Evaluatie</a>");

    }

    CloseConnection();
}

function GenerateRow()
{
    global $cursistID;
    $cursistVoornaam = "";

    /* Controleer of er een post plaats vindt op de pagina. */
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        /* Controleer of de post door de button in de form wordt veroorzaakt. */
        if(isset($_POST['submit']))
        {

            /* Controleer of er iets is ingevuld in de input. */
            if(empty($_POST['cursistVoornaam']) || empty($_POST['cursistAchternaam']) || preg_replace('/\s+/', '', $_POST['cursistVoornaam']) == "" || preg_replace('/\s+/', '', $_POST['cursistAchternaam']) == "")
            {
                echo("Vul alle velden in!");
            }
            else
            {
                $cursistVoornaam = $_POST['cursistVoornaam'];
				$cursistTussenvoegsel = (isset($_POST['cursistTussenvoegsel']) ? $_POST['cursistTussenvoegsel'] : "");
				$cursistAchternaam = $_POST['cursistAchternaam'];

                /* Als de textbox niet de karakters bevat die in de regex staan, dan komt er een bericht */
                if (!preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $cursistVoornaam))
                {
                    echo("Er zijn alleen letters en spaties toegestaan.");
                }
				else if(!preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $cursistTussenvoegsel))
				{
					echo("Er zijn alleen letters en spaties toegestaan.");
				}
				else if(!preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $cursistAchternaam))
				{
					echo("Er zijn alleen letters en spaties toegestaan.");
				}
                else
                {
                    GenerateID();
                    /* Database vullen met de gegevens van het formulier */
                    OpenConnection();
                    $selectstring1 = "INSERT INTO cursisten (cursistID, cursusID, cursistVoornaam, cursistTussenvoegsel, cursistAchternaam) VALUES(\"" . $cursistID . "\", \"" . $_POST['cursusID'] . "\", \"" . $cursistVoornaam . "\", \"" . $cursistTussenvoegsel . "\", \"" . $cursistAchternaam . "\")";

                    $sql = mysql_query($selectstring1);
                    if(!$sql)
                    {
                        echo("Could not run query: " . mysql_error());
                        exit;
                    }
					else
					{
						CloseConnection();
						header("Location: students.php?course=" . $_GET["course"]);
					}
                }
            }
        }
    }
}


function deleteSelectedRow($cursistID)
{
	/*Based on querystring, probably not safe*/
	$cursistID = (isset($cursistID) && $cursistID != null && $cursistID != "" ? $cursistID : "");
	OpenConnection();
	$querystring1 = "DELETE t.* FROM ttsurveyresults t WHERE cursistID = '" . $cursistID . "'";
	$querystring2 = "DELETE e.* FROM eesurveyresults e WHERE cursistID = '" . $cursistID . "'";
	$querystring3 = "DELETE c.* FROM cursisten c WHERE cursistID = '" . $cursistID . "'";
	
	$sql = mysql_query($querystring1);
	if(!$sql)
	{
		die("Could not run query: " . mysql_error());
	}
	
	$sql = mysql_query($querystring2);
	if(!$sql)
	{
		die("Could not run query: " . mysql_error());
	}
	
	$sql = mysql_query($querystring3);
	if(!$sql)
	{
		die("Could not run query: " . mysql_error());
	}
	CloseConnection();
}

function editSelectedRow()
{
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		OpenConnection();
		$inputname = array("cursistFirstName", "cursistTussenvoegsel", "cursistLastName");
		foreach($inputname AS $i)
		{
			if(empty($_POST[$i]))
			{
				$entered = false;
			}
			else
			{
				if(!preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $_POST[$i]))
				{
					$entered = false;
				}
				else
				{
					echo $_GET['id'];
					
					if($i == "cursistFirstName")
					{
						$querystring = "UPDATE `cursisten` SET `cursistVoornaam` = '" . $_POST[$i] . "' WHERE `cursisten`.`cursistID` = '" . $_GET["id"] . "'";
					}
					else if($i == "cursistTussenvoegsel")
					{
						$querystring = "UPDATE `cursisten` SET `cursistTussenvoegsel` = '" . $_POST[$i] . "' WHERE `cursisten`.`cursistID` = '" . $_GET["id"] . "'";
					}
					else if($i == "cursistLastName")
					{
						$querystring = "UPDATE `cursisten` SET `cursistAchternaam` = '" . $_POST[$i] . "' WHERE `cursisten`.`cursistID` = '" . $_GET["id"] . "'";;
					}
					
					$sql = mysql_query($querystring);
					if(!$sql)
					{
						die("Could not run query: " . mysql_error());
					}
					else
					{
						header("Location: students.php?course=" . $_GET["course"]);
					}
				}
			}
		}
		
		if(!$entered)
		{
			echo("Één veld is ongewijzigd gebleven, omdat u dit veld heeft leeg gelaten of bestaat uit incorrecte leestekens<br />");
		}
		CloseConnection();
	}
}
/* ***End of code for generating a row for a student*** */

/* ***Code for generating a row for a course*** */
function addCourse($company)
{
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['submit']))
		{
			/*Code toevoegen om invul velden te valideren*/
			if(empty($_POST['cursusnaam']) || preg_replace('/\s+/', '', $_POST['cursusnaam']) == "")
			{
				echo("Vul cursusnaam alstublieft correct in");
			}
			else if(empty($_POST['projectnummer']) || preg_replace('/\s+/', '', $_POST['projectnummer']) == "")
			{
				echo("Vul projectnummer alstublieft correct in");
			}
			else if(empty($_POST['trainernaam']) || preg_replace('/\s+/', '', $_POST['trainernaam']) == "")
			{
				echo("Vul trainernaam alstublieft correct in");
			}
			else
			{
				if (!preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $_POST['cursusnaam']) || !preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $_POST['trainernaam']))
				{
					echo("Er zijn alleen letters en spaties toegestaan bij cursusnaam en trainernaam.");
				}
				else
				{
					OpenConnection();
					
					
					$query = "SELECT b.bedrijfID FROM bedrijven b WHERE b.bedrijfnaam = '" . $_POST['bedrijfnaam'] ."'";
					//Oude query: $query = "INSERT INTO `project`.`cursussen` (`cursusnaam`) VALUES (\"" . $_POST['cursusnaam'] . "\");";
					$sql = mysql_query($query);
					while($row = mysql_fetch_array($sql))
					{
						$bedrijfID = $row['bedrijfID'];
					}
					
					$x=2;
					$y=3;
					/*
					if($x == 2 && $y ==3)
					{
						echo"Klopt!";
					}
					*/
					
					$query = "INSERT INTO `project`.`cursussen` (`cursusnaam`, `projectnummer`, `trainernaam`, `bedrijfID`) VALUES (\"" . $_POST['cursusnaam'] . "\", \"" . $_POST['projectnummer'] . "\", \"" . $_POST['trainernaam'] . "\", \"" . $bedrijfID . "\");";
					
					if(($_POST['begindatum'] != null && $_POST['begindatum'] != "") && ($_POST['einddatum'] != null && $_POST['einddatum'] != ""))
					{
						//Insert query with both dates
						$query = "INSERT INTO `project`.`cursussen` (`cursusnaam`, `projectnummer`, `trainernaam`, `begindatum`, `einddatum`, `bedrijfID`) VALUES (\"" . $_POST['cursusnaam'] . "\", \"" . $_POST['projectnummer'] . "\", \"" . $_POST['trainernaam'] . "\", \"" . $_POST['begindatum'] . "\", \"" . $_POST['einddatum'] . "\", \"" . $bedrijfID . "\");";
					}
					else if($_POST['begindatum'] != null && $_POST['begindatum'] != "" && ($_POST['einddatum'] == null || $_POST['einddatum'] == ""))
					{
						//Insert query with one date
						$query = "INSERT INTO `project`.`cursussen` (`cursusnaam`, `projectnummer`, `trainernaam`, `begindatum`, `bedrijfID`) VALUES (\"" . $_POST['cursusnaam'] . "\", \"" . $_POST['projectnummer'] . "\", \"" . $_POST['trainernaam'] . "\", \"" . $_POST['begindatum'] . "\", \"" . $bedrijfID . "\");";
					}
					else if($_POST['einddatum'] != null && $_POST['einddatum'] != "" && ($_POST['begindatum'] == null || $_POST['begindatum'] == ""))
					{
						//Insert query with another date
						$query = "INSERT INTO `project`.`cursussen` (`cursusnaam`, `projectnummer`, `trainernaam`, `einddatum`, `bedrijfID`) VALUES (\"" . $_POST['cursusnaam'] . "\", \"" . $_POST['projectnummer'] . "\", \"" . $_POST['trainernaam'] . "\", \"" . $_POST['einddatum'] . "\", \"" . $bedrijfID . "\");";
					}
					
					$sql = mysql_query($query);
                    if(!$sql)
                    {
                        echo("Could not run query: " . mysql_error());
                        exit;
                    }
					else
					{
						header("Location: courses.php?company=" . $company);
					}
                    CloseConnection();
				}
			}
		}
	}
}

function editSelectedCourse()
{
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['submit']))
		{
			OpenConnection();
			$inputname = array("cursusnaam", "projectnummer", "trainernaam", "einddatum", "begindatum");
			$entered = false;
			foreach($inputname AS $i)
			{
				/*Check if post is empty or entered*/
				if(!empty($_POST[$i]) || $_POST[$i] != "")
				{
					//When the post is not empty, post is entered
					$entered = true;
					
					//If a post is entered
					if($entered)
					{						
						if($i == "cursusnaam" || $i == "trainernaam")
						{
							if(!preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $_POST[$i]))
							{
								echo("geen tekst");
							}
							else
							{
								$querystring = "UPDATE `project`.`cursussen` SET `" . $i . "` = '" . $_POST[$i] . "' WHERE `cursussen`.`cursusID` = '" . $_GET['id'] . "';";
							}
						}
						else
						{
							$querystring = "UPDATE `project`.`cursussen` SET `" . $i . "` = '" . $_POST[$i] . "' WHERE `cursussen`.`cursusID` = '" . $_GET['id'] . "';";
						}
						
						$sql = mysql_query($querystring);
						if(!$sql)
						{
							die("Could not run query: " . mysql_error());
						}
						else
						{
							header("Location: courses.php?company=" . $_GET["company"]);
						}
					}
				}
			}
			
			if(!$entered)
			{
				echo "Er is niks ingevuld<br />";
			}
			CloseConnection();
		}
	}
}

function deleteSelectedCourse($cursusID)
{
	$cursusID = (isset($cursusID) && $cursusID != null && $cursusID != "" ? $cursusID : "");
	OpenConnection();
	
	/*Kan misschien in één query worden gedaan*/
	$querystring1 = "DELETE FROM `ttsurveyresults` WHERE cursistID IN (SELECT c.cursistID FROM `cursisten` c WHERE c.cursusID = \"" . $cursusID . "\")";
	$querystring2 = "DELETE FROM `eesurveyresults` WHERE cursistID IN (SELECT c.cursistID FROM `cursisten` c WHERE c.cursusID = \"" . $cursusID . "\")";
	$querystring3 = "DELETE FROM `cursisten` WHERE cursusID = \"" . $cursusID . "\"";
	$querystring4 = "DELETE FROM `cursussen` WHERE cursusID = \"" . $cursusID . "\"";
	
	$sql = mysql_query($querystring1);
	if(!$sql)
	{
		die("Could not run query: " . mysql_error());
	}
	
	$sql = mysql_query($querystring2);
	if(!$sql)
	{
		die("Could not run query: " . mysql_error());
	}
	
	$sql = mysql_query($querystring3);
	if(!$sql)
	{
		die("Could not run query: " . mysql_error());
	}
	
	$sql = mysql_query($querystring4);
	if(!$sql)
	{
		die("Could not run query: " . mysql_error());
	}
	CloseConnection();
}
/* ***End code for generating a row for a course*** */
?>