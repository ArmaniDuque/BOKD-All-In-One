<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>



<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmstransactions where id='$id'";
    $app = new App;
    $path = "transactions.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $transactions = $_POST['transactions'];
    $description = $_POST['description'];
    $categoryid = $_POST['categoryid'];
    $dcoa = $_POST['dcoa'];
    $dsub1 = $_POST['dsub1'];
    $dsub2 = $_POST['dsub2'];
    $dsub3 = $_POST['dsub3'];
    $dsub4 = $_POST['dsub4'];
    $ccoa = $_POST['ccoa'];
    $csub1 = $_POST['csub1'];
    $csub2 = $_POST['csub2'];
    $csub3 = $_POST['csub3'];
    $csub4 = $_POST['csub4'];
    $adjcode = $_POST['adjcode'];
    $adjdescription = $_POST['adjdescription'];
    $query = "INSERT INTO hmstransactions (transactions, description, categoryid, dcoa, dsub1, dsub2, dsub3, dsub4, ccoa, csub1, csub2, csub3, csub4, adjcode, adjdescription)
VALUES(:transactions,:description, :categoryid, :dcoa, :dsub1, :dsub2, :dsub3, :dsub4,  :ccoa, :csub1, :csub2, :csub3, :csub4, :adjcode , :adjdescription)";
    $arr = [
        ":transactions" => $transactions,
        ":description" => $description,
        ":categoryid" => $categoryid,
        ":dcoa" => $dcoa,
        ":dsub1" => $dsub1,
        ":dsub2" => $dsub2,
        ":dsub3" => $dsub3,
        ":dsub4" => $dsub4,
        ":ccoa" => $ccoa,
        ":csub1" => $csub1,
        ":csub2" => $csub2,
        ":csub3" => $csub3,
        ":csub4" => $csub4,
        ":adjcode" => $adjcode,
        ":adjdescription" => $adjdescription,
    ];
    $path = "transactions.php";
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
                    <h1 class="h5 mb-3"><b>Transactions </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card mt-3 tab-card">
                                <div class="card-header tab-card-header">
                                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab"
                                                aria-controls="One" aria-selected="true">One</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab"
                                                aria-controls="Two" aria-selected="false">Two</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="three-tab" data-toggle="tab" href="#three"
                                                role="tab" aria-controls="Three" aria-selected="false">Three</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active p-3" id="one" role="tabpanel"
                                        aria-labelledby="one-tab">
                                        <h5 class="card-title">Tab Card One</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                    <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                                        <h5 class="card-title">Tab Card Two</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                    <div class="tab-pane fade p-3" id="three" role="tabpanel"
                                        aria-labelledby="three-tab">
                                        <h5 class="card-title">Tab Card Three</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- /.Personal Details -->
                        <div class="col-md-3">
                            <h5 class="text-primary">Details</h5>
                            <!-- <form method="POST" action="transactions.php"> -->
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Transactions Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            name="transactions">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            name="name">
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Department</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="departmentid">
                                            <?php
                                            $query = "SELECT * FROM country";
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="categoryid">
                                            <?php
                                            $query = "SELECT * FROM country";
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
                                <div class="form-group">

                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="collection"
                                                    value="1" name="collection"><label class="form-check-label">Package
                                                    Element</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="process" value="1"
                                                    name="process">
                                                <label class="form-check-label">Rate Code</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="blocking" value="1"
                                                    name="blocking"><label class="form-check-label">BEO
                                                    Package Element</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="modification"
                                                    value="1" name="modification">
                                                <label class="form-check-label">Disable Transaction</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="consultation"
                                                    value="1" name="consultation"><label class="form-check-label">Senior
                                                    Discount Adjusment</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="transfer" value="1"
                                                    name="transfer">
                                                <label class="form-check-label">Cancel Resa Transcode</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="storage" value="1"
                                                    name="storage"><label class="form-check-label">Rebate
                                                    Transcode</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="sharing" value="1"
                                                    name="sharing">
                                                <label class="form-check-label">No Show Transcode</label>
                                            </div>


                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <h5 class="text-primary">Accounting</h5>
                            <h5>Debit COA</h5>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Debit
                                        COA </label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="dcoa">
                                            <?php
                                            $query = "SELECT * FROM source";
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary 1</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="dsub1">
                                            <?php
                                            $query = "SELECT * FROM source";
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary 2</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="dsub2">
                                            <?php
                                            $query = "SELECT * FROM source";
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary 3</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="dsub3">
                                            <?php
                                            $query = "SELECT * FROM source";
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary 4</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="dsub4">
                                            <?php
                                            $query = "SELECT * FROM source";
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
                            <h5>Credit COA</h5>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Credit
                                        COA </label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="ccoa">
                                            <?php
                                            $query = "SELECT * FROM source";
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary 1</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="csub1">
                                            <?php
                                            $query = "SELECT * FROM source";
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary 2</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="csub2">
                                            <?php
                                            $query = "SELECT * FROM source";
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary 3</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="csub3">
                                            <?php
                                            $query = "SELECT * FROM source";
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
                                        class="col-sm-3 col-form-label col-form-label-sm">Subsidiary 4</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="csub4">
                                            <?php
                                            $query = "SELECT * FROM source";
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
                        </div>

                        <div class="col-md-2">
                            <h5 class="text-primary">Adjustment Setup</h5>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-12 col-form-label col-form-label-sm">Code</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            name="adjcode">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-12 col-form-label col-form-label-sm">Descripton</label>
                                    <div class="col-sm-12">
                                        <select class="custom-select" name="adjdescription">
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 mb-3 ">
                            <div class="col-md-12 ">
                                <h5 class="mb-3 text-primary">List of Transactions
                                </h5>
                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmstransactions ";
                                $app = new App;
                                $transactionss = $app->selectAll($query);
                                ?>
                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <!-- <th>ID</th> -->
                                            <th>Transactions </th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transactionss as $transactions): ?>

                                        <tr>
                                            <!-- <td>
                                                <?php //echo $transactions->id ?>
                                            </td> -->


                                            <td>
                                                <?php echo $transactions->transactions ?>
                                            </td>
                                            <td>
                                                <?php echo $transactions->description ?>
                                            </td>
                                            <td>399.00
                                                <?php //echo $transactions->price ?>
                                            </td>

                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="transactions.php?edit=<?php echo $transactions->id ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="transactions.php?delete=<?php echo $transactions->id ?>"
                                                    class="text-danger">&nbsp;&nbsp;
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


                        <div class="pb-5 pt-3">
                            <button class="btn btn-primary" type="submit" name="submit">Save</button>
                            <!-- <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a> -->

                        </div>
                        </form>




                    </div>
                </div>

            </div>
        </div>
    </section>


</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>divdiv