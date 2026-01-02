<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itusermasterfile";
$app = new App;
$users = $app->selectAll($query);

?>



<?php

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $query = "SELECT * FROM itserver where serverid=$id";
    $app = new App;
    $servers = $app->selectAll($query);




}


if (isset($_POST['submit'])) {
    $serverid = $_POST['serverid'];
    $servername = $_POST['servername'];
    $serverip = $_POST['serverip'];
    $serverstatus = $_POST['serverstatus'];
    $serverdescription = $_POST['serverdescription'];
    $serverlocation = $_POST['serverlocation'];
    $servermac = $_POST['servermac'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "UPDATE itserver SET servername=:servername, serverip=:serverip, serverstatus=:serverstatus, serverlocation=:serverlocation, serverdescription=:serverdescription, servermac=:servermac, username=:username, password=:password WHERE serverid='$serverid'";

    //     $query = "INSERT INTO server (servername, serverip,  serverstatus, serverlocation, servermac, serverdescription, username, password)
// VALUES(:servername, :serverip,  :serverstatus, :serverlocation, :servermac, :serverdescription, :username, :password)";
    $arr = [


        ":servername" => $servername,
        ":serverip" => $serverip,
        ":serverstatus" => $serverstatus,
        ":serverlocation" => $serverlocation,
        ":serverdescription" => $serverdescription,
        ":servermac" => $servermac,
        ":username" => $username,
        ":password" => $password,


    ];

    $path = "servers.php";
    $app->register($query, $arr, $path);
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Server Information</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="servers.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <?php foreach ($servers as $server): ?>
            <!-- Default box -->
            <form class="row g-3" method="POST" action="update-servers.php" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header pt-3">
                            <h1 class="h5 mb-3"><b>Add Server Information</h1>

                        </div><br>
                        <!-- /.BODY -->
                        <div class="card-body">
                            <div class="row">


                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="email">Server Name</label>

                                        <input type="text" name="servername" id="servername" class="form-control"
                                            value="<?php echo $server->servername ?>" placeholder="Server Name">
                                        <input type="hidden" name="serverid" id="serverid" class="form-control"
                                            value="<?php echo $server->serverid ?>" placeholder="Server Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email">Server IP Address</label>
                                        <input type="text" name="serverip" id="serverip" class="form-control"
                                            value="<?php echo $server->serverip ?>" placeholder="1**.***.***.***">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email">Location </label>
                                        <input type="text" name="serverlocation" id="serverlocation" class="form-control"
                                            value="<?php echo $server->serverlocation ?>" placeholder="NVR">
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Location</label>

                                    <?php
                                    echo '<select name="serverlocation" id="serverlocation" class="form-control"   value="<?php echo $server->cctvlive ?>">';
                                    $query = "SELECT *  FROM itcctvidf";
                                    $app = new App;
                                    $cctvidfs = $app->selectAll($query);
                                    foreach ($cctvidfs as $cctvidf) {
                                        echo '<option value=' . $cctvidf->serverip . '>' . $cctvidf->cctvidflocation . '</option>';
                                    }
                                    echo '</select>';
                                    ?>
                                </div>
                            </div> -->
                                <!-- <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category">Software</label>
                                    <select name="cctvsoftware" id="cctvsoftware" class="form-control"   value="<?php echo $server->cctvlive ?>">
                                        <option value="">Hikvision</option>
                                        <option value="">TPLINK</option>
                                        <option value="">Bosch</option>
                                        <option value="">Geovision</option>
                                    </select>

                                </div>
                            </div> -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email">Mac Address</label>
                                        <input type="text" name="servermac" id="servermac" class="form-control"
                                            value="<?php echo $server->servermac ?>" placeholder="Mac Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="category">Status</label>
                                        <select name="serverstatus" id="serverstatus" class="form-control"
                                            value="<?php echo $server->serverstatus ?>">

                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="0">For Setup</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="category">Information</label>
                                        <textarea name="serverdescription" id="serverdescription" class="form-control"><?php echo $server->serverdescription ?>
                                                                                        </textarea>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="email">Usernname</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            value="<?php echo $server->username ?>" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="email">Password</label>
                                        <input type="text" name="password" id="password" class="form-control"
                                            value="<?php echo $server->password ?>" placeholder="password">
                                    </div>
                                </div>







                            </div>
                        </div>

                    </div>
                    <div class="pb-5 pt-3">
                        <button class="btn btn-primary" name="submit">Update</button>
                        <a href="servers.php" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </div>
            </form>
            <!-- /.card -->
        <?php endforeach; ?>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>