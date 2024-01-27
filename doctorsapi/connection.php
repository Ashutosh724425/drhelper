<?php
error_reporting(0);
define('hostname','localhost');
define('username','u639756890_drshankar');
define('password','Drshankar@2021');
define('database','u639756890_drshankar');

//error_reporting(0);
$conn = mysqli_connect(hostname,username,password,database) or die(mysqli_error($conn));
mysqli_set_charset($conn,"utf8");

if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
}
	
?>
