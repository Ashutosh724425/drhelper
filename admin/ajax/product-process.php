<?php
session_start();
error_reporting(0);

if (($_POST['type']=='minus')) {

	$amount = $_POST['amount'];
	$title = $_POST['title'];
	$id = $_POST['id'];
	$qty = $_POST['qty'];
	$total1 = ($amount * $qty);
	$_SESSION['total1'] = $total1;

	
}

if (!empty($_POST['price2']) && !empty($_POST['quantity2']) && !empty($_POST['product2'])) {

	$price2 = $_POST['price2'];
	$quantity2 = $_POST['quantity2'];
	$product2 = $_POST['product2'];
	$total2 = ($price2 * $quantity2);
	$_SESSION['total2'] = $total2;
}

$_SESSION['total'] = $_SESSION['total1'] + $_SESSION['total2'];
?>


<div class="bg-warning text-center">
	<h2 class="pt-0 mt-0 mb-0">कुल राशि : <?php echo $_SESSION['total'] ?></h2>
</div>
<div class="bg-warning">
	<img height="200px" width="100%" src="admin/images/payment.PNG">

	<div class="row">
		<div class="col-sm-12 col-xs-12 text-right pt-15 pb-20 pl-30 pr-30">
			<a class="btn btn-block btn-dark btn-theme-colored btn-flat btn-sm" href="donation?page=donation&amount=<?php echo base64_encode($_SESSION['total']) ?>">दान कीजिए</a>
		</div>
	</div>
</div>