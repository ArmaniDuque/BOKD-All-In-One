<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmscurrency where id='$id'";
    $app = new App;
    $path = "currency.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['save'])) {
    $currency = $_POST['currency'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $rate = $_POST['rate'];
    $query = "INSERT INTO hmscurrency (currency, description, date, rate)
VALUES(:currency,:description,:date,:rate)";
    $arr = [
        ":currency" => $currency,
        ":description" => $description,
        ":date" => $date,
        ":rate" => $rate,
    ];
    $path = "currency.php";
    $app->register($query, $arr, $path);
}
?>
<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $currency = $_POST['currency'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $rate = $_POST['rate'];
    $query = "UPDATE hmscurrency SET currency=:currency, description=:description , date=:date , rate=:rate WHERE id='$id'";
    $arr = [
        ":currency" => $currency,
        ":description" => $description,
        ":date" => $date,
        ":rate" => $rate,
    ];
    $path = "currency.php";
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
                    <h1 class="h5 mb-3"><b>Currency </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->


                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmscurrency where id='$id'";
                            $app = new App;
                            $currencys = $app->selectAll($query); ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="currency.php">
                                    <?php foreach ($currencys as $currency): ?>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Currency Code</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" class="form-control form-control-sm"
                                                        id="colFormLabelSm" name="id" value="<?php echo $currency->id ?>">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="currency" value="<?php echo $currency->currency ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="description" value="<?php echo $currency->description ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="date" value="<?php echo $currency->date ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Rate</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="rate" value="<?php echo $currency->rate ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pb-5 pt-3">
                                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                                            <a href="currency.php" class="btn btn-outline-dark ml-3">Close</a>

                                        </div>
                                    <?php endforeach; ?>
                                </form>

                            </div>
                        <?php } else { ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="currency.php">
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Currency Code</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="currency">
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
                                                class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Rate</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="rate">
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
                                <h4 class="mb-3 text-primary">List of hmscurrency --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmscurrency ";
                                $app = new App;
                                $currencys = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Currency</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Rate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($currencys as $currency): ?>

                                            <tr>
                                                <td><?php echo $currency->id ?></td>


                                                <td><?php echo $currency->currency ?></td>
                                                <td><?php echo $currency->description ?></td>
                                                <td><?php echo $currency->date ?></td>
                                                <td><?php echo $currency->rate ?></td>
                                                <td>
                                                    <a style="text-decoration:none;"
                                                        href="currency.php?edit=<?php echo $currency->id ?>"
                                                        class="text-success">
                                                        <i class="nav-icon fas fa fa-edit"></i>
                                                    </a> |
                                                    <a style="text-decoration:none;"
                                                        href="currency.php?delete=<?php echo $currency->id ?>"
                                                        class="text-danger">
                                                        <i class="nav-icon fas fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
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