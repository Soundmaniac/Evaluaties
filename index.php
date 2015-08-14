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
		<title>PCI Languages - Evaluatie login</title>
	</head>
	<body>
		<div id="login">
			<h2>Login op PCI Languages - evaluaties</h2>
			<form action="login.php" method="post">
				<table class="tcenter">
					<tr>
						<td class="center" style="border-bottom: 0;">Gebruikersnaam: </td> <td class="center" style="border-bottom: 0;"><input type="text" name="gebruikersnaam"></td>
					</tr>
					<tr>
						<td class="center" style="border-bottom: 0;">Wachtwoord: </td> <td class="center" style="border-bottom: 0;"><input type="password" name="wachtwoord"></td>
					</tr>
				</table>
				<div class="clear"> </div>
				<input type="submit" name="inloggen" value="Inloggen" />
				<!--<input type="submit" name="registreren" value="Registreren" />-->
				<div class="clear"> </div>
			</form>		
		</div>
	</body>
</html>
