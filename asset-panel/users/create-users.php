<?php require "../../header.php"; ?>
<?php require "../../sidebar.php"; ?>
<?php
if (isset($_POST['submit'])) {


    $userfullname = $_POST['userfullname'];
    $useridno = $_POST['useridno'];
    $userposition = $_POST['userposition'];
    $userdepartment = $_POST['userdepartment'];
    $userjoblevel = $_POST['userjoblevel'];
    $useremploymentstatus = $_POST['useremploymentstatus'];
    // $userareaofassignment = $_POST['userareaofassignment'];
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
VALUES(:userfullname, :useridno, :userposition, :userdepartment, :userjoblevel, :useremploymentstatus, :userdatehired, :usercontact, :email, :userbirthdate, :userage, :usergender, :usercivilstatus, :username, :userpassword, :userrole, :userremarks)";
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
                    <h1>User Profile</h1>
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
        <form class="row g-3" method="POST" action="create-users.php"></form>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Create User</h1>

                </div><br>
                <!-- /.BODY -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">ID No.</label>
                                <input type="text" name="useridno" id="useridno" class="form-control"
                                    placeholder="ID Number">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="email">Full Name</label>
                                <input type="text" name="userfullname" id="userfullname" class="form-control"
                                    placeholder="Full Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Position</label>
                                <input type="text" name="userposition" id="userposition" class="form-control"
                                    placeholder="Position">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="category">Department / Division</label>
                                    <select name="userdepartment" id="userdepartment" class="form-control">
                                        <option value="Accounting">Accounting</option>
                                        <option value="">Engineering </option>
                                        <option value="">Executive Office </option>
                                        <option value="">Food and Beverage Production</option>
                                        <option value="">Food and Beverage Service</option>
                                        <option value="">Front Office</option>
                                        <option value="">Grounds Department </option>
                                        <option value="">Housekeeping</option>
                                        <option value="">Human Resources</option>
                                        <option value="">MIS</option>
                                        <option value="">Makati Head Office</option>
                                        <option value="">Motorpool</option>
                                        <option value="">Sports & Recreation</option>
                                        <option value="">Warehouse</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="category">Job Level</label>
                                    <select name="userjoblevel" id="userjoblevel" class="form-control">
                                        <option value="">Managerial</option>
                                        <option value="">Supervisor</option>
                                        <option value="">Rank and File </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="category">Employment Status</label>
                                    <select name="useremploymentstatus" id="useremploymentstatus" class="form-control">
                                        <option value="">Regular</option>

                                        <option value="">Regular Seasonal</option>
                                        <option value="">Makati Hired </option>
                                        <option value="">Probitionary</option>
                                        <option value="">Fixed - Term</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Date Hired</label>
                                <input type="date" name="userdatehired" id="userdatehired" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Contact</label>
                                <input type="number" name="usercontact" id="usercontact" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Date Birth</label>
                                <input type="date" name="userbirthdate" id="userbirthdate" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Age</label>
                                <input type="text" name="userage" id="userage" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="category">Gender</label>
                                <select name="usergender" id="usergender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="category">Civil Status</label>
                                <select name="usercivilstatus" id="usercivilstatus" class="form-control">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widow">Widow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Useranme</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Password</label>
                                <input type="text" name="userpassword" id="userpassword" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category">User Role</label>
                                <select name="userrole" id="userrole" class="form-control">
                                    <option value="manager">Manager</option>
                                    <option value="visor">Supervisor</option>
                                    <option value="staff">Staff</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Remarks</label>
                                <textarea type="text" name="userremarks" id="userremarks"
                                    class="form-control"></textarea>
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