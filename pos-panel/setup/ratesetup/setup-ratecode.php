<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>


<?php
if (isset($_GET['details'])) {

    $id = $_GET['details'];
    $query = "SELECT * FROM hmsratecode where id=$id";
    $app = new App;
    $ratecodes = $app->selectAll($query);


    $count_data = $app->selectone("SELECT COUNT(ratecodeid) as all_data FROM hmsratecodedetails WHERE ratecodeid='$id' ");
    echo $count_data->all_data;



}
?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "SELECT * FROM hmsratecodedetails where id=$id";
    $app = new App;
    $delratecodes = $app->selectAll($query);
    foreach ($delratecodes as $delratecode) {
        echo $ratecodeid = $delratecode->ratecodeid;
        $query = "DELETE FROM hmsratecodedetails where id='$id'";
        $app = new App;
        $path = "setup-ratecode.php?details=$ratecodeid";
        $app->delete($query, $path);
    }

}
?>
<?php
if (isset($_POST['submit'])) {

    $ratecodeid = $_POST['ratecodeid'];
    $query = "SELECT * FROM hmsratecode where id=$ratecodeid";
    $app = new App;
    $ratecodes = $app->selectAll($query);

    if (!empty($_POST['check_list'])) {

        // Counting number of checked checkboxes.
        $checked_count = count($_POST['check_list']);
        echo "You have selected following " . $checked_count . " option(s): <br/>";
        // Loop to store and display values of individual checked checkbox.
        foreach ($_POST['check_list'] as $roomtypeid) {

            $ratecodeid = $_POST['ratecodeid'];


            $roomtypeid1 = $roomtypeid;
            $query = "SELECT COUNT(*) AS count_rcdetails FROM hmsratecodedetails where ratecodeid=$ratecodeid and roomtypeid=$roomtypeid1 ";
            $app = new App;
            $count_rcdetails = $app->selectOne($query);
            $count_rcdetails->count_rcdetails;
            if ($count_rcdetails->count_rcdetails >= 1) {

                echo "Match Update";
                echo $ratecodeid = $_POST['ratecodeid'];
                echo " <br>";
                echo $roomtypeid1 = $roomtypeid;
                echo " <br>";


                $query = "SELECT * FROM hmsratecodedetails where ratecodeid=$ratecodeid and roomtypeid=$roomtypeid1";
                $app = new App;
                $ratecodedetailids = $app->selectAll($query);
                foreach ($ratecodedetailids as $ratecodedetailid) {
                    echo $rcdtid = $ratecodedetailid->id;

                    echo $rate = $_POST['rate'];
                    echo $selldate = $_POST['selldate'];
                    echo $enddate = $_POST['enddate'];
                    echo $marketid = $_POST['marketid'];
                    echo $sourceid = $_POST['sourceid'];
                    echo $packageid = $_POST['packageid'];
                    echo $deptid = $_POST['deptid'];
                    // echo $monday = $_POST['mondayrate'];
                    echo $monday = isset($_POST['mondayrate']) ? $_POST['mondayrate'] : 0;

                    echo $tuesday = isset($_POST['tuesdayrate']) ? $_POST['tuesdayrate'] : 0;
                    echo $wednesday = isset($_POST['wednesdayrate']) ? $_POST['wednesdayrate'] : 0;
                    echo $thursday = isset($_POST['thursdayrate']) ? $_POST['thursdayrate'] : 0;
                    echo $friday = isset($_POST['fridayrate']) ? $_POST['fridayrate'] : 0;
                    echo $saturday = isset($_POST['saturdayrate']) ? $_POST['saturdayrate'] : 0;
                    echo $sunday = isset($_POST['sundayrate']) ? $_POST['sundayrate'] : 0;
                    echo " <br>";

                    $query = "UPDATE hmsratecodedetails SET ratecodeid=:ratecodeid, roomtypeid=:roomtypeid, selldate=:selldate, enddate=:enddate, rate=:rate, marketid=:marketid, sourceid=:sourceid, packageid=:packageid,
                     deptid=:deptid, monday=:monday, tuesday=:tuesday, wednesday=:wednesday, thursday=:thursday, friday=:friday,
                      saturday=:saturday, sunday=:sunday WHERE id='$rcdtid'";
                    $arr = [
                        ":ratecodeid" => $ratecodeid,
                        ":roomtypeid" => $roomtypeid1,
                        ":selldate" => $selldate,
                        ":enddate" => $enddate,
                        ":rate" => $rate,
                        ":marketid" => $marketid,
                        ":sourceid" => $sourceid,
                        ":packageid" => $packageid,
                        ":deptid" => $deptid,
                        ":monday" => $monday,
                        ":tuesday" => $tuesday,
                        ":wednesday" => $wednesday,
                        ":thursday" => $thursday,
                        ":friday" => $friday,
                        ":saturday" => $saturday,
                        ":sunday" => $sunday,

                    ];

                    $path = "setup-ratecode.php?details=$ratecodeid";
                    $app->update($query, $arr, $path);

                }





                echo " <br>";




            } else {
                echo "Not Match Save";
                echo $rate = $_POST['rate'];
                echo $selldate = $_POST['selldate'];
                echo $enddate = $_POST['enddate'];
                echo $marketid = $_POST['marketid'];
                echo $sourceid = $_POST['sourceid'];
                echo $packageid = $_POST['packageid'];
                echo $deptid = $_POST['deptid'];


                echo $monday = isset($_POST['mondayrate']) ? $_POST['mondayrate'] : 0;
                echo $tuesday = isset($_POST['tuesdayrate']) ? $_POST['tuesdayrate'] : 0;
                echo $wednesday = isset($_POST['wednesdayrate']) ? $_POST['wednesdayrate'] : 0;
                echo $thursday = isset($_POST['thursdayrate']) ? $_POST['thursdayrate'] : 0;
                echo $friday = isset($_POST['fridayrate']) ? $_POST['fridayrate'] : 0;
                echo $saturday = isset($_POST['saturdayrate']) ? $_POST['saturdayrate'] : 0;
                echo $sunday = isset($_POST['sundayrate']) ? $_POST['sundayrate'] : 0;


                $query = "INSERT INTO hmsratecodedetails (ratecodeid, roomtypeid, selldate, enddate, rate, marketid, sourceid, packageid, deptid, monday, tuesday, wednesday, thursday, friday, saturday, sunday)
VALUES(:ratecodeid, :roomtypeid, :selldate, :enddate, :rate, :marketid, :sourceid, :packageid, :deptid, :monday,  :tuesday, :wednesday, :thursday, :friday, :saturday, :sunday)";
                $arr = [
                    ":ratecodeid" => $ratecodeid,
                    ":roomtypeid" => $roomtypeid,
                    ":selldate" => $selldate,
                    ":enddate" => $enddate,
                    ":rate" => $rate,
                    ":marketid" => $marketid,
                    ":sourceid" => $sourceid,
                    ":packageid" => $packageid,
                    ":deptid" => $deptid,
                    ":monday" => $monday,
                    ":tuesday" => $tuesday,
                    ":wednesday" => $wednesday,
                    ":thursday" => $thursday,
                    ":friday" => $friday,
                    ":saturday" => $saturday,
                    ":sunday" => $sunday,

                ];
                $path = "setup-ratecode.php?details=$ratecodeid";
                $app->register($query, $arr, $path);
            }

        }


    }


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
        <?php foreach ($ratecodes as $ratecode): ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Rate Code for <?php echo $ratecode->code . '' . $ratecode->id ?> </h1>
                </div>
                <div class="card-body">
                    <div class="row">



                        <div class="col-md-12 mb-3 ">
                            <div class="card mt-3 tab-card" style="min-height: 800px;">
                                <div class="card-header tab-card-header">
                                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="one-tab" data-toggle="tab" role="tab"
                                                aria-controls="One" aria-selected="true">Rate Code</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link"
                                                href="setup-ratecodedetails.php?details=<?php echo $ratecode->id ?>"
                                                aria-selected="true">Rate Details</a>
                                        </li> -->

                                    </ul>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active p-3" id="one" role="tabpanel"
                                        aria-labelledby="one-tab">
                                        <div class="col-md-12 mb-3 ">
                                            <div class="col-md-12 ">

                                                <?php

                                                    $query = "SELECT * FROM hmsratecodedetails where ratecodeid=$ratecode->id";
                                                    $app = new App;
                                                    $ratecodedetailss = $app->selectAll($query);
                                                    ?>
                                                <table class="table table-striped " style="width:100%" id="history">

                                                    <thead>
                                                        <tr>

                                                            <th>ID</th>
                                                            <th>Room Type </th>
                                                            <th>Begin Sell</th>
                                                            <th>End Sell</th>
                                                            <th>Standard Rate</th>
                                                            <th>Market</th>
                                                            <th>Source</th>
                                                            <th>Package</th>
                                                            <th>Dept</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if ($count_data->all_data > 0): ?>
                                                        <?php foreach ($ratecodedetailss as $ratecodedetails): ?>

                                                        <tr>

                                                            <td><?php echo $ratecodedetails->id ?></td>
                                                            <td>
                                                                <?php
                                                                            // echo $ratecodedetails->roomtypeid;
                                                                            $query = "SELECT * FROM hmsroomtypes where id=$ratecodedetails->roomtypeid ";
                                                                            $app = new App;
                                                                            $roomtype = $app->selectOne($query);
                                                                            echo $roomtype->code;
                                                                            ?>
                                                            </td>
                                                            <td><?php echo $ratecodedetails->selldate ?></td>
                                                            <td><?php echo $ratecodedetails->enddate ?></td>
                                                            <td><?php echo $ratecodedetails->rate ?></td>
                                                            <td><?php
                                                                        // echo $ratecodedetails->id;
                                                                        $query = "SELECT * FROM hmsmarket where id=$ratecodedetails->marketid ";
                                                                        $app = new App;
                                                                        $market = $app->selectOne($query);
                                                                        echo $market->market;
                                                                        ?></td>
                                                            <td><?php
                                                                        // echo $ratecodedetails->id;
                                                                        $query = "SELECT * FROM hmssource where id=$ratecodedetails->sourceid ";
                                                                        $app = new App;
                                                                        $source = $app->selectOne($query);
                                                                        echo $source->source;
                                                                        ?></td>
                                                            <td><?php
                                                                        // echo $ratecodedetails->id;
                                                                        $query = "SELECT * FROM hmspackages where id=$ratecodedetails->packageid ";
                                                                        $app = new App;
                                                                        $packages = $app->selectOne($query);
                                                                        echo $packages->packages;
                                                                        ?></td>




                                                            <td><?php
                                                                        // echo $ratecodedetails->id;
                                                                        $query = "SELECT * FROM hmsdepartment where id=$ratecodedetails->deptid ";
                                                                        $app = new App;
                                                                        $department = $app->selectOne($query);
                                                                        echo $department->department;
                                                                        ?></td>



                                                            <td><a style="text-decoration:none;"
                                                                    href="setup-ratecodedetails.php?details=<?php echo $ratecodedetails->id ?>"
                                                                    class="text-primary">&nbsp;&nbsp;
                                                                    <i class="nav-icon fas fa fa-eye"></i>

                                                                </a>
                                                                <a style="text-decoration:none;"
                                                                    href="ratecodedetails.php?edit=<?php echo $ratecodedetails->id ?>"
                                                                    class=" text-success">&nbsp;&nbsp;
                                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                                </a> |
                                                                <a style="text-decoration:none;"
                                                                    href="setup-ratecode.php?delete=<?php echo $ratecodedetails->id ?>"
                                                                    class=" text-danger">&nbsp;&nbsp;
                                                                    <i class="nav-icon fas fa fa-trash"></i>

                                                                </a>

                                                            </td>
                                                        </tr>


                                                        <?php endforeach; ?>
                                                        <?php else: ?>
                                                        <tr>
                                                            <td scope="row" colspan="10" style="text-align:center;">No
                                                                Data in This RateCode
                                                            </td>
                                                        </tr>

                                                        <?php endif; ?>
                                                    </tbody>
                                                    <?php if ($count_data->all_data > 0): ?>
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
                                                    <?php else: ?>

                                                    <?php endif; ?>
                                                </table>


                                            </div>
                                        </div>
                                        <hr>
                                        <form method="POST" action="setup-ratecode.php">
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <h5>Days</h5>








                                                    <div class="form-check">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="monday" value="1" name="monday"
                                                                    onclick="togglemonday()"><label
                                                                    class="form-check-label">Monday
                                                                </label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="tuesday" value="1" name="tuesday"
                                                                    onclick="toggletuesday()">
                                                                <label class="form-check-label">Tuesday </label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="wednesday" value="1" name="wednesday"
                                                                    onclick="togglewednesday()"><label
                                                                    class="form-check-label">Wednesday </label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="thursday" value="1" name="thursday"
                                                                    onclick="togglethursday()">
                                                                <label class="form-check-label">Thursday </label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="friday" value="1" name="friday"
                                                                    onclick="togglefriday()"><label
                                                                    class="form-check-label">Friday </label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="saturday" value="1" name="saturday"
                                                                    onclick="togglesaturday()">
                                                                <label class="form-check-label">Saturday </label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="sunday" value="1" name="sunday"
                                                                    onclick="togglesunday()"><label
                                                                    class="form-check-label">Sunday </label>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input class="form-check-input" type="checkbox" id="all"
                                                                    value="1" name="all" onclick="toggleall()"><label
                                                                    class="form-check-label">Select All </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

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
                                                                <?php echo $ratecode->code ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">

                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Room
                                                                Type Rate </label>
                                                            <div class="col-sm-8">

                                                                <?php
                                                                    $query = "SELECT * FROM hmsroomtypes";
                                                                    $app = new App;
                                                                    $roomtypes = $app->selectAll($query);
                                                                    ?>
                                                                <?php if ($count_data->all_data > 0): ?>
                                                                <?php foreach ($roomtypes as $roomtype): ?>
                                                                <div class="col-md-12">
                                                                    <input <?php
                                                                                // echo $ratecode->id;
                                                                                $query = "SELECT * FROM hmsratecodedetails where ratecodeid=$ratecode->id";
                                                                                $app = new App;
                                                                                $ratecodedetail1ss = $app->selectAll($query);
                                                                                foreach ($ratecodedetail1ss as $ratecodedetail1s) {
                                                                                    $query = "SELECT * FROM roomtypes where id=$ratecodedetail1s->roomtypeid ";
                                                                                    $app = new App;
                                                                                    $roomtype12 = $app->selectOne($query);
                                                                                    // echo $roomtype12->code;
                                                                    
                                                                                    if ($roomtype12->id == $roomtype->id) {
                                                                                        echo "checked";
                                                                                    } else {
                                                                                    }
                                                                                }

                                                                                ?> class="form-check-input"
                                                                        type="checkbox" id="roomtypeid"
                                                                        value="<?php echo $roomtype->id ?>"
                                                                        name="check_list[]"><label
                                                                        class="form-check-label">
                                                                        <?php echo $roomtype->code . '-' . $roomtype->description ?>
                                                                        Rate </label>
                                                                </div>
                                                                <?php endforeach; ?>

                                                                <?php else: ?>
                                                                <?php
                                                                        $query = "SELECT * FROM hmsroomtypes";
                                                                        $app = new App;
                                                                        $roomtypes = $app->selectAll($query);
                                                                        ?>
                                                                <?php foreach ($roomtypes as $roomtype): ?>

                                                                <div class="col-md-12">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="roomtypeid" name="check_list[]"
                                                                        value="<?php echo $roomtype->id ?>"><label
                                                                        class="form-check-label">
                                                                        <?php echo $roomtype->code . '-' . $roomtype->description ?>
                                                                        Rate </label>
                                                                </div>
                                                                <?php endforeach; ?>


                                                                <?php endif; ?>





                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12 mb-3">
                                                        <input type="hidden" class="form-control form-control-sm"
                                                            id="ratecodeid" value="<?php echo $ratecode->id ?>"
                                                            name="ratecodeid">
                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Sell
                                                                Date Rate </label>
                                                            <div class="col-sm-8">
                                                                <input type="date" class="form-control form-control-sm"
                                                                    id="colFormLabelSm" name="selldate"
                                                                    value="<?php echo $ratecode->selldate ?>" required>

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
                                                                    id="colFormLabelSm" name="enddate" required>
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
                                                                <?php echo $ratecode->code ?>
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
                                                                    placeholder="Enter Price" required>
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
                                                                    placeholder="Enter Price">
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
                                                                    placeholder="Enter Price">
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
                                                                    min="0" placeholder="Enter Price">
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
                                                                    min="0" placeholder="Enter Price">
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
                                                                    placeholder="Enter Price">
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
                                                                    min="0" placeholder="Enter Price">
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
                                                                    placeholder="Enter Price">
                                                            </div>
                                                        </div>



                                                        <script>
                                                        // function toggleTextbox() {
                                                        //     var checkbox = document.getElementById('myCheckbox');
                                                        //     var textbox = document.getElementById('myTextbox');

                                                        //     if (!checkbox.checked) {
                                                        //         textbox.disabled = true;
                                                        //     } else {
                                                        //         textbox.disabled = false;
                                                        //     }
                                                        // }

                                                        function togglemonday() {
                                                            var checkbox = document.getElementById('monday');
                                                            var textbox = document.getElementById('mondayrate');
                                                            if (!checkbox.checked) {
                                                                textbox.disabled = true;
                                                            } else {
                                                                textbox.disabled = false;
                                                            }
                                                        }

                                                        function toggletuesday() {
                                                            var checkbox = document.getElementById('tuesday');
                                                            var textbox = document.getElementById('tuesdayrate');
                                                            if (!checkbox.checked) {
                                                                textbox.disabled = true;
                                                            } else {
                                                                textbox.disabled = false;
                                                            }
                                                        }

                                                        function togglewednesday() {
                                                            var checkbox = document.getElementById('wednesday');
                                                            var textbox = document.getElementById('wednesdayrate');
                                                            if (!checkbox.checked) {
                                                                textbox.disabled = true;
                                                            } else {
                                                                textbox.disabled = false;
                                                            }
                                                        }

                                                        function togglethursday() {
                                                            var checkbox = document.getElementById('thursday');
                                                            var textbox = document.getElementById('thursdayrate');
                                                            if (!checkbox.checked) {
                                                                textbox.disabled = true;
                                                            } else {
                                                                textbox.disabled = false;
                                                            }
                                                        }

                                                        function togglefriday() {
                                                            var checkbox = document.getElementById('friday');
                                                            var textbox = document.getElementById('fridayrate');
                                                            if (!checkbox.checked) {
                                                                textbox.disabled = true;
                                                            } else {
                                                                textbox.disabled = false;
                                                            }
                                                        }

                                                        function togglesaturday() {
                                                            var checkbox = document.getElementById('saturday');
                                                            var textbox = document.getElementById('saturdayrate');
                                                            if (!checkbox.checked) {
                                                                textbox.disabled = true;
                                                            } else {
                                                                textbox.disabled = false;
                                                            }
                                                        }

                                                        function togglesunday() {
                                                            var checkbox = document.getElementById('sunday');
                                                            var textbox = document.getElementById('sundayrate');
                                                            if (!checkbox.checked) {
                                                                textbox.disabled = true;
                                                            } else {
                                                                textbox.disabled = false;
                                                            }
                                                        }

                                                        function toggleall() {
                                                            var checkbox = document.getElementById('all');
                                                            var textbox1 = document.getElementById('mondayrate');
                                                            var textbox2 = document.getElementById('tuesdayrate');
                                                            var textbox3 = document.getElementById('wednesdayrate');
                                                            var textbox4 = document.getElementById('thursdayrate');
                                                            var textbox5 = document.getElementById('fridayrate');
                                                            var textbox6 = document.getElementById('saturdayrate');
                                                            var textbox7 = document.getElementById('sundayrate');
                                                            if (!checkbox.checked) {
                                                                textbox1.disabled = true;
                                                                textbox2.disabled = true;
                                                                textbox3.disabled = true;
                                                                textbox4.disabled = true;
                                                                textbox5.disabled = true;
                                                                textbox6.disabled = true;
                                                                textbox7.disabled = true;
                                                            } else {

                                                                textbox1.disabled = false;
                                                                textbox2.disabled = false;
                                                                textbox3.disabled = false;
                                                                textbox4.disabled = false;
                                                                textbox5.disabled = false;
                                                                textbox6.disabled = false;
                                                                textbox7.disabled = false;
                                                            }
                                                        }

                                                        // Initial state
                                                        document.getElementById('monday').checked = false;
                                                        document.getElementById('mondayrate').disabled = true;

                                                        document.getElementById('tuesday').checked = false;
                                                        document.getElementById('tuesdayrate').disabled = true;

                                                        document.getElementById('wednesday').checked = false;
                                                        document.getElementById('wednesdayrate').disabled = true;

                                                        document.getElementById('thursday').checked = false;
                                                        document.getElementById('thursdayrate').disabled = true;

                                                        document.getElementById('friday').checked = false;
                                                        document.getElementById('fridayrate').disabled = true;

                                                        document.getElementById('saturday').checked = false;
                                                        document.getElementById('saturdayrate').disabled = true;

                                                        document.getElementById('sunday').checked = false;
                                                        document.getElementById('sundayrate').disabled = true;
                                                        </script>

                                                    </div>

                                                </div>
                                                <hr>

                                                <div class="pb-5 pt-3">
                                                    <button class="btn btn-primary" type="submit" name="submit">Setup
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                                        tab 2 <a href="#" class="btn btn-primary">Go somewhere 2</a>
                                    </div>
                                    <div class="tab-pane fade p-3" id="three" role="tabpanel"
                                        aria-labelledby="three-tab">
                                        tab 3 <a href="#" class="btn btn-primary">Go somewhere 3</a>
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