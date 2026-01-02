<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM possubcategory where id='$id'";
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
    $query = "UPDATE possubcategory SET subcategory=:subcategory, categoryid=:categoryid, sequence=:sequence, icon=:icon WHERE tblsubcatid='$id'";
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
        <?php
        $id = $_GET['id'];
        $categoryname = $_GET['category'];

        ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Menu Sub Category Preview : <?php echo $categoryname ?> : <a
                                class="btn btn-primary text-right" href="menuview.php">
                                Back
                                to Main
                                Category</a> </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $categoryid = $_GET['id'];

                        $query = "SELECT * FROM poscategory where id=$categoryid ";
                        $app = new App;
                        $categorys = $app->selectAll($query);

                        $query = "SELECT * FROM possubcategory where categoryid=$categoryid ORDER BY sequence ASC";
                        $app = new App;
                        $subcategorys = $app->selectAll($query);

                        ?>

                        <?php foreach ($categorys as $category): ?>
                        <?php foreach ($subcategorys as $subcategory): ?>
                        <!-- /.Personal Details -->
                        <div class="col-md-2 mb-3">

                            <!-- Main Courses Category Button -->
                            <!-- Main Courses subcategory Button -->
                            <a href="menuviewlist.php?id=<?php echo $subcategory->subcatid ?>&categoryid=<?php echo $categoryid ?>&category=<?php echo $categoryname ?>&subcategory=<?php echo $subcategory->subcategory ?>"
                                class="flex flex-col items-center justify-center text-center p-6 bg-gradient-to-r from-<?php echo $category->color ?>-500 to-<?php echo $category->color ?>-600 text-white font-bold text-lg rounded-xl shadow-lg hover:from-<?php echo $category->color ?>-600 hover:to-<?php echo $category->color ?>-700 transition-all duration-300 transform hover:scale-105">
                                <span class="mb-2 text-2xl"><?php echo $subcategory->icon ?></span>
                                <?php echo $subcategory->subcategory ?>
                            </a>
                        </div>
                        <?php endforeach; ?>
                        <?php endforeach; ?>


















                    </div>


                </div>

            </div>




        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>