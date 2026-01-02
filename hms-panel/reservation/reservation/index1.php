<?php require "../../../header.php"; ?>
<?php require "../../../sidebar.php"; ?>


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
        <form>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>New Reservation</h1>
                    </div>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <!-- /.Personal Details -->



                            <div class="col-md-4 mb-3 ">
                                <h4 class="mb-3 text-primary">Reservation Information --------------------------</h4>
                                <div class="col-md-12 mb-3">




                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Last
                                            Name</label>
                                        <div class="col-sm-7">
                                            <input type="hidden" class="form-control form-control-sm" value="<?php if (isset($_GET['select'])) {
                                                echo $select = $_GET['select'];
                                            } ?>" id="colFormLabelSm">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                value=" <?php if (isset($_GET['select'])) {
                                                    $select = $_GET['select'];
                                                    $query = "SELECT * FROM hmst_customerinfo where customerid=$select";
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
                                                placeholder="">
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Nights</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Departure</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                placeholder="">
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Adults</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">No.
                                            Of Rooms</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                placeholder="">
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Child</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                placeholder="">
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
                            <div class="col-md-8 mb-3 ">

                                <div class="col-md-12 ">
                                    <h4 class="mb-3 text-primary">Availability Information
                                        --------------------------
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
                                                <th>Select</th>
                                                <th>Type of Guest</th>
                                                <th>ID</th>

                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>

                                                <th>Contact Number</th>
                                                <th>Natinality</th>
                                                <th>Province</th>
                                                <th>Salutation</th>
                                                <th>Gender</th>
                                                <th>Senior ID</th>
                                                <th>PWD ID</th>
                                                <th>Address</th>

                                                <th>nameExt</th>
                                                <th>isChild</th>

                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($profiles as $profile): ?>

                                            <tr>
                                                <td>
                                                    <a style="text-decoration:none;"
                                                        href="index1.php?select=<?php echo $profile->customerid ?>"
                                                        class="text-success">&nbsp;&nbsp;
                                                        <i class="nav-icon fas fa-caret-square-right"> Reserve
                                                        </i>
                                                        <!-- <i class="fa-solid fa-arrow-pointer"></i> -->
                                                    </a>

                                                </td>
                                                <td>
                                                    <?php
                                                        if ($profile->ismember == '1') {

                                                            echo ' <span class="badge bg-primary ">Member</span>';
                                                        } else {
                                                            echo ' <span class="badge bg-success ">Guest</span>';
                                                        }
                                                        ?>
                                                </td>


                                                <td><?php echo $profile->customerid ?></td>





                                                <td><?php echo $profile->firstname ?></td>

                                                <td><?php echo $profile->middlename ?></td>
                                                <td><?php echo $profile->lastname ?></td>
                                                <td><?php echo $profile->email1;
                                                    echo $profile->email2; ?></td>

                                                <td><?php echo $profile->number1;
                                                    echo $profile->number2; ?></td>

                                                <td><?php echo $profile->nationality ?></td>
                                                <td><?php echo $profile->province ?></td>
                                                <td><?php echo $profile->tittle ?></td>
                                                <td><?php echo $profile->gender ?></td>
                                                <td><?php echo $profile->seniorid ?></td>
                                                <td><?php echo $profile->pwdid ?></td>
                                                <td><?php echo $profile->address ?></td>
                                                <td> </td>
                                                <td>0</td>



                                                <!-- <td>
                                            <a style="text-decoration:none;"
                                                href="profile.php?edit=<?php echo $profile->customerid ?>"
                                                class="text-success">&nbsp;&nbsp;
                                                <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;
    
                                            </a>| -->
                                                <!-- <a style="text-decoration:none;" href="userslist.php?delete=<?php //echo $user->userid ?>"
                                    class="text-danger">&nbsp;&nbsp;
                                    <i class="nav-icon fas fa fa-trash"></i>&nbsp;&nbsp;
    
                                </a> -->
                                                <!-- </td> -->





                                            </tr>

                                            <?php endforeach; ?>
                                        </tbody>

                                        <script type="text/javascript">
                                        $(document).ready(function() {
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
                                    <h4 class="mb-3 text-primary">Rate Amount --------------------------</h4>

                                    table
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row align-items-center gx-0">
                                                    <div class="col">

                                                        <!-- Title -->
                                                        <h6 class="text-uppercase text-body-secondary mb-2">
                                                            Running Balance --------------------------
                                                        </h6>

                                                        <!-- Heading -->
                                                        <span class="h2 mb-0">
                                                            $24,500
                                                        </span>


                                                    </div>

                                                </div> <!-- / .row -->
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit" name="submit">Save</button>
                    <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a>

                </div>
                <!-- /.card -->
            </div>

            <!-- /.container-fluid -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>