<?php
if (isset($_GET['delete'])) {
    require "../../../config/config.php";
    require "../../../libs/app.php";
    include "../../../layouts/url.php";
    require "../../../validate.php";

    $id = $_GET['delete'];
    $query = "DELETE FROM brtittle where id='$id'";
    $app = new App;
    $path = "../bookingreference/index.php";
    $app->delete($query, $path);
}
?>
<?php




if (isset($_POST['submit'])) {

    require "../../../config/config.php";
    require "../../../libs/app.php";
    include "../../../layouts/url.php";
    require "../../../validate.php";


    $title = $_POST['title'];
    $query = "INSERT INTO brtittle (title)
VALUES(:title)";
    $arr = [
        ":title" => $title,
    ];
    $path = "../bookingreference/index.php";
    $app->register($query, $arr, $path);
}
?>

<form method="POST" action="tittlemodal.php">
    <div class="modal fade" id="tittlemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-3 ">

                        <form method="POST" action="tittlemodal.php">
                            <div class="col-md-12 mb-3">

                                <div class="form-group row">
                                    <label for="colFormLabelSm"
                                        class="col-sm-2 col-form-label col-form-label-sm">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                            name="title">
                                    </div>

                                </div>
                            </div>

                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="submit" name="submit">Add</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-12 ">

                        <h3>-----List-----</h3>

                        <?php
                        $currentdate = date("m-d-Y");
                        $query = "SELECT * FROM brtittle ";
                        $app = new App;
                        $brtittles = $app->selectAll($query);
                        ?>
                        <table class="table table-striped" style="width:100%" id="history">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($brtittles as $brtittle): ?>
                                <tr>
                                    <td><?php echo $brtittle->id ?></td>
                                    <td><?php echo $brtittle->title ?></td>
                                    <td>
                                        <a style="text-decoration:none;" href="#.php?edit=<?php echo $brtittle->id ?>"
                                            class="text-success">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-edit"></i>
                                        </a> |
                                        <a style="text-decoration:none;"
                                            href="tittlemodal.php?delete=<?php echo $brtittle->id ?>"
                                            class="text-danger">&nbsp;&nbsp;
                                            <i class="nav-icon fas fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <script type="text/javascript">
                            $(document).ready(function() {
                                $('#history').DataTable({
                                    "pageLength": 5
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary" name="submit">Save</button> -->
                </div>
            </div>
        </div>
    </div>
</form>