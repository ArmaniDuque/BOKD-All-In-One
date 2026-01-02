<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM posmenu where menuid='$id'";
    $app = new App;
    $path = "menulist.php";
    $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {
    $categoryid = $_POST['categoryid'];
    $menu = $_POST['subcategoryid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $price1 = $_POST['price1'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $query = "INSERT INTO posmenu (subcategoryid, name, description, price, categoryid, price1, status)
VALUES( :subcategoryid, :name, :description, :price, :categoryid, :price1, :status)";
    $arr = [
        ":categoryid" => $categoryid,
        ":subcategoryid" => $menu,
        ":name" => $name,
        ":price" => $price,
        ":price1" => $price1,
        ":description" => $description,
        ":status" => $status,

    ];
    $path = "menulist.php";
    $app->register($query, $arr, $path);
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $menu = $_POST['subcategoryid'];
    $categoryid = $_POST['categoryid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $price1 = $_POST['price1'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $query = "UPDATE posmenu SET subcategoryid=:subcategoryid, categoryid=:categoryid, name=:name, description=:description, price=:price, price1=:price1 , status=:status WHERE menuid='$id'";
    $arr = [
        ":categoryid" => $categoryid,
        ":subcategoryid" => $menu,
        ":name" => $name,
        ":price" => $price,
        ":price1" => $price1,
        ":description" => $description,
        ":status" => $status,
    ];

    $path = "menulist.php?edit=$id";
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
                    <h1 class="h5 mb-3"><b>Menu List</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- /.Personal Details -->

                        <?php if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM posmenu where menuid='$id'";

                            $app = new App;
                            $menu1s = $app->selectAll($query); ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="menulist.php">
                                <?php foreach ($menu1s as $menu1): ?>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Category</label>
                                        <div class="col-sm-8">


                                            <select class="custom-select" name="categoryid">

                                                <?php
                                                        $query = "SELECT * FROM poscategory WHERE id='$menu1->categoryid'";
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
                                            class="col-sm-3 col-form-label col-form-label-sm">Sub Category</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $menu1->menuid ?>">
                                            <select class="custom-select" name="subcategoryid">

                                                <?php
                                                        $query = "SELECT * FROM possubcategory WHERE subcatid='$menu1->subcategoryid'";
                                                        $app = new App;
                                                        $subcategorys = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($subcategorys as $subcategory): ?>
                                                <option value="<?php echo $subcategory->id ?>">
                                                    <?php echo $subcategory->subcategory ?>
                                                </option>
                                                <?php endforeach; ?>
                                                <?php
                                                        $query = "SELECT * FROM possubcategory";
                                                        $app = new App;
                                                        $subcategorys = $app->selectAll($query);
                                                        ?>
                                                <?php foreach ($subcategorys as $subcategory): ?>
                                                <option value="<?php echo $subcategory->id ?>">
                                                    <?php echo $subcategory->subcategory ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                            Menu Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="name" value="<?php echo $menu1->name ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                            Description</label>
                                        <div class="col-sm-8">

                                            <textarea name="description" id="colFormLabelSm"
                                                style="height: 100px;  resize: none;"
                                                class="form-control form-control-sm"><?php echo $menu1->description ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="price" value="<?php echo $menu1->price ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Price 1</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="price1" value="<?php echo $menu1->price1 ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Set Status To</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="status">


                                                <option value="0"
                                                    <?= (isset($menu1->status) && $menu1->status == 0) ? 'selected' : ''; ?>>
                                                    Not Available
                                                </option>
                                                <option value="1"
                                                    <?= (isset($menu1->status) && $menu1->status == 1) ? 'selected' : ''; ?>>
                                                    Available</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="colFormLabelSm"
                                        class="col-sm-12 col-form-label col-form-label-sm text-center">Preview</label>
                                    <?php
                                            // $query = "SELECT * FROM posmenu";
                                            $query = "SELECT * FROM posmenu
                                LEFT JOIN poscategory ON posmenu.categoryid = poscategory.id WHERE menuid='$id'";
                                            $app = new App;
                                            $menus = $app->selectAll($query);
                                            ?>

                                    <?php foreach ($menus as $menu): ?>
                                    <div class=" flex flex-col md:flex-row items-left md:items-start p-1 m-2 rounded-xl shadow-md relative
    <?php echo (isset($menu1->status) && $menu1->status == 0) ? 'bg-gray-200' : 'bg-green-50'; ?>">
                                        <!-- Menu Item Image -->
                                        <img src="https://placehold.co/100x100/A3BBAD/ffffff?text=<?php echo $menu->name ?>"
                                            alt="<?php echo $menu->name ?>" class="w-36 h-36 rounded-lg mr-1 mb-1 md:mb-0 object-cover
        <?php echo (isset($menu1->status) && $menu1->status == 0) ? 'grayscale' : ''; ?>">

                                        <!-- Menu Item Details -->
                                        <div class="flex-grow text-center md:text-left">
                                            <h2 class="text-lg font-semibold mb-2
            <?php echo (isset($menu->status) && $menu->status == 0) ? 'text-gray-600' : 'text-green-700'; ?>">
                                                <?php echo $menu->name ?>
                                            </h2>
                                            <p
                                                class="mb-3 text-sm font-italic
                                                <?php echo (isset($menu->status) && $menu->status == 0) ? 'text-gray-500' : 'text-gray-700'; ?>">
                                                <?php echo $menu->description ?>
                                            </p>
                                            <span
                                                class="text-2xl font-bold
                                                <?php echo (isset($menu->status) && $menu->status == 0) ? 'text-gray-600 line-through' : 'text-green-800'; ?>">
                                                <?php echo $menu->price ?>
                                            </span>
                                        </div>

                                        <!-- "Out of Order" Overlay (Only shows if $menu1->status is 0) -->
                                        <?php if (isset($menu1->status) && $menu1->status == 0): ?>
                                        <div
                                            class="absolute inset-0 bg-red-500 bg-opacity-75 flex items-center justify-center rounded-xl z-10">
                                            <span
                                                class="text-white text-2xl md:text-3xl font-extrabold uppercase transform rotate-12 -translate-y-1">
                                                Out of Order
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endforeach; ?>


                                </div>
                                <div class="pb-5 pt-3">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    <a href="menulist.php" class="btn btn-outline-dark ml-3">Close</a>

                                </div>
                                <?php endforeach; ?>
                            </form>
                        </div>

                        <?php } else { ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="menulist.php">

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
                                            class="col-sm-3 col-form-label col-form-label-sm">Sub Category</label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="subcategoryid">
                                                <?php
                                                    $query = "SELECT * FROM possubcategory";
                                                    $app = new App;
                                                    $subcategorys = $app->selectAll($query);
                                                    ?>
                                                <?php foreach ($subcategorys as $subcategory): ?>
                                                <option value="<?php echo $subcategory->id ?>">
                                                    <?php echo $subcategory->subcategory ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Menu Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
                                            Description</label>
                                        <div class="col-sm-8">

                                            <textarea name="description" id="colFormLabelSm"
                                                style="height: 100px;  resize: none;"
                                                class="form-control form-control-sm"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Price 1</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="price1">
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
                                <h4 class="mb-3 text-primary">List of Menu List --------------------------
                                </h4>
                                <?php
                                $currentdate = date("m-d-Y");
                                // $query = "SELECT * FROM posmenu";
                                $query = "SELECT *
                                FROM posmenu
                                LEFT JOIN possubcategory ON posmenu.subcategoryid = possubcategory.subcatid
                                LEFT JOIN poscategory ON possubcategory.categoryid = poscategory.id";
                                $app = new App;
                                $menu = $app->selectAll($query);
                                ?>
                                <table class="table-striped table-head-fixed text-nowrap" style="font-size: 13px;"
                                    id="tablescript">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Price : Price 1</th>
                                            <th>Status</th>
                                            <th>Menu</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($menu as $menulist): ?>

                                        <tr>
                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="menulist.php?edit=<?php echo $menulist->menuid ?>"
                                                    class="text-success">
                                                    <i class="nav-price fas fa fa-edit"></i>
                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="menulist.php?delete=<?php echo $menulist->menuid ?>"
                                                    class="text-danger">
                                                    <i class="nav-price fas fa fa-trash"></i>

                                                </a>

                                            </td>

                                            <td><?php echo $menulist->price ?> : <?php echo $menulist->price1 ?></td>
                                            <td>
                                                <?php echo (isset($menulist->status) && $menulist->status == 0) ? 'Not Available' : 'Available'; ?>
                                            </td>
                                            <td><?php echo $menulist->name ?></td>
                                            <td><?php echo $menulist->description ?></td>
                                            <td><i class='fas fa-square'
                                                    style='font-size:15px;color:<?php echo $menulist->color ?> '></i> :
                                                <?php echo $menulist->category ?>
                                            </td>

                                            <td><?php echo $menulist->subcategory ?></td>


                                        </tr>


                                        <?php endforeach; ?>
                                    </tbody>

                                    <?php require "../tablescript.php"; ?>


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