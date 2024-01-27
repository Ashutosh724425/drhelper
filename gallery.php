<?php include './action/config.php' ?>
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

    <div class="title-section dark-bg module" style="margin-bottom:0">
        <div class="grid-container grid-x grid-padding-x">
            <div class="small-12 cell">
                <h1><?= $page ?></h1>
            </div>
            <div class="small-12 cell">
                <ul class="breadcrumbs">
                    <li><a href="./">Home</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="services module grey-bg">
        <div class="section-title">
            <h2>Gallery</h2>
            <p>Explore Our Gallery</p>
        </div>
        <div class="padding-between services-wrap">
            <div class="grid-container grid-x grid-padding-x grid-padding-y grid-margin-y">
                <?php
                $qry = mysqli_query($con, "SELECT * FROM `gallery`  ");
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




    <?php include 'footer.php' ?>
</body>

</html>