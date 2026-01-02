<?php require "../config/config.php"; ?>
<?php require "../libs/app.php"; ?>
<?php include "../layouts/url.php"; ?>
<?php require "../validate.php"; ?>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Montemar Beach Club Portal</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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


</head>

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
        <?php require "sidebar.php"; ?>
        <?php
        $query = "SELECT * FROM hmsusermasterfile";
        $app = new App;
        $users = $app->selectAll($query);

        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Marketing Module</h1>
                        </div>
                        <!-- <div class="col-sm-6 text-right">
                    <a href="orders.php" class="btn btn-primary">Back</a>
                </div> -->
                        <?php //require "../resevationnavbar.php"; ?>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="custom-content-below-1-tab"
                                                data-toggle="pill" href="#custom-content-below-1" role="tab"
                                                aria-controls="custom-content-below-1" aria-selected="false">New
                                                Reservation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-content-below-2-tab" data-toggle="pill"
                                                href="#custom-content-below-2" role="tab"
                                                aria-controls="custom-content-below-2" aria-selected="false">Update
                                                Reservation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-content-below-3-tab" data-toggle="pill"
                                                href="#custom-content-below-3" role="tab"
                                                aria-controls="custom-content-below-3" aria-selected="false">Waiting
                                                List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="custom-content-below-4-tab" data-toggle="pill"
                                                href="#custom-content-below-4" role="tab"
                                                aria-controls="custom-content-below-4" aria-selected="true">Block</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-content-below-5-tab" data-toggle="pill"
                                                href="#custom-content-below-5" role="tab"
                                                aria-controls="custom-content-below-5" aria-selected="true">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-content-below-6-tab" data-toggle="pill"
                                                href="#custom-content-below-6" role="tab"
                                                aria-controls="custom-content-below-6" aria-selected="true">Room
                                                Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-content-below-7-tab" data-toggle="pill"
                                                href="#custom-content-below-7" role="tab"
                                                aria-controls="custom-content-below-7" aria-selected="true">Floor
                                                Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-content-below-8-tab" data-toggle="pill"
                                                href="#custom-content-below-8" role="tab"
                                                aria-controls="custom-content-below-8"
                                                aria-selected="true">Confirmation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-content-below-9-tab" data-toggle="pill"
                                                href="#custom-content-below-9" role="tab"
                                                aria-controls="custom-content-below-9" aria-selected="true">Registration
                                                Card</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-content-below-10-tab" data-toggle="pill"
                                                href="#custom-content-below-10" role="tab"
                                                aria-controls="custom-content-below-10"
                                                aria-selected="true">Calendar</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="custom-content-below-tabContent">
                                        <div class="tab-pane fade active show" id="custom-content-below-1"
                                            role="tabpanel" aria-labelledby="custom-content-below-1-tab">

                                            <div class="card-body ">
                                                <div class="col-sm-6 text-right">
                                                    <a href="create-users.php" class="btn btn-primary">Add New
                                                        Profile</a>
                                                </div>
                                                <?php
                                                $currentdate = date("m-d-Y");
                                                $query = "SELECT * FROM mktgdisplay ";
                                                $app = new App;
                                                $description = $app->selectAll($query);
                                                ?>
                                                <table class="table table-striped " style="width:100%" id="history">
                                                    <thead>
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>ID</th>
                                                            <th>Title</th>
                                                            <th>Desciptions</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Photo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($description as $descriptionlist): ?>

                                                            <tr>

                                                                <td>
                                                                    <a style="text-decoration:none;"
                                                                        href="displaylandscapelist.php?edit=<?php echo $descriptionlist->id ?>"
                                                                        class="text-success">
                                                                        <i class="nav-icon fas fa fa-edit"></i>
                                                                    </a> |
                                                                    <a style="text-decoration:none;"
                                                                        href="displaylandscapelist.php?delete=<?php echo $descriptionlist->id ?>"
                                                                        class="text-danger">
                                                                        <i class="nav-icon fas fa fa-trash"></i>

                                                                    </a>

                                                                </td>
                                                                <td><?php echo $descriptionlist->id ?></td>
                                                                <td><?php echo $descriptionlist->title ?></td>
                                                                <td><?php echo $descriptionlist->description ?></td>
                                                                <td><?php echo $descriptionlist->startdate ?></td>
                                                                <td><?php echo $descriptionlist->enddate ?></td>
                                                                <td><img src="<?php echo APPURL; ?>img/mktg/landscape/<?php echo $descriptionlist->checkofficephoto ?>"
                                                                        style="width:100px;"></td>

                                                            </tr>


                                                        <?php endforeach; ?>
                                                    </tbody>

                                                    <script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $('#history').DataTable({
                                                                "pageLength": 10,
                                                                dom: 'Bfrtip',
                                                                buttons: [
                                                                    'copy', 'csv', 'excel', 'pdf',
                                                                    'print'
                                                                ]


                                                            });



                                                        });






                                                        $('#history [data-toggle="tooltip"]').tooltip({
                                                            animated: 'fade',
                                                            placement: 'bottom',
                                                            html: true
                                                        });
                                                    </script>
                                                </table>

                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-2" role="tabpanel"
                                            aria-labelledby="custom-content-below-2-tab">
                                            2
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-3" role="tabpanel"
                                            aria-labelledby="custom-content-below-3-tab">
                                            3
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-4" role="tabpanel"
                                            aria-labelledby="custom-content-below-4-tab">
                                            4
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-5" role="tabpanel"
                                            aria-labelledby="custom-content-below-5-tab">
                                            5
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-6" role="tabpanel"
                                            aria-labelledby="custom-content-below-6-tab">
                                            6
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-7" role="tabpanel"
                                            aria-labelledby="custom-content-below-7-tab">
                                            7
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-8" role="tabpanel"
                                            aria-labelledby="custom-content-below-8-tab">
                                            8
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-9" role="tabpanel"
                                            aria-labelledby="custom-content-below-9-tab">
                                            9
                                        </div>
                                        <div class="tab-pane fade" id="custom-content-below-10" role="tabpanel"
                                            aria-labelledby="custom-content-below-10-tab">
                                            10
                                        </div>
                                    </div>



                                </div>






                            </div>
                        </div>
                        <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('#example').DataTable({
                    "pageLength": 10,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]


                });



            });


            $('#example [data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                placement: 'bottom',
                html: true
            });
        </script><?php require "../footer1.php"; ?>