<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    $query = "SELECT * FROM dpodatainventory where datainventoryid='$id'";
    $app = new App;
    $datas = $app->selectAll($query);


}


if (isset($_POST['submit'])) {
    $datainventoryid = $_POST['datainventoryid'];
    $datastorage = $_POST['datastorage'];
    $datalocation = $_POST['datalocation'];
    $datadescription = $_POST['datadescription'];
    $datacategory = $_POST['datacategory'];
    $datasecuritystatus = $_POST['datasecuritystatus'];
    $datadepartment = $_POST['datadepartment'];
    $datatypes = $_POST['datatypes'];

    $dataretensiondate = $_POST['dataretensiondate'];
    $databackup = $_POST['databackup'];

    $userdepartment = $_SESSION['userdepartment'];
    $userid = $_SESSION['userid'];
    $query = "UPDATE dpodatainventory SET datastorage=:datastorage, datalocation=:datalocation, datadescription=:datadescription, datacategory=:datacategory, datasecuritystatus=:datasecuritystatus, datadepartment=:datadepartment, datatypes=:datatypes, dataretensiondate=:dataretensiondate, databackup=:databackup  WHERE datainventoryid='$datainventoryid'";
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

    $path = "update-datainventory.php?edit=$datainventoryid";
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
                    <h1>Update Data Inventory</h1>
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
                <form class="row g-3" method="POST" action="update-datainventory.php">
                    <?php foreach ($datas as $data): ?>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="email">Storage</label>
                                        <input type="hidden" name="datainventoryid" id="datainventoryid"
                                            value="<?php echo $data->datainventoryid ?>">
                                        <input type="hidden" name="datadepartment" id="datadepartment"
                                            value="<?php echo $data->datadepartment ?>">
                                        <input type="text" name="datastorage" id="datastorage"
                                            value="<?php echo $data->datastorage ?>" class="form-control"
                                            placeholder="Storage">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="email">Actual Location</label>
                                        <input type="text" name="datalocation" id="datalocation"
                                            value="<?php echo $data->datalocation ?>" class="form-control"
                                            placeholder="Actual Location">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="email">File Name/Description</label>
                                        <input type="text" name="datadescription" id="datadescription"
                                            value="<?php echo $data->datadescription ?>" class="form-control"
                                            placeholder="File Name/Description">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="category">Category</label>
                                            <select name="datacategory" id="datacategory" class="form-control">
                                                <option value="<?php echo $data->datacategory ?>">
                                                    <?php echo $data->datacategory ?>
                                                </option>
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
                                                <option value="<?php echo $data->datasecuritystatus ?>">
                                                    <?php echo $data->datasecuritystatus ?>
                                                </option>
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
                                                <option value="<?php echo $data->datatypes ?>">
                                                    <?php echo $data->datatypes ?>
                                                </option>
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
                                            value="<?php echo $data->dataretensiondate ?>" class="form-control"
                                            placeholder="Retention Date">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="email">Backup Process</label>
                                            <input type="text" name="databackup" id="databackup"
                                                value="<?php echo $data->databackup ?>" class="form-control"
                                                placeholder="Backup Process">
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="submit" id="submit">Update</button>
                    <a href="<?php echo APPURL; ?>dpo-panel/datainventory/datainventory.php"
                        class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>

        <?php endforeach; ?>

        </form>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --><?php require "../../footer1.php"; ?>