<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM posmenu where id='$id'";
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
    $query = "INSERT INTO posmenu (subcategoryid, name, price, categoryid, price1)
VALUES( :subcategoryid, :name, :price, :categoryid, :price1)";
    $arr = [
        ":categoryid" => $categoryid,
        ":subcategoryid" => $menu,
        ":name" => $name,
        ":price" => $price,
        ":price1" => $price1
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
    $query = "UPDATE posmenu SET subcategoryid=:subcategoryid, categoryid=:categoryid, name=:name, price=:price, price1=:price1 WHERE id='$id'";
    $arr = [
        ":categoryid" => $categoryid,
        ":subcategoryid" => $menu,
        ":name" => $name,
        ":price" => $price,
        ":price1" => $price1,
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
                            $query = "SELECT * FROM posmenu where id='$id'";

                            $app = new App;
                            $menu1s = $app->selectAll($query); ?>
                        <div class="col-md-4 mb-3 ">
                            <form method="POST" action="menulist.php">
                                <?php foreach ($menu1s as $menu1): ?>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Menu</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" class="form-control form-control-sm"
                                                id="colFormLabelSm" name="id" value="<?php echo $menu1->id ?>">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="subcategoryid" value="<?php echo $menu1->subcategoryid ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Color</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="categoryid" value="<?php echo $menu1->categoryid ?>">
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
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Icon</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="price" value="<?php echo $menu1->price ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Others</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="price1" value="<?php echo $menu1->price1 ?>">
                                        </div>
                                    </div>
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
                                            class="col-sm-3 col-form-label col-form-label-sm">Menu List</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="subcategoryid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Color</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="categoryid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Sequence</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Icon</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm"
                                                name="price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">

                                    <div class="form-group row">
                                        <label for="colFormLabelSm"
                                            class="col-sm-3 col-form-label col-form-label-sm">Other</label>
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
                                LEFT JOIN poscategory ON posmenu.categoryid = poscategory.id
                                LEFT JOIN possubcategory ON posmenu.subcategoryid = possubcategory.id";
                                $app = new App;
                                $menu = $app->selectAll($query);
                                ?>
                                <table class="table table-striped " style="width:100%" id="history">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Menu</th>
                                            <th>Sub Category</th>

                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($menu as $menulist): ?>

                                        <tr>
                                            <td><?php echo $menulist->menuid ?></td>
                                            <td><?php echo $menulist->name ?></td>
                                            <td><?php echo $menulist->subcategory ?></td>
                                            <td><i class='fas fa-square'
                                                    style='font-size:15px;color:<?php echo $menulist->color ?> '></i> :
                                                <?php echo $menulist->category ?>
                                            </td>

                                            <td>
                                                <a style="text-decoration:none;"
                                                    href="menulist.php?edit=<?php echo $menulist->id ?>"
                                                    class="text-success">
                                                    <i class="nav-price fas fa fa-edit"></i>

                                                </a> |
                                                <a style="text-decoration:none;"
                                                    href="menulist.php?delete=<?php echo $menulist->id ?>"
                                                    class="text-danger">
                                                    <i class="nav-price fas fa fa-trash"></i>

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

                        <!-- zzzzzzzzzz -->
                        <div class="col-md-12">
                            <h4 class="mb-3 text-primary">Preview
                            </h4>

                            <div class="col-md-12">
                                <?php
                                // $query = "SELECT * FROM posmenu";
                                $query = "SELECT *
                                FROM posmenu
                                LEFT JOIN poscategory ON posmenu.categoryid = poscategory.id";
                                $app = new App;
                                $menus = $app->selectAll($query);

                                ?>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <?php foreach ($menus as $menu): ?>
                                    <div class="col-sm-10">


                                        <!-- Main Courses Menu Button -->
                                        <!-- <a href="submenulist.php?id=<?php echo $menu->id ?>"
                                class="flex flex-col items-center justify-center p-6 bg-gradient-to-r from-
                                <?php echo $menu->color ?>-500 to-
                                <?php echo $menu->color ?>-600 text-white font-bold text-xl rounded-xl shadow-lg
                                hover:from-
                                <?php echo $menu->color ?>-600 hover:to-
                                <?php echo $menu->color ?>-700 transition-all duration-300 transform hover:scale-105">
                                <span class="mb-2 text-4xl">
                                    <?php echo $menu->price ?>
                                </span>
                                <?php echo $menu->subcategoryid ?>
                                </a> -->



                                        <div class="row">
                                            <div class="col-sm-4"> <img src="../../img/menu-default.png"
                                                    alt="Menu Image" class="img-fluid"
                                                    style="height: 150px; object-fit: cover; margin:0 auto ;background:green;">
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="position-relative p-3 bg-gray" min-height="150">
                                                    <div class="ribbon-wrapper ribbon-lg">
                                                        <div
                                                            class="ribbon bg-success
                                                         <?php echo (isset($menu->status) && $menu->status == 0) ? 'bg-danger' : 'bg-success'; ?> ">


                                                            <?php echo (isset($menu->status) && $menu->status == 0) ? 'Not Available' : 'Available'; ?>
                                                        </div>
                                                    </div>
                                                    <?php echo $menu->name ?> <br> <?php echo $menu->price ?> <br>
                                                    <small><?php echo $menu->description ?></small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <?php endforeach; ?>
                                </div>

                                <!-- zzzzzzzzzzzzz -->

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