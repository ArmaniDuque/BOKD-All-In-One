<?php require "config/config.php"; ?>
<?php require "libs/app.php"; ?>
<?php include "layouts/url.php"; ?>
<?php require "validate.php"; ?>
<?php
$app = new App;
$app->validateSessionAdminInside();
$userid = $_SESSION['userid'];
$role = $_SESSION['userrole'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSM</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- <link rel="stylesheet" href="<?php echo APPURL; ?>css/font001.css"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>css/custom.css">

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.3/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href=""> -->

    <!-- modal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="<?php echo APPURL; ?>css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->




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



    <!-- summernote -->











</head>
<style>
    .nav-item {
        font-size: 13px;
    }
</style>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <div class="navbar-nav pl-2">
                <!-- <ol class="breadcrumb p-0 m-0 bg-white">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
                        <img src="<?php echo APPURL; ?>img/avatar5.png" class='img-circle elevation-2' width="40"
                            height="40" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                        <h4 class="h4 mb-0"><strong><?php echo $_SESSION['userfullname']; ?></strong></h4>
                        <div class="mb-3">
                            <?php echo $_SESSION['email']; ?><br><b>Role : </b><?php echo $_SESSION['userrole']; ?>
                        </div>

                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user-cog mr-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->