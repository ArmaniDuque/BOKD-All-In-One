<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Profile Module</h1>
                </div> -->
                <!-- <div class="col-sm-6 text-right">
                    <a href="orders.php" class="btn btn-primary">Back</a>
                </div> -->
                <?php require "../navbar.php"; ?>
                <?php require "navbar.php"; ?>

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
                    <h1 class="h5 mb-3"><b>Guest List Profile </h1>
                </div>
                <div class="col-md-12">
                    <?php
                    $query = "SELECT * FROM hmst_customerinfo";
                    $app = new App;
                    $profiles = $app->selectAll($query);
                    ?>
                    <div class="card-body ">
                        <div class="col-sm-6 text-right">
                            <a href="create-profile.php" class="btn btn-primary">Add New Profile</a>
                        </div>
                        <table class="table table-striped " style="width:100%" id="profile">

                            <thead>
                                <tr>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($profiles as $profile): ?>

                                    <tr>

                                        <td>
                                            <?php
                                            if ($profile->ismember >= '1') {

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
                                        echo '</br>';
                                        echo $profile->email2; ?></td>
                                        <td><?php echo $profile->number1;
                                        echo '</br>';
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
                                        <td>
                                            <a style="text-decoration:none;"
                                                href="update-profile.php?edit=<?php echo $profile->customerid ?>"
                                                class="text-success">&nbsp;&nbsp;
                                                <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;

                                            </a>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#profile').DataTable({
                                        "pageLength": 25,
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'copy', 'csv', 'excel', 'pdf', 'print'
                                        ]
                                    });
                                });
                                $('#profile [data-toggle="tooltip"]').tooltip({
                                    animated: 'fade',
                                    placement: 'bottom',
                                    html: true
                                });
                            </script>
                        </table>
                    </div>

                    <div class="card-body ">
                        <div class="col-sm-6 text-right">
                            <h3>Future/History</h3>
                        </div>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['edit'])) {
                                    $id = $_GET['edit'];
                                    // $query = "SELECT * FROM datainventory where datainventoryid='$id'";
                                    // $query = "SELECT * FROM usermasterfile where userid='$id'";
                                    $query = "SELECT * FROM hmsreservation where customerid='$id'";
                                    $app = new App;
                                    $reservations = $app->selectAll($query);
                                    ?>
                                    <?php foreach ($reservations as $reservation): ?>
                                        <tr>
                                            <td><?php echo $reservation->reservationid ?></td>
                                            <td>
                                                <?php $reservation->customerid;
                                                $query = "SELECT * FROM hmst_customerinfo where customerid='$reservation->customerid'";
                                                $app = new App;
                                                $names = $app->selectAll($query);
                                                foreach ($names as $name) {
                                                    echo "$name->cit_FName $name->cit_LName";
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
                                                <a style="text-decoration:none;"
                                                    href="update-usersinfo.php?edit=<?php //echo $user->userid ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;
                                                </a>|
                                                <a style="text-decoration:none;"
                                                    href="userslist.php?delete=<?php //echo $user->userid ?>"
                                                    class="text-danger">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-trash"></i>&nbsp;&nbsp;

                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </tbody>

                            <script type="text/javascript">
                                $(document).ready(function () {
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
                <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>