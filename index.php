<?php
session_start();
if(isset($_SESSION['gebruiker']))
	{
		header( 'Location: companies.php' );
	}

?>

<html>
	<head>

	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>

	</head>
	<body>

		<div id="login">

			
			<form action="login.php" method="post">

				<div class="center" style="background-color: rgb(255, 255, 255); border-radius: 5px; box-shadow: 2px 2px 8px #444444;">

					<table class="tcenter">
						<tr>
							<td class="center" style="border-bottom: 0;">Gebruikersnaam: </td> <td class="center" style="border-bottom: 0;"><input type="text" name="gebruikersnaam"></td>
						</tr>
						<tr>
							<td class="center" style="border-bottom: 0;">Wachtwoord: </td> <td class="center" style="border-bottom: 0;"><input type="password" name="wachtwoord"></td>
						</tr>
					</table>
					<div class="clear"> </div>
					
					<input style="margin-bottom: 25px;" type="submit" name="inloggen" value="Inloggen" class="submit"/>
					
					<input style="margin-bottom: 25px;" type="submit" name="registeren" value="Registreren" class="submit"/>

					<div class="clear"> </div>
				</div>
			
			</form>		
		</div>
		
	</body>
</html>
