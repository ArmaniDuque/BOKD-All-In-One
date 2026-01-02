<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>


<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $query = "SELECT * FROM itaccounts where id=$id";
    $app = new App;
    $accountss = $app->selectAll($query);

}
?>

<?php
if (isset($_POST['submit'])) {

    echo $id = $_POST['id'];
    echo $accountname = $_POST['accountname'];
    echo $accountlink = $_POST['accountlink'];
    echo $username = $_POST['username'];
    echo $password = $_POST['password'];
    echo $remarks = $_POST['remarks'];


    $query = "UPDATE itaccounts SET id=:id, accountname=:accountname
    , accountlink=:accountlink, username=:username
    , password=:password, remarks=:remarks
     WHERE id='$id'";

    $arr = [


        ":id" => $id,
        ":accountname" => $accountname,
        ":accountlink" => $accountlink,
        ":username" => $username,
        ":password" => $password,
        ":remarks" => $remarks,

    ];
    $path = "update-accounts.php?edit=$id";
    $app->update($query, $arr, $path);



}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Account Credentials</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="accounts.php" class="btn btn-primary">Back</a>
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
                    <h1 class="h5 mb-3"><b>Update Account </h1>


                </div><br>
                <!-- /.BODY -->
                <form class="row g-3" method="POST" action="update-accounts.php">

                    <div class="card-body">
                        <div class="row">

                            <?php foreach ($accountss as $accounts): ?>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="accountname">Account Name</label>
                                    <input type="hidden" name="id" id="id" class="form-control"
                                        value="<?php echo $accounts->id ?>">
                                    <input type="text" name="accountname" id="accountname" class="form-control"
                                        value="<?php echo $accounts->accountname ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="accountname">Account Link</label>
                                    <input type="text" name="accountlink" id="accountlink" class="form-control"
                                        value="<?php echo $accounts->accountlink ?>">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="accountname">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="<?php echo $accounts->username ?>" placeholder="username">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="accountname">Password</label>
                                    <input type="text" name="password" id="password" class="form-control"
                                        value="<?php echo $accounts->password ?>" placeholder="New Password">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="accountname">Remarks</label>
                                    <input type="text" name="remarks" id="remarks" class="form-control"
                                        value="<?php echo $accounts->remarks ?>" placeholder="Remarks">
                                </div>
                            </div>

                            <?php endforeach; ?>





                        </div>
                    </div>
            </div>
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary" name="submit">Update</button>
            <a href="accounts.php" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
        </form>
</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>