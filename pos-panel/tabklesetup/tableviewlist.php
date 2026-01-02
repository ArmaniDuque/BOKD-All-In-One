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
        <?php
        $id = $_GET['id'];
        $categoryname = $_GET['category'];
        $query = "SELECT * FROM postablesubcategory WHERE categoryid='$id'";
        $app = new App;
        $subcategory = $app->selectAll($query);
        ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">

                    <h1 class="h5 mb-3"><b><?php echo $categoryname ?>: <a class="btn btn-primary text-right"
                                href="tableview.php">
                                Back
                                to Main
                                Category</a></h1>

                </div>
                <div class="card-body">
                    <div class="row">

                        <?php foreach ($subcategory as $subcategorylist): ?>
                        <!-- /.Personal Details -->
                        <div class="col-md-2 mb-3">



                            <a class="btn btn-app bg-danger " style="height:100px;width:100%;font-size:25px;">
                                <!-- <span class="badge bg-danger">3</span> -->
                                <i class="fas fa-table"></i><?php echo $subcategorylist->subcategory ?>
                                <hr>
                                <span style="font-size:18px;">Guest Name</span>
                            </a>
                        </div>
                        <?php endforeach; ?>


                    </div>


                </div>

            </div>

        </div>

</div>


</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>