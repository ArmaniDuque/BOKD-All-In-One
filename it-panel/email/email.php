<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itemail";
$app = new App;
$emails = $app->selectAll($query);

?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM itemail WHERE emailid='$id'";
    $app = new App;
    $path = "email.php";
    $app->delete($query, $path);
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Email</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-email.php" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card d-print-block">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Lists of Emails</b> </h1>

                </div><br>
                <div class="col-sm-12 invoice-col">
                    <a href="http://webmail.montemar.com.ph/webmail">webmail.montemar.com.ph/webmail</a>
                </div>
                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th width="60">#</th>
                                <th>Full Name</th>
                                <th>Montemar Email</th>
                                <th>Password</th>
                                <th>Department</th>
                                <th>Old Gmail</th>
                                <th>Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($emails as $email): ?>
                                <tr>

                                    <td> <?php echo $email->emailid ?></td>
                                    <td><?php echo $email->userid ?></td>
                                    <td><?php echo $email->email ?></td>
                                    <td>
                                        <?php echo $email->emailpassword ?>
                                        <!-- <input type="text" disabled name="" id=""
                                        value="<?php echo $email->emailpassword ?>"> -->
                                    </td>
                                    <td><?php echo $email->departmentid ?></td>
                                    <td><?php echo $email->emailold ?></td>
                                    <td><?php echo $email->emailstatus ?></td>

                                    <td>
                                        <a style="text-decoration:none;"
                                            href="update-email.php?edit=<?php echo $email->emailid ?>" class="text-success">
                                            <i class="nav-icon fas fa fa-edit"></i>

                                        </a>|
                                        <a style="text-decoration:none;"
                                            href="email.php?delete=<?php echo $email->emailid ?>" class="text-danger">
                                            <i class="nav-icon fas fa fa-trash"></i>

                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "pageLength": 50,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        });



    });


    $('#example [data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'bottom',
        html: true
    });
</script><?php require "../../footer1.php"; ?>