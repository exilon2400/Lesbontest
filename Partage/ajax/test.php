<?php

	try {
	   $server = new PDO('mysql:host=localhost;dbname=tirna;', 'root', '');
	} catch(PDOException $e) {
		var_dump(utf8_encode($e->getMessage()));
		echo '<meta charset="UTF-8"><div style="position:fixed; color: red;top:50%;left:50%; transform: translateX(-50%) translateY(-50%); font-size: 35px; font-family: sans-serif;">ALT : Erreur lors de la connexion à la base de données !<br>Merci de contacter un Administrateur ou un WebMaster :<br>[WebMaster] ExiLon2400 : exilon2400@hotmail.com<br>Discord : <a target="_blank" href="https://discord.gg/GMwPypv">https://discord.gg/GMwPypv</a><p>';
		die();
	}

	if (isset($_GET["q"])) {
		$query = $_GET["q"];
		if ($query == null) {
			echo "Merci de remplir le champ de texte";
		} else {
			$count = 0;
			$req = $server->query("SELECT * FROM `players` WHERE name LIKE '%".utf8_encode($query)."%'");
			if ($req) {
				while ($donnees = $req->fetch()) {
					if ($count == 0) {
						echo "<br><br>".$donnees["pid"].' - '.utf8_encode($donnees["name"]);
					} else {
						echo "<br>".$donnees["pid"].' - '.utf8_encode($donnees["name"]);
					}
					$count++;
				}
				if ($count != 0) {
					echo "<br><br><hr>Nombre de résulat : ".$count;
				}
			} else {
				echo "Aucun résultas pour : ".$query;
			}
			if ($count == 0) {
				echo "Aucun résultas pour : ".$query;
			}
		}
	}
?>