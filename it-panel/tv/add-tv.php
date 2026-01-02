<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php


if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $query = "SELECT * FROM ittv where AssetID=$id";
    $app = new App;
    $tvs = $app->selectAll($query);




}
if (isset($_POST['submit'])) {
    // $AssetID = $_POST['AssetID'];
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

    $query = "INSERT INTO ittv (
    DeviceType, 
    MakeModel, 
    SerialNumber, 
    MACAddress, 
    ExtensionNumber, 
    UserOwner, 
    Department, 
    PhysicalLocation, 
    DayBed, 
    PowderRoom, 
    Bedside, 
    Bathroom, 
    PurchaseDate, 
    WarrantyContract, 
    PurchasePrice, 
    Notes, 
    OperationalStatus, 
    ConnectionStatus, 
    LastAuditDate, 
    LastActivity, 
    MaintenanceLog, 
    Remarks
) VALUES (
    :DeviceType, 
    :MakeModel, 
    :SerialNumber, 
    :MACAddress, 
    :ExtensionNumber, 
    :UserOwner, 
    :Department, 
    :PhysicalLocation, 
    :DayBed, 
    :PowderRoom, 
    :Bedside, 
    :Bathroom, 
    :PurchaseDate, 
    :WarrantyContract, 
    :PurchasePrice, 
    :Notes, 
    :OperationalStatus, 
    :ConnectionStatus, 
    :LastAuditDate, 
    :LastActivity, 
    :MaintenanceLog, 
    :Remarks
)";
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
        ":Remarks" => $Remarks


    ];


    $path = "index.php";
    $app->register($query, $arr, $path);
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

        <form class="row g-3" method="POST" action="add-tv.php" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>Update Television Information</h1>

                    </div><br>

                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">DeviceType</label>

                                    <select name="DeviceType" id="DeviceType" class="form-control">

                                        <option value=" Analog">Analog</option>
                                        <option value="IP-Phone">IP-Phone</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">Make/Model</label>
                                    <input type="text" name="MakeModel" id="MakeModel" class="form-control"
                                        placeholder=" ">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="mb-3">
                                    <label for="email">ExtensionNumber </label>
                                    <input type="text" name="ExtensionNumber" id="ExtensionNumber" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="mb-3">
                                    <label for="email">Department</label>

                                    <select name="Department" id="Department" class="form-control">

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
                                        placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class=" row">

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">PhysicalLocation </label>
                                    <input type="text" name="PhysicalLocation" id="PhysicalLocation"
                                        class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="mb-3">
                                    <label for="email">DayBed </label>
                                    <select name="DayBed" id="DayBed" class="form-control">

                                        <option value="">NO-SETUP</option>
                                        <option value="WORKING">WORKING</option>
                                        <option value="NON-WORKING">NON-WORKING</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">PowderRoom </label>
                                    <select name="PowderRoom" id="PowderRoom" class="form-control">

                                        <option value="">NO-SETUP</option>
                                        <option value="WORKING">WORKING</option>
                                        <option value="NON-WORKING">NON-WORKING</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">Bedside </label>
                                    <select name="Bedside" id="Bedside" class="form-control">

                                        <option value="">NO-SETUP</option>
                                        <option value="WORKING">WORKING</option>
                                        <option value="NON-WORKING">NON-WORKING</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">Bathroom </label>
                                    <select name="Bathroom" id="Bathroom" class="form-control">

                                        <option value="">NO-SETUP</option>
                                        <option value="WORKING">WORKING</option>
                                        <option value="NON-WORKING">NON-WORKING</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Remarks </label>
                                    <textarea name="Remarks" id="Remarks" class="form-control"> </textarea>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email">Notes </label>
                                    <textarea name="Notes" id="Notes" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">OperationalStatus </label>
                                    <select name="OperationalStatus" id="OperationalStatus" class="form-control">

                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">ConnectionStatus </label>
                                    <select name="ConnectionStatus" id="ConnectionStatus" class="form-control">

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
                                    <input type="date" name="PurchaseDate" id="PurchaseDate" class="form-control">

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">PurchasePrice </label>
                                    <input type="text" name="PurchasePrice" id="PurchasePrice" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">WarrantyContract </label>
                                    <input type="text" name="WarrantyContract" id="WarrantyContract"
                                        class="form-control">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">MaintenanceLog </label>
                                    <input type="text" name="MaintenanceLog" id="MaintenanceLog" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">SerialNumber </label>
                                    <input type="text" name="SerialNumber" id="SerialNumber" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="mb-3">
                                    <label for="email">MACAddress </label>
                                    <input type="text" name="MACAddress" id="MACAddress" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">LastAuditDate </label>
                                    <input type="date" name="LastAuditDate" id="LastAuditDate" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="email">LastActivity </label>
                                    <input type="date" name="LastActivity" id="LastActivity" class="form-control">

                                </div>
                            </div>





                        </div>


                    </div>





                </div>
            </div>


            <div class=" pb-5 pt-3">
                <button class="btn btn-primary" name="submit">Crete</button>
                <a href="index.php" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
</div>
<!-- /.card -->
</form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>