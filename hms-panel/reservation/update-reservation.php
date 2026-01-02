<?php require "../../header.php"; ?>
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
    $query = "INSERT INTO usermasterfile (userfullname, useridno, userposition, userdepartment, userjoblevel, useremploymentstatus, userdatehired, usercontact, email, userbirthdate, userage, usergender, usercivilstatus, username, userpassword, userrole, userremarks)
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
                <div class="col-sm-6">
                    <h1>Update Reservation</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="userslist.php" class="btn btn-primary">Back</a>
                </div>
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
                    <h1 class="h5 mb-3"><b>Individual</h1>

                </div>
                <!-- /.BODY -->
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <h4 class="mb-3">Personal Information --------------------------</h4>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">First name</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="First name" value="Mark" required>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                        placeholder="Last name" required>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomUsername">Middle Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="validationCustomUsername"
                                            placeholder="Username" aria-describedby="inputGroupPrepend" required>

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
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

                                <div class="col-md-6 mb-3">
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
                            </div>



                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Address</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                        placeholder="Address" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Home Address</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                        placeholder="Home Address" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">City</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="City"
                                        required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom02">Postal Code</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                        placeholder="Postal Code" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom02">Ext</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Ext"
                                        required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Country</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                        placeholder="Country" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">State</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="State"
                                        required>
                                </div>

                            </div>



                        </div>

                        <div class="col-md-6">
                            <h4 class="mb-3">Rooms Information ------------------------------</h4>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Salutation</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="Hello / Anneongheseyo">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Date of Birth</label>
                                    <input type="date" class="form-control" id="validationCustom02" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">VIP</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="Hello / Anneongheseyo">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Passport ID</label>
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Nationality</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Client ID</label>
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Ref Currency</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Bus Seg</label>
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Mail Action</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Mailing List</label>
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Communication</label>
                                    <!-- <input type="text" class="form-control" id="validationCustom01" placeholder=""> -->
                                    <select class="custom-select" required>
                                        <option value="Email">Email</option>
                                        <option value="Phone Number">Phone Number</option>
                                        <option value="Company Number">Company Number</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">&nbsp;</label>
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <!-- <input type="text" class="form-control" id="validationCustom01" placeholder=""> -->
                                    <select class="custom-select" required>
                                        <option value="Phone Number">Phone Number</option>
                                        <option value="Email">Email</option>
                                        <option value="Company Number">Company Number</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <!-- <input type="text" class="form-control" id="validationCustom01" placeholder=""> -->
                                    <select class="custom-select" required>
                                        <option value="Company Number">Company Number</option>
                                        <option value="Email">Email</option>
                                        <option value="Phone Number">Phone Number</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1" checked>
                                        <label class="form-check-label" for="inlineCheckbox1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Contact</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="option3">
                                        <label class="form-check-label" for="inlineCheckbox3">History</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Payment Information ------------------------------</h4>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Salutation</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="Hello / Anneongheseyo">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Date of Birth</label>
                                    <input type="date" class="form-control" id="validationCustom02" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">VIP</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="Hello / Anneongheseyo">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Passport ID</label>
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Nationality</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Client ID</label>
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Ref Currency</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Bus Seg</label>
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Mail Action</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Mailing List</label>
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Communication</label>
                                    <!-- <input type="text" class="form-control" id="validationCustom01" placeholder=""> -->
                                    <select class="custom-select" required>
                                        <option value="Email">Email</option>
                                        <option value="Phone Number">Phone Number</option>
                                        <option value="Company Number">Company Number</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">&nbsp;</label>
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <!-- <input type="text" class="form-control" id="validationCustom01" placeholder=""> -->
                                    <select class="custom-select" required>
                                        <option value="Phone Number">Phone Number</option>
                                        <option value="Email">Email</option>
                                        <option value="Company Number">Company Number</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <!-- <input type="text" class="form-control" id="validationCustom01" placeholder=""> -->
                                    <select class="custom-select" required>
                                        <option value="Company Number">Company Number</option>
                                        <option value="Email">Email</option>
                                        <option value="Phone Number">Phone Number</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="validationCustom02">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1" checked>
                                        <label class="form-check-label" for="inlineCheckbox1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Contact</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="option3">
                                        <label class="form-check-label" for="inlineCheckbox3">History</label>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>

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
<!-- /.content-wrapper --><?php require "../../footer1.php"; ?>