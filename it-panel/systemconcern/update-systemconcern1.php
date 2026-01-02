<?php require "../header.php"; ?>


<?php require "../sidebar.php"; ?>
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $query = "SELECT * FROM itsystem where systemid=$id";
    $app = new App;
    $systems = $app->selectAll($query);

}
?>





<?php
if (isset($_POST['submit'])) {

    $datereported = $_POST['datereported'];
    //  $dateaccomplish = " ";
    $subject = $_POST['subject'];
    $module = $_POST['module'];
    $description = $_POST['description'];
    $systemtypes = $_POST['systemtypes'];
    //  $errortypes = " ";
    $reportedby = $_POST['reportedby'];
    $status = "New";
    $file = $_FILES['checkprofilephoto']['name'];
    // $checkofficephoto = $_FILES['checkofficephoto']['name'];
    $dir = "uploads/" . basename(path: $file);
    //  $remarks = " ";

    $query = "INSERT INTO itsystem (datereported, subject, module, description, systemtypes, reportedby, file, status)
VALUES(:datereported, :subject, :module, :description, :systemtypes, :reportedby, :file, :status )";
    $arr = [
        ":datereported" => $datereported,
        // ":dateaccomplish" => $dateaccomplish,
        ":subject" => $subject,
        ":module" => $module,
        ":description" => $description,
        ":systemtypes" => $systemtypes,
        // ":errortypes" => $errortypes,
        ":reportedby" => $reportedby,
        ":file" => $file,
        ":status" => $status,

    ];

    $path = "systemconcern.php";
    // if (move_uploaded_file($_FILES['checkprofilephoto']['tmp_name'], $dir)) {

    //     $app->register($query, $arr, $path);
    // }
    if (move_uploaded_file($_FILES['checkprofilephoto']['tmp_name'], $dir)) {

        //     if (move_uploaded_file($_FILES['checkofficephoto']['tmp_name'], $dir)) {
        $app->update($query, $arr, $path);
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
                    <h1>Create System Concern</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="systemconcern.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <?php foreach ($systems as $system): ?>
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>Add System Concern</h1>


                    </div><br>
                    <!-- /.BODY -->

                    <form class="row g-3" method="POST" action="update-systemconcern1.php" enctype="multipart/form-data">

                        <div class="card-body ">

                            <div class="row">


                                <div class="col-md-3">
                                    <label for="name">Date</label>
                                    <input type="text" readonly name="datereported" id="datereported" class="form-control"
                                        value="<?php echo $system->datereported ?>">

                                </div>
                                <input type=" hidden" name="id" id="id" class="form-control"
                                    value="<?php echo $system->systemid ?>">

                                <div class=" col-md-5">
                                    <label for="email">Requested By: </label>
                                    <!-- <input type="text" name="requesteddep" id="requesteddep" class="form-control"
                                    placeholder="Slug"> -->

                                    <!-- <?php


                                    // echo '<select name="reportedby" id="reportedby" class="form-control">';
                                    // $query = "SELECT * FROM itusermasterfile ";
                                    // $app = new App;
                                    // $departments = $app->selectAll($query);
                                    // foreach ($departments as $department) {
                                    //     echo '<option value=' . $department->userid . '> ' . $department->userfullname . ' | ' . $department->userposition . ' | ' . $department->userdepartment . '</option>';
                                    // }
                                    // echo '</select>';
                                
                                    ?> -->
                                    <?php
                                    $ruserid = $_SESSION['userid'];
                                    if ($_SESSION['userrole'] == "admin") {

                                        echo '<select name="reportedby" id="reportedby" class="form-control">';
                                        $query = "SELECT * FROM itusermasterfile WHERE userid!=$ruserid";
                                        $app = new App;
                                        $departments = $app->selectAll($query);
                                        foreach ($departments as $department) {
                                            echo '<option value=' . $department->userid . '>  ' . $department->userid . ' | ' . $department->userfullname . ' | ' . $department->userposition . ' | ' . $department->userdepartment . '</option>';
                                        }
                                        echo '</select>';
                                    } else if ($_SESSION['userrole'] == "manager" || $_SESSION['userrole'] == "supervisor") {
                                        $department = $_SESSION['userdepartment'];
                                        echo '<select name="reportedby" id="reportedby" class="form-control">';
                                        $query = "SELECT * FROM itusermasterfile WHERE userid!=$ruserid AND userdepartment='$department' ";
                                        $app = new App;
                                        $departments = $app->selectAll($query);
                                        foreach ($departments as $department) {
                                            echo '<option value=' . $department->userid . '> ' . $department->userid . ' | ' . $department->userfullname . ' | ' . $department->userposition . ' | ' . $department->userdepartment . '</option>';
                                        }
                                        echo '</select>';
                                    } else {

                                        echo '<select name="reportedby" id="reportedby" class="form-control" readonly>';
                                        echo '<option value=' . $_SESSION['userid'] . '> ' . $_SESSION['userid'] . ' | ' . $_SESSION['userfullname'] . ' | ' . $_SESSION['userdepartment'] . '</option>';
                                        echo '</select>';

                                    }
                                    ?>


                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-3">
                                    <label for="category">System</label>
                                    <select name="systemtypes" id="systemtypes" class="form-control">
                                        <option value="<?php echo $system->systemtypes ?>">
                                            <?php echo $system->systemtypes ?>
                                        </option>
                                        <option value=" Optima PMS">Optima PMS </option>
                                        <option value="Optima POS">Optima POS</option>
                                        <option value="Ezee PMS">Ezee PMS</option>
                                        <option value="Ezee POS">Ezee POS</option>
                                        <option value="STAAH">STAAH</option>
                                        <option value="Saflok x Optima">Saflok x Optima</option>
                                        <option value="Saflok">Saflok</option>
                                        <option value="SAP Business">SAP Business</option>
                                        <option value="Website">Website</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="category">Module</label>
                                    <input type="text" name="module" id="module" class="form-control"
                                        placeholder="Ex: Guest Builing" value="<?php echo $system->module ?>">
                                    </select>
                                </div>
                            </div>

                            <div class=" row">
                                <div class="col-md-5">

                                    <div class="mb-3">
                                        <label for="description">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control"
                                            placeholder="Ex: Guest folio showing incorrect taxes"
                                            value="<?php echo $system->subject ?>">
                                    </div>
                                </div>

                                <div class=" col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                            placeholder="Description"> <?php echo $system->description ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">

                                        <div class="form-group">
                                            <label for="email">Upload documents here</label>
                                            <div class="form-check">
                                                <div class="col-md-12">
                                                    <input type="file" class="form-control-file border"
                                                        name="checkprofilephoto">
                                                    <a href="download.php?edit=<?php echo $system->systemid ?>"
                                                        target="_thapa">
                                                        <?php echo $system->file ?> View
                                                        Documents</a>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="pb-5 pt-3">
            <button class="btn btn-primary" name="submit">Create</button>
            <a href="systemconcern.php" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
        </form>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Summernote -->
<script src="<?php echo APPURL; ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo APPURL; ?>assets/plugins/dropzone/dropzone.js"></script>
<script src="<?php echo APPURL; ?>assets/js/demo.js"></script>
<script>
    Dropzone.autoDiscover = false;
    $(function () {
        // Summernote
        $('.summernote').summernote({
            height: '300px'
        });

        const dropzone = $("#image").dropzone({
            url: "create-product.html",
            maxFiles: 5,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function (file, response) {
                $("#image_id").val(response.id);
            }
        });

    });
</script>
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
</script>





<?php require "../../footer1.php"; ?>