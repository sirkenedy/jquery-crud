<?php
include_once("includes/connection.php");
include_once("includes/functions.php");
include_once("includes/session.php");

?>
<?php
	if(isset($_GET['title'])&&isset($_GET['content'])&&isset($_GET['postedby'])){
		$title = $_GET['title'];
		$content = $_GET['content'];
		$postedby = $_GET['postedby'];

		$sql="INSERT INTO post(title, content, postedby)
				VALUES('{$title}','{$title}','{$title}')";
		$sql_field=mysqli_query($connection, $sql);
		if($sql_field){
			echo "posted";
		}else{
			echo "failed";
		}
	}else{
		echo "string";
	}
?>