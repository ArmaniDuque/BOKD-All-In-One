<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>



<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmsagent where id='$id'";
    $app = new App;
    $path = "agent.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['save'])) {
    $agent = $_POST['agent'];
    $description = $_POST['description'];
    $countryid = $_POST['countryid'];
    $address = $_POST['address'];
    $sourceid = $_POST['sourceid'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $contactperson = $_POST['contactperson'];
    $accountid = $_POST['accountid'];
    $query = "INSERT INTO hmsagent (agent, description, countryid, address, sourceid, email, contactno, contactperson, accountid)
VALUES(:agent,:description, :countryid, :address, :sourceid, :email, :contactno, :contactperson, :accountid)";
    $arr = [
        ":agent" => $agent,
        ":description" => $description,
        ":countryid" => $countryid,
        ":address" => $address,
        ":sourceid" => $sourceid,
        ":email" => $email,
        ":contactno" => $contactno,
        ":contactperson" => $contactperson,
        ":accountid" => $accountid,
    ];
    $path = "agent.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $agent = $_POST['agent'];
    $description = $_POST['description'];
    $countryid = $_POST['countryid'];
    $address = $_POST['address'];
    $sourceid = $_POST['sourceid'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $contactperson = $_POST['contactperson'];
    $accountid = $_POST['accountid'];




    $query = "UPDATE hmsagent SET agent=:agent, description=:description, countryid=:countryid, address=:address, sourceid=:sourceid, email=:email
    , contactno=:contactno, contactperson=:contactperson, accountid=:accountid WHERE id='$id'";

    $arr = [
        ":agent" => $agent,
        ":description" => $description,
        ":countryid" => $countryid,
        ":address" => $address,
        ":sourceid" => $sourceid,
        ":email" => $email,
        ":contactno" => $contactno,
        ":contactperson" => $contactperson,
        ":accountid" => $accountid,
    ];
    $path = "agent.php?edit=$id";
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
                    <h1 class="h5 mb-3"><b>Agent </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->


                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmsagent where id='$id'";
                            $app = new App;
                            $agent = $app->selectAll($query); ?>

                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="agent.php">
                                <?php foreach ($agent as $agent): ?>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Agent Code</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $agent->id ?>">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="agent" value="<?php echo $agent->agent ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="description" value="<?php echo $agent->description ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Country</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="countryid">

                                                <?php
                                                        $query = "SELECT * FROM hmscountry where id=$agent->countryid";
                                                        $app = new App;
                                                        $ccountrys = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($ccountrys as $ccountry): ?>
                                                <option value="<?php echo $ccountry->id ?>">
                                                    <?php echo $ccountry->country ?>
                                                </option>
                                                <?php endforeach; ?>


                                                <?php
                                                        $query = "SELECT * FROM hmscountry";
                                                        $app = new App;
                                                        $countrys = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($countrys as $country): ?>
                                                <option value="<?php echo $country->id ?>">
                                                    <?php echo $country->country ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="address" value="<?php echo $agent->address ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Source</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="sourceid">
                                                <?php
                                                        $query = "SELECT * FROM hmssource where id=$agent->sourceid";
                                                        $app = new App;
                                                        $csources = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($csources as $csource): ?>
                                                <option value="<?php echo $csource->id ?>">
                                                    <?php echo $csource->source ?>
                                                </option>
                                                <?php endforeach; ?>



                                                <?php
                                                        $query = "SELECT * FROM hmssource";
                                                        $app = new App;
                                                        $sources = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($sources as $source): ?>
                                                <option value="<?php echo $source->id ?>">
                                                    <?php echo $source->source ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="email" value="<?php echo $agent->email ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Contact No.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactno" value="<?php echo $agent->contactno ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Contact Person</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactperson" value="<?php echo $agent->contactperson ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Accounts</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="accountid">

                                                <?php
                                                        $query = "SELECT * FROM hmsaccounts where id=$agent->accountid";
                                                        $app = new App;
                                                        $caccountss = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($caccountss as $caccounts): ?>
                                                <option value="<?php echo $caccounts->id ?>">
                                                    <?php echo $caccounts->accounts ?>
                                                </option>
                                                <?php endforeach; ?>


                                                <?php
                                                        $query = "SELECT * FROM hmsaccounts";
                                                        $app = new App;
                                                        $accounts = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($accounts as $account): ?>
                                                <option value="<?php echo $account->id ?>">
                                                    <?php echo $account->accounts ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    <a href="agent.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>
                                <?php endforeach; ?>

                            </form>

                        </div>

                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="agent.php">
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Agent Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="agent">
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
                                            class="col-sm-3 col-form-label col-form-label-sm">Country</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="countryid">
                                                <?php
                                                    $query = "SELECT * FROM hmscountry";
                                                    $app = new App;
                                                    $countrys = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($countrys as $country): ?>
                                                <option value="<?php echo $country->id ?>">
                                                    <?php echo $country->country ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Source</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="sourceid">
                                                <?php
                                                    $query = "SELECT * FROM hmssource";
                                                    $app = new App;
                                                    $sources = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($sources as $source): ?>
                                                <option value="<?php echo $source->id ?>">
                                                    <?php echo $source->source ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
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
                                            class="col-sm-3 col-form-label col-form-label-sm">Contact Person</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactperson">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Accounts</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="accountid">

                                                <?php
                                                    $query = "SELECT * FROM hmsaccounts";
                                                    $app = new App;
                                                    $accounts = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($accounts as $account): ?>
                                                <option value="<?php echo $account->id ?>">
                                                    <?php echo $account->accounts ?>
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
                                <h4 class="mb-3 text-primary">List of hmsagent --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmsagent ";
                                $app = new App;
                                $agents = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Agent </th>
                                            <th>Description</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($agents as $agent): ?>

                                        <tr>
                                            <td><?php echo $agent->id ?></td>
                                            <td><?php echo $agent->agent ?></td>
                                            <td><?php echo $agent->description ?></td>
                                            <td><?php echo $agent->email ?></td>
                                            <td><?php echo $agent->contactno ?></td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="agent.php?edit=<?php echo $agent->id ?>" class="text-success">
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="agent.php?delete=<?php echo $agent->id ?>"
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