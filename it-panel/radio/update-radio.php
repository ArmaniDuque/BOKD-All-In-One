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

    $query = "SELECT * FROM itradio where radioid=$id";
    $app = new App;
    $radios = $app->selectAll($query);

}
?>

<?php
if (isset($_POST['submit'])) {

    echo $id = $_POST['id'];
    echo $radiouserid = $_POST['radiouserid'];
    echo $radioposition = $_POST['radioposition'];
    echo $radiodepartment = $_POST['radiodepartment'];
    echo $radiocallsign = $_POST['radiocallsign'];
    echo $radioserialno = $_POST['radioserialno'];
    echo $radiobrand = $_POST['radiobrand'];
    echo $radiostatus = $_POST['radiostatus'];



    $query = "UPDATE itradio SET radiouserid=:radiouserid, radioposition=:radioposition
    , radiodepartment=:radiodepartment, radiocallsign=:radiocallsign
    , radioserialno=:radioserialno, radiobrand=:radiobrand
    , radiostatus=:radiostatus
     WHERE radioid='$id'";

    $arr = [
        ":radiouserid" => $radiouserid,
        ":radioposition" => $radioposition,
        ":radiodepartment" => $radiodepartment,
        ":radiocallsign" => $radiocallsign,
        ":radioserialno" => $radioserialno,
        ":radiobrand" => $radiobrand,
        ":radiostatus" => $radiostatus,

    ];
    $path = "update-radio.php?edit=$id";
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
                    <h1>Update Radio</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="radio.php" class="btn btn-primary">Back</a>
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
                    <h1 class="h5 mb-3"><b>Update Radio</h1>


                </div><br>
                <!-- /.BODY -->
                <form class="row g-3" method="POST" action="update-radio.php">
                    <?php foreach ($radios as $radio): ?>

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
                                        <label for="radio">Fullname</label>
                                        <input type="hidden" value="<?php echo $radio->radioid ?>" name="id" id="id"
                                            class="form-control">
                                        <input type="text" value="<?php echo $radio->radiouserid ?>" name="radiouserid"
                                            id="radiouserid" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="radio">Department</label>
                                        <input type="text" value="<?php echo $radio->radiodepartment ?>"
                                            name="radiodepartment" id="radiodepartment" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="radio">Designated</label>
                                        <input type="text" value="<?php echo $radio->radioposition ?>" name="radioposition"
                                            id="radioposition" class="form-control" placeholder="Designated">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="radio">Call Sign</label>
                                        <input type="text" value="<?php echo $radio->radiocallsign ?>" name="radiocallsign"
                                            id="radiocallsign" class="form-control" placeholder="Call Sign">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="radio">Radio Brand</label>
                                        <input type="text" value="<?php echo $radio->radiobrand ?>" name="radiobrand"
                                            id="radiobrand" class="form-control" placeholder="Radio Brand">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="radio">Radio Serial No</label>
                                        <input type="text" value="<?php echo $radio->radioserialno ?>" name="radioserialno"
                                            id="radioserialno" class="form-control" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="category">Status</label>
                                        <select name="radiostatus" id="radiostatus" class="form-control">
                                            <option value="<?php echo $radio->radiostatus ?>">
                                                <?php echo $radio->radiostatus ?>
                                            </option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="For Request">For Request</option>

                                        </select>
                                    </div>
                                </div>



                            </div>
                        </div>
                    <?php endforeach; ?>

            </div>
        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary" name="submit">Update</button>
            <a href="radio.php" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
        </form>
</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>