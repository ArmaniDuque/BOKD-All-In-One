<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php



if (isset($_POST['submit'])) {

    $datastorage = $_POST['datastorage'];
    $datalocation = $_POST['datalocation'];
    $datadescription = $_POST['datadescription'];
    $datacategory = $_POST['datacategory'];
    $datasecuritystatus = $_POST['datasecuritystatus'];
    $datadepartment = $_SESSION['userdepartment'];
    $datatypes = $_POST['datatypes'];

    $dataretensiondate = $_POST['dataretensiondate'];
    $databackup = $_POST['databackup'];

    $userdepartment = $_SESSION['userdepartment'];
    $userid = $_SESSION['userid'];

    $query = "INSERT INTO dpodatainventory (datastorage, datalocation, datadescription, datacategory, datasecuritystatus, datadepartment, datatypes, dataretensiondate, databackup)
     VALUES(:datastorage, :datalocation, :datadescription, :datacategory, :datasecuritystatus, :datadepartment, :datatypes, :dataretensiondate, :databackup)";

    $arr = [


        ":datastorage" => $datastorage,
        ":datalocation" => $datalocation,
        ":datadescription" => $datadescription,
        ":datacategory" => $datacategory,
        ":datasecuritystatus" => $datasecuritystatus,
        ":datadepartment" => $datadepartment,
        ":datatypes" => $datatypes,
        ":dataretensiondate" => $dataretensiondate,
        ":databackup" => $databackup,

    ];



    $path = "datainventory.php";
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
                    <h1>Data Inventory</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?php echo APPURL; ?>dpo-panel/datainventory/datainventory.php"
                        class="btn btn-primary">Back</a>
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
                    <h1 class="h5 mb-3"><b>Physical & Data Inventory</h1>

                </div><br>
                <!-- /.BODY -->
                <form class="row g-3" method="POST" action="create-datainventory.php">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Storage</label>
                                    <input type="text" name="datastorage" id="datastorage" class="form-control"
                                        placeholder="Storage">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Actual Location</label>
                                    <input type="text" name="datalocation" id="datalocation" class="form-control"
                                        placeholder="Actual Location">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">File Name/Description</label>
                                    <input type="text" name="datadescription" id="datadescription" class="form-control"
                                        placeholder="File Name/Description">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category">Category</label>
                                        <select name="datacategory" id="datacategory" class="form-control">
                                            <option value="Physical">Physical</option>
                                            <option value="Digital">Digital</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category">Security Status</label>
                                        <select name="datasecuritystatus" id="datasecuritystatus" class="form-control">
                                            <option value="Secured(With Lock)">Secured(With Lock)</option>
                                            <option value="Secured(With Encripted)">Secured(With Encripted)</option>
                                            <option value="Not Secured(Not Organize)">Not Secured(Not Organize)</option>
                                            <option value="Organized(Folder/Proper Filling)">Organized(Folder/Proper
                                                Filling)</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="category">Types of Data</label>
                                        <select name="datatypes" id="datatypes" class="form-control">
                                            <option value="PII">PERSONALLY IDENTIFIABLE INFORMATION (PII)</option>
                                            <option value="PHI">PROTECTED HEALTH INFORMATION (PHI)</option>
                                            <option value="IBI">INTERNAL BUSINESS INFORMATION (IBI) Sensitive
                                                information
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="email">Retention Date</label>
                                    <input type="date" name="dataretensiondate" id="dataretensiondate"
                                        class="form-control" placeholder="Retention Date">
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="email">Backup Process</label>
                                        <input type="text" name="databackup" id="databackup" class="form-control"
                                            placeholder="Backup Process">
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" name="submit" id="submit">Create</button>
                <a href="<?php echo APPURL; ?>dpo-panel/datainventory/datainventory.php"
                    class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
        </form>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>