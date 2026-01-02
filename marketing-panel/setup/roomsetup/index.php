<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>

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
                    <h1 class="h5 mb-3"><b>Room Information </h1>
                </div>

                <div class="col-md-12 mb-3 ">

                    <div class="col-md-12 ">



                        <table c lass="table table-striped " style="width:100%" id="history">
                            <thead>
                                <tr>
                                    <th>Type of Room</th>


                                    <?php
                                    $query = "SELECT * FROM hmsroomlocation";
                                    $app = new App;
                                    $roomlocations = $app->selectAll($query);
                                    ?>
                                    <?php foreach ($roomlocations as $roomlocation): ?>

                                    <th>
                                        <?php echo $roomlocation->roomlocation ?>
                                    </th>
                                    <?php endforeach; ?>



                                    <th>Total Of Room</th>
                                    <th>Room Number</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM hmsroomtypes ";
                                $app = new App;
                                $roomtypess = $app->selectAll($query);
                                ?>
                                <?php foreach ($roomtypess as $roomtypes): ?>


                                <tr <?php
                                    $color = $roomtypes->color;
                                    echo "style=\"background-color: $color;\">";
                                    ?>>
                                    <td><?php echo $roomtypes->roomtypes ?></td>
                                    <?php
                                        $query = "SELECT * FROM hmsroomlocation";
                                        $app = new App;
                                        $roomlocations = $app->selectAll($query);
                                        ?>
                                    <?php foreach ($roomlocations as $roomlocation): ?>

                                    <td>

                                        <?php

                                                $query = "SELECT COUNT(*) AS count_room FROM hmsroomsetup WHERE roomlocationid='$roomlocation->id' AND roomtypeid='$roomtypes->id'";
                                                $app = new App;
                                                $count_room = $app->selectOne($query);
                                                echo $count_room->count_room;
                                                ?>

                                    </td>
                                    <?php endforeach; ?>

                                    <td>
                                        <?php

                                            $query = "SELECT COUNT(*) AS count_roomtype FROM hmsroomsetup WHERE roomtypeid='$roomtypes->id'";
                                            $app = new App;
                                            $count_roomtype = $app->selectOne($query);
                                            echo $count_roomtype->count_roomtype;
                                            ?>


                                    </td>
                                    <td>
                                        <?php
                                            $query = "SELECT * FROM hmsroomsetup WHERE roomtypeid='$roomtypes->id'";
                                            $app = new App;
                                            $roomsetups = $app->selectAll($query);



                                            ?>
                                        <?php foreach ($roomsetups as $roomsetup): ?>
                                        <?php echo $roomsetup->roomnumber; ?>
                                        <?php echo " / "; ?>
                                        <?php endforeach; ?>



                                    </td>


                                </tr>


                                <?php endforeach; ?>


                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <?php
                                    $query = "SELECT * FROM hmsroomlocation ";
                                    $app = new App;
                                    $roomlocation1s = $app->selectAll($query);
                                    ?>
                                    <?php foreach ($roomlocation1s as $roomlocation1): ?>

                                    <td>
                                        <?php
                                            $query = "SELECT COUNT(*) AS count_allroomtype FROM hmsroomsetup WHERE roomlocationid='$roomlocation1->id'";
                                            $app = new App;
                                            $count_allroomtype = $app->selectOne($query);
                                            echo $count_allroomtype->count_allroomtype;
                                            ?>
                                    </td>




                                    <?php endforeach; ?>
                                    <td>
                                        <?php
                                        $query = "SELECT COUNT(*) AS count_allroomtype1 FROM hmsroomsetup ";
                                        $app = new App;
                                        $count_allroomtype1 = $app->selectOne($query);
                                        echo $count_allroomtype1->count_allroomtype1;
                                        ?>
                                    </td>

                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>
                            </tfoot>
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>