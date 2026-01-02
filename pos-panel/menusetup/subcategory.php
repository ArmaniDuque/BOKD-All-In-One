<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM possubcategory where subcatid='$id'";
    $app = new App;
    $path = "subcategory.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $categoryid = $_POST['categoryid'];
    $subcategory = $_POST['subcategory'];
    $sequence = $_POST['sequence'];
    $icon = $_POST['icon'];

    $query = "INSERT INTO possubcategory (subcategory, sequence, icon, categoryid)
VALUES( :subcategory, :sequence, :icon, :categoryid)";
    $arr = [
        ":categoryid" => $categoryid,
        ":subcategory" => $subcategory,
        ":sequence" => $sequence,
        ":icon" => $icon,

    ];
    $path = "subcategory.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $subcategory = $_POST['subcategory'];
    $categoryid = $_POST['categoryid'];
    $sequence = $_POST['sequence'];
    $icon = $_POST['icon'];
    $query = "UPDATE possubcategory SET subcategory=:subcategory, categoryid=:categoryid, sequence=:sequence, icon=:icon WHERE subcatid='$id'";
    $arr = [
        ":categoryid" => $categoryid,
        ":subcategory" => $subcategory,
        ":sequence" => $sequence,
        ":icon" => $icon,

    ];

    $path = "subcategory.php?edit=$id";
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
                <script src="https://cdn.tailwindcss.com"></script>

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
                    <h1 class="h5 mb-3"><b>Sub Category</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM possubcategory where subcatid='$id'";

                            $app = new App;
                            $subcategory1s = $app->selectAll($query); ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="subcategory.php">
                                <?php foreach ($subcategory1s as $subcategory1): ?>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id"
                                                value="<?php echo $subcategory1->subcatid ?>">



                                            <select class="custom-select" name="categoryid">

                                                <?php
                                                        $query = "SELECT * FROM poscategory WHERE id='$subcategory1->subcategory'";
                                                        $app = new App;
                                                        $categorys = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($categorys as $category): ?>
                                                <option value="<?php echo $category->id ?>">
                                                    <?php echo $category->category ?>
                                                </option>
                                                <?php endforeach; ?>
                                                <?php
                                                        $query = "SELECT * FROM poscategory";
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
                                            class="col-sm-3 col-form-label col-form-label-sm">Sub Category Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="subcategory" value="<?php echo $subcategory1->subcategory ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Sequence</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="sequence" value="<?php echo $subcategory1->sequence ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Icon</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="icon" value="<?php echo $subcategory1->icon ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <label for="colFormLabelSm"
                                        class="col-sm-12 col-form-label col-form-label-sm text-center">Preview</label>
                                    <?php
                                            // $query = "SELECT * FROM possubcategory";
                                            $query = "SELECT *
                                FROM possubcategory
                                LEFT JOIN poscategory ON possubcategory.categoryid = poscategory.id WHERE possubcategory.subcatid='$id'";
                                            $app = new App;
                                            $subcategorys = $app->selectAll($query);

                                            ?>
                                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
                                        <?php foreach ($subcategorys as $subcategory): ?>



                                        <!-- Main Courses Category Button -->
                                        <a href="subsubcategory.php?id=<?php echo $subcategory->subcatid ?>"
                                            class="flex flex-col items-center justify-center p-6 bg-gradient-to-r from-<?php echo $subcategory->color ?>-500 to-<?php echo $subcategory->color ?>-600 text-white font-bold text-xl rounded-xl shadow-lg hover:from-<?php echo $subcategory->color ?>-600 hover:to-<?php echo $subcategory->color ?>-700 transition-all duration-300 transform hover:scale-105">
                                            <span class="mb-2 text-4xl"><?php echo $subcategory->icon ?></span>
                                            <?php echo $subcategory->subcategory ?>
                                        </a>



                                        <?php endforeach; ?>
                                    </div>

                                    <!-- zzzzzzzzzzzzz -->

                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    <a href="subcategory.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>
                                <?php endforeach; ?>
                            </form>
                        </div>

                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="subcategory.php">
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="categoryid">


                                                <?php
                                                    $query = "SELECT * FROM poscategory";
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
                                            class="col-sm-3 col-form-label col-form-label-sm">Sub Category Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="subcategory">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Sequence</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="sequence">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Icon</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="icon">
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
                                <h4 class="mb-3 text-primary">List of Sub Category --------------------------
                                </h4>
                                <?php
                                $currentdate = date("m-d-Y");
                                // $query = "SELECT * FROM possubcategory";
                                $query = "SELECT * 
                                FROM possubcategory
                                LEFT JOIN poscategory ON possubcategory.categoryid = poscategory.id";
                                $app = new App;
                                $subcategory = $app->selectAll($query);
                                ?>
                                <table class="table-striped table-head-fixed text-nowrap" style="font-size: 13px;"
                                    id="tablescript">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Sub Category</th>
                                            <th>Main Categor : Color</th>

                                            <th>Sequence</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($subcategory as $subcategorylist): ?>

                                        <tr>
                                            <td><?php echo $subcategorylist->subcatid ?></td>
                                            <td><?php echo $subcategorylist->subcategory ?></td>
                                            <td><?php echo $subcategorylist->category ?> : <i class='fas fa-square'
                                                    style='font-size:15px;color:<?php echo $subcategorylist->color ?> '></i>
                                            </td>
                                            <td><?php echo $subcategorylist->sequence ?></td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="subcategory.php?edit=<?php echo $subcategorylist->subcatid ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="subcategory.php?delete=<?php echo $subcategorylist->subcatid ?>"
                                                    class="text-danger">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-trash"></i>

                                                </a>

                                            </td>
                                        </tr>


                                        <?php endforeach; ?>
                                    </tbody>

                                    <?php require "../tablescript.php"; ?>
                                </table>


                            </div>


                        </div>

                        <!-- zzzzzzzzzz -->
                        <div class="col-md-12">
                            <h4 class="mb-3 text-primary">Preview
                            </h4>


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