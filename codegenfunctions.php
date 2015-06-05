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

function GenerateID($length = 11)
{
    OpenConnection();
    /* $cursistID global gemaakt zodat deze in GenerateRow() functie toegevoegd kan worden aan de database */
    global $cursistID;
    $cursistID = "";
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    for($i = 0; $i < $length; $i++)
    {
        $cursistID .= $characters[mt_rand(0, strlen($characters) - 1)];  /* Moet nog lang en uniek gemaakt worden. */
    }

    /* Selectstring aanpassen wanneer er voor deze functie een andere database wordt gebruitkt */
    $selectstring = "SELECT cursistID from cursisten WHERE cursistID = '$cursistID'";
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
    $cursistNaam = "";
    $cursistNaamError = "";

    /* Controleer of er een post plaats vindt op de pagina. */
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        /* Controleer of de post door de button in de form wordt veroorzaakt. */
        if(isset($_POST['submit']))
        {

            /* Controleer of er iets is ingevuld in de input. */
            if(empty($_POST['cursistNaam']))
            {
                $cursistNaamError = "Vul een naam van een cursist in.";
                echo($cursistNaamError);
            }
            else
            {
                $cursistNaam = $_POST['cursistNaam'];

                /* Als de textbox niet de karakters bevat die in de regex staan, dan komt er een bericht */
                if (!preg_match("/^[a-zA-Z\s,.'-\pL]*$/", $cursistNaam))
                {
                    echo("Er zijn alleen letters en spaties toegestaan.");
                }
                else
                {
                    GenerateID();
                    /* Database vullen met de gegevens van het formulier */
                    OpenConnection();
                    $selectstring = "INSERT INTO cursisten (cursistID, cursistnaam) VALUES(\"" . $cursistID . "\", \"" . $cursistNaam . "\")";
                    $sql = mysql_query($selectstring);
                    if(!$sql)
                    {
                        echo("Could not run query: " . mysql_error());
                        exit;
                    }
                    CloseConnection();
                }
            }
        }
    }
}
?>