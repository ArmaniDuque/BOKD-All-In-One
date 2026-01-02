<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itinternetwif";
$app = new App;
$users = $app->selectAll($query);



if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $query = "SELECT * FROM itinternetwif where wifiid=$id";
    $app = new App;
    $wifis = $app->selectAll($query);

}
?>

<?php
if (isset($_POST['submit'])) {


    echo $id = $_POST['id'];
    echo $wifimodel = $_POST['wifimodel'];
    echo $wifiip = $_POST['wifiip'];
    echo $wifiname = $_POST['wifiname'];
    echo $wifimac = $_POST['wifimac'];
    echo $wifisn = $_POST['wifisn'];
    echo $wifitype = $_POST['wifitype'];
    echo $wifistatus = $_POST['wifistatus'];
    echo $wifiusername = $_POST['wifiusername'];
    echo $wifipassword = $_POST['wifipassword'];
    echo $wifiremarks = $_POST['wifiremarks'];


    $query = "UPDATE itinternetwif SET wifimodel=:wifimodel, wifiip=:wifiip,
     wifiname=:wifiname, wifimac=:wifimac, wifisn=:wifisn, wifitype=:wifitype,
      wifistatus=:wifistatus, wifiusername=:wifiusername, wifipassword=:wifipassword,
       wifiremarks=:wifiremarks WHERE wifiid='$id'";
    $arr = [

        ":wifimodel" => $wifimodel,
        ":wifiip" => $wifiip,
        ":wifiname" => $wifiname,
        ":wifimac" => $wifimac,
        ":wifisn" => $wifisn,
        ":wifitype" => $wifitype,
        ":wifistatus" => $wifistatus,
        ":wifiusername" => $wifiusername,
        ":wifipassword" => $wifipassword,
        ":wifiremarks" => $wifiremarks,

        // `wifiid`,
        // `wifimodel`,
        // `wifiip`,
        // `wifiname`,
        // `wifimac`,
        // `wifisn`,
        // `wifitype`,
        // `wifistatus`,
        // `wifiusername`,
        // `wifipassword`,
        // `wifiremarks`





    ];
    $path = "internetwifi.php";
    $app->update($query, $arr, $path);



}
?>
<!-- Content Wrapper. Contains page content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update information</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="internetwifi.php" class="btn btn-primary">Back</a>
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
                    <h1 class="h5 mb-3"><b>Update</h1>

                </div><br>
                <form class="row g-3" method="POST" action="update-wifi.php" enctype="multipart/form-data">
                    <?php foreach ($wifis as $wifi): ?>

                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Name Location</label>
                                    <input type="hidden" name="id" id="id" class="form-control"
                                        value="<?php echo $wifi->wifiid ?>">
                                    <input type="text" name="wifiname" id="wifiname" class="form-control"
                                        value="<?php echo $wifi->wifiname ?>" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">IP Address</label>
                                    <input type="text" name="wifiip" id="wifiip" class="form-control"
                                        value="<?php echo $wifi->wifiip ?>" placeholder="1**.***.***.***">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Model</label>
                                    <input type="text" name="wifimodel" id="wifimodel" class="form-control"
                                        value="<?php echo $wifi->wifimodel ?>" placeholder="1**.***.***.***">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category">Type</label>
                                    <select name="wifitype" id="wifitype" class="form-control">
                                        <option value="<?php echo $wifi->wifitype ?>"><?php echo $wifi->wifitype ?>
                                        </option>
                                        <option value="SWITCH">SWITCH</option>
                                        <option value="WIFI">WIFI</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Mac Address</label>
                                    <input type="text" name="wifimac" id="wifimac" class="form-control"
                                        value="<?php echo $wifi->wifimac ?>" placeholder="00:00:00:00:00">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Serial Number</label>
                                    <input type="text" name="wifisn" id="wifisn" class="form-control"
                                        value="<?php echo $wifi->wifisn ?>" placeholder="xxxxxxXXXxxxx">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category">Status</label>
                                    <select name="wifistatus" id="wifistatus" class="form-control">
                                        <option value="<?php echo $wifi->wifistatus ?>"><?php echo $wifi->wifistatus ?>
                                        </option>
                                        <option value="Working">Working</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="0">For Setup</option>

                                    </select>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="email">Usernname</label>
                                    <input type="text" name="wifiusername" id="wifiusername" class="form-control"
                                        value="<?php echo $wifi->wifiusername ?>" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="email">Password</label>
                                    <input type="text" name="wifipassword" id="wifipassword" class="form-control"
                                        value="<?php echo $wifi->wifipassword ?>" placeholder="password">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-9">
                                    <label for="email">Remarks</label>
                                    <input type="text" name="wifiremarks" id="wifiremarks" class="form-control"
                                        value="<?php echo $wifi->wifiremarks ?>" placeholder="Remarks">
                                </div>
                            </div>



                        </div>
                    </div>
                    <?php endforeach; ?>
            </div>
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary" name="submit">Update</button>
            <a href="internetwifi.php" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
        <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>