<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
$query = "SELECT * FROM usermasterfile";
$app = new App;
$users = $app->selectAll($query);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ordering Module</h1>
                </div>
                <!-- <div class="col-sm-6 text-right">
                    <a href="orders.php" class="btn btn-primary">Back</a>
                </div> -->
                <?php require "navbar.php"; ?>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="custom-content-below-1-tab" data-toggle="pill"
                                        href="#custom-content-below-1" role="tab" aria-controls="custom-content-below-1"
                                        aria-selected="false">New Reservation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-2-tab" data-toggle="pill"
                                        href="#custom-content-below-2" role="tab" aria-controls="custom-content-below-2"
                                        aria-selected="false">Update Reservation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-3-tab" data-toggle="pill"
                                        href="#custom-content-below-3" role="tab" aria-controls="custom-content-below-3"
                                        aria-selected="false">Waiting List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="custom-content-below-4-tab" data-toggle="pill"
                                        href="#custom-content-below-4" role="tab" aria-controls="custom-content-below-4"
                                        aria-selected="true">Block</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-5-tab" data-toggle="pill"
                                        href="#custom-content-below-5" role="tab" aria-controls="custom-content-below-5"
                                        aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-6-tab" data-toggle="pill"
                                        href="#custom-content-below-6" role="tab" aria-controls="custom-content-below-6"
                                        aria-selected="true">Room Plan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-7-tab" data-toggle="pill"
                                        href="#custom-content-below-7" role="tab" aria-controls="custom-content-below-7"
                                        aria-selected="true">Floor Plan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-8-tab" data-toggle="pill"
                                        href="#custom-content-below-8" role="tab" aria-controls="custom-content-below-8"
                                        aria-selected="true">Confirmation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-9-tab" data-toggle="pill"
                                        href="#custom-content-below-9" role="tab" aria-controls="custom-content-below-9"
                                        aria-selected="true">Registration Card</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-10-tab" data-toggle="pill"
                                        href="#custom-content-below-10" role="tab"
                                        aria-controls="custom-content-below-10" aria-selected="true">Calendar</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="custom-content-below-tabContent">
                                <div class="tab-pane fade active show" id="custom-content-below-1" role="tabpanel"
                                    aria-labelledby="custom-content-below-1-tab">

                                    <div class="card-body ">
                                        <div class="col-sm-6 text-right">
                                            <a href="create-users.php" class="btn btn-primary">Add New Profile</a>
                                        </div>
                                        <table class="table table-striped " style="width:100%" id="example">

                                            <thead>
                                                <tr>
                                                    <!-- <th>No.</th> -->
                                                    <th>ID No.</th>
                                                    <th>Full Name</th>
                                                    <th>Position</th>
                                                    <th>Department</th>
                                                    <th>Job Level</th>
                                                    <th>Emplotment Status</th>
                                                    <!-- <th>Area of Assignment</th> -->
                                                    <!-- <th>Dated Hired</th> -->
                                                    <!-- <th>Contact</th>
                                <th>Email</th> -->
                                                    <!-- <th>Birth Date</th>
                                <th>Age</th>
                                <th>Gender</th> -->
                                                    <!-- <th>Civil Status</th> -->
                                                    <th>Username</th>
                                                    <!-- <th>Password</th> -->
                                                    <th>Role</th>
                                                    <!-- <th>Remarks</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users as $user): ?>

                                                <tr>

                                                    <td><?php echo $user->userid ?></td>
                                                    <!-- <td><?php echo $user->useridno ?></td> -->
                                                    <td><?php echo $user->userfullname ?></td>
                                                    <td><?php echo $user->userposition ?></td>
                                                    <td><?php echo $user->userdepartment ?></td>
                                                    <td><?php echo $user->userjoblevel ?></td>
                                                    <td><?php echo $user->useremploymentstatus ?></td>
                                                    <!-- <td><?php echo $user->userareaofassignment ?></td> -->
                                                    <!-- <td><?php echo $user->userdatehired ?></td> -->
                                                    <!-- <td><?php echo $user->usercontact ?></td>
                                <td><?php echo $user->useremail ?></td> -->
                                                    <!-- <td><?php echo $user->userbirthdate ?></td>
                                <td><?php echo $user->userage ?></td>
                                <td><?php echo $user->usergender ?></td> -->
                                                    <!-- <td><?php echo $user->usercivilstatus ?></td> -->
                                                    <td><?php echo $user->username ?></td>
                                                    <!-- <td><?php echo $user->userpassword ?></td> -->
                                                    <td><?php echo $user->userrole ?></td>

                                                    <!-- <td><?php echo $user->userremarks ?></td> -->

                                                    <td>
                                                        <a style="text-decoration:none;"
                                                            href="update-usersinfo.php?edit=<?php echo $user->userid ?>"
                                                            class="text-success">&nbsp;&nbsp;
                                                            <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;

                                                        </a>|
                                                        <a style="text-decoration:none;"
                                                            href="userslist.php?delete=<?php echo $user->userid ?>"
                                                            class="text-danger">&nbsp;&nbsp;
                                                            <i class="nav-icon fas fa fa-trash"></i>&nbsp;&nbsp;

                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="custom-content-below-2" role="tabpanel"
                                    aria-labelledby="custom-content-below-2-tab">
                                    2
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-3" role="tabpanel"
                                    aria-labelledby="custom-content-below-3-tab">
                                    3
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-4" role="tabpanel"
                                    aria-labelledby="custom-content-below-4-tab">
                                    4
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-5" role="tabpanel"
                                    aria-labelledby="custom-content-below-5-tab">
                                    5
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-6" role="tabpanel"
                                    aria-labelledby="custom-content-below-6-tab">
                                    6
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-7" role="tabpanel"
                                    aria-labelledby="custom-content-below-7-tab">
                                    7
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-8" role="tabpanel"
                                    aria-labelledby="custom-content-below-8-tab">
                                    8
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-9" role="tabpanel"
                                    aria-labelledby="custom-content-below-9-tab">
                                    9
                                </div>
                                <div class="tab-pane fade" id="custom-content-below-10" role="tabpanel"
                                    aria-labelledby="custom-content-below-10-tab">
                                    10
                                </div>
                            </div>



                        </div>






                    </div>
                </div>
                <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        "pageLength": 10,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]


    });



});


$('#example [data-toggle="tooltip"]').tooltip({
    animated: 'fade',
    placement: 'bottom',
    html: true
});
</script><?php require "../footer1.php"; ?>