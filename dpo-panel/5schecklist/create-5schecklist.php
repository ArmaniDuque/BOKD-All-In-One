<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM dpocheckilst";
$app = new App;
$checks = $app->selectAll($query);

?>
<?php
if (isset($_POST['submit'])) {

    echo $checkid = $_POST['checkid'];
    // echo $checklistdepartment = $_POST['checklistdepartment'];


    $query = "SELECT * FROM dpousermasterfile WHERE userid='$checkid'";
    $app = new App;
    $users = $app->selectAll($query);
    foreach ($users as $user) {


        $checklistdepartment = $user->userdepartment;
    }
    $checkregsdate = $_POST['checkregsdate'];
    $checkpipcert = $_POST['checkpipcert'];

    $checkprofilephoto = $_FILES['checkprofilephoto']['name'];
    // $checkofficephoto = $_FILES['checkofficephoto']['name'];
    $dir = "../../img/" . basename($checkprofilephoto);
    // $dir1 = "../../img/" . basename($checkofficephoto);
    $query = "INSERT INTO dpocheckilst (userid, checklistdepartment, checkregsdate, checkpipcert, checkprofilephoto)
     VALUES(:checkid, :checklistdepartment, :checkregsdate, :checkpipcert, :checkprofilephoto)";

    $arr = [


        ":checkid" => $checkid,
        ":checklistdepartment" => $checklistdepartment,
        ":checkregsdate" => $checkregsdate,
        ":checkpipcert" => $checkpipcert,
        ":checkprofilephoto" => $checkprofilephoto,
        // ":checkofficephoto" => $checkofficephoto,


    ];
    $path = "5schecklist.php";
    if (move_uploaded_file($_FILES['checkprofilephoto']['tmp_name'], $dir)) {

        //     if (move_uploaded_file($_FILES['checkofficephoto']['tmp_name'], $dir)) {
        $app->register($query, $arr, $path);
        //     }
    }

    //     move_uploaded_file($_FILES['checkprofilephoto']['tmp_name'], $dir);
//     // move_uploaded_file($_FILES['checkofficephoto']['tmp_name'], $dir);
//     $app->register($query, $arr, $path);

}
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>5S Checklist</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="5schecklist.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form class="row g-3" method="POST" action="create-5schecklist.php" enctype="multipart/form-data">

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"> Complete the required fields.</h1>

                    </div><br>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Employee No. | Employee Name | Assigned To | Department</label>






                                    <?php
                                    if ($_SESSION['userrole'] == "admin") {
                                        echo '<select name="checkid" id="checkid" class="form-control">';
                                        $query = "SELECT * FROM dpousermasterfile WHERE userid!='$check->userid' ";
                                        $app = new App;
                                        $departments = $app->selectAll($query);
                                        foreach ($departments as $department) {
                                            echo '<option value=' . $department->userid . '>  ' . $department->userid . ' | ' . $department->userfullname . ' | ' . $department->userposition . ' | ' . $department->userdepartment . '</option>';
                                        }
                                        echo '</select>';
                                    } else if ($_SESSION['userrole'] == "manager" || $_SESSION['userrole'] == "supervisor") {
                                        $department = $_SESSION['userdepartment'];
                                        echo '<select name="checkid" id="checkid" class="form-control">';
                                        $query = "SELECT * FROM dpousermasterfile WHERE userid!='$check->userid' AND userdepartment='$department' ";
                                        $app = new App;
                                        $departments = $app->selectAll($query);
                                        foreach ($departments as $department) {
                                            echo '<option value=' . $department->userid . '> ' . $department->userid . ' | ' . $department->userfullname . ' | ' . $department->userposition . ' | ' . $department->userdepartment . '</option>';
                                        }
                                        echo '</select>';
                                    } else {

                                        echo '<select name="checkid" id="checkid" class="form-control" disabled>';
                                        echo '<option value=' . $_SESSION['userid'] . '> ' . $_SESSION['userid'] . ' | ' . $_SESSION['userfullname'] . ' | ' . $_SESSION['userdepartment'] . '</option>';
                                        echo '</select>';

                                    }
                                    ?>


                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Registration Date</label>
                                    <input type="date" name="checkregsdate" id="checkregsdate" class="form-control"
                                        placeholder="Slug">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">PIP/s Cerification No.</label>
                                <input type="text" name="checkpipcert" id="checkpipcert" class="form-control"
                                    placeholder="PIP/s Cerification No.">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">

                                <div class="form-group">
                                    <label for="email">Profile Photo</label>
                                    <div class="form-check">
                                        <div class="col-md-6">
                                            <input type="file" name="checkprofilephoto"
                                                class="form-control-file border">

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">


                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" name="submit">Create</button>
                <a href="5schecklist.php" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>

        <!-- /.card -->



    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>