<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex align-items-center bg-light">
        <a class="" href="./">
            <img style="height:70px" src="../../assets/images/logo.png">
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
        <h5 class="mb-0 font-weight-medium d-none d-lg-flex">
            Welcome <?= $shop ?></h5>
        <ul class="navbar-nav navbar-nav-right ml-auto">
            <!-- <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                <img class="img-xs rounded-circle ml-2" src="../images/faces/pic-1.png" alt="Profile image">
            </li> -->

            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle ml-2" src="../../assets/images/logo.png" alt=""></a>
                    <!-- <?= $shop ?> -->
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <!-- <a href="myprofile" class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile</a> -->
                    <a href="setting" class="dropdown-item"><i class="dropdown-item-icon icon-settings"></i> Settings</a>

                    <a href="../../action/logout" class="dropdown-item"><i class="dropdown-item-icon icon-power text-danger"></i> Sign Out</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>