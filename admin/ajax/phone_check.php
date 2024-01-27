<?php

include '../../action/config.php';

if(!empty($_POST["phone"])) {
	$phone = $_POST["phone"];
	$query = mysqli_query($con,"SELECT * FROM volunteer WHERE mobile = '$phone'");
	$user_count=mysqli_num_rows($query);
	if($user_count>0) {
	    echo "<span class='status-not-available text-danger font-weight-bold'> This phone number is already exist </span>";
	}
}
?>