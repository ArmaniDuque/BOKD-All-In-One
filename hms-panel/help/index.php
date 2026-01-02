<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Help Module</h1>
                </div>
                <!-- <div class="col-sm-6 text-right">
                    <a href="orders.php" class="btn btn-primary">Back</a>
                </div> -->
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


                            <div class="row">
                                <!-- small box -->
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Title</h2>
                                            <h4>
                                                <?php
                                                $query = "SELECT COUNT(*) AS count_title FROM hmstitle ";
                                                $app = new App;
                                                $count_title = $app->selectOne($query);
                                                echo $count_title->count_title;
                                                ?>
                                            </h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Country</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_country FROM hmscountry ";
                                            $app = new App;
                                            $count_country = $app->selectOne($query);
                                            echo $count_country->count_country;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->
                                <!-- small box -->
                                <div class="col-lg-4 col-6">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h2>Nationality</h2>
                                            <h4><?php
                                            $query = "SELECT COUNT(*) AS count_nationality FROM hmsnationality ";
                                            $app = new App;
                                            $count_nationality = $app->selectOne($query);
                                            echo $count_nationality->count_nationality;
                                            ?></h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div> <a href="#" class="small-box-footer">&nbsp;<i
                                                class="fas fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <!-- small box -->


                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Application Buttons</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to
                                            achieve the following:</p>
                                        <a class="btn btn-app">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a class="btn btn-app">
                                            <i class="fas fa-play"></i> Play
                                        </a>
                                        <a class="btn btn-app">
                                            <i class="fas fa-pause"></i> Pause
                                        </a>
                                        <a class="btn btn-app">
                                            <i class="fas fa-save"></i> Save
                                        </a>
                                        <a class="btn btn-app">
                                            <span class="badge bg-warning">3</span>
                                            <i class="fas fa-bullhorn"></i> Notifications
                                        </a>
                                        <a class="btn btn-app">
                                            <span class="badge bg-success">300</span>
                                            <i class="fas fa-barcode"></i> Products
                                        </a>
                                        <a class="btn btn-app">
                                            <span class="badge bg-purple">891</span>
                                            <i class="fas fa-users"></i> Users
                                        </a>
                                        <a class="btn btn-app">
                                            <span class="badge bg-teal">67</span>
                                            <i class="fas fa-inbox"></i> Orders
                                        </a>
                                        <a class="btn btn-app">
                                            <span class="badge bg-info">12</span>
                                            <i class="fas fa-envelope"></i> Inbox
                                        </a>
                                        <a class="btn btn-app">
                                            <span class="badge bg-danger">531</span>
                                            <i class="fas fa-heart"></i> Likes
                                        </a>

                                        <p>Application Buttons with Custom Colors</p>
                                        <a class="btn btn-app bg-secondary">
                                            <span class="badge bg-success">300</span>
                                            <i class="fas fa-barcode"></i> Products
                                        </a>
                                        <a class="btn btn-app bg-success">
                                            <span class="badge bg-purple">891</span>
                                            <i class="fas fa-users"></i> Users
                                        </a>
                                        <a class="btn btn-app bg-danger">
                                            <span class="badge bg-teal">67</span>
                                            <i class="fas fa-inbox"></i> Orders
                                        </a>
                                        <a class="btn btn-app bg-warning">
                                            <span class="badge bg-info">12</span>
                                            <i class="fas fa-envelope"></i> Inbox
                                        </a>
                                        <a class="btn btn-app bg-info">
                                            <span class="badge bg-danger">531</span>
                                            <i class="fas fa-heart"></i> Likes
                                        </a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>



                            </div>
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
<?php require "../../footer1.php"; ?>