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
    echo $systemid = $_POST['systemid'];
    echo $userid = $_POST['userid'];
    echo $description = $_POST['description'];
    $query = "INSERT INTO itsystemhistory (systemid, userid, description)
     VALUES(:systemid, :userid, :description)";

    $arr = [
        ":systemid" => $systemid,
        ":userid" => $userid,
        ":description" => $description,
    ];

    $path = "viewsystemconcern.php?edit=$systemid";
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
                    <h1>System Report</h1>
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
        <?php foreach ($systems as $system): ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Report for System Concern Ticket Number: </b><?php echo $system->ticketid ?>
                    </h1>

                </div><br>



                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="">
                        <thead>

                            <tr>
                                <td> <b>Status:</b> <?php echo $system->status ?></td>
                            </tr>



                        </thead>
                        <tbody>

                            <tr>

                                <td>
                                    <b>Date Reported:</b> <?php echo $system->datereported ?>
                                </td>

                            </tr>

                            <tr>
                                <td><b>Date Accomplish:</b> <?php echo $system->dateaccomplish ?></td>
                            </tr>
                            <tr>
                                <td><b>Reported By:</b> <?php


                                    $query = "SELECT * FROM itusermasterfile WHERE userid='$system->reportedby'";
                                    $app = new App;
                                    $users = $app->selectAll($query);
                                    foreach ($users as $user) {
                                        // echo '<td>' . $user->userid . '</td>';
                                        echo '' . $user->userfullname . ' : ' . $user->userdepartment . '';

                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td><b>System Prodiver Ticket ID:</b> <?php echo $system->ticketid ?></td>
                            </tr>
                            <tr>
                                <td><b>System: </b>
                                    <?php echo $system->systemtypes ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <b>Module: </b>
                                    <?php echo $system->module ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <b>Subject: </b> <?php echo $system->subject ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <b>Error Types: </b> <?php echo $system->errortypes ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Subject to Email Format: </b> System Corncern :
                                    <?php echo $system->systemtypes ?>-
                                    <?php echo $system->module ?>-</b> <?php echo $system->subject ?>
                                    -</b> <?php echo $system->errortypes ?>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" style="width: 100%;"
                                                class="summernote"
                                                placeholder="Description"><?php echo $system->description ?></textarea>
                                        </div>
                                    </div>


                                </td>
                            </tr>


                            <?php $ruserid = $_SESSION['userid'];
                                if ($_SESSION['userrole'] == "admin") { ?>
                            <tr>
                                <td>
                                    <h5>IT Remarks</h5>
                                </td>
                            </tr>

                            <tr>
                                <td> <textarea name="description" id="description" style="width: 100%;"
                                        class="summernote"
                                        placeholder="Description"><?php echo $system->remarks ?></textarea></td>
                            </tr>
                            <tr>
                                <td><?php
                                        echo '
                                  <form method="POST" action="viewsystemconcern.php"
                            enctype="multipart/form-data">

                                            <div class="mb-8">
                                             <input type="hidden"  name="userid" style="width:79%;float:left;margin-right:1%;" id="userid" class="form-control "
                                        value="1001100" >
                                          <input type="hidden"  name="systemid" style="width:79%;float:left;margin-right:1%;" id="systemid" class="form-control "
                                        value="' . $system->systemid . '" >
                                                <input type="text"  name="description" style="width:79%;float:left;margin-right:1%;" id="description" class="form-control "
                                            placeholder="Other Remarks">
                                          
                                        
                                         
                                                <button class="btn btn-primary" style="width:20%;float:left"  type="submit" name="submit" >Add</button>
                                            </div>
                                         </form>
                                    ';


                                        ?>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <h5>IT Remarks History</h5>
                                </td>
                            </tr>

                            <?php

                                    $count_history = $app->selectone("SELECT COUNT(userid) as all_history FROM itsystemhistory WHERE systemid='$system->systemid' ");
                                    $count_history->all_history;
                                    if ($count_history->all_history > 0) {
                                        $query = "SELECT * FROM itsystemhistory WHERE systemid='$system->systemid'";
                                        $app = new App;
                                        $systemhistorys = $app->selectAll($query);
                                        foreach ($systemhistorys as $systemhistory) {
                                            echo '
                                        
                                        
                                        
                                        <tr>
                                <td><div style="width:79%;float:left;margin-right:1%;">' . $systemhistory->description . '</div><div style="width:20%;float:left;">' . $systemhistory->created_at . '</div></td>
                            </tr> ';

                                        }

                                    } else {
                                        echo ' <tr>
                                <td>Add Remarks</td>
                            </tr> ';

                                    }
                                } else {
                                    ?>
                            </td>

                            </tr>
                            <tr>
                                <td>
                                    <h5>IT Remarks </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" style="width: 100%;"
                                                class="summernote"
                                                placeholder="Description"><?php echo $system->remarks ?></textarea>
                                        </div>
                                    </div>

                                </td>
                            </tr>


                            <?php

                                    $count_history = $app->selectone("SELECT COUNT(userid) as all_history FROM itsystemhistory WHERE systemid='$system->systemid' ");
                                    $count_history->all_history;
                                    if ($count_history->all_history > 0) {
                                        $query = "SELECT * FROM itsystemhistory WHERE systemid='$system->systemid'";
                                        $app = new App;
                                        $systemhistorys = $app->selectAll($query);
                                        foreach ($systemhistorys as $systemhistory) {
                                            echo '
                                        
                                        
                                        
                                        <tr>
                                <td><div style="width:79%;float:left;margin-right:1%;">' . $systemhistory->description . '</div><div style="width:20%;float:left;">' . $systemhistory->created_at . '</div></td>
                            </tr> ';

                                        }

                                    } else {
                                        echo ' <tr>
                                <td>Add Remarks</td>
                            </tr> ';

                                    }
                                }
                                ?>








                            <tr>
                                <td>
                                    <h5>System provider</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>Findings</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" style="width: 100%;"
                                                class="summernote"
                                                placeholder="Description"><?php echo $system->findings ?></textarea>
                                        </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Action Taken</td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" style="width: 100%;"
                                                class="summernote"
                                                placeholder="Description"><?php echo $system->actiontaken ?></textarea>
                                        </div>
                                </td>
                            </tr>


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <?php endforeach; ?>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/dropzone/dropzone.js"></script>
<script src="js/demo.js">
</script>
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
            'pdf', 'print'
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