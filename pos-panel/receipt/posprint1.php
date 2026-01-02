<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt / Invoice</title>
    <!-- Note: The original request had a link to receipt-style.css.
         For a self-contained HTML file (as is typical for Canvas),
         I'll embed the CSS directly in a <style> tag.
         If you prefer an external CSS file, you'd save the CSS below
         into 'receipt-style.css' and link it. -->
    <style>
        body {
            font-family: 'monospace', 'Courier New', Courier, monospace;
            font-size: 10px;
            line-height: 1.2;
            margin: 0;
            padding: 5px;
            width: 280px;
            /* Typical width for 80mm thermal paper */
            max-width: 100%;
            box-sizing: border-box;
            color: #000;
            /* Ensure black text for printing */
            background-color: #fff;
            /* Ensure white background for printing */
        }

        .receipt-container {
            width: 100%;
            margin: 0 auto;
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 10px;
        }

        .company-name {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 2px;
        }

        .company-address,
        .company-contact {
            font-size: 9px;
            margin: 0;
        }

        .document-title {
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            margin: 10px 0;
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
            padding: 5px 0;
        }

        .order-info,
        .payment-info,
        .summary {
            margin-bottom: 10px;
        }

        .info-row,
        .summary-row {
            display: flex;
            justify-content: space-between;
            font-size: 10px;
            margin-bottom: 2px;
        }

        .info-row .label,
        .summary-row .label {
            font-weight: bold;
            padding-right: 5px;
            /* Small gap between label and value */
        }

        .item-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .item-table th,
        .item-table td {
            font-size: 10px;
            padding: 3px 0;
            text-align: left;
            vertical-align: top;
            border-bottom: 1px dashed #000;
            /* Separator for items */
        }

        .item-table thead th {
            font-weight: bold;
            border-bottom: 1px solid #000;
            /* Stronger separator for header */
            padding-bottom: 5px;
        }

        .item-table td:nth-child(1) {
            width: 10%;
            /* QTY */
            text-align: left;
        }

        .item-table td:nth-child(2) {
            flex-grow: 1;
            /* ITEM DESCRIPTION */
            padding-right: 5px;
        }

        .item-table th:nth-child(3),
        .item-table td:nth-child(3) {
            width: 25%;
            /* UNIT PRICE */
            text-align: right;
        }

        .item-table th:nth-child(4),
        .item-table td:nth-child(4) {
            width: 25%;
            /* AMOUNT */
            text-align: right;
        }

        .summary-row.total-row {
            font-size: 12px;
            font-weight: bold;
            border-top: 1px solid #000;
            /* Stronger separator for total */
            padding-top: 5px;
            margin-top: 5px;
        }

        .receipt-footer {
            text-align: center;
            margin-top: 15px;
            font-size: 9px;
        }

        .receipt-footer p {
            margin: 2px 0;
        }

        .receipt-footer .website {
            font-size: 8px;
            margin-top: 5px;
        }
    </style>
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