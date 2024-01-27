<?php
include('connection.php');

$username = $_POST['email'];
$password = $_POST['password'];


$sql = mysqli_query($conn, "SELECT * FROM `admin`  WHERE  `email` = '$username' AND `password`= '$password' AND `del_action` =  'N'");

$data = mysqli_fetch_array($sql, MYSQLI_ASSOC);

    $response[]  = $data;

echo json_encode($response);




