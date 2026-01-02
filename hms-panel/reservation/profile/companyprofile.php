<?php require "../../../header.php"; ?>
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
                    <h1 class="h5 mb-3"><b>Company Profile</h1>

                </div>
                <!-- /.BODY -->
                <div class="card-body">
                    <div class="row">




                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <div class="form-row">

                                    <div class="col-md-10 mb-3">
                                        <h4 class="mb-3 text-primary">Company Details ------------------</h4>
                                        <!-- <label for="validationCustom02">Communication------------------</label> -->

                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col-md-2 mb-3">
                                        <label for="validationCustom02">#</label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="Address" required>
                                    </div>
                                    <div class="col-md-10 mb-3">
                                        <label for="validationCustom02">Company Name</label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="Address" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom02">Company Address</label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Source</label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="Address" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Contact Person</label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="Address" required>
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
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                    <a href="userslist.php" class="btn btn-outline-dark ml-3">Cancel</a>
                                </div>
                            </div>
                            <div class="col-md-8 mb-3">
                                <div class="form-row">

                                    <div class="col-md-10 mb-3">
                                        <h4 class="mb-3 text-primary">Company List ------------------</h4>

                                    </div>
                                </div>
                                <div class="form-row">

                                    <?php
                                    $currentdate = date("m-d-Y");
                                    $query = "SELECT * FROM hmscompany ";
                                    $app = new App;
                                    $companyinfos = $app->selectAll($query);



                                    ?>
                                    <table class="table table-striped " style="width:100%" id="history">

                                        <thead>
                                            <tr>

                                                <th>Company ID</th>
                                                <th>Compnay Name</th>
                                                <th>Address</th>
                                                <th>Source</th>
                                                <th>Contact Person</th>
                                                <th>Number</th>

                                                <th>Email</th>

                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($companyinfos as $companyinfo): ?>

                                                <tr>
                                                    <td><?php echo $companyinfo->id ?></td>

                                                    <td><?php echo $companyinfo->company ?></td>
                                                    <td><?php echo $companyinfo->description ?></td>
                                                    <td><?php echo $companyinfo->sourceid ?></td>
                                                    <td><?php echo $companyinfo->contactperson ?></td>


                                                    <td>
                                                        <?php
                                                        echo $companyinfo->contactno;
                                                        echo "</br>";
                                                        echo $companyinfo->contactno1;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $companyinfo->email;
                                                        echo "</br>";
                                                        echo $companyinfo->email1;
                                                        ?>
                                                    </td>

                                                    <td><?php echo $companyinfo->status ?></td>


















                                                    <td>
                                                        <a style="text-decoration:none;"
                                                            href="update-companyinfo.php?edit=<?php //echo $user->userid ?>"
                                                            class="text-success">&nbsp;&nbsp;
                                                            <i class="nav-icon fas fa fa-edit"></i>

                                                        </a>

                                                    </td>
                                                </tr>


                                            <?php endforeach; ?>
                                        </tbody>

                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#history').DataTable({
                                                    "pageLength": 5,
                                                    dom: 'Bfrtip',
                                                    buttons: [
                                                        'copy', 'csv', 'excel', 'pdf', 'print'
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
                        </div>







                    </div>






                </div>

            </div>
        </div>



</div>


</div>

</form>
</section>
<!-- /.card -->

<!-- /.content -->
</div>
<!-- /.content-wrapper --><?php require "../../../footer1.php"; ?>