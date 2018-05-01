<script src="../../api/js/jquery.js"></script>


<div id="text"></div>


<script type="text/javascript">
	/*(function($) {
		$(document).ready(function() {
			
		})

		window.onbeforeunload = function(e) {
		  var dialogText = 'Fermeture de la page';
		  console.log(dialogText)
		};
	})(jQuery)*/

	function debug(debug_str) {
		var text = document.getElementById('text')
		text.innerHTML = debug_str
	}

	/*function request(request) {
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "message.php?q="+str, true);
        xmlhttp.send();
	}*/

	debug("coucou")
</script>
