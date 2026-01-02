<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itinternetwif WHERE wifitype='WIFI'";
$app = new App;
$wifis = $app->selectAll($query);

// $query = "SELECT COUNT(*) AS count_WS FROM itinternetwif WHERE wifistatus='Working' AND wifitype='SWITCH'";
// $app = new App;
// $count_WS = $app->selectOne($query);

// $query = "SELECT COUNT(*) AS count_IS FROM itinternetwif WHERE wifistatus='Inactive' AND wifitype='SWITCH'";
// $app = new App;
// $count_IS = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_WW FROM itinternetwif WHERE wifistatus='normal' OR wifistatus='Working' AND wifitype='WIFI'";
$app = new App;
$count_WW = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_IW FROM itinternetwif WHERE wifistatus='Inactive' AND wifitype='WIFI'";
$app = new App;
$count_IW = $app->selectOne($query);
?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM itinternetwif WHERE wifiid='$id'";
    $app = new App;
    $path = "internetwifi.php";
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
                    <h1>Wifi Access</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-wifi.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Wifi Access</b> </h1>

                </div><br>

                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <!-- <div class="col-lg-3 col-6">
                            <!-- small box -->
                        <!-- <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $count_gindoors->count_gindoors; ?></h3>

                                    <p>Online</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div> -->
                        <!-- </div> -->
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $count_WW->count_WW; ?><sup style="font-size: 20px"></sup></h3>

                                    <p>Online</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $count_IW->count_IW; ?></h3>

                                    <p>Offline</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div>


                <div class="card-body">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th width="60">#</th>
                                <th>Type</th>
                                <th>Model</th>
                                <th>IP</th>
                                <!-- <th>Ping Status</th> -->
                                <th>Name/Location</th>
                                <th>Mac Address</th>
                                <th>Status</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Remarks</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($wifis as $wifi): ?>
                            <tr>

                                <td>
                                    <?php
                                        if ($wifi->wifistatus == "normal" || $wifi->wifistatus == "Working") {
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
                                <td> <?php echo $wifi->wifitype ?></td>
                                <td> <?php echo $wifi->wifimodel ?></td>
                                <td>

                                    <?php echo $wifi->wifiip ?>
                                    <?php
                                        // echo '<a  href="' . OPENURL . '' . $wifi->wifiip . '" target="_blank" >' . $wifi->wifiip . '</a>';
                                        ?>
                                </td>
                                <!-- <td>
                                        <?php
                                        // $ping = exec("ping -n 1 $wifi->wifiip", $output, $status);
                                        // if ($status == 0) {
                                        //     echo '<span class="badge bg-primary">Online</span>';
                                        // } else {
                                        //     echo '<span class="badge bg-danger">Offline</span>';
                                        // }
                                        ?>
                                    </td> -->
                                <td> <?php echo $wifi->wifiname ?></td>
                                <td> <?php echo $wifi->wifimac ?></td>
                                <td> <?php echo $wifi->wifistatus ?></td>
                                <td> <?php echo $wifi->wifiusername ?></td>
                                <td> <?php echo $wifi->wifipassword ?></td>
                                <td> <?php echo $wifi->wifiremarks ?></td>


                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-wifi.php?edit=<?php echo $wifi->wifiid ?>" class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="internetwifi.php?delete=<?php echo $wifi->wifiid ?>" class="text-danger">
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
        "pageLength": 100,
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