<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>


<?php
$query = "SELECT * FROM ittelephone";
$app = new App;
$phones = $app->selectAll($query);


$query = "SELECT COUNT(*) AS count_DayBed FROM ittelephone WHERE DayBed='WORKING'";
$app = new App;
$count_DayBed = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_NDayBed FROM ittelephone WHERE DayBed='NON-WORKING'";
$app = new App;
$count_NDayBed = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_PowderRoom FROM ittelephone WHERE PowderRoom='WORKING'";
$app = new App;
$count_PowderRoom = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_NPowderRoom FROM ittelephone WHERE PowderRoom='NON-WORKING'";
$app = new App;
$count_NPowderRoom = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_Bedside FROM ittelephone WHERE Bedside='WORKING'";
$app = new App;
$count_Bedside = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_NBedside FROM ittelephone WHERE Bedside='NON-WORKING'";
$app = new App;
$count_NBedside = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_Bathroom FROM ittelephone WHERE Bathroom='WORKING'";
$app = new App;
$count_Bathroom = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_NBathroom FROM ittelephone WHERE Bathroom='NON-WORKING'";
$app = new App;
$count_NBathroom = $app->selectOne($query);


$query = "SELECT COUNT(*) AS count_Offices FROM ittelephone WHERE Department='Offices' and OperationalStatus='Active'";
$app = new App;
$count_Offices = $app->selectOne($query);
$query = "SELECT COUNT(*) AS count_NOffices FROM ittelephone WHERE Department='Offices' and OperationalStatus='Inactive'";
$app = new App;
$count_NOffices = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_Spare FROM ittelephone WHERE Department='Spare' ";
$app = new App;
$count_Spare = $app->selectOne($query);
$query = "SELECT COUNT(*) AS count_NBathroom FROM ittelephone WHERE Bathroom='NON-WORKING'";
$app = new App;
$count_NBathroom = $app->selectOne($query);
$query = "SELECT COUNT(*) AS count_NBathroom FROM ittelephone WHERE Bathroom='NON-WORKING'";
$app = new App;
$count_NBathroom = $app->selectOne($query);



?>
<?php if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM ittelephone WHERE AssetID='$id'";
    $app = new App;
    $path = "index.php";
    $app->delete($query, $path);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Telephone</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="add-phone.php" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card d-print-block">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Lists of Telephone</b> </h1>

                </div>
                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-default">
                                <div class="inner">
                                    <h4>Day Bed<sup style="font-size: 20px"></sup>
                                    </h4>


                                    <p>
                                        Working : <span
                                            class="text-success"><?php echo $count_DayBed->count_DayBed; ?></span>
                                        |
                                        Non-Working : <span
                                            class="text-danger"><?php echo $count_NDayBed->count_NDayBed; ?></span>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-default">
                                <div class="inner">
                                    <h4>Powder Room<sup style="font-size: 20px"></sup>
                                    </h4>



                                    <p>
                                        Working : <span
                                            class="text-success"><?php echo $count_PowderRoom->count_PowderRoom; ?></span>
                                        |
                                        Non-Working : <span
                                            class="text-danger"><?php echo $count_NPowderRoom->count_NPowderRoom; ?></span>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-default">
                                <div class="inner">
                                    <h4>Bedside<sup style="font-size: 20px"></sup>
                                    </h4>

                                    <p>
                                        Working : <span
                                            class="text-success"><?php echo $count_Bedside->count_Bedside; ?></span> |
                                        Non-Working : <span
                                            class="text-danger"><?php echo $count_NBedside->count_NBedside; ?></span>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-default">
                                <div class="inner">
                                    <h4>Bathroom
                                        <sup style="font-size: 20px"></sup>
                                    </h4>

                                    <p>
                                        Working : <span
                                            class="text-success"><?php echo $count_Bathroom->count_Bathroom; ?></span> |
                                        Non-Working : <span
                                            class="text-danger"><?php echo $count_NBathroom->count_NBathroom; ?></span>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-default">
                                <div class="inner">
                                    <h4>Offices
                                        <sup style="font-size: 20px"></sup>
                                    </h4>

                                    <p>
                                        Working : <span
                                            class="text-success"><?php echo $count_Offices->count_Offices; ?></span> |
                                        Non-Working : <span
                                            class="text-danger"><?php echo $count_NOffices->count_NOffices; ?></span>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-default">
                                <div class="inner">
                                    <h4>Spare/Slot Available
                                        <sup style="font-size: 20px"></sup>
                                    </h4>

                                    <p>
                                        Available Slot : <span
                                            class="text-success"><?php echo $count_Spare->count_Spare; ?></span>

                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table-sm table-striped " style="width:100%;font-size: 13px; " id="example">
                        <thead>

                            <tr>
                                <th width="60">Asset ID</th>
                                <th>Device Type</th>
                                <th>Extension</th>

                                <!-- <th>User</th> -->
                                <th>Department</th>
                                <th>Location</th>


                                <th>Day Bed</th>
                                <th>Powder Room</th>
                                <th>Bedside</th>
                                <th>Bathroom</th>
                                <th>Operational Status</th>
                                <th>Connection Status</th>
                                <th>Notes</th>
                                <th>Last Audit Date</th>
                                <th>Remarks</th>

                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($phones as $phone): ?>

                                <tr>

                                    <td> <?php echo $phone->AssetID ?>

                                    </td>
                                    <td> <?php echo $phone->DeviceType ?>
                                    </td>




                                    <td><?php echo $phone->ExtensionNumber ?></td>
                                    <!-- <td><?php echo $phone->UserOwner ?></td> -->


                                    <td><?php echo $phone->Department ?></td>
                                    <td><?php echo $phone->PhysicalLocation ?></td>
                                    <td>
                                        <?php
                                        if ($phone->DayBed == "WORKING") {
                                            echo '<svg class="text-success-500 h-6 w-6 text-success"
                                        		xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        		stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        	</svg>';
                                        } else if ($phone->DayBed == "NON-WORKING") {
                                            echo '<svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                        		fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        		aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        		</path>
                                        	</svg>';
                                        } else {
                                            echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="4" y1="12" x2="20" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                                </svg>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($phone->PowderRoom == "WORKING") {
                                            echo '<svg class="text-success-500 h-6 w-6 text-success"
                                        		xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        		stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        	</svg>';
                                        } else if ($phone->PowderRoom == "NON-WORKING") {
                                            echo '<svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                        		fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        		aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        		</path>
                                        	</svg>';
                                        } else {
                                            echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="4" y1="12" x2="20" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                                </svg>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($phone->Bedside == "WORKING") {
                                            echo '<svg class="text-success-500 h-6 w-6 text-success"
                                        		xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        		stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        	</svg>';
                                        } else if ($phone->Bedside == "NON-WORKING") {
                                            echo '<svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                        		fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        		aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        		</path>
                                        	</svg>';
                                        } else {
                                            echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="4" y1="12" x2="20" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                                </svg>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($phone->Bathroom == "WORKING") {
                                            echo '<svg class="text-success-500 h-6 w-6 text-success"
                                        		xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        		stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        	</svg>';
                                        } else if ($phone->Bathroom == "NON-WORKING") {
                                            echo '<svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                        		fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        		aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        		</path>
                                        	</svg>';
                                        } else {
                                            echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="4" y1="12" x2="20" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                                </svg>';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $phone->OperationalStatus ?></td>
                                    <td><?php echo $phone->ConnectionStatus ?></td>

                                    <td><?php echo $phone->Notes ?></td>

                                    <td><?php echo $phone->LastAuditDate ?></td>
                                    <td><?php echo $phone->Remarks ?></td>


                                    <td>
                                        <a style="text-decoration:none;"
                                            href="update-phone.php?edit=<?php echo $phone->AssetID ?>" class="text-success">
                                            <i class="nav-icon fas fa fa-edit"></i>

                                        </a>|
                                        <a style="text-decoration:none;"
                                            href="index.php?delete=<?php echo $phone->AssetID ?>" class="text-danger">
                                            <i class="nav-icon fas fa fa-trash"></i>

                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>



                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    var table = $('#example').DataTable({
        // Enable horizontal scrolling
        scrollX: true,
        // Enable vertical scrolling and set fixed height for table body
        scrollY: '500px', // Adjust height as needed
        // Optionally disable pagination if scrollY is used to show all data
        paging: false,
        // Enable filtering (search box) and control DOM elements
        // dom: 'irt', // Only show default, table, and row count/processing
        // Make the table column widths flexible to content if no explicit width is set
        autoWidth: false,
        // Adjust scrollCollapse to true if you want table to collapse its height
        scrollCollapse: true
    });
</script>


<?php require "../../footer1.php"; ?>