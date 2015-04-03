<?php

	function dbConnect()
	{
		$con=mysqli_connect("localhost", " pcilaaw10_test", "test-omgeving", "pcilaaw10_test");

		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}
	
	function dbCloseConnect()
	{
		mysqli_close($con);
	}
	
	function dbLogin()
	{
		$result = mysqli_query($con, "SELECT * FROM admin WHERE gebruiker='" . $POST['gebruikersnaam'] . "' AND wachtwoord='" . $POST['wachtwoord'] . "");
		
		if(mysql_num_rows($result) == 1)
		{
			echo("login succes!");
		}

		while($row = mysqli_fetch_array($result))
		{
			echo $row['FirstName'] . " " . $row['LastName'];
			echo "<br>";
		}
	}

?>

