<?php

$db_host = "localhost";


// $db_user = "u639756890_drshankar";
// $db_pass = "Drshankar@2021";
// $db_name = "u639756890_drshankar";


$db_user = "root";
$db_pass = "";
$db_name = "hopy";

$con =  mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (mysqli_connect_error()) {
	echo 'connect to database failed';
}
//else{ echo 'connected to database'; }

?>