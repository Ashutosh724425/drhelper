<?php
session_start();
if (isset($_SESSION['name']) || isset($_SESSION['id'])) {

	$cookie_name = "user";
	$cookie_value = $_SESSION['name'];

	$arr_cookie_options = array(
		'expires' => time() + 60 * 60 * 24 * 30,
		'path' => '/',
		'domain' => $domain, // leading dot for compatibility or use subdomain
		'secure' => true,     // or false
		'httponly' => true,    // or false
		'samesite' => 'None' // None || Lax  || Strict
	);
	setcookie($cookie_name, $cookie_value, $arr_cookie_options);
} else {
	echo '<script>alert("Access denied, Please Login");window.location.assign("./action/logout");</script>';
}
