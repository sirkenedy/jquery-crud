<?php
include_once("constants.php");

// 1. Create a database connection
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
//if ($connection) {
	/*die("Database connection successful: " . mysqli_error($connection));
} else {

	die("Database selection failed: " . mysqli_error($connection));
}*/
?>
