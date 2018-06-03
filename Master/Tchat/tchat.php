<?php session_start(); include 'lib/master/init.php'; ?>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://exilon2400.ovh/api/velocity.js"></script>
	<title>Tchat</title>
	<link rel="icon" type="image/png" href="img/logo.png" />
</head>
<body>
	<?php include 'lib/partials/header.php'; ?>
	<div class="content">
		<div class="content3">
			<h4>Membres connectés</h4>
			<div class="joueur">
				<p class="plyname">ExiLon2400</p>
			</div>
			<div class="joueur">
				<p class="plyname">MettRacoon</p>
			</div>
			<div class="joueur">
				<p class="plyname">Faucheuze</p>
			</div>
			<div class="joueur">
				<p class="plyname">aresucit</p>
			</div>
		</div>
	<div class="content5"><?php include("dev/index.php"); ?></div>

</body>
</html>