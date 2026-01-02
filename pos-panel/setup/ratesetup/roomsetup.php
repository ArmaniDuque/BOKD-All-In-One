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
                    <h1 class="h5 mb-3"><b>Room Setup </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->


                        <div class="col-md-4 mb-3 ">
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Room
                                        Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Room
                                        Types</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Room
                                        Location</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bed
                                        Types</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Room
                                        Status</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>





                        </div>
                        <div class="col-md-8 mb-3 ">

                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">List of Room Setup --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmsreservation where status!='history' and departuredate >='$currentdate'";
                                $app = new App;
                                $reservations = $app->selectAll($query);



                                ?>



                                <table c lass="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>Room No.</th>
                                            <th>Room Types</th>
                                            <th>Room Location</th>
                                            <th>Bed Types</th>
                                            <th>Room Status</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($reservations as $reservation): ?>

                                        <tr>
                                            <td><?php echo $reservation->reservationid ?></td>


                                            <td><?php echo $reservation->status ?></td>
                                            <td><?php echo $reservation->status ?></td>

                                            <td><?php echo $reservation->user ?></td>
                                            <td><?php echo $reservation->user ?></td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="update-reservation.php?edit=<?php //echo $user->userid ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="delete-reservation.php?edit=<?php //echo $user->userid ?>"
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
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" type="submit" name="submit">Add</button>
                <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a>

            </div>


        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>