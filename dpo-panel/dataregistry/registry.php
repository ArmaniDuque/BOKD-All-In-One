<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
$query = "SELECT * FROM dpodataregistry";
$app = new App;
$datas = $app->selectAll($query);



if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    // $query = "DELETE FROM dpodataregistry WHERE dataregistryid='$id'";
    $query = "DELETE FROM dpodataregistry WHERE dataregistryid='$id'";
    $app = new App;
    $path = "registry.php";
    $app->delete($query, $path);

}


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Registry</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-registry.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Registered Data Processes</b> </h1>

                </div><br>
                <div class="col-sm-12 invoice-col">
                    <span>
                        A Data Protection Impact Assestment (DPIA) is a process to help you identify and minimize the
                        data protection risks.
                        <br>
                        Edit pia need may laman yung sa computation para wala lumabas na error
                        <br>
                        Delete need din madelete PIA if meron na para di magulo record
                    </span><br><br>
                </div>


                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <!-- <th width="60">Reg #</th> -->
                                <th>PR #</th>
                                <th>Ref #</th>
                                <th>Process Name</th>
                                <th>Fullname & Department</th>
                                <th>Purpose</th>
                                <th>Implementation Date</th>
                                <!-- <th>DPO Approval</th>
                                <th>GM Approval</th> -->

                                <th>Status</th>
                                <th>PIA</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datas as $data): ?>

                                <tr>

                                    <td><?php echo $data->dataregistryid ?></td>
                                    <td><?php echo $data->refid ?></td>
                                    <td><?php echo $data->processname ?></td>


                                    <?php


                                    $query = "SELECT * FROM dpousermasterfile WHERE userid='$data->userid'";
                                    $app = new App;
                                    $users = $app->selectAll($query);
                                    foreach ($users as $user) {
                                        // echo '<td>' . $user->userid . '</td>';
                                        echo '<td>' . $user->userfullname . ' : ' . $user->userdepartment . '</td>';

                                    }
                                    ?>
                                    <td><?php echo $data->purpose ?></td>
                                    <td><?php echo $data->date ?></td>
                                    <!-- <td>
                                        <?php $data->approveddpo ?>
                                        <?php if ($data->approveddpo == null): ?>

                                            <span class="badge bg-primary fas fa-hourglass"> Waiting</span>
                                        <?php else: ?>
                                            <?php if ($data->approveddpo == 1): ?>

                                                <span class="badge bg-success fa fa-thumbs-up"> Approved</span>
                                                <?php echo $data->datedpo ?>
                                            <?php else: ?>

                                                <span class="badge bg-danger fa fa-thumbs-down"> Not Approved</span>
                                                <?php echo $data->datedpo ?>

                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </td>
                                    <td><?php $data->approvedgm ?>
                                        <?php if ($data->approvedgm == null): ?>

                                            <span class="badge bg-primary fas fa-hourglass"> Waiting</span>
                                        <?php else: ?>
                                            <?php if ($data->approvedgm == 1): ?>

                                                <span class="badge bg-success fa fa-thumbs-up"> Approved</span>
                                                <?php echo $data->dategm ?>
                                            <?php else: ?>

                                                <span class="badge bg-danger fa fa-thumbs-down"> Not Approved</span>
                                                <?php echo $data->dategm ?>

                                            <?php endif; ?>
                                        <?php endif; ?>


                                    </td> -->
                                    <td><?php echo $data->status ?></td>
                                    <td>

                                        <?php


                                        $count_pia = $app->selectone("SELECT COUNT(refid) as allid FROM dpopia WHERE refid='$data->refid' ");
                                        $count_pia->allid;

                                        $query = "SELECT * FROM dpopia WHERE refid='$data->refid' ";
                                        $app = new App;
                                        $pias = $app->selectAll($query);

                                        if ($count_pia->allid > 0) {
                                            foreach ($pias as $pia) {


                                                // Execute the queries
                                                echo '
<form action="pia.php" method="POST" enctype="multipart/form-data">
<input type="hidden" value="' . $pia->refid . '" name="refid">';

                                                //             echo " <a style='text-decoration:none;'
                                                //     href='pia.php?edit=$pia->refid'
                                                // <span class='badge bg-success fa fa-thumbs-up'>";
                                                //             echo " ";
                                                //             echo $pia->refid;
                                    
                                                //             echo "</span>";
                                                echo '

<button  class="btn-sm btn bg-success" type="submit" name="submit"><span class="badge bg-success fa fa-thumbs-up">  With PIA</span></button>
                                   
                                    </form>';

                                            }
                                        } else {
                                            //     echo " <a style='text-decoration:none;'
                                            // href='addtopia.php?add=00$data->dataregistryid'<span class='badge bg-danger fa fa-thumbs-down'>";
                                    
                                            //     echo " Apply PIA";
                                            //     echo "</span>";
                                    

                                            echo '
<form action="addtopia.php" method="POST" enctype="multipart/form-data">
<input type="hidden" value="' . $data->dataregistryid . '" name="dataregistryid">';

                                            $query = "SELECT * FROM dpousermasterfile WHERE userid='$data->userid'";
                                            $app = new App;
                                            $users = $app->selectAll($query);
                                            foreach ($users as $user) {
                                                // echo '<td>' . $user->userid . '</td>';
                                                echo '<input type="hidden" value="' . $user->userdepartment . '" name="userdepartment">';

                                            }
                                            echo '

<button  class="btn-sm btn bg-danger" type="submit" name="submit"><span class="badge bg-danger fa fa-plus"> Apply PIA </span></button>
                                   
                                    </form>';

                                        }


                                        ?>
                                    </td>


                                    <td>
                                        <a style="text-decoration:none;"
                                            href="dpoapproved.php?edit=<?php echo $data->dataregistryid ?>"
                                            class="text-success">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-edit"></i>&nbsp;&nbsp;

                                        </a>|
                                        <a style="text-decoration:none;"
                                            href="5sdatalist.php?delete=<?php echo $data->dataregistryid ?>"
                                            class="text-danger">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-trash"></i>&nbsp;&nbsp;

                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>



                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
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