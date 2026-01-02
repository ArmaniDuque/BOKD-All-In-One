<?php require "../../../headerscrolldatatables.php"; ?>
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
                                    <th>Action</th>
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
                                    <th>Members ID</th>
                                    <th>Senior ID</th>
                                    <th>PWD ID</th>
                                    <th>Address</th>


                                </tr>
                            </thead>

                            <script type="text/javascript">
                            $(document).ready(function() {
                                $('#profile').DataTable({
                                    serverSide: true,
                                    deferRender: true,
                                    ajax: 'get_customerinfo.php',
                                    columns: [{
                                            data: null,
                                            render: function(data, type, row) {
                                                return '<a style="text-decoration:none;" href="update-profile.php?edit=' +
                                                    row.customerid +
                                                    '" class="text-success">&nbsp;&nbsp;<i class="nav-icon fas fa fa-edit"></i></a>';
                                            }
                                        },
                                        {
                                            data: 'ismember', // Add column for ismember
                                            render: function(data, type, row) {
                                                if (data >= 1) {
                                                    return '<span class="badge bg-primary">Member</span>';
                                                } else {
                                                    return '<span class="badge bg-success">Guest</span>';
                                                }
                                            }
                                        },
                                        {
                                            data: 'customerid'
                                        },
                                        {
                                            data: 'firstname'
                                        },
                                        {
                                            data: 'middlename'
                                        },
                                        {
                                            data: 'lastname'
                                        },
                                        {
                                            data: 'email1'
                                        }, {
                                            data: 'number1'
                                        },
                                        // {
                                        //     data: null, // Use null to indicate that this column is custom rendered
                                        //     render: function(data, type, row) {
                                        //         return row.email1 + (row.email2 ? '<br>' + row
                                        //             .email2 : ''
                                        //         ); // Display email1 and email2 with a line break if email2 exists
                                        //     }
                                        // },
                                        // {
                                        //     data: // Use null to indicate that this column is custom rendered
                                        //         render: function(data, type, row) {
                                        //             return row.number1 + (row.number2 ? '<br>' + row
                                        //                 .number2 : ''
                                        //             ); // Display email1 and email2 with a line break if email2 exists
                                        //         }
                                        // },
                                        {
                                            data: 'nationality'
                                        },
                                        {
                                            data: 'province'
                                        },
                                        {
                                            data: 'tittle'
                                        },
                                        {
                                            data: 'gender'
                                        },
                                        {
                                            data: 'membersid'
                                        },
                                        {
                                            data: 'seniorid'
                                        },
                                        {
                                            data: 'pwdid'
                                        },
                                        {
                                            data: 'address'
                                        }


                                    ],
                                    "pageLength": 10,
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
                <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>