<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php

$query = "SELECT * FROM dporequest";
$app = new App;
$process = $app->selectAll($query);


$userid = $_SESSION['userid'];

?>


<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM dporequest WHERE requestid='$id'";
    $app = new App;
    $path = "request.php";
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
                    <h1>Department Request</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-departmentrequest.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Registered Data Process</b> (Data Security Assessment)</h1>

                </div><br>

                <div class="col-sm-12 invoice-col">
                    <span>
                        Data Process Request are to built to monitor the activity and flow of the data and to Improve
                        quality of work
                    </span><br><br>
                </div>

                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>

                            <tr>
                                <th width="60">PRF #</th>
                                <th>DATE</th>
                                <th>DEPARTMENT</th>
                                <th>DESCRIPTION</th>
                                <th>PURPOSE</th>
                                <!-- <th>TYPES</th> -->
                                <th>TYPES</th>
                                <th width="100">Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($process as $pro): ?>

                                <tr>
                                    <td><?php echo $pro->requestid ?></td>
                                    <td><?php echo $pro->date ?></td>
                                    <td>

                                        <?php

                                        $query = "SELECT * FROM dpousermasterfile WHERE userid='$pro->userid'";
                                        $app = new App;
                                        $dps = $app->selectAll($query);
                                        foreach ($dps as $dp) {
                                            echo $dp->userdepartment;
                                        }
                                        ?>


                                    </td>
                                    <td><?php echo $pro->description ?></td>
                                    <td><?php
                                    if ($pro->collection == "1") {
                                        echo " Collection";
                                    }
                                    if ($pro->blocking == "1") {
                                        echo " Blocking";
                                    }
                                    if ($pro->consultation == "1") {
                                        echo " Consultation";
                                    }
                                    if ($pro->storage == "1") {
                                        echo " Storage";
                                    }
                                    if ($pro->destruction == "1") {
                                        echo " Destruction";
                                    }
                                    if ($pro->process == "1") {
                                        echo " Process";
                                    }
                                    if ($pro->modification == "1") {
                                        echo " Modification";
                                    }
                                    if ($pro->transfer == "1") {
                                        echo " Transfer";
                                    }
                                    if ($pro->sharing == "1") {
                                        echo " Sharing";
                                    }
                                    if ($pro->access == "1") {
                                        echo " Access";
                                    }







                                    ?></td>
                                    <td><?php

                                    if ($pro->pii == "1") {
                                        echo " PII";
                                    }
                                    if ($pro->phi == "1") {
                                        echo " PHI";
                                    }
                                    if ($pro->ibi == "1") {
                                        echo " IBI";
                                    }
                                    ?></td>

                                    <td>
                                        <?php
                                        if ($pro->status == "1") {
                                            echo '<svg class="text-success-500 h-6 w-6 text-success"
                                        		xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        		stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        	</svg>';
                                        } else {
                                            echo '<svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                        		fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        		aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        		</path>
                                        	</svg>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a style="text-decoration:none;"
                                            href="update-request.php?edit=<?php echo $pro->requestid ?>"
                                            class="text-success">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;

                                        </a>|
                                        <a style="text-decoration:none;"
                                            href="request.php?delete=<?php echo $pro->requestid ?>"
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