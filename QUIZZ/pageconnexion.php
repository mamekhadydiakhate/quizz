<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>page connexion</title>
	<link rel="stylesheet" href="miniprojet.css">
</head>
<body>
<header  style="background-color: #07403a; ">
	<div>
		<img src="projet/logo-QuizzSA.png" style="width: 50px; height: 60px;">
		<center>
			<h1 style="margin-top: -2%; color: white ; ">Le Plaisir de jouer</h1>
		</center>
	</div>
</header>
	<div class="fond">
		<center>
		<form action="pageconnexion.php" method="POST">
			<div class="log">
		<h4>Loging Form</h4>
			<div class="page">
				<div class="loging">
					<input type="text" name="login" placeholder="login">
					<img src="projet/icone-user" style="background-color:white;">
				</div>
				<div class="motdepass">
						<input type="password" name="motdepass" placeholder="password">
						<img src="projet/icone-password">
						<input type="submit" name="connecter">
				</div>
				
			</div>
			</div>
		</form>
		</center>	
	</div>
</body>
</html>