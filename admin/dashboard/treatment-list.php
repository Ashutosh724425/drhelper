<?php include '../../action/check-login.php';
include '../../action/config.php';
// error_reporting(0);
$today = date('d-m-Y');
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `services` WHERE id = '$id' "));
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
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

                    <?php

                    if (isset($_GET['id'])) { ?>
                        <div class="card">
                            <div class="card-body">
                                <h5><?= $page ?></h5>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <input type="file" name="img" accept=".jpg, .png, .jpeg, .webp" class="form-control" onchange="readURL1(this);" >
                                            </div>

                                            <div class="col-md-4">
                                                <img width="50%" id="blah1" src="../images/<?= $data['image']  ?>" alt="" />
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Treatment Name *</label>
                                                    <input name="treatment" class="form-control " type="text" required value="<?= $data['treatment'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Doctor Name *</label>
                                                <input name="doctor" class="form-control " type="text" value="<?= $data['doctor'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Specialist</label>
                                                <input name="specialist" class="form-control" type="text" value="<?= $data['specialist'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Category *</label>
                                                <input name="category" class="form-control" type="text" value="<?= $data['category'] ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" class="form-control ckeditor" rows="10"><?= $data['desc'] ?></textarea>
                                        <script>
                                            CKEDITOR.replace('description');
                                        </script>
                                    </div>

                                    <div class="my-1 col-md-2 float-right">

                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                        <input type="submit" name="treatment_update" class="btn btn-success btn-block" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div><?php } ?>





                    <div class="card">
                        <div class="card-header">
                            <h2>Treatment List</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Treatment Name </th>
                                        <th>Docter Name</th>
                                        <th>Category</th>
                                        <th width="10%">Action</th>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    $qry = mysqli_query($con, "SELECT * FROM `services` ORDER BY id DESC ");
                                    while ($res = mysqli_fetch_array($qry)) :
                                    ?>
                                        <tr>
                                            <form method="post" enctype="multipart/form-data" runat="server">
                                                <td><?= $i++; ?></td>
                                                <td><?= $res['treatment'] ?></td>
                                                <td><?= $res['doctor'] ?></td>
                                                <td><?= $res['category'] ?></td>
                                                <td style="display:flex">

                                                    <a href="treatment-list?id=<?= $res['id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                    &nbsp;&nbsp;&nbsp;

                                                    <input type="hidden" name="id" value="<?= $res['id'] ?>">
                                                    <button type="submit" name="delete_treatment" class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to delete this Treatment ?')"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </form>

                                        </tr>
                                    <?php endwhile; ?>
                                </table>
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
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script src="../vendors/select2/select2.min.js"></script>
    <script src="../js/select2.js"></script>

    <!-- <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
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