<?php
include('connection.php');


$apifor = $_POST['for'];



switch ($apifor) {

    case "successfull";

        echo json_encode(successfull($conn));
        break;
}


function successfull($conn)
{

    $sql = mysqli_query($conn, "SELECT * FROM `enquiry`  WHERE  `type` = 'Appointment' AND `status` =  '2'");

    $response['successfull_appointments']  = mysqli_num_rows($sql);
    $response['pending_appointments'] = pending($conn);
    $response['cancelled_appointments']  = cancelled($conn);
    $response['Total_appointments'] = total($conn);


    return $response;
}

function pending($conn)
{
    $sql = mysqli_query($conn, "SELECT * FROM `enquiry` WHERE `type` = 'Appointment' AND `status` =  '1'");

    return mysqli_num_rows($sql);
}

function cancelled($conn)
{
    $sql = mysqli_query($conn, "SELECT * FROM `enquiry` WHERE `type` = 'Appointment' AND `status` =  '3'");

    return mysqli_num_rows($sql);
}

function total($conn)
{
    $sql = mysqli_query($conn, "SELECT * FROM `enquiry` WHERE `type` = 'Appointment' ");

    return mysqli_num_rows($sql);
}
