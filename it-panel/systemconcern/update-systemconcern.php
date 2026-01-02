<?php require "../header.php"; ?>
<?php require "textareahead.php"; ?><?php require "../sidebar.php"; ?>

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

    $id = $_POST['id'];
    $datereported = $_POST['datereported'];
    //  $dateaccomplish = " ";
    $description = $_POST['description'];
    $subject = $_POST['subject'];
    $module = $_POST['module'];
    $systemtypes = $_POST['systemtypes'];
    $errortypes = $_POST['errortypes'];
    $prioritylevel = $_POST['prioritylevel'];
    $reportedby = $_POST['reportedby'];
    $ticketid = $_POST['ticketid'];
    $status = $_POST['status'];
    $file = $_FILES['checkprofilephoto']['name'];
    // $checkofficephoto = $_FILES['checkofficephoto']['name'];
    $dir = "uploads/" . basename(path: $file);

    if ($status == "Done") {
        $dateaccomplish = date("Y-d-m");

    } else {

        $dateaccomplish = " ";
    }

    $remarks = $_POST['remarks'];
    $findings = $_POST['findings'];
    $actiontaken = $_POST['actiontaken'];


    $query = "UPDATE itsystem SET datereported=:datereported, subject=:subject, module=:module, dateaccomplish=:dateaccomplish, description=:description
    , systemtypes=:systemtypes, errortypes=:errortypes , prioritylevel=:prioritylevel , reportedby=:reportedby
    , remarks=:remarks, ticketid=:ticketid, findings=:findings, actiontaken=:actiontaken, file=:file, status=:status
     WHERE systemid='$id'";


    $arr = [
        ":datereported" => $datereported,
        ":dateaccomplish" => $dateaccomplish,
        ":subject" => $subject,
        ":module" => $module,
        ":description" => $description,
        ":systemtypes" => $systemtypes,
        ":errortypes" => $errortypes,
        ":prioritylevel" => $prioritylevel,
        ":reportedby" => $reportedby,
        ":remarks" => $remarks,
        ":ticketid" => $ticketid,
        ":findings" => $findings,
        ":actiontaken" => $actiontaken,
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
    } else {

        $query = "UPDATE itsystem SET datereported=:datereported, subject=:subject, module=:module, dateaccomplish=:dateaccomplish, description=:description
    , systemtypes=:systemtypes, errortypes=:errortypes , prioritylevel=:prioritylevel , reportedby=:reportedby
    , remarks=:remarks, ticketid=:ticketid, findings=:findings, actiontaken=:actiontaken, status=:status
     WHERE systemid='$id'";

        $arr = [
            ":datereported" => $datereported,
            ":dateaccomplish" => $dateaccomplish,
            ":subject" => $subject,
            ":module" => $module,
            ":description" => $description,
            ":systemtypes" => $systemtypes,
            ":errortypes" => $errortypes,
            ":prioritylevel" => $prioritylevel,
            ":reportedby" => $reportedby,
            ":remarks" => $remarks,
            ":ticketid" => $ticketid,
            ":findings" => $findings,
            ":actiontaken" => $actiontaken,
            // ":file" => $file,
            ":status" => $status,

        ];
        $path = "systemconcern.php";
        $app->update($query, $arr, $path);

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
                    <h1>System Concern Info</h1>
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
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>System Concern Details</h1>


                </div><br>
                <!-- /.BODY -->
                <form class="row g-3" method="POST" action="update-systemconcern.php" enctype="multipart/form-data">
                    <?php foreach ($systems as $system): ?>

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="name">Date</label>
                                <input type="text" readonly name="datereported" id="datereported" class="form-control"
                                    value="<?php echo $system->datereported ?>">

                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="<?php echo $system->systemid ?>">

                            </div>

                            <div class=" col-md-5">
                                <label for="email">Requested By: </label>
                                <?php

                                    echo '<select name="reportedby" id="reportedby" class="form-control" readonly>';
                                    $query = "SELECT * FROM itusermasterfile where userid=$system->reportedby ";
                                    $app = new App;
                                    $departments = $app->selectAll($query);
                                    foreach ($departments as $department) {
                                        echo '<option value=' . $department->userid . '> ' . $department->userfullname . ' | ' . $department->userposition . ' | ' . $department->userdepartment . '</option>';
                                    }
                                    echo '</select>';
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
                                    <option value="Optima PMS">Optima PMS </option>
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
                                <label for="description">Subject</label>
                                <input type="text" name="module" id="module" class="form-control"
                                    placeholder="Ex: Guest Builing" value="<?php echo $system->module ?>">
                                </select>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-5">

                                <div class="mb-3">
                                    <label for="description">Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control"
                                        value="<?php echo $system->subject ?>">
                                </div>
                            </div>
                            <div class="col-md-5">

                                <div class="mb-3">
                                    <label for="description">Ticket ID </label>
                                    <input type="text" name="ticketid" id="ticketid" class="form-control"
                                        value="<?php echo $system->ticketid ?>">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="summernote"
                                        placeholder="Description"><?php echo $system->description ?></textarea>
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
            <div class="row">
                <div class="col-md-12"><label for="email">IT Review</label>
                    </br>
                    </br></div>
                <div class="col-md-12">
                    <label for="category">Types of Error</label>
                    <select name="errortypes" id="errortypes" class="form-control">
                        <option value="<?php echo $system->errortypes ?>">
                            <?php echo $system->errortypes ?>

                        <option value="System Glitch">System Glitch: An unexpected, minor malfunction that causes a
                            system to behave incorrectly or freeze temporarily.</option>
                        <option value="Data Error">Data Error: Incorrect, corrupted, or missing data within the system.
                        </option>

                        <option value="Human Error">Human Error: A mistake made by a user during data entry or system
                            operation.</option>
                        <option value="Access Denied">Access Denied: A user is blocked from accessing a part of the
                            system they should be able to use.</option>
                        <option value="Account Lockout">Account Lockout: A user's account has been disabled, often due
                            to too many failed login attempts.</option>
                        <option value="Request for Modification">Request for Modification: A user asks for a change to
                            an existing feature.</option>
                        <option value="Request for New Feature">Request for New Feature: A user suggests adding a
                            completely new function to the system.
                        </option>
                        <option value="Interface Improvement">Interface Improvement: A request to change the system's
                            layout or design to make it more user-friendly.</option>

                        <option value="Request for Assistance">Request for Assistance: The user needs guidance on how to
                            use a specific feature or function of the system.</option>
                        <option value="Setup/Configuration Issue">Setup/Configuration Issue: A problem has occurred
                            during the initial setup or customization of a user's account or system settings.</option>
                        <option value="Other">Other: A general or miscellaneous issue that does not fit into any of the
                            predefined categories. </option>


                    </select>
                </div>
                <div class="col-md-4">
                    <label for="category">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="<?php echo $system->status ?>">
                            <?php echo $system->status ?>
                        <option value="In Progress">In Progress</option>
                        <option value="New">New</option>
                        <option value="Done">Done</option>

                    </select>
                </div>
                <div class="col-md-4">
                    <label for="category">Priority Level</label>
                    <select name="prioritylevel" id="prioritylevel" class="form-control">
                        <option value="<?php echo $system->prioritylevel ?>">
                            <?php echo $system->prioritylevel ?>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>

                    </select>
                </div>
                <div class="col-md-12">

                    <!-- <div class="form-group">
                                    <label for="email">Remarks</label>
                                <textarea style="max-height: 300px;height: 300px;" class="form-control" id="remarks"
                                        name="remarks" rows="3"><?php echo $system->remarks ?></textarea>
                                        </div> -->

                    <div class="mb-3">
                        <lab el for="description">Description</label>
                            <textarea name="remarks" id="remarks" cols="30" rows="10" class="summernote"
                                placeholder="Description" readonly><?php echo $system->remarks ?></textarea>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12"><label for="email">System Provider</label>
                    </br>
                    </br></div>

                <div class="col-md-12">

                    <div class="form-group">


                        <div class="mb-3">
                            <lab el for="description">Findinds</label>
                                <textarea name="findings" id="findings" cols="30" rows="10" class="summernote"
                                    placeholder="Description"><?php echo $system->findings ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="description">Action Taken</label>
                        <textarea name="actiontaken" id="actiontaken" cols="30" rows="10" class="summernote"
                            placeholder="Description"><?php echo $system->actiontaken ?></textarea>
                    </div>
                </div>

            </div>

        </div>
        <?php endforeach; ?>


        <div class="pb-5 pt-3">
            <button class="btn btn-primary" name="submit">Save</button>
            <a href="systemconcern.php" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
</div>
</form>


</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/dropzone/dropzone.js"></script>
<script src="js/demo.js"></script>
<script>
Dropzone.autoDiscover = false;
$(function() {
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
        success: function(file, response) {
            $("#image_id").val(response.id);
        }
    });

});
</script>
<script type="text/javascript">
$(document).ready(function() {
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