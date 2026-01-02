<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>



<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmspayments where id='$id'";
    $app = new App;
    $path = "payments.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $payments = $_POST['payments'];
    $description = $_POST['description'];
    $categoryid = $_POST['categoryid'];

    $ar = isset($_POST['ar']) ? $_POST['ar'] : 0;
    $employeeledger = isset($_POST['employeeledger']) ? $_POST['employeeledger'] : 0;
    $disablepayments = isset($_POST['disablepayments']) ? $_POST['disablepayments'] : 0;
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
    $query = "INSERT INTO hmspayments (payments, description, categoryid, dcoa, dsub1, dsub2, dsub3, dsub4, ccoa, csub1, csub2, csub3, csub4, adjcode, adjdescription)
VALUES(:payments,:description, :categoryid, :dcoa, :dsub1, :dsub2, :dsub3, :dsub4,  :ccoa, :csub1, :csub2, :csub3, :csub4, :adjcode , :adjdescription)";
    $arr = [
        ":payments" => $payments,
        ":description" => $description,
        ":categoryid" => $categoryid,
        ":ar" => $ar,
        ":employeeledger" => $employeeledger,
        ":disablepayments" => $disablepayments,
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
    $path = "payments.php";
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
                    <h1 class="h5 mb-3"><b>Payments </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->
                        <div class="col-md-6 mb-3 ">
                            <div class="card mt-3 tab-card" style="min-height: 800px;">
                                <div class="card-header tab-card-header">
                                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab"
                                                aria-controls="One" aria-selected="true">Payment</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab"
                                                aria-controls="Two" aria-selected="false">Accounting</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="three-tab" data-toggle="tab" href="#three"
                                                role="tab" aria-controls="Three" aria-selected="false">Adjusment</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active p-3" id="one" role="tabpanel"
                                        aria-labelledby="one-tab">

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Payment
                                                    Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="colFormLabelSm" name="payments">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Description</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="colFormLabelSm" name="description">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="categoryid">
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
                                        <hr>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">

                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input class="form-check-input" type="checkbox" id="ar"
                                                                value="1" name="ar"><label
                                                                class="form-check-label">AR</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="employeeledger" value="1" name="employeeledger">
                                                            <label class="form-check-label">Employee Ledger</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="disablepayments" value="1"
                                                                name="disablepayments"><label
                                                                class="form-check-label">Disable Payment</label>
                                                        </div>


                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                                        <h5>Debit COA</h5>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Debit
                                                    COA </label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="dcoa">
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
                                                    class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                    1</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="dsub1">
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
                                                    class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                    2</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="dsub2">
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
                                                    class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                    3</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="dsub3">
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
                                                    class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                    4</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="dsub4">
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
                                        <h5>Credit COA</h5>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Credit
                                                    COA </label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="ccoa">
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
                                                    class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                    1</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="csub1">
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
                                                    class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                    2</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="csub2">
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
                                                    class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                    3</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="csub3">
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
                                                    class="col-sm-3 col-form-label col-form-label-sm">Subsidiary
                                                    4</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="csub4">
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
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                    <div class="tab-pane fade p-3" id="three" role="tabpanel"
                                        aria-labelledby="three-tab">

                                        <div class="col-md-12 mb-3">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="colFormLabelSm" name="adjcode">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Descripton</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="adjdescription">
                                                        <option value="1">Active</option>
                                                        <option value="0">InActive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>

                                </div>
                            </div>
                            <div class="pb-5 pt-3">
                                <button class="btn btn-primary" type="submit" name="submit">Save</button>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3 ">
                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">List of hmspayments --------------------------
                                </h4>
                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmspayments ";
                                $app = new App;
                                $paymentss = $app->selectAll($query);
                                ?>
                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Payments </th>
                                            <th>Description</th>
                                            <th>Debit</th>
                                            <th>Credit No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($paymentss as $payments): ?>

                                        <tr>
                                            <td><?php echo $payments->id ?></td>


                                            <td><?php echo $payments->payments ?></td>
                                            <td><?php echo $payments->description ?></td>
                                            <td><?php echo $payments->dcoa ?>

                                            </td>
                                            <td><?php echo $payments->ccoa ?>
                                            </td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="payments.php?edit=<?php echo $payments->id ?>"
                                                    class="text-success">
                                                    <i class="nav-icon fas fa fa-edit"></i>
                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="payments.php?delete=<?php echo $payments->id ?>"
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