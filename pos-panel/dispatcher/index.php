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
                <link rel="stylesheet" href="dispatcher-style.css">

                <?php //require "navbar.php"; ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Table Main content -->
    <section class="content">
        <!-- Default box -->



        <div class="container-fluid">
            <div class="dispatcher-container">
                <h1>Dispatcher Dashboard</h1>

                <div class="status-filter">
                    <button class="filter-btn active" data-filter="all">All Orders</button>
                    <button class="filter-btn" data-filter="Done">Ready for Dispatch</button>
                    <button class="filter-btn" data-filter="Out for Delivery">Out for Delivery</button>
                    <button class="filter-btn" data-filter="Delivered">Delivered</button>
                </div>

                <div id="dispatcher-orders-list">

                    <div class="order-card status-Done">
                        <div class="order-header">
                            <span class="order-id">Order ID: XYZ78901</span>
                            <span class="order-timestamp">2025-07-09 14:00:00</span>
                        </div>
                        <p class="customer-info"><strong>Customer ID:</strong> user1234...</p>
                        <p class="delivery-address"><strong>Address:</strong> Block 5, Lot 10, Brgy. Central</p>
                        <ul class="order-items-summary">
                            <li>
                                <span>Chicken Adobo <span class="item-qty">x2</span></span>
                                <span>$24.00</span>
                            </li>
                            <li>
                                <span>Rice <span class="item-qty">x2</span></span>
                                <span>$5.00</span>
                            </li>
                        </ul>
                        <div class="order-total">Total: $29.00</div>

                        <div class="dispatch-details">
                        </div>

                        <div class="dispatch-status dispatch-status-Done">Ready for Dispatch</div>

                        <div class="dispatcher-actions">
                            <input type="text" class="rider-input" placeholder="Enter Rider Name"
                                data-order-id="XYZ78901">
                            <button class="dispatcher-action-btn assign-rider-btn" data-order-id="XYZ78901"
                                data-action="assign-rider">Assign Rider / Pick Up</button>
                        </div>
                    </div>

                    <div class="order-card status-Out_for_Delivery">
                        <div class="order-header">
                            <span class="order-id">Order ID: ABC12345</span>
                            <span class="order-timestamp">2025-07-09 13:30:00</span>
                        </div>
                        <p class="customer-info"><strong>Customer ID:</strong> user5678...</p>
                        <p class="delivery-address"><strong>Address:</strong> 123 Main St, Anytown</p>
                        <ul class="order-items-summary">
                            <li>
                                <span>Beef Caldereta <span class="item-qty">x1</span></span>
                                <span>$15.00</span>
                            </li>
                            <li>
                                <span>Lumpiang Shanghai <span class="item-qty">x1</span></span>
                                <span>$8.00</span>
                            </li>
                        </ul>
                        <div class="order-total">Total: $23.00</div>

                        <div class="dispatch-details">
                            <p><strong>Rider:</strong> Mark Garcia</p>
                            <p><strong>Method:</strong> Delivery</p>
                            <p><strong>Dispatched:</strong> 2025-07-09 13:45:00</p>
                        </div>

                        <div class="dispatch-status dispatch-status-Out_for_Delivery">Out for Delivery</div>

                        <div class="dispatcher-actions">
                            <button class="dispatcher-action-btn mark-delivered-btn" data-order-id="ABC12345"
                                data-action="mark-delivered">Mark Delivered</button>
                        </div>
                    </div>

                    <div class="order-card status-Picked_Up">
                        <div class="order-header">
                            <span class="order-id">Order ID: PQR98765</span>
                            <span class="order-timestamp">2025-07-09 12:50:00</span>
                        </div>
                        <p class="customer-info"><strong>Customer ID:</strong> user9012...</p>
                        <p class="delivery-address"><strong>Address:</strong> Customer Pickup</p>
                        <ul class="order-items-summary">
                            <li>
                                <span>Pancit Bihon <span class="item-qty">x1</span></span>
                                <span>$10.00</span>
                            </li>
                        </ul>
                        <div class="order-total">Total: $10.00</div>

                        <div class="dispatch-details">
                            <p><strong>Rider:</strong> Pick Up</p>
                            <p><strong>Method:</strong> Pickup</p>
                            <p><strong>Dispatched:</strong> 2025-07-09 12:55:00</p>
                            <p><strong>Delivered/Picked Up:</strong> 2025-07-09 13:05:00</p>
                        </div>

                        <div class="dispatch-status dispatch-status-Picked_Up">Picked Up</div>

                        <div class="dispatcher-actions">
                            <button class="dispatcher-action-btn" disabled>Completed</button>
                        </div>
                    </div>

                    <div class="order-card status-Delivered">
                        <div class="order-header">
                            <span class="order-id">Order ID: DEF45678</span>
                            <span class="order-timestamp">2025-07-09 12:00:00</span>
                        </div>
                        <p class="customer-info"><strong>Customer ID:</strong> user3456...</p>
                        <p class="delivery-address"><strong>Address:</strong> Unit 7, Apt 2B, High Rise Bldg</p>
                        <ul class="order-items-summary">
                            <li>
                                <span>Halo-Halo <span class="item-qty">x2</span></span>
                                <span>$18.00</span>
                            </li>
                            <li>
                                <span>Ube Ice Cream <span class="item-qty">x1</span></span>
                                <span>$7.50</span>
                            </li>
                        </ul>
                        <div class="order-total">Total: $25.50</div>

                        <div class="dispatch-details">
                            <p><strong>Rider:</strong> Jane Dela Cruz</p>
                            <p><strong>Method:</strong> Delivery</p>
                            <p><strong>Dispatched:</strong> 2025-07-09 12:15:00</p>
                            <p><strong>Delivered/Picked Up:</strong> 2025-07-09 12:40:00</p>
                        </div>

                        <div class="dispatch-status dispatch-status-Delivered">Delivered</div>

                        <div class="dispatcher-actions">
                            <button class="dispatcher-action-btn" disabled>Completed</button>
                        </div>
                    </div>

                </div>
            </div>

            <script type="module" src="dispatcher-script.js"></script>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>