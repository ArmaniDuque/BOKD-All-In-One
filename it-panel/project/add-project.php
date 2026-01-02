<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>


<?php
$query = "SELECT * FROM itcctv";
$app = new App;
$cameras = $app->selectAll($query);

$query = "SELECT COUNT(*) AS count_formain FROM itcctv WHERE cctvstatus1='For-Maintenance'";
$app = new App;
$count_formain = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_totalcam FROM itcctv WHERE cctvstatus='Online' OR cctvstatus='Offline'";
$app = new App;
$count_totalcam = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_gindoors FROM itcctv WHERE cctvstatus='Online'";
$app = new App;
$count_gindoors = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_dindoors FROM itcctv WHERE cctvstatus='Offline'";
$app = new App;
$count_dindoors = $app->selectOne($query);


$query = "SELECT COUNT(*) AS count_forsetups FROM itcctv WHERE cctvstatus='Pullout'";
$app = new App;
$count_forsetups = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_forreloc FROM itcctv WHERE cctvstatus1='For-Relocation'";
$app = new App;
$count_forreloc = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_forset FROM itcctv WHERE cctvstatus1='For-Setup'";
$app = new App;
$count_forset = $app->selectOne($query);


$query = "SELECT COUNT(*) AS count_foradd FROM itcctv WHERE cctvstatus1='For-Additional'";
$app = new App;
$count_foradd = $app->selectOne($query);
?>
<?php if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM itcctv WHERE cctvid='$id'";
    $app = new App;
    $path = "cctv.php";
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
                    <h1>Project</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="index.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>


                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="form-group">
                            <label for="inputName">Project Name</label>
                            <input type="text" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Project Description</label>
                            <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" class="form-control custom-select">
                                <option selected="" disabled="">Select one</option>
                                <option>On Hold</option>
                                <option>Canceled</option>
                                <option>Success</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Client Company</label>
                            <input type="text" id="inputClientCompany" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Project Leader</label>
                            <input type="text" id="inputProjectLeader" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Budget</h3>


                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Estimated budget</label>
                            <input type="number" id="inputEstimatedBudget" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputSpentBudget">Total amount spent</label>
                            <input type="number" id="inputSpentBudget" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedDuration">Estimated project duration</label>
                            <input type="number" id="inputEstimatedDuration" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Project" class="btn btn-success float-right">
            </div>
        </div>
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
</script>


<?php require "../../footer1.php"; ?>