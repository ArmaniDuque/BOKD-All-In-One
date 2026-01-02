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
                <script src="https://cdn.tailwindcss.com"></script>
                <link rel="stylesheet" href="kitchen-style.css">

                <?php //require "navbar.php"; ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Table Main content -->
    <section class="content">
        <!-- Default box -->



        <div class="container-fluid">
            <div class="kitchen-container">
                <h1>Kitchen Orders</h1>
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
                            </li>
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Spring Rolls <span>x1</span></span>
                                    <span class="item-price">$5.99</span>
                                </div>
                            </li>
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Mango Sticky Rice <span>x1</span></span>
                                    <span class="item-price">$8.50</span>
                                </div>
                                <p class="item-remarks">Note: Separate coconut milk.</p>
                            </li>
                        </ul>
                        <div class="order-total">Total: $34.47</div>
                        <div class="order-status status-Pending">Pending</div>
                        <div class="order-actions">
                            <button class="status-btn" data-status="Accepted">Accept Order</button>
                            <button class="status-btn" data-status="Preparing">Preparing Order</button>
                            <button class="status-btn" data-status="Served">Serving Order</button>
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
                            </li>
                        </ul>
                        <div class="order-total">Total: $12.99</div>
                        <div class="order-status status-Accepted">Accepted</div>
                        <div class="order-actions">
                            <button class="status-btn current-status" data-status="Accepted" disabled>Accept
                                Order</button>
                            <button class="status-btn" data-status="Preparing">Preparing Order</button>
                            <button class="status-btn" data-status="Served">Serving Order</button>
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
                            </li>
                            <li class="order-item">
                                <div class="item-main-details">
                                    <span class="item-name-qty">Jasmine Rice <span>x2</span></span>
                                    <span class="item-price">$5.00</span>
                                </div>
                                <p class="item-remarks">Note: In separate containers.</p>
                            </li>
                        </ul>
                        <div class="order-total">Total: $30.98</div>
                        <div class="order-status status-Preparing">Preparing</div>
                        <div class="order-actions">
                            <button class="status-btn" data-status="Accepted">Accept Order</button>
                            <button class="status-btn current-status" data-status="Preparing" disabled>Preparing
                                Order</button>
                            <button class="status-btn" data-status="Served">Serving Order</button>
                        </div>
                    </div>

                    <div class="order-card">
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
                            </li>
                        </ul>
                        <div class="order-total">Total: $9.50</div>
                        <div class="order-status status-Served">Served</div>
                        <div class="order-actions">
                            <button class="status-btn" data-status="Accepted">Accept Order</button>
                            <button class="status-btn" data-status="Preparing">Preparing Order</button>
                            <button class="status-btn current-status" data-status="Served" disabled>Serving
                                Order</button>
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