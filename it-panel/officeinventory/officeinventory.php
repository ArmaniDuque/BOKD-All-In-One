<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<!-- <style>
    div.dt-container {
        width: 800px;
        margin: 0 auto;
    }
</style> -->

<?php
$query = "SELECT * FROM itpcinventory";
$app = new App;
$pcs = $app->selectAll($query);


$query = "SELECT COUNT(*) AS count_gindoors FROM itpcinventory WHERE status='Active'";
$app = new App;
$count_gindoors = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_dindoors FROM itpcinventory WHERE status='Inactive'";
$app = new App;
$count_dindoors = $app->selectOne($query);
?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM itpcinventory WHERE pcid='$id'";
    $app = new App;
    $path = "officeinventory.php";
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
                    <h1>PC Inventory</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-officeinventory.php" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card d-print-block">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Lists of PC</b> </h1>

                </div>





                <div class="col-sm-12 invoice-col">
                    <button type="button" class="btn btn-success mb-2">
                        Active <span
                            class="badge bg-white text-success"><?php echo $count_gindoors->count_gindoors; ?></span>
                    </button>

                    <button type="button" class="btn btn-danger mb-2">
                        Inactive <span
                            class="badge bg-white text-danger"><?php echo $count_dindoors->count_dindoors; ?></span>
                    </button>
                </div>


                <div class="card-body">
                    <table class="table table-striped " style="width:100%" id="example">
                        <!-- <table class="display nowrap" style="width:100%" id="example"> -->
                        <thead>

                            <tr>
                                <th width="60">#</th>
                                <!-- <th>Name</th> -->
                                <th>PC Name</th>
                                <th>Department</th>
                                <th>IP</th>
                                <th>Specs</th>
                                <th>Monitor</th>
                                <th>Mouse</th>
                                <th>Ups</th>
                                <th>Printer</th>
                                <!-- <th>Other1</th>
                                <th>Other2</th>
                                <th>Other3</th> -->
                                <!-- <th>Credential</th> -->
                                <th>Status</th>
                                <th>Remarks</th>
                                <!-- <th>Username</th>
                                <th>Password</th> -->
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pcs as $pc): ?>

                            <tr>

                                <td> <?php //echo $pc->pcid ?>
                                    <?php
                                        if ($pc->status == "Active") {
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
                                <td> <?php echo $pc->pcname ?>
                                </td>

                                <td><?php echo $pc->department ?></td>
                                <td><?php echo $pc->ipaddress;
                                    // echo 'IP Address : ' . $pc->ipaddress;
                                    // echo '</br>Subnet : ' . $pc->subnet;
                                    // echo '</br>Gateway: ' . $pc->gateway;
                                    // echo '</br>DNS 1: ' . $pc->dns1;
                                    // echo '</br>DNS 2: ' . $pc->dns2;
                                    ?></td>

                                <td style="white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 200px;">
                                    <?php echo $pc->specs ?>
                                </td>
                                <td><?php echo $pc->monitor ?></td>
                                <td><?php echo $pc->mouse ?></td>
                                <td><?php echo $pc->ups ?></td>
                                <td><?php echo $pc->printer ?></td>
                                <!-- <td><?php echo $pc->other1 ?></td>
                                <td><?php echo $pc->other2 ?></td>
                                <td><?php echo $pc->other3 ?></td> -->
                                <!-- <td><?php
                                    echo 'Username: ' . $pc->username;
                                    echo '</br>Password: ' . $pc->password;
                                    ?></td> -->
                                <td><?php echo $pc->status ?></td>
                                <td><?php echo $pc->remarks ?></td>



                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-officeinventory.php?edit=<?php echo $pc->pcid ?>"
                                        class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="officeinventory.php?delete=<?php echo $pc->pcid ?>" class="text-danger">
                                        <i class="nav-icon fas fa fa-trash"></i>

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
        "pageLength": 50,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

    });


});

// $('#example').DataTable({
//     scrollX: true
// });

$('#example [data-toggle="tooltip"]').tooltip({
    animated: 'fade',
    placement: 'bottom',
    html: true
});
</script><?php require "../../footer1.php"; ?>