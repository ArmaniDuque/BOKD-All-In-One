<!DOCTYPE html>
<?php require "../config/config.php"; ?>
<?php require "../libs/app.php"; ?>
<?php include "../layouts/url.php"; ?>

<?php

// $app = new App;
// $app->validateSessionAdminInside();

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM usersprofile WHERE user_id='$user_id'";
$app = new App;
$usersprofile = $app->selectAll($query);

$query = "SELECT * FROM admins WHERE id='$user_id'";
$app = new App;
$users = $app->selectAll($query);
?>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> Command Center Reports</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo APPURL; ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo APPURL; ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="<?php echo APPURL; ?>admin-panel/layouts/fonts.php" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo APPURL; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo APPURL; ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo APPURL; ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo APPURL; ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo APPURL; ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo APPURL; ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo APPURL; ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="<?php echo APPURL; ?>assets/css/style.css" rel="stylesheet">


    <!-- Print -->

    <link rel="stylesheet" href="<?php echo APPURL; ?>assets/tableExport/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>assets/tableExport/buttons.dataTables.min.css">

    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/jszip.min.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo APPURL; ?>assets/tableExport/buttons.print.min.js"></script>





</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center d-print-none">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?php echo APPURL; ?>index.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">AFAB ComCen</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->





                </li><!-- End Messages Nav -->
                <?php if (isset($_SESSION['email'])): ?>
                    <?php foreach ($usersprofile as $profile): ?>

                        <li class="nav-item dropdown pe-3">

                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                <img src="../../img/<?php echo $profile->image; ?>" alt="Profile" class="rounded-circle">
                                <span class="d-none d-md-block dropdown-toggle ps-2">
                                    <?php echo $_SESSION['email']; ?>
                                    <?php // $_SESSION['user_id']; ?>
                                </span>

                            </a><!-- End Profile Iamge Icon -->

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    <h6>
                                        <?php echo $_SESSION['email']; ?>
                                    </h6>
                                    <span>
                                        <?php echo $profile->job; ?>
                                    </span>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="<?php echo APPURL; ?>admin-panel/admins/index.php">
                                        <i class="bi bi-person"></i>
                                        <span>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <!-- <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="<?php //echo APPURL; ?>admin-panel/admins/index.php">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="<?php //echo APPURL; ?>pages-faq.php">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li> -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="<?php echo APPURL; ?>admin-panel/auth/pages-logout.php">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Sign Out</span>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->
                <?php else: ?>
                    asasg
                <?php endif ?>
            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/admins/dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard One</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/admins/dashboard1.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard Two</span>
                </a>
            </li><!-- End Dashboard Nav -->



            <li class="nav-heading">Admin Pages</li>


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-camera-fill"></i><span>CCTV</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="<?php echo APPURL; ?>admin-panel/camera/show-camera.php">
                            <i class="bi bi-camera-fill"></i>
                            <span>Camera</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo APPURL; ?>admin-panel/idf/show-idf.php">
                            <i class="bi bi-inbox-fill"></i>
                            <span>IDF Box</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo APPURL; ?>admin-panel/camera/show-camerahistory.php">
                            <i class="bi bi-receipt-cutoff"></i>
                            <span>Camera History</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo APPURL; ?>admin-panel/camerareports/show-reports.php">
                            <i class="bi bi-receipt-cutoff"></i>
                            <span>Reports</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/paggingsystem/show-pagging.php">
                    <i class="bi bi-megaphone-fill"></i>
                    <span>Paging System</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed"
                    href="<?php echo APPURL; ?>admin-panel/trafficlight/show-trafficlight.php">
                    <i class="bi bi-stoplights-fill"></i>
                    <span>Traffic System</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/vmsystem/show-vms.php">
                    <i class="bi bi-display-fill"></i>
                    <span>Variable Messaging System</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/cctvserver/show-cctvserver.php">
                    <i class="bi bi-display-fill"></i>
                    <span>Camera Server</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/telephone/show-telephone.php">
                    <i class="bi bi-display-fill"></i>
                    <span>Telephone</span>
                </a>
            </li><!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse show" href=""
                    aria-expanded="true">
                    <i class="bi bi-camera-fill"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/reports/show-reports.php">
                            <i class="bi bi-camera-fill"></i>
                            <span>All Report</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/reports/all.php">
                            <i class="bi bi-camera-fill"></i>
                            <span>Export All Inactive Report</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/reports/allreports.php">
                            <i class="bi bi-camera-fill"></i>
                            <span>Export All Reports</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed"
                            href="<?php echo APPURL; ?>admin-panel/reports/show-indoorreport.php">
                            <i class="bi bi-inbox-fill"></i>
                            <span>Indoor Report</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed"
                            href="<?php echo APPURL; ?>admin-panel/reports/show-outdoorreport.php">
                            <i class=" bi bi-receipt-cutoff"></i>
                            <span>Outdoor Report</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed"
                            href="<?php echo APPURL; ?>admin-panel/reports/show-pagingreport.php">
                            <i class=" bi bi-receipt-cutoff"></i>
                            <span>Pagging Report</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed"
                            href="<?php echo APPURL; ?>admin-panel/reports/show-trfreport.php">
                            <i class=" bi bi-receipt-cutoff"></i>
                            <span>Traffic Light Report</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed"
                            href="<?php echo APPURL; ?>admin-panel/reports/show-vmsreport.php">
                            <i class=" bi bi-receipt-cutoff"></i>
                            <span>VMS Report</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Forms Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/admins/show-admins.php">
                    <i class="bi bi-person"></i>
                    <span>Admins</span>
                </a>
            </li><!-- End Profile Page Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo APPURL; ?>admin-panel/admins/index.php">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->




        </ul>

    </aside><!-- End Sidebar-->