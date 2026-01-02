<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itserver";
$app = new App;
$servers = $app->selectAll($query);

?>
<?php if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM itserver WHERE serverid='$id'";
    $app = new App;
    $path = "servers.php";
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
                                <th>Servers Name</th>
                                <th>Location</th>
                                <th>Link</th>
                                <th>IP</th>
                                <!-- <th>Ping Status</th> -->
                                <th>MAC</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($servers as $server): ?>

                                <tr>

                                    <td> <?php echo $server->servername ?></td>
                                    <td> <?php echo $server->serverlocation ?>

                                    </td>
                                    <td>
                                        <?php

                                        echo '<a  href="' . OPENURL . '' . $server->serverlink . '" target="_blank" >' . $server->serverlink . '</a>';

                                        ?>

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
                                    // ?>


                                </td> -->
                                    <td> <?php echo $server->servermac ?></td>
                                    <td> <?php echo $server->serverdescription ?></td>
                                    <td> <?php echo $server->serverstatus ?></td>
                                    <td> <?php echo $server->username ?></td>
                                    <td> <?php echo $server->password ?></td>

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


                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
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