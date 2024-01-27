<?php
error_reporting(0);
include 'db_connect.php';
date_default_timezone_set("Asia/Kolkata");
$today = date('d-m-Y h:i:s A');

$page1 = (pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); //Current file name without extension
$page = ucwords(str_replace('-', ' ', $page1));
$domain1 = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; //Get full domain name
function getDomain($url)
{
	$pieces = parse_url($url);
	$domain2 = isset($pieces['host']) ? $pieces['host'] : '';
	if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain2, $regs)) {
		return $regs['domain'];
	}
	return FALSE;
}
$domain = getDomain($domain1);  // Get only domain name without wwww
$domain3 = "info@drhelper.com";
$path = '../images/'; //this path is for admin side image operation
$path2 = './admin/images/';	// this path is for user ui side fetch images
$shop = 'Dr. Helper';

//===============  Admin login =============================
if (isset($_POST['admin_login'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	$results = mysqli_query($con, $query);
	$r = mysqli_fetch_assoc($results);

	if (mysqli_num_rows($results) == 1) {

		// $_SESSION['name'] = $r['name'];
		$_SESSION['id'] = $r['id'];

		echo ' <script>
			alert("Login Success...\nWelcome to ' . $shop . ' ");
			window.location.href="dashboard"; </script> ';
	} else {
		echo ' <script>alert("Invalid Email or Password"); </script> ';
	}
}

//================================= admin Reset Password =====================================
if (isset($_POST['employee_change_password'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

	if ($password != $cpassword) {
		echo '<script> alert("Password does not matched."); window.location.href=""; </script> ';
	} else {
		$query = "UPDATE `admin` SET `password` = '$password' WHERE id = '$_SESSION[id]'";
		$results = mysqli_query($con, $query);
		echo '<script> alert("Password Successfully Changed."); window.location.href=""; </script> ';
	}
}

//=============================== Customer login ==============================================
if (isset($_POST['user_login'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$query = "SELECT * FROM user WHERE email='$email' AND password='$password' ";
	$results = mysqli_query($con, $query);
	$r = mysqli_fetch_assoc($results);
	if (mysqli_num_rows($results) == 1) {

		$_SESSION['id'] = $r['id'];
		$_SESSION['name'] = $r['name'];

		echo ' <script>
			alert("Login Success...\n' . $shop . '\nWelcome ' . $r['name'] . ' ");
			window.location.href="./shri-ramnaam"; </script> ';
	} else {
		echo ' <script>alert("Invalid Credential "); window.location.href="";</script> ';
	}
}

//==========================Forgot Password Recovery=========================================
if (isset($_POST['forgot_password'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);

	$q = mysqli_query($con, "SELECT * FROM user WHERE email='$email' ");
	$count = mysqli_num_rows($q);

	if ($count == 0) {
		echo '<script> alert("This email is not registered"); window.location.href=""; </script> ';
	} else {
		$r = mysqli_fetch_array($q);
		$password = $r['password'];
		$name = $r['name'];

		echo '<script> alert("Dear ' . $name . ' \nyour login password is ' . $password . '"); window.location.href=""; </script> ';
	}
}
//==========================Reset Password =========================================
if (isset($_POST['reset_password'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

	if ($password != $cpassword) {
		echo '<script> alert("Password does not matched."); window.location.href=""; </script> ';
	} else {
		$query = "UPDATE `users` SET `password` = '$password' WHERE email = '$email'";
		$results = mysqli_query($con, $query);
		echo '<script> alert("Password Successfully Changed."); window.location.href="login"; </script> ';
	}
}

//================================ Update treatment =======================================
if (isset($_POST['treatment_update'])) {
	$treatment = $_POST['treatment'];
	$doctor = $_POST['doctor'];
	$specialist = $_POST['specialist'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	$id = $_POST['id'];

	if ($_FILES['img']['name'] == '') {
		$img = '';
	} else {
		$qry1 = mysqli_query($con, "SELECT * FROM `services` WHERE id = '$id' ");
		$r1 = mysqli_fetch_array($qry1);
		unlink($path . $r1['image']);

		$img = $treatment . $_FILES['img']['name'];
		move_uploaded_file($_FILES['img']['tmp_name'], $path . $img);
		mysqli_query($con, "UPDATE `services` SET image='$img' WHERE `id` = '$id'");
	}

	$qry = mysqli_query($con, "UPDATE `services` SET `treatment`='$treatment', `doctor`='$doctor', `specialist`='$specialist',`desc` = '$description', `category`='$category' WHERE id = '$id' ") or die(mysqli_error($con));

	if ($qry) {
		echo '<script> alert("Update Successful"); window.location.href=""; </script> ';
	}
}

//================================ Delete treatment =======================================
if (isset($_POST['delete_treatment'])) {
	$id = $_POST['id'];
	$qry10 = mysqli_query($con, "SELECT * FROM `services` WHERE id = '$id' ");
	$r1 = mysqli_fetch_array($qry10);
	unlink($path . $r1['image']);
	$qry11 = mysqli_query($con, "DELETE FROM `services` WHERE id = '$id' ");
	if ($qry11) {
		echo '<script> alert("Deleted Successful"); window.location.href=""; </script> ';
	}
}


//================================ Add Gallery =======================================
if (isset($_POST['add_Gallery'])) {

	$title = $_POST['title'];
	if ($_FILES['image']['name'] == '') {
		$image == '';
	} else {
		$image = rand(100000, 999909) . $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], $path . $image);
	}

	$qry = mysqli_query($con, "INSERT INTO `gallery`(`title`, `image`) VALUES ('$title', '$image')") or die(mysqli_error($con));

	if ($qry) {
		echo '<script> alert("Added Successful"); window.location.href=""; </script> ';
	}
}


//============================Delete Gallery===================================================
if (isset($_GET['remove'])) {
	$gal_id = $_GET['gal_id'];
	$qry = mysqli_query($con, "SELECT image FROM `gallery` WHERE id = '$gal_id' ") or die(mysqli_error($con));
	$r = mysqli_fetch_array($qry);
	unlink('../admin/images/' . $r['image']);
	mysqli_query($con, "DELETE FROM `gallery` WHERE id = '$gal_id' ") or die(mysqli_error($con));
	echo '<script> window.location.href="../admin/dashboard/gallery"; </script>';
}

//================================ Add Multiple Gallery Image =======================================
if (isset($_POST['Gallery_content'])) {

	$id = $_POST['id'];

	// Count total uploaded files
	$totalfiles = count($_FILES['image']['name']);

	// Looping over all files
	for ($i = 0; $i < $totalfiles; $i++) {
		$filename = rand() . $_FILES['image']['name'][$i];
		// $filename = $_FILES['image']['name'][$i];

		// Upload files and store in database
		if (move_uploaded_file($_FILES["image"]["tmp_name"][$i], $path . $filename)) {
			// Image db insert sql
			$insert = "INSERT INTO `gallery_content`(`gal_id`, `image`) values('$id','$filename')";
			if (mysqli_query($con, $insert)) {
				// echo '<script> alert("Data inserted successfully");</script>';
			} else {
				echo 'Error: ' . mysqli_error($con);
			}
		} else {
			echo 'Error in uploading image - ' . $_FILES['image']['name'][$i] . '<br/>';
		}
	}
}

//========================== Get Appointment=========================================



//======================= SENT message from contact form===========================================
// Google reCAPTCHA API key configuration 
$siteKey    = '6LewNbEhAAAAADEfMMeDA0z6UUVwpFEAKqMFKOWM';
$secretKey  = '6LewNbEhAAAAADmhT3203OJRt7-lyaQqgO8JFYn1';


if (isset($_POST['get_appointment'])) {

	$postData = $statusMsg = $valErr = '';
	$status = 'error';


	$name = mysqli_real_escape_string($con, $_POST['name']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$address1 = mysqli_real_escape_string($con, $_POST['address']);
	$service = mysqli_real_escape_string($con, $_POST['subject']);
	$appoint_date = mysqli_real_escape_string($con, $_POST['appoint_date']);
	$msg = mysqli_real_escape_string($con, $_POST['message']);
	$type = mysqli_real_escape_string($con, $_POST['type']);

	$time = $_POST['time'];
	$date = date('Y-m-d');
	// Validate reCAPTCHA box 
	if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
		// Verify the reCAPTCHA response 
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
		// Decode json data 
		$responseData = json_decode($verifyResponse);
		// If reCAPTCHA response is valid 
		if ($responseData->success) {
			$qry = mysqli_query($con, "INSERT INTO `enquiry`(`name`, `phone`, `email`, `address`,`service`, `msg`, `appoint_date`, `type`, `date`, `time`) VALUES ( '$name', '$phone', '$email','$address1', '$service', '$msg', '$appoint_date', '$type', '$date', '$time')") or die(mysqli_error($con));

			echo '<script> alert("Thank you for connecting with us.\n contact you soon."); window.location.href="";</script> ';

			$status = 'success';
			$statusMsg = 'Thank you! Your contact request has submitted successfully, We Will Contact Soon !';
			$postData = '';
		} else {
			$statusMsg = 'Robot verification failed, please try again.';
		}
	} else {
		echo '<script> alert("Captcha Not Fill !"); window.location.href="";</script> ';
	}
} else {
	$statusMsg = '<p>Please fill all the mandatory fields:</p>' . trim($valErr, '<br/>');
}

//==============Delete enquiry =======================================
if (isset($_POST['delete_enquiry'])) {
	$id = $_POST['id'];
	$qry = mysqli_query($con, "UPDATE `enquiry` SET `status`= 0  WHERE `id` = '$id'");
	echo '<script> alert("Deleted Successful"); window.location.href=""; </script> ';
}

//==============Delete enquiry =======================================
if (isset($_POST['delete_customer'])) {
	$id = $_POST['id'];
	$qry = mysqli_query($con, "UPDATE `enquiry` SET `status`= 0  WHERE `id` = '$id'");
	echo '<script> alert("Deleted Successful"); window.location.href=""; </script> ';
}
