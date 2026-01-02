<?php require "../header.php"; ?>
<?php require "sidebar.php"; ?>



<?php
?>
<?php if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM mktgdisplay WHERE displayid='$id'";
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
                    <h1>All Digital Display</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create-display.php" class="btn btn-primary">Create</a>
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
                    <h1 class="h5 mb-3"><b>Lists of Display</b> </h1>

                </div>
                <div class="container-fluid">
                    <br>

                </div>
                <div class="card-body">

                    <?php
                    $currentdate = date("m-d-Y");
                    $query = "SELECT * FROM mktgdisplay ";
                    $app = new App;
                    $description = $app->selectAll($query);
                    ?>
                    <table class="table table-striped " style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Desciptions</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($description as $descriptionlist): ?>

                                <tr>

                                    <td>
                                        <a style="text-decoration:none;"
                                            href="<?php echo APPURL; ?>marketing-panel/displaysetup/displaylandscapelist.php?edit=<?php echo $descriptionlist->id ?>"
                                            class="text-success">
                                            <i class="nav-icon fas fa fa-edit"></i>
                                        </a> |
                                        <a style="text-decoration:none;"
                                            href="<?php echo APPURL; ?>marketing-panel/displaysetup/displaylandscapelist.php?delete=<?php echo $descriptionlist->id ?>"
                                            class="text-danger">
                                            <i class="nav-icon fas fa fa-trash"></i>

                                        </a>

                                    </td>
                                    <td><?php echo $descriptionlist->id ?></td>
                                    <td><?php
                                    $query = "SELECT * FROM mktgdiscategory where id='$descriptionlist->discategoryid'";
                                    $app = new App;
                                    $category1s = $app->selectAll($query);
                                    foreach ($category1s as $category1) {
                                        echo $category1->name;
                                    }

                                    ?></td>

                                    <td><?php
                                    if ($descriptionlist->slidecategory == "1") {
                                        echo "Landscape";
                                    } elseif ($descriptionlist->slidecategory == "2") {
                                        echo "Portrait";
                                    } else {
                                        echo "Text";

                                    }
                                    ?></td>
                                    <td><?php echo $descriptionlist->title ?></td>
                                    <td><?php echo $descriptionlist->description ?></td>
                                    <td><?php echo $descriptionlist->startdate ?></td>
                                    <td><?php echo $descriptionlist->enddate ?></td>
                                    <td><img src="<?php echo APPURL; ?>img/mktg/landscape/<?php echo $descriptionlist->checkofficephoto ?>"
                                            style="width:100px;"></td>

                                </tr>


                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
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

    <?php require "../footer1.php"; ?>