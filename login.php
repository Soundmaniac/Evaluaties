<?php
session_start();
include_once("functions.php");

/*When login button has been clicked*/
/*Filled in fields will be compared with data stored within accounts table*/
if (isset($_POST['inloggen']))
{
	if(isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord']))
	{
		OpenConnection();
		$logcheck = true;

		$result = mysql_query("SELECT * FROM account WHERE gebruiker='" . safeSql($_POST["gebruikersnaam"]) . "' AND wachtwoord='" . safeSql($_POST['wachtwoord']) . "'");
				
		if(mysql_num_rows($result) == 1)
		{
			while($row = mysql_fetch_array($result))
			{
				if($row['gebruiker'])
				{
					$_SESSION['rol'] = $row['rol'];
					$_SESSION['gebruiker'] = $_POST['gebruikersnaam'];
				}
			}
		}
		else
		{
			$logcheck = false;
		}

		CloseConnection();
		
		/*Proceed*/
		if($logcheck)
		{
			header( 'Location: companies.php' );
		}
		/*Credentials are incorrect, may not proceed*/
		else
		{
			header( 'Location: index.php' );
		}
	}
}
/*When register button has been clicked*/
else if (isset($_POST['registreren']))
{
	header( 'Location: registreren.php' );
}
/*When nothing has been clicked (going straight for the login.php file in URL)*/
else
{
	header( 'Location: index.php' );
}

/*$password=(!isset($_POST['password']));
$username=(!isset($_POST['username']));

    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
	
	
	while($row = mysql_fetch_array($result))
	{
	echo ($row['gebruiker'] . " " . $row['wachtwoord']);
	echo "<br>";
	}
	

class user
{
	public $db;
	
	public function __construct()
	{
		//$this->db = new PDO("mysql:host=localhost; dbname=project;", "root", "usbw");
		try
			{
				$dbh = new PDO("mysql:host=localhost; dbname=project;", "root", "");
			} catch (PDOException $e)
			{
				echo 'Connection failed: ' . $e->getMessage();
			}
	}
	
	public function login($name, $pass)
	{
		if(!empty($name) && !empty($pass))
		{
			$st = $this->db->prepare("SELECT * FROM admin WHERE gebruiker=? AND wachtwoord=?");
			$st->bindParam(1, $name);
			$st->bindParam(2, $pass);
			$st->execute();
			
			if($st->rowCount() == 1)
			{
				echo("opa tijdje");
			}
			else
			{
				echo("Verkeerde gebruikersnaam of wachtwoord.");
			}
		}
		else
		{
			echo("Voer uw gebruikersnaam en wachtwoord in.");
		}
	}
}*/

?>

