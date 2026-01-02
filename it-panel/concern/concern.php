<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM itconcern";
$app = new App;
$concerns = $app->selectAll($query);


?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM itconcern WHERE concernid='$id'";
    $app = new App;
    $path = "concern.php";
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
                    <h1>Department Concern Report</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-concern.php" class="btn btn-primary">Create</a>
                </div>
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
                    <h1 class="h5 mb-3"><b>Lists of Concern Report</b> </h1>

                </div><br>



                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <!-- <tr>
                                <td>Minimum date:</td>
                                <td><input type="text" id="min" name="min"></td>
                            </tr>
                            <tr>
                                <td>Maximum date:</td>
                                <td><input type="text" id="max" name="max"></td>
                            </tr> -->
                            <tr>
                                <th width="60"> </th>
                                <th width="60">#</th>
                                <th>Date Reported</th>
                                <th>Date Accomplish</th>
                                <th>Description</th>
                                <th>Area/Location</th>
                                <th>Types</th>
                                <th>Error Types</th>
                                <th>Reported By</th>
                                <th>Reported To</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th>Prior</th>

                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($concerns as $concern): ?>

                                <tr>
                                    <td>
                                        <?php
                                        if ($concern->status == "Done") {
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
                                    <td><?php echo $concern->concernid ?></td>
                                    <td><?php echo $concern->datereported ?></td>
                                    <td><?php echo $concern->dateaccomplish ?></td>
                                    <td><?php echo $concern->description ?></td>
                                    <td><?php echo $concern->arealocation ?></td>
                                    <td><?php echo $concern->concerntypes ?> </td>
                                    <td><?php echo $concern->errortypes ?></td>

                                    <?php


                                    $query = "SELECT * FROM itusermasterfile WHERE userid='$concern->reportedby'";
                                    $app = new App;
                                    $users = $app->selectAll($query);
                                    foreach ($users as $user) {
                                        // echo '<td>' . $user->userid . '</td>';
                                        echo '<td>' . $user->userfullname . ' : ' . $user->userdepartment . '</td>';

                                    }
                                    ?>

                                    <?php


                                    $query = "SELECT * FROM itusermasterfile WHERE userid='$concern->reportedto'";
                                    $app = new App;
                                    $users = $app->selectAll($query);
                                    foreach ($users as $user) {
                                        // echo '<td>' . $user->userid . '</td>';
                                        echo '<td>' . $user->userfullname . ' : ' . $user->userdepartment . '</td>';

                                    }
                                    ?>
                                    <!-- <td><?php echo $concern->reportedby ?></td> -->
                                    <td><?php echo $concern->remarks ?></td>
                                    <td><?php echo $concern->status ?></td>
                                    <td><?php echo $concern->prior ?></td>


                                    <td>

                                        <?php if ($concern->status == "Done") { ?>
                                            <a style="text-decoration:none;"
                                                href="viewconcern.php?edit=<?php echo $concern->concernid ?>"
                                                class="text-primary">
                                                <i class="nav-icon fas fa fa-eye"></i>

                                            </a>
                                        <?php } elseif ($concern->status == "Ongoing") { ?>
                                            <a style="text-decoration:none;"
                                                href="update-concern.php?edit=<?php echo $concern->concernid ?>"
                                                class="text-success">
                                                <i class="nav-icon fas fa fa-edit"></i>

                                            </a>|

                                            <a style="text-decoration:none;"
                                                href="viewconcern.php?edit=<?php echo $concern->concernid ?>"
                                                class="text-primary">
                                                <i class="nav-icon fas fa fa-eye"></i>

                                            </a>

                                        <?php } elseif ($concern->status == "Pending") { ?>
                                            <a style="text-decoration:none;"
                                                href="update-concern.php?edit=<?php echo $concern->concernid ?>"
                                                class="text-success">
                                                <i class="nav-icon fas fa fa-edit"></i>

                                            </a>|
                                            <a style="text-decoration:none;"
                                                href="concern.php?delete=<?php echo $concern->concernid ?>" class="text-danger">
                                                <i class="nav-icon fas fa fa-trash"></i>

                                            </a>|
                                            <a style="text-decoration:none;"
                                                href="viewconcern.php?edit=<?php echo $concern->concernid ?>"
                                                class="text-primary">
                                                <i class="nav-icon fas fa fa-eye"></i>

                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    // let minDate, maxDate;

    // // Custom filtering function which will search data in column four between two values
    // DataTable.ext.search.push(function(settings, data, dataIndex) {
    //     let min = minDate.val();
    //     let max = maxDate.val();
    //     let date = new Date(data[4]);

    //     if (
    //         (min === null && max === null) ||
    //         (min === null && date <= max) ||
    //         (min <= date && max === null) ||
    //         (min <= date && date <= max)
    //     ) {
    //         return true;
    //     }
    //     return false;
    // });

    // // Create date inputs
    // minDate = new DateTime('#min', {
    //     format: 'MMMM Do YYYY'
    // });
    // maxDate = new DateTime('#max', {
    //     format: 'MMMM Do YYYY'
    // });

    // // DataTables initialisation
    // let table = new DataTable('#example');

    // // Refilter the table
    // document.querySelectorAll('#min, #max').forEach((el) => {
    //     el.addEventListener('change', () => table.draw());
    // });











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