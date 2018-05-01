<?php
	session_start();
	include 'lib/master/init.php';
	if (isset($_POST["send-connexion"])) {
		$pseudo = $_POST["pseudo-connexion"];
		$password = $_POST["password-connexion"];
		if (!empty($pseudo) AND !empty($password)) {
			if (!empty($pseudo) OR !empty($password)) {
				$getUser = $bdd->query('SELECT * FROM `users` WHERE pseudo LIKE "'.$pseudo.'"');
				$gu = $getUser->fetch();
				$_SESSION["TCHAT_ID"] = $gu["id"];
				$_SESSION["TCHAT_Pseudo"] = $gu["pseudo"];
				$_SESSION["TCHAT_Email"] = $gu["email"];
				$_SESSION["TCHAT_Perm"] = $gu["perm"];

				header("Location: tchat.php");
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
	<?php include 'lib/partials/header.php'; ?>
	<div class="content">
		<div class="content4"><br>
			<form method="post">
				    <label>Nom d'utilisateur</label>
				    <input name="pseudo-connexion" placeholder="Votre nom d'utilisateur" type="text">
				<br>
				<br>
				    <label>Mot de passe</label>
				    <input name="password-connexion" placeholder="Votre mot de passe" type="password">
				<br>

				<br>
				    <input type="submit" name="send-connexion" value="Se connecter !"></p>
			</form>
	<br></div>
	</div> 
	</div>
</body>
</html>