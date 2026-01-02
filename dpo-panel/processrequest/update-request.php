<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php


if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    // $query = "SELECT * FROM datainventory where datainventoryid='$id'";
    $query = "SELECT * FROM dporequest where requestid='$id'";
    $app = new App;
    $requests = $app->selectAll($query);

}
?>

<?php if (isset($_POST['submit'])) { 
    echo $userid=$_POST['userid']; 
echo $date=$_POST['date']; 
echo    $depuserid=$_POST['depuserid']; 
    echo $description=$_POST['description']; 
    echo $blocking=isset($_POST['blocking']) ?    $_POST['blocking'] : 0; 
    echo $collection=isset($_POST['collection']) ? $_POST['collection'] : 0; 
    echo    $consultation=isset($_POST['consultation']) ? $_POST['consultation'] : 0; 
    echo $storage=isset($_POST['storage']) ?    $_POST['storage'] : 0; 
    echo $destruction=isset($_POST['destruction']) ? $_POST['destruction'] : 0; 
    echo    $process=isset($_POST['process']) ? $_POST['process'] : 0; 
    echo $modification=isset($_POST['modification']) ?    $_POST['modification'] : 0; 
    echo $transfer=isset($_POST['transfer']) ? $_POST['transfer'] : 0; 
    echo    $request=isset($_POST['sharing']) ? $_POST['sharing'] : 0; 
    echo $access=isset($_POST['access']) ? $_POST['access'] :    0; 
        echo $erasure=isset($_POST['erasure']) ? $_POST['erasure'] : 0; 
    echo $pii=isset($_POST['pii']) ? $_POST['pii'] :    0; 
    echo $phi=isset($_POST['phi']) ? $_POST['phi'] : 0; 
    echo $ibi=isset($_POST['ibi']) ? $_POST['ibi'] : 0; 
    echo    $file=$_POST['file']; 
    echo $status="0" ; 
    echo $remarks="0" ; 
    echo $id=$_POST['id']; 

    $query="UPDATE dporequest SET userid=:userid, date=:date, depuserid=:depuserid, description=:description, collection=:collection, blocking=:blocking, consultation=:consultation, storage=:storage, destruction=:destruction, process=:process, modification=:modification, transfer=:transfer, sharing=:sharing, access=:access, erasure=:erasure, pii=:pii, phi=:phi, ibi=:ibi, file=:file, status=:status, remarks=:remarks WHERE requestid='$id'"
    ; $arr=[ ":userid"=> $userid,
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
    ":sharing" => $request,
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
    $app->update($query, $arr, $path);



    }
    ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Request Form</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="request.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <form class="row g-3" method="POST" action="update-request.php">

        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="card">
                    <?php foreach ($requests as $request): ?>
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3">The DPO will ensure all the process will regards to data privaxcxy are
                            well
                            documented.</h1>

                    </div><br>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name">Date</label>
                                    <input type="text" name="date" id="date" class="form-control"
                                        value="<?php echo $request->date ?>" readonly>
                                    <input type="hidden" name="id" id="id" class="form-control"
                                        value="<?php echo $request->requestid ?>">
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

                                        $query = "SELECT * FROM dpousermasterfile WHERE userid='$request->userid' ";
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
                            <!-- <div class="col-md-8">
                                <div class="col-md-6">
                                    <label for="email">Department/ Division Head</label>

                                    <?php
            if ($_SESSION['userrole'] == "admin") {
                // echo '<select name="depuserid" id="depuserid" class="form-control">';
        
                // $dep = $_SESSION['userdepartment'];
                $query = "SELECT * FROM dpodepartmenthead WHERE userid='$request->depuserid' ";
                $app = new App;
                $departments = $app->selectAll($query);
                foreach ($departments as $department) {
                    // echo $department->userid;
        
                    $query = "SELECT * FROM dpousermasterfile WHERE userid='$request->depuserid' ";
                    $app = new App;
                    $userdeps = $app->selectAll($query);


                    foreach ($userdeps as $userdep) {
                        // $userdep->userid;
        
                        // echo '<option value=' . $userdep->userid . '>  ' . $userdep->userid . ' | ' . $userdep->userfullname . ' | ' . $userdep->userposition . ' | ' . $userdep->userdepartment . '</option>';
                        echo '<input  type="hidden" value=' . $userdep->userid . ' name="depuserid" class="form-control">';
                        echo '<input type="text" disabled class="form-control" value="' . $userdep->userfullname . ' : ' . $userdep->userposition . '">';

                        // echo '<input type="hidden" value=' . $userdep->userid . ' name="depuserid" class="form-control">';
                        // echo '<input type="text" disabled class="form-control" value="' . $userdep->userfullname . '  ' . $userdep->userposition . '">';
        
                    }

                }
                // echo '</select>';
        
            } else {
                // $dep = $_SESSION['userdepartment'];
                // $query = "SELECT * FROM departmenthead WHERE department='$dep' ";
                // $app = new App;
                // $departments = $app->selectAll($query);
                // foreach ($departments as $department) {
                // echo $department->userid;
        
                $query = "SELECT * FROM dpousermasterfile WHERE userid='$request->depuserid' ";
                $app = new App;
                $userdeps = $app->selectAll($query);


                foreach ($userdeps as $userdep) {
                    // $userdep->userid;
        

                    echo '<input type="hidden" value=' . $userdep->userid . ' name="depuserid" class="form-control">';
                    echo '<input type="text" disabled class="form-control" value="' . $userdep->userfullname . '  ' . $userdep->userposition . '">';

                }
                // }
            }

            ?>
                                </div>
                            </div> -->
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
                                
                                            $query = "SELECT * FROM dpousermasterfile WHERE userid='$department->userid' ";
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
                                        // $dep = $_SESSION['userdepartment'];

                                        
                                      
                                            // echo $department->userid;
                                
                                            $query = "SELECT * FROM dpousermasterfile WHERE userid='$request->depuserid' ";
                                            $app = new App;
                                            $userdeps = $app->selectAll($query);


                                            foreach ($userdeps as $userdep) {

                                            $query = "SELECT * FROM dpodepartmenthead WHERE department='$userdep->userdepartment' ";
                                            $app = new App;
                                            $departments = $app->selectAll($query);
                                            foreach ($departments as $department) {

                                                // $userdep->userid;
                                                $query = "SELECT * FROM dpousermasterfile WHERE userid='$department->userid' ";
                                                $app = new App;
                                                $userdep1s = $app->selectAll($query);


                                                foreach ($userdep1s as $userdep1) {

                                                    // echo '<input type="hidden" value=' . $userdep->userid . ' name="depuserid" class="form-control">';
                                                    // echo '<input type="text" readonly class="form-control" value="' . $userdep->userfullname . '  ' . $userdep->userposition . '">';
                                                    echo '<input type="text" readonly class="form-control" value=" ' . $userdep1->userid . ' | ' . $userdep1->userfullname . ' | ' . $userdep1->userposition . ' | ' . $userdep1->userdepartment . '">';
                                                    //  ' . $userdep1->userid . ' | ' . $userdep1->userfullname . ' | ' . $userdep1->userposition . ' | ' . $userdep1->userdepartment . '
                                                }
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
                                            rows="3"><?php echo $request->description ?></textarea>
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
                                                        name="collection" value="1"
                                                        <?php  if ($request->collection == "1") { echo "checked"; } else {    } ?>>
                                                    <label class="form-check-label">COLLECTION</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="process"
                                                        name="process" value="1" <?php if ($request->process == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?>>
                                                    <label class="form-check-label">PROCESS</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="blocking"
                                                        name="blocking" value="1" <?php if ($request->blocking == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?>><label class="form-check-label">BLOCKING</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="modification"
                                                        name="modification" value="1" <?php if ($request->modification == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?>>
                                                    <label class="form-check-label">MODIFICATION</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="consultation"
                                                        name="consultation" value="1" <?php if ($request->consultation == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?>><label class="form-check-label">CONSULTATION</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="transfer"
                                                        name="transfer" value="1" <?php if ($request->transfer == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?>>
                                                    <label class="form-check-label">TRANSFER OF
                                                        DEVICE/WORKSTATION</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="storage"
                                                        name="storage" value="1" <?php if ($request->storage == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?>><label class="form-check-label">STORAGE</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="sharing"
                                                        name="sharing" value="1" <?php if ($request->sharing == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?>>
                                                    <label class="form-check-label">SHARING (EXTERNAL)</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="destruction"
                                                        name="destruction" value="1" <?php if ($request->destruction == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?>><label class="form-check-label">DESTRUCTION</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="access"
                                                        name="access" value="1" <?php if ($request->access == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?>>
                                                    <label class="form-check-label">ACCESS</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" id="erasure"
                                                        name="erasure" value="1" <?php if ($request->erasure == "1") {
                                                        echo "checked";
                                                    } else {
                                                    } ?>><label class="form-check-label">ERASURE</label>
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
                                                    value="1" <?php if ($request->pii == "1") {
                                                    echo "checked";
                                                } else {
                                                } ?>><label class="form-check-label">PERSONALITY
                                                    IDENTITY
                                                    INFORMATION(PII)</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="phi" name="phi"
                                                    value="1" <?php if ($request->phi == "1") {
                                                    echo "checked";
                                                } else {
                                                } ?>>
                                                <label class="form-check-label">PROTECTED HEALTH
                                                    INFORMATION(PHI)</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="ibi" name="ibi"
                                                    value="1" <?php if ($request->ibi == "1") {
                                                    echo "checked";
                                                } else {
                                                } ?>><label class="form-check-label">INTERNAL
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
                                                <input type="file" class="form-control-file border" name="file">
                                                <a href="download.php?id=<?php echo $request->file ?>" target="_thapa">
                                                    <?php echo $request->file ?> View
                                                    Documents</a>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="submit">Update</button>
                    <a href="request.php" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
    </form>
    <?php endforeach; ?>
    <!-- <?php

    // Store the file name into variable
    $file = $_GET['id'];
    $filename = $_GET['id'];

    // Header content type
    header('Content-type: application/pdf');
    header('Content-Disposition: inline;
    filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');

    // Read the file
    @readfile($file);

    ?> -->

    <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --><?php require "../../footer1.php"; ?>