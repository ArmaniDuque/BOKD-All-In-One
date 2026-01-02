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
                    <button class="tab-button"
                        data-category="<?php echo $category->id ?>"><?php echo $category->category ?></button>
                    <!-- <button class="tab-button" data-category="drinks">Drinks</button>
                    <button class="tab-button" data-category="beverage">Beverage</button> -->
                    <?php endforeach; ?>
                </div>

                <?php
                $query = "SELECT *
FROM poscategory
LEFT JOIN possubcategory
  ON poscategory.id = possubcategory.categoryid  -- Links categories to their subcategories
LEFT JOIN posmenu
  ON possubcategory.subcatid = posmenu.subcategoryid";
                $app = new App;
                $categorys = $app->selectAll($query);
                ?>
                <?php foreach ($categorys as $category): ?>

                <div id="<?php echo $category->id ?>" class="menu-content active">
                    <div class="subcategory">
                        <h2><?php echo $category->subcategory ?></h2>
                        <ul>
                            <?php
                                $query = "SELECT * FROM posmenu WHERE subcategoryid='$category->subcategory'";
                                $app = new App;
                                $menus = $app->selectAll($query);
                                ?>
                            <?php foreach ($menus as $menu): ?>

                            <li data-id="food-app-<?php echo $category->id ?>" data-name="<?php echo $menu->name ?>"
                                data-price="<?php echo $menu->price ?>">
                                <span class="item-details">
                                    <span class="item-name"><?php echo $menu->name ?></span>
                                    <span class="item-description"><?php echo $menu->description ?></span>
                                </span>
                                <span class="item-price"><?php echo $menu->price ?></span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                            <?php endforeach; ?>


                        </ul>
                    </div>

                    <?php endforeach; ?>


                    <!-- <div class="subcategory">
                        <h2>Main Course</h2>
                        <ul>
                            <li data-id="food-main-salmon" data-name="Grilled Salmon" data-price="18.99">
                                <span class="item-details">
                                    <span class="item-name">Grilled Salmon</span>
                                    <span class="item-description">Served with roasted vegetables and lemon butter
                                        sauce.</span>
                                </span>
                                <span class="item-price">$18.99</span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                            <li data-id="food-main-adobo" data-name="Chicken Adobo" data-price="14.00">
                                <span class="item-details">
                                    <span class="item-name">Chicken Adobo</span>
                                    <span class="item-description">Classic Filipino dish with rice.</span>
                                </span>
                                <span class="item-price">$14.00</span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                        </ul>
                    </div> -->
                </div>



                <!-- <div id="2" class="menu-content">
                    <div class="subcategory">
                        <h2>Hot Coffee</h2>
                        <ul>
                            <li data-id="drinks-hot-espresso" data-name="Espresso" data-price="3.00">
                                <span class="item-details">
                                    <span class="item-name">Espresso</span>
                                    <span class="item-description">Strong, concentrated coffee.</span>
                                </span>
                                <span class="item-price">$3.00</span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                            <li data-id="drinks-hot-latte" data-name="Latte" data-price="4.50">
                                <span class="item-details">
                                    <span class="item-name">Latte</span>
                                    <span class="item-description">Espresso with steamed milk and a thin layer of
                                        foam.</span>
                                </span>
                                <span class="item-price">$4.50</span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                        </ul>
                    </div>
                    <div class="subcategory">
                        <h2>Cold Drinks</h2>
                        <ul>
                            <li data-id="drinks-cold-icedtea" data-name="Iced Tea" data-price="3.50">
                                <span class="item-details">
                                    <span class="item-name">Iced Tea</span>
                                    <span class="item-description">Refreshing black tea over ice.</span>
                                </span>
                                <span class="item-price">$3.50</span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                            <li data-id="drinks-cold-orangejuice" data-name="Fresh Orange Juice" data-price="5.00">
                                <span class="item-details">
                                    <span class="item-name">Fresh Orange Juice</span>
                                    <span class="item-description">Freshly squeezed oranges.</span>
                                </span>
                                <span class="item-price">$5.00</span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="3" class="menu-content">
                    <div class="subcategory">
                        <h2>Vodka</h2>
                        <ul>
                            <li data-id="beverage-vodka-absolut" data-name="Absolut" data-price="7.00">
                                <span class="item-details">
                                    <span class="item-name">Absolut</span>
                                    <span class="item-description">Smooth and versatile.</span>
                                </span>
                                <span class="item-price">$7.00 / shot</span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                            <li data-id="beverage-vodka-smirnoff" data-name="Smirnoff" data-price="6.00">
                                <span class="item-details">
                                    <span class="item-name">Smirnoff</span>
                                    <span class="item-description">Triple distilled for purity.</span>
                                </span>
                                <span class="item-price">$6.00 / shot</span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                        </ul>
                    </div>
                    <div class="subcategory">
                        <h2>Whiskey</h2>
                        <ul>
                            <li data-id="beverage-whiskey-johnniewalker" data-name="Johnnie Walker Red Label"
                                data-price="8.00">
                                <span class="item-details">
                                    <span class="item-name">Johnnie Walker Red Label</span>
                                    <span class="item-description">Bold and vibrant.</span>
                                </span>
                                <span class="item-price">$8.00 / shot</span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                            <li data-id="beverage-whiskey-jameson" data-name="Jameson Irish Whiskey" data-price="7.50">
                                <span class="item-details">
                                    <span class="item-name">Jameson Irish Whiskey</span>
                                    <span class="item-description">Smooth and balanced.</span>
                                </span>
                                <span class="item-price">$7.50 / shot</span>
                                <button class="add-to-cart-btn">Add to Cart</button>
                            </li>
                        </ul>
                    </div>
                </div> -->
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