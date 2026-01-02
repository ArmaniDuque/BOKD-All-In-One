<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>


<?php
// if (isset($_POST['submit'])) {

//     $id = $_POST['id'];
//     $roomnumber = $_POST['roomnumber'];
//     $roomtypeid = $_POST['roomtypeid'];
//     $roomlocationid = $_POST['roomlocationid'];
//     $bedtypeid = $_POST['bedtypeid'];
//     $roomstatusid = $_POST['roomstatusid'];
//     $query = "UPDATE hmsroomsetup SET  roomnumber=:roomnumber, roomtypeid=:roomtypeid, roomlocationid=:roomlocationid
//     , bedtypeid=:bedtypeid, roomstatusid=:roomstatusid WHERE id='$id'";
//     $arr = [
//         ":roomnumber" => $roomnumber,
//         ":roomtypeid" => $roomtypeid,
//         ":roomlocationid" => $roomlocationid,
//         ":bedtypeid" => $bedtypeid,
//         ":roomstatusid" => $roomstatusid,

//     ];

//     $path = "../users/update-usersinfo.php?edit=$id";
//     $app->update($query, $arr, $path);
// }
?>
<?php


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // $query = "SELECT * FROM datainventory where datainventoryid='$id'";
    $query = "DELETE FROM hmsroomsetup where id='$id'";
    $app = new App;
    $path = "roomsetup.php";
    $app->delete($query, $path);

}
?>

<?php
if (isset($_POST['submit'])) {

    $roomnumber = $_POST['roomnumber'];
    $roomtypeid = $_POST['roomtypeid'];
    $roomlocationid = $_POST['roomlocationid'];
    $bedtypeid = $_POST['bedtypeid'];
    $roomstatusid = $_POST['roomstatusid'];
    $query = "INSERT INTO hmsroomsetup (roomnumber, roomtypeid, roomlocationid, bedtypeid, roomstatusid)
VALUES(:roomnumber, :roomtypeid, :roomlocationid, :bedtypeid, :roomstatusid)";
    $arr = [
        ":roomnumber" => $roomnumber,
        ":roomtypeid" => $roomtypeid,
        ":roomlocationid" => $roomlocationid,
        ":bedtypeid" => $bedtypeid,
        ":roomstatusid" => $roomstatusid,
    ];
    $path = "roomsetup.php";
    $app->register($query, $arr, $path);
} ?>
<?php
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $roomnumber = $_POST['roomnumber'];
    $roomtypeid = $_POST['roomtypeid'];
    $roomlocationid = $_POST['roomlocationid'];
    $bedtypeid = $_POST['bedtypeid'];
    $roomstatusid = $_POST['roomstatusid'];
    //     $query = "INSERT INTO hmsroomsetup (roomnumber, roomtypeid, roomlocationid, bedtypeid, roomstatusid)
// VALUES(:roomnumber, :roomtypeid, :roomlocationid, :bedtypeid, :roomstatusid)";
    $query = "UPDATE hmsroomsetup SET roomnumber=:roomnumber, roomtypeid=:roomtypeid, roomlocationid=:roomlocationid, bedtypeid=:bedtypeid, roomstatusid=:roomstatusid WHERE id='$id'";
    $arr = [
        ":roomnumber" => $roomnumber,
        ":roomtypeid" => $roomtypeid,
        ":roomlocationid" => $roomlocationid,
        ":bedtypeid" => $bedtypeid,
        ":roomstatusid" => $roomstatusid,
    ];
    $path = "roomsetup.php?edit=$id";
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
                    <h1 class="h5 mb-3"><b>Room Setup </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmsroomsetup where id='$id'";
                            $app = new App;
                            $roomsetup1s = $app->selectAll($query); ?>

                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="roomsetup.php">
                                <?php foreach ($roomsetup1s as $roomsetup1): ?>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Number</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $roomsetup1->id ?>">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="roomnumber" value="<?php echo $roomsetup1->roomnumber ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Types</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="roomtypeid">


                                                <?php
                                                        $query = "SELECT * FROM hmsroomtypes where id='$roomsetup1->roomtypeid'";
                                                        $app = new App;
                                                        $roomtypes1 = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roomtypes1 as $roomtype1): ?>
                                                <option style="color:<?php echo $roomtype1->color ?>;"
                                                    value=" <?php echo $roomtype1->id ?>">

                                                    <?php
                                                                echo "<b>";
                                                                echo $roomtype1->roomtypes;
                                                                echo "</b>";
                                                                ?>
                                                </option>
                                                <?php endforeach; ?>




                                                <?php
                                                        $query = "SELECT * FROM hmsroomtypes";
                                                        $app = new App;
                                                        $roomtypes = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roomtypes as $roomtype): ?>
                                                <option style="color:<?php echo $roomtype->color ?>;"
                                                    value=" <?php echo $roomtype->id ?>">

                                                    <?php
                                                                echo "<b>";
                                                                echo $roomtype->roomtypes;
                                                                echo "</b>";
                                                                ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>



                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Location</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="roomlocationid">
                                                <?php
                                                        $query = "SELECT * FROM hmsroomlocation  where id='$roomsetup1->roomlocationid'";
                                                        $app = new App;
                                                        $roomlocations1 = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roomlocations1 as $roomlocation1): ?>
                                                <option value="<?php echo $roomlocation1->id ?>">
                                                    <?php echo $roomlocation1->roomlocation ?>
                                                </option>
                                                <?php endforeach; ?>


                                                <?php
                                                        $query = "SELECT * FROM hmsroomlocation";
                                                        $app = new App;
                                                        $roomlocations = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roomlocations as $roomlocation): ?>
                                                <option value="<?php echo $roomlocation->id ?>">
                                                    <?php echo $roomlocation->roomlocation ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Floor</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="roomfloorid">
                                                <?php
                                                        $query = "SELECT * FROM hmsroomfloor where id='$roomsetup1->roomfloorid'";
                                                        $app = new App;
                                                        $roomfloors1 = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roomfloors1 as $roomsetup1): ?>
                                                <option value="<?php echo $roomsetup1->id ?>">
                                                    <?php echo $roomsetup1->roomfloor ?>
                                                </option>
                                                <?php endforeach; ?>


                                                <?php
                                                        $query = "SELECT * FROM hmsroomfloor";
                                                        $app = new App;
                                                        $roomfloors = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roomfloors as $roomfloor): ?>
                                                <option value="<?php echo $roomfloor->id ?>">
                                                    <?php echo $roomfloor->roomfloor ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Bed
                                            Types</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="bedtypeid">
                                                <?php
                                                        $query = "SELECT * FROM hmsroombedtypes where id='$roomsetup1->bedtypeid'";
                                                        $app = new App;
                                                        $roombedtypes1 = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roombedtypes1 as $roombedtype1): ?>
                                                <option value="<?php echo $roombedtype1->id ?>">
                                                    <?php echo $roombedtype1->roombedtypes ?>
                                                </option>
                                                <?php endforeach; ?>



                                                <?php
                                                        $query = "SELECT * FROM hmsroombedtypes";
                                                        $app = new App;
                                                        $roombedtypes = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roombedtypes as $roombedtype): ?>
                                                <option value="<?php echo $roombedtype->id ?>">
                                                    <?php echo $roombedtype->roombedtypes ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Status</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="roomstatusid">

                                                <?php
                                                        $query = "SELECT * FROM hmsroomstatus where id='$roomsetup1->roomstatusid'";
                                                        $app = new App;
                                                        $roomstatus1 = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roomstatus1 as $roomstat1): ?>
                                                <option value="<?php echo $roomstat1->id ?>">
                                                    <?php echo $roomstat1->roomstatus ?>
                                                </option>
                                                <?php endforeach; ?>



                                                <?php
                                                        $query = "SELECT * FROM hmsroomstatus";
                                                        $app = new App;
                                                        $roomstatus = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roomstatus as $roomstat): ?>
                                                <option value="<?php echo $roomstat->id ?>">
                                                    <?php echo $roomstat->roomstatus ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    <a href="roomsetup.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>
                                <?php endforeach; ?>
                            </form>
                        </div>

                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="roomsetup.php">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="roomnumber" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Types</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="roomtypeid">
                                                <?php
                                                    $query = "SELECT * FROM hmsroomtypes";
                                                    $app = new App;
                                                    $roomtypes = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($roomtypes as $roomtype): ?>
                                                <option style="color:<?php echo $roomtype->color ?>;"
                                                    value=" <?php echo $roomtype->id ?>">

                                                    <?php
                                                            echo "<b>";
                                                            echo $roomtype->roomtypes;
                                                            echo "</b>";

                                                            ?>

                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Location</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="roomlocationid">
                                                <?php
                                                    $query = "SELECT * FROM hmsroomlocation";
                                                    $app = new App;
                                                    $roomlocations = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($roomlocations as $roomlocation): ?>
                                                <option value="<?php echo $roomlocation->id ?>">
                                                    <?php echo $roomlocation->roomlocation ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Floor</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="roomlocationid">
                                                <?php
                                                    $query = "SELECT * FROM hmsroomfloor";
                                                    $app = new App;
                                                    $roomfloors = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($roomfloors as $roomfloor): ?>
                                                <option value="<?php echo $roomfloor->id ?>">
                                                    <?php echo $roomfloor->roomfloor ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Bed
                                            Types</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="bedtypeid">
                                                <?php
                                                    $query = "SELECT * FROM hmsroombedtypes";
                                                    $app = new App;
                                                    $roombedtypes = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($roombedtypes as $roombedtype): ?>
                                                <option value="<?php echo $roombedtype->id ?>">
                                                    <?php echo $roombedtype->roombedtypes ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Status</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="roomstatusid">
                                                <?php
                                                    $query = "SELECT * FROM hmsroomstatus";
                                                    $app = new App;
                                                    $roomstatus = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($roomstatus as $roomstat): ?>
                                                <option value="<?php echo $roomstat->id ?>">
                                                    <?php echo $roomstat->roomstatus ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
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
                                <h4 class="mb-3 text-primary">List of Room Setup --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmsroomsetup";
                                $app = new App;
                                $roomsetups = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>Room No.</th>
                                            <th>Room Types</th>
                                            <th>Room Location</th>
                                            <th>Floor</th>
                                            <th>Bed Types</th>
                                            <th>Room Status</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($roomsetups as $roomsetup): ?>

                                        <tr>
                                            <!-- <td><?php echo $roomsetup->id ?></td> -->


                                            <td><?php echo $roomsetup->roomnumber ?></td>
                                            <td>
                                                <?php
                                                    $query = "SELECT * FROM hmsroomtypes where id='$roomsetup->roomtypeid'";
                                                    $app = new App;
                                                    $roomtypes = $app->selectAll($query);
                                                    foreach ($roomtypes as $roomtype) {
                                                        $color = $roomtype->color;
                                                        echo "<span style=\"color: $color;\">";
                                                        echo $roomtype->roomtypes;

                                                        echo "</span>";
                                                        //  style="backgroung-color:<?php echo $roomsetup->color 
                                                
                                                    }
                                                    ?>


                                            </td>

                                            <td>
                                                <?php
                                                    $query = "SELECT * FROM hmsroomlocation where id='$roomsetup->roomlocationid'";
                                                    $app = new App;
                                                    $roomlocation = $app->selectAll($query);
                                                    foreach ($roomlocation as $roomloc) {
                                                        echo $roomloc->description;
                                                    }
                                                    ?>

                                            </td>
                                            <td>
                                                <?php
                                                    $query = "SELECT * FROM hmsroomfloor where id='$roomsetup->roomfloorid'";
                                                    $app = new App;
                                                    $roomfloors = $app->selectAll($query);
                                                    foreach ($roomfloors as $roomfloor) {
                                                        echo $roomfloor->description;
                                                    }
                                                    ?>

                                            </td>
                                            <td>
                                                <?php
                                                    $query = "SELECT * FROM hmsroombedtypes where id='$roomsetup->bedtypeid'";
                                                    $app = new App;
                                                    $roombedtypes = $app->selectAll($query);
                                                    foreach ($roombedtypes as $roombedtype) {
                                                        echo $roombedtype->roombedtypes;
                                                    }
                                                    ?>
                                            </td>
                                            <td><?php //echo $roomsetup->roomstatusid ?>
                                                <?php
                                                    $query = "SELECT * FROM hmsroomstatus where id='$roomsetup->roomstatusid'";
                                                    $app = new App;
                                                    $status = $app->selectAll($query);
                                                    foreach ($status as $stat) {
                                                        echo $stat->roomstatus;
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="roomsetup.php?edit=<?php echo $roomsetup->id ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="roomsetup.php?delete=<?php echo $roomsetup->id ?>"
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
                                            "pageLength": 50,
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
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>