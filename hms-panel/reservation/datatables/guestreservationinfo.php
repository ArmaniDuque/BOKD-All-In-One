<?php require "../../../header.php"; ?>
<?php require "../../../sidebar.php"; ?>
<?php if (isset($_GET['select'])) {
    echo $select = $_GET['select'];
    $query = "SELECT * FROM t_customerinfo where customerid=$select";
    $app = new App;
    $selctednames = $app->selectAll($query);
    foreach ($selctednames as $selctedname) {

        ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>New Reservation Module</h1>
                </div> -->
                <!-- <div class="col-sm-6 text-right">
                    <a href="orders.php" class="btn btn-primary">Back</a>
                </div> -->
                <?php require "../navbar.php"; ?>

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
                    <h1 class="h5 mb-3"><b>Guest Reservation Info</h1>
                </div>
                <!-- /.BODY -->
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <div class="col-md-12 ">
                            <h4 class="mb-3 text-primary">Perosnal Information <?php echo $selctedname->customerid; ?>
                                <h4>
                        </div>

                        <div class="col-md-4 mb-3 ">
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Last
                                        Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="lastname"
                                            value="<?php echo $selctedname->lastname; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">First
                                        Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="firstname"
                                            value="<?php echo $selctedname->firstname; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Middle
                                        Name / Title</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" name="middlename"
                                            value="<?php echo $selctedname->middlename; ?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" name="tittle"
                                            value="<?php echo $selctedname->tittle; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Phone
                                        No. 1</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" name="number1"
                                            value="<?php echo $selctedname->number1; ?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" pname="number2"
                                            value="<?php echo $selctedname->number2; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Email
                                        1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="email1"
                                            value="<?php echo $selctedname->email1; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="address"
                                            value="<?php echo $selctedname->address; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">City</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="city"
                                            value="<?php echo $selctedname->city; ?>">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 mb-3 ">
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Province</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="province"
                                            value="<?php echo $selctedname->province; ?>">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Region</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="region"
                                            value="<?php echo $selctedname->region; ?>">



                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Country</label>
                                    <div class="col-sm-8">


                                        <select class="custom-select" name="country">
                                            <?php
                                                    $query = "SELECT * FROM country";
                                                    $app = new App;
                                                    $countrys = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($countrys as $country): ?>
                                            <option value="<?php echo $country->id ?>">
                                                <?php echo $country->description ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Nationality</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="nationality">


                                            <?php
                                                    $query = "SELECT * FROM nationality";
                                                    $app = new App;
                                                    $nationalitys = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($nationalitys as $nationality): ?>
                                            <option value="<?php echo $nationality->id ?>">
                                                <?php echo $nationality->description ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Language</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" name="language"
                                            value="<?php echo $selctedname->language; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">VIP
                                        Type</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="vip">
                                            <?php
                                                    $query = "SELECT * FROM vip";
                                                    $app = new App;
                                                    $countrys = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($countrys as $vip): ?>
                                            <option value="<?php echo $vip->id ?>">
                                                <?php echo $vip->description ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Agent</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="agent">
                                            <?php
                                                    $query = "SELECT * FROM agent";
                                                    $app = new App;
                                                    $agents = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($agents as $agent): ?>
                                            <option value="<?php echo $agent->id ?>">
                                                <?php echo $agent->description ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-4 mb-3">
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Company</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="company">
                                            <?php
                                                    $query = "SELECT * FROM company";
                                                    $app = new App;
                                                    $companys = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($companys as $company): ?>
                                            <option value="<?php echo $company->id ?>">
                                                <?php echo $company->company ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Group</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="group">
                                            <?php
                                                    $query = "SELECT * FROM groups";
                                                    $app = new App;
                                                    $groups = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($groups as $group): ?>
                                            <option value="<?php echo $group->id ?>">
                                                <?php echo $group->description ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Passport/Other ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Member
                                        ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Senior
                                        ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">PWD
                                        ID</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.Room Details -->


                        <div class="col-md-6 mb-3">
                            <h4 class="mb-3 text-primary">Room Information --------------------------</h4>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Arrival</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control form-control-sm" name="checkindate"
                                            id="checkindate" onchange="countdays()" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Departure</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control form-control-sm" placeholder=""
                                            name="checkoutdate" id="checkoutdate" onchange="countdays()" required
                                            onclick="noOfDays">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Nights</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" placeholder=""
                                            name="noofnights" id="noofnights" readonly>



                                    </div>

                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No of
                                        Rooms</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control form-control-sm" name="noofrooms">
                                    </div>
                                </div>
                            </div>

                            <!-- checkindate
                            checkoutdate
                            noofnights -->
                            <script type="text/javascript">
                            function countdays() {
                                var dateend = new Date(document.getElementById("checkoutdate").value);
                                var datestart = new Date(document.getElementById("checkindate").value);

                                const weekday = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday",
                                    "saturday"
                                ];

                                const d = datestart;
                                let day = weekday[d.getDay()];
                                document.getElementById("demo").innerHTML = day;
                                document.getElementById("days").value = day; // Transfer to input box



                                var counttime = dateend.getTime() - datestart.getTime();
                                var countdays = counttime / (1000 * 3600 * 24);
                                document.getElementById("noofnights").setAttribute("value", isNaN(countdays) ? '' :
                                    countdays);

                            }
                            </script>

                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Adult</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control form-control-sm" name="adults">
                                    </div>

                                    <label for="colFormLabelSm"
                                        class="col-sm-2 col-form-label col-form-label-sm">Child</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control form-control-sm" name="kids">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">



                                <div class="form-group row">

                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Rate
                                        Code</label>
                                    <div class="col-sm-3">

                                        <form name="x" action="" method="GET">
                                            <select class="custom-select" name="ratecodeid" id="ratecodeid"
                                                onchange="this.form.submit();" required>

                                                <?php
                                                        if (isset($_GET['ratecodeid'])) {
                                                            echo $ratecodeid = $_GET['ratecodeid'];
                                                            $query = "SELECT * FROM ratecode where id=$ratecodeid";
                                                            $app = new App;
                                                            $sratecodeids = $app->selectAll($query);
                                                            foreach ($sratecodeids as $sratecodeid) {
                                                                echo ' <option value=' . $sratecodeid->id . '>' . $sratecodeid->code . '</option>';
                                                            }
                                                        } ?>

                                                <?php

                                                        $query = "SELECT * FROM ratecode";
                                                        $app = new App;
                                                        $ratecodes = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($ratecodes as $ratecode): ?>
                                                <option value="<?php echo $ratecode->id ?>">
                                                    <?php echo $ratecode->code ?>
                                                </option>
                                                <?php endforeach; ?>

                                            </select>
                                    </div>
                                    </form>

                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Room
                                        No</label>
                                    <div class="col-sm-3">


                                        <select class="custom-select" name="roomid" id="roomid">
                                            <?php require "roomnotype.php"; ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Room
                                        Type</label>
                                    <div class="col-sm-3">


                                        <form name="x" action="" method="GET">
                                            <!-- <input type="text" class="form-control form-control-sm" placeholder=""
                                                name="days" id="days"> -->
                                            <div style="display: none;" id="demo"></div>
                                            <input type="text" id="days" name="days" value='<?php if (isset($_GET['days'])) {
                                                        echo $days = $_GET['days'];
                                                    } ?>'>
                                            <input type="text" id="ratecodeid" name="ratecodeid" value=' 
                                             <?php if (isset($_GET['ratecodeid'])) {
                                                 echo $ratecodeid = $_GET['ratecodeid'];
                                             } ?> '>

                                            <select class="custom-select" name="roomtypeid" id="roomtypeid"
                                                onchange="this.form.submit();" required>

                                                <?php

                                                        if (isset($_GET['roomtypeid'])) {
                                                            echo $roomtypeid = $_GET['roomtypeid'];
                                                            $query = "SELECT * FROM roomtypes where id=$roomtypeid";
                                                            $app = new App;
                                                            $sroomtypes = $app->selectAll($query);
                                                            foreach ($sroomtypes as $sroomtype) {
                                                                echo ' <option value=' . $sroomtype->id . '>' . $sroomtype->code . '</option>';
                                                            }
                                                        }
                                                        ?>




                                                <?php
                                                        if (isset($_GET['ratecodeid'])) {
                                                            echo $ratecodeid = $_GET['ratecodeid'];
                                                            // echo ' <input type="hidden" id="ratecodeid" name="ratecodeid"   value=' . $ratecodeid . '>';
                                                            $query = "SELECT * FROM ratecodedetails where ratecodeid=$ratecodeid";
                                                            $app = new App;
                                                            $codesroomtypes = $app->selectAll($query);
                                                            foreach ($codesroomtypes as $codesroomtype) {
                                                                // echo ' <option value=' . $codesroomtype->roomtypeid . '>' . $codesroomtype->roomtypeid . '</option>';
                                                                $query = "SELECT * FROM roomtypes where id=$codesroomtype->roomtypeid";
                                                                $app = new App;
                                                                $sroomtypes = $app->selectAll($query);
                                                                foreach ($sroomtypes as $sroomtype) {


                                                                    echo ' <option value=' . $sroomtype->id . '>' . $sroomtype->code . '</option>';
                                                                }
                                                            }
                                                        }



                                                        ?>

                                            </select>
                                        </form>
                                    </div>
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Room
                                        Status</label>
                                    <div class="col-sm-3">
                                        <?php //require "roomnostatus.php"; ?>
                                    </div>
                                </div>
                            </div>





                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Rate
                                    </label>
                                    <div class="col-sm-8">

                                        <?php
                                                if (isset($_GET['roomtypeid'])) {
                                                    echo $ratecodeid = $_GET['ratecodeid'];
                                                    echo $roomtypeid = $_GET['roomtypeid'];
                                                    echo $days = $_GET['days'];
                                                    //   $query = "SELECT * FROM ratecodedetails where ratecodeid=$ratecodeid and roomtypeid=$roomtypeid and $days=$days";
                                                    //   $app = new App;
                                                    //   $srates = $app->selectAll($query);
                                                    //   foreach ($srates as $srate) {
                                                    //       echo $srate->$days;
                                                    //   }
                                                }
                                                ?>

                                        <input type="text" class="form-control form-control-sm" name="rate" id="rate"
                                            value="
                                             
                                                 
                                            ">


                                        <?php //require "ratecomputation.php"; ?>
                                    </div>
                                </div>
                            </div>





                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Package</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">No of
                                        Senior</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Block
                                        Code</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="blocked">
                                            <?php
                                                    $query = "SELECT * FROM blocked";
                                                    $app = new App;
                                                    $blockeds = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($blockeds as $blocked): ?>
                                            <option value="<?php echo $blocked->id ?>">
                                                <?php echo $blocked->blocked ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Curreny</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="currency">
                                            <?php
                                                    $query = "SELECT * FROM currency";
                                                    $app = new App;
                                                    $currencys = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($currencys as $currency): ?>
                                            <option value="<?php echo $currency->id ?>">
                                                <?php echo $currency->currency ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Check
                                        In Time</label>
                                    <div class="col-sm-8">
                                        <input type="time" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <style>
                                    .folio-button {
                                        display: flex;
                                        flex-direction: column;
                                        align-items: center;
                                        justify-content: center;
                                        padding: 20px 20px 5px 20px;
                                        margin: 5px;
                                        /* background-color: #c7c5c5; */
                                        width: 100%;
                                        border: 1px solid #c7c5c5;
                                        cursor: pointer;
                                        border-radius: 5px;
                                        height: 150px;
                                    }

                                    .folio-button img {
                                        max-width: 60%;
                                        max-height: 60%;
                                        margin-bottom: 5px;
                                    }

                                    .folio-txt {
                                        margin-top: 10px;
                                        text-decoration: none;
                                        width: 100%;

                                    }
                                    </style>
                                    <div class="col-sm-3">
                                        <a href="#1234" class="folio-txt">
                                            <button class="folio-button">
                                                <img src="bill.png" alt="Billing">
                                                <div class="folio-txt">Billing</div>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="#1234" class="folio-txt">
                                            <button class="folio-button">
                                                <img src="payment.png" alt="Payment">
                                                <div class="folio-txt">Payment</div>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="#1234" class="folio-txt">
                                            <button class="folio-button">
                                                <img src="registration.png" alt="Registration Card">
                                                <div class="folio-txt">Registration Card</div>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="#1234" class="folio-txt">
                                            <button class="folio-button">
                                                <img src="copy.png" alt="Copy Reservation">
                                                <div class="folio-txt">Copy Reservation</div>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <?php require "commentmodal.php"; ?>
                                <?php require "notemodal.php"; ?>
                                <?php require "accompanymodal.php"; ?>
                                <?php require "tracesmodal.php"; ?>
                                <?php require "alertmodal.php"; ?>
                                <?php require "wakeupcallmodal.php"; ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <?php require "routingmodal.php"; ?>
                                <?php require "changesmodal.php"; ?>
                                <?php require "roommovemodal.php"; ?>
                                <?php require "messagemodal.php"; ?>
                            </div>
                        </div>
                        <!-- /.Payment Details -->

                        <div class="col-md-6 mb-3">
                            <h4 class="mb-3 text-primary">Payment Information --------------------------
                            </h4>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Res
                                        Type</label>
                                    <div class="col-sm-3">
                                        <select class="custom-select" name="reservationtype">
                                            <?php
                                                    $query = "SELECT * FROM reservationtype";
                                                    $app = new App;
                                                    $reservationtypes = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($reservationtypes as $reservationtype): ?>
                                            <option value="<?php echo $reservationtype->id ?>">
                                                <?php echo $reservationtype->description ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Card
                                        Number</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Market</label>
                                    <div class="col-sm-3">
                                        <select class="custom-select" name="market">
                                            <?php
                                                    $query = "SELECT * FROM market";
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

                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Card
                                        Type</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Book
                                        By</label>
                                    <div class="col-sm-3">
                                        <select class="custom-select" name="agent">
                                            <?php
                                                    $query = "SELECT * FROM agent";
                                                    $app = new App;
                                                    $agents = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($agents as $agent): ?>
                                            <option value="<?php echo $agent->id ?>">
                                                <?php echo $agent->agent ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Exp
                                        Date</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Origin</label>
                                    <div class="col-sm-3">
                                        <select class="custom-select" name="origin">
                                            <?php
                                                    $query = "SELECT * FROM origin";
                                                    $app = new App;
                                                    $origins = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($origins as $origin): ?>
                                            <option value="<?php echo $origin->id ?>">
                                                <?php echo $origin->origin ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <label for="colFormLabelSm"
                                        class="col-sm-2 col-form-label col-form-label-sm">Dicount</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Payment
                                        Type</label>
                                    <div class="col-sm-3">
                                        <select class="custom-select" name="payments">
                                            <?php
                                                    $query = "SELECT * FROM payments";
                                                    $app = new App;
                                                    $paymentss = $app->selectAll($query);
                                                    ?>
                                            <?php foreach ($paymentss as $payments): ?>
                                            <option value="<?php echo $payments->id ?>">
                                                <?php echo $payments->description ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Option
                                        Date</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>


                            <h4 class="mb-3 text-primary">Meals Information --------------------------</h4>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-3 col-form-label col-form-label-sm">Breakfast
                                        :</label>
                                    <label for="colFormLabelSm"
                                        class="col-sm-2 col-form-label col-form-label-sm">Adult</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control form-control-sm" placeholder="">
                                    </div>
                                    <label for="colFormLabelSm"
                                        class="col-sm-2 col-form-label col-form-label-sm">Children</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Lunch
                                        :</label>
                                    <label for="colFormLabelSm"
                                        class="col-sm-2 col-form-label col-form-label-sm">Adult</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control form-control-sm" placeholder="">
                                    </div>
                                    <label for="colFormLabelSm"
                                        class="col-sm-2 col-form-label col-form-label-sm">Children</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Dinner
                                        :</label>
                                    <label for="colFormLabelSm"
                                        class="col-sm-2 col-form-label col-form-label-sm">Adult</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control form-control-sm" placeholder="">
                                    </div>
                                    <label for="colFormLabelSm"
                                        class="col-sm-2 col-form-label col-form-label-sm">Children</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <div class="form-group row">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center gx-0">
                                                <div class="col">

                                                    <!-- Title -->
                                                    <h6 class="text-uppercase text-body-secondary mb-2">
                                                        Running Balance --------------------------
                                                    </h6>

                                                    <!-- Heading -->


                                                    <?php
                                                            $currentdate = date("m-d-Y");
                                                            $query = "SELECT * FROM ratecode ";
                                                            $app = new App;
                                                            $ratecodes = $app->selectAll($query);



                                                            ?>



                                                    <table class="table table-striped " style="width:100%" id="history">

                                                        <thead>
                                                            <tr>

                                                                <th>Date</th>
                                                                <th>Day</th>
                                                                <th>Rate</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($ratecodes as $ratecode): ?>

                                                            <tr>
                                                                <td>February 20 2025</td>
                                                                <td>Thursday</td>
                                                                <td>7000</td>
                                                            </tr>


                                                            <?php endforeach; ?>
                                                        </tbody>

                                                        <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            $('#history').DataTable({



                                                            });



                                                        });


                                                        $('#history [data-toggle="tooltip"]').tooltip({
                                                            animated: 'fade',
                                                            placement: 'bottom',
                                                            html: true
                                                        });
                                                        </script>
                                                    </table>

                                                    <span class="h2 mb-0">
                                                        Total of : 24,500
                                                    </span>


                                                </div>

                                            </div> <!-- / .row -->
                                        </div>

                                    </div>

                                </div>
                                <!-- <p class="font-weight-bold">Bold text.</p> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.Payment Details -->
                </div>
            </div>

        </div>
        <div class="pb-5 pt-3">
            <button class="btn btn-primary" type="submit" name="Update">Update</button>
            <button class="btn btn-info" type="submit" name="checkin">Check In</button>
            <button class="btn btn-danger" type="submit" name="cancel">Cancel Transaction</button>

        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

<?php
    }
} ?>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>