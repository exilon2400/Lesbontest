<?php
	include '../master/init.php';
	if (isset($_GET["user"]) && isset($_GET["timestamp"])) {
		$bdd->exec("TRUNCATE messages");
		echo "clear";
		$message = htmlspecialchars($_GET["user"])." à vider la conversation à ".date('d/m/Y à G:i', (htmlspecialchars($_GET["timestamp"])+(3600*2)));
		$bdd->exec("INSERT INTO `messages`(`owner`, `message`, `pubDate`) VALUES ('Server','".htmlspecialchars($message)."','".htmlspecialchars($_GET["timestamp"])."')");
		header("Location: ../../dev.php?pseudo=".htmlspecialchars($_GET["user"]));
	} else {
		header("Location: ../../dev.php?pseudo=".htmlspecialchars($_GET["user"]));
	}
?>