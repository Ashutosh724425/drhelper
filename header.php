<div class="main-container">
    <div class="header">
        <div class="grid-container grid-x grid-padding-x">
            <div class="small-12 large-3 medium-3 cell">

                <style>
                    @media screen and (min-width:320px) and (max-width:476px) {
                        .proimg {
                            display: none !important;
                        }

                        .header {
                            position: relative;
                            background-color: #f8f8f8;
                            padding: 0px;
                        }
                    }
                </style>


                <div class="logo proimg">
                    <a href="./">
                        <img src="assets/images/logo.png" style="height:80px!important" alt="Logo" />
                    </a>
                </div>
            </div>
            <div class="small-12 large-9 medium-9 cell margin-auto">
                <div class="info-container">
                    <div class="icon-box">
                        <div class="icon-side">

                            <img src="assets/images/help/icons/tablet.png" alt="icon" />
                        </div>
                        <div class="info-side">
                            <p><strong><a href="tel:+91-123 456 7890">+91-9169971149</a></strong><br>
                                <a href="./appointment">Book an Appointment</a>
                            </p>
                        </div>
                    </div>
                    <div class="icon-box">
                        <div class="icon-side">
                            <img src="assets/images/help/icons/pointer.png" alt="icon" />
                        </div>
                        <div class="info-side">
                            <p><strong>Lucknow </strong><br>
                                Uttar Pradesh 
                                <span>,226028</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navigation">
        <div class="grid-container grid-x grid-padding-x nav-wrap">
            <div class="small-6 large-10 medium-9 cell">
                <div class="top-bar float-left">
                    <div class="top-bar-title">
                        <span data-responsive-toggle="responsive-menu" data-hide-for="large">
                            <a data-toggle=""><span class="menu-icon dark float-left"></span></a>
                        </span>
                    </div>
                    <nav id="responsive-menu">
                        <ul class="menu vertical large-horizontal dropdown" data-responsive-menu="accordion medium-dropdown" role="menubar" data-dropdown-menu="4gg5js-dropdown-menu" data-disable-hover="true">
                            <li role="menuitem"><a href="./">Home</a></li>

                            <li class="single-sub parent-nav is-dropdown-submenu-parent opens-right" role="menuitem" aria-haspopup="true" aria-expanded="false" aria-label="Courses"><a href="services">Services</a>
                                <ul class="child-nav menu vertical submenu is-dropdown-submenu first-sub" data-submenu="" aria-hidden="true" role="menu">

                                    <?php
                                    $qry = mysqli_query($con, "SELECT * FROM `services` ORDER BY treatment ASC ");
                                    while ($res = mysqli_fetch_array($qry)) :
                                    ?>
                                        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="single-service?id=<?= base64_encode($res['id']) ?>&treatment=<?= str_replace(' ', '-', $res['treatment']) ?>"><?= $res['treatment'] ?></a></li>
                                    <?php endwhile; ?>

                                </ul>
                            </li>
                            <li role="menuitem"><a href="gallery">Gallery</a></li>
                            <li role="menuitem"><a href="appointment">Appointment</a></li>
                            <li role="menuitem"><a href="./about">About us</a></li>
                            <li role="menuitem"><a href="contact">Contact us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="small-6 large-2 medium-3 cell">
                <div class="social-icons">
                    <div class="search-wrap float-right">
                        <a ><i class="fab fa-facebook-f"></i></a>
                        <a ><i class="fab fa-twitter"></i></a>
                        <a ><i class="fab fa-instagram"></i></a>
                       
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>