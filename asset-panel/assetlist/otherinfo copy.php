<?php require "../head1.php"; ?>
<?php require "../sidebar.php"; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1> Reservation Information</h1>
                </div> -->
                <!-- <div class="col-sm-6 text-right">
                    <a href="orders.php" class="btn btn-primary">Back</a>
                </div> -->
                <?php require "navbar.php"; ?>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="guestreservationinfo2.php" method="post">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <div class="text-right">
                            <a href="create-assetlist.php" class="btn btn-primary">Add New
                                Asset List</a>
                        </div>
                    </div>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <!-- /.Personal Details -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header pt-3">
                                        <div class="row invoice-info">

                                            <div class="col-sm-4 invoice-col">

                                                <table style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Fixed Asset No</th>
                                                            <th colspan="2"> <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Fixed Asset Name</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Description</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Category</th>
                                                            <th>
                                                                <select class="custom-select" name="category">
                                                                    <?php
                                                                    $query = "SELECT * FROM assetcategory";
                                                                    $app = new App;
                                                                    $categorys = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($categorys as $category): ?>
                                                                        <option value="<?php echo $category->id ?>">
                                                                            <?php echo $category->category ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>

                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Item Class</th>
                                                            <th> <select class="custom-select" name="itemclass">
                                                                    <?php
                                                                    $query = "SELECT * FROM assetitemclass";
                                                                    $app = new App;
                                                                    $itemclasss = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($itemclasss as $itemclass): ?>
                                                                        <option value="<?php echo $itemclass->id ?>">
                                                                            <?php echo $itemclass->itemclass ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Brand</th>
                                                            <th> <select class="custom-select" name="brand">
                                                                    <?php
                                                                    $query = "SELECT * FROM assetbrand";
                                                                    $app = new App;
                                                                    $brands = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($brands as $brand): ?>
                                                                        <option value="<?php echo $brand->id ?>">
                                                                            <?php echo $brand->brand ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Color</th>
                                                            <th><select class="custom-select" name="color">
                                                                    <?php
                                                                    $query = "SELECT * FROM assetcolor";
                                                                    $app = new App;
                                                                    $colors = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($colors as $color): ?>
                                                                        <option value="<?php echo $color->id ?>">
                                                                            <?php echo $color->color ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Serial No.</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Barcode No.</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Supplier</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Dimension</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Department</th>
                                                            <th> <select class="custom-select" name="department">
                                                                    <?php
                                                                    $query = "SELECT * FROM assetdepartment";
                                                                    $app = new App;
                                                                    $departments = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($departments as $department): ?>
                                                                        <option value="<?php echo $department->id ?>">
                                                                            <?php echo $department->department ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Asset Holder</th>
                                                            <th><select class="custom-select" name="usermasterfile">
                                                                    <?php
                                                                    $query = "SELECT * FROM assetusermasterfile";
                                                                    $app = new App;
                                                                    $usermasterfiles = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($usermasterfiles as $usermasterfile): ?>
                                                                        <option
                                                                            value="<?php echo $usermasterfile->userid ?>">
                                                                            <?php echo $usermasterfile->userfullname ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Item Location</th>
                                                            <th> <select class="custom-select" name="location">
                                                                    <?php
                                                                    $query = "SELECT * FROM assetlocation";
                                                                    $app = new App;
                                                                    $locations = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($locations as $location): ?>
                                                                        <option value="<?php echo $location->id ?>">
                                                                            <?php echo $location->location ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Quantity</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Unit</th>
                                                            <th>
                                                                <select class="custom-select" name="unit">
                                                                    <?php
                                                                    $query = "SELECT * FROM assetunit";
                                                                    $app = new App;
                                                                    $units = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($units as $unit): ?>
                                                                        <option value="<?php echo $unit->id ?>">
                                                                            <?php echo $unit->unit ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Acquisition Date</th>
                                                            <th> <input type="date" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Acquition Amount</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Life in Year</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Depreciated Amount</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Salvage Amount</th>
                                                            <th> <input type="text" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="department"></th>

                                                        </tr>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th> <select class="custom-select" name="status">
                                                                    <?php
                                                                    $query = "SELECT * FROM assetstatus";
                                                                    $app = new App;
                                                                    $statuss = $app->selectAll($query);
                                                                    ?>
                                                                    <?php foreach ($statuss as $status): ?>
                                                                        <option value="<?php echo $status->id ?>">
                                                                            <?php echo $status->status ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select></th>

                                                        </tr>


                                                    </thead>
                                                </table>

                                            </div>
                                            <div class="col-sm-6 invoice-col">
                                                <div class="col-md-6">
                                                    <b>Asset Photo</b>
                                                    <form method="POST"
                                                        action="<?php echo APPURL; ?>dpo-panel/5schecklist/dataview.php?edit= "
                                                        enctype="multipart/form-data">
                                                        <input type="file" name="checkofficephoto"
                                                            class="form-control-file border">
                                                        <input type="hidden" name="checkuserid"
                                                            class="form-control-file border"><br>
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary btn-sm">Upload
                                                            Asset
                                                            Photo</button>


                                                </div>
                                                <div class="col-md-6">

                                                    <img src="<?php echo APPURL; ?>assets/img/card.jpg"
                                                        style="margin-top:10px;width:600px;">
                                                </div>
        </form>
</div>

</div>

</div>
</div>
</div>



</div>

</div>

</div>

<!-- /.card -->
</div>

<!-- /.container-fluid -->
</form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../footer1.php"; ?>