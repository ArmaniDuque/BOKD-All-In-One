<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Orders List</title>
    <link rel="stylesheet" href="orders-list-style.css">
</head>

<body>
    <div class="orders-list-container">
        <h1>Active Orders Dashboard</h1>

        <div class="filter-controls">
            <label for="statusFilter">Filter by Status:</label>
            <select id="statusFilter">
                <option value="all">All Active Orders</option>
                <option value="Pending">Pending</option>
                <option value="Accepted">Accepted</option>
                <option value="Preparing">Preparing</option>
                <option value="Done">Done (Ready for Dispatch)</option>
                <option value="Out for Delivery">Out for Delivery</option>
            </select>

            <label for="searchOrders">Search Order ID / Customer:</label>
            <input type="text" id="searchOrders" placeholder="Search...">
            <button class="search-btn">Go</button>
        </div>

        <div id="orders-cards-container">
            <div class="order-card status-pending">
                <div class="card-header">
                    <span class="order-id">#ORD-00123</span>
                    <span class="order-time">2025-07-09 20:15:30</span>
                </div>
                <div class="card-body">
                    <p><strong>Customer:</strong> Anonymous Guest</p>
                    <p><strong>Total Items:</strong> 3 items</p>
                    <p class="item-summary">Chicken Adobo (x2), Garlic Rice (x1)</p>
                    <p><strong>Total:</strong> ₱ 635.00</p>
                </div>
                <div class="card-footer">
                    <span class="order-overall-status status-tag-pending">Pending</span>
                    <div class="order-actions">
                        <button class="action-btn view-details-btn">View Details</button>
                        <button class="action-btn print-bill-btn">Print Billout</button>
                    </div>
                </div>
            </div>

            <div class="order-card status-done">
                <div class="card-header">
                    <span class="order-id">#ORD-00120</span>
                    <span class="order-time">2025-07-09 19:45:10</span>
                </div>
                <div class="card-body">
                    <p><strong>Customer:</strong> Juan Dela Cruz</p>
                    <p><strong>Total Items:</strong> 2 items</p>
                    <p class="item-summary">Beef Caldereta (x1), Bottled Water (x1)</p>
                    <p><strong>Total:</strong> ₱ 420.00</p>
                </div>
                <div class="card-footer">
                    <span class="order-overall-status status-tag-done">Done</span>
                    <div class="order-actions">
                        <button class="action-btn view-details-btn">View Details</button>
                        <button class="action-btn print-bill-btn">Print Billout</button>
                    </div>
                </div>
            </div>

            <div class="order-card status-out-for-delivery">
                <div class="card-header">
                    <span class="order-id">#ORD-00115</span>
                    <span class="order-time">2025-07-09 18:30:00</span>
                </div>
                <div class="card-body">
                    <p><strong>Customer:</strong> Maria Santos</p>
                    <p><strong>Total Items:</strong> 4 items</p>
                    <p class="item-summary">Pancit Canton (x1), Lumpiang Shanghai (x2)</p>
                    <p><strong>Total:</strong> ₱ 780.00</p>
                    <p class="dispatch-info">Rider: Jake (Est. Arr: 15 mins)</p>
                </div>
                <div class="card-footer">
                    <span class="order-overall-status status-tag-out-for-delivery">Out for Delivery</span>
                    <div class="order-actions">
                        <button class="action-btn view-details-btn">View Details</button>
                        <button class="action-btn print-bill-btn">Print Billout</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>