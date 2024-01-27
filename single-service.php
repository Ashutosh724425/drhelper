<?php include './action/config.php';
$id = base64_decode($_GET['id']);
$treatment = str_replace('-', ' ', $_GET['treatment']);
$rs = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `services` WHERE id='$id' OR treatment='$treatment' "));
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dr. Helper <?= $treatment ?></title>
    <meta name="author" content="Dr. Helper">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>

<body>

    <?php include 'header.php' ?>

    <div class="title-section dark-bg module">
        <div class="grid-container grid-x grid-padding-x">
            <div class="small-12 cell">
                <h1><?= $treatment ?></h1>
            </div>
            <div class="small-12 cell">
                <ul class="breadcrumbs">
                    <li><a href="./">Home</a></li>
                    <li><a href="./services">Services</a></li>
                    <li><span class="show-for-sr"></span><?= $treatment ?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="service-single-post module">
        <div class="grid-container grid-x grid-padding-x">
            <div class="medium-9 small-12 cell">
                <div class="service-post">
                    <div class="thumbnail">
                        <img src="<?= $path2 . $rs['image'] ?>" alt="Service Images">
                    </div>
                    <div class="service-text">
                        <h1><?= $rs['treatment'] ?></h1>
                        <p><?= $rs['desc'] ?></p>

                        <blockquote>
                            <cite><?= $rs['doctor'] . ', ' . $rs['specialist'] . ', ' . $rs['category'] ?></cite>
                        </blockquote>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>



            <div class="services-sidebar sidebar medium-3 small-12 cell">
                <div class="widget">
                    <h2>Related Services</h2>
                    <div class="widget-content">
                        <ul class="menu vertical">
                            <?php
                            $qry = mysqli_query($con, "SELECT * FROM `services` ORDER BY treatment ASC ");
                            while ($res = mysqli_fetch_array($qry)) :
                            ?>
                                <li><a href="single-service?id=<?= base64_encode($res['id']) ?>&treatment=<?= str_replace(' ', '-', $res['treatment']) ?>"><?= $res['treatment'] ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="widget">
                    <h2>Get Appointment</h2>
                    <div class="widget-content">
                        <form method="post">
                            <label for="Name *">Name *</label>
                            <input type="text" name="name" placeholder="Name..." required />
                            <label for="">Enail *</label>
                            <input type="email" name="email" placeholder="Email ...." required />
                            <label for="">Number *</label>
                            <input name="phone" id="mobile" type="number" required placeholder="Mobile .." onkeyup="check(); return false;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onKeyPress="if(this.value.length==10) return false;">
                            <small id="message"></small>

                            <label for="">Address</label>
                            <input type="text" name="address" placeholder="Address (Optional)...">
                            <label for="">Treatment *</label>
                            <input type="text" readonly name="subject" value="<?= $treatment ?>" required />
                            <label for="">Datw *</label>
                            <input type="date" name="appoint_date" placeholder="Appointment Date" required>
                            <label for="">Time *</label>
                            <input type="time" name="time">
                            <label for="">Message *</label>
                            <textarea name="message" placeholder="Your Message..." rows="2"></textarea>
                            <input type="hidden" name="type" value="Appointment">
                            <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                            <input type="submit" name="get_appointment" class="button primary last-item" />
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>


        </div>
    </div>

    <?php include 'footer.php' ?>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function check() {
            var mobile = document.getElementById('mobile');
            var message = document.getElementById('message');
            var goodColor = "green";
            var badColor = "#FFCCCB";
            if (mobile.value.length != 10) {
                mobile.style.backgroundColor = badColor;
                message.style.color = "red";
                message.innerHTML = "Mobile number should be 10 Digit Only";
                document.getElementById("add_student").disabled = true;
            } else {
                mobile.style.backgroundColor = "white";
                message.innerHTML = "";
                document.getElementById("add_student").disabled = false;
            }
        }
    </script>


</body>

</html>