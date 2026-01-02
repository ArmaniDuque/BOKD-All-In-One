<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>


<?php
if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $query = "SELECT * FROM itprojects where id=$id";
    $app = new App;
    $projects = $app->selectAll($query);

    $query = "SELECT * FROM itprojectbudgetlist where projectid=$id";
    $app = new App;
    $projectbudgetlists = $app->selectAll($query);


    $query = "SELECT * FROM itprojecttask where projectid=$id";
    $app = new App;
    $itprojecttasks = $app->selectAll($query);


    $query = "SELECT * FROM itsystem where projectid=$id";
    $app = new App;
    $itprojectconcerns = $app->selectAll($query);


    $query = "SELECT SUM(cost*qty) AS totalcost FROM itprojectbudgetlist WHERE projectid=$id";
    $app = new App;
    $totalcost = $app->selectOne($query);


}
if (isset($_POST['submit'])) {
    // $cctvid = $_POST['cctvid'];
    // $cctvname = $_POST['cctvname'];
    // $cctvip = $_POST['cctvip'];
    // $cctvidfid = $_POST['cctvidfid'];
    // $cctvsoftware = $_POST['cctvsoftware'];
    // $cctvstatus = $_POST['cctvstatus'];
    // $cctvstatus1 = $_POST['cctvstatus1'];
    // $cctvlocation = $_POST['cctvlocation'];
    // $cctvmacaddress = $_POST['cctvmacaddress'];
    // $cctvlive = $_POST['cctvlive'];
    // $cctvlive = $_POST['cctvlive'];
    // $cctvusername = $_POST['cctvusername'];
    // $cctvpassword = $_POST['cctvpassword'];
    // // `cctvid`, `cctvname`, `cctvip`, `cctvidfid`, `cctvsoftware`, 
    // //`cctvstatus`, `cctvlocation`, `cctvmacaddress`, `cctvlive`, `cctvusername`, `cctvpassword`, `created_at`

    // $query = "UPDATE itcctv SET cctvname=:cctvname, cctvip=:cctvip, cctvidfid=:cctvidfid, cctvsoftware=:cctvsoftware, cctvstatus=:cctvstatus, cctvstatus1=:cctvstatus1, cctvlocation=:cctvlocation, cctvmacaddress=:cctvmacaddress, cctvlive=:cctvlive, cctvusername=:cctvusername , cctvpassword=:cctvpassword WHERE cctvid='$cctvid'";
    // $arr = [


    //     ":cctvname" => $cctvname,
    //     ":cctvip" => $cctvip,
    //     ":cctvidfid" => $cctvidfid,
    //     ":cctvsoftware" => $cctvsoftware,
    //     ":cctvstatus" => $cctvstatus,
    //     ":cctvstatus1" => $cctvstatus1,
    //     ":cctvlocation" => $cctvlocation,
    //     ":cctvmacaddress" => $cctvmacaddress,
    //     ":cctvlive" => $cctvlive,
    //     ":cctvusername" => $cctvusername,
    //     ":cctvpassword" => $cctvpassword,


    // ];

    // // $path = "update-cctv.php?edit=$cctvid";
    // $path = "cctv.php";
    // $app->update($query, $arr, $path);
}

?>

<?php if (isset($_GET['delete'])) {
        // $id = $_GET['delete'];
        // $query = "DELETE FROM itcctv WHERE cctvid='$id'";
        // $app = new App;
        // $path = "cctv.php";
        // $app->delete($query, $path);
    }
    ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="index.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <?php foreach ($projects as $project): ?>
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                        </div>
                        <div class="card-body" style="display: none;">
                            <div class="form-group">
                                <label for="inputName">Project Name</label>
                                <input type="text" id="inputName" class="form-control"
                                    value="<?php echo $project->projectname ?>">
                            </div>
                            <div class=" form-group">
                                <label for="inputDescription">Project Description</label>
                                <textarea id="inputDescription" class="form-control"
                                    rows="4"><?php echo $project->description ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus" class="form-control custom-select">
                                    <option disabled="">Select one</option>
                                    <option value=" <?php echo $project->status ?>">
                                        <?php echo $project->status ?>
                                    </option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Canceled">Canceled</option>
                                    <option value="Success">Success</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Priority</label>
                                <select id="inputStatus" class="form-control custom-select">
                                    <option disabled="">Select one</option>
                                    <option value=" <?php echo $project->priority ?>">
                                        <?php echo $project->priority ?>
                                    </option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Client Company</label>
                                <input type=" text" id="inputClientCompany" class="form-control"
                                    value="<?php echo $project->company ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Project Leader</label>
                                <input type=" text" id="inputProjectLeader" class="form-control"
                                    value="<?php echo $project->projectleader ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Project Leader</label>
                                <input type=" text" id="inputProjectLeader" class="form-control"
                                    value="<?php echo $project->budget ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-secondary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Task</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: none;">
                            <div class="form-group">

                                <br>
                                <div class="row">

                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Task</th>
                                                <th>Status</th>
                                                <th>AssigneTo</th>
                                                <th>Priority</th>
                                                <!-- <th>Due Date</th> -->
                                                <th>Notes</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($itprojecttasks as $itprojecttask): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $itprojecttask->task ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($itprojecttask->status == "Completed") { ?>
                                                            <span class="badge badge-success lg">Success</span>
                                                        <?php } else if ($itprojecttask->status == "In Progress") { ?>

                                                                <span class="badge badge-warning">Ongoing</span>
                                                        <?php } else if ($itprojecttask->status == "Not Started") { ?>
                                                                    <span class="badge badge-danger">On Hold</span>
                                                        <?php } ?>


                                                    </td>
                                                    <td><?php echo $itprojecttask->assignedto ?></td>
                                                    <td><?php echo $itprojecttask->priority ?></td>
                                                    <!-- <td><?php echo $itprojecttask->duedate ?> -->
                                                    </td>
                                                    <td>
                                                        <?php echo $itprojecttask->notes ?>
                                                    </td>

                                                    <td class="text-right py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>#</td>
                                                <td> <input type="text" class="form-control" placeholder="Description"></td>
                                                <td> <input type="number" class="form-control" placeholder="Qty"></td>
                                                <td>
                                                    <select name="" id="" class="form-control">
                                                        <option value="pcs">pcs</option>
                                                        <option value="ea">ea</option>
                                                        <option value="unit">unit</option>
                                                        <option value="Lot">Lot</option>
                                                        <option value="set">set</option>
                                                        <option value="pack">pack</option>
                                                        <option value="bundle">bundle</option>
                                                        <option value="hr">hr</option>
                                                        <option value="day">day</option>
                                                        <option value="wk">wk</option>
                                                        <option value="mo">mo</option>
                                                        <option value="FTE">FTE</option>



                                                    </select>
                                                </td>
                                                <td> <input type="text" class="form-control" placeholder="Cost"></td>
                                                <td colspan="2">
                                                    <div class="row">
                                                        <div class="col-12">

                                                            <input type="submit" style="width:100%" value="Save "
                                                                class="btn btn-success ">
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                        </tfoot>
                                    </table>



                                </div>




                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card card-secondary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Critical Issues & Roadblocks</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: none;">
                            <div class="form-group">

                                <br>
                                <div class="row">

                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Status</th>
                                                <th>TicketID</th>
                                                <th>Issue Title</th>
                                                <!-- <th>Reported By</th>
                                            <th>Priority</th> -->
                                                <th>Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($itprojectconcerns as $itprojectconcern): ?>
                                                <tr>
                                                    <td><?php echo $itprojectconcern->status ?></td>
                                                    <td><?php echo $itprojectconcern->ticketid ?></td>

                                                    <td>
                                                        <?php echo $itprojectconcern->subject ?>
                                                    </td>



                                                    <td>
                                                        <?php echo $itprojectconcern->createdat ?>
                                                    </td>

                                                    <td class="text-right py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="<?php echo APPURL; ?>it-panel/systemconcern/update-systemconcern.php?edit=<?php echo $itprojectconcern->systemid ?>"
                                                                class="btn btn-info"><i class="fas fa-eye"></i></a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <td>


                                                    <select name="status" id="status" class="form-control">

                                                        <option value="In Progress">In Progress</option>
                                                        <option value="New">New</option>
                                                        <option value="Done">Done</option>

                                                    </select>

                                                </td>
                                                <td>
                                                    <input type="text" name="ticketid" id="ticketid" class="form-control"
                                                        value="">
                                                </td>

                                                <td colspan="2"> <input type="text" name="subject" id="subject"
                                                        class="form-control" value=""></td>
                                                <td colspan="2">
                                                    <div class="row">
                                                        <div class="col-12">

                                                            <input type="submit" style="width:100%" value="Save "
                                                                class="btn btn-success ">
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                        </tfoot>
                                    </table>



                                </div>




                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card card-secondary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Budget</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: none;">
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Estimated budget</span>
                                                <span class="info-box-number text-center text-muted mb-0">
                                                    <?php echo '₱' . number_format($project->budget, 2, '.', ','); ?>
                                                </span></span>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Total amount spent</span>
                                                <?php if ($project->budget > $totalcost->totalcost) { ?>
                                                    <span class="info-box-number text-center mb-0 text-success">
                                                    <?php } else { ?>
                                                        <span class="info-box-number text-center  text-danger mb-0">
                                                        <?php } ?>

                                                        <?php echo '₱' . number_format($totalcost->totalcost, 2, '.', ','); ?>
                                                    </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">Balance</span> <span
                                                    class="info-box-number text-center text-muted mb-0">
                                                    <?php echo '₱' . number_format($project->budget - $totalcost->totalcost, 2, '.', ','); ?>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">#</th>
                                                <th style="width: 30%">Description</th>
                                                <th style="width: 15%">Qty</th>
                                                <th style="width: 15%">Unit</th>
                                                <th style="width: 25%">Cost</th>
                                                <th style="width: 25%">Total</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($projectbudgetlists as $projectbudgetlist): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $projectbudgetlist->id ?>
                                                    </td>
                                                    <td><?php echo $projectbudgetlist->description ?></td>
                                                    <td><?php echo $projectbudgetlist->qty ?></td>
                                                    <td><?php echo $projectbudgetlist->unit ?>
                                                    </td>
                                                    <td>
                                                        <?php echo '₱' . number_format($projectbudgetlist->cost, 2, '.', ','); ?>
                                                    </td>
                                                    <td><?php
                                                    $calculatedValue = $projectbudgetlist->cost * $projectbudgetlist->qty;
                                                    echo '₱' . number_format($calculatedValue, 2, '.', ',');
                                                    ?>
                                                    </td>
                                                    <td class="text-right py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>#</td>
                                                <td> <input type="text" class="form-control" placeholder="Description"></td>
                                                <td> <input type="number" class="form-control" placeholder="Qty"></td>
                                                <td>
                                                    <select name="" id="" class="form-control">
                                                        <option value="pcs">pcs</option>
                                                        <option value="ea">ea</option>
                                                        <option value="unit">unit</option>
                                                        <option value="Lot">Lot</option>
                                                        <option value="set">set</option>
                                                        <option value="pack">pack</option>
                                                        <option value="bundle">bundle</option>
                                                        <option value="hr">hr</option>
                                                        <option value="day">day</option>
                                                        <option value="wk">wk</option>
                                                        <option value="mo">mo</option>
                                                        <option value="FTE">FTE</option>



                                                    </select>
                                                </td>
                                                <td> <input type="text" class="form-control" placeholder="Cost"></td>
                                                <td colspan="2">
                                                    <div class="row">
                                                        <div class="col-12">

                                                            <input type="submit" style="width:100%" value="Save "
                                                                class="btn btn-success ">
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                        </tfoot>
                                    </table>



                                </div>




                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Files</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                        </div>
                        <div class="card-body p-0" style="display: none;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>File Size</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Functional-requirements.docx</td>
                                        <td>49.8005 kb</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>UAT.pdf</td>
                                        <td>28.4883 kb</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email-from-flatbal.mln</td>
                                        <td>57.9003 kb</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Logo.png</td>
                                        <td>50.5190 kb</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Contract-10_12_2014.docx</td>
                                        <td>44.9715 kb</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Save Changes" class="btn btn-success float-right">
                </div>
            </div>
        </section>
    <?php endforeach; ?>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require "../../footer1.php"; ?>