<?php include '../../action/db_connect.php';
session_start();

$userid = $_SESSION['userid'];

if (isset($_POST['amt']) && isset($_POST['add_id'])) {
    $allItems = '';
    $items = array();
    $sql = mysqli_query($con, "SELECT CONCAT(pname,'(',qty,')') AS ItemQty FROM cart WHERE userid='$userid' AND add_to='cart' ");
    while ($row = mysqli_fetch_assoc($sql)) {
        $items[] = $row['ItemQty'];
    }
    // print_r($items);         //for showing all items in array
    $allItems = implode(", ", $items);
    // print_r($allItems);      //for showing all items in one string


    $txnid = NULL;
    $purpose = 'Online Shopping';

    date_default_timezone_set("Asia/Kolkata");
    $date = $added_on = date('Y-m-d');

    $gtotal = $subtotal = $amt = $_POST['amt'];
    $add_id = $_POST['add_id'];
    $payment_status = "Pending";
    $order_id = 'GPK' . rand(1000000, 9999999);

    $q = mysqli_query($con, "INSERT INTO `orders`(`userid`, `address_id`, `order_type`, `order_date`, `grand_total`, `payment_status`, `order_status`, `order_id`) VALUES ('$userid','$add_id','Online','$date','$gtotal','pending','pending','$order_id')");

    $q2 = mysqli_query($con, "INSERT INTO `payment`(`userid`, `amount`, `payment_status`, `txnid`, `date`, `purpose`) VALUES ('$userid', '$gtotal', '$payment_status', '$txnid', '$date', '$purpose')");

    $_SESSION['OID'] = mysqli_insert_id($con);
}

//==============After Successful Payment Update Details========================

if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];

    $q1 = $odid = mysqli_query($con, "SELECT MAX(id) AS payid FROM payment WHERE userid='$userid' ");
    $r1 = mysqli_fetch_array($q1);
    $payid = $r1['payid'];

    mysqli_query($con, "UPDATE payment SET payment_status='Success',txnid='$payment_id' WHERE userid='$userid' AND id='$payid' ");

    $odid = mysqli_query($con, "SELECT id,order_id FROM orders WHERE userid='$userid' ORDER BY id DESC LIMIT 1 ");
    $orders = mysqli_fetch_array($odid);
    $od1 = $orders['id'];
    $order_id = $orders['order_id'];

    mysqli_query($con, "UPDATE orders SET payment_status='Success', order_status='Pending',txnid='$payment_id' WHERE userid='$userid' AND id='$od1' ");

    $c_qry =  mysqli_query($con, "SELECT * FROM `cart` WHERE userid='$userid' AND add_to='cart' ");
    while ($c_res = mysqli_fetch_array($c_qry)) {

        $pid = $c_res['pid'];
        $size_id = $c_res['size_id'];
        $pname = $c_res['pname'];
        $img = $c_res['img'];
        $qty = $c_res['qty'];
        $price = $c_res['price'];
        $offer_price = $c_res['offer_price'];

        $q3 = mysqli_query($con, "INSERT INTO `sales_item`(`userid`, `pid`, `size_id`, `pname`, `img`, `qty`, `price`, `offer_price`, `order_id`) VALUES ('$userid', '$pid', '$size_id', '$pname', '$img', '$qty', '$price', '$offer_price', '$order_id') ");

        $q4 = mysqli_query($con, "DELETE FROM `cart` WHERE userid='$userid' AND add_to='cart' ");
    }

    $cust_qry = mysqli_query($con, "SELECT * FROM `users` WHERE userid='$userid' ");
    $cstmr = mysqli_fetch_array($cust_qry);

    $to = $cstmr['email'];
    $from = 'info@' . $domain;
    $fromName = $shop['name'];
    $subject = $shop['name'] . ' Order Received';

    $htmlContent = '<img src="./users/images/logo.png">
				<h2>Welcome to ' . $shop['name'] . '</h2>
				<h3>Your Order is Placed</h3>
				<br>
				<h2>Dear ' . $cstmr['name'] . ' </h2>
				<p>Your Order id is : ' . $order_id . ' </p>
				<h3><a href="' . $domain . '/track-order?order_id=' . $order_id . '">Click Here To Track Your Order</a></h3>
				<h2>Thank You For Connecting to ' . $shop['name'] . ' !! <br>Enjoy Our Best Services. </h2>
			';

    $headers = "From: $fromName" . " <" . $from . ">";
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    $mail = @mail($to, $subject, $message, $headers, $returnpath);
}
