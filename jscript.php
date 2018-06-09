<html>
<head>
<script>
function showHint(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "gethin.php?q=" + str, true);
}
</script>
</head>
<body>

<form> 
 <input type="text" onkeyup="showHint(1)">
</form>
<p>Suggestions: <span id="txtHint"></span></p>
</body>
</html>