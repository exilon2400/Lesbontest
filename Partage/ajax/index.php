<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
    <script>
        function showHint(str) {
            if (str.length == 0) { 
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "test.php?q="+str, true);
                xmlhttp.send();
            }
        }
    </script>
    <style type="text/css">
        * {
            font-family: "Open Sans", sans-serif;
            color: rgba(0,0,0,0.7);
        }
        h1 {
            font-family: "Roboto", "Open Sans", sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        form {
            margin-left: 50%;
            transform: translateX(-50%);
            width: 420px;
        } input {
            background: rgba(0,0,0,0.05);
            border: none; border-bottom: 2px solid #3498db;
            outline: none;
            padding: 10px;
            font-size: 20px;
            transition: 0.3s all ease;
        } input:hover {
            background: rgba(0,0,0,0.1);
            transition: 0.3s all ease;
        } input:focus {
            background: rgba(0,0,0,0.15);
            transition: 0.3s all ease;
        } label {
            font-size: 19px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <form>
        <h1>Rechercher un joueur</h1>
        <label>Nom du joueur : </label><input type="text" onkeyup="showHint(this.value)">
    </form>
    <p>Resultas : <span id="txtHint"></span></p>
</body>
</html>