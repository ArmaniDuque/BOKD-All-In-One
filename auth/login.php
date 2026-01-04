<?php require "../config/config.php"; ?>
<?php require "../libs/app.php"; ?>
<?php include "../layouts/url.php"; ?>
<?php //include "../head.php"; ?>
<?php include "loginexec.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOK DCreation System Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .system-card {
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .system-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .login-container {
            max-width: 400px;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .system-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
    <div id="systemSelection" class="container mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-indigo-700 mb-2">BOK D Systems Portal</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Select the system you want to access from our integrated
                enterprise solutions</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <!-- Accounting System -->
            <div class="system-card bg-white rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('accounting')">
                <div class="system-icon text-blue-600">
                    <i class="fas fa-calculator"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Accounting System</h3>
                <p class="text-gray-600">Financial management, reporting, and compliance</p>
            </div>

            <!-- Payroll System -->
            <div class="system-card bg-white rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('payroll')">
                <div class="system-icon text-green-600">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Payroll System</h3>
                <p class="text-gray-600">Employee compensation and benefits management</p>
            </div>

            <!-- Human Resourses Information System -->
            <div class="system-card bg-white rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('hris')">
                <div class="system-icon text-orange-600">
                    <i class="fas fa-clipboard-user"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Human Resourses Information System</h3>
                <p class="text-gray-600">Employee compensation and benefits management</p>
            </div>
            <!-- Time Keeping System -->
            <div class="system-card bg-white rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('timekeeping')">
                <div class="system-icon text-purple-600">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Time Keeping System</h3>
                <p class="text-gray-600">Employee attendance and time tracking</p>
            </div>

            <!-- Hotel Management System -->
            <div class="system-card bg-cyan-500/25  rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('hms')">
                <div class="system-icon text-red-600">
                    <i class="fas fa-hotel"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Hotel Management System</h3>
                <p class="text-gray-600">Front desk, reservations, and property management</p>
            </div>

            <!-- Point of Sale System -->
            <div class="system-card bg-white rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('pos')">
                <div class="system-icon text-yellow-600">
                    <i class="fas fa-cash-register"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Point of Sale System</h3>
                <p class="text-gray-600">Retail transactions and sales management</p>
            </div>

            <!-- Inventory Management System -->
            <div class="system-card bg-white rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('inventory')">
                <div class="system-icon text-indigo-600">
                    <i class="fas fa-boxes"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Inventory Management System</h3>
                <p class="text-gray-600">Stock control and supply chain management</p>
            </div>

            <!-- Asset Management System -->
            <div class="system-card bg-cyan-500/25 rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('asset')">
                <div class="system-icon text-teal-600">
                    <i class="fas fa-laptop-house"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Asset Management System</h3>
                <p class="text-gray-600">Company property and equipment tracking</p>
            </div>

            <!-- IT Management System -->
            <div class="system-card bg-cyan-500/25 rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('it')">
                <div class="system-icon text-orange-600">
                    <i class="fas fa-server"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">IT Management System</h3>
                <p class="text-gray-600">IT Company property and equipment tracking</p>
            </div>
            <!-- Data Privacy System -->
            <div class="system-card bg-cyan-500/25 rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('dpo')">
                <div class="system-icon text-blue-600">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Data Privacy System</h3>
                <p class="text-gray-600">DPO Company property and equipment tracking</p>
            </div>

            <!-- Marketing System -->
            <div class="system-card bg-cyan-500/25 rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                onclick="showLoginForm('marketing')">
                <div class="system-icon text-orange-600">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Marketing</h3>
                <p class="text-gray-600">Centralized platform for managing all marketing campaigns, content, and data.
                </p>
            </div>

            <!-- Marketing System -->
            <a href="<?php echo APPURL; ?>marketing-panel/felizportal/index.php">
                <div class="system-card bg-cyan-500/25 rounded-xl shadow-md overflow-hidden p-6 text-center cursor-pointer"
                    onclick="window.location.href=<?php echo APPURL; ?>'marketing-panel/felizportal/index.php;'">
                    <div class="system-icon text-orange-600">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Feliz Fortal</h3>
                    <p class="text-gray-600">Centralized platform for managing all marketing campaigns, content, and
                        data.
                    </p>
                </div>
            </a>
        </div>
    </div>

    <!-- Login Forms Container (hidden by default) -->
    <div id="loginFormsContainer"
        class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="login-container bg-white rounded-xl shadow-xl p-8 w-full">
            <div class="flex justify-between items-center mb-6">
                <h2 id="loginSystemName" class="text-2xl font-bold text-gray-800"></h2>
                <button onclick="hideLoginForm()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div id="loginForms">
                <!-- Accounting System Login -->
                <form id="accountingLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="accounting-username">
                            Accountant ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="accounting-username" type="text" name="email" placeholder="Enter your accountant ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="accounting-password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="accounting-password" type="password" name="userpassword"
                            placeholder="Enter your password">
                    </div>
                    <button type="submit" name="submitlogin-acctg"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Access Accounting System
                    </button>
                </form>
                <!-- HUman Resources Information System Login -->
                <form id="hrisLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="hris-username">
                            User ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="hris-username" type="text" name="email" placeholder="Enter your hris ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="hris-password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="hris-password" type="password" name="userpassword" placeholder="Enter your password">
                    </div>
                    <div class="mb-4 flex items-center">
                        <input id="hris-remember" type="checkbox"
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="hris-remember" class="ml-2 block text-sm text-gray-700">
                            Remember my credentials
                        </label>
                    </div>
                    <button type="submit" name="submitlogin-payroll"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Access Payroll System
                    </button>
                </form>
                <!-- Payroll System Login -->
                <form id="payrollLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="payroll-username">
                            Payroll Officer ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="payroll-username" type="text" name="email" placeholder="Enter your payroll ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="payroll-password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="payroll-password" type="password" name="userpassword" placeholder="Enter your password">
                    </div>
                    <div class="mb-4 flex items-center">
                        <input id="payroll-remember" type="checkbox"
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="payroll-remember" class="ml-2 block text-sm text-gray-700">
                            Remember my credentials
                        </label>
                    </div>
                    <button type="submit" name="submitlogin-payroll"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Access Payroll System
                    </button>
                </form>

                <!-- Time Keeping System Login -->
                <form id="timekeepingLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="timekeeping-username">
                            Employee ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                            id="timekeeping-username" type="text" name="email" placeholder="Enter your employee ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="timekeeping-password">
                            PIN Code
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                            id="timekeeping-password" type="password" name="userpassword"
                            placeholder="Enter your 6-digit PIN" maxlength="8">
                    </div>
                    <button type="submit" name="submitlogin-timekeeping"
                        class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Clock In/Out
                    </button>
                </form>

                <!-- Hotel Management System Login -->
                <form id="hmsLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="hms-username">
                            Staff ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                            id="hms-username" type="text" name="email" placeholder=" Enter your staff ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="hms-password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                            id="hms-password" type="password" name="userpassword" placeholder="Enter your password">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="hms-property">
                            Property
                        </label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                            id="hms-property">
                            <option value="">Select property</option>
                            <option value="main">Main Hotel</option>
                            <option value="resort">Beach Resort</option>
                            <option value="suites">Business Suites</option>
                        </select>
                    </div>
                    <button type="submit" name="submitlogin-hms"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Access Hotel System
                    </button>
                </form>

                <!-- Point of Sale System Login -->
                <form id="posLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="pos-username">
                            Cashier ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500"
                            id="pos-username" type="text" name="email" placeholder="Enter your cashier ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="pos-password">
                            PIN
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500"
                            id="pos-password" type="password" name="userpassword" placeholder="Enter your 4-digit PIN"
                            maxlength="10">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="pos-terminal">
                            Terminal
                        </label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500"
                            id="pos-terminal">
                            <option value="">Select terminal</option>
                            <option value="1">Terminal 1 - Main Store</option>
                            <option value="2">Terminal 2 - Kiosk</option>
                            <option value="3">Terminal 3 - Drive-thru</option>
                        </select>
                    </div>
                    <button type="submit" name="submitlogin-pos"
                        class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Open POS Terminal
                    </button>
                </form>

                <!-- Inventory Management System Login -->
                <form id="inventoryLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="inventory-username">
                            Warehouse ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            id="inventory-username" type="text" name="email" placeholder="Enter your warehouse ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="inventory-password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            id="inventory-password" type="password" name="userpassword"
                            placeholder="Enter your password">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="inventory-location">
                            Warehouse Location
                        </label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            id="inventory-location">
                            <option value="">Select location</option>
                            <option value="main">Main Warehouse</option>
                            <option value="north">North Distribution</option>
                            <option value="east">East Storage</option>
                        </select>
                    </div>
                    <button type="submit" name="submitlogin-inv"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Access Inventory System
                    </button>
                </form>

                <!-- Asset Management System Login -->
                <form id="assetLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="asset-username">
                            Asset Manager ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="asset-username" type="text" name="email" placeholder="Enter your manager ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="asset-password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="asset-password" type="password" name="userpassword" placeholder="Enter your password">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="asset-department">
                            Department
                        </label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="asset-department">
                            <option value="">Select department</option>
                            <option value="it">IT Equipment</option>
                            <option value="office">Office Furniture</option>
                            <option value="vehicle">Company Vehicles</option>
                        </select>
                    </div>
                    <button type="submit" name="submitlogin-asset"
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Access Asset System
                    </button>
                </form>

                <!-- IT Management System Login -->
                <form id="itLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="it-username">
                            IT Manager ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="it-username" type="text" name="email" placeholder="Enter your manager ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="it-password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="it-password" type="password" name="userpassword" placeholder="Enter your password">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="it-department">
                            Department
                        </label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="it-department">
                            <option value="">Select department</option>
                            <option value="it">IT Equipment</option>
                            <option value="office">Office Furniture</option>
                            <option value="vehicle">Company Vehicles</option>
                        </select>
                    </div>
                    <button type="submit" name="submitlogin-it"
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Access IT System
                    </button>
                </form>

                <!-- Data PrivacySystem Login -->
                <form id="dpoLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="dpo-username">
                            DPO Manager ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="dpo-username" type="text" name="email" placeholder="Enter your manager ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="dpo-password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="dpo-password" type="password" name="userpassword" placeholder="Enter your password">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="dpo-department">
                            Department
                        </label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="dpo-department">
                            <option value="">Select department</option>
                            <option value="it">IT Equipment</option>
                            <option value="office">Office Furniture</option>
                            <option value="vehicle">Company Vehicles</option>
                        </select>
                    </div>
                    <button type="submit" name="submitlogin-dpo"
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Access DPO System
                    </button>
                </form>

                <!-- Data PrivacySystem Login -->
                <form id="marketingLogin" class="hidden" method="POST" action="login.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="marketing-username">
                            Marketing Manager ID
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="marketing-username" type="text" name="email" placeholder="Enter your manager ID">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="marketing-password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="marketing-password" type="password" name="userpassword"
                            placeholder="Enter your password">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="marketing-department">
                            Department
                        </label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            id="marketing-department">
                            <option value="">Select department</option>
                            <option value="it">IT Equipment</option>
                            <option value="office">Office Furniture</option>
                            <option value="vehicle">Company Vehicles</option>
                        </select>
                    </div>
                    <button type="submit" name="submitlogin-marketing"
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                        Access marketing System
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // System to name mapping
        const systemNames = {
            'accounting': 'Accounting System',
            'hris': 'Human Resources Information System',
            'payroll': 'Payroll System',
            'timekeeping': 'Time Keeping System',
            'hms': 'Hotel Management System',
            'pos': 'Point of Sale System',
            'inventory': 'Inventory Management System',
            'asset': 'Asset Management System',
            'it': 'IT Management System',
            'dpo': 'Data Privacy System',
            'marketing': 'Marketing System'
        };

        // Show login form for selected system
        function showLoginForm(system) {
            document.getElementById('systemSelection').style.display = 'none';
            document.getElementById('loginFormsContainer').classList.remove('hidden');
            document.getElementById('loginSystemName').textContent = systemNames[system];

            // Hide all forms first
            document.querySelectorAll('#loginForms form').forEach(form => {
                form.classList.add('hidden');
            });

            // Show the selected form
            document.getElementById(`${system}Login`).classList.remove('hidden');
        }

        // Hide login form and show system selection
        function hideLoginForm() {
            document.getElementById('systemSelection').style.display = 'block';
            document.getElementById('loginFormsContainer').classList.add('hidden');
        }

        // // Add form submission handlers
        // document.addEventListener('DOMContentLoaded', function () {
        //     document.getElementById('accountingLogin').addEventListener('submit', function (e) {
        //         e.preventDefault();
        //         alert('Accounting System login submitted!');
        //     });

        //     document.getElementById('payrollLogin').addEventListener('submit', function (e) {
        //         e.preventDefault();
        //         alert('Payroll System login submitted!');
        //     });

        //     document.getElementById('timekeepingLogin').addEventListener('submit', function (e) {
        //         e.preventDefault();
        //         alert('Time Keeping System login submitted!');
        //     });

        //     document.getElementById('hmsLogin').addEventListener('submit', function (e) {
        //         e.preventDefault();
        //         alert('Hotel Management System login submitted!');
        //     });

        //     document.getElementById('posLogin').addEventListener('submit', function (e) {
        //         e.preventDefault();
        //         alert('Point of Sale System login submitted!');
        //     });

        //     document.getElementById('inventoryLogin').addEventListener('submit', function (e) {
        //         e.preventDefault();
        //         alert('Inventory Management System login submitted!');
        //     });

        //     document.getElementById('assetLogin').addEventListener('submit', function (e) {
        //         e.preventDefault();
        //         alert('Asset Management System login submitted!');
        //     });

        //     document.getElementById('itLogin').addEventListener('submit', function (e) {
        //         e.preventDefault();
        //         alert('IT Management System login submitted!');
        //     });

        //     document.getElementById('dpoLogin').addEventListener('submit', function (e) {
        //         e.preventDefault();
        //         alert('Data Privacy System login submitted!');
        //     });
        // });
    </script>
</body>

</html>