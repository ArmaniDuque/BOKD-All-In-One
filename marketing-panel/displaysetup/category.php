<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM mktgcategory where id='$id'";
    $app = new App;
    $path = "category.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $color = $_POST['color'];
    $category = $_POST['category'];
    $sequence = $_POST['sequence'];
    $query = "INSERT INTO mktgcategory (color, category, sequence)
VALUES(:color, :category, :sequence)";
    $arr = [
        ":color" => $color,
        ":category" => $category,
        ":sequence" => $sequence,
    ];
    $path = "category.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $color = $_POST['color'];
    $sequence = $_POST['sequence'];
    $query = "UPDATE mktgcategory SET category=:category, color=:color, sequence=:sequence WHERE id='$id'";
    $arr = [
        ":color" => $color,
        ":category" => $category,
        ":sequence" => $sequence,
    ];

    $path = "category.php?edit=$id";
    $app->update($query, $arr, $path);
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Accounts</h1>
                </div> -->

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
                    <h1 class="h5 mb-3"><b>Category</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM mktgcategory where id='$id'";
                            $app = new App;
                            $category1s = $app->selectAll($query); ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="category.php">
                                <?php foreach ($category1s as $category1): ?>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $category1->id ?>">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="category" value="<?php echo $category1->category ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Color</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="color" value="<?php echo $category1->color ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Sequence</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="sequence" value="<?php echo $category1->sequence ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    <a href="category.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>
                                <?php endforeach; ?>
                            </form>
                        </div>

                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="category.php">
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="category">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Color</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="color">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Sequence</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="sequence">
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                    <!-- <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a> -->

                                </div>



                                <div class="row">
                                    <div class="col-sm-4"> <img src="../../img/6.jpg" alt="Menu Image" class="img-fluid"
                                            style="height: 100%; object-fit: cover; margin:0 auto ;">
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="position-relative p-3 bg-gray" style="height: 180px">
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-success text-lg">
                                                    Available
                                                </div>
                                            </div>
                                            Menu 1 <br> Sub Menu 1 <br>
                                            <small>Description</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4"> <img src="../../img/6.jpg" alt="Menu Image" class="img-fluid"
                                            style="height: 100%; object-fit: cover; margin:0 auto ;">
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="position-relative p-3 bg-gray" style="height: 180px">
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-danger ">
                                                    Not Available
                                                </div>
                                            </div>
                                            Menu 1 <br> Sub Menu 1 <br>
                                            <small>Description</small>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <?php } ?>
                        <div class="col-md-8 mb-3 ">

                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">List of Category --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM mktgcategory";
                                $app = new App;
                                $category = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Color</th>

                                            <th>Sequence</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($category as $categorylist): ?>

                                        <tr>
                                            <td><?php echo $categorylist->id ?></td>
                                            <td><?php echo $categorylist->category ?></td>
                                            <td><?php echo $categorylist->color ?> : <i class='fas fa-square'
                                                    style='font-size:15px;color:<?php echo $categorylist->color ?> '></i>
                                            </td>
                                            <td><?php echo $categorylist->sequence ?></td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="category.php?edit=<?php echo $categorylist->id ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="category.php?delete=<?php echo $categorylist->id ?>"
                                                    class="text-danger">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-trash"></i>

                                                </a>

                                            </td>
                                        </tr>


                                        <?php endforeach; ?>
                                    </tbody>

                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#history').DataTable({
                                            "pageLength": 5,
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'copy', 'csv', 'excel', 'pdf', 'print'
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

                    </div>

                </div>

            </div>


        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>