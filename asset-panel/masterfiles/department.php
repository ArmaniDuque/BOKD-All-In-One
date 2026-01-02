<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM assetdepartment where id='$id'";
    $app = new App;
    $path = "department.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $code = $_POST['code'];
    $department = $_POST['department'];
    $description = $_POST['description'];
    $query = "INSERT INTO assetdepartment (code, department, description)
VALUES(:code, :department, :description)";
    $arr = [
        ":code" => $code,
        ":department" => $department,
        ":description" => $description,
    ];
    $path = "department.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $department = $_POST['department'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $query = "UPDATE assetdepartment SET department=:department, code=:code, description=:description WHERE id='$id'";
    $arr = [
        ":code" => $code,
        ":department" => $department,
        ":description" => $description,
    ];
    $path = "department.php?edit=$id";
    $app->update($query, $arr, $path);
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Accounts</h1>
                </div> -->

                <?php require "navbar.php"; ?>
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
                    <h1 class="h5 mb-3"><b>Department List</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM assetdepartment where id='$id'";
                            $app = new App;
                            $department1s = $app->selectAll($query); ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="department.php">
                                    <?php foreach ($department1s as $department1): ?>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Department List</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" class="form-control form-control-sm"
                                                        id="colFormLabelSm" name="id" value="<?php echo $department1->id ?>">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="department" value="<?php echo $department1->department ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="code" value="<?php echo $department1->code ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="description" value="<?php echo $department1->description ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pb-5 pt-3">
                                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                                            <a href="department.php" class="btn btn-outline-dark ml-3">Close</a>

                                        </div>
                                    <?php endforeach; ?>
                                </form>
                            </div>

                        <?php } else { ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="department.php">
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Department List</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="department">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Code</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-5 pt-3">
                                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                        <!-- <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a> -->

                                    </div>

                                </form>
                            </div>
                        <?php } ?>
                        <div class="col-md-8 mb-3 ">

                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">List of Department List --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM assetdepartment";
                                $app = new App;
                                $department = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>department</th>
                                            <th>Desciptions</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($department as $departmentlist): ?>

                                            <tr>
                                                <td><?php echo $departmentlist->id ?></td>
                                                <td><?php echo $departmentlist->code ?></td>


                                                <td><?php echo $departmentlist->department ?></td>
                                                <td><?php echo $departmentlist->description ?></td>
                                                <td>
                                                    <a style="text-decoration:none;"
                                                        href="department.php?edit=<?php echo $departmentlist->id ?>"
                                                        class="text-success">&nbsp;&nbsp;
                                                        <i class="nav-icon fas fa fa-edit"></i>

                                                    </a> |
                                                    <a style="text-decoration:none;"
                                                        href="department.php?delete=<?php echo $departmentlist->id ?>"
                                                        class="text-danger">&nbsp;&nbsp;
                                                        <i class="nav-icon fas fa fa-trash"></i>

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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>