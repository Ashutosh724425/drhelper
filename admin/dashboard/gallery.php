<?php include '../../action/check-login.php';
include '../../action/config.php';
error_reporting(0);

$p1 = explode('-', $page);
$page = ucfirst($p1[0]) . ' ' . ucfirst($p1[1]);

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
    <link rel="shortcut icon" href="../../images/favicon.png" />
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
                        <div class="card-header">
                            <h5><?= $page ?></h5>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" runat="server">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input name="title" class="form-control form-control-sm" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input name="image" class="form-control form-control-sm" type="file" accept=".jpg, .png, .jpeg" onchange="readURL2(this);">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <img height="200px" id="blah2" src="<?= $path . $res['image'] ?>" alt="" />
                                    </div>
                                </div>
                                <div class="my-1 col-md-2 float-right">
                                    <button type="submit" name="add_Gallery" class="btn btn-info btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <h5>View <?= $page ?></h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bold">#</th>
                                            <th class="font-weight-bold">Title</th>
                                            <th class="font-weight-bold">Image</th>
                                            <th class="font-weight-bold">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $team_q = mysqli_query($con, "SELECT * FROM `gallery` ");
                                        $i = 0;
                                        while ($tm = mysqli_fetch_array($team_q)) {
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $tm['title'] ?></td>
                                                <td><img src="<?= $path . $tm['image'] ?>" alt=""></td>
                                                <td>
                                                    <a class="pro-remove" href="../../action/config.php?remove&gal_id=<?= $tm['id'] ?>" onclick="return confirm('Do you really want to delete this item ?')"><i class="fas fa-trash-alt text-danger"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

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