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
                        <div class="col-md-4">
                            <h3 class="text-primary">Details</h3>


                            <form method="POST" action="payments.php">
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Payments Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="payments">
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
                                            class="col-sm-3 col-form-label col-form-label-sm">Categpry</label>
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
                                <h3 class="text-primary">Accounting</h3>
                                <h5>Debit COA</h5>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Debit COA </label>
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
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Credit COA </label>
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
                                <h3 class="text-primary">Adjustment Setup</h3>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="adjcode">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Descripton</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="adjdescription">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
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
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="payments.php?delete=<?php echo $payments->id ?>"
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

                    </div>
                </div>

            </div>
        </div>
    </section>


</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>divdiv