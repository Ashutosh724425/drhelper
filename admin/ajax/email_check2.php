<?php

include '../../action/config.php';

if(!empty($_POST["email"])) {
	$email = $_POST["email"];
	$query = mysqli_query($con,"SELECT * FROM user WHERE email = '$email'");
	$user_count=mysqli_num_rows($query);
	if($user_count>0) {
	    echo "<span class='status-not-available text-danger'> This Email-id is already exist, Use another </span>";
	}
}
?>