<?php include '../../action/check-login.php';
include '../../action/config.php';
// error_reporting(0);
$today = date('d-m-Y');
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
	<link rel="stylesheet" href="../vendors/select2/select2.min.css">
	<link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="shortcut icon" href="../images/favicon.png" />
	<style>
		label {
			font-size: 10px;
			font-weight: bold;
			margin-bottom: 0;
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
					<div class="card">
						<div class="card-body">
							<h5><?= $page ?></h5>
							<form method="post" enctype="multipart/form-data" runat="server">
								<div class="row">
									<div class="col-md-4">
										<input type="file" name="image" accept=".jpg, .png, .jpeg, .webp" class="form-control" onchange="readURL1(this);" required>
									</div>
									<div class="col-md-4">
										<img width="90%" id="blah1" src="assets/blank.png" alt="" />
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Treatment Name</label>
											<input name="treatment" class="form-control " type="text" required>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Doctor Name</label>
											<input name="doctor" class="form-control " type="text" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Specialist</label>
											<input name="specialist" class="js-example-basic-single form-control" type="text" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Category</label>
											<input name="category" class="js-example-basic-single form-control" type="text" required>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="">Description</label>
									<textarea name="description" class="form-control ckeditor" rows="10"></textarea>
									<script>
										CKEDITOR.replace('description');
									</script>
								</div>

								<div class="my-1 col-md-2 float-right">
									<button type="submit" name="add_treatment" class="btn btn-primary btn-block">Submit</button>
								</div>
							</form>
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
	<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

	<script src="../vendors/select2/select2.min.js"></script>
	<script src="../js/select2.js"></script>
	<script>
		function readURL1(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#blah1').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}

		function readURL2(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#blah2').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>
</body>

</html>