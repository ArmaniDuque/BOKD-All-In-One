<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Accounts</h1>
                </div> -->
                <script src="https://cdn.tailwindcss.com"></script>

                <?php require "navbar.php"; ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->

        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Table Category Preview</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM postablecategory";
                        $app = new App;
                        $category = $app->selectAll($query);
                        ?>


                        <?php foreach ($category as $categorylist): ?>


                        <?php

                            $query = "SELECT COUNT(*) AS count_table FROM postablesubcategory WHERE categoryid='$categorylist->id'";
                            $app = new App;
                            $count_table = $app->selectOne($query);
                            // echo $count_table->count_table;
                            ?>
                        <!-- /.Personal Details -->
                        <?php if ($count_table->count_table == 0) { ?>
                        <div class="col-md-2 mb-3">
                            <a class="btn btn-app bg-secondary" href="#"
                                style="height:100px;width:100%;font-size:25px;">
                                <!-- <span class="badge bg-danger">3</span> -->
                                <i class="fa fa-map-marker"></i>
                                <span style="font-size:18px;"><?php echo $categorylist->category ?></span>
                                <hr>
                                <span style="font-size:15px;">Please Setup Table Count is
                                    <?php echo $count_table->count_table ?></span>
                            </a>
                        </div>
                        <?php } else { ?>
                        <div class="col-md-2 mb-3">
                            <a class="btn btn-app bg-success"
                                href="tableviewlist.php?id=<?php echo $categorylist->id ?>&category=<?php echo $categorylist->category ?>"
                                style="height:100px;width:100%;font-size:25px;">
                                <!-- <span class="badge bg-danger">3</span> -->
                                <i class="fa fa-map-marker"></i>
                                <span style="font-size:18px;"><?php echo $categorylist->category ?></span>
                                <hr>
                                <span style="font-size:15px;">Table Count <?php echo $count_table->count_table ?></span>
                            </a>
                        </div>
                        <?php } ?>

                        <?php endforeach; ?>


                    </div>


                </div>

            </div>




        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>