<?php include_once './action/config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dr. Helper</title>
    <meta name="author" content="Dr. Helper">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>

<body>
    <?php include 'header.php' ?>

    <div class="title-section dark-bg">
        <div class="grid-container grid-x grid-padding-x">
            <div class="small-12 cell">
                <h1><?= $page ?></h1>
            </div>
            <div class="small-12 cell">
                <ul class="breadcrumbs">
                    <li><a href="./">Home</a></li>
                    <li><span class="show-for-sr"></span> <?= $page ?></li>
                </ul>
            </div>
        </div>
    </div>
    <style>
        /* @media screen and (min-width:667px) {
            .dark-bg {
                padding-top: 120px;
            }
        } */
    </style>
    <div class="appointment-page form-section dark-bg dark-bg1 grey-bg">
        <div class="grid-container grid-x grid-padding-x">
            <div class="large-8 medium-offset-2 large-offset-2 medium-8 small-12 cell">
                <div class="form">

                    <p>Want to book an appointment with us? Fill up the form below to get appointment.</p>
                    <div class="appointment-form">
                        <form method="post">
                            <div class="grid-container grid-x grid-padding-x">
                                <div class="medium-6 small-12 cell">
                                    <label>
                                        Your Name *
                                        <input type="text" name="name" placeholder="Name" required>
                                    </label>
                                </div>
                                <div class="medium-6 small-12 cell">
                                    <label>
                                        Your Phone *
                                        <input name="phone" id="mobile" type="number" required onkeyup="check(); return false;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onKeyPress="if(this.value.length==10) return false;">
                                        <small id="message"></small>
                                    </label>
                                </div>
                                <div class="medium-12 small-12 cell">
                                    <label>
                                        Your Email *
                                        <input type="email" name="email" placeholder="Email" required>
                                    </label>
                                </div>
                                <div class="medium-6 small-12 cell">
                                    <label>
                                        Appointment Date *
                                        <input type="date" name="appoint_date" placeholder="" required>
                                    </label>
                                </div>
                                <div class="medium-6 small-12 cell">
                                    <label>
                                        Time (<small>Optional</small>)
                                        <input type="time" name="time">
                                    </label>
                                </div>

                                <div class="medium-12 small-12 cell">
                                    <label>
                                        Address (Optional)
                                        <input type="text" name="address" placeholder="Enter Here...">
                                    </label>
                                </div>

                                <div class="medium-12 small-12 cell">
                                    <label>
                                        Subject *
                                        <input type="text" name="subject" placeholder="Enter Here..." required>
                                    </label>
                                </div>


                                <div class="medium-12 cell">
                                    <label>
                                        Your message *
                                        <textarea name="message" placeholder="Your message" rows="4" required></textarea>
                                    </label>
                                </div>

                                <input type="hidden" name="type" value="Appointment">

                                <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                                <div class="medium-12 cell text-center">
                                    <button type="submit" class="primary button" name="get_appointment">Get Appointment</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
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