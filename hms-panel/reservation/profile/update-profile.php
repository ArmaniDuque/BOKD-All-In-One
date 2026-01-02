<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>

<?php
if (isset($_GET['edit'])) {
    echo $customerid = $_GET['edit'];
    $query = "SELECT * FROM hmst_customerinfo where customerid=$customerid";
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
                        <?php require "../navbar.php"; ?>
                        <?php require "navbar.php"; ?>


                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->


            <section class="content">
                <!-- Default box -->
                <form class="row" method="POST" action="update-profileexec.php">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header pt-3">
                                <h1 class="h5 mb-3"><b>Guest Profile</h1>
                            </div>
                            <!-- /.BODY -->
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <h4 class="mb-3 text-primary">Perosnal Information --------------------------</h4>

                                        <div class="form-row">
                                            <div class="col-md-1 mb-3">

                                                <label for="validationCustom01">Sequence #</label>
                                                <input type="hidden" class="form-control" id="validationCustom01"
                                                    placeholder="First name" name="customerid"
                                                    value="<?php echo $selctedname->customerid; ?>">
                                                <input type="text" class="form-control" id="validationCustom01"
                                                    placeholder="First name" name="sequenceid"
                                                    value="<?php echo $selctedname->sequenceid; ?>" readonly>

                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom01">First name</label>
                                                <input type="text" class="form-control" id="validationCustom01"
                                                    placeholder="First name" name="firstname"
                                                    value="<?php echo $selctedname->firstname; ?>">

                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom02">Last name</label>
                                                <input type="text" class="form-control" id="validationCustom02" name="lastname"
                                                    value="<?php echo $selctedname->lastname; ?>">

                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustomUsername">Middle Name</label>
                                                <div class="input-group">

                                                    <input type="text" class="form-control" id="validationCustomUsername"
                                                        name="middlename" value="<?php echo $selctedname->middlename; ?>"
                                                        aria-describedby="inputGroupPrepend">

                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-3">
                                                <label for="validationCustom01">Title</label>

                                                <select class="custom-select" name="tittle">


                                                    <option value="<?php echo $selctedname->tittle; ?>">
                                                        <?php echo $selctedname->tittle; ?>
                                                    </option>


                                                    <?php
                                                    $query = "SELECT * FROM hmstitle ";
                                                    $app = new App;
                                                    $tittles = $app->selectAll($query);
                                                    foreach ($tittles as $tittle) {
                                                        echo ' <option value=' . $tittle->id . '';
                                                        if ($selctedname->tittle == $tittle->title) {
                                                            echo "selected";
                                                        }
                                                        ;
                                                        echo ' >' . $tittle->title . '</option>';

                                                        // echo ' <option value="' . $tittle->id . '">' . $tittle->title . '</option>';
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustomUsername">Nick Name</label>
                                                <div class="input-group">

                                                    <input type="text" class="form-control" id="validationCustomUsername"
                                                        name="nickname" value="<?php echo $selctedname->nickname; ?>"
                                                        aria-describedby="inputGroupPrepend">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom01">Birthday</label>
                                                <input type="date" class="form-control" id="validationCustom01" name="birthday"
                                                    value="<?php echo $selctedname->birthday; ?>">

                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom01">Gender</label>

                                                <select class="custom-select" name="gender">
                                                    <option value=" <?php echo $selctedname->gender; ?>">
                                                        <?php echo $selctedname->gender; ?>
                                                    </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Not Speciped">Not Speciped</option>

                                                </select>

                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom01">Religion</label>

                                                <input type="text" class="form-control" id="validationCustom01" name="religion"
                                                    value=" <?php echo $selctedname->religion; ?>">

                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom01">Nationality</label>

                                                <select class="custom-select" name="nationality">
                                                    <option value="<?php echo $selctedname->nationality; ?>">
                                                        <?php echo $selctedname->nationality; ?>
                                                    </option>
                                                    <?php
                                                    $query = "SELECT * FROM hmsnationality ";
                                                    $app = new App;
                                                    $nationalitys = $app->selectAll($query);
                                                    foreach ($nationalitys as $nationality) {
                                                        echo ' <option value=' . $nationality->id . '';
                                                        if ($selctedname->nationality == $nationality->nationality) {
                                                            echo "selected";
                                                        }
                                                        ;
                                                        echo ' >' . $nationality->nationality . '</option>';

                                                        // echo ' <option value="' . $nationality->id . '">' . $nationality->title . '</option>';
                                                    }
                                                    ?>


                                                    <!-- <option value="African">African</option>
                                        <option value="Algerian">Algerian</option>
                                        <option value="Angolan">Angolan</option>
                                        <option value="Beninese">Beninese</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Cameroonian">Cameroonian</option>
                                        <option value="Egyptian">Egyptian</option>
                                        <option value="Ethiopian">Ethiopian</option>
                                        <option value="Ghanaian">Ghanaian</option>
                                        <option value="Kenyan">Kenyan</option>
                                        <option value="Liberian">Liberian</option>
                                        <option value="Moroccan">Moroccan</option>
                                        <option value="Nigerian">Nigerian</option>
                                        <option value="South African">South African</option>
                                        <option value="Sudanese">Sudanese</option>
                                        <option value="Tunisian">Tunisian</option>
                                        <option value="Ugandan">Ugandan</option>
                                        <option value="Zambian">Zambian</option>
                                        <option value="Zimbabwean">Zimbabwean</option>
                                        <option value="American">American</option>
                                        <option value="American (United States)">American (United States)</option>
                                        <option value="Argentinian">Argentinian</option>
                                        <option value="Brazilian">Brazilian</option>
                                        <option value="Canadian">Canadian</option>
                                        <option value="Chilean">Chilean</option>
                                        <option value="Colombian">Colombian</option>
                                        <option value="Cuban">Cuban</option>
                                        <option value="Mexican">Mexican</option>
                                        <option value="Peruvian">Peruvian</option>
                                        <option value="Venezuelan">Venezuelan</option>
                                        <option value="Asian">Asian</option>
                                        <option value="Afghan">Afghan</option>
                                        <option value="Bangladeshi">Bangladeshi</option>
                                        <option value="Chinese">Chinese</option>
                                        <option value="Indian">Indian</option>
                                        <option value="Indonesian">Indonesian</option>
                                        <option value="Iranian">Iranian</option>
                                        <option value="Iraqi">Iraqi</option>
                                        <option value="Japanese">Japanese</option>
                                        <option value="Kazakh">Kazakh</option>
                                        <option value="Korean">Korean</option>
                                        <option value="Malaysian">Malaysian</option>
                                        <option value="Pakistani">Pakistani</option>
                                        <option value="Philippine">Philippine</option>
                                        <option value="Singaporean">Singaporean</option>
                                        <option value="Sri Lankan">Sri Lankan</option>
                                        <option value="Thai">Thai</option>
                                        <option value="Vietnamese">Vietnamese</option>
                                        <option value="European">European</option>
                                        <option value="Albanian">Albanian</option>
                                        <option value="Austrian">Austrian</option>
                                        <option value="Belgian">Belgian</option>
                                        <option value="British">British</option>
                                        <option value="Croatian">Croatian</option>
                                        <option value="Czech">Czech</option>
                                        <option value="Danish">Danish</option>
                                        <option value="Dutch">Dutch</option>
                                        <option value="Finnish">Finnish</option>
                                        <option value="French">French</option>
                                        <option value="German">German</option>
                                        <option value="Greek">Greek</option>
                                        <option value="Hungarian">Hungarian</option>
                                        <option value="Irish">Irish</option>
                                        <option value="Italian">Italian</option>
                                        <option value="Norwegian">Norwegian</option>
                                        <option value="Polish">Polish</option>
                                        <option value="Portuguese">Portuguese</option>
                                        <option value="Romanian">Romanian</option>
                                        <option value="Russian">Russian</option>
                                        <option value="Spanish">Spanish</option>
                                        <option value="Swedish">Swedish</option>
                                        <option value="Swiss">Swiss</option>
                                        <option value="Ukrainian">Ukrainian</option>
                                        <option value="Oceanian">Oceanian</option>
                                        <option value="Australian">Australian</option>
                                        <option value="Fijian">Fijian</option>
                                        <option value="New Zealander">New Zealander</option> -->

                                                </select>

                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom01">Language</label>

                                                <select class="custom-select" name="language">
                                                    <option value="<?php echo $selctedname->language; ?>">
                                                        <?php echo $selctedname->language; ?>
                                                    </option>
                                                    <option value="English">English</option>
                                                    <option value="Tagalog">Tagalog</option>
                                                    <option value="Spanish">Spanish</option>
                                                    <option value="French">French</option>
                                                    <option value="German">German</option>
                                                    <option value="Portuguese">Portuguese</option>
                                                    <option value="Italian">Italian</option>
                                                    <option value="Chinese">Chinese</option>
                                                    <option value="Japanese">Japanese</option>
                                                    <option value="Korean">Korean</option>
                                                    <option value="Russian">Russian</option>
                                                    <option value="Arabic">Arabic</option>
                                                    <option value="Hindi">Hindi</option>
                                                    <option value="Bengali">Bengali</option>
                                                    <option value="Portuguese">Portuguese</option>
                                                    <option value="Indonesian">Indonesian</option>
                                                    <option value="Malay">Malay</option>
                                                    <option value="Tamil">Tamil</option>
                                                    <option value="Telugu">Telugu</option>
                                                    <option value="Marathi">Marathi</option>
                                                    <option value="Latin">Latin</option>
                                                    <option value="Greek">Greek</option>

                                                </select>

                                            </div>



                                        </div>



                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Address</label>
                                                <input type="text" class="form-control" id="validationCustom02" name="address"
                                                    value="<?php echo $selctedname->address; ?>">
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom01">City</label>

                                                <input type="text" class="form-control" id="validationCustom02" name="city"
                                                    value="<?php echo $selctedname->city; ?>">

                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom01">Province</label>
                                                <input type="text" class="form-control" id="validationCustom02" name="province"
                                                    value="<?php echo $selctedname->province; ?>">


                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom01">Region</label>

                                                <input type="text" class="form-control" id="validationCustom02" name="region"
                                                    value="<?php echo $selctedname->region; ?>">

                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom01">Country</label>

                                                <input type="text" class="form-control" id="validationCustom02" name="country"
                                                    value="<?php echo $selctedname->country; ?>">

                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-row">

                                                    <div class="col-md-10 mb-3">
                                                        <h4 class="mb-3 text-primary">Communication Details ------------------
                                                        </h4>
                                                        <!-- <label for="validationCustom02">Communication------------------</label> -->

                                                    </div>
                                                </div>
                                                <div class="form-row">

                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Email 1</label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            name="email1" value="<?php echo $selctedname->email1; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Email 2</label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            name="email2" value="<?php echo $selctedname->email2; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Phone Number 1</label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            name="number1" value="<?php echo $selctedname->number1; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Phone Number 2</label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            name="number2" value="<?php echo $selctedname->number2; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-row">

                                                    <div class="col-md-10 mb-3">
                                                        <h4 class="mb-3 text-primary">ID Details ------------------</h4>

                                                    </div>
                                                </div>
                                                <div class="form-row">

                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Member ID</label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            name="membersid" value="<?php echo $selctedname->membersid; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Passport/Any ID</label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            name="passportid" value="<?php echo $selctedname->passportid; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">Senior ID</label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            name="seniorid" value="<?php echo $selctedname->seniorid; ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom02">PWD ID</label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            name="pwdid" value="<?php echo $selctedname->pwdid; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-row">

                                            <div class="col-md-5 mb-3">
                                                <label for="validationCustom02">Company</label>

                                                <select class="custom-select" name="companyid">
                                                    <option value="None">
                                                        None
                                                    </option>
                                                    <?php
                                                    $query = "SELECT * FROM hmscompany ";
                                                    $app = new App;
                                                    $companyinfos = $app->selectAll($query);

                                                    ?>
                                                    <?php foreach ($companyinfos as $companyinfo): ?>
                                                        <option value="<?php echo $companyinfo->id ?>">
                                                            <?php echo $companyinfo->company ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                            <!-- <div class="col-md-1 mb-3">
                                    <label for="validationCustom02">&nbsp;</label>
                                    <form action="companyprofile.php">
                                        <input type="submit" class="form-control btn btn-primary"
                                            id="validationCustom02" name="ADD" value="ADD">
                                    </form>
                                </div> -->



                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom02">VIP Type</label>
                                                <select class="custom-select" name="viptype">
                                                    <option value="<?php echo $selctedname->viptype; ?>">
                                                        <?php echo $selctedname->viptype; ?>
                                                    </option>
                                                    <?php
                                                    $query = "SELECT * FROM hmsvip ";
                                                    $app = new App;
                                                    $vipinfos = $app->selectAll($query);

                                                    ?>
                                                    <?php foreach ($vipinfos as $vipinfo): ?>
                                                        <option value="<?php echo $vipinfo->id ?>">
                                                            <?php echo $vipinfo->vip ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom02">Status</label>
                                                <select class="custom-select" name="status">
                                                    <option value="Active">Active</option>
                                                    <option value="In-Active">In-Active</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom02">Type of Profile</label>
                                                <select class="custom-select" name="typeprofile">
                                                    <option value="Member">Member</option>
                                                    <option value="Non-Member">Non-Member</option>
                                                    <option value="Sponsored Guest">Sponsored Guest</option>
                                                    <option value="Walk-In">Walk-In</option>

                                                </select>
                                            </div>
                                        </div>









                                    </div>






                                </div>

                                <?php require "commentmodal.php"; ?>
                                <?php require "alertmodal.php"; ?>


                            </div>


                        </div>


                    </div>

                    <div class="pb-5 pt-3">
                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                        <a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
        </div>

    <?php }
} ?>
</form>
</section>
<!-- /.card -->

<!-- /.content -->
</div>
<!-- /.content-wrapper --><?php require "../../../footer1.php"; ?>