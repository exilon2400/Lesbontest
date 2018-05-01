<?php
	session_start();
	include 'lib/master/init.php';
	if (isset($_SESSION["TCHAT_ID"])) {
		header("Location: tchat.php");
	} else {
		header("Location: connexion.php");
	}
?>