<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    /* Custom CSS for elements that need precise control */
    .order-item:hover {
        background-color: #f3f4f6;
        transition: background-color 0.2s;
    }

    .category-btn.active {
        background-color: #3b82f6;
        color: white;
    }

    /* Animation for order items */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .order-item {
        animation: fadeIn 0.3s ease-out;
    }
    </style>
</head>

<body class="bg-gray-100 h-screen flex flex-col">
    <!-- Header Section -->
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <div>
                    <span class="text-sm font-light">Table</span>
                    <div class="text-xl font-bold">#12</div>
                </div>
                <div>
                    <span class="text-sm font-light">Guest</span>
                    <div class="text-xl font-bold">John Doe</div>
                </div>
                <div>
                    <span class="text-sm font-light">Pax</span>
                    <div class="text-xl font-bold">4</div>
                </div>
            </div>
            <div class="flex space-x-4">
                <button
                    class="bg-green-500 hover:bg-green-600 px-6 py-2 rounded-lg font-semibold shadow flex items-center">
                    <i class="fas fa-receipt mr-2"></i> Bill Out
                </button>
                <button class="bg-red-500 hover:bg-red-600 px-6 py-2 rounded-lg font-semibold shadow flex items-center">
                    <i class="fas fa-sign-out-alt mr-2"></i> Exit
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex flex-1 overflow-hidden">
        <!-- Left Panel - Menu Categories and Items -->
        <div class="w-1/2 bg-white p-4 overflow-y-auto">
            <div class="mb-4 flex overflow-x-auto pb-2 space-x-2">
                <!-- Category Buttons -->
                <button class="category-btn active px-4 py-2 bg-gray-200 rounded-full whitespace-nowrap">All
                    Items</button>
                <button class="category-btn px-4 py-2 bg-gray-200 rounded-full whitespace-nowrap">Appetizers</button>
                <button class="category-btn px-4 py-2 bg-gray-200 rounded-full whitespace-nowrap">Main Dishes</button>
                <button class="category-btn px-4 py-2 bg-gray-200 rounded-full whitespace-nowrap">Desserts</button>
                <button class="category-btn px-4 py-2 bg-gray-200 rounded-full whitespace-nowrap">Drinks</button>
                <button class="category-btn px-4 py-2 bg-gray-200 rounded-full whitespace-nowrap">Special</button>
            </div>

            <!-- Search Bar -->
            <div class="relative mb-4">
                <input type="text" placeholder="Search menu items..."
                    class="w-full p-3 pl-10 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
            </div>

            <!-- Menu Items Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                <!-- Sample Menu Items -->
                <div class="menu-item bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm cursor-pointer hover:shadow-md transition-shadow"
                    data-id="1">
                    <div class="bg-gray-100 h-32 flex items-center justify-center">
                        <i class="fas fa-utensils text-3xl text-gray-400"></i>
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold truncate">Spaghetti Carbonara</h3>
                        <p class="text-blue-600 font-bold">$12.99</p>
                    </div>
                </div>
                <div class="menu-item bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm cursor-pointer hover:shadow-md transition-shadow"
                    data-id="2">
                    <div class="bg-gray-100 h-32 flex items-center justify-center">
                        <i class="fas fa-hamburger text-3xl text-gray-400"></i>
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold truncate">Cheeseburger</h3>
                        <p class="text-blue-600 font-bold">$9.99</p>
                    </div>
                </div>
                <div class="menu-item bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm cursor-pointer hover:shadow-md transition-shadow"
                    data-id="3">
                    <div class="bg-gray-100 h-32 flex items-center justify-center">
                        <i class="fas fa-pizza-slice text-3xl text-gray-400"></i>
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold truncate">Pepperoni Pizza</h3>
                        <p class="text-blue-600 font-bold">$15.99</p>
                    </div>
                </div>
                <div class="menu-item bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm cursor-pointer hover:shadow-md transition-shadow"
                    data-id="4">
                    <div class="bg-gray-100 h-32 flex items-center justify-center">
                        <i class="fas fa-drumstick-bite text-3xl text-gray-400"></i>
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold truncate">Grilled Chicken</h3>
                        <p class="text-blue-600 font-bold">$14.50</p>
                    </div>
                </div>
                <div class="menu-item bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm cursor-pointer hover:shadow-md transition-shadow"
                    data-id="5">
                    <div class="bg-gray-100 h-32 flex items-center justify-center">
                        <i class="fas fa-ice-cream text-3xl text-gray-400"></i>
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold truncate">Ice Cream</h3>
                        <p class="text-blue-600 font-bold">$5.99</p>
                    </div>
                </div>
                <div class="menu-item bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm cursor-pointer hover:shadow-md transition-shadow"
                    data-id="6">
                    <div class="bg-gray-100 h-32 flex items-center justify-center">
                        <i class="fas fa-coffee text-3xl text-gray-400"></i>
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold truncate">Cappuccino</h3>
                        <p class="text-blue-600 font-bold">$4.50</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel - Order List -->
        <div class="w-1/2 bg-gray-50 border-l border-gray-200 flex flex-col">
            <!-- Order Header -->
            <div class="bg-white p-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="font-bold text-lg">Current Order</h2>
                <div>
                    <span class="font-semibold">Total:</span>
                    <span class="text-blue-600 font-bold ml-2 text-lg">$0.00</span>
                </div>
            </div>

            <!-- Order Items List -->
            <div class="flex-1 overflow-y-auto" id="order-list">
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center h-full text-gray-400">
                    <i class="fas fa-shopping-cart text-5xl mb-4"></i>
                    <p class="text-lg">No items in order</p>
                    <p class="text-sm">Select items from the menu</p>
                </div>
            </div>

            <!-- Order Notes -->
            <div class="p-4 border-t border-gray-200 bg-white">
                <textarea id="order-notes"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Add remarks for this order..."></textarea>
            </div>

            <!-- Footer Action Buttons -->
            <footer class="bg-gray-800 p-3 flex justify-between">
                <button class="footer-btn bg-red-600 hover:bg-red-700" id="void-btn">
                    <i class="fas fa-ban mr-2"></i> Void
                </button>
                <button class="footer-btn bg-purple-600 hover:bg-purple-700" id="assign-guest-btn">
                    <i class="fas fa-user-tag mr-2"></i> Assign Guest
                </button>
                <button class="footer-btn bg-yellow-600 hover:bg-yellow-700" id="open-items-btn">
                    <i class="fas fa-folder-open mr-2"></i> Open Items
                </button>
                <button class="footer-btn bg-green-600 hover:bg-green-700" id="quantity-btn">
                    <i class="fas fa-calculator mr-2"></i> Quantity
                </button>
            </footer>
        </div>
    </main>

    <!-- Quantity Modal (Hidden by default) -->
    <div id="quantity-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-6 w-96">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Adjust Quantity</h3>
                <button id="close-quantity-modal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Current Quantity: <span id="current-qty">1</span></label>
                <div class="flex items-center">
                    <button id="decrease-qty" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-l-lg">
                        <i class="fas fa-minus"></i>
                    </button>
                    <input type="number" id="qty-input" value="1" min="1"
                        class="w-20 text-center border-t border-b border-gray-300 py-2">
                    <button id="increase-qty" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-r-lg">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <button id="update-qty" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg">
                Update Quantity
            </button>
        </div>
    </div>

    <script>
    // Sample menu data
    const menuItems = {
        1: {
            id: 1,
            name: 'Spaghetti Carbonara',
            price: 12.99,
            category: 'Main Dishes'
        },
        2: {
            id: 2,
            name: 'Cheeseburger',
            price: 9.99,
            category: 'Main Dishes'
        },
        3: {
            id: 3,
            name: 'Pepperoni Pizza',
            price: 15.99,
            category: 'Main Dishes'
        },
        4: {
            id: 4,
            name: 'Grilled Chicken',
            price: 14.50,
            category: 'Main Dishes'
        },
        5: {
            id: 5,
            name: 'Ice Cream',
            price: 5.99,
            category: 'Desserts'
        },
        6: {
            id: 6,
            name: 'Cappuccino',
            price: 4.50,
            category: 'Drinks'
        }
    };

    let currentOrder = [];
    let selectedItemForQty = null;

    // DOM Elements
    const orderListEl = document.getElementById('order-list');
    const totalAmountEl = document.querySelector('#order-list + div span:last-child');
    const categoryButtons = document.querySelectorAll('.category-btn');
    const menuItemElements = document.querySelectorAll('.menu-item');
    const quantityModal = document.getElementById('quantity-modal');
    const qtyInput = document.getElementById('qty-input');
    const currentQtySpan = document.getElementById('current-qty');

    // Event Listeners
    categoryButtons.forEach(button => {
        button.addEventListener('click', () => {
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            const category = button.textContent;
            filterMenuItems(category);
        });
    });

    menuItemElements.forEach(item => {
        item.addEventListener('click', () => {
            const itemId = parseInt(item.dataset.id);
            addToOrder(itemId);
        });
    });

    document.getElementById('quantity-btn').addEventListener('click', () => {
        alert('Select an item from the order list to adjust quantity');
    });

    document.getElementById('void-btn').addEventListener('click', () => {
        if (confirm('Are you sure you want to void the current order?')) {
            currentOrder = [];
            updateOrderList();
        }
    });

    document.getElementById('assign-guest-btn').addEventListener('click', () => {
        alert('Assign guest functionality would go here');
    });

    document.getElementById('open-items-btn').addEventListener('click', () => {
        alert('Open items functionality would go here');
    });

    document.getElementById('close-quantity-modal').addEventListener('click', () => {
        quantityModal.classList.add('hidden');
    });

    document.getElementById('increase-qty').addEventListener('click', () => {
        qtyInput.value = parseInt(qtyInput.value) + 1;
    });

    document.getElementById('decrease-qty').addEventListener('click', () => {
        const currentVal = parseInt(qtyInput.value);
        if (currentVal > 1) {
            qtyInput.value = currentVal - 1;
        }
    });

    document.getElementById('update-qty').addEventListener('click', () => {
        const newQty = parseInt(qtyInput.value);
        if (selectedItemForQty) {
            const itemIndex = currentOrder.findIndex(item => item.id === selectedItemForQty.id);
            if (itemIndex !== -1) {
                currentOrder[itemIndex].quantity = newQty;
                currentOrder[itemIndex].subtotal = currentOrder[itemIndex].price * newQty;
                updateOrderList();
            }
        }
        quantityModal.classList.add('hidden');
    });

    // Functions
    function filterMenuItems(category) {
        if (category === 'All Items') {
            menuItemElements.forEach(item => item.style.display = 'block');
            return;
        }

        menuItemElements.forEach(item => {
            const itemId = parseInt(item.dataset.id);
            const itemCategory = menuItems[itemId].category;
            item.style.display = itemCategory === category ? 'block' : 'none';
        });
    }

    function addToOrder(itemId) {
        const existingItem = currentOrder.find(item => item.id === itemId);

        if (existingItem) {
            existingItem.quantity += 1;
            existingItem.subtotal = existingItem.price * existingItem.quantity;
        } else {
            const menuItem = menuItems[itemId];
            currentOrder.push({
                ...menuItem,
                quantity: 1,
                subtotal: menuItem.price
            });
        }

        updateOrderList();
    }

    function updateOrderList() {
        if (currentOrder.length === 0) {
            orderListEl.innerHTML = `
                    <div class="flex flex-col items-center justify-center h-full text-gray-400">
                        <i class="fas fa-shopping-cart text-5xl mb-4"></i>
                        <p class="text-lg">No items in order</p>
                        <p class="text-sm">Select items from the menu</p>
                    </div>
                `;
            totalAmountEl.textContent = '$0.00';
            return;
        }

        let orderHTML = '';
        let totalAmount = 0;

        currentOrder.forEach((item, index) => {
            totalAmount += item.subtotal;

            orderHTML += `
                    <div class="order-item bg-white border-b border-gray-200 p-3 flex justify-between items-center"
                         data-id="${item.id}" data-index="${index}">
                        <div>
                            <div class="font-semibold">${item.name}</div>
                            <div class="text-sm text-gray-500">${item.category}</div>
                            <div class="mt-1">
                                <button class="edit-btn text-blue-500 hover:text-blue-700 text-xs mr-3">
                                    <i class="fas fa-edit mr-1"></i> Remarks
                                </button>
                                <button class="edit-qty-btn text-blue-500 hover:text-blue-700 text-xs">
                                    <i class="fas fa-pencil-alt mr-1"></i> Qty: ${item.quantity}
                                </button>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-blue-600">$${item.subtotal.toFixed(2)}</div>
                            <button class="remove-btn text-red-500 hover:text-red-700 text-sm mt-2">
                                <i class="fas fa-times mr-1"></i> Remove
                            </button>
                        </div>
                    </div>
                `;
        });

        orderListEl.innerHTML = orderHTML;
        totalAmountEl.textContent = `$${totalAmount.toFixed(2)}`;

        // Add event listeners to dynamically created elements
        document.querySelectorAll('.edit-qty-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const itemIndex = parseInt(btn.closest('.order-item').dataset.index);
                selectedItemForQty = currentOrder[itemIndex];
                currentQtySpan.textContent = selectedItemForQty.quantity;
                qtyInput.value = selectedItemForQty.quantity;
                quantityModal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('.remove-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const itemIndex = parseInt(btn.closest('.order-item').dataset.index);
                currentOrder.splice(itemIndex, 1);
                updateOrderList();
            });
        });

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const itemIndex = parseInt(btn.closest('.order-item').dataset.index);
                const notes = prompt('Enter remarks for this item:', '');
                if (notes !== null) {
                    currentOrder[itemIndex].remarks = notes;
                    updateOrderList();
                }
            });
        });
    }
    </script>
</body>

</html>