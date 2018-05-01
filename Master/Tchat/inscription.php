<?php
	session_start();
	include 'lib/master/init.php';
	if (isset($_POST["send-inscription"])) {
		$pseudo = htmlspecialchars($_POST["pseudo-inscription"]);
		$pass = sha1(htmlspecialchars($_POST["password-inscription"]));
		$pass2 = sha1(htmlspecialchars($_POST["password-inscription"]));
		$email = htmlspecialchars($_POST["email-inscription"]);
		if (!empty($pseudo) AND !empty($pass) AND !empty($pass2) AND !empty($email)) {
			if (!empty($pseudo) OR !empty($pass) OR !empty($pass2) OR !empty($email)) {
				if ($pass == $pass2) {
					$test_user = $bdd->query('SELECT * FROM `users` WHERE pseudo LIKE "'.$pseudo.'"');
					if ($test_user->fetch() == false) {
						$bdd->exec("INSERT INTO `users`(`pseudo`, `password`, `email`) VALUES ('".$pseudo."','".$pass."','".$email."')");
					
						$getId = $bdd->query('SELECT * FROM `users` WHERE pseudo LIKE "'.$pseudo.'"');
						$gid = $getId->fetch();
						$_SESSION["TCHAT_ID"] = $gid["id"];
						$_SESSION["TCHAT_Pseudo"] = $pseudo;
						$_SESSION["TCHAT_Email"] = $email;
						$_SESSION["TCHAT_Perm"] = 0;

						header("Location: tchat.php");
					} else {
						echo '<script>alert("L\'utilisateur existe déjà.")</script>';
					}
				} else {
					echo '<script>alert("Les mots de passe ne corresponde pas.")</script>';
				}
			} else {
				echo '<script>alert("Merci de remplir tout les champs de texte.")</script>';
			}
		} else {
			echo '<script>alert("Merci de remplir tout les champs de texte.")</script>';
		}
	}
?>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://exilon2400.ovh/api/velocity.js"></script>
	<title>Tchat</title>
</head>
<body>
	<header>
		<p class="title">TCHAT</p>
		<nav class="menu">
			<a class="link" href="connexion.php">Connexion</a>
			<a class="link" href="inscription.php">Inscription</a>
			<a class="link" href="tchat.php">tchat</a>
		</nav>
	</header>

	<div class="content">
		<div class="content2">
			<form method="post">
				<label>Nom d'utilisateur</label>
				    <input name="pseudo-inscription" placeholder="Votre nom d'utilisateur" type="text">
				<br>
				<br>
				    <label>Mot de passe</label>
				    <input name="password-inscription" placeholder="Votre mot de passe" type="password">
				<br>
				<br>
				    <label>RE : Mot de passe</label>
				    <input name="password2-inscription" placeholder="Votre mot de passe" type="password">
				<br>

				<br>
				<label>Adresse e-mail</label>
				    <input name="email-inscription" placeholder="Votre adresse email" type="email">
				<br>
				<br>
			    <input type="submit" name="send-inscription" value="s'inscrire !"></p>
			</form>
		</div>
	</div>
</body>
</html>