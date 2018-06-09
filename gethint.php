<!DOCTYPE html>
<!-- <html>
<head>
<script src="js/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("button").click(function(){
    var div=$("div");
    div.animate({height:'300px',opacity:'0.4'},"slow");
    div.animate({width:'300px',opacity:'0.8'},"slow");
    div.animate({height:'100px',opacity:'0.4'},"slow");
    div.animate({width:'100px',opacity:'0.8'},"slow");
  });
});
</script> 
</head>
 
<body>
<button>Start Animation</button>
<p>By default, all HTML elements have a static position, and cannot be moved. To manipulate the position, remember to first set the CSS position property of the element to relative, fixed, or absolute!</p>
<div style="background:#98bf21;height:100px;width:100px;position:absolute;">
 </div>-->

<!-- <script src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#btn1").click(function(){
    alert("Text: " + $("#test").text());
  });
  $("#btn2").click(function(){
    alert("HTML: " + $("#test").html());
  });
});
</script>
</head>

<body>
<p id="test">This is some <b>bold</b> text in a paragraph.</p>
<button id="btn1">Show Text</button>
<button id="btn2">Show HTML</button>

 -->
 <script src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#w3s").attr({
      "href" : "http://www.w3schools.com/jquery",
      "title" : "W3Schools jQuery Tutorial"
    });
  });
});
</script>
</head>

<body>
<p><a href="../index.html" id="w3s">W3Schools.com</a></p>
<button>Change href and title</button>
<p>Mouse over the link to see that the href attribute has changed and a title attribute is set.</p>
</body>