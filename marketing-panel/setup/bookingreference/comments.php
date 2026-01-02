<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM hmscomments where id='$id'";
    $app = new App;
    $path = "comments.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['save'])) {
    $comments = $_POST['comments'];
    $description = $_POST['description'];
    $query = "INSERT INTO hmscomments (comments, description)
VALUES(:comments,:description)";
    $arr = [
        ":comments" => $comments,
        ":description" => $description,
    ];
    $path = "comments.php";
    $app->register($query, $arr, $path);
}
?>
<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $comments = $_POST['comments'];
    $description = $_POST['description'];

    $query = "UPDATE hmscomments SET comments=:comments, description=:description WHERE id='$id'";
    $arr = [
        ":comments" => $comments,
        ":description" => $description,
    ];
    $path = "comments.php";
    $app->update($query, $arr, $path);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>Accounts</h1>
                </div> -->

                <?php require "../navbar.php"; ?><?php require "navbar.php"; ?>
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
                    <h1 class="h5 mb-3"><b>Comments </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->


                        <?php
                        if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM hmscomments where id='$id'";
                            $app = new App;
                            $comments = $app->selectAll($query);
                            ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="comments.php">
                                    <?php foreach ($comments as $comment): ?>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Comments Code</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" class="form-control form-control-sm"
                                                        id="colFormLabelSm" name="id" value="<?php echo $comment->id ?>">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="comments" value="<?php echo $comment->comments ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="description" value="<?php echo $comment->description ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pb-5 pt-3">
                                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                                            <a href="comments.php" class="btn btn-outline-dark ml-3">Close</a>

                                        </div>
                                    <?php endforeach; ?>
                                </form>

                            </div>
                        <?php } else { ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="comments.php">
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Comments Code</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="comments">
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
                                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                                        <!-- <a href="userslist.php" class="btn btn-outline-dark ml-3">Close</a> -->

                                    </div>
                                </form>

                            </div>
                        <?php } ?>
                        <div class="col-md-8 mb-3 ">

                            <div class="col-md-12 ">
                                <h4 class="mb-3 text-primary">List of hmscomments --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM hmscomments ";
                                $app = new App;
                                $commentss = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Comments</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($commentss as $comments): ?>

                                            <tr>
                                                <td><?php echo $comments->id ?></td>


                                                <td><?php echo $comments->comments ?></td>
                                                <td><?php echo $comments->description ?></td>
                                                <td>
                                                    <a style="text-decoration:none;"
                                                        href="comments.php?edit=<?php echo $comments->id ?>"
                                                        class="text-success">
                                                        <i class="nav-icon fas fa fa-edit"></i>

                                                    </a> |
                                                    <a style="text-decoration:none;"
                                                        href="comments.php?delete=<?php echo $comments->id ?>"
                                                        class="text-danger">
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
</div>
<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>