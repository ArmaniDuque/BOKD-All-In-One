<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>



<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmsvip where id='$id'";
    $app = new App;
    $path = "vip.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['save'])) {
    $vip = $_POST['vip'];
    $description = $_POST['description'];
    $query = "INSERT INTO hmsvip (vip, description)
VALUES(:vip,:description)";
    $arr = [
        ":vip" => $vip,
        ":description" => $description,
    ];
    $path = "vip.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $vip = $_POST['vip'];
    $description = $_POST['description'];
    $query = "UPDATE hmsvip SET vip=:vip, description=:description WHERE id='$id'";
    $arr = [
        ":vip" => $vip,
        ":description" => $description,
    ];
    $path = "vip.php?edit=$id";
    $app->update($query, $arr, $path);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Accounts</h1>
                </div> -->

                <?php require "../navbar.php"; ?><?php require "navbar.php"; ?>
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
                    <h1 class="h5 mb-3"><b>VIP </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmsvip where id='$id'";
                            $app = new App;
                            $vips = $app->selectAll($query); ?>

                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="vip.php">
                                <?php foreach ($vips as $vip): ?>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Vip Code</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $vip->id ?>">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="vip" value="<?php echo $vip->description ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="description" value="<?php echo $vip->description ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    <a href="vip.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>
                                <?php endforeach; ?>
                            </form>

                        </div>

                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="vip.php">
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Vip Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="vip">
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
                                    <button class="btn btn-primary" type="submit" name="save">Save</button>
                                    <!-- <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a> -->

                                </div>
                            </form>

                        </div>
                        <?php } ?>
                        <div class="col-md-8 mb-3 ">

                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">List of hmsvip Type--------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmsvip ";
                                $app = new App;
                                $vips = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>VIP </th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($vips as $vip): ?>

                                        <tr>
                                            <td><?php echo $vip->id ?></td>
                                            <td><?php echo $vip->vip ?></td>
                                            <td><?php echo $vip->description ?></td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="vip.php?edit=<?php echo $vip->id ?>" class="text-success">
                                                    <i class="nav-icon fas fa fa-edit"></i>
                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="vip.php?delete=<?php echo $vip->id ?>" class="text-danger">
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
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>