<?php require "../../header.php"; ?>
<?php require "../sidebar.php"; ?>
<?php

if (isset($_POST['acceptorder'])) {
    echo $orderid = $_POST['orderid'];
    echo $overallstatus = 'Accepted';
    $query = "UPDATE posorder SET overallstatus=:overallstatus WHERE orderid='$orderid'";
    $arr = [
        ":overallstatus" => $overallstatus,
    ];

    $path = "index.php";
    $app->update($query, $arr, $path);
}
if (isset($_POST['preparingorderitem'])) {
    echo $orderitemid = $_POST['orderitemid'];
    echo $status = 'Preparing';
    $query = "UPDATE posorderitems SET status=:status WHERE orderitemid='$orderitemid'";
    $arr = [
        ":status" => $status,
    ];
    $path = "index.php";
    $app->update($query, $arr, $path);
}
if (isset($_POST['servingorederitem'])) {
    echo $orderitemid = $_POST['orderitemid'];
    echo $status = 'Served';
    $query = "UPDATE posorderitems SET status=:status WHERE orderitemid='$orderitemid'";
    $arr = [
        ":status" => $status,
    ];
    $path = "index.php";
    $app->update($query, $arr, $path);
}
if (isset($_POST['doneorder'])) {
    echo 'doneorder';
}

?>
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
                <link rel="stylesheet" href="kitchen-style.css">

                <?php //require "navbar.php"; ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Table Main content -->
    <section class="content">
        <!-- Default box -->


        <?php require "test.php"; ?>

        <div class="container-fluid">
            <div class="kitchen-container">
                <h1>Kitchen Orders Layouts</h1>
                <div id="orders-list">
                    <div class="order-card">
                        <div class="order-header">
                            <span class="order-id">Order ID: ABCDEF01</span>
                            <span class="order-timestamp">2025-07-09 13:30:00</span>
                        </div>
                        <ul class="order-items-list">
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Spicy Noodles <span>x2</span></span>
                                    <span class="item-price">$19.98</span>
                                </div>
                                <p class="item-remarks">Note: Extra spicy, no cilantro.</p>
                                <div class="item-status-actions">
                                    <span class="item-current-status status-Item_Pending">Pending</span>
                                    <div class="item-buttons">
                                        <button class="item-action-btn preparing-btn">Preparing</button>
                                        <button class="item-action-btn serving-btn">Serving</button>
                                    </div>
                                </div>
                            </li>
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Spring Rolls <span>x1</span></span>
                                    <span class="item-price">$5.99</span>
                                </div>
                                <div class="item-status-actions">
                                    <span class="item-current-status status-Item_Pending">Pending</span>
                                    <div class="item-buttons">
                                        <button class="item-action-btn preparing-btn">Preparing</button>
                                        <button class="item-action-btn serving-btn">Serving</button>
                                    </div>
                                </div>
                            </li>
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Mango Sticky Rice <span>x1</span></span>
                                    <span class="item-price">$8.50</span>
                                </div>
                                <p class="item-remarks">Note: Separate coconut milk.</p>
                                <div class="item-status-actions">
                                    <span class="item-current-status status-Item_Pending">Pending</span>
                                    <div class="item-buttons">
                                        <button class="item-action-btn preparing-btn">Preparing</button>
                                        <button class="item-action-btn serving-btn">Serving</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="order-total">Total: $34.47</div>
                        <div class="order-status status-Pending">Pending</div>
                        <div class="order-actions">
                            <button class="overall-status-btn accept-order-btn">Accept Order</button>
                        </div>
                    </div>

                    <div class="order-card">
                        <div class="order-header">
                            <span class="order-id">Order ID: GHIJKL02</span>
                            <span class="order-timestamp">2025-07-09 13:25:00</span>
                        </div>
                        <ul class="order-items-list">
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Chicken Pad Thai <span>x1</span></span>
                                    <span class="item-price">$12.99</span>
                                </div>
                                <p class="item-remarks">Note: No peanuts, light sauce.</p>
                                <div class="item-status-actions">
                                    <span class="item-current-status status-Item_Preparing">Preparing</span>
                                    <div class="item-buttons">
                                        <button class="item-action-btn preparing-btn disabled"
                                            disabled>Preparing</button>
                                        <button class="item-action-btn serving-btn">Serving</button>
                                    </div>
                                </div>
                            </li>
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Garlic Bread <span>x2</span></span>
                                    <span class="item-price">$9.00</span>
                                </div>
                                <div class="item-status-actions">
                                    <span class="item-current-status status-Item_Pending">Pending</span>
                                    <div class="item-buttons">
                                        <button class="item-action-btn preparing-btn">Preparing</button>
                                        <button class="item-action-btn serving-btn">Serving</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="order-total">Total: $21.99</div>
                        <div class="order-status status-Accepted">Accepted</div>
                        <div class="order-actions">
                            <button class="overall-status-btn accept-order-btn disabled" disabled>Accept Order</button>
                        </div>
                    </div>

                    <div class="order-card">
                        <div class="order-header">
                            <span class="order-id">Order ID: MNOPQR03</span>
                            <span class="order-timestamp">2025-07-09 13:10:00</span>
                        </div>
                        <ul class="order-items-list">
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Green Curry <span>x2</span></span>
                                    <span class="item-price">$25.98</span>
                                </div>
                                <div class="item-status-actions">
                                    <span class="item-current-status status-Item_Preparing">Preparing</span>
                                    <div class="item-buttons">
                                        <button class="item-action-btn preparing-btn disabled"
                                            disabled>Preparing</button>
                                        <button class="item-action-btn serving-btn">Serving</button>
                                    </div>
                                </div>
                            </li>
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Jasmine Rice <span>x2</span></span>
                                    <span class="item-price">$5.00</span>
                                </div>
                                <p class="item-remarks">Note: In separate containers.</p>
                                <div class="item-status-actions">
                                    <span class="item-current-status status-Item_Served">Served</span>
                                    <div class="item-buttons">
                                        <button class="item-action-btn preparing-btn disabled"
                                            disabled>Preparing</button>
                                        <button class="item-action-btn serving-btn disabled" disabled>Serving</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="order-total">Total: $30.98</div>
                        <div class="order-status status-Preparing">Preparing</div>
                        <div class="order-actions">
                            <button class="overall-status-btn accept-order-btn disabled" disabled>Accept Order</button>
                        </div>
                    </div>

                    <div class="order-card served-order">
                        <div class="order-header">
                            <span class="order-id">Order ID: STUVWX04</span>
                            <span class="order-timestamp">2025-07-09 12:45:00</span>
                        </div>
                        <ul class="order-items-list">
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Tom Yum Soup <span>x1</span></span>
                                    <span class="item-price">$9.50</span>
                                </div>
                                <div class="item-status-actions">
                                    <span class="item-current-status status-Item_Served">Served</span>
                                    <div class="item-buttons">
                                        <button class="item-action-btn preparing-btn disabled"
                                            disabled>Preparing</button>
                                        <button class="item-action-btn serving-btn disabled" disabled>Serving</button>
                                    </div>
                                </div>
                            </li>
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Espresso <span>x3</span></span>
                                    <span class="item-price">$9.00</span>
                                </div>
                                <div class="item-status-actions">
                                    <span class="item-current-status status-Item_Served">Served</span>
                                    <div class="item-buttons">
                                        <button class="item-action-btn preparing-btn disabled"
                                            disabled>Preparing</button>
                                        <button class="item-action-btn serving-btn disabled" disabled>Serving</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="order-total">Total: $18.50</div>
                        <div class="order-status status-Done">Done</div>
                        <div class="order-actions">
                            <button class="overall-status-btn accept-order-btn disabled" disabled>Accept Order</button>
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