<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itusermasterfile";
$app = new App;
$users = $app->selectAll($query);

?>


<?php
if (isset($_POST['submit'])) {

    echo $userid = $_POST['userid'];
    echo $subscription = $_POST['subscription'];
    echo $subscriptionpassword = $_POST['subscriptionpassword'];
    echo $departmentid = $_POST['departmentid'];
    // echo $subscriptionold = $_POST['subscriptionold'];
    echo $datefrom = $_POST['datefrom'];
    echo $dateto = $_POST['dateto'];
    echo $remarks = $_POST['remarks'];
    echo $subscriptionstatus = $_POST['subscriptionstatus'];


    $query = "INSERT INTO itsubscription (userid, subscription, datefrom, dateto, subscriptionpassword, departmentid, remarks, subscriptionstatus)
VALUES(:userid, :subscription,:datefrom, :dateto, :subscriptionpassword, :departmentid, :remarks, :subscriptionstatus)";
    $arr = [
        ":userid" => $userid,
        ":subscription" => $subscription,
        ":datefrom" => $datefrom,
        ":dateto" => $dateto,
        ":subscriptionpassword" => $subscriptionpassword,
        ":departmentid" => $departmentid,

        ":remarks" => $remarks,
        ":subscriptionstatus" => $subscriptionstatus,
    ];
    $path = "subscription.php";
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
                    <h1>Create subscription</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="subscription.php" class="btn btn-primary">Back</a>
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
                    <h1 class="h5 mb-3"><b>Create subscription</h1>


                </div><br>
                <!-- /.BODY -->
                <form class="row g-3" method="POST" action="create-subscription.php">

                    <div class="card-body">
                        <div class="row">

                            <!-- <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="category">Full Name</label>
                                    <select name="userid" id="userid" class="form-control">
                                        <?php foreach ($users as $user): ?>
                                        <option value="<?php echo $user->userid ?>"> <?php echo $user->userfullname ?> :
                                            <?php echo $user->userposition ?>
                                        </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div> -->

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="subscription">Fullname</label>
                                    <input type="text" name="userid" id="userid" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="subscription">Department</label>
                                    <input type="text" name="departmentid" id="departmentid" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="subscription">subscription</label>
                                    <input type="text" name="subscription" id="subscription" class="form-control"
                                        placeholder="subscription">@montemar.com.ph
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="subscription">Password</label>
                                    <input type="text" name="subscriptionpassword" id="subscriptionpassword"
                                        class="form-control" placeholder="New Password">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="subscription">Date Avail</label>
                                    <input type="date" name="datefrom" id="datefrom" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="subscription">Date Avail</label>
                                    <input type="date" name="dateto" id="dateto" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category">Status</label>
                                    <select name="subscriptionstatus" id="subscriptionstatus" class="form-control">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="For Request">For Request</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="subscription">Remarks</label>
                                    <input type="text" name="remarks" id="remarks" class="form-control"
                                        placeholder="Old subscription">
                                </div>
                            </div>




                        </div>
                    </div>
            </div>
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary" name="submit">Create</button>
            <a href="subscription.php" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
        </form>
</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>