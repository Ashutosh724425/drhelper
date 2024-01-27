<?php
session_start();
if(isset($_SESSION['name']) || isset($_SESSION['id']) ){
}
else{
	echo '<script>alert("Access denied, Please Login");window.location.assign("../../action/logout");</script>';
}
?>