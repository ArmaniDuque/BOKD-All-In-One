<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $query = "SELECT * FROM itconcern where concernid=$id";
    $app = new App;
    $concerns = $app->selectAll($query);

}
?>


<?php
if (isset($_POST['submit'])) {

    echo $id = $_POST['id'];
    echo $datereported = $_POST['datereported'];
    // echo $dateaccomplish = " ";
    echo $description = $_POST['description'];
    echo $concerntypes = $_POST['concerntypes'];
    echo $errortypes = $_POST['errortypes'];
    echo $reportedby = $_POST['reportedby'];
    echo $status = $_POST['status'];

    if ($status == "Done") {
        echo $dateaccomplish = date("Y-d-m");

    } else {

        echo $dateaccomplish = " ";
    }

    echo $remarks = $_POST['remarks'];


    $query = "UPDATE itconcern SET datereported=:datereported, dateaccomplish=:dateaccomplish, description=:description
    , concerntypes=:concerntypes, errortypes=:errortypes , reportedby=:reportedby
    , remarks=:remarks, status=:status
     WHERE systemid='$id'";

    $arr = [
        ":datereported" => $datereported,
        ":dateaccomplish" => $dateaccomplish,
        ":description" => $description,
        ":concerntypes" => $concerntypes,
        ":errortypes" => $errortypes,
        ":reportedby" => $reportedby,
        ":remarks" => $remarks,
        ":status" => $status,

    ];

    $path = "concern.php";
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
                    <h1>Update Concern</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="concern.php" class="btn btn-primary">Back</a>
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
                    <h1 class="h5 mb-3"><b>Update Concern</h1>


                </div><br>
                <!-- /.BODY -->
                <form class="row g-3" method="POST" action="update-concern.php">
                    <?php foreach ($concerns as $concern): ?>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="name">Date</label>
                                    <input type="text" readonly name="datereported" id="datereported" class="form-control"
                                        value="<?php echo "" . date("Y-d-m") . ""; ?>">

                                    <input type="hidden" name="id" id="id" class="form-control"
                                        value="<?php echo $concern->systemid ?>">

                                </div>
                                <div class="col-md-8"> <label for="email">: </label></div>
                                <div class="col-md-6">
                                    <label for="email">Requested By: </label>

                                    <?php
                                    echo '<select disabled name="reportedby" id="reportedby" class="form-control">';
                                    $query = "SELECT * FROM itusermasterfile where userid=$concern->reportedby ";
                                    $app = new App;
                                    $departments = $app->selectAll($query);
                                    foreach ($departments as $department) {
                                        echo '<option value=' . $department->userid . '> ' . $department->userfullname . ' | ' . $department->userposition . ' | ' . $department->userdepartment . '</option>';
                                    }
                                    echo '</select>';
                                    ?>



                                </div>
                                <div class="col-md-6">
                                    <label for="email">Requested To: </label>

                                    <?php
                                    if ($_SESSION['userrole'] == "admin") {
                                        echo '<select name="depuserid" id="depuserid" class="form-control">';

                                        // $dep = $_SESSION['userdepartment'];
                                        $query = "SELECT * FROM itdepartmenthead ";
                                        $app = new App;
                                        $departments = $app->selectAll($query);
                                        foreach ($departments as $department) {
                                            // echo $department->userid;
                                
                                            $query = "SELECT * FROM itusermasterfile WHERE userid='$department->userid' ";
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
                                
                                        $query = "SELECT * FROM itusermasterfile WHERE userid='$concern->reportedto' ";
                                        $app = new App;
                                        $userdeps = $app->selectAll($query);


                                        foreach ($userdeps as $userdep) {

                                            $query = "SELECT * FROM itdepartmenthead WHERE department='$userdep->userdepartment' ";
                                            $app = new App;
                                            $departments = $app->selectAll($query);
                                            foreach ($departments as $department) {

                                                // $userdep->userid;
                                                $query = "SELECT * FROM itusermasterfile WHERE userid='$department->userid' ";
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

                                <div class="col-md-4">
                                    <label for="name">Area/ Location</label>
                                    <input type="text" readonly name="arealocation" id="arealocation" class="form-control"
                                        value="<?php echo $concern->arealocation ?>">

                                </div>
                                <div class="col-md-4">
                                    <label for="category">Types</label>
                                    <select disabled name="concerntypes" id="concerntypes" class="form-control">
                                        <option value="<?php echo $concern->concerntypes ?>">
                                            <?php echo $concern->concerntypes ?>
                                        </option>
                                        <option value="Request">Request</option>
                                        <option value="Concern">Concern</option>

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="category">Prior</label>
                                    <select disabled name="prior" id="prior" class="form-control">
                                        <option value="<?php echo $concern->prior ?>">
                                            <?php echo $concern->prior ?>
                                        </option>
                                        <option value="Priority">Priority</option>
                                        <option value="NotPriority">Not Priority</option>
                                        <option value="Schedule">For Schedule</option>

                                    </select>
                                </div>

                                <div class="col-md-8">

                                    <div class="form-group">
                                        <label for="email">Description</label>
                                        <textarea readonly class="form-control" id="description" name="description"
                                            rows="3"><?php echo $concern->description ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><label for="email">Completed by

                                        <?php


                                        $query = "SELECT * FROM itusermasterfile  where userid=$concern->reportedto ";
                                        $app = new App;
                                        $department1s = $app->selectAll($query);
                                        foreach ($department1s as $department1) {
                                            // echo '<option value=' . $department->userid . '> ' . $department->userdepartment . '</option>';
                                            // echo '<input type="text" name="reportedto" id="reportedto" class="form-control"
                                            // value="'.$department->userdepartment .'">';
                                            echo $department1->userdepartment;
                                        }
                                        ?>




                                    </label>
                                    </br>
                                    </br></div>
                                <div class="col-md-4">
                                    <label for="category">Types of Error</label>
                                    <select name="errortypes" id="errortypes" class="form-control">
                                        <option value="Human">Human Error</option>
                                        <option value="System">System Error</option>

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="category">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Done">Done</option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Pending">Pending</option>

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="category">For</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Job Order">Job Order</option>
                                        <option value="Approval">Approval</option>

                                    </select>
                                </div>
                                <div class="col-md-8">

                                    <div class="form-group">
                                        <label for="email">Remarks</label>
                                        <textarea class="form-control" id="remarks" name="remarks"
                                            rows="3"><?php echo $concern->remarks ?></textarea>
                                    </div>
                                </div>






                            </div>
                        </div>
                    <?php endforeach; ?>

            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" name="submit">Save</button>
                <a href="concern.php" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
            </form>
        </div>
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