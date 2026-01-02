<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php


if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $query = "SELECT * FROM itcctv where cctvid=$id";
    $app = new App;
    $cameras = $app->selectAll($query);




}
if (isset($_POST['submit'])) {
    $cctvid = $_POST['cctvid'];
    $cctvname = $_POST['cctvname'];
    $cctvip = $_POST['cctvip'];
    $cctvidfid = $_POST['cctvidfid'];
    $cctvsoftware = $_POST['cctvsoftware'];
    $cctvstatus = $_POST['cctvstatus'];
    $cctvstatus1 = $_POST['cctvstatus1'];
    $cctvlocation = $_POST['cctvlocation'];
    $cctvmacaddress = $_POST['cctvmacaddress'];
    $cctvlive = $_POST['cctvlive'];
    $cctvlive = $_POST['cctvlive'];
    $cctvusername = $_POST['cctvusername'];
    $cctvpassword = $_POST['cctvpassword'];
    // `cctvid`, `cctvname`, `cctvip`, `cctvidfid`, `cctvsoftware`, 
    //`cctvstatus`, `cctvlocation`, `cctvmacaddress`, `cctvlive`, `cctvusername`, `cctvpassword`, `created_at`

    $query = "UPDATE itcctv SET cctvname=:cctvname, cctvip=:cctvip, cctvidfid=:cctvidfid, cctvsoftware=:cctvsoftware, cctvstatus=:cctvstatus, cctvstatus1=:cctvstatus1, cctvlocation=:cctvlocation, cctvmacaddress=:cctvmacaddress, cctvlive=:cctvlive, cctvusername=:cctvusername , cctvpassword=:cctvpassword WHERE cctvid='$cctvid'";
    $arr = [


        ":cctvname" => $cctvname,
        ":cctvip" => $cctvip,
        ":cctvidfid" => $cctvidfid,
        ":cctvsoftware" => $cctvsoftware,
        ":cctvstatus" => $cctvstatus,
        ":cctvstatus1" => $cctvstatus1,
        ":cctvlocation" => $cctvlocation,
        ":cctvmacaddress" => $cctvmacaddress,
        ":cctvlive" => $cctvlive,
        ":cctvusername" => $cctvusername,
        ":cctvpassword" => $cctvpassword,


    ];

    // $path = "update-cctv.php?edit=$cctvid";
    $path = "cctv.php";
    $app->update($query, $arr, $path);
}

?>
<form class="row g-3" method="POST" action="update-cctv.php" enctype="multipart/form-data">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update CCTV</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="cctv.php" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <?php foreach ($cameras as $camera): ?>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>Update CCTV Informatio</h1>

                    </div><br>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Camera Name</label>
                                    <input type="hidden" name="cctvid" id="cctvid" class="form-control"
                                        value="<?php echo $camera->cctvid ?>" placeholder=" Camera Name">
                                    <input type="text" name="cctvname" id="cctvname" class="form-control"
                                        value="<?php echo $camera->cctvname ?>" placeholder=" Camera Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Camera IP Address</label>
                                    <input type="text" name="cctvip" id="cctvip" class="form-control"
                                        value="<?php echo $camera->cctvip ?>" placeholder=" 1**.***.***.***">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">NVR </label>
                                    <input type="text" name="cctvidfid" id="cctvidfid" class="form-control"
                                        value="<?php echo $camera->cctvidfid ?>" placeholder=" NVR">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Location</label>
                                    <select name="cctvlocation" id="cctvlocation" class="form-control">
                                        <?php
                                            if ($camera->cctvlocation == null) {
                                                $query = "SELECT *  FROM itcctvidf ";
                                                $app = new App;
                                                $cctvidfs = $app->selectAll($query);
                                                foreach ($cctvidfs as $cctvidf) {
                                                    echo '<option value=' . $cctvidf->cctvidfid . '>' . $cctvidf->cctvidflocation . '</option>';
                                                }
                                            } else {
                                                $query = "SELECT *  FROM itcctvidf where cctvidfid='$camera->cctvlocation'";
                                                $app = new App;
                                                $cctvidfs = $app->selectAll($query);
                                                foreach ($cctvidfs as $cctvidf) {
                                                    echo '<option value=' . $cctvidf->cctvidfid . '>' . $cctvidf->cctvidflocation . '</option>';
                                                }
                                            }

                                            $query = "SELECT *  FROM itcctvidf ";
                                            $app = new App;
                                            $cctvidfs = $app->selectAll($query);
                                            foreach ($cctvidfs as $cctvidf) {
                                                echo '<option value=' . $cctvidf->cctvidfid . '>' . $cctvidf->cctvidflocation . '</option>';
                                            }
                                            echo '';
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    ect <label for="category">Software</label>
                                    <select name="cctvsoftware" id="cctvsoftware" class="form-control">
                                        <option value="<?php echo $camera->cctvsoftware ?>">
                                            <?php echo $camera->cctvsoftware ?>
                                        </option>
                                        <option value="">Hikvision</option>
                                        <option value="">TPLINK</option>
                                        <option value="">Bosch</option>
                                        <option value="">Geovision</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Mac Address</label>
                                    <input type="text" name="cctvmacaddress" id="cctvmacaddress" class="form-control"
                                        value="<?php echo $camera->cctvmacaddress ?>" placeholder="Mac Address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category">Status</label>
                                    <select name="cctvstatus" id="cctvstatus" class="form-control">
                                        <option value="<?php echo $camera->cctvstatus ?>">
                                            <?php echo $camera->cctvstatus ?>
                                        </option>
                                        <option value=""></option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                        <option value="Pullout">Pullout</option>



                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category">Remarks</label>
                                    <select name="cctvstatus1" id="cctvstatus1" class="form-control">
                                        <option value="<?php echo $camera->cctvstatus ?>">
                                            <?php echo $camera->cctvstatus ?>
                                        </option>
                                        <option value="For-Setup">For-Setup</option>
                                        <option value="For-Additional">For-Additional</option>
                                        <option value="For-Relocation">For-Relocation</option>
                                        <option value="For-Maintenance">For-Maintenance</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Live</label>
                                    <input type="text" name="cctvlive" id="cctvlive" class="form-control"
                                        value="<?php echo $camera->cctvlive ?>" placeholder="Link">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="email">Usernname</label>
                                    <input type="text" name="cctvusername" id="cctvusername" class="form-control"
                                        value="<?php echo $camera->cctvusername ?>" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="email">Password</label>
                                    <input type="text" name="cctvpassword" id="cctvpassword" class="form-control"
                                        value="<?php echo $camera->cctvpassword ?>" placeholder="password">
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="submit" type="submit">Update</button>
                    <a href="cctv.php" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>

            <!-- /.card -->
            <?php endforeach; ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require "../../footer1.php"; ?>