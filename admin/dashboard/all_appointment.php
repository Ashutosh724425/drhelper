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

                                    <table id="myTable" class="table table-bordered table-striped table-responsive-md table-responsive">
                                        <thead>
                                            <tr>
                                                <td width="1%">#</td>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th width="15%">Email</th>
                                                <th>Service</th>
                                                <th>Massege</th>
                                                <th width="3%">Date</th>
                                                <th width="3%">Time</th>
                                                <th width="3%">Status</th>
                                                <th width="3%">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $type = 'Appointment';
                                            $bal5 = mysqli_query($con, "SELECT * FROM `enquiry` WHERE `status`!=0 AND `type` = '$type' ORDER BY id DESC ");
                                            while ($data = mysqli_fetch_assoc($bal5)) {
                                            ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= wordwrap($data['name'], 10, "<br>\n"); ?></td>
                                                    <td><?= $data['phone']; ?></td>
                                                    <td><?= $data['email']; ?></td>
                                                    <td><?= wordwrap($data['service'], 20, "<br>\n"); ?></td>
                                                    <td><?= wordwrap($data['msg'], 30, "<br>\n"); ?></td>
                                                    <td><?= date('d M Y', strtotime($data['appoint_date'])) ?></td>
                                                    <td><?= date('h:i A', strtotime($data['time'])) ?></td>



                                                    <td><?php

                                                        $a = $data['status'];

                                                        if ($a == '1') {
                                                            echo 'New';
                                                        } elseif ($a == '2' ) {
                                                            echo 'Confirmed';
                                                        } else {
                                                            echo 'Cancelled';
                                                        }
                                                        ?> </td>
                                                    <td>
                                                        <form method="post">
                                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                            <button type="submit" name="delete_enquiry" class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to Delete this Appointment ?')"><i class="fas fa-trash"></i></button>
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