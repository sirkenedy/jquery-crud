<?php
include_once("includes/connection.php");
include_once("includes/functions.php");
include_once("includes/session.php");

?>
<?php

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM student WHERE matric_no='$username' || email ='$username' and password='$password'";
	$process = mysqli_query($connection, $query);
	$check = mysqli_fetch_array($process);
	 $user_found = mysqli_num_rows($process);
	if($user_found == 1) {
		$id = $check['id'];
		$_SESSION['stud_id'] = $check['id'];
		$_SESSION['stud_firstname'] = $check['firstname'];
		$_SESSION['stud_lastname'] = $check['lastname'];
		$_SESSION['stud_username'] = $username;
		$_SESSION['stud_password'] = $password;
		$_SESSION{'stud_email'} = $check['email'];
	// 	redirect_to("dashboard.php?id=$id");
		echo 'success';
	} else {
	// 	//echo mysqli_error($connection);
		echo 'Error';
		}
	// 	redirect_to("practice.php");
}

if (isset($_POST['logout'])) {
	session_destroy();
	echo 'success';
}else{
	echo mysqli_error($connection);
}



if(isset($_POST['new_post'])){
	$title = $_POST['title'];
    $content = $_POST['content'];
    $posted_by = $_POST['posted_by'];
    if(!empty($title) && !empty($content) && !empty($posted_by)){

    $query="INSERT INTO post(title, content, posted_by)
					VALUES('{$title}','{$content}','{$posted_by}')";
	$process = mysqli_query($connection, $query);

	if($process==1){
		echo "posted";
	}else{
		echo "an error occured during processing. try again";
	}
}else{
	echo "all fields are required";
 }
}

if(isset($_POST['seeall'])){

    $query="SELECT * FROM post ORDER BY id DESC";
	$query_field = mysqli_query($connection, $query);
	while($proc = mysqli_fetch_array($query_field)){
		$id = $proc['id'];
		$title = $proc['title'];
		$content = $proc['content'];
		$posted_by = $proc['posted_by'];

		echo "Title : <h2>".$title."</h2> Posted by : <h6>".$posted_by."</h6> CONTENT <p>".$content."</p><div id=\"updatePost\">
		<input type=\"text\" id=\"updel_id\" value=\"$id\">
		<input type=\"hidden\" id=\"updel_title\" value=\"$title\">
		<input type=\"hidden\" id=\"updel_content\" value=\"$content\">
		<input type=\"hidden\" id=\"updel_posted_by\" value=\"$posted_by\">
		<button id=\"update_post\" class=\"btn btn-danger\"  onClick=\"deletePost();\" name=\"delete\"><i class=\"glyphicon glyphicon-trash\"></i>delete</button><button id=\"delete_post\" onClick=\"posttoupdate();\" class=\"btn btn-danger\" name=\"delete\"><i class=\"glyphicon glyphicon-edit\"></i>edit</button></div><br><hr>";
	}
}

if(isset($_POST['del_id'])){
	$id=$_POST['updel_id'];
	$query= "DELETE FROM post WHERE id=$id";
	$query_field = mysqli_query($connection, $query);
	if($query_field) {
		    $query="SELECT * FROM post ORDER BY id DESC";
			$query_field = mysqli_query($connection, $query);
			while($proc = mysqli_fetch_array($query_field)){
				$id = $proc['id'];
				$title = $proc['title'];
				$content = $proc['content'];
				$posted_by = $proc['posted_by'];

				echo "Title : <h2>".$title."</h2> Posted by : <h6>".$posted_by."</h6> CONTENT <p>".$content."</p><div id=\"updatePost\">
				<input type=\"text\" id=\"updel_id\" value=\"$id\">
				<button id=\"update_post\" class=\"btn btn-danger\"  onClick=\"deletePost();\" name=\"delete\"><i class=\"glyphicon glyphicon-trash\"></i>delete</button><button id=\"delete_post\" onClick=\"posttoupdate();\" class=\"btn btn-danger\" name=\"delete\"><i class=\"glyphicon glyphicon-edit\"></i>edit</button></div><br><hr>";
			}
	}else{
		echo mysqli_error($connection);
	}
}

if(isset($_POST['upd_id'])){
	$id=$_POST['updel_id'];

}
?>