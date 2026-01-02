<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php

$query = "SELECT * FROM dposharing";
$app = new App;
$sharings = $app->selectAll($query);



if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $query = "DELETE FROM dposharing WHERE sharingid='$id'";
    $app = new App;
    $path = "datasharing.php";
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
                    <h1>Data Sharing Request</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-datasharing.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Registered Data Sharing Request</b> (Data Security Assessment)</h1>

                </div><br>

                <div class="col-sm-12 invoice-col">
                    <span>
                        Data Sharing is the disclosure of transfer to a third party of personal data under the control
                        or custudy of a personal information controller
                    </span><br><br>
                </div>

                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th width="60">STATUS</th>
                                <th>DSF#</th>
                                <th>DATE</th>
                                <th>DEPARTMENT</th>
                                <th>PURPOSE</th>
                                <th>Date Use</th>
                                <th>REQESTED BY</th>
                                <th>Status</th>
                                <!-- <th>Remarks</th> -->
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sharings as $sharing): ?>

                            <tr>
                                <td>
                                    <?php
                                        if ($sharing->statusdpo == "Approved") {
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
                                <td><?php echo $sharing->sharingid ?></td>
                                <td><?php echo $sharing->datetoday ?></td>
                                <td>
                                    <?php

                                        $query = "SELECT * FROM dpousermasterfile WHERE userid='$sharing->userid'";
                                        $app = new App;
                                        $dps = $app->selectAll($query);
                                        foreach ($dps as $dp) {
                                            echo $dp->userdepartment;
                                        }
                                        ?>





                                </td>
                                <!-- <td><?php echo $sharing->datacollected ?></td> -->
                                <td><?php echo $sharing->purpose ?></td>
                                <td><?php echo $sharing->dateuse ?></td>
                                <!-- <td><?php echo $sharing->otherpurpose ?></td> -->
                                <!-- <td><?php echo $sharing->requesteddep ?></td> -->
                                <!-- <td><?php echo $sharing->depuserid ?></td> -->

                                <td>

                                    <?php

                                        $query = "SELECT * FROM dpousermasterfile WHERE userid='$sharing->requesteddep'";
                                        $app = new App;
                                        $dps = $app->selectAll($query);
                                        foreach ($dps as $dp) {
                                            echo $dp->userdepartment;
                                        }
                                        ?>
                                </td>

                                <td>

                                    <?php

                                        if ($sharing->statusdpo == "Approved") {
                                            echo ' <span class="badge bg-success fa fa-thumbs-up">' . $sharing->statusdpo . '</span>';
                                        } else {
                                            echo '<span class="badge bg-danger fa fa-thumbs-down"> Not Approved</span>';
                                        }

                                        ?></span>





                                </td>
                                <!-- <td><?php echo $sharing->remarks ?></td> -->

                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-datasharing.php?edit=<?php echo $sharing->sharingid ?>"
                                        class="text-success">&nbsp;&nbsp;
                                        <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="datasharing.php?delete=<?php echo $sharing->sharingid ?>"
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
</script><?php require "../../footer1.php"; ?>