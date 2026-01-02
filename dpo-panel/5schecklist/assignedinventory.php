<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php


?>

<?php
if (isset($_GET['id'])) {

    echo $id = $_GET['id'];





}
?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Add Data Inventory to
                        <?php //echo $id = $_GET['id']; ?>
                        <?php
                        $query = "SELECT * FROM dpousermasterfile WHERE userid='$id'";
                        $app = new App;
                        $users = $app->selectAll($query);
                        foreach ($users as $user) {
                            echo '' . $user->userfullname . '<br>';
                        }
                        ?>
                    </h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-datainventory.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Physical & Data Inventory</b> </h1>

                </div><br>



                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th width="60">Id</th>
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
                            <?php
                            $query = "SELECT * FROM dpousermasterfile WHERE userid='$id'";
                            $app = new App;
                            $users1 = $app->selectAll($query);
                            foreach ($users as $user) {



                                ?>

                                <?php foreach ($users1 as $user1) {
                                    $query = "SELECT * FROM dpodatainventory WHERE datadepartment='$user->userdepartment' ";
                                    $app = new App;
                                    $datas = $app->selectAll($query);
                                    foreach ($datas as $data) { ?>
                                        <tr>

                                            <td><?php echo $data->datainventoryid ?></td>
                                            <td><?php echo $data->datastorage ?></td>
                                            <td><?php echo $data->datalocation ?></td>
                                            <td><?php echo $data->datadescription ?></td>
                                            <td><?php echo $data->datacategory ?></td>
                                            <td><?php echo $data->datasecuritystatus ?></td>
                                            <td><?php echo $data->datadepartment ?></td>
                                            <td><?php echo $data->datatypes ?></td>
                                            <td><?php echo $data->dataretensiondate ?></td>
                                            <td><?php echo $data->created_at ?>

                                            </td>


                                            <td>

                                                <?php






                                                $count_history = $app->selectone("SELECT COUNT(datainventoryid) as allid FROM dpochecklistdatainventory WHERE datainventoryid='$data->datainventoryid' ");
                                                $count_history->allid;

                                                $query = "SELECT * FROM dpochecklistdatainventory WHERE datainventoryid='$data->datainventoryid' ";
                                                $app = new App;
                                                $users2 = $app->selectAll($query);
                                                // if ($count_history->allid > 0) {
                                                //     foreach ($users2 as $user2) {
                                    
                                                //         echo $user2->checklistdatainventoryid;
                                                //     }
                                                // }
                                    

                                                if ($count_history->allid > 0) {
                                                    foreach ($users2 as $user2) {

                                                        echo ' 
                                                        <form action="deleteassigned.php" method="POST" enctype="multipart/form-data">
<input type="hidden" value="' . $user->userid . '" name="userid">
<input type="hidden" value="' . $user2->checklistdatainventoryid . '" name="checklistdatainventoryid">
                                                        
<button  class="btn btn text-danger" type="submit" name="submit"><i class="fa fa-trash">&nbsp;</i></button>
                                         </form>';
                                                    }


                                                } else {
                                                    echo '
<form action="addassigned.php" method="POST" enctype="multipart/form-data">
<input type="hidden" value="' . $user->userid . '" name="userid">
<input type="hidden" value="' . $data->datainventoryid . '" name="datainventoryid">
<button  class="btn btn text-primary" type="submit" name="submit"><i class="fa fa-plus">&nbsp;</i></button>
                                   
                                    </form>';

                                                }
                                                // echo $user2->datainventoryid;
                                                // echo '|';
                                                // echo $data->datainventoryid;
                                                // if ($user2->datainventoryid != $data->datainventoryid) {
                                                // echo '<a href="#">Remove</a>';
                                    
                                                // } else {
                                                // echo 'Add';
                                    
                                                // }
                                    

                                                // }
                                                ?>


                                            </td>

                                        </tr>

                                        <?php

                                    }
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "pageLength": 100,
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