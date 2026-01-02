<?php require "../../../header.php"; ?>
<?php require "../../../sidebar.php"; ?>

<?php if (isset($_GET['reservationid'])) {

    // $query = " SELECT MAX(reservationid) + 1 AS new_id FROM reservations";
    // $app = new App;
    // $new_id = $app->selectOne($query);
    // echo $new_id->new_id;

    echo $reservationid = $_GET['reservationid'];


    $query = "SELECT * FROM reservations where reservationid=$reservationid";
    $app = new App;
    $selectedreservations = $app->selectAll($query);
    foreach ($selectedreservations as $selectedreservation) {

        $query = "SELECT * FROM t_customerinfo where customerid=$selectedreservation->customerid";
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
                    <div class="m-2 flex text-center">
                        Test palang to

                        <?php if ($selectedreservation->status == "Reserve") { ?>
                        <button class="btn btn-primary" type="submit" name="update">Update</button>
                        <button class="btn btn-info" type="submit" name="checkin">Check In</button>
                        <button class="btn btn-danger" type="submit" name="cancel">Cancel Transaction</button>
                        <?php } elseif ($selectedreservation->status == "Checkin") { ?>
                        <button class="btn btn-primary" type="submit" name="update">Update Reservation</button>
                        <button class="btn btn-info" type="submit" name="checkout">Check Out</button>
                        <button class="btn btn-info" type="submit" name="reserve">Back to Reserve</button>
                        <?php } elseif ($selectedreservation->status == "Checkout") { ?>
                        <button class="btn btn-danger" type="submit" name="close">Close</button>
                        <button class="btn btn-info" type="submit" name="reserve">Back to Reserve</button>
                        <button class="btn btn-info" type="submit" name="checkin">Back to Check In</button>


                        <?php } ?>

                    </div>
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>Guest Reservation Info : Confirmation No :
                                <?php echo $selectedreservation->reservationid;
                                            echo " Status : ";
                                            echo $selectedreservation->status;
                                            ?>
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
                                            <input type="hidden" class="form-control form-control-sm" name="folioid"
                                                id="folioid"
                                                value="FO-<?php echo $selectedreservation->reservationid; ?>">
                                            <input type="hidden" class="form-control form-control-sm"
                                                name="reservationid" id="reservationid"
                                                value="<?php echo $selectedreservation->reservationid; ?>">
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
                                            <select class="custom-select form-control-sm" name="nationality"
                                                id="nationality">


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

                                                <?php if ($selctedname->viptype != null) {
                                                                $query = "SELECT * FROM vip where id=$selctedname->viptype";
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
                                                                $query = "SELECT * FROM vip";
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
                                            class="col-sm-3 col-form-label col-form-label-sm">Company
                                            <?php echo $selctedname->companyid ?></label>
                                        <div class="col-sm-8">
                                            <select class="custom-select form-control-sm" name="companyid"
                                                id="companyid">
                                                <option value=""> Select Company </option>
                                                <?php if ($selctedname->companyid != null) {
                                                                $query = "SELECT * FROM company where id=$selctedname->companyid";
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
                                                                $query = "SELECT * FROM company";
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
                                                                $query = "SELECT * FROM groups where id=$selctedname->groupid";
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
                                                                $query = "SELECT * FROM groups";
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

                                <h4 class="mb-3 text-primary">Room Information
                                    <?php echo $selectedreservation->status; ?>--------------------------
                                </h4>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Arrival</label>
                                        <div class="col-sm-8">

                                            <input type="date" class="form-control form-control-sm" id="checkindate"
                                                name="checkindate"
                                                <?php echo ($selectedreservation->status == "Checkin") ? "readonly" : ""; ?>
                                                value="<?php echo $selectedreservation->checkindate; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Departure</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control form-control-sm" id="checkoutdate"
                                                name="checkoutdate"
                                                <?php echo ($selectedreservation->status == "Checkin") ? "readonly" : ""; ?>
                                                value="<?php echo $selectedreservation->checkoutdate; ?>">
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Nights</label>
                                        <div class="col-sm-3">
                                            <input class="form-control form-control-sm" type="number" id="noofnights"
                                                name="noofnights"
                                                <?php echo ($selectedreservation->status == "Checkin") ? "readonly" : ""; ?>
                                                value="<?php echo $selectedreservation->noofnights ?>">
                                        </div>

                                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No
                                            of
                                            Rooms</label>
                                        <div class="col-sm-3">
                                            <input class="form-control form-control-sm" type="number" id="noofrooms"
                                                name="noofrooms" value="<?php echo $selectedreservation->noofrooms ?>">
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
                                            <input type="number" class="form-control form-control-sm" name="resadults"
                                                id="resadults" value="<?php echo $selectedreservation->adults ?>">
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Child</label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control form-control-sm" name="reskids"
                                                id="reskids" value="<?php echo $selectedreservation->kids ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 text-success font-italic">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-5 col-form-label col-form-label-sm ">If
                                            you want to update Rate Details Check this</label>
                                        <div class="col-sm-6  col-form-label col-form-label-sm ">
                                            <input class="form-check-input" type="checkbox" id="changeratecode"
                                                value="1" name="changeratecode" onclick="togglechangeratecode()"><label
                                                class="form-check-label">Change Rate Code & Room Details
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">

                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Rate
                                            Code</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" id="dratecodeid"
                                                name="ratecodeid" placeholder="Rate Code" readonly
                                                value=" <?php $query = "SELECT * FROM ratecode where id=$selectedreservation->ratecodeid";
                                                            $app = new App;
                                                            $ratecodes = $app->selectAll($query);
                                                            ?><?php foreach ($ratecodes as $ratecode): ?><?php echo $ratecode->code ?><?php endforeach; ?>">

                                            <select class=" custom-select form-control-sm" id="ratecodeid"
                                                name="ratecodeid" style="display: none;">
                                                <?php
                                                            $query = "SELECT * FROM ratecode where id=$selectedreservation->ratecodeid";
                                                            $app = new App;
                                                            $ratecodes = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($ratecodes as $ratecode): ?>
                                                <option value=" <?php echo $ratecode->id ?>">
                                                    <?php echo $ratecode->code ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>


                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Room
                                            No</label>
                                        <div class="col-sm-3">

                                            <input type="text" class="form-control form-control-sm" id="droomnumber"
                                                name="droomnumber" placeholder="Rate Code"
                                                value="<?php echo $selectedreservation->roomnumber ?>" readonly>
                                            <select class="custom-select form-control-sm" id="roomnumber"
                                                name="roomnumber" style="display: none;">
                                                <option value="<?php echo $selectedreservation->roomnumber ?>">
                                                    <?php echo $selectedreservation->roomnumber ?>
                                                </option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Room
                                            Type</label>
                                        <div class="col-sm-3">

                                            <input type="text" class="form-control form-control-sm" id="droomtypeid"
                                                name="droomtypeid" placeholder="Room Type" readonly
                                                value=" <?php $query = "SELECT * FROM roomtypes where id=$selectedreservation->roomtypeid";
                                                            $app = new App;
                                                            $roomtypes = $app->selectAll($query);
                                                            ?><?php foreach ($roomtypes as $roomtype): ?><?php echo $roomtype->code ?><?php endforeach; ?>">




                                            <select class="custom-select form-control-sm" id="roomtypeid"
                                                name="roomtypeid" style="display: none;">
                                                <?php
                                                            $query = "SELECT * FROM roomtypes where id=$selectedreservation->roomtypeid";
                                                            $app = new App;
                                                            $roomtypes = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($roomtypes as $roomtype): ?>
                                                <option value=" <?php echo $roomtype->id ?>">
                                                    <?php echo $roomtype->code ?>
                                                </option>
                                                <?php endforeach; ?>

                                            </select>

                                        </div>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Room
                                            Status</label>

                                        <div class="col-sm-3">

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
                                                name="rate" placeholder="Rate" readonly
                                                value="<?php echo $selectedreservation->rate ?>">

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
                                                name="packageid" value="<?php echo $selectedreservation->kids ?>">
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
                                                id="noofsenior" value="<?php echo $selectedreservation->noofsenior ?>">
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
                                                            $query = "SELECT * FROM blocked where id=$selectedreservation->blockecodeid";
                                                            $app = new App;
                                                            $blockeds = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($blockeds as $blocked): ?>
                                                <option value="<?php echo $blocked->id ?>">
                                                    <?php echo $blocked->blocked ?>
                                                </option>
                                                <?php endforeach; ?>

                                                <?php
                                                            $query = "SELECT * FROM blocked";
                                                            $app = new App;
                                                            $cblockeds = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($cblockeds as $cblocked): ?>
                                                <option value="<?php echo $cblocked->id ?>">
                                                    <?php echo $cblocked->blocked ?>
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
                                                            $query = "SELECT * FROM currency where id=$selectedreservation->currencyid";
                                                            $app = new App;
                                                            $currencys = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($currencys as $currency): ?>
                                                <option value="<?php echo $currency->id ?>">
                                                    <?php echo $currency->currency ?>
                                                </option>
                                                <?php endforeach; ?>



                                                <?php
                                                            $query = "SELECT * FROM currency";
                                                            $app = new App;
                                                            $ccurrencys = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($ccurrencys as $ccurrency): ?>
                                                <option value="<?php echo $ccurrency->id ?>">
                                                    <?php echo $ccurrency->currency ?>
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
                                            <input type="time" class="form-control form-control-sm" name="eta" id="eta"
                                                value="<?php echo $selectedreservation->eta ?>">
                                        </div>


                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">ETD</label>
                                        <div class="col-sm-3">
                                            <input type="time" class="form-control form-control-sm" name="etd" id="etd"
                                                value="<?php echo $selectedreservation->etd ?>">
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
                                                            $query = "SELECT * FROM reservationtype where id=$selectedreservation->reservationtype";
                                                            $app = new App;
                                                            $reservationtypes = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($reservationtypes as $reservationtype): ?>
                                                <option value="<?php echo $reservationtype->id ?>">
                                                    <?php echo $reservationtype->description ?>
                                                </option>
                                                <?php endforeach; ?>

                                                <?php
                                                            $query = "SELECT * FROM reservationtype";
                                                            $app = new App;
                                                            $creservationtypes = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($creservationtypes as $creservationtype): ?>
                                                <option value="<?php echo $creservationtype->id ?>">
                                                    <?php echo $creservationtype->description ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Card
                                            Number</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="cardnumber"
                                                id="cardnumber" value="<?php echo $selectedreservation->cardnumber ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Market</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select form-control-sm" name="marketid" id="marketid">

                                                <?php
                                                            $query = "SELECT * FROM market where id=$selectedreservation->marketid";
                                                            $app = new App;
                                                            $markets = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($markets as $market): ?>
                                                <option value="<?php echo $market->id ?>">
                                                    <?php echo $market->market ?>
                                                </option>
                                                <?php endforeach; ?>

                                                <?php
                                                            $query = "SELECT * FROM market";
                                                            $app = new App;
                                                            $cmarkets = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($cmarkets as $cmarket): ?>
                                                <option value="<?php echo $cmarket->id ?>">
                                                    <?php echo $cmarket->market ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Card
                                            Type</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="cardtype"
                                                id="cardtype" value="<?php echo $selectedreservation->cardtype ?>">
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

                                                <?php
                                                            $query = "SELECT * FROM agent where id=$selectedreservation->agentid";
                                                            $app = new App;
                                                            $agents = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($agents as $agent): ?>
                                                <option value="<?php echo $agent->id ?>">
                                                    <?php echo $agent->agent ?>
                                                </option>
                                                <?php endforeach; ?>

                                                <?php
                                                            $query = "SELECT * FROM agent";
                                                            $app = new App;
                                                            $cagents = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($cagents as $cagent): ?>
                                                <option value="<?php echo $cagent->id ?>">
                                                    <?php echo $cagent->agent ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Exp
                                            Date</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="expdate"
                                                id="expdate" value="<?php echo $selectedreservation->expdate ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Origin</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select form-control-sm" name="originid" id="originid">

                                                <?php
                                                            $query = "SELECT * FROM origin where id=$selectedreservation->originid";
                                                            $app = new App;
                                                            $origins = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($origins as $origin): ?>
                                                <option value="<?php echo $origin->id ?>">
                                                    <?php echo $origin->origin ?>
                                                </option>
                                                <?php endforeach; ?>

                                                <?php
                                                            $query = "SELECT * FROM origin";
                                                            $app = new App;
                                                            $corigins = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($corigins as $corigin): ?>
                                                <option value="<?php echo $corigin->id ?>">
                                                    <?php echo $corigin->origin ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Dicount</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="discount"
                                                id="discount" value="<?php echo $selectedreservation->discount ?>">
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

                                                <?php
                                                            $query = "SELECT * FROM payments where id=$selectedreservation->paymenttypeid";
                                                            $app = new App;
                                                            $paymentss = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($paymentss as $payments): ?>
                                                <option value="<?php echo $payments->id ?>">
                                                    <?php echo $payments->description ?>
                                                </option>
                                                <?php endforeach; ?>

                                                <?php
                                                            $query = "SELECT * FROM payments";
                                                            $app = new App;
                                                            $cpaymentss = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($cpaymentss as $cpayments): ?>
                                                <option value="<?php echo $cpayments->id ?>">
                                                    <?php echo $cpayments->description ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Option
                                            Date</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="optiondate"
                                                id="optiondate" value="<?php echo $selectedreservation->optiondate ?>">
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



                                                <?php
                                                            $query = "SELECT * FROM source where id=$selectedreservation->sourceid";
                                                            $app = new App;
                                                            $sourcess = $app->selectAll($query);
                                                            ?>
                                                <?php foreach ($sourcess as $sources): ?>
                                                <option value="<?php echo $sources->id ?>">
                                                    <?php echo $sources->description ?>
                                                </option>
                                                <?php endforeach; ?>

                                                <?php
                                                            $query = "SELECT * FROM source";
                                                            $app = new App;
                                                            $csourcess = $app->selectAll($query);
                                                            ?>

                                                <?php foreach ($csourcess as $csources): ?>
                                                <option value="<?php echo $csources->id ?>">
                                                    <?php echo $csources->description ?>
                                                </option>
                                                <?php endforeach;
                                                            ?>

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
                                                id="badult" value="<?php echo $selectedreservation->badult ?>">
                                        </div>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Children</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control form-control-sm" name="bkids"
                                                id="bkids" value="<?php echo $selectedreservation->bkids ?>">
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
                                                id="ladult" value="<?php echo $selectedreservation->ladult ?>">
                                        </div>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Children</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control form-control-sm" name="lkids"
                                                id="lkids" value="<?php echo $selectedreservation->lkids ?>">
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
                                                id="dadult" value="<?php echo $selectedreservation->dadult ?>">
                                        </div>
                                        <label for="colFormLabelSm"
                                            class="col-sm-2 col-form-label col-form-label-sm">Children</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control form-control-sm" name="dkids"
                                                id="dkids" value="<?php echo $selectedreservation->dkids ?>">
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
                                                <a href="guestbilling.php?id=<?php echo $reservationid; ?>"
                                                    class="folio-txt">
                                                    <div class="folio-button">
                                                        <img src="<?php echo APPURL; ?>img/bill.png" alt="Billing">
                                                        <div class="folio-txt">Billing</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="folio-div">
                                                <a data-bs-toggle="modal" data-bs-target="#paymentmodal"
                                                    class="folio-txt">
                                                    <div class="folio-button">
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
<?php } ?>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>