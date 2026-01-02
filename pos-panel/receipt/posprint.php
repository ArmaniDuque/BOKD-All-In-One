<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Receipt</title>
    <style>
        body {
            font-family: 'monospace', 'Courier New', Courier, monospace;
            /* Monospace for thermal print feel */
            font-size: 10px;
            /* Small font size for thermal paper */
            line-height: 1.2;
            margin: 0;
            padding: 5px;
            /* Small padding for edges */
            width: 280px;
            /* Typical width for 80mm thermal paper (approx 2.8 inches) */
            max-width: 100%;
            /* Ensure responsiveness on smaller screens */
            box-sizing: border-box;
        }

        .center-text {
            text-align: center;
        }

        .right-text {
            text-align: right;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
        }

        .item-name {
            flex-grow: 1;
            padding-right: 5px;
        }

        .item-qty,
        .item-price,
        .item-total {
            white-space: nowrap;
        }

        .separator {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        .total-line {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="center-text">
        <h1 style="font-size: 14px; margin-bottom: 2px;">YOUR PHILIPPINE BUSINESS CORP.</h1>
        <p style="margin: 0;">Unit 101, Business Center</p>
        <p style="margin: 0;">Brgy. San Jose, Makati City, Metro Manila</p>
        <p style="margin: 0;">Philippines, 1200</p>
        <p style="margin: 0;">TIN: 123-456-789-000</p>
        <p style="margin: 0;">Phone: (02) 8123-4567</p>
        <p style="margin-top: 5px; font-weight: bold;">SALES INVOICE RECEIPT</p>
    </div>

    <div class="separator"></div>

    <div>
        <p style="margin: 0;">Receipt No.: SI-2025-001</p>
        <p style="margin: 0;">Date: July 11, 2025</p>
        <p style="margin: 0;">Time: 07:00 PM</p>
        <p style="margin: 0;">Cashier: Juan Dela Cruz</p>
        <p style="margin: 0;">Customer: Walk-in Customer</p>
    </div>

    <div class="separator"></div>

    <div style="display: flex; justify-content: space-between; font-weight: bold;">
        <span style="width: 10%;">QTY</span>
        <span style="flex-grow: 1; padding-left: 5px;">ITEM</span>
        <span style="width: 25%; text-align: right;">PRICE</span>
        <span style="width: 25%; text-align: right;">TOTAL</span>
    </div>

    <div class="separator"></div>

    <!-- Sample Item 1 -->
    <div class="item-row">
        <span class="item-qty">2</span>
        <span class="item-name">Spaghetti Carbonara</span>
        <span class="item-price right-text">₱ 695.00</span>
        <span class="item-total right-text">₱ 1,390.00</span>
    </div>
    <!-- Sample Item 2 -->
    <div class="item-row">
        <span class="item-qty">5</span>
        <span class="item-name">Chili-Cheese Dog</span>
        <span class="item-price right-text">₱ 390.00</span>
        <span class="item-total right-text">₱ 1,950.00</span>
    </div>
    <!-- Sample Item 3 (with longer name) -->
    <div class="item-row">
        <span class="item-qty">1</span>
        <span class="item-name">La Marea Pork Sisig (Extra Spicy)</span>
        <span class="item-price right-text">₱ 695.00</span>
        <span class="item-total right-text">₱ 695.00</span>
    </div>
    <!-- Add more items as needed -->

    <div class="separator"></div>

    <div class="total-line">
        <span>Subtotal:</span>
        <span class="right-text">₱ 4,035.00</span>
    </div>
    <div class="total-line">
        <span>VAT (12%):</span>
        <span class="right-text">₱ 484.20</span>
    </div>
    <div class="total-line" style="font-size: 12px; margin-top: 5px;">
        <span>TOTAL AMOUNT DUE:</span>
        <span class="right-text">₱ 4,519.20</span>
    </div>

    <div class="separator"></div>

    <div class="center-text">
        <p style="margin: 0;">Payment Method: Cash</p>
        <p style="margin: 0;">Amount Paid: ₱ 5,000.00</p>
        <p style="margin: 0;">Change: ₱ 480.80</p>
    </div>

    <div class="separator"></div>

    <div class="center-text">
        <p style="margin: 0; font-weight: bold;">THANK YOU FOR YOUR PURCHASE!</p>
        <p style="margin: 0;">Please come again.</p>
        <p style="margin-top: 5px; font-size: 8px;">THIS IS NOT AN OFFICIAL RECEIPT</p>
        <p style="margin: 0; font-size: 8px;">(For BIR requirements, please request an Official Receipt)</p>
    </div>

</body>

</html>