<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>



<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmscompany where id='$id'";
    $app = new App;
    $path = "company.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['save'])) {
    $company = $_POST['company'];
    $description = $_POST['description'];
    $countryid = $_POST['countryid'];
    $address = $_POST['address'];
    $sourceid = $_POST['sourceid'];
    $email = $_POST['email'];
    $email1 = $_POST['email1'];
    $contactno = $_POST['contactno'];
    $contactno1 = $_POST['contactno1'];
    $contactperson = $_POST['contactperson'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $corpaccount = $_POST['corpaccount'];
    $status = $_POST['status'];
    $query = "INSERT INTO hmscompany (company, description, countryid, address, sourceid, email, email1, contactno, contactno1, contactperson, startdate, enddate, corpaccount, status)
VALUES(:company,:description, :countryid, :address, :sourceid, :email, :email1, :contactno,  :contactno1, :contactperson, :startdate, :enddate, :corpaccount, :status)";
    $arr = [
        ":company" => $company,
        ":description" => $description,
        ":countryid" => $countryid,
        ":address" => $address,
        ":sourceid" => $sourceid,
        ":email" => $email,
        ":email1" => $email1,
        ":contactno" => $contactno,
        ":contactno1" => $contactno1,
        ":contactperson" => $contactperson,
        ":startdate" => $startdate,
        ":enddate" => $enddate,
        ":corpaccount" => $corpaccount,
        ":status" => $status,
    ];
    $path = "company.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $company = $_POST['company'];
    $description = $_POST['description'];
    $countryid = $_POST['countryid'];
    $address = $_POST['address'];
    $sourceid = $_POST['sourceid'];
    $email = $_POST['email'];
    $email1 = $_POST['email1'];
    $contactno = $_POST['contactno'];
    $contactno1 = $_POST['contactno1'];
    $contactperson = $_POST['contactperson'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $corpaccount = $_POST['corpaccount'];
    $status = $_POST['status'];



    $query = "UPDATE hmscompany SET company=:company, description=:description, countryid=:countryid, sourceid=:sourceid, address=:address
    , email=:email, email1=:email1, contactno=:contactno, contactno1=:contactno1, contactperson=:contactperson
    , startdate=:startdate, enddate=:enddate, corpaccount=:corpaccount, status=:status WHERE id='$id'"; // Added address and id placeholder


    $arr = [
        ":company" => $company,
        ":description" => $description,
        ":countryid" => $countryid,
        ":address" => $address, // Added address
        ":sourceid" => $sourceid,
        ":email" => $email,
        ":email1" => $email1,
        ":contactno" => $contactno,
        ":contactno1" => $contactno1,
        ":contactperson" => $contactperson,
        ":startdate" => $startdate,
        ":enddate" => $enddate,
        ":corpaccount" => $corpaccount,
        ":status" => $status,

    ];
    $path = "company.php?edit=$id";
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
                    <h1 class="h5 mb-3"><b>Company </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->


                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmscompany where id='$id'";
                            $app = new App;
                            $company = $app->selectAll($query); ?>

                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="company.php">
                                <?php foreach ($company as $company): ?>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Company Code</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $company->id ?>">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="company" value="<?php echo $company->company ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="description" value="<?php echo $company->description ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Country</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="countryid">
                                                <?php
                                                        $query = "SELECT * FROM hmscountry where id=$company->countryid";
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

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="address" value="<?php echo $company->address ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Source</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="sourceid">
                                                <?php
                                                        $query = "SELECT * FROM hmssource where id=$company->sourceid";
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

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">1st Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="email" value="<?php echo $company->email ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">2nd Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="email1" value="<?php echo $company->email1 ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Contact No.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactno" value="<?php echo $company->contactno ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Other Contact No.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactno1" value="<?php echo $company->contactno1 ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Contact Person</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactperson" value="<?php echo $company->contactperson ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Star Contract </label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="startdate" value="<?php echo $company->startdate ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">End Contract</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="enddate" value="<?php echo $company->enddate ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Corporate Account</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="corpaccount">


                                                <option value="<?php echo $company->corpaccount ?>">
                                                    <?php echo $company->corpaccount ?>
                                                </option>
                                                <option value="No">No</option>
                                                <option value="No">Yes</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="status">
                                                <option value="<?php echo $company->status ?>">
                                                    <?php echo $company->status ?>
                                                </option>
                                                <option value="Active">Active</option>
                                                <option value="InActive">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Updae</button>
                                    <a href="company.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>

                                <?php endforeach; ?>
                            </form>


                        </div>
                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="company.php">
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Company Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="company">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
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

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
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

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">1st Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">2nd Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="email1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Contact No.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactno">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Other Contact No.</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactno1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Contact Person</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="contactperson">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Star Contract </label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="startdate">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">End Contract</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="enddate">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Corporate Account</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="corpaccount">

                                                <option value="0">No</option>
                                                <option value="1">Yes</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-company row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
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
                                <h4 class="mb-3 text-primary">List of hmscompany --------------------------
                                </h4>
                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmscompany ";
                                $app = new App;
                                $companys = $app->selectAll($query);
                                ?>
                                <table class="table table-striped " style="width:100%" id="history">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Company Name </th>
                                            <th>Description </th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($companys as $company): ?>

                                        <tr>
                                            <td><?php echo $company->id ?></td>
                                            <td><?php echo $company->company ?></td>
                                            <td><?php echo $company->description ?></td>
                                            <td><?php echo $company->address ?></td>
                                            <td><?php echo $company->email ?>
                                                <?php echo "</br>"; ?>
                                                <?php echo $company->email1 ?>
                                            </td>
                                            <td><?php echo $company->contactno ?>
                                                <?php echo "</br>"; ?>
                                                <?php echo $company->contactno1 ?>
                                            </td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="company.php?edit=<?php echo $company->id ?>"
                                                    class="text-success">
                                                    <i class="nav-icon fas fa fa-edit"></i>
                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="company.php?delete=<?php echo $company->id ?>"
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