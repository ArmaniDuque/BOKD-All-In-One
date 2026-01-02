<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmsroomstatus where id='$id'";
    $app = new App;
    $path = "roomstatus.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $roomstatus = $_POST['roomstatus'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $color = $_POST['color'];
    $query = "INSERT INTO hmsroomstatus (code, roomstatus, description, color)
VALUES(:code, :roomstatus, :description, :color)";
    $arr = [
        ":code" => $code,
        ":roomstatus" => $roomstatus,
        ":description" => $description,
        ":color" => $color,
    ];
    $path = "roomstatus.php";
    $app->register($query, $arr, $path);
}
?>
<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $roomstatus = $_POST['roomstatus'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $color = $_POST['color'];
    $query = "UPDATE hmsroomstatus SET code=:code, roomstatus=:roomstatus, description=:description, color=:color WHERE id='$id'";
    $arr = [
        ":code" => $code,
        ":roomstatus" => $roomstatus,
        ":description" => $description,
        ":color" => $color,
    ];
    $path = "roomstatus.php?edit=$id";
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
                    <h1 class="h5 mb-3"><b>Room Status </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmsroomstatus where id='$id'";
                            $app = new App;
                            $roomstatus1s = $app->selectAll($query); ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="roomstatus.php">
                                    <?php foreach ($roomstatus1s as $roomstatus1): ?>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Status
                                                    Types</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" class="form-control form-control-sm"
                                                        id="colFormLabelSm" name="id" value="<?php echo $roomstatus1->id ?>">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="roomstatus" value="<?php echo $roomstatus1->roomstatus ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="code" value="<?php echo $roomstatus1->code ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="description" value="<?php echo $roomstatus1->description ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group row">


                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Color</label>
                                                <div class="col-sm-8">
                                                    <input type="color" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="color" value="<?php echo $roomstatus1->color ?>">
                                                </div>


                                            </div>
                                        </div>
                                        <div class="pb-5 pt-3">
                                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                                            <a href="roomstatus.php" class="btn btn-outline-dark ml-3">Close</a>

                                        </div>
                                    <?php endforeach; ?>

                                </form>


                            </div>
                        <?php } else { ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="roomstatus.php">
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Status
                                                Types</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="roomstatus">
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
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group row">


                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Color</label>
                                            <div class="col-sm-8">
                                                <input type="color" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="color">
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
                                <h4 class="mb-3 text-primary">List of Status Types --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmsroomstatus";
                                $app = new App;
                                $roomstatus = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Status Types</th>
                                            <th>Desciptions</th>
                                            <th>Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($roomstatus as $roomstat): ?>

                                            <tr>
                                                <td><?php echo $roomstat->id ?></td>
                                                <td>
                                                    <?php
                                                    $color = $roomstat->color;
                                                    echo "<span style=\"color: $color;\">";
                                                    echo $roomstat->code;
                                                    echo "</span>";
                                                    ?>
                                                </td>


                                                <td>
                                                    <?php
                                                    $color = $roomstat->color;
                                                    echo "<span style=\"color: $color;\">";
                                                    echo $roomstat->roomstatus;
                                                    echo "</span>";
                                                    ?>

                                                </td>
                                                <td>
                                                    <?php
                                                    $color = $roomstat->color;
                                                    echo "<span style=\"color: $color;\">";
                                                    echo $roomstat->description;
                                                    echo "</span>";
                                                    ?>

                                                </td>
                                                <td>
                                                    <?php
                                                    $color = $roomstat->color;
                                                    echo "<span style=\"color: $color;\">";
                                                    echo $roomstat->color;
                                                    echo "</span>";
                                                    ?>

                                                </td>
                                                <td>
                                                    <a style="text-decoration:none;"
                                                        href="roomstatus.php?edit=<?php echo $roomstat->id ?>"
                                                        class="text-success">
                                                        <i class="nav-icon fas fa fa-edit"></i>

                                                    </a> |
                                                    <a style="text-decoration:none;"
                                                        href="roomstatus.php?delete=<?php echo $roomstat->id ?>"
                                                        class="text-danger">
                                                        <i class="nav-icon fas fa fa-trash"></i>

                                                    </a>

                                                </td>
                                            </tr>


                                            <?php endforeach; ?>
                                        </tb ody>
   
                                       <script   type="text/javascript">
                                      $(docume  nt).ready(function() {
                                         $('#hist   ory').DataTable({
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
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" type="submit" name="submit">Add</button>
                <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a>

            </div>


        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>