<?php
include_once("includes/connection.php");
include_once("includes/functions.php");
include_once("includes/session.php");

?>
<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];

		$query="SELECT * FROM  student where id=$id";
		$query_field=mysqli_query($connection, $query);
		$process = mysqli_fetch_array($query_field);
		$firstname = $process['firstname'];
		$lastname = $process['lastname'];

		echo "<h2>welcome to our dashboard</h2><br>".$firstname." ".$lastname;

	}
?>