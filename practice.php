<!DOCTYPE html>
<html>
<head>
	<link href="bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="bootstrap.css" rel="stylesheet" type="text/css">
	<link href="bootstrap-theme.css" rel="stylesheet" type="text/css">
	<link href="bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.min.js"></script>

	<title>JQuery</title>
</head>
<body>

<div>
	<?php 
	session_start();
	if (isset($_SESSION['stud_id'] )) {

		$content=1;
	}
	else{
		$content = 2;
	}
	 ?>
      <input type="hidden" name="loggedin" id="loggedin" value="<?php echo $content;?>"/>
	 
</div>
<div id="div1" style="background-color:violet; height:200px; width: 60%; padding: 5px; float: center;color: red;">
	<form id="student">
		<center><p><h3><marquee behavior="alternate">Student Portal</marquee></h3></p>
		<p id="txtHint"></P>
		Matric Number<input type="text" name="username" id="sud_id" class="form-control" placeholder="matric no"></br></br>
		Paaword<input type="text" name="password" id="sud_pss" class="form-control" placeholder="password"></br>
		<button id="btn1" type="button" name="stud_log" onclick="process_student();" class="btn btn-primary" >Login</button></center>
		
	</form>
	<form id="staff">
		<center><p><h3><marquee behavior="alternate">Staff Portal</marquee></h3></p>
		Staff_Id<input type="text" name="staff_id" id="stf_id" class="form-control"  placeholder="staff_id"></br></br>
		Paaword<input type="text" name="password" id="stf_pss" class="form-control" placeholder="password"></br>
		<button id="btn2" class="btn btn-primary" onclick="process_staff();"  >Login</button></center>
	</form>
	<p id="btn3" onclick="register();"><font color="blue">Click here</font>, if not registered yet here</p> 
	<form id="reg"  style="padding: 20px;"><hr>
		<center><p>Staff registration portal</p>
		Firstname : <input type="text" name="firstname" class="form-control"  placeholder="firstname"></br>
		Lastname : <input type="text" name="lastname" class="form-control" placeholder="lastname"></br>
		Staff_id : <input type="text" name="staff_id" class="form-control" placeholder="username"></br>
		Password : <input type="text" name="password" class="form-control" placeholder="password"></br>
		confirm_Password : <input type="text" name="con_pass" class="form-control" placeholder="password again"></br>
		<button id="reg1" class="btn btn-primary" >register</button></center>
	</form>
	<p id="butn4" onclick="studReg();"><font color="blue">Click here</font>, if not registered yet here</p> 
	<form id="stud"  style="padding: 20px;"><hr>
		<center><p>Student registration portal</p>
		Firtstname : <input type="text" name="firstname" class="form-control" placeholder="firstname"></br>
		Lastname : <input type="text" name="lastname" class="form-control" placeholder="lastname"></br>
		Matric no : <input type="text" name="staff_id" class="form-control" placeholder="Matri_no"></br>
		Password : <input type="text" name="password" class="form-control" placeholder="password"></br>
		confirm_Password : <input type="text" name="con_pass" class="form-control" placeholder="password again"></br>
		<button id="reg1" class="btn btn-primary" >register</button></center>
	</form>
	<button id="btn1" style="margin: 50px;" onclick="staff();">STAFF</button>
	<button id="btn2" style="margin: 50px;" onclick="student();">STUDENT</button>
</div>



<center>
	<div id="welcomepage" style="width: 90%;height: auto;background-color:violet; margin-top:5px;padding-right: 10px;">
		<div style="text-align: right;padding-right: 10px;">
			<button class="btb btn-danger" onclick="logout();" style="text-align: left:">Logout</button>
		</div>
		<button id="create_post" onclick="create_post();" class="btb btn-danger">Create Post</button>
		<button id="create_post" onclick="view_post();" class="btb btn-danger">view all post</button>
		
		
		<div id="posted" style="padding: 20px"><hr>
		
			Title : <input type="text" name="title" id="post_title" class="form-control"  placeholder="title"></br>
			Content : <input type="text" name="content" id="post_content" class="form-control" placeholder="content"></br>
			Posted By : <input type="text" name="posted_by" id="post_postedby" class="form-control" placeholder="posted_by"></br>
			<p id="paragraph"></p>
			<button id="postBtn" onclick="processPost();" class="btn btn-primary" >POST</button></center>
		</div>
		<div id="readPost"></div>
	</div>
</center>

</body>

	<script>
		$(document).ready(function(){

			var  loggedin = document.getElementById('loggedin').value;
			if (loggedin == 1) {
			   loginsuccess();
			}else{
				loadpage();
			}


		  
		});

		function loadpage(){

			$("#student").hide();
			$("#staff").hide();
			$("#reg").hide();
			$("#welcomepage").hide();
			$("#stud").hide();
			$("#btn3").hide();
			$("#butn4").hide();

			var dim=$("#div1");
		    dim.animate({height:'300px',width:'600px',marginLeft:'400px',opacity:'0.4'},"slow");
		    dim.animate({height:'500px',width:'600px',marginTop:'50px',opacity:'0.8'},"slow");
		    dim.animate({height:'500px',width:'600px',borderRadius:'50px',opacity:'0.4'},"slow");
		    dim.animate({height:'600px',width:'600px',background_color:'white',opacity:'0.8'},"slow");
		    
		}

		function register(){
			$("#reg").show(2000);
			$("#btn3").hide();
			$("#staff").hide("slow");
		}
		function studReg(){
			$("#stud").show(2000);
			$("#butn4").hide();
			$("#student").hide(2000);
		}
		function student(){
			$("#student").show(2000);
			$("#staff").hide("slow");
			$("#reg").hide(2000);
			$("#btn3").hide();
			$("#stud").hide(2000);
			$("#butn4").show();
		}
		function staff(){
			$("#student").hide("slow");
			$("#staff").show(2000)
			$("#reg").hide(2000);
			$("#btn3").show();
			$("#butn4").hide();
			$("#stud").hide(2000);
		}

		function process_staff(){
			var staff_id = getElementById('stf_id').value;
			var password = getElementById('stf_pss').value;
			$.post("engine.php",
			{
			  staff_id: staff_id,
			  password: password
			},
			function(data,status){
			  alert("Data: " + data + "\nStatus: " + status);
			});
		}
		function process_student() {

		var  username = document.getElementById('sud_id').value;
		var  password = document.getElementById('sud_pss').value;
		var xmlhttp = new XMLHttpRequest();

		$.post("engine.php", {'username' : username , 'password' : password, 'login': 'loginauthentication'}, function(data){
            if(data == 'success'){
            	alert('Correct username and password. you are welcome  to our application enjoy');
            	loginsuccess();
            	session();


            }else{
            	alert(data);
            }
		});
		        // xmlhttp.onreadystatechange = function() {
		        //     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		        //         document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
		                
		        //     }
		        // }
		        // xmlhttp.open("GET", "engine.php" , true);
		}
		function session(){

		}

		function loginsuccess(){
			$("#div1").hide();
			$("#welcomepage").show(1400);
			$("#create_post").show(12000);
			//$("#posted").toggle();
			$("#para").show();

		}
		function create_post(){
			$("#posted").toggle(2000);
			// $("#readPost").toggle();
			$("#readPost").hide();
		}
		function view_post(){
			var xmlhttp = new XMLHttpRequest();

		$.post("engine.php", {'seeall': 'seeall'}, function(data){
            if(data !== 'posted'){
            	document.getElementById('readPost').innerHTML= data;
            		$("#readPost").toggle();
            		$("#posted").hide();
            
            }else{
            	alert(data);
            }
		});
		}

		// function readProcessPost(){
		// 	$("paragraph").load(function(){
		// 		$("paragraph").show();
		// 	});
		// }

		function processPost() {

		var  title = document.getElementById('post_title').value;
		var  content = document.getElementById('post_content').value;
		var  posted_by = document.getElementById('post_postedby').value;
		var xmlhttp = new XMLHttpRequest();

		$.post("engine.php", {'title' : title , 'content' : content, 'posted_by' : posted_by, 'new_post': 'new_post'}, function(data){
            if(data == 'posted'){
            	document.getElementById('paragraph').innerHTML="<div style='width:20%; color: green;background-color:white;'>new post created sucessfully</div>";
            	document.getElementById('post_postedby').value="";
            	document.getElementById('post_title').value="";
            	document.getElementById('post_content').value="";
            	//readProcessPost();
            
            }else{
            	document.getElementById('paragraph').innerHTML="<div style='width:20%; color: red;background-color:white;padding:5px;'>"+data+"</div>";
            }
		});
		      // xmlhttp.open("GET", "engine.php" , true);
		}

		function deletePost(){
			var  updel_id = document.getElementById('updel_id').value;
			var xmlhttp = new XMLHttpRequest();

			$.post("engine.php", {'updel_id' : updel_id ,  'del_id': 'del_id'}, function(data){
	            if(data != 'deleted'){
					alert('deleted sucessfully');
					//$("#readPost").show();
	            	//readProcessPost();
	    	       document.getElementById('readPost').innerHTML= data;

	            }else{
	            	alert(data);
	            }
			});
		}

		function posttoupdate(){
			
			// document.getElementById('readPost');
		}

		function updatePost(){
			var  updel_id = document.getElementById('updel_id').value;
			var xmlhttp = new XMLHttpRequest();

			$.post("engine.php", {'updel_id' : updel_id ,  'upd_id': 'upd_id'}, function(dat){
	            if(data != 'deleted'){
					alert('updated sucessfully'+status);
					//$("#readPost").show();
	            	//readProcessPost();
	    	       document.getElementById('readPost').innerHTML= data;

	            }else{
	            	alert(data);
	            }
			});
		}
		function logout(){

					$.post("engine.php", {'logout':  'logout'}, function(data){
			            if(data == 'success'){
			            	alert('You are now logged out');
			    			$('#div1').show('slow');
			    			$('#welcomepage').hide('slow');		    
			            }else{
			            	alert(data);
			            }
					});






		}
	</script>
	<script>
// $(document).ready(function(){
//   $("button").click(function(){
 
//   });
// });
</script>
</html>