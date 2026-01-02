<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_POST['submit'])) {

    echo $datetoday = $_POST['datetoday'];
    echo $dateincident = $_POST['dateincident'];
    echo $time = $_POST['time'];
    echo $whonotified = $_POST['whonotified'];
    echo $timenotification = $_POST['timenotification'];
    echo $description = $_POST['description'];
    echo $witness = $_POST['witness'];
    echo $involved1 = isset($_POST['involved1']) ? $_POST['involved1'] : 0;
    echo $involved2 = isset($_POST['involved2']) ? $_POST['involved2'] : 0;
    echo $involved3 = isset($_POST['involved3']) ? $_POST['involved3'] : 0;
    echo $involved4 = isset($_POST['involved4']) ? $_POST['involved4'] : 0;
    echo $involved5 = isset($_POST['involved5']) ? $_POST['involved5'] : 0;
    echo $involved6 = isset($_POST['involved6']) ? $_POST['involved6'] : 0;
    echo $involved7 = isset($_POST['involved7']) ? $_POST['involved7'] : 0;
    echo $involved8 = isset($_POST['involved8']) ? $_POST['involved8'] : 0;
    echo $involved9 = isset($_POST['involved9']) ? $_POST['involved9'] : 0;
    echo $involved10 = isset($_POST['involved10']) ? $_POST['involved10'] : 0;
    echo $involved11 = isset($_POST['involved11']) ? $_POST['involved11'] : 0;
    echo $involved12 = isset($_POST['involved12']) ? $_POST['involved12'] : 0;
    echo $involved13 = isset($_POST['involved13']) ? $_POST['involved13'] : 0;
    echo $involved14 = isset($_POST['involved14']) ? $_POST['involved14'] : 0;
    echo $involved15 = isset($_POST['involved15']) ? $_POST['involved15'] : 0;
    echo $documents = $_POST['documents'];
    echo $compromised = isset($_POST['compromised']) ? $_POST['compromised'] : 0;
    echo $reportedto1 = isset($_POST['reportedto1']) ? $_POST['reportedto1'] : 0;
    echo $reportedto2 = isset($_POST['reportedto2']) ? $_POST['reportedto2'] : 0;
    echo $reportedto3 = isset($_POST['reportedto3']) ? $_POST['reportedto3'] : 0;
    echo $reportedto4 = isset($_POST['reportedto4']) ? $_POST['reportedto4'] : 0;
    echo $reportedto5 = isset($_POST['reportedto5']) ? $_POST['reportedto5'] : 0;



    // echo $userdepartment = $_SESSION['userdepartment'];
    echo $userid = $_POST['userid'];

    $query = "INSERT INTO dpoincident (userid, datetoday, dateincident, time, whonotified, timenotification, description, witness, involved1, involved2, involved3, involved4, involved5, involved6, involved7, involved8, involved9, involved10, involved11, involved12, involved13, involved14, involved15, documents, compromised, reportedto1, reportedto2, reportedto3, reportedto4, reportedto5)
VALUES(:userid, :datetoday, :dateincident, :time, :whonotified, :timenotification, :description, :witness, :involved1, :involved2, :involved3, :involved4, :involved5, :involved6, :involved7, :involved8, :involved9, :involved10, :involved11, :involved12, :involved13, :involved14, :involved15, :documents, :compromised, :reportedto1, :reportedto2, :reportedto3, :reportedto4, :reportedto5)";
    $arr = [


        ":userid" => $userid,
        ":datetoday" => $datetoday,
        ":dateincident" => $dateincident,
        ":time" => $time,
        ":whonotified" => $whonotified,
        ":timenotification" => $timenotification,
        ":description" => $description,
        ":witness" => $witness,
        ":involved1" => $involved1,
        ":involved2" => $involved2,
        ":involved3" => $involved3,
        ":involved4" => $involved4,
        ":involved5" => $involved5,
        ":involved6" => $involved6,
        ":involved7" => $involved7,
        ":involved8" => $involved8,
        ":involved9" => $involved9,
        ":involved10" => $involved10,
        ":involved11" => $involved11,
        ":involved12" => $involved12,
        ":involved13" => $involved13,
        ":involved14" => $involved14,
        ":involved15" => $involved15,
        ":documents" => $documents,
        ":compromised" => $compromised,
        ":reportedto1" => $reportedto1,
        ":reportedto2" => $reportedto2,
        ":reportedto3" => $reportedto3,
        ":reportedto4" => $reportedto4,
        ":reportedto5" => $reportedto5,

    ];



    $path = "../incident/incident.php";
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
                    <h1>Incident Form</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="incident.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form class="row g-3" method="POST" action="create-incident.php">

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3">Immediately upon discovering a posible data security incident, employyes
                            must
                            file an incident report with Data Privact Officer.</h1>

                    </div><br>

                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name">Reported By:</label>
                                    <input type="hidden" name="userid" id="userid"
                                        value="<?php echo $_SESSION['userid'] ?>">
                                    <input type="text" name="name" id="name"
                                        value="<?php echo $_SESSION['userfullname'] ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Department/Division</label>
                                    <input disabled type="text" name="slug" id="slug"
                                        value="<?php echo $_SESSION['userdepartment'] ?>" class="form-control" disabled>


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
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Today Date</label>
                                    <input type="text" readonly name="datetoday" id="datetoday" class="form-control"
                                        value="<?php echo "" . date("Y-m-d") . ""; ?>" unabled>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Date of Incident</label>
                                    <input type="date" name="dateincident" id="dateincident" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Time of Incident</label>
                                    <input type="time" name="time" id="time" class="form-control" placeholder="Slug">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Who was notified</label>
                                    <input type="text" name="whonotified" id="whonotified" class="form-control"
                                        placeholder="Who was notified">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Time of Notification</label>
                                    <input type="time" name="timenotification" id="timenotification"
                                        class="form-control" p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Breif Description of incident:(include website URl, suspec
                                            name(s), impacted system(s), other relevant data.. )</label>
                                        <textarea class="form-control" name="description" id="description"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Did other witness the incident?(if yes, specipic below)</label>
                                    <input type="text" name="witness" id="witness" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">To your knowledge was any of the following involved</label>
                                        <div class="form-check">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved1"><label class="form-check-label">Communication
                                                        Failure</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved2">
                                                    <label class="form-check-label">Dissaster Damage</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved3"><label class="form-check-label">Hardware
                                                        Attack</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved4">
                                                    <label class="form-check-label">Illigal Exposure</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved5"><label class="form-check-label">Malware
                                                        Infection</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved6">
                                                    <label class="form-check-label">System Attack</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved7"><label class="form-check-label">Unauthorize
                                                        Access</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved8">
                                                    <label class="form-check-label">Cyber Attack</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved9"><label class="form-check-label">Fraud</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved10">
                                                    <label class="form-check-label">Illigal Disclosure</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved11"><label
                                                        class="form-check-label">Insider</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved12"><label class="form-check-label">Malicious
                                                        Code</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved13"><label class="form-check-label">Physical
                                                        Damage</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved14"><label class="form-check-label">System
                                                        Failure</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="involved15"><label class="form-check-label">Unauthorized
                                                        Priveledge</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Upload any supporting documents here</label>
                                        <div class="form-check">
                                            <div class="col-md-6">
                                                <input type="file" name="documents" class="form-control-file border">

                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Was any external company compremised?</label>
                                        <div class="form-check">
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="compromised"><label class="form-check-label">If your
                                                    answer
                                                    is NO just leave it blank and proceed to the next question.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-8">
                                <div class="mb-3">

                                    <div class="form-group">
                                        <label for="email">Did you report this incident to:(you can add multiples
                                            choices)</label>
                                        <div class="form-check">
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="reportedto1"><label
                                                    class="form-check-label">Management</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="reportedto2">
                                                <label class="form-check-label">MIS</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="reportedto3"><label class="form-check-label">DPO</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="reportedto4"><label class="form-check-label">Law
                                                    Enforsement</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="reportedto5"><label class="form-check-label">NPC</label>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit" name="submit">Create</button>
                    <a href="incident.php" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --><?php require "../../footer1.php"; ?>