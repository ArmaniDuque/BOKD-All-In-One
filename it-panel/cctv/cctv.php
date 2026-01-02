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
                    <h1>CCTV</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-cctv.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of CCTV</b> </h1>

                </div>
                <div class="container-fluid">
                    <br>
                    <div class="row">


                        <div class="col-sm-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $count_totalcam->count_totalcam; ?><sup
                                            style="font-size: 20px"></sup></h3>

                                    <p>Total Camera</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $count_gindoors->count_gindoors; ?><sup
                                            style="font-size: 20px"></sup></h3>

                                    <p>Online</p>
                                </div>


                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $count_dindoors->count_dindoors; ?></h3>

                                    <p>Offline</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $count_forsetups->count_forsetups; ?></h3>

                                    <p>Pullout</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3><?php echo $count_foradd->count_foradd; ?><sup style="font-size: 20px"></sup>
                                    </h3>

                                    <p>For-Additional</p>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3><?php echo $count_forreloc->count_forreloc; ?><sup
                                            style="font-size: 20px"></sup>
                                    </h3>

                                    <p>For-Relocation</p>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?php echo $count_forset->count_forset; ?><sup style="font-size: 20px"></sup>
                                    </h3>

                                    <p>For-Setup</p>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?php echo $count_formain->count_formain; ?><sup style="font-size: 20px"></sup>
                                    </h3>

                                    <p>For-Maintenance</p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>

                            <tr>
                                <th width="60">#</th>
                                <th>Camera Name/Location</th>
                                <th>IP</th>
                                <!-- <th>PIng Status</th> -->
                                <th>Server</th>
                                <th>Software</th>
                                <th>Location</th>
                                <th>Mac Address</th>
                                <th>Live</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cameras as $camera): ?>

                            <tr>

                                <td> <?php //echo $camera->cctvid ?>
                                    <?php
                                        if ($camera->cctvstatus == "Online") {
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
                                <td> <?php echo $camera->cctvname ?>
                                </td>
                                <td>
                                    <?php
                                        if ($camera->cctvlive == null) {
                                            echo '<a  href="' . OPENURL . '' . $camera->cctvip . '" target="_blank" >' . $camera->cctvip . '</a>';
                                        } else {
                                            echo '<a  href="' . $camera->cctvlive . '" target="_blank" >
                                                                <img src="' . $camera->cctvlive . '" style="width:100px;"></a>';
                                        }
                                        ?>


                                </td>

                                <!-- <td>
                                        <?php

                                        // $ping = exec("ping -n 1 $camera->cctvip", $output, $status);
                                        // if ($status == 0) {
                                        //     echo '<span class="badge bg-primary">Online</span>';
                                        // } else {
                                        //     echo '<span class="badge bg-danger">Offline</span>';
                                        // }
                                        ?>


                                    </td> -->
                                <td><?php echo $camera->cctvidfid ?></td>
                                <td><?php echo $camera->cctvsoftware ?></td>
                                <td>
                                    <?php
                                        if ($camera->cctvlocation == null) {
                                            echo "<div class='text-danger'>Setup Location</div>";

                                        } else {
                                            $query = "SELECT * FROM itcctvidf WHERE cctvidfid='$camera->cctvlocation'";
                                            $app = new App;
                                            $cctvidfs = $app->selectAll($query);
                                            foreach ($cctvidfs as $cctvidf) {
                                                echo $cctvidf->cctvidflocation;
                                            }
                                        }
                                        ?>
                                </td>

                                <td><?php echo $camera->cctvmacaddress ?></td>
                                <td><?php echo $camera->cctvlive ?></td>
                                <td><?php echo $camera->cctvstatus ?></td>
                                <td><?php echo $camera->cctvstatus1 ?></td>
                                <td><?php echo $camera->cctvusername ?></td>
                                <td><?php echo $camera->cctvpassword ?></td>



                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-cctv.php?edit=<?php echo $camera->cctvid ?>" class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="cctv.php?delete=<?php echo $camera->cctvid ?>" class="text-danger">
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
</script>


<?php require "../../footer1.php"; ?>