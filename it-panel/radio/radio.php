<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itradio";
$app = new App;
$radios = $app->selectAll($query);


$query = "SELECT COUNT(*) AS count_AR FROM itradio WHERE radiostatus='Active'";
$app = new App;
$count_AR = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_IR FROM itradio WHERE radiostatus='Inactive'";
$app = new App;
$count_IR = $app->selectOne($query);
?>


<?php if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM itradio WHERE radioid='$id'";
    $app = new
        App;
    $path = "radio.php";
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
                    <h1>Radio</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-radio.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Accountability of Radio</b> </h1>

                </div><br>
                <div class="col-sm-12 invoice-col">
                    <button type="button" class="btn btn-success mb-2">
                        Active Radio<span class="badge bg-white text-success"><?php echo $count_AR->count_AR; ?></span>
                    </button>

                    <button type="button" class="btn btn-danger mb-2">
                        Inactive Radio<span class="badge bg-white text-danger"><?php echo $count_IR->count_IR; ?></span>
                    </button>




                </div>


                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th width="60"> </th>

                                <th width="60">#</th>
                                <th>Full Name</th>

                                <th>Designated</th>
                                <th>Department</th>
                                <th>Call Sign</th>
                                <th>Radio Brand</th>
                                <th>Serial Number</th>
                                <th>Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($radios as $radio): ?>
                            <tr>

                                <td>

                                    <?php
                                        if ($radio->radiostatus == "Active") {
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
                                <td><?php echo $radio->radioid ?></td>

                                <td><?php echo $radio->radiouserid ?></td>
                                <td><?php echo $radio->radioposition ?></td>
                                <td><?php echo $radio->radiodepartment ?></td>
                                <td><?php echo $radio->radiocallsign ?></td>

                                <td>
                                    <?php
                                        echo $radio->radiobrand ?>
                                </td>
                                <td><?php echo $radio->radioserialno ?></td>

                                <td>

                                    <?php echo $radio->radiostatus ?>
                                </td>


                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-radio.php?edit=<?php echo $radio->radioid ?>" class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="radio.php?delete=<?php echo $radio->radioid ?>" class="text-danger">
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


$('#example [data-toggle="tooltip"]').tooltip({
    animated: 'fade',
    placement: 'bottom',
    html: true
});
</script><?php require "../../footer1.php"; ?>