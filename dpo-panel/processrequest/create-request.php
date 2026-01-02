<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_POST['submit'])) {

    echo $userid = $_POST['userid'];
    echo $date = $_POST['date'];
    echo $depuserid = $_POST['depuserid'];
    echo $description = $_POST['description'];

    echo $blocking = isset($_POST['blocking']) ? $_POST['blocking'] : 0;
    echo $collection = isset($_POST['collection']) ? $_POST['collection'] : 0;
    echo $consultation = isset($_POST['consultation']) ? $_POST['consultation'] : 0;
    echo $storage = isset($_POST['storage']) ? $_POST['storage'] : 0;
    echo $destruction = isset($_POST['destruction']) ? $_POST['destruction'] : 0;
    echo $process = isset($_POST['process']) ? $_POST['process'] : 0;
    echo $modification = isset($_POST['modification']) ? $_POST['modification'] : 0;
    echo $transfer = isset($_POST['transfer']) ? $_POST['transfer'] : 0;
    echo $sharing = isset($_POST['sharing']) ? $_POST['sharing'] : 0;
    echo $access = isset($_POST['access']) ? $_POST['access'] : 0;
    echo $erasure = isset($_POST['erasure']) ? $_POST['erasure'] : 0;
    echo $pii = isset($_POST['pii']) ? $_POST['pii'] : 0;
    echo $phi = isset($_POST['phi']) ? $_POST['phi'] : 0;
    echo $ibi = isset($_POST['ibi']) ? $_POST['ibi'] : 0;
    // echo $file = $_POST['file'];
    $file = $_FILES['checkprofilephoto']['name'];
    // $checkofficephoto = $_FILES['checkofficephoto']['name'];
    $dir = "uploads/" . basename($file);
    echo $status = "0";
    echo $remarks = "0";




    $query = "INSERT INTO dporequest (userid, date, depuserid, description, collection, blocking, consultation, storage, destruction, process, modification, transfer, sharing, access, erasure, pii, phi, ibi, file, status, remarks)
VALUES(:userid, :date, :depuserid, :description, :collection, :blocking, :consultation, :storage, :destruction, :process, :modification, :transfer, :sharing, :access, :erasure, :pii, :phi, :ibi, :file, :status, :remarks)";
    $arr = [



        ":userid" => $userid,
        ":date" => $date,
        ":depuserid" => $depuserid,
        ":description" => $description,
        ":collection" => $collection,
        ":blocking" => $blocking,
        ":consultation" => $consultation,
        ":storage" => $storage,
        ":destruction" => $destruction,
        ":process" => $process,
        ":modification" => $modification,
        ":transfer" => $transfer,
        ":sharing" => $sharing,
        ":access" => $access,
        ":erasure" => $erasure,
        ":pii" => $pii,
        ":phi" => $phi,
        ":ibi" => $ibi,
        ":file" => $file,
        ":status" => $status,
        ":remarks" => $remarks,


    ];



    $path = "request.php";

    // if (move_uploaded_file($_FILES['checkprofilephoto']['tmp_name'], $dir)) {

    //     $app->register($query, $arr, $path);
    // }
    if (move_uploaded_file($_FILES['checkprofilephoto']['tmp_name'], $dir)) {

        //     if (move_uploaded_file($_FILES['checkofficephoto']['tmp_name'], $dir)) {
        $app->register($query, $arr, $path);
        //     }
    }

}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Create Request Form</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="request.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <form class="row g-3" method="POST" action="create-request.php" enctype="multipart/form-data">

        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3">The DPO will ensure all the process will regards to data privaxcxy are well
                            documented.</h1>

                    </div><br>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name">Date</label>
                                    <input type="text" readonly name="date" id="date" class="form-control"
                                        value="<?php echo "" . date("Y-d-m") . ""; ?>">
                                </div>
                            </div>
                            <!-- <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Department</label>
                                    <?php
                                    if ($_SESSION['userrole'] == "admin") {
                                        echo '<select name="depuserid" id="depuserid" class="form-control">';
                                        $query = "SELECT DISTINCT dpouserdepartment FROM usermasterfile";
                                        $app = new App;
                                        $departments = $app->selectAll($query);
                                        foreach ($departments as $department) {
                                            echo '<option value=' . $department->userdepartment . '>' . $department->userdepartment . '</option>';
                                        }
                                        echo '</select>';
                                    } else {
                                        echo '<input readonly type="text" name="depuserid" id="depuserid"
                                    value=' . $_SESSION['userdepartment'] . ' class="form-control"
                                   >';
                                    }
                                    ?>
                                </div>
                            </div> -->
                            <div class="col-md-8">
                                <div class="col-md-6">
                                    <label for="email">Requested By: </label>
                                    <!-- <input type="text" name="requesteddep" id="requesteddep" class="form-control"
                                    placeholder="Slug"> -->

                                    <?php

                                    if ($_SESSION['userrole'] == "admin") {

                                        echo '<select name="userid" id="userid" class="form-control">';
                                        $query = "SELECT * FROM dpousermasterfile ";
                                        $app = new App;
                                        $departments = $app->selectAll($query);
                                        foreach ($departments as $department) {
                                            echo '<option value=' . $department->userid . '> ' . $department->userfullname . ' | ' . $department->userposition . ' | ' . $department->userdepartment . '</option>';
                                        }
                                        echo '</select>';


                                    } else {
                                        $req = $_SESSION['userid'];

                                        $query = "SELECT * FROM dpousermasterfile WHERE userid='$req' ";
                                        $app = new App;
                                        $userreqs = $app->selectAll($query);


                                        foreach ($userreqs as $userreq) {
                                            // $userdep->userid;
                                    

                                            echo '<input type="hidden" value=' . $userreq->userid . ' name="userid" class="form-control">';
                                            echo '<input type="text" readonly class="form-control" value="' . $userreq->userfullname . ' : ' . $userreq->userposition . '">';

                                        }
                                    }
                                    ?>



                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="col-md-6">
                                    <label for="email">Department/ Division Head</label>

                                    <?php
                                    if ($_SESSION['userrole'] == "admin") {
                                        echo '<select name="depuserid" id="depuserid" class="form-control">';

                                        // $dep = $_SESSION['userdepartment'];
                                        $query = "SELECT * FROM dpodepartmenthead ";
                                        $app = new App;
                                        $departments = $app->selectAll($query);
                                        foreach ($departments as $department) {
                                            // echo $department->userid;
                                    
                                            $query = "SELECT * FROM usermasterfile WHERE userid='$department->userid' ";
                                            $app = new App;
                                            $userdeps = $app->selectAll($query);


                                            foreach ($userdeps as $userdep) {
                                                // $userdep->userid;
                                    
                                                echo '<option value=' . $userdep->userid . '>  ' . $userdep->userid . ' | ' . $userdep->userfullname . ' | ' . $userdep->userposition . ' | ' . $userdep->userdepartment . '</option>';

                                                // echo '<input type="hidden" value=' . $userdep->userid . ' name="depuserid" class="form-control">';
                                                // echo '<input type="text" readonly class="form-control" value="' . $userdep->userfullname . '  ' . $userdep->userposition . '">';
                                    
                                            }

                                        }
                                        echo '</select>';

                                    } else {
                                        $dep = $_SESSION['userdepartment'];
                                        $query = "SELECT * FROM dpodepartmenthead WHERE department='$dep' ";
                                        $app = new App;
                                        $departments = $app->selectAll($query);
                                        foreach ($departments as $department) {
                                            // echo $department->userid;
                                    
                                            $query = "SELECT * FROM dpousermasterfile WHERE userid='$department->userid' ";
                                            $app = new App;
                                            $userdeps = $app->selectAll($query);


                                            foreach ($userdeps as $userdep) {
                                                // $userdep->userid;
                                    

                                                echo '<input type="hidden" value=' . $userdep->userid . ' name="depuserid" class="form-control">';
                                                echo '<input type="text" readonly class="form-control" value="' . $userdep->userfullname . '  ' . $userdep->userposition . '">';

                                            }
                                        }
                                    }

                                    ?>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Description</label>
                                        <textarea class="form-control" id="description" name="description"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Purpose</label>
                                        <div class="form-check">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="collection"
                                                        value="1" name="collection"><label
                                                        class="form-check-label">COLLECTION</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="process"
                                                        value="1" name="process">
                                                    <label class="form-check-label">PROCESS</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="blocking"
                                                        value="1" name="blocking"><label
                                                        class="form-check-label">BLOCKING</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="modification"
                                                        value="1" name="modification">
                                                    <label class="form-check-label">MODIFICATION</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="consultation"
                                                        value="1" name="consultation"><label
                                                        class="form-check-label">CONSULTATION</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="transfer"
                                                        value="1" name="transfer">
                                                    <label class="form-check-label">TRANSFER OF
                                                        DEVICE/WORKSTATION</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="storage"
                                                        value="1" name="storage"><label
                                                        class="form-check-label">STORAGE</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="sharing"
                                                        value="1" name="sharing">
                                                    <label class="form-check-label">SHARING (EXTERNAL)</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="destruction"
                                                        value="1" name="destruction"><label
                                                        class="form-check-label">DESTRUCTION</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="access"
                                                        value="1" name="access">
                                                    <label class="form-check-label">ACCESS</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="erasure"
                                                        value="1" name="erasure"><label
                                                        class="form-check-label">ERASURE</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Type of Sensitive Data</label>
                                        <div class="form-check">
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="pii" name="pii"
                                                    value="1"><label class="form-check-label">PERSONALITY
                                                    IDENTITY
                                                    INFORMATION(PII)</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="phi" name="phi"
                                                    value="1">
                                                <label class="form-check-label">PROTECTED HEALTH
                                                    INFORMATION(PHI)</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="ibi" name="ibi"
                                                    value="1"><label class="form-check-label">INTERNAL
                                                    BUSINESS INFORMATION(IBI)</label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Upload the approved documents here</label>
                                        <div class="form-check">
                                            <div class="col-md-6">
                                                <input type="file" name="checkprofilephoto"
                                                    class="form-control-file border">

                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="submit">Create</button>
                    <a href="request.php" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </form>
</div>
<!-- /.content-wrapper --><?php require "../../footer1.php"; ?>