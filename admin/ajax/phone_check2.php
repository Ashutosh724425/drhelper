<?php

include '../../action/config.php';

if(!empty($_POST["phone"])) {
	$phone = $_POST["phone"];
	$query = mysqli_query($con,"SELECT * FROM `user` WHERE mobile = '$phone'");
	$user_count=mysqli_num_rows($query);
	if($user_count>0) {
	    echo "<span class='status-not-available text-danger'> This mobile number is already exist, Use another </span>";
	}
}
?>