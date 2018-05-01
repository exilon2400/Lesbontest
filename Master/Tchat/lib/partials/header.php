	<header>
		<p class="title">TCHAT</p>
		<nav class="menu">
			<?php
				if (!isset($_SESSION["TCHAT_ID"])) { ?>
					<a class="link" href="connexion.php">Connexion</a>
					<a class="link" href="inscription.php">Inscription</a>
				<?php } else { ?>
					<a class="link" href="tchat.php">Tchat</a>
					<a class="link" href="deconnexion.php">Deconnexion</a>
				<?php }
			?>
			
		</nav>
	</header>