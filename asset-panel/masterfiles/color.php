<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM assetcolor where id='$id'";
    $app = new App;
    $path = "color.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $code = $_POST['code'];
    $color = $_POST['color'];
    $description = $_POST['description'];
    $query = "INSERT INTO assetcolor (code, color, description)
VALUES(:code, :color, :description)";
    $arr = [
        ":code" => $code,
        ":color" => $color,
        ":description" => $description,
    ];
    $path = "color.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $color = $_POST['color'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $query = "UPDATE assetcolor SET color=:color, code=:code, description=:description WHERE id='$id'";
    $arr = [
        ":code" => $code,
        ":color" => $color,
        ":description" => $description,
    ];
    $path = "color.php?edit=$id";
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
                    <h1 class="h5 mb-3"><b>color List</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM assetcolor where id='$id'";
                            $app = new App;
                            $color1s = $app->selectAll($query); ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="color.php">
                                    <?php foreach ($color1s as $color1): ?>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">color List</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" class="form-control form-control-sm"
                                                        id="colFormLabelSm" name="id" value="<?php echo $color1->id ?>">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="color" value="<?php echo $color1->color ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="code" value="<?php echo $color1->code ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="description" value="<?php echo $color1->description ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pb-5 pt-3">
                                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                                            <a href="color.php" class="btn btn-outline-dark ml-3">Close</a>

                                        </div>
                                    <?php endforeach; ?>
                                </form>
                            </div>

                        <?php } else { ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="color.php">
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">color List</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="color">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Code</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-5 pt-3">
                                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                        <!-- <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a> -->

                                    </div>

                                </form>
                            </div>
                        <?php } ?>
                        <div class="col-md-8 mb-3 ">

                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">List of color List --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM assetcolor";
                                $app = new App;
                                $color = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>color</th>
                                            <th>Desciptions</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($color as $colorlist): ?>

                                            <tr>
                                                <td><?php echo $colorlist->id ?></td>
                                                <td><?php echo $colorlist->code ?></td>


                                                <td><?php echo $colorlist->color ?></td>
                                                <td><?php echo $colorlist->description ?></td>
                                                <td>
                                                    <a style="text-decoration:none;"
                                                        href="color.php?edit=<?php echo $colorlist->id ?>"
                                                        class="text-success">&nbsp;&nbsp;
                                                        <i class="nav-icon fas fa fa-edit"></i>

                                                    </a> |
                                                    <a style="text-decoration:none;"
                                                        href="color.php?delete=<?php echo $colorlist->id ?>"
                                                        class="text-danger">&nbsp;&nbsp;
                                                        <i class="nav-icon fas fa fa-trash"></i>

                                                    </a>

                                                </td>
                                            </tr>


                                        <?php endforeach; ?>
                                    </tbody>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
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