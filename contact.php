<?php
include_once './action/config.php';
error_reporting(0);
?>
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

    <div class="title-section dark-bg module">
        <div class="grid-container grid-x grid-padding-x">
            <div class="small-12 cell">
                <h1>Contact Us</h1>
            </div>
            <div class="small-12 cell">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li class="disabled">Contact us</li>

                </ul>
            </div>
        </div>
    </div>

    <div class="content-section module single-products-page products-page" style="margin-bottom:0">
        <div class="grid-container grid-x grid-padding-x">
            <div class="medium-3 small-12 cell contact-sidebar" style="padding:0">


                <img src="assets/images/profile/profile.jpeg" height="400px" alt="">

                <h4 class="padding-top-zero">Dr. Helper Sinha</h4>
                <p>M G Road , Bhagalpur <br> Bihar
                    <!-- <span> , 812001</span> -->
                </p>
                <h4>Customer Service</h4>
                <p>Mob: +91 9431214538<br>(10am to 2pm & 6pm to 8pm)</p>
                <h3>Ex-Resident </h3>
                <p>28, T N Singh Road <br> Court Area , Bhagalpur </p>
            </div>
            <div class="medium-9 small-12 cell">
                <div class="contact-map">
                    <iframe src="" height="20" allowfullscreen></iframe>
                </div>
                <div class="contact-form">
                    <h3>Fill the form below to contact us</h3>
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
                                    <input name="phone" id="mobile" type="number"  required onkeyup="check(); return false;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onKeyPress="if(this.value.length==10) return false;">
                                    <small id="message"></small>
                                </label>
                            </div>
                            <div class="medium-12 small-12 cell">
                                <label>
                                    Your Email *
                                    <input type="email" name="email" placeholder="Email" required>
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
                                <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                            </div>
                            <input type="hidden" name="type" value="Inquiry">

                            <div class="medium-12 cell text-center">
                                <button type="submit" class="primary button" name="get_appointment">Contact Now</button>
                            </div>

                        </div>
                    </form>
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