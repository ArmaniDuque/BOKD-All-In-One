<?php require "../header.php"; ?>
<?php require "../sidebar.php"; ?>


<?php
$query = "SELECT * FROM itprojects";
$app = new App;
$projects = $app->selectAll($query);

?>



<?php if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM itprojects WHERE id='$id'";
    $app = new App;
    $path = "index.php";
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
                    <h1>Project</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="add-project.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Project</b> </h1>

                </div>

                <div class="card-body">
                    <table class="table table-striped projects">
                        <thead>
                            <!-- <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Project Name
                                </th>
                                <th style="width: 30%">
                                    Team Members
                                </th>
                                <th>
                                    Project Progress
                                </th>
                                <th style="width: 8%" class="text-center">
                                    Status
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr> -->

                            <tr>
                                <th>
                                    #
                                </th>
                                <th style="width: 20%">
                                    Project Name
                                </th>
                                <th>
                                    Old / New
                                </th>

                                <th>
                                    Percent
                                </th>
                                <!-- <th>
                                    Department
                                </th> -->
                                <!-- <th class="text-center">
                                    Description
                                </th> -->
                                <th class="text-center">
                                    Status
                                </th>
                                <th class="text-center">
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projects as $project): ?>


                                <tr>

                                    <td>
                                        <?php echo $project->id ?>
                                    </td>
                                    <td>
                                        <a>
                                            <?php echo $project->projectname ?>
                                        </a>

                                    </td>
                                    <td>
                                        <?php echo $project->otherinfo1 . ' to <b>' . $project->otherinfo2 . '</b>'; ?>
                                    </td>

                                    <td class="project_progress">
                                        <?php
                                        $id = $project->id;
                                        $query = "SELECT COUNT(*) AS Completed  FROM itprojecttask WHERE status='Completed' AND projectid=$id";
                                        $app = new App;
                                        $Completed = $app->selectOne($query);
                                        $com = $Completed->Completed;


                                        $query = "SELECT COUNT(*) AS Alltask FROM itprojecttask WHERE projectid='$id'";
                                        $app = new App;
                                        $Alltask = $app->selectOne($query);
                                        $task = $Alltask->Alltask;

                                        $percentage = ($com / $task) * 100;
                                        $percentage_formatted = number_format($percentage, 0);
                                        ?>


                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar"
                                                aria-valuenow="<?php echo $percentage_formatted; ?>" aria-valuemin="0"
                                                aria-valuemax="100" style="width:<?php echo $percentage_formatted; ?>%">
                                            </div>
                                        </div>
                                        <small>
                                            <?php
                                            echo $percentage_formatted . '% Complete';
                                            ?>
                                        </small>
                                    </td>
                                    <!-- <td>
                                        <?php echo $project->department ?>
                                    </td> -->
                                    <!-- <td>
                                    <?php echo $project->description ?>
                                </td> -->
                                    <td class="project-state">
                                        <?php if ($project->status == "Success") { ?>
                                            <span class="badge badge-success lg">Success</span>
                                        <?php } else if ($project->status == "Ongoing") { ?>

                                                <span class="badge badge-warning">Ongoing</span>
                                        <?php } else if ($project->status == "On Hold") { ?>
                                                    <span class="badge badge-danger">On Hold</span>
                                        <?php } ?>

                                    </td>

                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="view-project.php">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                            href="update-project.php?edit=<?php echo $project->id ?>">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="delete-project.php">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a>
                                        AdminLTE v3
                                    </a>
                                    <br>
                                    <small>
                                        Created 01.01.2019
                                    </small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                        </li>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                        </li>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                        </li>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar5.png">
                                        </li>
                                    </ul>
                                </td>

                                <td class="project-state">
                                    <span class="badge badge-success">Success</span>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="view-project.php">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="update-project.php">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="delete-project.php">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
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
</script>


<?php require "../../footer1.php"; ?>