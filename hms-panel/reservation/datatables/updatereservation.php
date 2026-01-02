<?php require "../../../header.php"; ?>
<?php require "../../../sidebar.php"; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Update Reservation Module</h1>
                </div> -->
                <!-- <div class="col-sm-6 text-right">
                    <a href="orders.php" class="btn btn-primary">Back</a>
                </div> -->
                <?php require "../resevationnavbar.php"; ?>

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
                    <h1 class="h5 mb-3"><b>Update Reservation1</h1>
                </div>
                <!-- /.BODY -->
                <div class="card-body">
                    <div class="row">

                        <?php
                        $currentdate = date("m-d-Y");
                        $query = "SELECT * FROM reservation where status!='history' and departuredate >='$currentdate'";
                        $app = new App;
                        $reservations = $app->selectAll($query);



                        ?>



                        <table class="table table-striped " style="width:100%" id="history">

                            <thead>
                                <tr>

                                    <th>Res No</th>
                                    <th>Customer ID</th>
                                    <th>Arrival</th>
                                    <th>Departure</th>
                                    <th>Room</th>
                                    <th>Room Type</th>

                                    <th>Status</th>
                                    <th>User</th>


                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservations as $reservation): ?>

                                <tr>
                                    <td><?php echo $reservation->reservationid ?></td>
                                    <td>

                                        <?php $reservation->customerid;

                                            $query = "SELECT * FROM t_customerinfo where customerid='$reservation->customerid'";
                                            $app = new App;
                                            $names = $app->selectAll($query);
                                            foreach ($names as $name) {
                                                echo "$name->firstname $name->lastname";
                                            }

                                            ?>


                                    </td>
                                    <td><?php echo $reservation->arrivaldate ?></td>
                                    <td><?php echo $reservation->departuredate ?></td>
                                    <td><?php echo $reservation->roomno ?></td>
                                    <td><?php echo $reservation->roomtype ?></td>
                                    <td><?php echo $reservation->status ?></td>
                                    <td><?php echo $reservation->user ?></td>




                                    <td>
                                        <?php
                                            if ($reservation->departuredate == $currentdate) {

                                                echo '<span class="badge bg-danger "> Due Out</span>';

                                            } elseif ($reservation->status == "reserve") {
                                                echo ' <span class="badge bg-primary ">Arrival</span>';
                                            } else {
                                                echo ' <span class="badge bg-success ">Inhouse</span>';
                                            }

                                            ?>
                                    </td>












                                    <td>
                                        <a style="text-decoration:none;"
                                            href="update-reservation.php?edit=<?php //echo $user->userid ?>"
                                            class="text-success">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-edit"></i>Update

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


                    <script type="text/javascript">
                    $(document).ready(function() {
                        $('#newreservation').DataTable({
                            "pageLength": 5,
                            // dom: 'Bfrtip',
                            // buttons: [
                            //     'copy', 'csv', 'excel', 'pdf', 'print'
                            // ]


                        });



                    });


                    $('#newreservation [data-toggle="tooltip"]').tooltip({
                        animated: 'fade',
                        placement: 'bottom',
                        html: true
                    });
                    </script>

                </div>






            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>