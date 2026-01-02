<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itusermasterfile";
$app = new App;
$users = $app->selectAll($query);

?>
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $query = "SELECT * FROM itemail where emailid=$id";
    $app = new App;
    $emails = $app->selectAll($query);
}

?>

<?php
if (isset($_POST['submit'])) {

    echo $id = $_POST['id'];
    echo $userid = $_POST['userid'];
    echo $email = $_POST['email'];
    echo $emailpassword = $_POST['emailpassword'];
    echo $departmentid = $_POST['departmentid'];
    echo $emailold = $_POST['emailold'];
    echo $oldemailpassword = $_POST['oldemailpassword'];
    echo $emailstatus = $_POST['emailstatus'];
    echo $backupfile = $_POST['backupfile'];
    // $backupfile = $_FILES['backupfile']['name'];
    // $checkofficephoto = $_FILES['checkofficephoto']['name'];
    // $dir = "uploads/" . basename($backupfile);

    $query = "UPDATE itemail SET userid=:userid, email=:email
    , emailpassword=:emailpassword, departmentid=:departmentid
    , emailold=:emailold, oldemailpassword=:oldemailpassword
    , emailstatus=:emailstatus, backupfile=:backupfile
     WHERE emailid='$id'";

    $arr = [


        ":userid" => $userid,
        ":email" => $email,
        ":emailpassword" => $emailpassword,
        ":departmentid" => $departmentid,
        ":emailold" => $emailold,
        ":oldemailpassword" => $oldemailpassword,
        ":emailstatus" => $emailstatus,
        ":backupfile" => $backupfile,

    ];
    $path = "update-email.php?edit=$id";
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
                    <h1>Create Email</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="email.php" class="btn btn-primary">Back</a>
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
                    <h1 class="h5 mb-3"><b>Update Email</h1>


                </div><br>
                <!-- /.BODY -->
                <form class="row g-3" method="POST" action="update-email.php" enctype="multipart/form-data">
                    <?php foreach ($emails as $email): ?>

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
                                        <label for="email">Fullname</label>
                                        <input type="text" name="userid" id="userid" class="form-control"
                                            value="<?php echo $email->userid ?>">
                                        <input type="hidden" name="id" id="id" class="form-control"
                                            value="<?php echo $email->emailid ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email">Department</label>
                                        <input type="text" name="departmentid" id="departmentid" class="form-control"
                                            value="<?php echo $email->departmentid ?>">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            value="<?php echo $email->email ?>" placeholder="Email">@montemar.com.ph
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email">Password</label>
                                        <input type="text" name="emailpassword" id="emailpassword" class="form-control"
                                            value="<?php echo $email->emailpassword ?>" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="email">Old Email</label>
                                        <input type="text" name="emailold" id="emailold" class="form-control"
                                            value="<?php echo $email->emailold ?>" placeholder="Old Email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email">Old Password</label>
                                        <input type="text" name="oldemailpassword" id="oldemailpassword"
                                            class="form-control" value="<?php echo $email->oldemailpassword ?>"
                                            placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="category">Status</label>
                                        <select name="emailstatus" id="emailstatus" class="form-control">
                                            <option value="<?php echo $email->emailstatus ?>">
                                                <?php echo $email->emailstatus ?>
                                            </option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="For Request">For Request</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email">Upload the approved documents here</label>

                                        <input type="file" class="form-control-file border" name="backupfile">
                                        <a href="download.php?id=<?php echo $email->backupfile ?>" target="_thapa">
                                            <?php echo $email->backupfile ?> View
                                            Documents</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" name="submit">Update</button>
                <a href="email.php" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
            </form>
        <?php endforeach;
                    ?>
</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>