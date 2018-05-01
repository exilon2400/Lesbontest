<?php
	try {
	   $bdd = new PDO('mysql:host=92.222.18.17;dbname=tchat_server;', 'tchat_server', '1234567894628');
	} catch(PDOException $e) { ?>
		<script src="../../api/js/particles.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
		<style type="text/css">
			#particles-js {
				background: url(img/sky.jpg) no-repeat;
				background-size: 100% 100%;
				position: fixed;
				top: 0; left: 0; right: 0; bottom: 0;
			} .particles-center {
				position: absolute;
				top: 50%; left: 50%;
				transform: translateX(-50%) translateY(-50%);
				color: #FFF;
				font-size: 25px;
				font-family: "Open Sans", sans-serif;
				border: 2px solid #FFF;
				padding: 20px;
				border-radius: 20px;
				background: rgba(0,0,0,0.5);
			} .particles-center p {
				padding: 0; margin: 0;
			}
		</style>
		<div id="particles-js">
			<div class="particles-center">
				<p>
					Erreur lors de la connexion à la base de donnée,<br>
					Un serveur vas venir prendre votre command :)
				</p>
			</div>
		</div>
		<script>
	        particlesJS.load('particles-js', 'particles.json',
	        function(){
	            console.log('particles.json loaded...')
	        })
	    </script>
		<?php 
		die();
	}
?>