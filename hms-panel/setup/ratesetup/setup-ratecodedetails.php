<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>


<?php
if (isset($_GET['details'])) {

    echo $id = $_GET['details'];
    $query = "SELECT * FROM hmsratecodedetails where id=$id";
    $app = new App;
    $ratecodedetails = $app->selectAll($query);

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
        <?php foreach ($ratecodedetails as $ratecodedetail): ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Rate Code for <?php $ratecodedetail->ratecodeid;

                        // echo $ratecodedetail->id;
                        $query = "SELECT * FROM hmsratecode where id=$ratecodedetail->ratecodeid ";
                        $app = new App;
                        $ratecodedet = $app->selectOne($query);
                        echo $ratecodedet->code;
                        ?> and Details of
                            <?php
                                $ratecodedetail->roomtypeid;
                                // echo $ratecodedetails->id;
                                $query = "SELECT * FROM hmsroomtypes where id=$ratecodedetail->roomtypeid ";
                                $app = new App;
                                $roomtype = $app->selectOne($query);
                                echo $roomtype->code;

                                ?>
                            Room Type</h1>
                </div>
                <div class="card-body">
                    <div class="row">



                        <div class="col-md-12 mb-3 ">
                            <div class="card mt-3 tab-card" style="min-height: 800px;">
                                <div class="card-header tab-card-header">
                                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="setup-ratecode.php?details=<?php echo $ratecodedet->id ?>"
                                                aria-selected="true">Rate Code</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab"
                                                aria-controls="One" aria-selected="true">Rate Details</a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active p-3" id="one" role="tabpanel"
                                        aria-labelledby="one-tab">
                                        <div class="col-md-12 mb-3 ">
                                            <div class="col-md-12 ">
                                                <?php
                                                    // echo $ratecodedet->id . "rateid";
                                                    $query = "SELECT * FROM hmsratecodedetails where id=$ratecodedet->id";
                                                    $app = new App;
                                                    $ratecodedetailss = $app->selectAll($query);
                                                    ?>
                                                <table class="table table-striped " style="width:100%" id="history">

                                                    <thead>
                                                        <tr>
                                                            <th>Room Type</th>
                                                            <th>Days </th>
                                                            <th>Rate </th>
                                                            <th>Bein Sell</th>
                                                            <th>End Sell</th>
                                                            <th>Market</th>
                                                            <th>Source</th>
                                                            <th>Package</th>
                                                            <th>Dept</th>
                                                            <!-- <th>Action</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($ratecodedetailss as $ratecodedetails): ?>
                                                        <?php
                                                                $query = "SELECT * FROM hmsroomtypes where id=$roomtype->id ";
                                                                $app = new App;
                                                                $roomtype = $app->selectOne($query);
                                                                // echo $ratecodedetails->id;
                                                                // echo $ratecodedet->id;
                                                                // echo $ratecodedetail->roomtypeid;
                                                                // echo $ratecodedetail->ratecodeid;
                                                                // $query = "SELECT * FROM hmsratecodedetails where roomtypeid=$ratecodedetail->roomtypeid and ratecodeid=$ratecodedetail->ratecodeid ";
                                                                $query = "SELECT * FROM hmsratecodedetails where id=$ratecodedetail->id ";
                                                                $app = new App;
                                                                $dayofweek = $app->selectOne($query);
                                                                if ($dayofweek->monday >= 1) {
                                                                    echo "<tr>";
                                                                    echo "<th>" . $roomtype->code . "</th>";
                                                                    echo "<th>Monday</th>";
                                                                    echo "<th>$dayofweek->monday</th>";

                                                                    echo "<th>" . $ratecodedetail->selldate . "</th>";
                                                                    echo "<th>" . $ratecodedetail->enddate . "</th>";
                                                                    $query = "SELECT * FROM hmsmarket where id=$ratecodedetail->marketid ";
                                                                    $app = new App;
                                                                    $market = $app->selectOne($query);
                                                                    echo "<th>" . $market->market . "</th>";
                                                                    $query = "SELECT * FROM hmssource where id=$ratecodedetail->sourceid ";
                                                                    $app = new App;
                                                                    $source = $app->selectOne($query);
                                                                    echo "<th>" . $source->source . "</th>";
                                                                    $query = "SELECT * FROM hmspackages where id=$ratecodedetail->packageid ";
                                                                    $app = new App;
                                                                    $packages = $app->selectOne($query);
                                                                    echo "<th>" . $packages->packages . "</th>";
                                                                    $query = "SELECT * FROM hmsdepartment where id=$ratecodedetail->deptid ";
                                                                    $app = new App;
                                                                    $department = $app->selectOne($query);
                                                                    echo "<th>" . $department->department . "</th>";
                                                                    //                                                                 echo "<td>
                                                                    //     <a style='text-decoration:none;' href='setup-ratecodedetail.php?details=$ratecodedetail->id'
                                                                    //         class='text-primary'>&nbsp;&nbsp;<i class='nav-icon fas fa fa-eye'></i></a>
                                                                    //     | <a style='text-decoration:none;' href='ratecodedetail.php?edit=$ratecodedetail->id'
                                                                    //         class=' text-success'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-edit'></i> </a>
                                                                    //     | <a style='text-decoration:none;' href='setup-ratecodedetail.php?delete=$ratecodedetail->id'
                                                                    //         class=' text-danger'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-trash'></i> </a>
                                                                    // </td>";
                                                                    echo " </tr>";

                                                                }
                                                                if ($dayofweek->tuesday >= 1) {
                                                                    echo "<tr>";
                                                                    echo "<th>" . $roomtype->code . "</th>";
                                                                    echo "<th>Tuesday</th>";
                                                                    echo "<th>$dayofweek->tuesday</th>";
                                                                    echo "<th>" . $ratecodedetail->selldate . "</th>";
                                                                    echo "<th>" . $ratecodedetail->enddate . "</th>";
                                                                    $query = "SELECT * FROM hmsmarket where id=$ratecodedetail->marketid ";
                                                                    $app = new App;
                                                                    $market = $app->selectOne($query);
                                                                    echo "<th>" . $market->market . "</th>";
                                                                    $query = "SELECT * FROM hmssource where id=$ratecodedetail->sourceid ";
                                                                    $app = new App;
                                                                    $source = $app->selectOne($query);
                                                                    echo "<th>" . $source->source . "</th>";
                                                                    $query = "SELECT * FROM hmspackages where id=$ratecodedetail->packageid ";
                                                                    $app = new App;
                                                                    $packages = $app->selectOne($query);
                                                                    echo "<th>" . $packages->packages . "</th>";
                                                                    $query = "SELECT * FROM hmsdepartment where id=$ratecodedetail->deptid ";
                                                                    $app = new App;
                                                                    $department = $app->selectOne($query);
                                                                    echo "<th>" . $department->department . "</th>";
                                                                    //                                                                 echo "<td>
                                                                    //     <a style='text-decoration:none;' href='setup-ratecodedetail.php?details=$ratecodedetail->id'
                                                                    //         class='text-primary'>&nbsp;&nbsp;<i class='nav-icon fas fa fa-eye'></i></a>
                                                                    //     | <a style='text-decoration:none;' href='ratecodedetail.php?edit=$ratecodedetail->id'
                                                                    //         class=' text-success'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-edit'></i> </a>
                                                                    //     | <a style='text-decoration:none;' href='setup-ratecodedetail.php?delete=$ratecodedetail->id'
                                                                    //         class=' text-danger'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-trash'></i> </a>
                                                                    // </td>";
                                                                    echo " </tr>";
                                                                }
                                                                if ($dayofweek->wednesday >= 1) {
                                                                    echo "<tr>";
                                                                    echo "<th>" . $roomtype->code . "</th>";
                                                                    echo "<th>Wednesday</th>";
                                                                    echo "<th>$dayofweek->wednesday</th>";
                                                                    echo "<th>" . $ratecodedetail->selldate . "</th>";
                                                                    echo "<th>" . $ratecodedetail->enddate . "</th>";
                                                                    $query = "SELECT * FROM hmsmarket where id=$ratecodedetail->marketid ";
                                                                    $app = new App;
                                                                    $market = $app->selectOne($query);
                                                                    echo "<th>" . $market->market . "</th>";
                                                                    $query = "SELECT * FROM hmssource where id=$ratecodedetail->sourceid ";
                                                                    $app = new App;
                                                                    $source = $app->selectOne($query);
                                                                    echo "<th>" . $source->source . "</th>";
                                                                    $query = "SELECT * FROM hmspackages where id=$ratecodedetail->packageid ";
                                                                    $app = new App;
                                                                    $packages = $app->selectOne($query);
                                                                    echo "<th>" . $packages->packages . "</th>";
                                                                    $query = "SELECT * FROM hmsdepartment where id=$ratecodedetail->deptid ";
                                                                    $app = new App;
                                                                    $department = $app->selectOne($query);
                                                                    echo "<th>" . $department->department . "</th>";
                                                                    //                                                                 echo "<td>
                                                                    //     <a style='text-decoration:none;' href='setup-ratecodedetail.php?details=$ratecodedetail->id'
                                                                    //         class='text-primary'>&nbsp;&nbsp;<i class='nav-icon fas fa fa-eye'></i></a>
                                                                    //     | <a style='text-decoration:none;' href='ratecodedetail.php?edit=$ratecodedetail->id'
                                                                    //         class=' text-success'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-edit'></i> </a>
                                                                    //     | <a style='text-decoration:none;' href='setup-ratecodedetail.php?delete=$ratecodedetail->id'
                                                                    //         class=' text-danger'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-trash'></i> </a>
                                                                    // </td>";
                                                                    echo " </tr>";
                                                                }
                                                                if ($dayofweek->thursday >= 1) {
                                                                    echo "<tr>";
                                                                    echo "<th>" . $roomtype->code . "</th>";
                                                                    echo "<th>Thursday</th>";
                                                                    echo "<th>$dayofweek->thursday</th>";
                                                                    echo "<th>" . $ratecodedetail->selldate . "</th>";
                                                                    echo "<th>" . $ratecodedetail->enddate . "</th>";
                                                                    $query = "SELECT * FROM hmsmarket where id=$ratecodedetail->marketid ";
                                                                    $app = new App;
                                                                    $market = $app->selectOne($query);
                                                                    echo "<th>" . $market->market . "</th>";
                                                                    $query = "SELECT * FROM hmssource where id=$ratecodedetail->sourceid ";
                                                                    $app = new App;
                                                                    $source = $app->selectOne($query);
                                                                    echo "<th>" . $source->source . "</th>";
                                                                    $query = "SELECT * FROM hmspackages where id=$ratecodedetail->packageid ";
                                                                    $app = new App;
                                                                    $packages = $app->selectOne($query);
                                                                    echo "<th>" . $packages->packages . "</th>";
                                                                    $query = "SELECT * FROM hmsdepartment where id=$ratecodedetail->deptid ";
                                                                    $app = new App;
                                                                    $department = $app->selectOne($query);
                                                                    echo "<th>" . $department->department . "</th>";
                                                                    //                                                                 echo "<td>
                                                                    //     <a style='text-decoration:none;' href='setup-ratecodedetail.php?details=$ratecodedetail->id'
                                                                    //         class='text-primary'>&nbsp;&nbsp;<i class='nav-icon fas fa fa-eye'></i></a>
                                                                    //     | <a style='text-decoration:none;' href='ratecodedetail.php?edit=$ratecodedetail->id'
                                                                    //         class=' text-success'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-edit'></i> </a>
                                                                    //     | <a style='text-decoration:none;' href='setup-ratecodedetail.php?delete=$ratecodedetail->id'
                                                                    //         class=' text-danger'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-trash'></i> </a>
                                                                    // </td>";
                                                                    echo " </tr>";
                                                                }
                                                                if ($dayofweek->friday >= 1) {
                                                                    echo "<tr>";
                                                                    echo "<th>" . $roomtype->code . "</th>";
                                                                    echo "<th>Friday</th>";
                                                                    echo "<th>$dayofweek->friday</th>";
                                                                    echo "<th>" . $ratecodedetail->selldate . "</th>";
                                                                    echo "<th>" . $ratecodedetail->enddate . "</th>";
                                                                    $query = "SELECT * FROM hmsmarket where id=$ratecodedetail->marketid ";
                                                                    $app = new App;
                                                                    $market = $app->selectOne($query);
                                                                    echo "<th>" . $market->market . "</th>";
                                                                    $query = "SELECT * FROM hmssource where id=$ratecodedetail->sourceid ";
                                                                    $app = new App;
                                                                    $source = $app->selectOne($query);
                                                                    echo "<th>" . $source->source . "</th>";
                                                                    $query = "SELECT * FROM hmspackages where id=$ratecodedetail->packageid ";
                                                                    $app = new App;
                                                                    $packages = $app->selectOne($query);
                                                                    echo "<th>" . $packages->packages . "</th>";
                                                                    $query = "SELECT * FROM hmsdepartment where id=$ratecodedetail->deptid ";
                                                                    $app = new App;
                                                                    $department = $app->selectOne($query);
                                                                    echo "<th>" . $department->department . "</th>";
                                                                    //                                                                 echo "<td>
                                                                    //     <a style='text-decoration:none;' href='setup-ratecodedetail.php?details=$ratecodedetail->id'
                                                                    //         class='text-primary'>&nbsp;&nbsp;<i class='nav-icon fas fa fa-eye'></i></a>
                                                                    //     | <a style='text-decoration:none;' href='ratecodedetail.php?edit=$ratecodedetail->id'
                                                                    //         class=' text-success'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-edit'></i> </a>
                                                                    //     | <a style='text-decoration:none;' href='setup-ratecodedetail.php?delete=$ratecodedetail->id'
                                                                    //         class=' text-danger'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-trash'></i> </a>
                                                                    // </td>";
                                                                    echo " </tr>";
                                                                }
                                                                if ($dayofweek->saturday >= 1) {
                                                                    echo "<tr>";
                                                                    echo "<th>" . $roomtype->code . "</th>";
                                                                    echo "<th>Saturday</th>";
                                                                    echo "<th>$dayofweek->saturday</th>";
                                                                    echo "<th>" . $ratecodedetail->selldate . "</th>";
                                                                    echo "<th>" . $ratecodedetail->enddate . "</th>";
                                                                    $query = "SELECT * FROM hmsmarket where id=$ratecodedetail->marketid ";
                                                                    $app = new App;
                                                                    $market = $app->selectOne($query);
                                                                    echo "<th>" . $market->market . "</th>";
                                                                    $query = "SELECT * FROM hmssource where id=$ratecodedetail->sourceid ";
                                                                    $app = new App;
                                                                    $source = $app->selectOne($query);
                                                                    echo "<th>" . $source->source . "</th>";
                                                                    $query = "SELECT * FROM hmspackages where id=$ratecodedetail->packageid ";
                                                                    $app = new App;
                                                                    $packages = $app->selectOne($query);
                                                                    echo "<th>" . $packages->packages . "</th>";
                                                                    $query = "SELECT * FROM hmsdepartment where id=$ratecodedetail->deptid ";
                                                                    $app = new App;
                                                                    $department = $app->selectOne($query);
                                                                    echo "<th>" . $department->department . "</th>";
                                                                    //                                                                 echo "<td>
                                                                    //     <a style='text-decoration:none;' href='setup-ratecodedetail.php?details=$ratecodedetail->id'
                                                                    //         class='text-primary'>&nbsp;&nbsp;<i class='nav-icon fas fa fa-eye'></i></a>
                                                                    //     | <a style='text-decoration:none;' href='ratecodedetail.php?edit=$ratecodedetail->id'
                                                                    //         class=' text-success'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-edit'></i> </a>
                                                                    //     | <a style='text-decoration:none;' href='setup-ratecodedetail.php?delete=$ratecodedetail->id'
                                                                    //         class=' text-danger'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-trash'></i> </a>
                                                                    // </td>";
                                                                    echo " </tr>";
                                                                }
                                                                if ($dayofweek->sunday >= 1) {
                                                                    echo "<tr>";
                                                                    echo "<th>" . $roomtype->code . "</th>";
                                                                    echo "<th>Sunday</th>";
                                                                    echo "<th>$dayofweek->sunday</th>";
                                                                    echo "<th>" . $ratecodedetail->selldate . "</th>";
                                                                    echo "<th>" . $ratecodedetail->enddate . "</th>";
                                                                    $query = "SELECT * FROM hmsmarket where id=$ratecodedetail->marketid ";
                                                                    $app = new App;
                                                                    $market = $app->selectOne($query);
                                                                    echo "<th>" . $market->market . "</th>";
                                                                    $query = "SELECT * FROM hmssource where id=$ratecodedetail->sourceid ";
                                                                    $app = new App;
                                                                    $source = $app->selectOne($query);
                                                                    echo "<th>" . $source->source . "</th>";
                                                                    $query = "SELECT * FROM hmspackages where id=$ratecodedetail->packageid ";
                                                                    $app = new App;
                                                                    $packages = $app->selectOne($query);
                                                                    echo "<th>" . $packages->packages . "</th>";
                                                                    $query = "SELECT * FROM hmsdepartment where id=$ratecodedetail->deptid ";
                                                                    $app = new App;
                                                                    $department = $app->selectOne($query);
                                                                    echo "<th>" . $department->department . "</th>";
                                                                    //                                                                 echo "<td>
                                                                    //     <a style='text-decoration:none;' href='setup-ratecodedetail.php?details=$ratecodedetail->id'
                                                                    //         class='text-primary'>&nbsp;&nbsp;<i class='nav-icon fas fa fa-eye'></i></a>
                                                                    //     | <a style='text-decoration:none;' href='ratecodedetail.php?edit=$ratecodedetail->id'
                                                                    //         class=' text-success'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-edit'></i> </a>
                                                                    //     | <a style='text-decoration:none;' href='setup-ratecodedetail.php?delete=$ratecodedetail->id'
                                                                    //         class=' text-danger'>&nbsp;&nbsp; <i class='nav-icon fas fa fa-trash'></i> </a>
                                                                    // </td>";
                                                                    echo " </tr>";
                                                                }
                                                                ?>
                                                        <?php endforeach; ?>
                                                    </tbody>

                                                    <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        $('#history').DataTable({

                                                            "pageLength": 5,
                                                            dom: 'Bfrtip',
                                                            buttons: [
                                                                'copy', 'csv', 'excel', 'pdf',
                                                                'print'
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
                                        <hr>
                                        <form method="POST" action="update-ratecodedetails.php">


                                            <div class="row">
                                                <div class="col-md-6 mb-3">

                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Rate
                                                                Code
                                                                For

                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <?php echo $ratecodedet->code ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Room
                                                                Type </label>
                                                            <div class="col-sm-8">
                                                                <?php echo $roomtype->code ?>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <?php foreach ($ratecodedetailss as $ratecodedetails): ?>
                                                    <?php
                                                            // $query = "SELECT * FROM hmsratecodedetails where roomtypeid=$ratecodedetails->roomtypeid";
                                                            $query = "SELECT * FROM hmsratecodedetails where id=$ratecodedetail->id";
                                                            $app = new App;
                                                            $ratedaydetails = $app->selectOne($query);

                                                            // echo $ratedaydetails->selldate;
                                                            ?>

                                                    <div class="col-md-12 mb-3">

                                                        <input type="hidden" class="form-control form-control-sm"
                                                            id="details" value="<?php echo $id ?>" name="details">
                                                        <input type="hidden" class="form-control form-control-sm"
                                                            id="ratecodeid" value="<?php echo $ratecodedet->id ?>"
                                                            name="ratecodeid">
                                                        <input type="hidden" class="form-control form-control-sm"
                                                            id="roomtypeid"
                                                            value="<?php echo $ratedaydetails->roomtypeid ?>"
                                                            name="roomtypeid">
                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Sell
                                                                Date Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="date" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="selldate"
                                                                    value="<?php echo $ratedaydetails->selldate ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">End
                                                                Date Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="date" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="enddate"
                                                                    value="<?php echo $ratedaydetails->enddate ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Market
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control form-control-sm"
                                                                    name="marketid">
                                                                    <?php
                                                                            $query = "SELECT * FROM hmsmarket where id=$ratedaydetails->marketid";
                                                                            $app = new App;
                                                                            $marketones = $app->selectOne($query);
                                                                            echo "<option value=" . $marketones->id . ">" . $marketones->market . "</option>";
                                                                            ?>
                                                                    <?php
                                                                            $query = "SELECT * FROM hmsmarket";
                                                                            $app = new App;
                                                                            $markets = $app->selectAll($query);
                                                                            ?>
                                                                    <?php foreach ($markets as $market): ?>
                                                                    <option value="<?php echo $market->id ?>">
                                                                        <?php echo $market->market ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Source
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control form-control-sm"
                                                                    name="sourceid">

                                                                    <?php
                                                                            $query = "SELECT * FROM hmssource where id=$ratedaydetails->sourceid";
                                                                            $app = new App;
                                                                            $sourceones = $app->selectOne($query);
                                                                            echo "<option value=" . $sourceones->id . ">" . $sourceones->source . "</option>";
                                                                            ?>


                                                                    <?php
                                                                            $query = "SELECT * FROM hmssource";
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
                                                                class="col-sm-3 col-form-label col-form-label-sm">Packages
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control form-control-sm"
                                                                    name="packageid">


                                                                    <?php
                                                                            $query = "SELECT * FROM hmspackages where id=$ratedaydetails->packageid";
                                                                            $app = new App;
                                                                            $packageones = $app->selectOne($query);
                                                                            echo "<option value=" . $packageones->id . ">" . $packageones->packages . '-' . $packages->packageones . '-' . $packageones->price . '-' . $packageones->calculaterateby . "</option>";
                                                                            ?>
                                                                    <?php
                                                                            $query = "SELECT * FROM hmspackages";
                                                                            $app = new App;
                                                                            $packagess = $app->selectAll($query);
                                                                            ?>
                                                                    <?php foreach ($packagess as $packages): ?>
                                                                    <option value="<?php echo $packages->id ?>">
                                                                        <?php echo $packages->packages . '-' . $packages->description . '-' . $packages->price . '-' . $packages->calculaterateby ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Category
                                                                Dept </label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control form-control-sm"
                                                                    name="deptid">
                                                                    <?php
                                                                            $query = "SELECT * FROM hmsdepartment where id=$ratedaydetails->deptid";
                                                                            $app = new App;
                                                                            $departmentones = $app->selectOne($query);
                                                                            echo "<option value=" . $departmentones->id . ">" . $departmentones->department . "</option>";
                                                                            ?>
                                                                    <?php
                                                                            $query = "SELECT * FROM hmsdepartment";
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

                                                </div>

                                                <div class="col-md-6 mb-3">

                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Day
                                                                Rate
                                                                For

                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <?php // echo $ratecode->code ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Standard
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="number"
                                                                    class="form-control form-control-sm" id="rate"
                                                                    name="rate" step="0" min="0"
                                                                    placeholder="Enter Price"
                                                                    value="<?php echo $ratedaydetails->rate ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Monday
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="number"
                                                                    class="form-control form-control-sm" id="mondayrate"
                                                                    name="mondayrate" step="0" min="0"
                                                                    placeholder="Enter Price"
                                                                    value="<?php echo $ratedaydetails->monday ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Tuesday
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="tuesdayrate" name="tuesdayrate" step="0" min="0"
                                                                    placeholder="Enter Price"
                                                                    value="<?php echo $ratedaydetails->tuesday ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Wednesday
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="wednesdayrate" name="wednesdayrate" step="0"
                                                                    min="0" placeholder="Enter Price"
                                                                    value="<?php echo $ratedaydetails->wednesday ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Thursday
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="thursdayrate" name="thursdayrate" step="0"
                                                                    min="0" placeholder="Enter Price"
                                                                    value="<?php echo $ratedaydetails->thursday ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Friday
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="fridayrate" name="fridayrate" step="0" min="0"
                                                                    placeholder="Enter Price"
                                                                    value="<?php echo $ratedaydetails->friday ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Saturday
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="saturdayrate" name="saturdayrate" step="0"
                                                                    min="0" placeholder="Enter Price"
                                                                    value="<?php echo $ratedaydetails->saturday ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Sunday
                                                                Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="sundayrate" name="sundayrate" step="0" min="0"
                                                                    placeholder="Enter Price"
                                                                    value="<?php echo $ratedaydetails->sunday ?>">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <?php endforeach; ?>


                                                </div>
                                                <hr>
                                                <div class="pb-5 pt-3">
                                                    <button class="btn btn-primary" type="submit"
                                                        name="update">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <?php endforeach; ?>

    </section>
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>