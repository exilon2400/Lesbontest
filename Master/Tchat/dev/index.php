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
			position: fixed;
			top: 0; left: 0; right: 0; bottom: 100px;
			background: rgba(0,0,0,0.1);
			font-family: "Open Sans", sans-serif;
			overflow-y: scroll;
			background: #243342;
		}
		.send {
			position: fixed;
			bottom: 0; right: 0; left: 0;
			height: 100px;
			font-family: "Open Sans", sans-serif;
		} .send button {
			position: absolute;
			right: 0; bottom: 0;
			height: 100%; width: 10%;
			border: none;
			background: #3498db;
			color: #FFF;
			font-family: "Open Sans", sans-serif;
			text-transform: uppercase;
			font-size: 20px;
			border-top: 1px solid #ccc;
		} .send input {
			position: absolute;
			left: 0; bottom: 0;
			height: 100%; width: 90%;
			font-family: "Open Sans", sans-serif;
			resize: none;
			outline: none;
			border: none;
			border-top: 1px solid #ccc;
			background: #44607c;
			color: #FFF;
			padding: 5px;
			font-size: 20px;
		} .message {
			background: #34495e;
			padding: 0; margin: 0;
			padding: 10px;
		} .message p {
			padding: 0; margin: 0;
			color: #FFF;
		} .message-owner {
			display: inline;
		} .message-owner:after {
			content: " : "
		} .message-content {
			display: inline;
		} .message-pubDate {
			float: right;
		}
	</style>
</head>
<body>
	<div id="text"></div>

	<div class="send">
		<form onsubmit="javascript:return false;" >
			<input type="text" id="textae">
			<button onclick="sendMessage(document.getElementById('textae'))">Envoyer</button>
		</form>
	</div>

	<script type="text/javascript">

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

		function sendMessage(tarea) {
			var msg = tarea.value
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
	        tarea.value = ""
		}

		function request() {
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                debug(this.responseText);
	            }
	        }
	        xmlhttp.open("GET", "lib/module/message.php", true);
	        xmlhttp.send();
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
