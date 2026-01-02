<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itserver";
$app = new App;
$servers = $app->selectAll($query);

$query = "SELECT * FROM itpcinventory";
$app = new App;
$pcinventorys = $app->selectAll($query);

$query = "SELECT * FROM itinternetwif";
$app = new App;
$internetwifs = $app->selectAll($query);

$query = "SELECT * FROM itcctv";
$app = new App;
$cctvs = $app->selectAll($query);

?>
<?php
//  if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];
//     $query = "DELETE FROM itserver WHERE itserverid='$id'";
//     $app = new App;
//     $path = "servers.php";
//     $app->delete($query, $path);
// }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Servers</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-servers.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Servers</b> </h1>

                </div><br>



                <div class="card-body">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>

                                <th>IP</th>
                                <!-- <th>Ping Status</th> -->

                                <th>Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($servers as $server): ?>

                            <tr>

                                <td> <?php echo $server->servername ?></td>
                                <td> <?php echo $server->serverlocation ?>

                                </td>

                                <td> <?php echo $server->serverip ?></td>
                                <!-- <td>
                                    <?php

                                    // $ping = exec("ping -n 1 $server->serverip", $output, $status);
                                    // if ($status == 0) {
                                    //     echo '<span class="badge bg-primary">Online</span>';
                                    // } else {
                                    //     echo '<span class="badge bg-danger">Offline</span>';
                                    // }
                                    ?>


                                </td> -->

                                <td> <?php echo $server->serverstatus ?></td>

                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-servers.php?edit=<?php echo $server->serverid ?>"
                                        class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="servers.php?delete=<?php echo $server->serverid ?>" class="text-danger">
                                        <i class="nav-icon fas fa fa-trash"></i>

                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>


                            <?php foreach ($pcinventorys as $pcinventory): ?>

                            <tr>

                                <td> <?php echo $pcinventory->pcname ?></td>
                                <td> <?php echo $pcinventory->department ?>

                                </td>

                                <td> <?php echo $pcinventory->ipaddress ?></td>
                                <!-- <td>
                                    <?php

                                    // $ping = exec("ping -n 1 $pcinventory->ipaddress", $output, $status);
                                    // if ($status == 0) {
                                    //     echo '<span class="badge bg-primary">Online</span>';
                                    // } else {
                                    //     echo '<span class="badge bg-danger">Offline</span>';
                                    // }
                                    ?>


                                </td> -->

                                <td> <?php echo $pcinventory->status ?></td>

                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-servers.php?edit=<?php echo $pcinventory->pcid ?>"
                                        class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="servers.php?delete=<?php echo $pcinventory->pcid ?>" class="text-danger">
                                        <i class="nav-icon fas fa fa-trash"></i>

                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>


                            <?php foreach ($cctvs as $cctv): ?>

                            <tr>

                                <td> <?php echo $cctv->cctvname ?></td>
                                <td> <?php echo $cctv->cctvidfid ?>

                                </td>

                                <td> <?php echo $cctv->cctvip ?></td>
                                <!-- <td>
                                                                    <?php

                                                                    // $ping = exec("ping -n 1 $cctv->ipaddress", $output, $status);
                                                                    // if ($status == 0) {
                                                                    //     echo '<span class="badge bg-primary">Online</span>';
                                                                    // } else {
                                                                    //     echo '<span class="badge bg-danger">Offline</span>';
                                                                    // }
                                                                    ?>
                                
                                
                                                                </td> -->

                                <td> <?php echo $cctv->cctvstatus ?></td>

                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-servers.php?edit=<?php echo $cctv->cctvid ?>" class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="servers.php?delete=<?php echo $cctv->cctvid ?>" class="text-danger">
                                        <i class="nav-icon fas fa fa-trash"></i>

                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>


                            <?php foreach ($internetwifs as $internetwif): ?>

                            <tr>

                                <td> <?php echo $internetwif->wifiname ?></td>
                                <td> <?php echo $internetwif->wifimodel ?>

                                </td>

                                <td> <?php echo $internetwif->wifiip ?></td>
                                <!-- <td>
                                                                    <?php

                                                                    // $ping = exec("ping -n 1 $internetwif->ipaddress", $output, $status);
                                                                    // if ($status == 0) {
                                                                    //     echo '<span class="badge bg-primary">Online</span>';
                                                                    // } else {
                                                                    //     echo '<span class="badge bg-danger">Offline</span>';
                                                                    // }
                                                                    ?>
                                
                                
                                                                </td> -->

                                <td> <?php echo $internetwif->wifistatus ?></td>

                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-servers.php?edit=<?php echo $internetwif->wifid ?>"
                                        class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="servers.php?delete=<?php echo $internetwif->wifid ?>" class="text-danger">
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
        "pageLength": 500,
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