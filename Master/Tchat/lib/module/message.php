<?php
	include '../master/init.php';
	$request_message = $bdd->query("SELECT * FROM `messages`");
	if ($request_message != false) {
		while ($messages = $request_message->fetch()) { ?>
			<div class="message">
				<p class="message-owner"><?php echo $messages["owner"]; ?></p>
				<p class="message-content"><?php echo $messages["message"]; ?></p>
				<!-- <p class="message-pubDate"><?php echo $messages["pubDate"]; ?></p> -->
			</div>
		<?php }
	} else {
		echo "Bienvenue dans notre bar, aucun messages n'a était envoyer.";
	}
?>