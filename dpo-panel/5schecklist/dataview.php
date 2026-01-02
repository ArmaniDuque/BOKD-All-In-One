<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>



<?php

$query = "SELECT * FROM dpodatainventory";
$app = new App;
$datas = $app->selectAll($query);


$userid = $_SESSION['userid'];

?>
<?php
if (isset($_GET['edit'])) {

    $editid = $_GET['edit'];

    $query = "SELECT * FROM dpocheckilst WHERE userid='$editid'";
    $app = new App;
    $checks = $app->selectAll($query);

    $query = "SELECT * FROM dpochecklistdatainventory WHERE userid='$editid' ";
    $app = new App;
    $checkdatas = $app->selectAll($query);


    $countdata = $app->selectone("SELECT COUNT(userid) as alldata FROM dpochecklistdatainventory WHERE userid='$editid' ");
    $countdata->alldata;

    if (isset($_POST['submit'])) {

        $checkofficephoto = $_FILES['checkofficephoto']['name'];
        $dir = "../../img/" . basename($checkofficephoto);

        $query = "UPDATE dpocheckilst SET checkofficephoto=:checkofficephoto WHERE userid='$editid'";

        $arr = [

            ":checkofficephoto" => $checkofficephoto

        ];
        $path = "dataview.php?edit=$editid";

        if (move_uploaded_file($_FILES['checkofficephoto']['tmp_name'], $dir)) {
            $app->update($query, $arr, $path);
        }

    }


    // Warning: Undefined variable $dir in C:\xampp\htdocs\Laravel10\montemarportal1\admin-panel\5schecklist\dataview.php on line 48


}

?>
<?php
if (isset($_GET['delete'])) {

    $delid = $_GET['delete'];

    $query = "SELECT * FROM dpochecklistdatainventory WHERE checklistdatainventoryid='$delid'";
    $app = new App;
    $users = $app->selectAll($query);

    foreach ($users as $user) {
        $userid = $user->userid;
        $query = "DELETE FROM dpochecklistdatainventory WHERE checklistdatainventoryid='$delid'";
        $app = new App;
        $path = "dataview.php?edit=$userid";
        $app->delete($query, $path);
    }
}

?>
<script>
    function printPage() {
        window.print();
    }
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>5S Checkilst</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="submit" id="print" onclick="printPage()" class="btn btn-success">Print</button>

                    <a href="5schecklist.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pt-3">
                            <div class="row invoice-info">
                                <?php foreach ($checks as $check): ?>

                                    <div class="col-sm-2 invoice-col">
                                        <img src="<?php echo APPURL; ?>/img/<?php echo $check->checkprofilephoto ?>"
                                            style="width:200px;">
                                    </div>



                                    <div class="col-sm-4 invoice-col">

                                        <br>

                                        <?php
                                        $query = "SELECT * FROM dpousermasterfile WHERE userid='$check->userid'";
                                        $app = new App;
                                        $users = $app->selectAll($query);
                                        foreach ($users as $user) {
                                            echo '<b>Employee Name:     </b>' . $user->userid . '<br>';
                                            echo '<b>Employee Name:     </b>' . $user->userfullname . '<br>';
                                            echo ' <b>Department:   </b>' . $user->userdepartment . '<br>';
                                        }
                                        ?>

                                        <b>Registration Date :</b> <?php echo $check->checkregsdate ?><br>
                                        <b>PIP Certificate :</b> <?php echo $check->checkpipcert ?><br>
                                        <b>Approved By :</b> DPO<br>
                                    <?php endforeach; ?>

                                </div>
                                <div class="col-sm-6 invoice-col">
                                    <div class="col-md-6">
                                        <b>Office Photo</b>
                                        <form method="POST"
                                            action="<?php echo APPURL; ?>dpo-panel/5schecklist/dataview.php?edit=<?php echo $check->userid; ?>"
                                            enctype="multipart/form-data">
                                            <input type="file" name="checkofficephoto" class="form-control-file border">
                                            <input type="hidden" name="checkuserid"
                                                class="form-control-file border"><br>
                                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Upload
                                                Office
                                                Photo</button>


                                    </div>
                                    <div class="col-md-6">

                                        <img src="<?php echo APPURL; ?>img/<?php

                                           if ($check->checkofficephoto == NULL) {
                                               echo 'bg.png';

                                           } else {
                                               echo $check->checkofficephoto;

                                           }


                                           ?>" style="margin-top:10px;width:600px;">
                                    </div>
                                    </form>
                                </div>

                            </div>
                            <div class="pb-5 pt-3 d-print-block">
                                <span>Ass Physical or Digital Inventory that was assigned to you</span>
                                <a href="<?php echo APPURL; ?>dpo-panel/5schecklist/assignedinventory.php?id=<?php echo $check->userid; ?>"
                                    class="btn btn-primary btn-sm">Click
                                    to assigned inventory</a>
                                <a href="<?php echo APPURL; ?>dpo-panel/datainventory/create-datainventory.php"
                                    class="btn btn-success btn-sm">Click to create new
                                    inventory</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- The Modal EDIT-->
                <?php // require "assignedinventory.php"; ?>


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pt-3"></div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped " style="width:100%" id="example">
                                <thead>
                                    <tr>
                                        <th width="60">ID</th>
                                        <th width="60">Storage</th>
                                        <th>Actual Location</th>
                                        <th>Filwe Description</th>
                                        <th>Category</th>
                                        <th>Security Status</th>
                                        <th>Department</th>
                                        <th>Data Types</th>
                                        <th>Retension Dates</th>
                                        <th>Created</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($countdata->alldata > 0): ?>

                                        <?php foreach ($checkdatas as $checkdata): ?>
                                            <?php
                                            $query = "SELECT * FROM dpodatainventory WHERE datainventoryid='$checkdata->datainventoryid'";
                                            $app = new App;
                                            $checkdatalists = $app->selectAll($query);
                                            foreach ($checkdatalists as $checkdatalist) {
                                                echo '  <tr> <td>' . $checkdatalist->datainventoryid . '</td>';
                                                echo '<td>' . $checkdatalist->datastorage . '</td>';
                                                echo '<td>' . $checkdatalist->datalocation . '</td>';
                                                echo '<td>' . $checkdatalist->datadescription . '</td>';
                                                echo '<td>' . $checkdatalist->datacategory . '</td>';
                                                echo '<td>' . $checkdatalist->datasecuritystatus . '</td>';
                                                echo '<td>' . $checkdatalist->datadepartment . '</td>';
                                                echo '<td>' . $checkdatalist->datatypes . '</td>';
                                                echo '<td>' . $checkdatalist->dataretensiondate . '</td>';
                                                echo '<td>' . $checkdatalist->created_at . '</td>';
                                                echo '<td>
                                         
                                           <a style="text-decoration:none;color:red;"
                                        href="dataview.php?delete=' . $checkdata->checklistdatainventoryid . '                                   
                                         class="text-danger">
                                    <i class="nav-icon fas fa fa-trash"></i>

                                    </a>
                                    </td>
                                    </tr>';

                                            }
                                            ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>

                                            <td scope="row" colspan="11" style="text-align:center;">Assigned or Create New
                                                Inventory
                                            </td>
                                        </tr>

                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>



<script type="text/javascript">
    // $('#myModal').on('shown.bs.modal', function() {
    //     $('#myInput').trigger('focus')
    // })

    $(document).ready(function () {
        $('#example').DataTable({
            "pageLength": 8,
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



    $(document).ready(function () {
        $('#example1').DataTable({
            "pageLength": 8,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        });



    });


    $('#example1 [data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'bottom',
        html: true
    });
</script><?php require "../../footer1.php"; ?>