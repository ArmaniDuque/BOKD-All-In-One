<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PH POS Transaction (PHP/MySQL)</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="pos-container">
        <header class="pos-header">
            <div class="header-left">
                <span class="system-title">BokD Point Of Sales</span>
                <span class="current-user"><i class="fas fa-user-circle"></i> Cashier 01</span>
            </div>
            <div class="header-right">
                <span class="order-id-display">Order ID: <span id="order-id-display">N/A</span></span>
                <span class="current-datetime">
                    <i class="fas fa-calendar-alt"></i> <span id="current-date"></span>
                    <i class="fas fa-clock"></i> <span id="current-time"></span>
                </span>
            </div>
        </header>

        <div class="main-content">
            <!-- Left Panel: Order Items, Summary, Payment -->
            <div class="left-panel panel-card">
                <div class="order-list-section">
                    <div class="order-list-header">
                        <span class="col-qty">QTY</span>
                        <span class="col-item-name">ITEM DESCRIPTION</span>
                        <span class="col-unit-price">UNIT PRICE</span>
                        <span class="col-amount">AMOUNT</span>
                        <span class="col-action"></span>
                    </div>
                    <div class="order-items" id="order-items-list">
                        <!-- Order items will be dynamically loaded here by JavaScript -->
                        <p class="no-items-message">Loading order...</p>
                    </div>
                </div>

                <div class="transaction-summary">
                    <div class="summary-row">
                        <span class="label">Subtotal:</span>
                        <span class="value" id="subtotal">₱ 0.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Total Discount:</span>
                        <span class="value" id="total-discount">₱ 0.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">VAT (12%):</span>
                        <span class="value" id="vat-amount">₱ 0.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Non-VAT Sales:</span>
                        <span class="value" id="non-vat-sales">₱ 0.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">VAT Exempt Sales:</span>
                        <span class="value" id="vat-exempt-sales">₱ 0.00</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Zero-Rated Sales:</span>
                        <span class="value" id="zero-rated-sales">₱ 0.00</span>
                    </div>
                    <div class="summary-row total-amount-row">
                        <span class="label">TOTAL AMOUNT DUE:</span>
                        <span class="value" id="total-amount-due">₱ 0.00</span>
                    </div>
                </div>

                <div class="payment-section">
                    <div class="payment-input-group">
                        <label for="amountTendered">Amount Tendered:</label>
                        <input type="number" id="amountTendered" placeholder="₱ 0.00" value="0">
                    </div>
                    <div class="payment-input-group">
                        <label for="changeDue">Change Due:</label>
                        <input type="text" id="changeDue" value="₱ 0.00" readonly>
                    </div>

                    <div class="payment-method-buttons">
                        <button class="payment-btn btn-primary"><i class="fas fa-money-bill-wave"></i> Cash</button>
                        <button class="payment-btn btn-primary"><i class="fas fa-credit-card"></i> Card</button>
                        <button class="payment-btn btn-primary"><i class="fas fa-qrcode"></i> GCash</button>
                        <button class="payment-btn btn-primary"><i class="fas fa-mobile-alt"></i> PayMaya</button>
                        <button class="payment-btn btn-secondary"><i class="fas fa-user-friends"></i> Senior/PWD
                            Disc</button>
                        <button class="payment-btn btn-secondary"><i class="fas fa-percent"></i> Custom Disc</button>
                        <button class="payment-btn btn-secondary"><i class="fas fa-gift"></i> Gift Cert</button>
                        <button class="payment-btn btn-secondary"><i class="fas fa-ellipsis-h"></i> More...</button>
                    </div>
                </div>
            </div>

            <!-- Right Panel: Menu Categories, Menu Items, Action Buttons -->
            <div class="right-panel panel-card">
                <div class="menu-search-bar">
                    <input type="text" id="menuSearchInput" placeholder="Search menu items..." class="search-input">
                    <i class="fas fa-search search-icon"></i>
                </div>

                <div class="menu-categories" id="main-categories">
                    <!-- Main categories will be dynamically loaded here by JavaScript -->
                    <p class="loading-message">Loading categories...</p>
                </div>

                <div class="menu-subcategories" id="sub-categories">
                    <!-- Subcategories will be dynamically loaded here by JavaScript -->
                </div>

                <div class="menu-items-grid" id="menu-items-display">
                    <!-- Menu items will be dynamically loaded here by JavaScript -->
                    <p class="loading-message">Loading menu items...</p>
                </div>

                <div class="action-buttons-grid">
                    <button class="action-btn btn-green"><i class="fas fa-list"></i> View Menu List</button>
                    <button class="action-btn btn-blue"><i class="fas fa-search"></i> Look Up</button>
                    <button class="action-btn btn-red"><i class="fas fa-times-circle"></i> Cancel Sale</button>
                    <button class="action-btn btn-orange"><i class="fas fa-percent"></i> Discount</button>
                    <button class="action-btn btn-blue"><i class="fas fa-sticky-note"></i> Notes</button>
                    <button class="action-btn btn-blue"><i class="fas fa-sort-numeric-up-alt"></i> Change Qty</button>
                    <button class="action-btn btn-blue"><i class="fas fa-dollar-sign"></i> Change Price</button>
                    <button class="action-btn btn-blue"><i class="fas fa-paper-plane"></i> Send to Kitchen</button>
                    <button class="action-btn btn-green"><i class="fas fa-print"></i> Print Bill</button>
                    <button class="action-btn btn-green"><i class="fas fa-check-circle"></i> Finalize Sale</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>