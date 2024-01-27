<?php
include('connection.php');
date_default_timezone_set('asia/kolkata');

$apifor = $_POST['for'];

switch ($apifor) {

    case "upcoming";

        $date = date('Y-m-d');
        echo json_encode(upcomings($conn, $date));

        break;



    case "todays";

        $date = date('Y-m-d');
        echo json_encode(toadysreport($conn, $date));

        break;


    case "confirmed";

        $date = date('Y-m-d');
        echo json_encode(confirmed($conn, $date));

        break;

    case "cancelled";

        $date = date('Y-m-d');
        echo json_encode(cancelled($conn, $date));

        break;

    case "book";

        $hour =  $_POST['hour'];
        $minute =  $_POST['minute'];

        $name =  $_POST['name'];
        $time =  $_POST['time'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $problem = $_POST['problem'];
        $app_date = $_POST['appointment'];
        $address = $_POST['address'];

        $date = date('Y-m-d');

        echo json_encode(bookappointment($conn, $date, $name, $email, $phone, $problem, $address, $app_date, $time));
        break;


    case "update";

        $app_date = $_POST['appointment'];
        $id = $_POST['id'];
        $time = $_POST['time'];



        echo json_encode(scheduleappointment($conn, $app_date, $id,$time));

        break;

    case "cancel";

        $app_date = $_POST['appointment'];
        $id = $_POST['id'];


        echo json_encode(cancelappointment($conn, $app_date, $id));

        break;

        case "slots";

        $app_date = $_POST['date'];
        $time = $_POST['time'];


        echo json_encode(checkslots($conn,$time,$app_date));

        break;
}


function toadysreport($conn, $date)
{

    $sql = mysqli_query($conn, "SELECT * FROM `enquiry`  WHERE  `type` = 'Appointment' AND (`status` =  '1' OR `status` =  '2') AND `appoint_date` =  '$date'");
    while ($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
        $response[]  = $data;
    }
    return $response;
}

function upcomings($conn, $date)
{
    $sql = mysqli_query($conn, "SELECT * FROM `enquiry` WHERE `type` = 'Appointment' AND (`status` =  '1' OR `status` =  '2') ");
    while ($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {

        if ($data['appoint_date'] > $date) {
            $response[]  = $data;
        }
    }
    return $response;
}


function confirmed($conn, $date)
{
    $sql = mysqli_query($conn, "SELECT * FROM `enquiry` WHERE `type` = 'Appointment' AND `status` =  '2'  ORDER BY `appoint_date` DESC");
    while ($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {

        $response[]  = $data;
    }
    return $response;
}

function cancelled($conn, $date)
{
    $sql = mysqli_query($conn, "SELECT * FROM `enquiry` WHERE `type` = 'Appointment' AND `status` =  '3'");
    while ($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {

        $response[]  = $data;
    }
    return $response;
}


function bookappointment($conn, $date, $name, $email, $phone, $problem, $address, $app_date, $time)
{

        $sql = mysqli_query($conn, "INSERT INTO `enquiry`(`name`, `phone`, `email`, `address`, `msg`, `appoint_date`, `type`, `date`,`status`,`time`) VALUES ('$name','$phone','$email','$address','$problem','$app_date','Appointment','$date','2','$time')");

        if ($sql) {
            $response['success'] = '1';
        } else {
            $response['success'] = '0';
        }
    
    return $response;
}


function scheduleappointment($conn, $date, $id,$time)
{

    $sql = mysqli_query($conn, "UPDATE `enquiry` SET `appoint_date`='$date', `status` = '2', `time`='$time' WHERE `id` = '$id' ");

    if ($sql) {
        $response['success'] = '1';
    } else {
        $response['success'] = '0';
    }

    return $response;
}


function cancelappointment($conn, $app_date, $id)
{

    $sql = mysqli_query($conn, "UPDATE `enquiry` SET  `status` = '3' WHERE `id` = '$id' ");

    if ($sql) {
        $response['success'] = '1';
    } else {
        $response['success'] = '0';
    }

    return $response;
}


function checkslots($conn,$time,$app_date){


    $sql = mysqli_query($conn, "SELECT MAX(id) as id FROM `enquiry` WHERE `date` = '$app_date'");

    $count = mysqli_fetch_object($sql);
    $ids = $count->id;

    if($ids==''){

        $tt = date('H:i');
        $response['time'] = $tt;
    }else{

        $sql2 = mysqli_query($conn, "SELECT `time` FROM `enquiry` WHERE `id` = '$ids' AND `date` = '$app_date'");
        $count2 = mysqli_fetch_object($sql2);
        $previous_time = $count2->time;
           
        $new_time = strtotime(''.$previous_time.'+ 20 minute');
        $tt = date('H:i',$new_time); 
        $response['time'] = $tt;

    }

    return $response;
     
}
