<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>


<?php if (isset($_POST['submit'])) {
    // $sharingid = $_POST['sharingid'];
    echo $userid = $_POST['depuserid'];
    echo $datetoday = $_POST['datetoday'];
    echo $datacollected = $_POST['datacollected'];
    echo $purpose = $_POST['purpose'];
    echo $otherpurpose = $_POST['otherpurpose'];
    echo $dateuse = $_POST['dateuse'];
    echo $dateto = $_POST['dateto'];
    echo $requesteddep = $_POST['requesteddep'];
    echo $depuserid = $_POST['depuserid'];
    // $status = $_POST['status'];
    // $remarks = $_POST['remarks'];
    $query = "INSERT INTO dposharing (userid, datetoday, datacollected, purpose, otherpurpose, dateuse, dateto, requesteddep, depuserid)
     VALUES(:userid, :datetoday, :datacollected, :purpose, :otherpurpose, :dateuse, :dateto, :requesteddep, :depuserid)";
    $arr = [
        ":userid" => $userid,
        ":datetoday" => $datetoday,
        ":datacollected" => $datacollected,
        ":purpose" => $purpose,
        ":otherpurpose" => $otherpurpose,
        ":dateuse" => $dateuse,
        ":dateto" => $dateto,
        ":requesteddep" => $requesteddep,
        ":depuserid" => $depuserid,

    ];



    $path = "datasharing.php";
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
                    <h1>Data Sharing Form</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="datasharing.php" class="btn btn-primary">Back</a>
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
                    <h1 class="h5 mb-3">Data Sharing is the disclosure of transfer to a third party of personal data
                        under the control
                        or custudy of a personal information controller</h1>

                </div><br>
                <form class="row g-3" method="POST" action="create-datasharing.php">

                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category">Department</label>



                                        <?php
                                        if ($_SESSION['userrole'] == "admin") {
                                            echo '<select name="userid" id="userid" class="form-control">';
                                            $query = "SELECT * FROM dpousermasterfile";
                                            $app = new App;
                                            $departments = $app->selectAll($query);
                                            foreach ($departments as $department) {
                                                echo '<option value=' . $department->userid . '>' . $department->userdepartment . '' . $department->userfullname . '</option>';
                                            }
                                            echo '</select>';
                                        } else {
                                            echo '<input type="text" name="userid" id="userid"
                                    value=' . $_SESSION['userdepartment'] . ' class="form-control"
                                   >';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Date</label>
                                    <input type="text" readonly name="datetoday" id="datetoday"
                                        value="<?php echo "" . date("Y-m-d") . ""; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Specipic description of data being requested:</label>
                                    <input type="text" name="datacollected" id="datacollected" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">State purpose/s to where the data will be used for:</label>
                                    <input type="text" name="purpose" id="purpose" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Aside from the aforementioned employee/s, are ther other
                                            individuals who will be receipient/s or user/s of the data requested?
                                            If answer is "Yes". specify the name/s and profile of such individual/s
                                            and
                                            provide justification on why such requested data shall be shared to said
                                            individual/s.
                                        </label>
                                        <textarea class="form-control" id="otherpurpose" name="otherpurpose"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-6">
                                    <label for="email">State period of use of the required data: Form</label>
                                    <input type="date" name="dateuse" id="dateuse" class="form-control"
                                        placeholder="Slug">
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="col-md-6">
                                    <label for="email">To:</label>


                                    <input type="date" name="dateto" id="dateto" class="form-control"
                                        placeholder="Slug">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-6">
                                    <label for="email">Requested By: (format ex: Name|Department )</label>
                                    <!-- <input type="text" name="requesteddep" id="requesteddep" class="form-control"
                                    placeholder="Slug"> -->

                                    <?php

                                    if ($_SESSION['userrole'] == "admin") {

                                        echo '<select name="requesteddep" id="requesteddep" class="form-control">';
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
                                    

                                            echo '<input type="hidden" value=' . $userreq->userid . ' name="requesteddep" class="form-control">';
                                            echo '<input type="text" disabled class="form-control" value="' . $userreq->userfullname . ' : ' . $userreq->userposition . '">';

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
                                    
                                            $query = "SELECT * FROM dpousermasterfile WHERE userid='$department->userid' ";
                                            $app = new App;
                                            $userdeps = $app->selectAll($query);


                                            foreach ($userdeps as $userdep) {
                                                // $userdep->userid;
                                    
                                                echo '<option value=' . $userdep->userid . '>  ' . $userdep->userid . ' | ' . $userdep->userfullname . ' | ' . $userdep->userposition . ' | ' . $userdep->userdepartment . '</option>';

                                                // echo '<input type="hidden" value=' . $userdep->userid . ' name="depuserid" class="form-control">';
                                                // echo '<input type="text" disabled class="form-control" value="' . $userdep->userfullname . '  ' . $userdep->userposition . '">';
                                    
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
                                                echo '<input type="text" disabled class="form-control" value="' . $userdep->userfullname . '  ' . $userdep->userposition . '">';

                                            }
                                        }
                                    }

                                    ?>
                                </div>
                            </div>


                        </div>
                    </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" name="submit" id="submit">Create</button>

                <a href="brands.php" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
            </form>

        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --><?php require "../../footer1.php"; ?>