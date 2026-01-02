<?php require "../../head1.php"; ?>
<?php require "../../sidebar.php"; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1> Reservation Information</h1>
                </div> -->
                <!-- <div class="col-sm-6 text-right">
                    <a href="orders.php" class="btn btn-primary">Back</a>
                </div> -->
                <?php require "../navbar.php"; ?>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="guestreservationinfo2.php" method="post">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>New Reservation123</h1>
                    </div>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <!-- /.Personal Details -->



                            <div class="col-md-4 mb-3 " style="display: none;">
                                <h4 class="mb-3 text-primary">Reservation Information --------------------------</h4>
                                <div class="col-md-12 mb-3">




                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Last
                                            Name</label>
                                        <div class="col-sm-7">
                                            <input type="hidden" class="form-control form-control-sm" name="select"
                                                value="<?php if (isset($_GET['select'])) {
                                                    echo $select = $_GET['select'];
                                                } ?>" id="colFormLabelSm">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                value=" <?php if (isset($_GET['select'])) {
                                                    $select = $_GET['select'];
                                                    $query = "SELECT * FROM t_customerinfo where customerid=$select";
                                                    $app = new App;
                                                    $selctednames = $app->selectAll($query);
                                                    foreach ($selctednames as $selctedname) {
                                                        echo $selctedname->lastname;
                                                    }
                                                } ?>">
                                        </div>
                                        <div class="col-sm-1">
                                            <?php require "lookupmodal.php"; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">First
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                value=" <?php if (isset($_GET['select'])) {
                                                    $select = $_GET['select'];
                                                    $query = "SELECT * FROM hmst_customerinfo where customerid=$select";
                                                    $app = new App;
                                                    $selctednames = $app->selectAll($query);
                                                    foreach ($selctednames as $selctedname) {
                                                        echo $selctedname->firstname;
                                                    }
                                                } ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Arrival</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="checkindate" id="checkindate">
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Nights</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="noofnights" id="noofnights">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Departure</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="checkoutdate" id="checkoutdate">
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Adults</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="adults">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">No.
                                            Of Rooms</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control form-control-sm" id="noofrooms"
                                                name="noofrooms">
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Child</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control form-control-sm" id="kids"
                                                name="kids">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                            Rate Code</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="ratecodeid" id="ratecodeid" required>
                                                <?php

                                                $query = "SELECT * FROM hmsratecode";
                                                $app = new App;
                                                $ratecodes = $app->selectAll($query);
                                                ?>
                                                <?php foreach ($ratecodes as $ratecode): ?>
                                                <option value="<?php echo $ratecode->id ?>">
                                                    <?php echo $ratecode->code ?>
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
                                            Type</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="roomtypeid" id="roomtypeid" required>

                                                <?php


                                                $query = "SELECT * FROM hmsroomtypes";
                                                $app = new App;
                                                $sroomtypes = $app->selectAll($query);
                                                foreach ($sroomtypes as $sroomtype) {
                                                    echo ' <option value=' . $sroomtype->id . '>' . $sroomtype->code . '</option>';
                                                }

                                                ?>
                                            </select>
                                        </div>


                                    </div>
                                </div>




                            </div>
                            <div class="col-md-12 mb-3 ">
                                <div class="col-sm-6 text-right">
                                    <a href="../profile/create-profile.php" class="btn btn-primary">Add New
                                        Profile</a>
                                </div>
                                <div class="col-md-12 ">
                                    <h4 class="mb-3 text-primary">Guest and Member Information

                                    </h4>

                                    <?php
                                    $query = "SELECT * FROM hmst_customerinfo";
                                    $app = new App;
                                    $profiles = $app->selectAll($query);

                                    ?>
                                    <style>
                                    th,
                                    td {
                                        white-space: nowrap;
                                    }

                                    div.dataTables_wrapper {
                                        margin: 0 auto;
                                    }
                                    </style>
                                    <table class="table table-striped " style="width:100%" id="history">

                                        <thead>
                                            <tr>
                                                <th>Actions</th>
                                                <th>Customer ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>

                                            </tr>
                                        </thead>
                                    </table>

                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#history').DataTable({
                                            serverSide: true,
                                            deferRender: true,
                                            ajax: 'get_customerinfo.php',
                                            columns: [{
                                                    data: null,
                                                    render: function(data, type, row) {
                                                        // return '<a style="text-decoration:none;" href="index.php?select=' +
                                                        return '<a style="text-decoration:none;" href="guestreservationinfo2.php?select=' +
                                                            row.customerid +
                                                            '" class="text-success">&nbsp;&nbsp;<i class="nav-icon fas fa-caret-square-right"> Reserve</i></a>';
                                                    }
                                                },
                                                {
                                                    data: 'customerid'
                                                },
                                                {
                                                    data: 'firstname'
                                                },
                                                {
                                                    data: 'lastname'
                                                },
                                                {
                                                    data: 'email1'
                                                }

                                            ],
                                            "pageLength": 10,
                                        });
                                    });


                                    $('#history [data-toggle="tooltip"]').tooltip({
                                        animated: 'fade',
                                        placement: 'bottom',
                                        html: true
                                    });
                                    </script>


                                </div>



                            </div>

                        </div>

                    </div>

                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit" name="submit">Reserve</button>
                    <a href="index.php" class="btn btn-outline-dark ml-3">Clear</a>

                </div>
                <!-- /.card -->
            </div>

            <!-- /.container-fluid -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>