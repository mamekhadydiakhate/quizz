<?php
require_once('fonctions.php');
$utilisateurs = recupJson('utilisateur');
if(isset($_POST['connecter'])){
	$login = $_POST['login'];
	$password = $_POST['password'];

	for($i=0; isset($utilisateurs[$i]); $i++)
        {
            if(($login == $utilisateurs[$i]['login']) && ($password == $utilisateurs[$i]['password'])){
				if($utilisateurs[$i]['profil'] == 'admin'){
					$_SESSION['admin'] = true;
					header('location:admin.php');
				}
				else
				{}
            }
        }
}
?>
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
		<img src="icone/logo-QuizzSA.png" style="width: 50px; height: 60px;">
		<center>
			<h1 style="margin-top: -2%; color: white ; ">Le Plaisir de jouer</h1>
		</center>
	</div>
</header>
	<div class="fond">
		<center>
		<form method="POST">
			<div class="log">
		<h4>Loging Form</h4>
			<div class="page">
				<div class="loging">
					<input type="text" name="login" placeholder="login">
				</div>
				<div class="motdepass">
					<input type="password" name="password" placeholder="password">		
				</div>
				<div class="valider">
				<input type="submit" name="connecter">
				<a href="inscription.php" style="float:left ; margin :30px";>S'inscrire pour jouer ?</a>  
				</div>
			</div>
			</div>
		</form>
		</center>	
	</div>
</body>
</html>