<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php

if ($_SESSION['userrole'] == "admin") {
    $query = "SELECT * FROM dpodatainventory";
    $app = new App;
    $datas = $app->selectAll($query);


} else {
    $iddep = $_SESSION['userdepartment'];
    $query = "SELECT * FROM dpodatainventory WHERE datadepartment='$iddep'";
    $app = new App;
    $datas = $app->selectAll($query);

}


if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $query = "DELETE FROM dpodatainventory WHERE datainventoryid='$id'";
    $app = new App;
    $path = "../datainventory/datainventory.php";
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
                    <h1>Data Inventory</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-datainventory.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Physical & Data Inventory</b> </h1>

                </div><br>



                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <!-- <th width="60">Id</th> -->
                                <th width="60">Storage</th>
                                <th>Actual Location</th>
                                <th>Filwe Description</th>
                                <th>Category</th>
                                <th>Security Status</th>
                                <th>Department</th>
                                <th>Data Types</th>
                                <th>Retension Dates</th>
                                <!-- <th>Backup Process</th> -->
                                <th>Created</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datas as $data): ?>

                            <tr>

                                <!-- <td><?php echo $data->datainventoryid ?></td> -->
                                <td><?php echo $data->datastorage ?></td>
                                <td><?php echo $data->datalocation ?></td>
                                <td><?php echo $data->datadescription ?></td>
                                <td><?php echo $data->datacategory ?></td>
                                <td><?php echo $data->datasecuritystatus ?></td>
                                <td><?php echo $data->datadepartment ?></td>
                                <td><?php echo $data->datatypes ?></td>
                                <td><?php echo $data->dataretensiondate ?></td>
                                <!-- <td><?php echo $data->databackup ?></td> -->
                                <td><?php echo $data->created_at ?></td>


                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-datainventory.php?edit=<?php echo $data->datainventoryid ?>"
                                        class="text-success">&nbsp;&nbsp;
                                        <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="datainventory.php?delete=<?php echo $data->datainventoryid ?>"
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