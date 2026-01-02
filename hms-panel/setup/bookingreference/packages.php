<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>



<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmspackages where id='$id'";
    $app = new App;
    $path = "packages.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $packages = $_POST['packages'];
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
    $query = "INSERT INTO hmspackages (packages, description, countryid, address, sourceid, email, email1, contactno, contactno1, contactperson, startdate, enddate, corpaccount, status)
VALUES(:packages,:description, :countryid, :address, :sourceid, :email, :email1, :contactno,  :contactno1, :contactperson, :startdate, :enddate, :corpaccount, :status)";
    $arr = [
        ":packages" => $packages,
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
    $path = "packages.php";
    $app->register($query, $arr, $path);
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
                    <h1 class="h5 mb-3"><b>Packages </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->



                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="packages.php">
                                <div class="col-md-12 mb-3">
                                    <h5 class="text-primary">Transactions</h5>

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Packages Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="packages">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="categoryid"
                                                id="colFormLabelSm">
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
                                            class="col-sm-3 col-form-label col-form-label-sm">Calculate Rate</label>
                                        <div class="col-sm-8">
                                            <select class="form-control form-control-sm" name="calculaterateid">
                                                <option value="1">Per Adult</option>
                                                <option value="2">Per Room</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 mb-3">
                                    <h5 class="text-primary">Meals</h5>
                                    <div class="form-group row">
                                        <div class="form-check">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input class="form-check-input" type="checkbox" id="collection"
                                                        value="1" name="collection"><label
                                                        class="form-check-label">Breakfast</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-check-input" type="checkbox" id="process"
                                                        value="1" name="process">
                                                    <label class="form-check-label">Lunch</label>
                                                </div>

                                                <div class="col-md-4">
                                                    <input class="form-check-input" type="checkbox" id="modification"
                                                        value="1" name="modification">
                                                    <label class="form-check-label">Dinner</label>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">No
                                            of Pax</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="email">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-12 mb-3">
                                    <h5 class="text-primary">Date</h5>

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Sell Date </label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="startdate">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">End Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="enddate">
                                        </div>
                                    </div>
                                </div>

                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                    <!-- <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a> -->

                                </div>
                            </form>

                        </div>
                        <div class="col-md-8 mb-3 ">

                            <div class="col-md-12 ">
                                <h5 class="mb-3 text-primary">List of Packages
                                </h5>
                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmstransactions where packageelement=1 ";
                                $app = new App;
                                $transactionss = $app->selectAll($query);
                                ?>
                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <!-- <th>ID</th> -->
                                            <th>Code </th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transactionss as $transactions): ?>

                                        <tr>
                                            <td>
                                                <?php echo $transactions->code ?>
                                            </td>
                                            <td>
                                                <?php echo $transactions->description ?>
                                            </td>
                                            <td>
                                                <?php echo $transactions->price ?>
                                            </td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="transactions.php?edit=<?php echo $transactions->id ?>"
                                                    class=" text-success">
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="transactions.php?delete=<?php echo $transactions->id ?>"
                                                    class=" text-danger">
                                                    <i class="nav-icon fas fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#history').DataTable({
                                            "pageLength": 10,
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