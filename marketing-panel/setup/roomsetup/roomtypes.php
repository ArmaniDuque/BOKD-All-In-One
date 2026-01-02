<?php require "../../../header.php"; ?>
<?php require "../../../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmsroomtypes where id='$id'";
    $app = new App;
    $path = "roomtypes.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $roomtypes = $_POST['roomtypes'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $standardcapacity = $_POST['standardcapacity'];
    $adults = $_POST['adults'];
    $kids = $_POST['kids'];
    $color = $_POST['color'];
    $query = "INSERT INTO hmsroomtypes (roomtypes, description, standardcapacity, adults, kids, color)
VALUES(:roomtypes, :description, :standardcapacity, :adults, :kids, :color)";
    $arr = [
        ":roomtypes" => $roomtypes,
        ":code" => $code,
        ":description" => $description,
        ":standardcapacity" => $standardcapacity,
        ":adults" => $adults,
        ":kids" => $kids,
        ":color" => $color,
    ];
    $path = "roomtypes.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $roomtypes = $_POST['roomtypes'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $standardcapacity = $_POST['standardcapacity'];
    $adults = $_POST['adults'];
    $kids = $_POST['kids'];
    echo $color = $_POST['color'];

    $query = "UPDATE hmsroomtypes SET roomtypes=:roomtypes, code=:code, description=:description, standardcapacity=:standardcapacity, adults=:adults, kids=:kids, color=:color WHERE id='$id'";
    $arr = [
        ":roomtypes" => $roomtypes,
        ":code" => $code,
        ":description" => $description,
        ":standardcapacity" => $standardcapacity,
        ":adults" => $adults,
        ":kids" => $kids,
        ":color" => $color,
    ];
    $path = "roomtypes.php?edit=$id";
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
                    <h1 class="h5 mb-3"><b>Room Types </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->
                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmsroomtypes where id='$id'";
                            $app = new App;
                            $roomtype1s = $app->selectAll($query); ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="roomtypes.php">
                                <?php foreach ($roomtype1s as $roomtype1): ?>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Types</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $roomtype1->id ?>">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="roomtypes" value="<?php echo $roomtype1->roomtypes ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="code" value="<?php echo $roomtype1->code ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="description" value="<?php echo $roomtype1->description ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Standard Capacity</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="standardcapacity"
                                                value="<?php echo $roomtype1->standardcapacity ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">


                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Adult</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="adults"
                                                value="<?php echo $roomtype1->adults ?>">
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Child</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="kids" value="<?php echo $roomtype1->kids ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">


                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Color</label>
                                        <div class="col-sm-8">
                                            <input type="color" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="color" value="<?php echo $roomtype1->color ?>">
                                        </div>


                                    </div>
                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    <a href="roomtypes.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>
                                <?php endforeach; ?>
                            </form>
                        </div>
                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="roomtypes.php">
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Types</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="roomtypes">
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
                                            class="col-sm-3 col-form-label col-form-label-sm">Standard Capacity</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="standardcapacity">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">


                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Adult</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="adults">
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Child</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="kids">
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

                                </div>
                            </form>
                        </div>
                        <?php } ?>
                        <div class="col-md-8 mb-3 ">

                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">List of Room Types --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmsroomtypes";
                                $app = new App;
                                $roomtypes = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Room Types</th>
                                            <th>Desciptions</th>
                                            <th>Standard Capacity</th>
                                            <th>Adults</th>
                                            <th>Kids</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($roomtypes as $roomtype): ?>

                                        <tr>
                                            <td><?php echo $roomtype->id ?></td>
                                            <td><?php

                                                $color = $roomtype->color;
                                                echo "<span style=\"color: $color;\">";
                                                echo $roomtype->code;
                                                echo "</span>";

                                                ?>


                                            </td>


                                            <td><?php

                                                $color = $roomtype->color;
                                                echo "<span style=\"color: $color;\">";

                                                echo $roomtype->roomtypes;
                                                echo "</span>";
                                                ?>
                                            </td>
                                            <td><?php echo $roomtype->description ?></td>
                                            <td><?php echo $roomtype->standardcapacity ?></td>
                                            <td><?php echo $roomtype->adults ?></td>
                                            <td><?php echo $roomtype->kids ?></td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="roomtypes.php?edit=<?php echo $roomtype->id ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="roomtypes.php?delete=<?php echo $roomtype->id ?>"
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