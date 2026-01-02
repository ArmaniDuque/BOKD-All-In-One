<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>



<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmssource where id='$id'";
    $app = new App;
    $path = "source.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['save'])) {
    $source = $_POST['source'];
    $description = $_POST['description'];
    $bankname = $_POST['bankname'];
    $accountname = $_POST['accountname'];
    $accountno = $_POST['accountno'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $referenceid = $_POST['referenceid'];
    $marketid = $_POST['marketid'];
    $query = "INSERT INTO hmssource (source, description, bankname, accountname, accountno, email, contactno, referenceid, marketid)
VALUES(:source,:description, :bankname, :accountname, :accountno, :email, :contactno, :referenceid, :marketid)";
    $arr = [
        ":source" => $source,
        ":description" => $description,
        ":bankname" => $bankname,
        ":accountname" => $accountname,
        ":accountno" => $accountno,
        ":email" => $email,
        ":contactno" => $contactno,
        ":referenceid" => $referenceid,
        ":marketid" => $marketid,
    ];
    $path = "source.php";
    $app->register($query, $arr, $path);
}
?>
<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $source = $_POST['source'];
    $description = $_POST['description'];
    $bankname = $_POST['bankname'];
    $accountname = $_POST['accountname'];
    $accountno = $_POST['accountno'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $referenceid = $_POST['referenceid'];
    $marketid = $_POST['marketid'];
    $query = "UPDATE hmssource SET source=:source, description=:description, bankname=:bankname , accountname=:accountname
     , accountno=:accountno , email=:email , contactno=:contactno , referenceid=:referenceid 
     , marketid=:marketid   WHERE id='$id'";
    $arr = [
        ":source" => $source,
        ":description" => $description,
        ":bankname" => $bankname,
        ":accountname" => $accountname,
        ":accountno" => $accountno,
        ":email" => $email,
        ":contactno" => $contactno,
        ":referenceid" => $referenceid,
        ":marketid" => $marketid,
    ];
    $path = "source.php?edit=$id";
    $app->update($query, $arr, $path);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Accounts</h1>
                </div> -->

                <?php require "../navbar.php"; ?><?php require "navbar.php"; ?>
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
                    <h1 class="h5 mb-3"><b>Source / Book By </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->


                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmssource where id='$id'";
                            $app = new App;
                            $sources = $app->selectAll($query); ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="source.php">
                                <?php foreach ($sources as $source): ?>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Source Code</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $source->id ?>">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="source" value="<?php echo $source->source ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="description" value="<?php echo $source->description ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Bank Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="bankname" value="<?php echo $source->bankname ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Account Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="accountname" value="<?php echo $source->accountname ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Account No</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="accountno" value="<?php echo $source->accountno ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="email" value="<?php echo $source->email ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Contact No.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactno" value="<?php echo $source->contactno ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Reference</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="referenceid">

                                                <?php
                                                        $query = "SELECT * FROM hmsroomtypes";
                                                        $app = new App;
                                                        $roomtypes = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($roomtypes as $roomtype): ?>
                                                <option value="<?php echo $roomtype->id ?>">
                                                    <?php echo $roomtype->roomtypes ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Market</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="marketid">
                                                <?php
                                                        $query = "SELECT * FROM hmsmarket";
                                                        $app = new App;
                                                        $markets = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($markets as $market): ?>
                                                <option value="<?php echo $market->id ?>">
                                                    <?php echo $market->market ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    <a href="source.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>
                                <?php endforeach; ?>
                            </form>

                        </div>
                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="source.php">
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Source Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="source">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Bank Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="bankname">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Account Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="accountname">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Account No</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="accountno">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Contact No.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactno">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Reference</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="referenceid">
                                                <?php
                                                    $query = "SELECT * FROM hmsroomtypes";
                                                    $app = new App;
                                                    $roomtypes = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($roomtypes as $roomtype): ?>
                                                <option value="<?php echo $roomtype->id ?>">
                                                    <?php echo $roomtype->roomtypes ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Market</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="marketid">
                                                <?php
                                                    $query = "SELECT * FROM hmsmarket";
                                                    $app = new App;
                                                    $markets = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($markets as $market): ?>
                                                <option value="<?php echo $market->id ?>">
                                                    <?php echo $market->market ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="save">Save</button>
                                    <!-- <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a> -->

                                </div>
                            </form>

                        </div>
                        <?php } ?>

                        <div class="col-md-8 mb-3 ">

                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">List of hmssource --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmssource ";
                                $app = new App;
                                $sources = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>source </th>
                                            <th>Description</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sources as $source): ?>

                                        <tr>
                                            <td><?php echo $source->id ?></td>


                                            <td><?php echo $source->source ?></td>
                                            <td><?php echo $source->description ?></td>
                                            <td><?php echo $source->email ?></td>
                                            <td><?php echo $source->contactno ?></td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="source.php?edit=<?php echo $source->id ?>"
                                                    class="text-success">
                                                    <i class="nav-icon fas fa fa-edit"></i>
                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="source.php?delete=<?php echo $source->id ?>"
                                                    class="text-danger">
                                                    <i class="nav-icon fas fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#history').DataTable({
                                            "pageLength": 5,
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'copy', 'csv', 'excel', 'pdf', 'print'
                                            ]
                                        });
                                    });
                                    $('#history [data-toggle="tooltip"]').tooltip({
                                        animated: 'fade',
                                        placement: 'bottom',
                                        html: true
                                    });
                                    </script>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>