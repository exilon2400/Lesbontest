<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://exilon2400.ovh/api/velocity.js"></script>
	<title>Basic</title>
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
		<div class="content2"><form method="post">
    <label>Nom d'utilisateur</label>
    <input name="pseudo-inscription" placeholder="Votre nom d'utilisateur" type="text">
<br>
<br>
    <label>Mot de passe</label>
    <input name="password-inscription" placeholder="Votre mot de passe" type="password">
<br>

<br>
<label>adresse e-mail</label>
    <input name="email" placeholder="Votre adresse email" type="email">
<br>
<br>
    <input type="submit" name="send-inscription" value="s'inscrire !"></p>
</form></div>
	</div>
</body>
</html>