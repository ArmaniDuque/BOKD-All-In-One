<?php require "../../../headerscrolldatatables.php"; ?>
<?php require "../../sidebar.php"; ?>
<?php if (isset($_POST['submit'])) {
    $userfullname = $_POST['userfullname'];
    $useridno = $_POST['useridno'];
    $userposition = $_POST['userposition'];
    $userdepartment = $_POST['userdepartment'];
    $userjoblevel = $_POST['userjoblevel'];
    $useremploymentstatus = $_POST['useremploymentstatus']; //
    $userareaofassignment = $_POST['userareaofassignment'];
    $userdatehired = $_POST['userdatehired'];
    $usercontact = $_POST['usercontact'];
    $email = $_POST['email'];
    $userbirthdate = $_POST['userbirthdate'];
    $userage = $_POST['userage'];
    $usergender = $_POST['usergender'];
    $usercivilstatus = $_POST['usercivilstatus'];
    $username = $_POST['username'];
    $userpassword = $_POST['userpassword'];
    $userrole = $_POST['userrole'];
    $userremarks = $_POST['userremarks'];
    $query = "INSERT INTO hmsusermasterfile (userfullname, useridno, userposition, userdepartment, userjoblevel, useremploymentstatus, userdatehired, usercontact, email, userbirthdate, userage, usergender, usercivilstatus, username, userpassword, userrole, userremarks)
VALUES(:userfullname, :useridno, :userposition, :userdepartment, :userjoblevel, :useremploymentstatus, :userdatehired, :usercontact, :email, :userbirthdate, :userage, :usergender, :usercivilstatus, :username, :userpassword, :userrole, :userremarks)"
    ;
    $arr = [
        ":userfullname" => $userfullname,
        ":useridno" => $useridno,
        ":userposition" => $userposition,
        ":userdepartment" => $userdepartment,
        ":userjoblevel" => $userjoblevel,
        ":useremploymentstatus" => $useremploymentstatus,
        // ":userareaofassignment" => $userareaofassignment,
        ":userdatehired" => $userdatehired,
        ":usercontact" => $usercontact,
        ":email" => $email,
        ":userbirthdate" => $userbirthdate,
        ":userage" => $userage,
        ":usergender" => $usergender,
        ":usercivilstatus" => $usercivilstatus,
        ":username" => $username,
        ":userpassword" => $userpassword,
        ":userrole" => $userrole,
        ":userremarks" => $userremarks,

    ];



    $path = "../users/userslist.php";
    $app->register($query, $arr, $path);
}
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
        <form class="row" method="POST" action="create-users.php"></form>
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
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="First name" value="Mark" required>

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom01">First name</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="First name" value="Mark" required>

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom02">Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                        placeholder="Last name" required>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustomUsername">Middle Name</label>
                                    <div class="input-group">

                                        <input type="text" class="form-control" id="validationCustomUsername"
                                            placeholder="Username" aria-describedby="inputGroupPrepend" required>

                                    </div>
                                </div>
                                <div class="col-md-1 mb-3">
                                    <label for="validationCustom01">Title</label>

                                    <select class="custom-select" required>


                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Mx.">Mx.</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                        <option value="Hon.">Hon.</option>
                                        <option value="Rev.">Rev.</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                        <option value="Engr.">Engr.</option>
                                        <option value="Atty.">Atty.</option>
                                        <option value="CPA">CPA</option>
                                        <option value="RN">RN</option>
                                        <option value="PhD">PhD</option>


                                    </select>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustomUsername">Nick Name</label>
                                    <div class="input-group">

                                        <input type="text" class="form-control" id="validationCustomUsername"
                                            placeholder="Username" aria-describedby="inputGroupPrepend" required>

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom01">Birthday</label>
                                    <input type="date" class="form-control" id="validationCustom01" value="Mark"
                                        required>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom01">Gender</label>

                                    <select class="custom-select" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Not Speciped">Not Speciped</option>

                                    </select>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom01">Religion</label>

                                    <input type="text" class="form-control" id="validationCustom01" required>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom01">Nationality</label>

                                    <select class="custom-select" required>
                                        <option value="African">African</option>
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
                                        <option value="New Zealander">New Zealander</option>

                                    </select>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom01">Language</label>

                                    <select class="custom-select" required>
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
                                    <input type="text" class="form-control" id="validationCustom02"
                                        placeholder="Address" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom01">City</label>

                                    <select class="custom-select" required>
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
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom01">Province</label>

                                    <select class="custom-select" required>
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
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom01">Region</label>

                                    <select class="custom-select" required>
                                        <option value="Ilocos Region">Ilocos Region</option>
                                        <option value="Cagayan Valley">Cagayan Valley</option>
                                        <option value="Central Luzon">Central Luzon</option>
                                        <option value="CALABARZON">CALABARZON</option>
                                        <option value="MIMAROPA">MIMAROPA</option>
                                        <option value="Bicol Region">Bicol Region</option>
                                        <option value="Western Visayas">Western Visayas</option>
                                        <option value="Central Visayas">Central Visayas</option>
                                        <option value="Eastern Visayas">Eastern Visayas</option>
                                        <option value="Zamboanga Peninsula">Zamboanga Peninsula</option>
                                        <option value="Northern Mindanao">Northern Mindanao</option>
                                        <option value="Davao Region">Davao Region</option>
                                        <option value="Soccsksargen">Soccsksargen</option>
                                        <option value="Caraga">Caraga</option>
                                        <option value="BARMM (Bangsamoro Autonomous Region in Muslim Mindanao)">BARMM
                                            (Bangsamoro Autonomous Region in Muslim Mindanao)</option>
                                        <option value="National Capital Region (NCR)">National Capital Region (NCR)
                                        </option>
                                        <option value="Cordillera Administrative Region">Cordillera Administrative
                                            Region</option>

                                    </select>

                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom01">Country</label>

                                    <select class="custom-select" required>
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
                                <div class="col-md-6 mb-3">
                                    <div class="form-row">

                                        <div class="col-md-10 mb-3">
                                            <h4 class="mb-3 text-primary">Communication Details ------------------</h4>
                                            <!-- <label for="validationCustom02">Communication------------------</label> -->

                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Email 1</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Address" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Email 2</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Address" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Phone Number 1</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Address" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Phone Number 2</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Address" required>
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
                                                placeholder="Address" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Passport/Any ID</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Address" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Senior ID</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Address" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">PWD ID</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                placeholder="Address" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">

                                <div class="col-md-5 mb-3">
                                    <label for="validationCustom02">Company</label>

                                    <select class="custom-select" required>
                                        <option value="None">
                                            None
                                        </option>
                                        <?php
                                        $query = "SELECT * FROM hmscompanyinfo ";
                                        $app = new App;
                                        $companyinfos = $app->selectAll($query);

                                        ?>
                                        <?php foreach ($companyinfos as $companyinfo): ?>
                                            <option value="<?php echo $companyinfo->companyid ?>">
                                                <?php echo $companyinfo->companyname ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <div class="col-md-1 mb-3">
                                    <label for="validationCustom02">&nbsp;</label>
                                    <form action="companyprofile.php">
                                        <input type="submit" class="form-control btn btn-primary"
                                            id="validationCustom02" name="ADD" value="ADD">
                                    </form>
                                </div>



                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom02">VIP Type</label>
                                    <select class="custom-select" required>
                                        <option value="Vip 5 Star">Vip 5 Star</option>
                                        <option value="Vip 4 Star">Vip 4 Star</option>
                                        <option value="Vip 3 Star">Vip 3 Star</option>
                                        <option value="Vip 2 Star">Vip 2 Star</option>
                                        <option value="Vip 1 Star">Vip 1 Star</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom02">Status</label>
                                    <select class="custom-select" required>
                                        <option value="Active">Active</option>
                                        <option value="In-Active">In-Active</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom02">Type of Profile</label>
                                    <select class="custom-select" required>
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
            <button class="btn btn-primary" type="submit" name="submit">Create</button>
            <a href="userslist.php" class="btn btn-outline-dark ml-3">Cancel</a>
        </div>
</div>

</form>
</section>
<!-- /.card -->

<!-- /.content -->
</div>
<!-- /.content-wrapper --><?php require "../../../footer1.php"; ?>