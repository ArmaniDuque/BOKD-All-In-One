<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmsroomfloor where id='$id'";
    $app = new App;
    $path = "roomfloor.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $roomfloor = $_POST['roomfloor'];
    $description = $_POST['description'];
    $query = "INSERT INTO hmsroomfloor (roomfloor, description)
VALUES(:roomfloor, :description)";
    $arr = [
        ":roomfloor" => $roomfloor,
        ":description" => $description,
    ];
    $path = "roomfloor.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $roomfloor = $_POST['roomfloor'];
    $description = $_POST['description'];

    $query = "UPDATE hmsroomfloor SET roomfloor=:roomfloor, description=:description WHERE id='$id'";
    $arr = [
        ":roomfloor" => $roomfloor,
        ":description" => $description,
    ];
    $path = "roomfloor.php?edit=$id";
    $app->register($query, $arr, $path);
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
                    <h1 class="h5 mb-3"><b>Floor </h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmsroomfloor where id='$id'";
                            $app = new App;
                            $roomfloor1s = $app->selectAll($query); ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="roomfloor.php">
                                <?php foreach ($roomfloor1s as $roomfloor1): ?>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Floor</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $roomfloor1->id ?>">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="roomfloor" value="<?php echo $roomfloor1->roomfloor ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="description" value="<?php echo $roomfloor1->description ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    <a href="roomfloor.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>
                                <?php endforeach; ?>
                            </form>
                        </div>
                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="roomfloor.php">
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Floor</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="roomfloor">
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
                                <h4 class="mb-3 text-primary">List of Floor --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmsroomfloor";
                                $app = new App;
                                $roomfloors = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Floor </th>
                                            <th>Desciptions</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($roomfloors as $roomfloor): ?>

                                        <tr>
                                            <td><?php echo $roomfloor->id ?></td>


                                            <td><?php echo $roomfloor->roomfloor ?></td>
                                            <td><?php echo $roomfloor->description ?></td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="roomfloor.php?edit=<?php echo $roomfloor->id ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="roomfloor.php?delete=<?php echo $roomfloor->id ?>"
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
                                            "pageLength": 10,
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
<?php require "../../../footer1.php"; ?>