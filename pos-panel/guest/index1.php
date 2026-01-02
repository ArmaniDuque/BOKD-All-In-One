<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
  <h1>Accounts</h1>
    </div> -->
                <!-- <script src="https://cdn.tailwindcss.com"></script> -->
                <link rel="stylesheet" href="style.css">

                <?php //require "navbar.php"; ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Table Main content -->
    <section class="content">
        <!-- Default box -->



        <div class="container-fluid col-8">


            <div class="menu-container">
                <h1>Our Menu</h1>

                <div class="menu-tabs">
                    <?php
                    $query = "SELECT * FROM poscategory";
                    $app = new App;
                    $categorys = $app->selectAll($query);
                    ?>
                    <?php foreach ($categorys as $category): ?>
                    <a class="tab-button btn active" href="index1.php?id=<?php echo $category->id ?>"
                        data-category="<?php echo $category->id ?>"><?php echo $category->category ?></a>

                    <?php endforeach; ?>
                </div>
                <?php if (isset($_GET['id'])): ?>

                <?php
                    $id = $_GET['id'] ?? 1;

                    $query = "SELECT * FROM poscategory where id=$id ";
                    $app = new App;
                    $categorys = $app->selectAll($query);

                    $query = "SELECT * FROM possubcategory where categoryid=$id ORDER BY sequence ASC";
                    $app = new App;
                    $subcategorys = $app->selectAll($query);
                    ?>
                <?php foreach ($categorys as $category): ?>
                <?php foreach ($subcategorys as $subcategory): ?>
                <div id="<?php echo $category->id ?>" class="menu-content active">
                    <div class="subcategory">
                        <h2><?php echo $subcategory->subcategory ?></h2>
                        <ul>
                            <?php
                                        $query = "SELECT * FROM posmenu where subcategoryid=$subcategory->subcatid ";
                                        $app = new App;
                                        $menus = $app->selectAll($query);

                                        ?>

                            <?php foreach ($menus as $menu): ?>
                            <li data-id="food-app-<?php echo $menu->menuid ?>" data-name="<?php echo $menu->name ?>"
                                data-price="<?php echo $menu->price ?>">
                                <span class="item-details">
                                    <span class="item-name"><?php echo $menu->name ?></span>
                                    <span class="item-description"><?php echo $menu->description ?></span>
                                </span>
                                <span class="item-price">Php <?php echo $menu->price ?></span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                            <?php endforeach; ?>


                        </ul>
                    </div>

                </div>
                <?php endforeach; ?>
                <?php endforeach; ?>
                <?php else: ?>
                <?php
                    $id = $_GET['id'] ?? 1;

                    $query = "SELECT * FROM poscategory where id=$id ";
                    $app = new App;
                    $categorys = $app->selectAll($query);

                    $query = "SELECT * FROM possubcategory where categoryid=$id ORDER BY sequence ASC";
                    $app = new App;
                    $subcategorys = $app->selectAll($query);
                    ?>
                <?php foreach ($categorys as $category): ?>
                <?php foreach ($subcategorys as $subcategory): ?>
                <div id="<?php echo $category->id ?>" class="menu-content active">
                    <div class="subcategory">
                        <h2><?php echo $subcategory->subcategory ?></h2>
                        <ul>
                            <?php
                                        $query = "SELECT * FROM posmenu where subcategoryid=$subcategory->subcatid ";
                                        $app = new App;
                                        $menus = $app->selectAll($query);

                                        ?>

                            <?php foreach ($menus as $menu): ?>
                            <li data-id="food-app-<?php echo $menu->menuid ?>" data-name="<?php echo $menu->name ?>"
                                data-price="<?php echo $menu->price ?>">
                                <span class="item-details">
                                    <span class="item-name"><?php echo $menu->name ?></span>
                                    <span class="item-description"><?php echo $menu->description ?></span>
                                </span>
                                <span class="item-price">Php <?php echo $menu->price ?></span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                            <?php endforeach; ?>


                        </ul>
                    </div>

                </div>
                <?php endforeach; ?>
                <?php endforeach; ?>


                <?php endif; ?>

            </div>

            <div class="cart-panel">
                <h2>Your Order</h2>
                <ul id="cart-items">
                </ul>
                <div class="cart-summary">
                    <p>Total: <span id="cart-total">Php 0.00</span></p>
                    <button id="checkout-btn">Checkout</button>
                </div>
                <button class="close-cart-btn">&times;</button>
            </div>

            <button class="toggle-cart-btn">View Cart (<span id="cart-item-count">0</span>)</button>


            <script src="script.js"></script>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>