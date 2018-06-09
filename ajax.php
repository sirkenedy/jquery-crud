<html>
<head>
<script>
function message() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               var title =  document.getElementById("title").value;
               var content = document.getElementById("content").value;
               var postedby = document.getElementById("postedby").value;
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "handler.php?title=" + title && "content="+content && "postedby="+postedby , true);
}
</script>
</head>
<body>


 <input type="text" id="title" placeholder="title">
 <input type="text" id="content" placeholder="content">
 <input type="text" id="postedby" placeholder="postedby">
 <button id="btn" onclick="message()"">POST</button>

<p> <span id="txtHint"></span></p>
</body>
</html>