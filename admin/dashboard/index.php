<?php include '../../action/check-login.php';
include '../../action/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $shop ?></title>
	<link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
	<!-- ==============Data Tables====================== -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/style.css">
	<link href="../../assets/img/favicon.png" rel="shortcut icon" type="image/png">
	<style>
		.text-sm {
			font-size: 13px;
			font-weight: bold;
			color: blue;
		}
	</style>
</head>

<body>
	<div class="container-scroller">
		<!-- partial:partials/_navbar.html -->
		<?php include 'top-navbar.php'; ?>

		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_sidebar.html -->
			<?php include 'side-navbar.php'; ?>

			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">



					<div class="row">
						<div class="col-md-12 grid-margin">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="d-sm-flex align-items-baseline report-summary-header">
												<h5 class="font-weight-semibold">Appointment</h5>
											</div>
										</div>
									</div>
									<div class="row report-inner-cards-wrapper">

										<div class="col-md-6 col-xl report-inner-card">
											<div class="inner-card-text">
												<span class="report-title">Total Enquiry</span>
												<?php
												$bal2 = mysqli_query($con, "SELECT * FROM `enquiry` WHERE type='Inquiry' AND `status` =1 ");
												$w2 = mysqli_num_rows($bal2);
												?><br>
												<h4><?php echo $w2; ?></h4>
												<br>
												<a href="enquiry.php" class="text-sm">View Details <i class="icon-arrow-right-circle"></i> </a>
											</div>
											<div class="inner-card-icon bg-primary">
												<i class="icon-people"></i>
											</div>
										</div>

										<div class="col-md-6 col-xl report-inner-card">
											<div class="inner-card-text">
												<span class="report-title">Total Appointment</span>
												<?php
												$bal2 = mysqli_query($con, "SELECT * FROM `enquiry` WHERE type='Appointment' AND `status` =1 ");
												$w2 = mysqli_num_rows($bal2);
												?><br>
												<h4><?php echo $w2; ?></h4>
												<br>
												<a href="all_appointment.php" class="text-sm">View Details <i class="icon-arrow-right-circle"></i> </a>
											</div>
											<div class="inner-card-icon bg-primary">
												<i class="icon-people"></i>
											</div>
										</div>


										<div class="col-md-6 col-xl report-inner-card">
											<div class="inner-card-text">
												<span class="report-title">Today Appointment</span>
												<br>
												<?php
												$today = date('Y-m-d');
												$bal3 = mysqli_query($con, "SELECT * FROM `enquiry` WHERE type='Appointment' AND appoint_date = '$today' AND `status` =1 ");
												$w3 = mysqli_num_rows($bal3);
												?><br>
												<h4><?php echo $w3; ?></h4>
												<br>
												<a href="today_appointment.php" class="text-sm">View Details <i class="icon-arrow-right-circle"></i> </a>
											</div>
											<div class="inner-card-icon bg-info">
												<i class="icon-people"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>



					<!------ Appointment ---->
					<div class="row">
						<div class="col-md-12 grid-margin">
							<div class="card">
								<div class="card-body">




									<div class="col-md-6">

										<div class="d-sm-flex align-items-baseline report-summary-header">
											<h5 class="font-weight-semibold">Customers </h5>
										</div>

										<?php


										$bal4 = mysqli_query($con, "SELECT DISTINCT name, phone, email FROM `enquiry`");
										$w4 = mysqli_num_rows($bal4);

										?>
										<h3>
											<?php echo $w4; ?>
										</h3>

										<br>
										<a href="customer.php" class="text-sm">View Details <i class="icon-arrow-right-circle"></i> </a>



									</div>

								</div>
							</div>
						</div>
					</div>
					<!------ Appointment ---->

				</div>
			</div>
		</div>

	</div>


	<script src="../vendors/js/vendor.bundle.base.js"></script>
	<script src="../vendors/moment/moment.min.js"></script>
	<script src="../vendors/daterangepicker/daterangepicker.js"></script>
	<script src="../js/off-canvas.js"></script>
	<script src="../js/misc.js"></script>
	<script src="../js/user.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script>
</body>

</html>