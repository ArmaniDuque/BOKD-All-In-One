<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM postablecategory where id='$id'";
    $app = new App;
    $path = "category.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $color = $_POST['color'];
    $category = $_POST['category'];
    $sequence = $_POST['sequence'];
    $icon = $_POST['icon'];
    $others = $_POST['others'];
    $query = "INSERT INTO postablecategory (category, sequence, icon, color, others)
VALUES( :category, :sequence, :icon, :color, :others)";
    $arr = [
        ":color" => $color,
        ":category" => $category,
        ":sequence" => $sequence,
        ":icon" => $icon,
        ":others" => $others
    ];
    $path = "category.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $color = $_POST['color'];
    $sequence = $_POST['sequence'];
    $icon = $_POST['icon'];
    $others = $_POST['others'];
    $query = "UPDATE postablecategory SET category=:category, color=:color, sequence=:sequence, icon=:icon, others=:others WHERE id='$id'";
    $arr = [
        ":color" => $color,
        ":category" => $category,
        ":sequence" => $sequence,
        ":icon" => $icon,
        ":others" => $others,
    ];

    $path = "category.php?edit=$id";
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
    <!-- Table Main content -->
    <section class="content">
        <!-- Default box -->

        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Table Main Category</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM postablecategory where id='$id'";
                            $app = new App;
                            $category1s = $app->selectAll($query); ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="category.php">
                                <?php foreach ($category1s as $category1): ?>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Table Main
                                            Category</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $category1->id ?>">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="category" value="<?php echo $category1->category ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Color</label>
                                        <div class="col-sm-8">



                                            <select name="color" class="form-control form-control-sm"
                                                id="colFormLabelSm">
                                                <option value="<?php echo $category1->color ?>">
                                                    <?php echo $category1->color ?>
                                                </option>
                                                <option value="red">red</option>
                                                <option value="orange">orange</option>
                                                <option value="amber">amber</option>
                                                <option value="yellow"> yellow</option>
                                                <option value="lime">lime</option>
                                                <option value="green"> green</option>
                                                <option value="emerald"> emerald</option>
                                                <option value="teal"> teal</option>
                                                <option value="cyan"> cyan</option>
                                                <option value="sky">sky</option>
                                                <option value="blue">blue</option>
                                                <option value="indigo">indigo</option>
                                                <option value="violet">violet</option>
                                                <option value="purple">purple</option>
                                                <option value="fuchsia">fuchsia</option>
                                                <option value="pink">pink</option>
                                                <option value="rose">rose</option>
                                                <option value="slate">slate</option>
                                                <option value="gray">gray</option>
                                                <option value="zinc">zinc</option>
                                                <option value="neutral">neutral</option>
                                                <option value="stone">stone</option>

                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Sequence</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="sequence" value="<?php echo $category1->sequence ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Icon</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="icon" value="<?php echo $category1->icon ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Others</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="others" value="<?php echo $category1->others ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="colFormLabelSm"
                                        class="col-sm-12 col-form-label col-form-label-sm text-center">Preview</label>
                                    <?php
                                            $query = "SELECT * FROM postablecategory WHERE id='$category1->id'";
                                            $app = new App;
                                            $categorys = $app->selectAll($query);

                                            ?>
                                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
                                        <?php foreach ($categorys as $category): ?>



                                        <!-- Table Main Courses Table Main Category Button -->
                                        <a href="subcategory.php?id=<?php echo $category->id ?>"
                                            class="flex flex-col items-center justify-center p-6 bg-gradient-to-r from-<?php echo $category->color ?>-500 to-<?php echo $category->color ?>-600 text-white font-bold text-xl rounded-xl shadow-lg hover:from-<?php echo $category->color ?>-600 hover:to-<?php echo $category->color ?>-700 transition-all duration-300 transform hover:scale-105">
                                            <span class="mb-2 text-4xl"><?php echo $category->icon ?></span>
                                            <?php echo $category->category ?>
                                        </a>



                                        <?php endforeach; ?>
                                    </div>

                                    <!-- zzzzzzzzzzzzz -->

                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    <a href="category.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>
                                <?php endforeach; ?>
                            </form>
                        </div>

                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="category.php">
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Table Main
                                            Category</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="category">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Color</label>
                                        <div class="col-sm-8">


                                            <select name="color" class="form-control form-control-sm"
                                                id="colFormLabelSm">
                                                <option value="red">red</option>
                                                <option value="orange">orange</option>
                                                <option value="amber">amber</option>
                                                <option value="yellow"> yellow</option>
                                                <option value="lime">lime</option>
                                                <option value="green"> green</option>
                                                <option value="emerald"> emerald</option>
                                                <option value="teal"> teal</option>
                                                <option value="cyan"> cyan</option>
                                                <option value="sky">sky</option>
                                                <option value="blue">blue</option>
                                                <option value="indigo">indigo</option>
                                                <option value="violet">violet</option>
                                                <option value="purple">purple</option>
                                                <option value="fuchsia">fuchsia</option>
                                                <option value="pink">pink</option>
                                                <option value="rose">rose</option>
                                                <option value="slate">slate</option>
                                                <option value="gray">gray</option>
                                                <option value="zinc">zinc</option>
                                                <option value="neutral">neutral</option>
                                                <option value="stone">stone</option>

                                            </select>
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
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Other</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="others">
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
                                <h4 class="mb-3 text-primary">List of Table Main Category --------------------------
                                </h4>
                                <?php
                                $currentdate = date("m-d-Y");
                                $query = "SELECT * FROM postablecategory";
                                $app = new App;
                                $category = $app->selectAll($query);
                                ?>
                                <table class="table-striped table-head-fixed text-nowrap" style="font-size: 13px;"
                                    id="tablescript">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Table Main Category</th>
                                            <th>Color</th>

                                            <th>Sequence</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($category as $categorylist): ?>

                                        <tr>
                                            <td><?php echo $categorylist->id ?></td>
                                            <td><?php echo $categorylist->category ?></td>
                                            <td><?php echo $categorylist->color ?> : <i class='fas fa-square'
                                                    style='font-size:15px;color:<?php echo $categorylist->color ?> '></i>
                                            </td>
                                            <td><?php echo $categorylist->sequence ?></td>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="category.php?edit=<?php echo $categorylist->id ?>"
                                                    class="text-success">&nbsp;&nbsp;
                                                    <i class="nav-icon fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="category.php?delete=<?php echo $categorylist->id ?>"
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