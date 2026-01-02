<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itusermasterfile";
$app = new App;
$users = $app->selectAll($query);

?>



<?php if (isset($_POST['submit'])) {

    $userid = $_POST['userid'];
    $pcname = $_POST['pcname'];
    $department = $_POST['department'];
    $ipaddress = $_POST['ipaddress'];
    $subnet = $_POST['subnet'];
    $gateway = $_POST['gateway'];
    $dns1 = $_POST['dns1'];
    $dns2 = $_POST['dns2'];
    $specs = $_POST['specs'];
    $monitor = $_POST['monitor'];
    $mouse = $_POST['mouse'];
    $ups = $_POST['ups'];
    $printer = $_POST['printer'];
    $other1 = $_POST['other1'];
    $other2 = $_POST['other2'];
    $other3 = $_POST['other3'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];


    $query = "INSERT INTO itboxinventory (userid, pcname, department, ipaddress, subnet, gateway, dns1, dns2, specs, monitor, mouse, ups, printer, other1, other2, other3, username, password, status, remarks)
VALUES(:userid, :pcname, :department, :ipaddress, :subnet, :gateway, :dns1, :dns2, :specs, :monitor, :mouse, :ups, :printer, :other1, :other2, :other3, :username, :password, :status, :remarks)";
    $arr = [
        ":userid" => $userid,
        ":pcname" => $pcname,
        ":department" => $department,
        ":ipaddress" => $ipaddress,
        ":subnet" => $subnet,
        ":gateway" => $gateway,
        ":dns1" => $dns1,
        ":dns2" => $dns2,
        ":specs" => $specs,
        ":monitor" => $monitor,
        ":mouse" => $mouse,
        ":ups" => $ups,
        ":printer" => $printer,
        ":other1" => $other1,
        ":other2" => $other2,
        ":other3" => $other3,
        ":username" => $username,
        ":password" => $password,
        ":status" => $status,
        ":remarks" => $remarks,


    ];

    $path = "panelbox.php";
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
                    <h1>Add PC Inventory</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="panelbox.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <!-- Default box -->
        <form class="row g-3" method="POST" action="create-panelbox.php" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header pt-3">
                        <h1 class="h5 mb-3"><b>Add PC Information</h1>

                    </div><br>
                    <!-- /.BODY -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">




                                <div class="mb-8">
                                    <label for="email">Users</label>

                                    <input type="text" name="userid" id="userid" class="form-control"
                                        placeholder="User">
                                </div>

                                <div class="mb-3">
                                    <label for="email">PC Name</label>

                                    <input type="text" name="pcname" id="pcname" class="form-control"
                                        placeholder="PC Name">
                                </div>


                                <div class="mb-3">
                                    <label for="email">Department</label>

                                    <input type="text" name="department" id="department" class="form-control"
                                        placeholder="Department">
                                </div>

                                <div class="mb-3">
                                    <label for="email">Specification </label>
                                    <!-- <input type="text" name="specs" id="specs" class="form-control" placeholder=""> -->

                                    <p style="font-size:12px;"><i>FORMAT</i><br>OS : <br>MS Office : <br>CPU Specs :
                                        <br>Memory :
                                        <br>Storage :
                                    </p>


                                    <textarea name="specs" id="specs" class="form-control" style="height:150px;"
                                        placeholder="OS : &#10;MS Office : &#10;CPU Specs : &#10;Memory : &#10;Storage : "></textarea>

                                </div>
                                <div class="mb-3">
                                    <label for="email">Monitor </label>
                                    <input type="text" name="monitor" id="monitor" class="form-control" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Mouse </label>
                                    <input type="text" name="mouse" id="mouse" class="form-control" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="email">UPS </label>
                                    <input type="text" name="ups" id="ups" class="form-control" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="email">Printer </label>
                                    <input type="text" name="printer" id="printer" class="form-control" placeholder="">
                                </div>




                                <div class="mb-3">
                                    <label for="category">Status</label>
                                    <select name="status" id="status" class="form-control">

                                        <option value="Active">Active</option>
                                        <option value="InActive">InActive</option>
                                        <option value="0">For Setup</option>

                                    </select>

                                </div>

                                <div class="mb-3">
                                    <label for="email">Remarks</label>
                                    <input type="text" name="remarks" id="remarks" class="form-control"
                                        placeholder="Remarks">
                                </div>








                            </div>
                            <div class="col-md-4">




                                <div class="mb-3">
                                    <label for="email" class="text-success">Configuration Information</label></br>
                                    <label for="email">PC IP Address</label>
                                    <input type="text" name="ipaddress" id="ipaddress" class="form-control"
                                        placeholder="1**.***.***.***">
                                    <label for="email">Subnet</label>
                                    <input type="text" name="subnet" id="subnet" class="form-control"
                                        placeholder="255.255.***.***">
                                    <label for="email">Gateway</label>
                                    <input type="text" name="gateway" id="gateway" class="form-control"
                                        placeholder="1**.***.***.***">
                                    <label for="email">DNS 1</label>
                                    <input type="text" name="dns1" id="dns1" class="form-control" placeholder="*.*.*.*">
                                    <label for="email">DNS 2</label>
                                    <input type="text" name="dns2" id="dns2" class="form-control" placeholder="*.*.*.*">

                                </div>
                                <div class="mb-3">
                                    <label for="email" class="text-success">Other Details Information </label></br>

                                    <label for="email">Other 1 </label>
                                    <input type="text" name="other1" id="other1" class="form-control" placeholder="">

                                    <label for="email">Other 2 </label>
                                    <input type="text" name="other2" id="other2" class="form-control" placeholder="">

                                    <label for="email">Other 3 </label>
                                    <input type="text" name="other3" id="other3" class="form-control" placeholder="">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="text-success">Credentials Information </label></br>

                                    <label for="email">Usernname</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="Username">

                                    <label for="email">Password</label>
                                    <input type="text" name="password" id="password" class="form-control"
                                        placeholder="password">
                                </div>





                            </div>

                        </div>
                    </div>

                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" name="submit">Create</button>
                    <a href="cctv.php" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>