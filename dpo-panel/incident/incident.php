<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php

$query = "SELECT * FROM dpoincident ";
$app = new App;
$incident = $app->selectAll($query);


$userid = $_SESSION['userid'];

?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM dpoincident WHERE incidentid='$id'";
    $app = new App;
    $path = "incident.php";
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
                    <h1>Incident</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-incident.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Incident</b> (Data Security Assessment)</h1>

                </div><br>



                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th width="60">Incident #</th>
                                <th>Date Reported</th>
                                <th>DEPARTMENT</th>
                                <th>Date Created</th>
                                <th>Date Incident</th>
                                <th>Time Incident</th>
                                <th>Description</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($incident as $inci): ?>

                                <tr>

                                    <td><?php echo $inci->incidentid ?></td>
                                    <td><?php echo $inci->datetoday ?></td>
                                    <td><?php


                                    $query = "SELECT * FROM dpousermasterfile WHERE userid='$inci->userid'";
                                    $app = new App;
                                    $dps = $app->selectAll($query);
                                    foreach ($dps as $dp) {
                                        echo $dp->userdepartment;
                                    }


                                    ?></td>
                                    <td><?php echo $inci->dateincident ?></td>
                                    <td><?php echo $inci->datetoday ?></td>
                                    <td><?php echo $inci->time ?></td>
                                    <td><?php echo $inci->description ?></td>

                                    <td>
                                        <a style="text-decoration:none;"
                                            href="update-incident.php?edit=<?php echo $inci->incidentid ?>"
                                            class="text-success">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;

                                        </a>|
                                        <a style="text-decoration:none;"
                                            href="incident.php?delete=<?php echo $inci->incidentid ?>"
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
<!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function () {
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
</script><?php require "../../footer1.php"; ?>