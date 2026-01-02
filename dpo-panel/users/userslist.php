<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM dpousermasterfile";
$app = new App;
$users = $app->selectAll($query);

?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM dpousermasterfile WHERE userid='$id'";
    $app = new App;
    $path = "userslist.php";
    $app->delete($query, $path);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>System Users</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-users.php" class="btn btn-primary">Create</a>
                </div>
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
                    <h1 class="h5 mb-3"><b>List of registered user in your department</b> </h1>


                </div><br>
                <div class="col-sm-12 invoice-col">

                </div>
                <div class="card-body ">
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
            <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        "pageLength": 50,
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
</script><?php require "../../footer1.php"; ?>