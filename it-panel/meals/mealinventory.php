<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>

<?php
$query = "SELECT * FROM meal_logs where date = CURDATE();";
$app = new App;
$meals = $app->selectAll($query);

?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM itmeal WHERE id='$id'";
    $app = new App;
    $path = "meal.php";
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
                    <a href="create-meal.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Meal Inventory Today</b> </h1>

                </div><br>
                <div class="row">
                    <div class="col-sm-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-default">
                            <div class="inner">
                                <h4>Breakfast<sup style="font-size: 20px"></sup>
                                </h4>
                                <?php
                                $query = "SELECT COUNT(*) AS count_bfast FROM meal_logs WHERE bfast = 'true' AND date = CURDATE();";
                                $app = new App;
                                $count_bfast = $app->selectOne($query);
                                ?>
                                <p>
                                    Total : <span class="text-success"><?php echo $count_bfast->count_bfast; ?></span>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-default">
                            <div class="inner">
                                <h4>Lunch<sup style="font-size: 20px"></sup>
                                </h4>
                                <?php
                                $query = "SELECT COUNT(*) AS count_lunch FROM meal_logs WHERE lunch = 'true' AND date = CURDATE();";
                                $app = new App;
                                $count_lunch = $app->selectOne($query);
                                ?>
                                <p>
                                    Total : <span class="text-success"><?php echo $count_lunch->count_lunch; ?></span>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-default">
                            <div class="inner">
                                <h4>Dinner<sup style="font-size: 20px"></sup>
                                </h4>
                                <?php
                                $query = "SELECT COUNT(*) AS count_diner FROM meal_logs WHERE diner = 'true' AND date = CURDATE();";
                                $app = new App;
                                $count_diner = $app->selectOne($query);
                                ?>
                                <p>
                                    Total : <span class="text-success"><?php echo $count_diner->count_diner; ?></span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th width="60">id</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Breakfast</th>
                                <th>Lunch</th>
                                <th>Dinner</th>
                                <th>Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($meals as $meal): ?>
                                <tr>

                                    <td> <?php echo $meal->id ?></td>

                                    <?php
                                    $query = "SELECT * FROM itusermasterfile WHERE userid=$meal->emp_id ";
                                    $app = new App;
                                    $departments = $app->selectAll($query);
                                    foreach ($departments as $department) {
                                        echo '<td>' . $department->userfullname . '</td>';
                                        echo '<td>' . $department->userdepartment . '</td>';
                                    }
                                    ?>


                                    </td>
                                    <td><?php echo $meal->date ?></td>
                                    <td><?php echo $meal->time ?></td>
                                    <td><?php if ($meal->bfast == null) {
                                        echo "0";
                                    } else {
                                        echo "1";
                                    } ?></td>
                                    <td>
                                        <?php if ($meal->lunch == null) {
                                            echo "0";
                                        } else {
                                            echo "1";
                                        } ?>

                                    </td>
                                    <td><?php if ($meal->diner == null) {
                                        echo "0";
                                    } else {
                                        echo "1";
                                    } ?></td>
                                    <td><?php echo $meal->station_info ?></td>

                                    <td>
                                        <a style="text-decoration:none;" href="update-meal.php?edit=<?php echo $meal->id ?>"
                                            class="text-success">
                                            <i class="nav-icon fas fa fa-edit"></i>

                                        </a>|
                                        <a style="text-decoration:none;" href="meal.php?delete=<?php echo $meal->id ?>"
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