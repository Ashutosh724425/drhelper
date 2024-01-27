<?php include './action/config.php';
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

    <div class="banner-container">
        <div class="main-banner">

            <div class="slide transparent-background slide-one">
                <img src="assets/images/help/slide3.jpg" alt="banner" />
                <div class="slide-text">

                    <h3></h3>
                </div>
            </div>


            <div class="slide transparent-background slide-two">
                <img src="assets/images/help/slide2.jpg" alt="banner" />
                <div class="slide-text">

                </div>
            </div>

            <div class="slide transparent-background slide-two">
                <img src="assets/images/help/slide1.jpg" alt="banner" />
                <div class="slide-text">

                </div>
            </div>


        </div>
    </div>



    <div class="services module grey-bg">
        <div class="section-title">
            <h2>Best Services</h2>
            <p>Explore Our Best Cosmotology Services</p>
        </div>
        <div class="padding-between services-wrap">
            <div class="grid-container grid-x grid-padding-x grid-padding-y grid-margin-y">
                <?php
                $qry = mysqli_query($con, "SELECT * FROM `services` ORDER BY id DESC LIMIT 6 ");
                while ($res = mysqli_fetch_array($qry)) :
                ?>
                    <div class="large-4 medium-6 small-12 cell">
                        <div class="service-box hover-wrap">
                            <div class="hover-img">
                                <img src="<?= $path2 . $res['image'] ?>" alt="Service Images" />
                            </div>
                            <div class="service-text hover-bottom">
                                <h6><a href="single-service?id=<?= base64_encode($res['id']) ?>&treatment=<?= str_replace(' ', '-', $res['treatment']) ?>"><?= $res['treatment'] ?></a></h6>
                                <p>Doctor: <?= $res['doctor'] ?></p>
                                <p>Specialist: <?= $res['specialist'] ?></p>
                                <div class="">
                                    <a href="single-service?id=<?= base64_encode($res['id']) ?>&treatment=<?= str_replace(' ', '-', $res['treatment']) ?>" class="button primary">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        </div>
    </div>

    <div class="form-section module dark-bg grey-bg">
        <div class="grid-container grid-x grid-padding-x">
            <div class="large-7 medium-7 small-12 large-offset-5 medium-offset-5 cell">
                <div class="form">
                    <h2>Enquiry Now</h2>
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
                                <button type="submit" class="primary button" name="get_appointment">Submit Enquiry</button>
                            </div>

                        </div>
                    </form>



                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="testimonials dark-bg grey-bg">
        <div class="section-title-second">
            <h2>Clinic Gallery</h2>
            <p>Explore Our Gallery</p>
        </div>

        <div class="padding-between services-wrap">
            <div class="grid-container grid-x grid-padding-x grid-padding-y grid-margin-y">
                <?php
                $qry = mysqli_query($con, "SELECT * FROM `gallery` LIMIT 6 ");
                while ($res = mysqli_fetch_array($qry)) :
                ?>
                    <div class="large-4 medium-6 small-12 cell">
                        <div class="service-box hover-wrap">
                            <div class="hover-img">
                                <img src="<?= $path2 . $res['image'] ?>" alt="Service Images" />
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        </div>
    </div>








    <div class="testimonials dark-bg grey-bg">
        <div class="section-title-second">
            <h2>Awesome Reviews</h2>
            <p>What our customers say about us</p>
        </div>
        <div class="grid-container grid-x grid-padding-x">
            <div class="testimonial-slid">


                <div class="testimonial-text">
                    <!-- <img src="assets/images/help/testimonial-1.png" alt="" /> -->
                    <p> I would recommend him to everyone because he takes good care of his patients and is very honest about the treatment. Thanks sir for all your guidance and support to us.
                    </p>
                    <h6>Er. Shekhar Sinha </h6>
                </div>


                <div class="testimonial-text">
                    <!-- <img src="assets/images/help/testimonial-2.png" alt="" /> -->
                    <p> I’m a delicate and sensitive person, and Dr. Helper I was totally impressed by the way I was treated first time when I met him in 2019 and the way he followed up. He is not only an Excellent Doctor , he is simple, superb Human being, Sober, approachable, a Great Social Worker, friendly approach with smiling face with his selfless service with his selfless services. Always amazing treatment.
                    </p>
                    <h6>J Amarnath B S </h6>
                </div>

                <div class="testimonial-text">
                    <!-- <img src="assets/images/help/testimonial-1.png" alt="" /> -->
                    <p> Very good doctor and kind at Skin. Gives maximum time to hear patient views. His clinical diagnosis is very sharp. . And, after treatment, he himself calls the patients and follow up their condition, which is a rare quality we see in doctors nowadays. Thank you
                    </p>
                    <h6>Mr. Sujit Singh</h6>
                </div>
            </div>
        </div>
    </div>







    <div class="call-to-action dark-bg grey-bg">
        <div class="grid-container grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell">
                <div class="call-to-action-text">
                    <img src="assets/images/help/icons/ribbon.png" alt="Ribbon" />
                    <h2>Its For your Great Skin!</h2>
                    <!-- <p>Crown quis lectus et mauris commodo blandit. Morbi rutrum libero eget nibh facilisis
                        sollicitudin.</p> -->
                    <a href="./appointment" class="button button-second secondary">fix an appointment</a>
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