<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>

<?php if (isset($_GET['select'])) {

    $query = " SELECT MAX(reservationid) + 1 AS new_id FROM hmsreservations";
    $app = new App;
    $new_id = $app->selectOne($query);
    echo $new_id->new_id;

    echo $select = $_GET['select'];
    $query = "SELECT * FROM hmst_customerinfo where customerid=$select";
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
        <form name="save" action="savereservation.php" method="POST">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>Guest Reservation Info : Confirmation No: <?php echo $new_id->new_id; ?>
                        </h1>
                    </div>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <!-- /.Personal Details -->

                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">Perosnal Information
                                    <?php echo $selctedname->customerid; ?>
                                    <h4>
                            </div>

                            <div class="col-md-4 mb-3 ">
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Last
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="folioid"
                                                id="folioid" value="FO-<?php echo $new_id->new_id; ?>">
                                            <input type="text" class="form-control form-control-sm" name="lastname"
                                                id="lastname" value="<?php echo $selctedname->lastname; ?>">
                                            <input type="hidden" class="form-control form-control-sm" name="customerid"
                                                id="customerid" value="<?php echo $selctedname->customerid; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">First
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="firstname"
                                                id="firstname" value="<?php echo $selctedname->firstname; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-4 col-form-label col-form-label-sm">Middle
                                            Name / Title</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control form-control-sm" name="middlename"
                                                id="middlename" value="<?php echo $selctedname->middlename; ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="tittle"
                                                id="tittle" value="<?php echo $selctedname->tittle; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Phone
                                            No. 1</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control form-control-sm" name="number1"
                                                id="number1" value="<?php echo $selctedname->number1; ?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control form-control-sm" name="number2"
                                                id="number2" value="<?php echo $selctedname->number2; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Email
                                            1</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="email1"
                                                id="email1" value="<?php echo $selctedname->email1; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="address"
                                                id="address" value="<?php echo $selctedname->address; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">City</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="city"
                                                id="city" value="<?php echo $selctedname->city; ?>">
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
                                                id="province" value="<?php echo $selctedname->province; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Region</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="region"
                                                id="region" value="<?php echo $selctedname->region; ?>">



                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Country</label>
                                        <div class="col-sm-8">


                                            <select class="custom-select form-control-sm" name="country" id="country">
                                                <?php
                                                        $query = "SELECT * FROM hmscountry";
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
                                            <select class="custom-select form-control-sm" name="nationality"
                                                id="nationality">


                                                <?php
                                                        $query = "SELECT * FROM hmsnationality";
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
                                                id="language" value="<?php echo $selctedname->language; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">VIP
                                            Type </label>
                                        <div class="col-sm-8">
                                            <select class="custom-select form-control-sm" name="vip" id="vip">

                                                <?php
                                                        if ($selctedname->viptype != null) {
                                                            $query = "SELECT * FROM hmsvip where id=$selctedname->viptype";
                                                            $app = new App;
                                                            $vips = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($vips as $vip): ?>
                                                <option value="<?php echo $vip->id ?>">
                                                    <?php echo $vip->description ?>
                                                </option>
                                                <?php endforeach;
                                                        } else { ?>

                                                <?php
                                                            $query = "SELECT * FROM hmsvip";
                                                            $app = new App;
                                                            $cvips = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($cvips as $cvip): ?>
                                                <option value="<?php echo $cvip->id ?>">
                                                    <?php echo $cvip->description ?>
                                                </option>
                                                <?php endforeach;
                                                        } ?>
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
                                            <select class="custom-select form-control-sm" name="companyid"
                                                id="companyid">
                                                <option value=""> Select Company </option>

                                                <?php if ($selctedname->companyid != null) {
                                                            $query = "SELECT * FROM hmscompany where id=$selctedname->companyid";
                                                            $app = new App;
                                                            $companys = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($companys as $company): ?>
                                                <option value="<?php echo $company->id ?>">
                                                    <?php echo $company->company ?>
                                                </option>
                                                <?php endforeach;
                                                        } else { ?>

                                                <?php
                                                            $query = "SELECT * FROM hmscompany";
                                                            $app = new App;
                                                            $ccompanys = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($ccompanys as $ccompany): ?>
                                                <option value="<?php echo $ccompany->id ?>">
                                                    <?php echo $ccompany->company ?>
                                                </option>
                                                <?php endforeach;
                                                        } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Group</label>

                                        <div class="col-sm-8">
                                            <select class="custom-select form-control-sm" id="groupid" name="groupid">
                                                <option value=""> Select Group </option>

                                                <?php if ($selctedname->groupid != null) {
                                                            $query = "SELECT * FROM hmsgroups where id=$selctedname->groupid";
                                                            $app = new App;
                                                            $groups = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($groups as $group): ?>
                                                <option value="<?php echo $group->id ?>">
                                                    <?php echo $group->description ?>
                                                </option>
                                                <?php endforeach;
                                                        } else { ?>

                                                <?php
                                                            $query = "SELECT * FROM hmsgroups";
                                                            $app = new App;
                                                            $cgroups = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($cgroups as $cgroup): ?>
                                                <option value="<?php echo $cgroup->id ?>">
                                                    <?php echo $cgroup->description ?>
                                                </option>
                                                <?php endforeach;
                                                        } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Passport/Other ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="passportid"
                                                name="passportid" value="<?php echo $selctedname->passportid; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Member
                                            ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="memberid"
                                                name="memberid" value="<?php echo $selctedname->membersid; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Senior
                                            ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="seniorid"
                                                name="seniorid" value="<?php echo $selctedname->seniorid; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">PWD
                                            ID</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="pwdid"
                                                name="pwdid" value="<?php echo $selctedname->pwdid; ?>">
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

                                            <input type="date" class="form-control form-control-sm" id="checkindate"
                                                name="checkindate" value="<?php echo $checkindate ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Departure</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control form-control-sm" id="checkoutdate"
                                                name="checkoutdate" value="<?php echo $checkoutdate ?>">
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Nights</label>
                                        <div class="col-sm-3">
                                            <input class="form-control form-control-sm" type="number" id="noofnights"
                                                name="noofnights">
                                        </div>

                                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No
                                            of
                                            Rooms</label>
                                        <div class="col-sm-3">
                                            <input class="form-control form-control-sm" type="number" id="noofrooms"
                                                name="noofrooms">
                                        </div>
                                    </div>
                                </div>

                                <!-- checkindate
                            checkoutdate
                            noofnights -->


                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Adult</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control form-control-sm" name="adults"
                                                id="adults">
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Child</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control form-control-sm" name="kids"
                                                id="kids">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">

                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Rate
                                            Code</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select form-control-sm" id="ratecodeid"
                                                name="ratecodeid"></select>

                                        </div>


                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Room
                                            No</label>
                                        <div class="col-sm-3">


                                            <select class="custom-select form-control-sm" id="roomnumber"
                                                name="roomnumber"></select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Type</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select form-control-sm" id="roomtypeid"
                                                name="roomtypeid"></select>

                                        </div>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Room
                                            Status</label>
                                        <div class="col-sm-3">
                                            <?php //require "roomnostatus.php"; ?>
                                        </div>
                                    </div>
                                </div>





                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Rate
                                        </label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control form-control-sm" id="rate"
                                                name="rate" placeholder="Rate" readonly>

                                            <input type="number" class="form-control form-control-sm" id="manurate"
                                                name="manurate" placeholder="Manual Rate" style="display: none;">

                                        </div>

                                        <div class="col-md-4">
                                            <input class="form-check-input" type="checkbox" id="manualrate" value="1"
                                                name="manualrate" onclick="togglemanualrate()"><label
                                                class="form-check-label">Manual Rate
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Package</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="packageid"
                                                name="packageid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">No
                                            of
                                            Senior</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="noofsenior"
                                                id="noofsenior">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Block
                                            Code</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select form-control-sm" name="blockecodeid"
                                                id="blockecodeid">
                                                <?php
                                                        $query = "SELECT * FROM hmsblocked";
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
                                            <select class="custom-select form-control-sm" name="currencyid"
                                                id="currencyid">
                                                <?php
                                                        $query = "SELECT * FROM hmscurrency";
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
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">ETA</label>
                                        <div class="col-sm-3">
                                            <input type="time" class="form-control form-control-sm" name="eta" id="eta">
                                        </div>


                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">ETD</label>
                                        <div class="col-sm-3">
                                            <input type="time" class="form-control form-control-sm" name="etd" id="etd">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.Payment Details -->

                            <div class="col-md-6 mb-3">
                                <h4 class="mb-3 text-primary">Payment Information --------------------------
                                </h4>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Res
                                            Type</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select form-control-sm" name="reservationtype"
                                                id="reservationtype">
                                                <?php
                                                        $query = "SELECT * FROM hmsreservationtype";
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

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Card
                                            Number</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="cardnumber"
                                                id="cardnumber">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Market</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select form-control-sm" name="marketid" id="marketid">
                                                <option value=""> Select Market </option>
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

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Card
                                            Type</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="cardtype"
                                                id="cardtype">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Book
                                            By</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select form-control-sm" name="agentid" id="agentid">
                                                <option value=""> Select Agent </option>
                                                <?php
                                                        $query = "SELECT * FROM hmsagent";
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

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Exp
                                            Date</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="expdate"
                                                id="expdate">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Origin</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select form-control-sm" name="originid" id="originid">
                                                <option value=""> Select Origin </option>
                                                <?php
                                                        $query = "SELECT * FROM hmsorigin";
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
                                            <input type="text" class="form-control form-control-sm" name="discount"
                                                id="discount">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Payment
                                            Type</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select form-control-sm" name="paymenttypeid"
                                                id="paymenttypeid">
                                                <option value=""> Select Payment Type </option>
                                                <?php
                                                        $query = "SELECT * FROM hmspayments";
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
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Option
                                            Date</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="optiondate"
                                                id="optiondate">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Source
                                        </label>
                                        <div class="col-sm-3">
                                            <select class="custom-select form-control-sm" name="sourceid" id="sourceid">
                                                <option value=""> Select Source </option>
                                                <?php
                                                        $query = "SELECT * FROM hmssource";
                                                        $app = new App;
                                                        $sourcess = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($sourcess as $sources): ?>
                                                <option value="<?php echo $sources->id ?>">
                                                    <?php echo $sources->description ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
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
                                            <input type="number" class="form-control form-control-sm" name="badult"
                                                id="badult">
                                        </div>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Children</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control form-control-sm" name="bkids"
                                                id="bkids">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Lunch
                                            :</label>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Adult</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control form-control-sm" name="ladult"
                                                id="ladult">
                                        </div>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Children</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control form-control-sm" name="lkids"
                                                id="lkids">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Dinner
                                            :</label>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Adult</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control form-control-sm" name="dadult"
                                                id="dadult">
                                        </div>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Children</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control form-control-sm" name="dkids"
                                                id="dkids">
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
                                                            Running Balance : <span class="h5 mb-0">
                                                                24,500
                                                            </span>
                                                        </h6>




                                                    </div>

                                                </div> <!-- / .row -->
                                            </div>

                                        </div>

                                    </div>
                                    <!-- <p class="font-weight-bold">Bold text.</p> -->
                                </div>
                            </div>
                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-10 mb-3">
                                        <div class="form-group row">
                                            <style>
                                            .folio-button {
                                                display: flex;
                                                flex-direction: column;
                                                align-items: center;
                                                justify-content: center;
                                                padding: 20px 20px 5px 20px;
                                                background-color: #f2f2f2;
                                                margin: 5px;
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

                                            .folio-div {
                                                width: 12.5%;

                                            }

                                            .folio-txt {
                                                margin-top: 10px;
                                                text-decoration: none;
                                                width: 100%;
                                                text-align: center;
                                            }
                                            </style>
                                            <div class="folio-div">
                                                <a href="guestbilling.php?reservationid=<?php echo $reservationid; ?>"
                                                    class="folio-txt">
                                                    <div class="folio-button">
                                                        <img src="<?php echo APPURL; ?>img/bill.png" alt="Billing">
                                                        <div class="folio-txt">Billing</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="folio-div text-primary">
                                                <a data-bs-toggle="modal" data-bs-target="#paymentmodal"
                                                    class="folio-txt">
                                                    <div class="folio-button bg-primary">
                                                        <img src="<?php echo APPURL; ?>img/payment.png" alt="Payment">
                                                        <div class="folio-txt">Payment</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="folio-div text-primary">
                                                <a href="regscard-print.php?reservationid=<?php echo $reservationid; ?>"
                                                    class="folio-txt">
                                                    <div class="folio-button bg-primary">
                                                        <img src="<?php echo APPURL; ?>img/registration.png"
                                                            alt="Registration Card">
                                                        <div class="folio-txt">Registration Card</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="folio-div">
                                                <a href="copyreservation.php?id=<?php echo $reservationid; ?>"
                                                    class="folio-txt">
                                                    <div class="folio-button">
                                                        <img src="<?php echo APPURL; ?>img/copy.png"
                                                            alt="Copy Reservation">
                                                        <div class="folio-txt">Copy Reservation</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="folio-div">
                                                <a data-bs-toggle="modal" data-bs-target="#routmodal" class="folio-txt">
                                                    <div class="folio-button">
                                                        <img src="<?php echo APPURL; ?>img/route.png"
                                                            alt="Copy Reservation">
                                                        <div class="folio-txt">Routing</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="folio-div">
                                                <a data-bs-toggle="modal" data-bs-target="#changesmodal"
                                                    class="folio-txt">
                                                    <div class="folio-button">
                                                        <img src="<?php echo APPURL; ?>img/change.png"
                                                            alt="Copy Reservation">
                                                        <div class="folio-txt">Changes</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="folio-div">
                                                <a data-bs-toggle="modal" data-bs-target="#roommovemodal"
                                                    class="folio-txt">
                                                    <div class="folio-button">
                                                        <img src="<?php echo APPURL; ?>img/move.png"
                                                            alt="Copy Reservation">
                                                        <div class="folio-txt">Move</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="folio-div">
                                                <a data-bs-toggle="modal" data-bs-target="#tracesmodal"
                                                    class="folio-txt">
                                                    <div class="folio-button">
                                                        <img src="<?php echo APPURL; ?>img/tracking.png"
                                                            alt="Copy Reservation">
                                                        <div class="folio-txt">Traces</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

        </form>
        <div class="col-md-8 mb-3">
            <!-- <form name="savecomment" action="executemodal.php" method="POST"> -->
            <?php require "commentmodal.php"; ?>
            <?php require "notemodal.php"; ?>
            <?php require "accompanymodal.php"; ?>
            <?php require "messagemodal.php"; ?>
            <?php require "alertmodal.php"; ?>
            <?php require "wakeupcallmodal.php"; ?>
            <!-- </form> -->
        </div>
        <div class="col-md-8 mb-3">
            <?php require "routingmodal.php"; ?>
            <?php require "changesmodal.php"; ?>
            <?php require "roommovemodal.php"; ?>
            <?php require "paymentmodal.php"; ?>
            <?php require "tracesmodal.php"; ?>

        </div>

</div>
</div>
</div>
<!-- /.Payment Details -->
</div>
</div>

</div>

<!-- /.card -->

</section>
<script src="script.js"></script>
<!-- /.content -->
</div>

<?php } ?>
<?php } ?>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>