<?php include_once 'action/config.php' ?>


<div class="footer">

    <div class="footer-top grey-bg" style="padding:20px  0 20px 0px!important;">
        <div class="grid-container grid-x grid-padding-x">
            <div class="large-8 medium-8 small-12 cell">
                <div class="footer-box footer-logo-side">
                    <a href="./"><img src="assets/images/logo.png" width="20%" alt="" /></a>
                    <p>We established our dermatology clinic in your area now with portfolio of
                        thousands of clients and great experience in industry we are proud to announce.</p>


                    <div class="contact-us">
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i><a><span>Address:</span>Lucknow , Uttar Pradesh</a>
                            </li>
                            <li><i class="fas fa-mobile-alt"></i><a><span>Phone:</span>
                                    +91-9169971149</a>
                            </li>
                            <li><i class="fas fa-envelope"></i><a href=""><span>Email:</span><?= $domain3 ?></a><a href="mailto:"></a>
                            </li>
                        </ul>
                    </div>


                    <div class="social-icons">
                        <ul class="menu">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>

                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>


                </div>
            </div>

            <div class="large-4 medium-4 small-12 cell">
                <div class="footer-box border-btm">
                    <h6>Usefull Likes</h6>
                    <ul class="links">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Our Services</a></li>
                        <!-- <li><a> Why Chose Us?</a></li>

                        <li><a>Staff & Doctors</a></li> -->


                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                    <ul class="links">

                        <?php
                        $qry = mysqli_query($con, "SELECT * FROM `services` ORDER BY id DESC LIMIT 5 ");
                        while ($res = mysqli_fetch_array($qry)) :
                        ?>
                            <li><a href="single-service?id=<?= base64_encode($res['id']) ?>&treatment=<?= str_replace(' ', '-', $res['treatment']) ?>"><?= $res['treatment'] ?></a></li>

                        <?php endwhile; ?>


                        <!-- <li><a href="services.php">Clinical Dermatology</a></li>
                        <li><a href="services.php">Medical Dermatolog</a></li> -->

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <div class="grid-container grid-x grid-padding-x">
            <div class="medium-6 large-6 small-12 cell">
                <div class="copyrightinfo"> © 2023 All rights reserved. </div>
            </div>
            <style>
                @media screen and (max-width:476px) {
                    .cell1 {
                        display: none;
                    }

                    .footer-box .links {
                        float: none;
                        margin-left: 5%;
                    }

                    .footer-box .links:last-child {
                        float: none !important;
                        margin-left: 5%;
                    }

                    .form-section.dark-bg:after {
                        background: lightgray;
                    }
                }
            </style>
            <div class="medium-6 large-6 small-12 cell cell1">
                <div class="footer-bottom-nav">
                    <ul class="menu">
                        <li><a href="index">Home</a></li>
                        <li><a href="about">About Us</a></li>
                        <li><a href="contact">Contact</a></li>
                        <!-- <li><a>Privacy Policy</a></li>
                        <li><a>Terms & Conditions</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<a href="#" id="top" title="Go to Top">
    <i class="fas fa-arrow-alt-circle-up"></i>
</a>



<script src="assets/js/jquery.js" type="116437c9c1717e5de208c482-text/javascript"></script>

<script src="assets/js/foundation.min.js" type="116437c9c1717e5de208c482-text/javascript"></script>

<script src="assets/js/owl.carousel.min.js" type="116437c9c1717e5de208c482-text/javascript"></script>

<script src="assets/js/jquery.event.move.js" type="116437c9c1717e5de208c482-text/javascript"></script>
<script src="assets/js/jquery.twentytwenty.js" type="116437c9c1717e5de208c482-text/javascript"></script>

<script src="assets/js/template.js" type="116437c9c1717e5de208c482-text/javascript"></script>
<script src="assets/js/rocket-loader.min.js" data-cf-settings="116437c9c1717e5de208c482-|49" defer=""></script>