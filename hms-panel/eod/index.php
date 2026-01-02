<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>End of Day Module</h1>
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
                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="custom-content-below-1-tab" data-toggle="pill"
                                        href="#custom-content-below-1" role="tab" aria-controls="custom-content-below-1"
                                        aria-selected="false">Night Audit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-2-tab" data-toggle="pill"
                                        href="#custom-content-below-2" role="tab" aria-controls="custom-content-below-2"
                                        aria-selected="false">End of Day Report</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="custom-content-below-tabContent">
                                <div class="tab-pane fade active show" id="custom-content-below-1" role="tabpanel"
                                    aria-labelledby="custom-content-below-1-tab">
                                    1
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-2" role="tabpanel"
                                    aria-labelledby="custom-content-below-2-tab">
                                    2
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