<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php


if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $query = "SELECT * FROM ittelephone where AssetID='$id'";
    $app = new App;
    $phones = $app->selectAll($query);






}
if (isset($_POST['submit'])) {
    $AssetID = $_POST['AssetID'];
    $historytype = $_POST['historytype'];
    $Cost = $_POST['Cost'];
    $Destination = $_POST['Destination'];
    // The new values for all columns
    $Description = $_POST['Description'];
    $query = "INSERT INTO itassethistory ( AssetID, Description, historytype, Cost, Destination ) VALUES ( :AssetID, :Description, :historytype, :Cost, :Destination)";
    $arr = [
        ":AssetID" => $AssetID,
        ":Description" => $Description,
        ":historytype" => $historytype,
        ":Cost" => $Cost,
        ":Destination" => $Destination,
    ];
    $path = "update-phone.php?edit=$AssetID";
    $app->register($query, $arr, $path);
}




if (isset($_POST['update'])) {
    $AssetID = $_POST['AssetID'];
    // The new values for all columns
    $DeviceType = $_POST['DeviceType'];
    $MakeModel = $_POST['MakeModel'];
    $SerialNumber = $_POST['SerialNumber'];
    $MACAddress = $_POST['MACAddress'];
    $ExtensionNumber = $_POST['ExtensionNumber'];
    $UserOwner = $_POST['UserOwner'];
    $Department = $_POST['Department'];
    $PhysicalLocation = $_POST['PhysicalLocation'];
    $DayBed = $_POST['DayBed'];
    $PowderRoom = $_POST['PowderRoom'];
    $Bedside = $_POST['Bedside'];
    $Bathroom = $_POST['Bathroom'];
    $PurchaseDate = $_POST['PurchaseDate'];
    $WarrantyContract = $_POST['WarrantyContract'];
    $PurchasePrice = $_POST['PurchasePrice'];
    $Notes = $_POST['Notes'];
    $OperationalStatus = $_POST['OperationalStatus'];
    $ConnectionStatus = $_POST['ConnectionStatus'];
    $LastAuditDate = $_POST['LastAuditDate'];
    $LastActivity = $_POST['LastActivity'];
    $MaintenanceLog = $_POST['MaintenanceLog'];
    $Remarks = $_POST['Remarks'];

    $query = " UPDATE ittelephone SET 
    DeviceType = :DeviceType, 
    MakeModel = :MakeModel, 
    SerialNumber = :SerialNumber, 
    MACAddress = :MACAddress,
    ExtensionNumber = :ExtensionNumber,
    UserOwner = :UserOwner,
    Department = :Department,
    PhysicalLocation = :PhysicalLocation,
    DayBed = :DayBed,
    PowderRoom = :PowderRoom,
    Bedside = :Bedside,
    Bathroom = :Bathroom,
    PurchaseDate = :PurchaseDate,
    WarrantyContract = :WarrantyContract,
    PurchasePrice = :PurchasePrice,
    Notes = :Notes,
    OperationalStatus = :OperationalStatus,
    ConnectionStatus = :ConnectionStatus,
    LastAuditDate = :LastAuditDate,
    LastActivity = :LastActivity,
    MaintenanceLog = :MaintenanceLog,
    Remarks = :Remarks 
    WHERE AssetID = :AssetID";
    $arr = [
        ":DeviceType" => $DeviceType,
        ":MakeModel" => $MakeModel,
        ":SerialNumber" => $SerialNumber,
        ":MACAddress" => $MACAddress,
        ":ExtensionNumber" => $ExtensionNumber,
        ":UserOwner" => $UserOwner,
        ":Department" => $Department,
        ":PhysicalLocation" => $PhysicalLocation,
        ":DayBed" => $DayBed,
        ":PowderRoom" => $PowderRoom,
        ":Bedside" => $Bedside,
        ":Bathroom" => $Bathroom,
        ":PurchaseDate" => $PurchaseDate,
        ":WarrantyContract" => $WarrantyContract,
        ":PurchasePrice" => $PurchasePrice,
        ":Notes" => $Notes,
        ":OperationalStatus" => $OperationalStatus,
        ":ConnectionStatus" => $ConnectionStatus,
        ":LastAuditDate" => $LastAuditDate,
        ":LastActivity" => $LastActivity,
        ":MaintenanceLog" => $MaintenanceLog,
        ":Remarks" => $Remarks,
        ":AssetID" => $AssetID

    ];

    // $path = "update-cctv.php?edit=$AssetID";
    $path = "index.php";
    $app->update($query, $arr, $path);
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update information</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="index.php" class="btn btn-primary">Back</a>
                </div>
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
                    <h1 class="h5 mb-3"><b>Update Telephone Information</h1>

                </div><br>

                <!-- /.BODY -->
                <?php foreach ($phones as $phone): ?>
                <form class="row g-3" method="POST" action="update-phone.php" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">DeviceType</label>
                                    <input type="hidden" name="AssetID" id="AssetID" class="form-control"
                                        value="<?php echo $phone->AssetID ?>" placeholder=" Camera Name">
                                    <select name="DeviceType" id="DeviceType" class="form-control">
                                        <option value="<?php echo $phone->DeviceType ?>">
                                            <?php echo $phone->DeviceType ?>
                                        </option>
                                        <option value=" Analog">Analog</option>
                                        <option value="IP-Phone">IP-Phone</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">Make/Model</label>
                                    <input type="text" name="MakeModel" id="MakeModel" class="form-control"
                                        value="<?php echo $phone->MakeModel ?>" placeholder=" ">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="mb-3">
                                    <label for="email">ExtensionNumber </label>
                                    <input type="text" name="ExtensionNumber" id="ExtensionNumber" class="form-control"
                                        value="<?php echo $phone->ExtensionNumber ?>" placeholder="">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="mb-3">
                                    <label for="email">Department</label>
                                    <input type="hidden" name="AssetID" id="AssetID" class="form-control"
                                        value="<?php echo $phone->AssetID ?>" placeholder=" Camera Name">
                                    <select name="Department" id="Department" class="form-control">
                                        <option value="<?php echo $phone->Department ?>">
                                            <?php echo $phone->Department ?>
                                        </option>
                                        <option value=" Reservation">Reservation</option>
                                        <option value="Front-Office">Front-Office</option>
                                        <option value="Concierge">Concierge</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Human-Resources">Human-Resources</option>
                                        <option value="Executive-Office">Executive-Office</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="F&B-Service">F&B-Service</option>
                                        <option value="F&B-Kitchen">F&B-Kitchen</option>
                                        <option value="Housekeeping">Housekeeping</option>
                                        <option value="Security">Security</option>
                                        <option value="Offices">Offices</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">UserOwner </label>
                                    <input type="text" name="UserOwner" id="UserOwner" class="form-control"
                                        value="<?php echo $phone->UserOwner ?>" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class=" row">

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">PhysicalLocation </label>
                                    <input type="text" name="PhysicalLocation" id="PhysicalLocation"
                                        class="form-control" value="<?php echo $phone->PhysicalLocation ?>"
                                        placeholder="">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="mb-3">
                                    <label for="email">DayBed </label>
                                    <select name="DayBed" id="DayBed" class="form-control">
                                        <option value="<?php echo $phone->DayBed ?>">
                                            <?php echo $phone->DayBed ?>
                                        </option>
                                        <option value="">NO-SETUP
                                        </option>
                                        <option value=" WORKING">WORKING</option>
                                        <option value="NON-WORKING">NON-WORKING</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">PowderRoom </label>
                                    <select name="PowderRoom" id="PowderRoom" class="form-control">
                                        <option value="<?php echo $phone->PowderRoom ?>">
                                            <?php echo $phone->PowderRoom ?>
                                        </option>
                                        <option value="">NO-SETUP
                                        </option>
                                        <option value=" WORKING">WORKING</option>
                                        <option value="NON-WORKING">NON-WORKING</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">Bedside </label>
                                    <select name="Bedside" id="Bedside" class="form-control">
                                        <option value="<?php echo $phone->Bedside ?>">
                                            <?php echo $phone->Bedside ?>
                                        </option>
                                        <option value="">NO-SETUP
                                        </option>
                                        <option value=" WORKING">WORKING</option>
                                        <option value="NON-WORKING">NON-WORKING</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">Bathroom </label>
                                    <select name="Bathroom" id="Bathroom" class="form-control">
                                        <option value="<?php echo $phone->Bathroom ?>">
                                            <?php echo $phone->Bathroom ?>
                                        </option>
                                        <option value="">NO-SETUP
                                        </option>
                                        <option value=" WORKING">WORKING</option>
                                        <option value="NON-WORKING">NON-WORKING</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Remarks </label>
                                    <textarea name="Remarks" id="Remarks"
                                        class="form-control"><?php echo $phone->Remarks ?> </textarea>
                                    <?php echo $phone->Remarks ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Notes </label>
                                    <textarea name="Notes" id="Notes"
                                        class="form-control"><?php echo $phone->Notes ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">OperationalStatus </label>
                                    <select name="OperationalStatus" id="OperationalStatus" class="form-control">
                                        <option value="<?php echo $phone->OperationalStatus ?>">
                                            <?php echo $phone->OperationalStatus ?>
                                        </option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">ConnectionStatus </label>
                                    <select name="ConnectionStatus" id="ConnectionStatus" class="form-control">
                                        <option value="<?php echo $phone->ConnectionStatus ?>">
                                            <?php echo $phone->ConnectionStatus ?>
                                        </option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">PurchaseDate </label>
                                    <input type="date" name="PurchaseDate" id="PurchaseDate" class="form-control"
                                        value="<?php echo $phone->PurchaseDate ?>">

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">PurchasePrice </label>
                                    <input type="text" name="PurchasePrice" id="PurchasePrice" class="form-control"
                                        value="<?php echo $phone->PurchasePrice ?>">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">WarrantyContract </label>
                                    <input type="text" name="WarrantyContract" id="WarrantyContract"
                                        class="form-control" value="<?php echo $phone->WarrantyContract ?>">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">MaintenanceLog </label>
                                    <input type="text" name="MaintenanceLog" id="MaintenanceLog" class="form-control"
                                        value="<?php echo $phone->MaintenanceLog ?>">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">SerialNumber </label>
                                    <input type="text" name="SerialNumber" id="SerialNumber" class="form-control"
                                        value="<?php echo $phone->SerialNumber ?>" placeholder="">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="mb-3">
                                    <label for="email">MACAddress </label>
                                    <input type="text" name="MACAddress" id="MACAddress" class="form-control"
                                        value="<?php echo $phone->MACAddress ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">LastAuditDate </label>
                                    <input type="date" name="LastAuditDate" id="LastAuditDate" class="form-control"
                                        value="<?php echo $phone->LastAuditDate ?>">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">LastActivity </label>
                                    <input type="date" name="LastActivity" id="LastActivity" class="form-control"
                                        value="<?php echo $phone->LastActivity ?>">

                                </div>
                            </div>





                        </div>
                        <div class=" pb-5 pt-3">
                            <button class="btn btn-primary" name="update">Update</button>
                            <a href="index.php" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div>
                </form>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>Television History</h1>

                    </div><br>
                    <form class="row g-3" method="POST" action="update-phone.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="hidden" name="AssetID" id="AssetID" class="form-control"
                                    value="<?php echo $id ?>">
                                <label for="email">Description </label>
                                <input type="text" name="Description" id="Description" class="form-control"
                                    placeholder="Description">

                            </div>
                            <div class="col-md-2">
                                <label for="email">Cost</label>
                                <input type="text" name="Cost" id="Cost" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-2">
                                <label for="email">Status History </label>
                                <select name="historytype" id="historytype" class="form-control">
                                    <option value="Borrow">Borrow</option>
                                    <option value="Return">Return</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Deployment">Deployment</option>
                                    <option value="Withdrawal">Withdrawal</option>
                                    <option value="For-Repair">For-Repair</option>
                                    <option value="For-Maintenance">For-Maintenance</option>
                                    <option value="For-Upgrade">For-Upgrade</option>


                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="email">Other Info</label>
                                <input type="text" name="Destination" id="Destination" class="form-control"
                                    placeholder="Destination/OtherInfo">
                            </div>
                            <div class="col-md-4">
                                <label for="email">&nbsp; </label>

                                <button class="btn btn-primary col-md-12" name="submit">Add History</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table-sm table-striped " style="width:100%;font-size: 13px; " id="example">
                            <thead>
                                <tr>
                                    <td widtd="60"> ID</td>
                                    <td>AssetID</td>
                                    <td>Description</td>
                                    <td>History Type</td>
                                    <td>Dstination /Other Info</td>
                                    <td>Cost</td>
                                    <td>Date</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM itassethistory where AssetID='$id'";
                                $app = new App;
                                $tvhistorys = $app->selectAll($query);
                                ?>
                                <?php if (empty($tvhistorys)): ?>

                                <tr>
                                    <td colspan="8" style="text-align: center;">No history records found for this asset.
                                    </td>
                                </tr>

                                <?php else: ?>
                                <?php foreach ($tvhistorys as $tvhistory): ?>
                                <tr>


                                    <th><?php echo isset($tvhistory->ID) ? $tvhistory->ID : ''; ?></th>
                                    <th><?php echo isset($tvhistory->AssetID) ? $tvhistory->AssetID : 'No-History'; ?>
                                    </th>
                                    <th><?php echo isset($tvhistory->Description) ? $tvhistory->Description : 'No-History'; ?>
                                    </th>
                                    <th><?php echo isset($tvhistory->historytype) ? $tvhistory->historytype : 'No-History'; ?>
                                    </th>
                                    <th><?php echo isset($tvhistory->Destination) ? $tvhistory->Destination : 'No-History'; ?>
                                    </th>
                                    <th><?php echo isset($tvhistory->Cost) ? $tvhistory->Cost : 'No-History'; ?>
                                    </th>
                                    <th><?php echo isset($tvhistory->created) ? $tvhistory->created : 'No-History'; ?>
                                    </th>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>


                            </tbody>
                            <?php if (empty($tvhistorys)): ?>



                            <?php else: ?>
                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th style="text-align:right;"><span>Total : </span></th>
                                <th>
                                    <?php
                                        $query = "SELECT Sum(Cost) AS totalcost FROM itassethistory WHERE  AssetID='$id'";
                                        $app = new App;
                                        $totalcost = $app->selectOne($query);
                                        echo "<span class='text-danger'>";
                                        echo $totalcost->totalcost;
                                        echo "</span>";

                                        ?>
                                </th>
                                <th></th>

                            </tfoot>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>







<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>