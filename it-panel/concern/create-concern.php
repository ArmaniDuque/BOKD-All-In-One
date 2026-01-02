<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_POST['submit'])) {

    echo $datereported = $_POST['datereported'];
    // echo $dateaccomplish = " ";
    echo $description = $_POST['description'];
    echo $arealocation = $_POST['arealocation'];
    echo $concerntypes = $_POST['concerntypes'];
    // echo $errortypes = " ";
    echo $reportedby = $_POST['reportedby'];
    echo $reportedto = $_POST['reportedto'];
    echo $prior = $_POST['prior'];

    // Warning: Undefined array key "reportedto" in C:\xampp\htdocs\Laravel10\ITSystem\admin-panel\concern\create-concern.php on line 13
    echo $status = "Pending";
    // echo $remarks = " ";

    $query = "INSERT INTO itconcern (datereported, description, arealocation, concerntypes, reportedby, reportedto, prior, status)
VALUES(:datereported, :description, :arealocation, :concerntypes, :reportedby, :reportedto, :prior, :status )";
    $arr = [
        ":datereported" => $datereported,
        // ":dateaccomplish" => $dateaccomplish,
        ":description" => $description,
        ":arealocation" => $arealocation,
        ":concerntypes" => $concerntypes,
        // ":errortypes" => $errortypes,
        ":reportedby" => $reportedby,
        ":reportedto" => $reportedto,
        ":prior" => $prior,
        // ":remarks" => $remarks,
        ":status" => $status,

    ];

    $path = "concern.php";
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
                    <h1>Create Concern</h1>
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
                    <h1 class="h5 mb-3"><b>Add Concern</h1>


                </div><br>
                <!-- /.BODY -->

                <form class="row g-3" method="POST" action="create-concern.php">

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="name">Date</label>
                                <input type="text" readonly name="datereported" id="datereported" class="form-control"
                                    value="<?php echo "" . date("Y-d-m") . ""; ?>">

                            </div>
                            <div class="col-md-8">
                                <label for="email">: </label>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Requested By: </label>
                                <!-- <input type="text" name="requesteddep" id="requesteddep" class="form-control"
                                    placeholder="Slug"> -->

                                <?php


                                echo '<select name="reportedby" id="reportedby" class="form-control">';
                                $query = "SELECT * FROM itusermasterfile ";
                                $app = new App;
                                $departments = $app->selectAll($query);
                                foreach ($departments as $department) {
                                    echo '<option value=' . $department->userid . '> ' . $department->userfullname . ' | ' . $department->userposition . ' | ' . $department->userdepartment . '</option>';
                                }
                                echo '</select>';


                                // } else {
                                //     $req = $_SESSION['userid'];
                                
                                //     $query = "SELECT * FROM usermasterfile WHERE userid='$req' ";
                                //     $app = new App;
                                //     $userreqs = $app->selectAll($query);
                                

                                //     foreach ($userreqs as $userreq) {
                                //         // $userdep->userid;
                                

                                //         echo '<input type="hidden" value=' . $userreq->userid . ' name="userid" class="form-control">';
                                //         echo '<input type="text" readonly class="form-control" value="' . $userreq->userfullname . ' : ' . $userreq->userposition . '">';
                                
                                //     }
                                // }
                                ?>



                            </div>

                            <div class="col-md-6">
                                <label for="email">Requested To: </label>
                                <?php
                                if ($_SESSION['userrole'] == "admin") {
                                    echo '<select name="reportedto" id="reportedto" class="form-control">';

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
                                
                                            echo '<option value=' . $userdep->userid . '>  ' . $userdep->userdepartment . '</option>';
                                            // echo '<option value=' . $userdep->userid . '>  ' . $userdep->userid . ' | ' . $userdep->userfullname . ' | ' . $userdep->userposition . ' | ' . $userdep->userdepartment . '</option>';
                                
                                            // echo '<input type="hidden" value=' . $userdep->userid . ' name="depuserid" class="form-control">';
                                            // echo '<input type="text" readonly class="form-control" value="' . $userdep->userfullname . '  ' . $userdep->userposition . '">';
                                
                                        }

                                    }
                                    echo '</select>';

                                } else {
                                    $dep = $_SESSION['userdepartment'];
                                    $query = "SELECT * FROM itdepartmenthead WHERE department='$dep' ";
                                    $app = new App;
                                    $departments = $app->selectAll($query);
                                    foreach ($departments as $department) {
                                        // echo $department->userid;
                                
                                        $query = "SELECT * FROM itusermasterfile WHERE userid='$department->userid' ";
                                        $app = new App;
                                        $userdeps = $app->selectAll($query);


                                        foreach ($userdeps as $userdep) {
                                            // $userdep->userid;
                                

                                            echo '<input type="hidden" value=' . $userdep->userid . ' name="reportedto" class="form-control">';
                                            echo '<input type="text" readonly class="form-control" value="' . $userdep->userfullname . '  ' . $userdep->userposition . '">';

                                        }
                                    }
                                }

                                ?>

                            </div>
                            <!-- <div class="col-md-4">
                                <label for="category">System</label>
                                <select name="concerntypes" id="concerntypes" class="form-control">
                                    <option value="HMS">Hotel Management System</option>
                                    <option value="POS">Point of Sales</option>
                                    <option value="INV">Inventory System</option>

                                </select>
                            </div> -->

                            <div class="col-md-4">
                                <label for="name">Area/ Location</label>
                                <input type="text" name="arealocation" id="arealocation" class="form-control">

                            </div>
                            <div class="col-md-4">
                                <label for="category">Types</label>
                                <select name="concerntypes" id="concerntypes" class="form-control">
                                    <option value="Request">Request</option>
                                    <option value="Concern">Concern</option>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="category">Prior</label>
                                <select name="prior" id="prior" class="form-control">
                                    <option value="Priority">Priority</option>
                                    <option value="NotPriority">Not Priority</option>
                                    <option value="Schedule">For Schedule</option>

                                </select>
                            </div>

                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="email">Description</label>
                                    <textarea class="form-control" id="description" name="description"
                                        rows="3"></textarea>
                                </div>
                            </div>


                        </div>
                    </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" name="submit">Create</button>
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