<?php
	include '../master/init.php';
	if (isset($_GET["message"]) && isset($_GET["user"]) && isset($_GET["timestamp"])) {
		$bdd->exec('INSERT INTO `messages`(`owner`, `message`, `pubDate`) VALUES ("'.htmlspecialchars($_GET["user"]).'","'.htmlspecialchars($_GET["message"]).'","'.htmlspecialchars($_GET["timestamp"]).'")');
	}
?>