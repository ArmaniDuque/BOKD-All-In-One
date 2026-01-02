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
        $subcategoryid = $_GET['id'];
        $categoryid = $_GET['categoryid'];
        $categoryname = $_GET['category'];
        $subcategoryname = $_GET['subcategory'];
        $query = "SELECT * FROM possubcategory where subcatid=$subcategoryid";
        $app = new App;
        $subcategorys = $app->selectAll($query);

        ?>
        <?php foreach ($subcategorys as $subcategory): ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Menu List Preview : <?php echo $subcategoryname ?> : <a
                                class="btn btn-primary text-right"
                                href="menusubcategory.php?id=<?php echo $categoryid; ?>&category=<?php echo $categoryname; ?>">
                                Back
                                to Sub
                                Category</a> </h1>




                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                            $query = "SELECT * FROM posmenu where subcategoryid=$subcategoryid ";
                            $app = new App;
                            $menus = $app->selectAll($query);

                            ?>

                        <?php foreach ($menus as $menu): ?>
                        <!-- /.Personal Details -->
                        <div class="col-md-4 mb-3">

                            <!-- Main Courses Category Button -->
                            <!-- Main Courses subcategory Button -->
                            <div class="flex flex-col md:flex-row items-center md:items-start p-1 rounded-xl shadow-md relative
    <?php echo (isset($menu->status) && $menu->status == 0) ? 'bg-gray-200' : 'bg-green-50'; ?>">
                                <!-- Menu Item Image -->
                                <img src="https://placehold.co/100x100/A3BBAD/ffffff?text=<?php echo $menu->name ?>"
                                    alt="<?php echo $menu->name ?>" class="w-36 h-36 rounded-lg mr-1 mb-1 md:mb-0 object-cover
        <?php echo (isset($menu->status) && $menu->status == 0) ? 'grayscale' : ''; ?>">

                                <!-- Menu Item Details -->
                                <div class="flex-grow text-center md:text-left">
                                    <h2 class="text-lg font-semibold mb-2
            <?php echo (isset($menu->status) && $menu->status == 0) ? 'text-gray-600' : 'text-green-700'; ?>">
                                        <?php echo $menu->name ?>
                                    </h2>
                                    <p class="mb-3 text-sm font-italic
            <?php echo (isset($menu->status) && $menu->status == 0) ? 'text-gray-500' : 'text-gray-700'; ?>">
                                        <?php echo $menu->description ?>
                                    </p>
                                    <span
                                        class="text-2xl font-bold
            <?php echo (isset($menu->status) && $menu->status == 0) ? 'text-gray-600 line-through' : 'text-green-800'; ?>">
                                        <?php echo $menu->price ?>
                                    </span>
                                </div>

                                <!-- "Out of Order" Overlay (Only shows if $menu->status is 0) -->
                                <?php if (isset($menu->status) && $menu->status == 0): ?>
                                <div
                                    class="absolute inset-0 bg-red-500 bg-opacity-75 flex items-center justify-center rounded-xl z-10">
                                    <span
                                        class="text-white text-2xl md:text-3xl font-extrabold uppercase transform rotate-12 -translate-y-1">
                                        Out of Order
                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>


















                    </div>


                </div>

            </div>




        </div>
        <?php endforeach; ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>