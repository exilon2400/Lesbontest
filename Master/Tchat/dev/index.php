<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://exilon2400.ovh/api/velocity.js"></script>
	<script src="../../api/js/jquery.js"></script>
	<title>Tchat</title>
	<style type="text/css">
		#text {
			position: absolute !important;
			top: 0; left: 0; right: 15%; bottom: 100px !important;
			background: rgba(0,0,0,0.1) !important;
			font-family: "Open Sans", sans-serif !important;
			overflow-y: scroll !important;
			background: #243342 !important;
		}
		.send {
			position: absolute !important;
			bottom: 0; right: 15%; left: 0 !important;
			height: 100px !important;
			font-family: "Open Sans", sans-serif !important;
		} .send button {
			position: absolute !important;
			right: 0; bottom: 0 !important;
			height: 100%; width: 10% !important;
			border: none !important;
			background: #3498db !important;
			color: #FFF !important;
			font-family: "Open Sans", sans-serif !important;
			text-transform: uppercase !important;
			font-size: 20px !important;
			border-top: 1px solid #ccc !important;
		} .send input {
			position: absolute !important;
			left: 0; bottom: 0 !important;
			height: 100%; width: 90% !important;
			font-family: "Open Sans", sans-serif !important;
			resize: none !important;
			outline: none !important;
			border: none !important;
			border-top: 1px solid #ccc !important;
			background: #44607c !important;
			color: #FFF !important;
			padding: 5px !important;
			font-size: 20px !important;
			text-align: left !important;
		} .message {
			background: #34495e !important;
			padding: 0; margin: 0 !important;
			padding: 10px !important;
		} .message p {
			padding: 0; margin: 0 !important;
			color: #FFF !important;
		} .message-owner {
			display: inline !important;
		} .message-owner:after {
			content: " : " !important;
		} .message-content {
			display: inline !important;
		} .message-pubDate {
			float: right !important;
		}
	</style>
</head>
<body>
	<div id="text"></div>
	<audio id="audioPlayer" src="son/send.wav"></audio>
	<div class="send">
		<form onsubmit="javascript:return false;" >
			<input type="text" id="textae" autofocus>
			<button onclick="sendMessage(document.getElementById('textae'))">Envoyer</button>
		</form>
	</div>

	<script type="text/javascript">

		var last_message = "null";
		var sendItsMe = false;

		function debug(debug_str) {
			var text = document.getElementById('text')
			text.innerHTML = debug_str
		}

		function findGetParameter(parameterName) {
		    var result = null,
		        tmp = [];
		    location.search
		        .substr(1)
		        .split("&")
		        .forEach(function (item) {
		          tmp = item.split("=");
		          if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
		        });
		    return result;
		}

		function scrollDown () {
			document.getElementById("text").scrollBy(0,180000000);
		}

		function playNotif(id) {
			if (id == 0) {
				var player = document.querySelector('#audioPlayer');
				player.play();
			}
		}

		function sendMessage(tarea) {
			var msg = tarea.value

			if (msg != "") {
				if (msg === "/clear") {
					clearMessage()
				} else {
					sendItsMe = true;
					sendM(msg)
				}
			}
	        tarea.value = ""
		}

		function sendM(msg) {
	        var preTS = Date.now().toString();
			var timestamp = preTS.substring(0,10);
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                console.log("Message envoyer : "+msg)
	                console.log(this.responseText);
	            }
	        }
	        xmlhttp.open("GET", "lib/module/sendMessage.php?message="+msg+"&user="+findGetParameter("pseudo")+"&timestamp="+timestamp, true);
	        xmlhttp.send();
		}

		function clearMessage() {
	        var preTS = Date.now().toString();
			var timestamp = preTS.substring(0,10);
	        window.location.replace("lib/module/clearMessage.php?user="+findGetParameter("pseudo")+"&timestamp="+timestamp);
		}


		function request() {
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	            	if (last_message == "null") {
	            		last_message = this.responseText
	            	} else  {
						if(last_message != this.responseText) {
							if (!sendItsMe) {
								playNotif(0)
							} else {
								sendItsMe = false;
							}
							last_message = this.responseText
						}
	            	}
	                debug(this.responseText);
	            }
	        }
	        xmlhttp.open("GET", "lib/module/message.php", true);
	        xmlhttp.send();
	        scrollDown();
		}

		(function($) {
			$(document).ready(function() {
				request()
				var timer = setInterval(function() {
					request()
				},100)
			})

			window.onbeforeunload = function(e) {
			  	var dialogText = 'Fermeture de la page';
			  	console.log(dialogText)
			};
		})(jQuery)

	</script>
</body>
</html>
