<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM mktgdisplay where id='$id'";
    $app = new App;
    $path = "displaylist.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $discategoryid = $_POST['discategoryid'];
    $categoryid = $_POST['categoryid'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $categoryid = $_POST['categoryid'];
    $slidecategory = '3';
    $checkofficephoto = 'default.png';

    $query = "INSERT INTO mktgdisplay (title, description, discategoryid, categoryid, startdate, enddate, checkofficephoto, slidecategory)
VALUES(:title, :description, :discategoryid, :categoryid, :startdate, :enddate, :checkofficephoto, :slidecategory)";
    $arr = [
        ":title" => $title,
        ":description" => $description,
        ":discategoryid" => $discategoryid,
        ":categoryid" => $categoryid,
        ":startdate" => $startdate,
        ":enddate" => $enddate,
        ":checkofficephoto" => $checkofficephoto,
        ":slidecategory" => $slidecategory,
    ];
    $path = "displaylist.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $discategoryid = $_POST['discategoryid'];
    $title = $_POST['title'];
    $categoryid = $_POST['categoryid'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $query = "UPDATE mktgdisplay SET description=:description, title=:title, categoryid=:categoryid, discategoryid=:discategoryid , startdate=:startdate , enddate=:enddate WHERE id='$id'";
    $arr = [
        ":title" => $title,
        ":description" => $description,
        ":discategoryid" => $discategoryid,
        ":categoryid" => $categoryid,
        ":startdate" => $startdate,
        ":enddate" => $enddate,
    ];

    $path = "displaylist.php?edit=$id";
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
                    <h1 class="h5 mb-3"><b>Slide 3 Bottom Text Display</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM mktgdisplay where id='$id' ";
                            $app = new App;
                            $description1s = $app->selectAll($query); ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="displaylist.php">
                                    <?php foreach ($description1s as $description1): ?>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Title</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" class="form-control form-control-sm"
                                                        id="colFormLabelSm" name="id" value="<?php echo $description1->id ?>">

                                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="title" value="<?php echo $description1->title ?>">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Descriptions</label>

                                                <div class="col-sm-8">
                                                    <textarea name="description" class="form-control form-control-sm"
                                                        style="height: 150px;  resize: none;"
                                                        id="colFormLabelSm"><?php echo $description1->description ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Display
                                                    Category</label>
                                                <div class="col-sm-8">


                                                    <select class="custom-select" name="discategoryid">

                                                        <?php
                                                        $query = "SELECT * FROM mktgdiscategory WHERE id='$description1->discategoryid '";
                                                        $app = new App;
                                                        $discategorys = $app->selectAll($query);
                                                        ?>
                                                        <?php foreach ($discategorys as $discategory): ?>
                                                            <option value="<?php echo $discategory->id ?>">
                                                                <?php echo $discategory->name ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                        <?php
                                                        $query = "SELECT * FROM mktgdiscategory";
                                                        $app = new App;
                                                        $discategorys = $app->selectAll($query);
                                                        ?>
                                                        <?php foreach ($discategorys as $discategory): ?>
                                                            <option value="<?php echo $discategory->id ?>">
                                                                <?php echo $discategory->name ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">

                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Display
                                                    Category</label>
                                                <div class="col-sm-8">
                                                    <select class="custom-select" name="categoryid">
                                                        <?php
                                                        $query = "SELECT * FROM mktgcategory WHERE id='$description1->categoryid '";
                                                        $app = new App;
                                                        $categorys = $app->selectAll($query);
                                                        ?>
                                                        <?php foreach ($categorys as $category): ?>
                                                            <option value="<?php echo $category->id ?>">
                                                                <?php echo $category->category ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                        <?php
                                                        $query = "SELECT * FROM mktgcategory";
                                                        $app = new App;
                                                        $categorys = $app->selectAll($query);
                                                        ?>
                                                        <?php foreach ($categorys as $category): ?>
                                                            <option value="<?php echo $category->id ?>">
                                                                <?php echo $category->category ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">Start Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="startdate" value="<?php echo $description1->enddate ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm"
                                                    class="col-sm-3 col-form-label col-form-label-sm">End Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                        name="enddate" value="<?php echo $description1->enddate ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pb-5 pt-3">
                                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                                            <a href="displaylist.php" class="btn btn-outline-dark ml-3">Close</a>

                                        </div>
                                    <?php endforeach; ?>
                                </form>
                            </div>

                        <?php } else { ?>
                            <div class="col-md-4 mb-3 ">
                                <form method="POST" action="displaylist.php">
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Title</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Desciptions</label>
                                            <div class="col-sm-8">
                                                <textarea name="description" class="form-control form-control-sm"
                                                    style="height: 150px;  resize: none;" id="colFormLabelSm"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Display Category</label>
                                            <div class="col-sm-8">
                                                <select class="custom-select" name="discategoryid">
                                                    <?php
                                                    $query = "SELECT * FROM mktgdiscategory";
                                                    $app = new App;
                                                    $discategorys = $app->selectAll($query);
                                                    ?>
                                                    <?php foreach ($discategorys as $discategory): ?>
                                                        <option value="<?php echo $discategory->id ?>">
                                                            <?php echo $discategory->name ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">

                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                            <div class="col-sm-8">
                                                <select class="custom-select" name="categoryid">
                                                    <?php
                                                    $query = "SELECT * FROM mktgcategory";
                                                    $app = new App;
                                                    $categorys = $app->selectAll($query);
                                                    ?>
                                                    <?php foreach ($categorys as $category): ?>
                                                        <option value="<?php echo $category->id ?>">
                                                            <?php echo $category->category ?>
                                                            <i class='fas fa-square'></i>
                                                            </span>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">Start Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="startdate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm"
                                                class="col-sm-3 col-form-label col-form-label-sm">End Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control form-control-sm" id="colFormLabelSm"
                                                    name="enddate">
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
                                <h4 class="mb-3 text-primary">List of Slide 3 Bottom Text Display
                                    --------------------------
                                </h4>


                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM mktgdisplay WHERE slidecategory='3'";
                                $app = new App;
                                $description = $app->selectAll($query);



                                ?>



                                <table class="table table-striped " style="width:100%" id="history">

                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Desciptions</th>

                                            <th>Display Category</th>
                                            <th>Category</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>



                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($description as $descriptionlist): ?>

                                            <tr>
                                                <td><?php echo $descriptionlist->id ?></td>
                                                <td><?php echo $descriptionlist->title ?></td>


                                                <td><?php echo $descriptionlist->description ?></td>

                                                <td><?php
                                                $query = "SELECT * FROM mktgdiscategory WHERE id='$descriptionlist->discategoryid '";
                                                $app = new App;
                                                $discategorys = $app->selectAll($query);
                                                ?>
                                                    <?php foreach ($discategorys as $discategory): ?>
                                                        <p>
                                                            <?php echo $discategory->name ?>
                                                        </p>
                                                    <?php endforeach; ?>
                                                </td>
                                                <!-- <td><?php //echo $descriptionlist->categoryid ?></td> -->
                                                <td><?php
                                                $query = "SELECT * FROM mktgcategory WHERE id='$descriptionlist->categoryid '";
                                                $app = new App;
                                                $categorys = $app->selectAll($query);
                                                ?>
                                                    <?php foreach ($categorys as $category): ?>
                                                        <p style='color:<?php echo $category->color ?>'>
                                                            <?php echo $category->category ?>
                                                        </p>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td><?php echo $descriptionlist->startdate ?></td>
                                                <td><?php echo $descriptionlist->enddate ?></td>


                                                <td>
                                                    <a style="text-decoration:none;"
                                                        href="displaylist.php?edit=<?php echo $descriptionlist->id ?>"
                                                        class="text-success">
                                                        <i class="nav-icon fas fa fa-edit"></i>

                                                    </a> |
                                                    <a style="text-decoration:none;"
                                                        href="displaylist.php?delete=<?php echo $descriptionlist->id ?>"
                                                        class="text-danger">
                                                        <i class="nav-icon fas fa fa-trash"></i>

                                                    </a>

                                                </td>
                                            </tr>


                                        <?php endforeach; ?>
                                    </tbody>

                                    <script type="text/javascript">
                                    $(document).ready(function() {
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