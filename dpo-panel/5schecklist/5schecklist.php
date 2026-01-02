<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php

if ($_SESSION['userrole'] == "admin") {
    $query = "SELECT * FROM dpocheckilst";
    $app = new App;
    $checks = $app->selectAll($query);

} else {
    $iddep = $_SESSION['userdepartment'];
    $query = "SELECT * FROM dpocheckilst WHERE checklistdepartment='$iddep'";
    $app = new App;
    $checks = $app->selectAll($query);

}

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $query = "DELETE FROM dpocheckilst WHERE checklistid='$id'";
    $app = new App;
    $path = "5schecklist.php";
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
                    <h1>5S Checklist</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-5schecklist.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3">List of Employees 5S Declaration
                    </h1>

                </div><br>

                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th width="60">Emp #</th>
                                <th>Employee Name</th>
                                <th>Department</th>
                                <th>Registration Date</th>
                                <th>PIP Cert #</th>

                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($checks as $check): ?>

                            <tr>

                                <td><?php echo $check->checklistid ?></td>
                                <?php


                                    $query = "SELECT * FROM dpousermasterfile WHERE userid='$check->userid'";
                                    $app = new App;
                                    $users = $app->selectAll($query);
                                    foreach ($users as $user) {
                                        // echo '<td>' . $user->userid . '</td>';
                                        echo '<td>' . $user->userfullname . '</td>';
                                        echo '<td>' . $user->userdepartment . '</td>';
                                    }
                                    ?>


                                <td><?php echo $check->checkregsdate ?></td>
                                <td><?php echo $check->checkpipcert ?></td>
                                <!-- <td><?php echo $check->checkprofilephoto ?></td>
                                    <td><?php echo $check->checkofficephoto ?></td> -->

                                <td>
                                    <a style="text-decoration:none;"
                                        href="dataview.php?edit=<?php echo $user->userid ?>"
                                        class="text-success">&nbsp;&nbsp;
                                        <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="5schecklist.php?delete=<?php echo $check->checklistid ?>"
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
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
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