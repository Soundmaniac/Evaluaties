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
				$cursusID = $_POST['cursus'];

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
                    $selectstring1 = "INSERT INTO cursisten (cursistID, cursusID, cursistVoornaam, cursistTussenvoegsel, cursistAchternaam) VALUES(\"" . $cursistID . "\", \"" . $cursusID . "\", \"" . $cursistVoornaam . "\", \"" . $cursistTussenvoegsel . "\", \"" . $cursistAchternaam . "\")";

                    $sql = mysql_query($selectstring1);
                    if(!$sql)
                    {
                        echo("Could not run query: " . mysql_error());
                        exit;
                    }
					else
					{
						header("Location: students.php");
					}
                    CloseConnection();
                }
            }
        }
    }
}

function generateOptions()
{
	OpenConnection();
	$query = "SELECT c.* FROM cursussen c";
	$sql = mysql_query($query);
	while($sqlvalue = mysql_fetch_array($sql))
	{
		echo("
		<option value='" . $sqlvalue['cursusID'] . "'>" . $sqlvalue['cursusnaam'] . "</option>
		");
	}
	CloseConnection();
}

function addCursus()
{
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['submit']))
		{
			if(empty($_POST['cursusnaam']) || preg_replace('/\s+/', '', $_POST['cursusnaam']) == "")
			{
				echo("Vul alle velden in!");
			}
			else
			{
				if (!preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $_POST['cursusnaam']))
				{
					echo("Er zijn alleen letters en spaties toegestaan.");
				}
				else
				{
					OpenConnection();
					
					$query = "INSERT INTO `project`.`cursussen` (`cursusnaam`) VALUES (\"" . $_POST['cursusnaam'] . "\");";
					$sql = mysql_query($query);
                    if(!$sql)
                    {
                        echo("Could not run query: " . mysql_error());
                        exit;
                    }
					else
					{
						header("Location: courses.php");
					}
                    CloseConnection();
				}
			}
		}
	}
}

function deleteSelectedRow($cursistID)
{
	/*Based on querystring, not safe*/
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
	if(!empty($_GET["id"]))
	{
		$_SESSION["id"] = $_GET["id"];
	}
	
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
					//DoSomething
					if($i == "cursistFirstName")
					{
						$querystring = "UPDATE `cursisten` SET `cursistVoornaam` = '" . $_POST[$i] . "' WHERE `cursisten`.`cursistID` = '" . $_SESSION["id"] . "'";
					}
					else if($i == "cursistTussenvoegsel")
					{
						$querystring = "UPDATE `cursisten` SET `cursistTussenvoegsel` = '" . $_POST[$i] . "' WHERE `cursisten`.`cursistID` = '" . $_SESSION["id"] . "'";
					}
					else if($i == "cursistLastName")
					{
						$querystring = "UPDATE `cursisten` SET `cursistAchternaam` = '" . $_POST[$i] . "' WHERE `cursisten`.`cursistID` = '" . $_SESSION["id"] . "'";;
					}
					
					$sql = mysql_query($querystring);
					if(!$sql)
					{
						die("Could not run query: " . mysql_error());
					}
					else
					{
						header("Location: cursists.php");
					}
				}
			}
		}
		if(!$entered)
		{
			echo("Één veld is ongewijzigd gebleven, omdat u dit veld heeft leeg gelaten<br />");
		}
		CloseConnection();
	}
}
?>