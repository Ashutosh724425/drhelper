<?php include '../../action/check-login.php';
include '../../action/config.php';
$today = date('Y-m-d');
$current_month = date('m');
$current_year = date('Y');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $shop . ' ' . ucfirst($page)  ?></title>
	<link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="../vendors/daterangepicker/daterangepicker.css">
	<!-- ==============Data Tables====================== -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="shortcut icon" href="../../assets/img/favicon.png" />
	<style>
		label {
			font-size: 13px;
			font-weight: bold;
			margin: 0;
			padding: 0;
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
									<h5 class="text-primary">Change Password</h5>
									<form method="post">
										<div class="col-md-4">
											<label class="text-sm">New Password</label>
											<input type="password" name="password" id="" class="form-control form-control-sm">
											<br>
											<label class="text-sm">Confirm Password</label>
											<input type="password" name="cpassword" id="" class="form-control form-control-sm">
											<br>
											<div class="text-right">
												<input type="submit" name="employee_change_password" value="Save" class="btn btn-sm btn-info">
											</div>

										</div>
									</form>
								</div>
							</div>
						</div>
					</div>


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