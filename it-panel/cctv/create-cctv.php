<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itusermasterfile";
$app = new App;
$users = $app->selectAll($query);

?>



<?php



if (isset($_POST['submit'])) {
    // $cctvid = $_POST['cctvid'];
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
    //, cctvid`, `cctvname`, `cctvip`, `cctvidfid`, `cctvsoftware`, `cctvstatus`, `cctvlocation`, `cctvmacaddress`, `cctvlive`, `cctvusername`, `cctvpassword`, `created_at`

    //, cctvid, cctvname, cctvip, cctvidfid, cctvsoftware, cctvstatus, cctvlocation, cctvmacaddress, cctvlive, cctvusername, cctvpassword, created_at
    //, :cctvid, :cctvname, :cctvip, :cctvidfid, :cctvsoftware, :cctvstatus, :cctvlocation, :cctvmacaddress, :cctvlive, :cctvusername, :cctvpassword, :created_at

    // $query = "UPDATE cctv SET cctvname=:cctvname, :cctvip=:cctvip, :cctvidfid=:cctvidfid, cctvsoftware=:cctvsoftware, cctvstatus=:cctvstatus, cctvlocation=:cctvlocation, cctvmacaddress=:cctvmacaddress, cctvlive=:cctvlive, cctvusername=:cctvusername , cctvpassword=:cctvpassword WHERE cctvid='$cctvid'";

    $query = "INSERT INTO itcctv (cctvname, cctvip, cctvidfid, cctvsoftware, cctvstatus, cctvstatus1, cctvlocation, cctvmacaddress, cctvlive, cctvusername, cctvpassword)
VALUES(:cctvname, :cctvip, :cctvidfid, :cctvsoftware, :cctvstatus, :cctvstatus1, :cctvlocation, :cctvmacaddress, :cctvlive, :cctvusername, :cctvpassword)";
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

    $path = "create-cctv.php";
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
                    <h1>Add CCTV</h1>
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
        <form class="row g-3" method="POST" action="create-cctv.php" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>Add CCTV Informatio</h1>

                    </div><br>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Camera Name</label>

                                    <input type="text" name="cctvname" id="cctvname" class="form-control"
                                        placeholder="Camera Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Camera IP Address</label>
                                    <input type="text" name="cctvip" id="cctvip" class="form-control"
                                        placeholder="1**.***.***.***">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">NVR </label>
                                    <input type="text" name="cctvidfid" id="cctvidfid" class="form-control"
                                        placeholder="NVR">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Location</label>

                                    <?php
                                    echo '<select name="cctvlocation" id="cctvlocation" class="form-control">';
                                    $query = "SELECT *  FROM itcctvidf";
                                    $app = new App;
                                    $cctvidfs = $app->selectAll($query);
                                    foreach ($cctvidfs as $cctvidf) {
                                        echo '<option value=' . $cctvidf->cctvidfid . '>' . $cctvidf->cctvidflocation . '</option>';
                                    }
                                    echo '</select>';
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category">Software</label>
                                    <select name="cctvsoftware" id="cctvsoftware" class="form-control">
                                        <option value="">TruVision</option>
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
                                        placeholder="Mac Address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category">Status</label>
                                    <select name="cctvstatus" id="cctvstatus" class="form-control">

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
                                        placeholder="Link">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="email">Usernname</label>
                                    <input type="text" name="cctvusername" id="cctvusername" class="form-control"
                                        placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="email">Password</label>
                                    <input type="text" name="cctvpassword" id="cctvpassword" class="form-control"
                                        placeholder="password">
                                </div>
                            </div>







                        </div>
                    </div>

                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="submit">Create</button>
                    <a href="cctv.php" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>