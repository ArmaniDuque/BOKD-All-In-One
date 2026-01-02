<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itaccounts";
$app = new App;
$accountss = $app->selectAll($query);

?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM itaccounts WHERE id='$id'";
    $app = new App;
    $path = "accounts.php";
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
                    <h1>Account and Credentials</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-accounts.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Accounts</b> </h1>

                </div><br>
                <!-- <div class="col-sm-12 invoice-col">
                    <a href="http://webmail.montemar.com.ph/webmail">webmail.montemar.com.ph/webmail</a>
                </div> -->
                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th width="60">#</th>
                                <th>Account Name</th>
                                <th>Link</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Remarks</th>

                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($accountss as $accounts): ?>
                            <tr>

                                <td> <?php echo $accounts->id ?></td>
                                <td><?php echo $accounts->accountname ?></td>

                                <td>
                                    <?php
                                        if ($accounts->accountlink == null) {
                                            echo '<a  href="' . OPENURL . '' . $accounts->accountlink . '" target="_blank" >' . $accounts->accountlink . '</a>';
                                        } else {
                                            echo '<a  href="' . OPENURL . '' . $accounts->accountlink . '" target="_blank" >' . $accounts->accountlink . '
                                                               </a>';
                                            // echo '<a  href="' . OPENURL . '' . $accounts->accountlink . '" target="_blank" >' . $accounts->accountlink . '</a>';
                                        }
                                        ?>


                                </td>
                                <!-- <td><?php echo $accounts->accountlink ?></td> -->

                                <td><?php echo $accounts->username ?></td>
                                <td><?php echo $accounts->password ?>
                                    <!-- <input type="text" disabled name="" id="" value="<?php //echo $accounts->password ?>"> -->
                                </td>

                                <td><?php echo $accounts->remarks ?></td>

                                <td>
                                    <a style="text-decoration:none;"
                                        href="update-accounts.php?edit=<?php echo $accounts->id ?>"
                                        class="text-success">
                                        <i class="nav-icon fas fa fa-edit"></i>

                                    </a>|
                                    <a style="text-decoration:none;"
                                        href="accounts.php?delete=<?php echo $accounts->id ?>" class="text-danger">
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
$(document).ready(function() {
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