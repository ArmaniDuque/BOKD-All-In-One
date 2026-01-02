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

        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Menu Category Preview</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM poscategory";
                        $app = new App;
                        $categorys = $app->selectAll($query);
                        ?>
                        <?php foreach ($categorys as $category): ?>
                        <!-- /.Personal Details -->
                        <div class="col-md-2 mb-3">

                            <!-- Main Courses Main Category Button -->
                            <a href="menusubcategory.php?id=<?php echo $category->id ?>&category=<?php echo $category->category ?>"
                                class="flex flex-col items-center justify-center p-6 bg-gradient-to-r from-<?php echo $category->color ?>-500 to-<?php echo $category->color ?>-600 text-white font-bold text-xl rounded-xl shadow-lg hover:from-<?php echo $category->color ?>-600 hover:to-<?php echo $category->color ?>-700 transition-all duration-300 transform hover:scale-105">
                                <span class="mb-2 text-4xl"><?php echo $category->icon ?></span>
                                <?php echo $category->category ?>
                            </a>
                        </div>
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