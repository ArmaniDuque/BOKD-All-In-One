<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt / Invoice</title>
    <link rel="stylesheet" href="receipt-style.css">
</head>

<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h1 class="company-name">Your Restaurant Name</h1>
            <p class="company-address">123 Food Street, Delicious City, PH</p>
            <p class="company-contact">Phone: (0912) 345-6789 | Email: info@yourrestaurant.com</p>
        </div>

        <h2 class="document-title">SALES RECEIPT</h2>

        <div class="order-info">
            <div class="info-row">
                <span class="label">Invoice No:</span>
                <span class="value" id="invoice-no">INV-20250709-001</span>
            </div>
            <div class="info-row">
                <span class="label">Order ID:</span>
                <span class="value" id="order-id">ORD-XYZ78901</span>
            </div>
            <div class="info-row">
                <span class="label">Date:</span>
                <span class="value" id="order-date">July 9, 2025</span>
            </div>
            <div class="info-row">
                <span class="label">Time:</span>
                <span class="value" id="order-time">20:30:45 PST</span>
            </div>
            <div class="info-row">
                <span class="label">Customer:</span>
                <span class="value" id="customer-name">John Doe (Walk-in)</span>
            </div>
            <div class="info-row">
                <span class="label">Served By:</span>
                <span class="value" id="served-by">Cashier 01</span>
            </div>
        </div>

        <table class="item-table">
            <thead>
                <tr>
                    <th>QTY</th>
                    <th>ITEM DESCRIPTION</th>
                    <th>UNIT PRICE</th>
                    <th>AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2</td>
                    <td>Chicken Adobo (Large)</td>
                    <td>₱ 250.00</td>
                    <td>₱ 500.00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Garlic Rice (Extra)</td>
                    <td>₱ 60.00</td>
                    <td>₱ 60.00</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bottled Water</td>
                    <td>₱ 25.00</td>
                    <td>₱ 75.00</td>
                </tr>
            </tbody>
        </table>

        <div class="summary">
            <div class="summary-row">
                <span class="label">Subtotal:</span>
                <span class="value" id="subtotal">₱ 635.00</span>
            </div>
            <div class="summary-row">
                <span class="label">Discount:</span>
                <span class="value" id="discount">₱ 0.00</span>
            </div>
            <div class="summary-row total-row">
                <span class="label">Total Amount Due:</span>
                <span class="value" id="total-amount-due">₱ 635.00</span>
            </div>
        </div>

        <div class="payment-info">
            <div class="info-row">
                <span class="label">Payment Method:</span>
                <span class="value" id="payment-method">Cash</span>
            </div>
            <div class="info-row">
                <span class="label">Amount Paid:</span>
                <span class="value" id="amount-paid">₱ 700.00</span>
            </div>
            <div class="info-row">
                <span class="label">Change Due:</span>
                <span class="value" id="change-due">₱ 65.00</span>
            </div>
        </div>

        <div class="receipt-footer">
            <p>Thank you for your order!</p>
            <p>Please come again.</p>
            <p class="website">www.yourrestaurant.com</p>
        </div>
    </div>
</body>

</html>