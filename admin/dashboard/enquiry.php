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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="myTable" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th width="4%">#</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Massege</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $type = 'Inquiry';
                                            $bal5 = mysqli_query($con, "SELECT * FROM `enquiry` WHERE `type` = '$type' AND `status` = 1 ORDER BY id DESC ");
                                            while ($data = mysqli_fetch_assoc($bal5)) { ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= date('d M Y', strtotime($data['date'])) ?></td>
                                                    <td><?= $data['name']; ?></td>
                                                    <td><?= $data['phone']; ?></td>
                                                    <td><?= $data['email']; ?></td>
                                                    <td><?= wordwrap($data['msg'], 60, "<br>\n"); ?></td>
                                                    <td>
                                                        <form method="post">
                                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                            <button type="submit" name="delete_enquiry" class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to Delete this Enquiry ?')"><i class="fas fa-trash"></i></button>
                                                        </form>
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