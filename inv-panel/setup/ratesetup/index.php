<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>

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
                    <h1 class="h5 mb-3"><b>Rate Setup </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->



                        <div class="col-md-4 mb-3 ">

                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">GL
                                        Acccounts</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">

                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="collection"
                                                    value="1" name="collection"><label
                                                    class="form-check-label">DEACTIVATE</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="process" value="1"
                                                    name="process">
                                                <label class="form-check-label">Local Tax</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="modification"
                                                    value="1" name="modification">
                                                <label class="form-check-label">Vat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="consultation"
                                                    value="1" name="consultation"><label
                                                    class="form-check-label">Vatable Exempt</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="transfer" value="1"
                                                    name="transfer">
                                                <label class="form-check-label">Zero Rated</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="storage" value="1"
                                                    name="storage"><label class="form-check-label">Service
                                                    Charge</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input" type="checkbox" id="sharing" value="1"
                                                    name="sharing">
                                                <label class="form-check-label">Discount</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="col-md-8 mb-3 ">

                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">List of Rate Code --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmsratecode ";
                                $app = new App;
                                $ratecodes = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Desciptions</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ratecodes as $ratecode): ?>

                                        <tr>
                                            <td><?php echo $ratecode->id ?></td>


                                            <td><?php echo $ratecode->code ?></td>
                                            <td><?php echo $ratecode->description ?></td>
                                            <td> <a style="text-decoration:none;"
                                                    href="setup-ratecode.php?details=<?php echo $ratecode->id ?>"
                                                    class="text-primary">
                                                    <i class="nav-icon fas fa fa-eye"></i>

                                                </a>
                                                <a style="text-decoration:none;"
                                                    href="update-ratecode.php?edit=<?php echo $ratecode->id ?>"
                                                    class="text-success">|
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a>
                                                <a style="text-decoration:none;"
                                                    href="delete-ratecode.php?edit=<?php echo $ratecode->id ?>"
                                                    class="text-danger">|
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
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" type="submit" name="submit">Add</button>
                <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a>

            </div>


        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>