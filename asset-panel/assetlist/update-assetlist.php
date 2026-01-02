<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
// Assuming your App class is included here
// require_once 'path/to/App.php';

// Instantiate your App class
$app = new App;

// --- DELETE Logic ---
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM assetitemlist where id='$id'";
    $app = new App;
    $path = "index.php";
    $app->delete($query, $path);
}

// --- INSERT Logic (for adding new assets) ---
// This is a comprehensive insert for all your columns.
// You might only use a subset of fields in your form.


// --- UPDATE Logic ---
if (isset($_POST['update'])) {
    $id = $_POST['id'] ?? null; // Ensure 'id' is passed from the form (usually hidden input)

    // Collect all data from the form that might be updated
    // Sanitize and validate each input before using it in the query
    $FacNO = $_POST['FacNO'] ?? null;
    $FacName = $_POST['FacName'] ?? null;
    $Description = $_POST['Description'] ?? null;
    $ItemClass = $_POST['ItemClass'] ?? null;
    $cATEGORY = $_POST['cATEGORY'] ?? null;
    $Unit = $_POST['Unit'] ?? null;
    $serialNo = $_POST['serialNo'] ?? null;
    $Department = $_POST['Department'] ?? null;
    $Holder = $_POST['Holder'] ?? null;
    $Picpath = $_POST['Picpath'] ?? null;
    $Adate = $_POST['Adate'] ?? null;
    $AAmount = $_POST['AAmount'] ?? null;
    $Percent = $_POST['Percent'] ?? null;
    $Abre = $_POST['Abre'] ?? null;
    $ItemLocation = $_POST['ItemLocation'] ?? null;
    $balance_unit = $_POST['balance_unit'] ?? null;
    $suppName = $_POST['suppName'] ?? null;
    $Remarks = $_POST['Remarks'] ?? null;
    $COA_D = $_POST['COA_D'] ?? null;
    $COA_C = $_POST['COA_C'] ?? null;
    $xStatus = $_POST['xStatus'] ?? null;
    $writeOff = $_POST['writeOff'] ?? null;
    $Brand = $_POST['Brand'] ?? null;
    $Color = $_POST['Color'] ?? null;
    $BarcodeNo = $_POST['BarcodeNo'] ?? null;
    $xxStats = $_POST['xxStats'] ?? null;
    $StartDate = $_POST['StartDate'] ?? null;
    $EndDate = $_POST['EndDate'] ?? null;
    $Dimention = $_POST['Dimention'] ?? null;
    $xAvailable = $_POST['xAvailable'] ?? null;
    $rr_number = $_POST['rr_number'] ?? null;
    $PC_BATCH = $_POST['PC_BATCH'] ?? null;
    $stackabl = $_POST['stackabl'] ?? null;

    $query = "UPDATE assetitemlist SET
        FacNO = :FacNO,
        FacName = :FacName,
        Description = :Description,
        ItemClass = :ItemClass,
        cATEGORY = :cATEGORY,
        Unit = :Unit,
        serialNo = :serialNo,
        Department = :Department,
        Holder = :Holder,
        Picpath = :Picpath,
        Adate = :Adate,
        AAmount = :AAmount,
        Percent = :Percent,
        Abre = :Abre,
        ItemLocation = :ItemLocation,
        balance_unit = :balance_unit,
        suppName = :suppName,
        Remarks = :Remarks,
        COA_D = :COA_D,
        COA_C = :COA_C,
        xStatus = :xStatus,
        writeOff = :writeOff,
        Brand = :Brand,
        Color = :Color,
        BarcodeNo = :BarcodeNo,
        xxStats = :xxStats,
        StartDate = :StartDate,
        EndDate = :EndDate,
        Dimention = :Dimention,
        xAvailable = :xAvailable,
        rr_number = :rr_number,
        PC_BATCH = :PC_BATCH,
        stackabl = :stackabl
        -- 'created' is typically not updated here, it's a creation timestamp
    WHERE id = :id";

    $arr = [
        ":FacNO" => $FacNO,
        ":FacName" => $FacName,
        ":Description" => $Description,
        ":ItemClass" => $ItemClass,
        ":cATEGORY" => $cATEGORY,
        ":Unit" => $Unit,
        ":serialNo" => $serialNo,
        ":Department" => $Department,
        ":Holder" => $Holder,
        ":Picpath" => $Picpath,
        ":Adate" => $Adate,
        ":AAmount" => $AAmount,
        ":Percent" => $Percent,
        ":Abre" => $Abre,
        ":ItemLocation" => $ItemLocation,
        ":balance_unit" => $balance_unit,
        ":suppName" => $suppName,
        ":Remarks" => $Remarks,
        ":COA_D" => $COA_D,
        ":COA_C" => $COA_C,
        ":xStatus" => $xStatus,
        ":writeOff" => $writeOff,
        ":Brand" => $Brand,
        ":Color" => $Color,
        ":BarcodeNo" => $BarcodeNo,
        ":xxStats" => $xxStats,
        ":StartDate" => $StartDate,
        ":EndDate" => $EndDate,
        ":Dimention" => $Dimention,
        ":xAvailable" => $xAvailable,
        ":rr_number" => $rr_number,
        ":PC_BATCH" => $PC_BATCH,
        ":stackabl" => $stackabl,
        ":id" => $id // Crucial for the WHERE clause
    ];

    $path = "update-assetlist.php?select=$id"; // Redirect back to the edit page for that item, or just update-assetlist.php
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
                <?php if (isset($_GET['select'])) {
                    $id = $_GET['select'];
                    $query = "SELECT * FROM assetitemlist where id='$id'";
                    $app = new App;
                    $itemlists = $app->selectAll($query); ?>
                    <?php require "navbar.php"; ?>
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
                        <h1 class="h5 mb-3"><b>Update Asset Information</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- /.Personal Details -->

                            <?php foreach ($itemlists as $itemlist): ?>
                                <div class="col-md-6 mb-3 ">

                                    <form method="POST" action="update-assetlist.php">

                                        <div class="col-md-12 mb-3 ">



                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Fixed Asset No</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control form-control-sm"
                                                            id="colFormLabelSm" value="<?php echo $itemlist->id ?>" name="id">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="colFormLabelSm" value="<?php echo $itemlist->FacNO ?>"
                                                            name="FacNO">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Fixed Asset
                                                        Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="colFormLabelSm" value="<?php echo $itemlist->FacName ?>"
                                                            name="FacName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                                    <div class="col-sm-8">
                                                        <!-- <input type="text" class="form-control form-control-sm"
                                                    id="colFormLabelSm" name="Description"> -->

                                                        <textarea name="Description" id="colFormLabelSm"
                                                            style="height: 100px;  resize: none;"
                                                            class="form-control form-control-sm"><?php echo $itemlist->Description ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                                    <div class="col-sm-8">
                                                        <select class="custom-select" name="cATEGORY">

                                                            <?php
                                                            $query = "SELECT * FROM assetcategory WHERE id='$itemlist->cATEGORY'";
                                                            $app = new App;
                                                            $categorys = $app->selectAll($query);
                                                            ?>
                                                            <?php foreach ($categorys as $category): ?>
                                                                <option value="<?php echo $category->id ?>">
                                                                    <?php echo $category->category ?>
                                                                </option>
                                                            <?php endforeach; ?>
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Item Class</label>
                                                    <div class="col-sm-8">
                                                        <select class="custom-select" name="ItemClass">
                                                            <?php
                                                            $query = "SELECT * FROM assetitemclass WHERE id='$itemlist->ItemClass'";
                                                            $app = new App;
                                                            $itemclasss = $app->selectAll($query);
                                                            ?>
                                                            <?php foreach ($itemclasss as $itemclass): ?>
                                                                <option value="<?php echo $itemclass->id ?>">
                                                                    <?php echo $itemclass->itemclass ?>
                                                                </option>
                                                            <?php endforeach; ?>




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
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Brand</label>
                                                    <div class="col-sm-8">
                                                        <select class="custom-select" name="Brand">

                                                            <?php
                                                            $query = "SELECT * FROM assetbrand WHERE id='$itemlist->Brand'";
                                                            $app = new App;
                                                            $brands = $app->selectAll($query);
                                                            ?>
                                                            <?php foreach ($brands as $brand): ?>
                                                                <option value="<?php echo $brand->id ?>">
                                                                    <?php echo $brand->brand ?>
                                                                </option>
                                                            <?php endforeach; ?>
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
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Color</label>
                                                    <div class="col-sm-8">
                                                        <select class="custom-select" name="Color">
                                                            <?php
                                                            $query = "SELECT * FROM assetcolor WHERE id='$itemlist->Color'";
                                                            $app = new App;
                                                            $colors = $app->selectAll($query);
                                                            ?>
                                                            <?php foreach ($colors as $color): ?>
                                                                <option value="<?php echo $color->id ?>">
                                                                    <?php echo $color->color ?>
                                                                </option>
                                                            <?php endforeach; ?>

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
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Serial No.</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="colFormLabelSm" value="<?php echo $itemlist->serialNo ?>"
                                                            name="serialNo">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Barcode No.</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="colFormLabelSm" value="<?php echo $itemlist->BarcodeNo ?>"
                                                            name="BarcodeNo">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Supplier</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="colFormLabelSm" value="<?php echo $itemlist->suppName ?>"
                                                            name="suppName">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">

                                                <div class="form-group row">
                                                    <label for="colFormLabelSm"
                                                        class="col-sm-3 col-form-label col-form-label-sm">Dimension</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="colFormLabelSm" value="<?php echo $itemlist->Dimention ?>"
                                                            name="Dimention">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="pb-5 pt-3">
                                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                                            <!-- <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a> -->

                                        </div>

                                </div>
                                <div class="col-md-6 mb-3 ">


                                    <div class="col-md-12 mb-3 ">


                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Department</label>
                                                <div class="col-sm-8">
                                                    <select class="custom-select" name="Department">
                                                        <?php
                                                        $query = "SELECT * FROM assetdepartment wHERE id='$itemlist->Department'";
                                                        $app = new App;
                                                        $departments = $app->selectAll($query);
                                                        ?>
                                                        <?php foreach ($departments as $department): ?>
                                                            <option value="<?php echo $department->id ?>">
                                                                <?php echo $department->department ?>
                                                            </option>
                                                        <?php endforeach; ?>

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
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Asset
                                                    Holder</label>
                                                <div class="col-sm-8">
                                                    <select class="custom-select" name="Holder">
                                                        <?php
                                                        $query = "SELECT * FROM assetusermasterfile WHERE userid='$itemlist->Holder'";
                                                        $app = new App;
                                                        $usermasterfiles = $app->selectAll($query);
                                                        ?>
                                                        <?php foreach ($usermasterfiles as $usermasterfile): ?>
                                                            <option value="<?php echo $usermasterfile->userid ?>">
                                                                <?php echo $usermasterfile->userfullname ?>
                                                            </option>
                                                        <?php endforeach; ?>

                                                        <?php
                                                        $query = "SELECT * FROM assetusermasterfile";
                                                        $app = new App;
                                                        $usermasterfiles = $app->selectAll($query);
                                                        ?>
                                                        <?php foreach ($usermasterfiles as $usermasterfile): ?>
                                                            <option value="<?php echo $usermasterfile->userid ?>">
                                                                <?php echo $usermasterfile->userfullname ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Item
                                                    Location</label>
                                                <div class="col-sm-8">
                                                    <select class="custom-select" name="ItemLocation">
                                                        <?php
                                                        $query = "SELECT * FROM assetlocation WHERE id='$itemlist->ItemLocation'";
                                                        $app = new App;
                                                        $locations = $app->selectAll($query);
                                                        ?>
                                                        <?php foreach ($locations as $location): ?>
                                                            <option value="<?php echo $location->id ?>">
                                                                <?php echo $location->location ?>
                                                            </option>
                                                        <?php endforeach; ?>         <?php
                                                                   $query = "SELECT * FROM assetlocation";
                                                                   $app = new App;
                                                                   $locations = $app->selectAll($query);
                                                                   ?>
                                                        <?php foreach ($locations as $location): ?>
                                                            <option value="<?php echo $location->id ?>">
                                                                <?php echo $location->location ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Quantity</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        value="<?php echo $itemlist->balance_unit ?>" name="balance_unit">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Unit</label>
                                                <div class="col-sm-8">
                                                    <select class="custom-select" name="Unit">

                                                        <?php
                                                        $query = "SELECT * FROM assetunit WHERE id='$itemlist->Unit'";
                                                        $app = new App;
                                                        $units = $app->selectAll($query);
                                                        ?>
                                                        <?php foreach ($units as $unit): ?>
                                                            <option value="<?php echo $unit->id ?>">
                                                                <?php echo $unit->unit ?>
                                                            </option>
                                                        <?php endforeach; ?>
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
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Acquisition
                                                    Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                        value="<?php echo $itemlist->Adate ?>" name="Adate">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Acquition
                                                    Amount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        value="<?php echo $itemlist->AAmount ?>" name="AAmount">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Life
                                                    in Year</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        value="<?php echo $itemlist->EndDate ?>" name="EndDate">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Depreciated
                                                    Amount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        value="<?php echo $itemlist->Percent ?>" name="Percent">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Salvage Amount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        value="<?php echo $itemlist->Abre ?>" name="Abre">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                                                <div class="col-sm-8">
                                                    <select class="custom-select" name="xStatus">

                                                        <?php
                                                        $query = "SELECT * FROM assetstatus WHERE id='$itemlist->xStatus'";
                                                        $app = new App;
                                                        $statuss = $app->selectAll($query);
                                                        ?>
                                                        <?php foreach ($statuss as $status): ?>
                                                            <option value="<?php echo $status->id ?>">
                                                                <?php echo $status->status ?>
                                                            </option>
                                                        <?php endforeach; ?>
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
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    </form>
                                </div>
                            <?php endforeach; ?>
                        <?php } ?>




                    </div>

                </div>

            </div>


        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>