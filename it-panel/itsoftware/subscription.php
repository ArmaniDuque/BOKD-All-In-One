<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itsubscription";
$app = new App;
$subscriptions = $app->selectAll($query);

?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM itsubscription WHERE subscriptionid='$id'";
    $app = new App;
    $path = "subscription.php";
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
                    <h1>Subscription</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-subscription.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Subscriptions</b> </h1>

                </div><br>
                <div class="col-sm-12 invoice-col">

                </div>
                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th width="60">#</th>
                                <th>Subscription Name</th>
                                <th>Subscription Email</th>
                                <th>Password</th>
                                <th>Department</th>
                                <th>Remarks</th>
                                <th>Date Avail</th>
                                <th>Date Expired</th>
                                <th>Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($subscriptions as $subscription): ?>
                                <tr>

                                    <!-- <td> <?php echo $subscription->subscriptionid ?></td> -->
                                    <td> <?php //echo $camera->cctvid ?>
                                        <?php
                                        if ($subscription->subscriptionstatus == "Active") {
                                            echo '<svg class="text-success-500 h-6 w-6 text-success"
                                        		xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        		stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        	</svg>';
                                        } else {
                                            echo '<svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                        		fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        		aria-hidden="true">
                                        		<path stroke-linecap="round" stroke-linejoin="round"
                                        			d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        		</path>
                                        	</svg>';
                                        }
                                        ?>
                                    </td>



                                    <td><?php echo $subscription->userid ?></td>
                                    <td><?php echo $subscription->subscription ?></td>
                                    <td><?php echo $subscription->subscriptionpassword ?>
                                        <!-- <input type="text" disabled name="" id=""
                                        value="<?php //echo $subscription->subscriptionpassword ?>"> -->
                                    </td>
                                    <td><?php echo $subscription->departmentid ?></td>
                                    <td><?php echo $subscription->remarks ?></td>
                                    <td><?php echo $subscription->datefrom ?></td>
                                    <td><?php echo $subscription->dateto ?></td>
                                    <td><?php echo $subscription->subscriptionstatus ?></td>

                                    <td>
                                        <a style="text-decoration:none;"
                                            href="update-subscription.php?edit=<?php echo $subscription->subscriptionid ?>"
                                            class="text-success">
                                            <i class="nav-icon fas fa fa-edit"></i>

                                        </a>|
                                        <a style="text-decoration:none;"
                                            href="subscription.php?delete=<?php echo $subscription->subscriptionid ?>"
                                            class="text-danger">
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