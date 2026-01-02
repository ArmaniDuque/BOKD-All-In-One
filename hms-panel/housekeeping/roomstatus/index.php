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

                <?php require "../navbar.php"; ?>
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
                    <h1 class="h5 mb-3"><b>OOO / OOS List</h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3 ">

                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                        From Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                            placeholder="">
                                    </div>



                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                        Through Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                            placeholder="">
                                    </div>



                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Details</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="roomlocationid">
                                            <?php
                                            $query = "SELECT * FROM roomsetup";
                                            $app = new App;
                                            $roomsetups = $app->selectAll($query);
                                            ?>
                                            <?php foreach ($roomsetups as $roomsetup): ?>
                                                <option value="<?php echo $roomsetup->id ?>">
                                                    <?php echo $roomsetup->roomnumber ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="roomlocationid">
                                            <option value="">OOO</option>
                                            <option value="">OOS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Return
                                        Status</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="roomlocationid">
                                            <option value="">Dirty</option>
                                            <option value="">Clean</option>
                                            <option value="">Inspected</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Reason</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="roomlocationid">
                                            <option value="">Preventive Maintenance</option>
                                            <option value="">Renovation</option>
                                            <option value="">Repair</option>
                                            <option value="">Leak/Seapage</option>
                                            <option value="">Revarnish</option>
                                            <option value="">Spring/Cleaning</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                        Remarks</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control form-control-sm" id="colFormLabelSm"
                                            name="remarks" placeholder=""></textarea>

                                    </div>
                                </div>
                            </div>

                            <div class="pb-5 pt-3">
                                <button class="btn btn-primary" type="submit" name="submit">Apply / Update</button>
                                <a href="#" class="btn btn-outline-dark ml-3">Room Cleared</a>

                            </div>

                            <table class="table table-striped " style="width:100%;">

                                <thead>
                                    <tr>
                                        <th>Housekeeping Information</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Total OOO:</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>Total OOS:</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>Total Dirty:</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>Total Clean:</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>Total Inspected:</td>
                                        <td>30</td>
                                    </tr>
                                </tbody>


                            </table>

                        </div>
                        <div class="col-md-9 mb-3 ">

                            <div class="col-md-12 ">
                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM roomsetup ";
                                $app = new App;
                                $roomsetups = $app->selectAll($query);



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

                                <table class="table table-striped " style="width:100%;" id="history">

                                    <thead>
                                        <tr>


                                            <th>Room No.</th>
                                            <th>Room Type</th>
                                            <th>Status</th>

                                            <th>From Date</th>
                                            <th>Through Date</th>
                                            <th>Return As</th>
                                            <th>Reason </th>
                                            <th>Remarks</th>
                                            <th>Action</th>




                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($roomsetups as $roomsetup): ?>

                                            <tr>
                                                <!-- <td><?php // echo $roomsetup->roomsetupid ?></td> -->
                                                <td>

                                                    <input type="checkbox" name="roomid" id="roomid"
                                                        value="<?php echo $roomsetup->id ?>">
                                                    <?php echo $roomsetup->roomnumber ?>
                                                </td>
                                                <td>EXEC</td>
                                                <td>000</td>

                                                <td>01/02/2025</td>
                                                <td>01/02/2025</td>
                                                <td>Dirty</td>
                                                <td>Preventive Maintenance</td>
                                                <td>Remarks</td>
                                                <td>
                                                    <a style="text-decoration:none;"
                                                        href="update-roomsetup.php?edit=<?php //echo $user->userid ?>"
                                                        class="text-success">&nbsp;&nbsp;
                                                        <i class="nav-icon fas fa fa-edit"></i>Update

                                                    </a>

                                                </td>
                                            </tr>


                                        <?php endforeach; ?>
                                    </tbody>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('#history').DataTable({
                                                columnDefs: [{
                                                    width: '20%',
                                                    targets: 0
                                                }],
                                                fixedColumns: true,
                                                paging: false,
                                                scrollCollapse: true,
                                                scrollX: true,
                                                scrollY: 500,
                                                autoWidth: true,
                                                scrollX: true,
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


                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#newroomsetup').DataTable({
                                "pageLength": 5,
                                // dom: 'Bfrtip',
                                // buttons: [
                                //     'copy', 'csv', 'excel', 'pdf', 'print'
                                // ]


                            });



                        });


                        $('#newroomsetup [data-toggle="tooltip"]').tooltip({
                            animated: 'fade',
                            placement: 'bottom',
                            html: true
                        });
                    </script>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>