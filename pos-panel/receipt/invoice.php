<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #PH2023-001</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            /* Light gray background */
        }

        /* Custom print styles */
        @media print {
            body {
                background-color: #fff;
            }

            .no-print {
                display: none !important;
            }

            .invoice-container {
                box-shadow: none !important;
                border: none !important;
                margin: 0 !important;
                padding: 0 !important;
                max-width: 100% !important;
                width: 100% !important;
            }
        }
    </style>
</head>

<body class="p-4 sm:p-6 lg:p-8">

    <!-- Main Invoice Container -->
    <div
        class="invoice-container max-w-4xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden border border-gray-200">

        <!-- Invoice Header -->
        <header class="p-6 sm:p-8 bg-blue-600 text-white rounded-t-lg">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                <div class="mb-4 sm:mb-0">
                    <!-- Company Logo Placeholder -->
                    <img src="https://placehold.co/120x60/ffffff/000000?text=Your+Logo+PH" alt="Company Logo"
                        class="h-12 rounded-md">
                    <h1 class="text-3xl font-bold mt-2">Your Philippine Business Corp.</h1>
                </div>
                <div class="text-right">
                    <h2 class="text-4xl font-extrabold">INVOICE</h2>
                    <p class="text-sm">#<span class="font-semibold">PH-INV-2023-001</span></p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="font-semibold">From:</p>
                    <p>Your Philippine Business Corp.</p>
                    <p>Unit 101, Business Center</p>
                    <p>Brgy. San Jose, Makati City, Metro Manila</p>
                    <p>Philippines, 1200</p>
                    <p>TIN: 123-456-789-000</p>
                    <p>Email: info@yourphbusiness.com</p>
                    <p>Phone: (02) 8123-4567</p>
                </div>
                <div class="md:text-right">
                    <p class="font-semibold">Invoice Date: <span class="font-normal">July 11, 2025</span></p>
                    <p class="font-semibold">Due Date: <span class="font-normal">July 25, 2025</span></p>
                    <p class="font-semibold">Payment Terms: <span class="font-normal">Net 14 Days</span></p>
                </div>
            </div>
        </header>

        <!-- Bill To / Ship To Section -->
        <section class="p-6 sm:p-8 border-b border-gray-200 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="font-semibold text-gray-700 mb-2">Bill To:</p>
                <p class="text-gray-800 font-medium">Client Company Inc.</p>
                <p class="text-gray-600">G/F, Client Building</p>
                <p class="text-gray-600">Brgy. Poblacion, Quezon City, Metro Manila</p>
                <p class="text-gray-600">Philippines, 1100</p>
                <p class="text-gray-600">Email: client@example.ph</p>
            </div>
            <div>
                <p class="font-semibold text-gray-700 mb-2">Ship To:</p>
                <p class="text-gray-800 font-medium">Client Company Inc. (Delivery Address)</p>
                <p class="text-gray-600">Warehouse 5, Industrial Park</p>
                <p class="text-gray-600">Brgy. Manggahan, Pasig City, Metro Manila</p>
                <p class="text-gray-600">Philippines, 1600</p>
                <p class="text-gray-600">Phone: (02) 8987-6543</p>
            </div>
        </section>

        <!-- Line Items Table -->
        <section class="p-6 sm:p-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Invoice Items</h3>
            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">
                                Description</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Qty</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Unit Price (PHP)</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tr-lg">
                                Total (PHP)</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Sample Item 1 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Consultation
                                Services (10 hours)</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₱ 1,500.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right font-semibold">₱
                                15,000.00</td>
                        </tr>
                        <!-- Sample Item 2 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Software License
                                (Annual)</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₱ 8,000.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right font-semibold">₱
                                8,000.00</td>
                        </tr>
                        <!-- Sample Item 3 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Custom Development
                                (Phase 1)</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₱ 25,000.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right font-semibold">₱
                                25,000.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Summary Section -->
        <section class="p-6 sm:p-8 flex justify-end">
            <div class="w-full md:w-1/2 lg:w-1/3 space-y-2">
                <div class="flex justify-between text-gray-700">
                    <span>Subtotal:</span>
                    <span class="font-semibold">₱ 48,000.00</span>
                </div>
                <div class="flex justify-between text-gray-700">
                    <span>VAT (12%):</span>
                    <span class="font-semibold">₱ 5,760.00</span>
                </div>
                <div class="flex justify-between text-2xl font-bold text-blue-600 border-t-2 border-gray-300 pt-3 mt-3">
                    <span>TOTAL DUE:</span>
                    <span>₱ 53,760.00</span>
                </div>
            </div>
        </section>

        <!-- Notes / Terms Section -->
        <section class="p-6 sm:p-8 border-t border-gray-200 bg-gray-50 rounded-b-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">Notes & Payment Instructions:</h3>
            <p class="text-sm text-gray-700 mb-2">
                Maraming salamat po sa inyong tiwala! (Thank you very much for your trust!)
                Please remit payment by the due date. For any concerns, kindly contact us.
            </p>
            <p class="text-sm text-gray-700">
                Bank Name: BDO Unibank, Inc.<br>
                Account Name: Your Philippine Business Corp.<br>
                Account Number: 00123-456-7890<br>
                SWIFT Code: BNORPHMM
            </p>
            <p class="text-sm text-gray-700 mt-4 italic">Salamat po! (Thank you!)</p>
        </section>

    </div>

    <!-- Print Button (No-print class will hide this when printing) -->
    <div class="no-print flex justify-center mt-8">
        <button onclick="window.print()"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-print mr-2"></i> Print Invoice
        </button>
    </div>

    <!-- Font Awesome for print icon (optional, but good for UX) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous">
    </script>
</body>

</html>