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
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
                <link rel="stylesheet" href="cashier-style.css">
                <?php //require "navbar.php"; ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Table Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">

            <!-- <body class="bg-gray-100 h-screen flex flex-col"> -->
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
                        <button
                            class="bg-red-500 hover:bg-red-600 px-6 py-2 rounded-lg font-semibold shadow flex items-center">
                            <i class="fas fa-sign-out-alt mr-2"></i> Exit
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex flex-1 overflow-hidden">
                <!-- Left Panel - Menu Categories and Items -->
                <div class="w-1/2 bg-white p-4 overflow-y-auto">
                    <div class="mb-4 flex overflow-x-auto pb-2 space-x-2" id="category-buttons-container">
                        <!-- Category Buttons will be dynamically loaded here -->
                        <button class="category-btn active px-4 py-2 bg-gray-200 rounded-full whitespace-nowrap">All
                            Items</button>
                    </div>

                    <!-- Search Bar -->
                    <div class="relative mb-4">
                        <input type="text" id="search-input" placeholder="Search menu items..."
                            class="w-full p-3 pl-10 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                    </div>

                    <!-- Menu Items Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3" id="menu-items-grid">
                        <!-- Menu Items will be dynamically loaded here -->
                    </div>
                </div>

                <!-- Right Panel - Order List -->
                <div class="w-1/2 bg-gray-50 border-l border-gray-200 flex flex-col">
                    <!-- Order Header -->
                    <div class="bg-white p-4 border-b border-gray-200 flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <h2 class="font-bold text-lg">Current Order</h2>
                            <button id="toggle-order-panel"
                                class="text-blue-600 hover:text-blue-800 px-3 py-1 border border-blue-600 rounded-lg flex items-center">
                                <i class="fas fa-eye-slash mr-2"></i>
                                Hide
                            </button>
                        </div>
                        <div>
                            <span class="font-semibold">Total:</span>
                            <span class="text-blue-600 font-bold ml-2 text-lg" id="order-total">Php 0.00</span>
                        </div>
                    </div>

                    <!-- Order Items List -->
                    <div class="flex-1 overflow-y-auto" id="order-list">
                        <!-- Empty State will be handled by JavaScript -->
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
            <div id="quantity-modal"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-lg p-6 w-96">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold">Adjust Quantity</h3>
                        <button id="close-quantity-modal" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Current Item: <span id="current-item-name"
                                class="font-semibold"></span></label>
                        <label class="block text-gray-700 mb-2">Current Quantity: <span
                                id="current-qty">1</span></label>
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
                // Track order panel visibility
                let orderPanelVisible = true;

                // DOM Elements
                const orderListEl = document.getElementById('order-list');
                const orderTotalEl = document.getElementById('order-total');
                const categoryButtonsContainer = document.getElementById(
                    'category-buttons-container'); // New ID for container
                const menuItemsGrid = document.getElementById('menu-items-grid');
                const searchInput = document.getElementById('search-input');

                const quantityModal = document.getElementById('quantity-modal');
                const qtyInput = document.getElementById('qty-input');
                const currentQtySpan = document.getElementById('current-qty');
                const currentItemNameSpan = document.getElementById('current-item-name');

                let currentOrder = [];
                let selectedItemForQty = null; // Stores the order item object for quantity adjustment

                // Data from API
                let menuItems = [];
                let categories = [];
                let subcategories = []; // Not directly used in UI yet, but fetched for completeness

                // --- Functions ---

                // Function to fetch data from the API
                async function fetchDataFromAPI() {
                    try {
                        // Fetch Categories first, as menu items depend on them for category names
                        const categoryResponse = await fetch('api.php?action=getCategories');
                        if (!categoryResponse.ok) throw new Error('Failed to fetch categories: ' + categoryResponse
                            .statusText);
                        const categoryData = await categoryResponse.json();
                        if (categoryData.error) throw new Error('API Error (Categories): ' + categoryData.error);
                        categories = categoryData.categories;

                        // Fetch Subcategories (optional, but good to have if needed later)
                        const subcategoryResponse = await fetch('api.php?action=getSubcategories');
                        if (!subcategoryResponse.ok) throw new Error('Failed to fetch subcategories: ' +
                            subcategoryResponse
                                .statusText);
                        const subcategoryData = await subcategoryResponse.json();
                        if (subcategoryData.error) throw new Error('API Error (Subcategories): ' + subcategoryData
                            .error);
                        subcategories = subcategoryData.subcategories;

                        // Fetch Menu Items
                        const menuResponse = await fetch('api.php?action=getMenu');
                        if (!menuResponse.ok) throw new Error('Failed to fetch menu items: ' + menuResponse
                            .statusText);
                        const menuData = await menuResponse.json();
                        if (menuData.error) throw new Error('API Error (Menu): ' + menuData.error);

                        // Map menu items to include category name and parse numbers
                        menuItems = menuData.menuItems.map(item => ({
                            id: parseInt(item.menuid), // Map menuid to id
                            name: item.name,
                            description: item.description,
                            price: parseFloat(item.price),
                            price1: parseFloat(item.price1),
                            // Find category name using categoryid
                            category: categories.find(cat => cat.id == item.categoryid)?.category ||
                                'Uncategorized',
                            categoryid: parseInt(item.categoryid),
                            status: parseInt(item.status),
                            subcategoryid: parseInt(item.subcategoryid),
                            // Generate a placeholder image URL
                            image: `https://placehold.co/150x150/f0f0f0/333333?text=${encodeURIComponent(item.name.split(' ')[0])}`
                        }));

                        // Dynamically create category buttons
                        renderCategoryButtons();

                        // Render all fetched menu items initially
                        renderMenuItems(menuItems);
                        updateOrderList(); // Initialize order list display

                    } catch (error) {
                        console.error('Error fetching data:', error);
                        alert('Failed to load menu data. Please ensure the backend (api.php) is running and configured correctly. Error: ' +
                            error.message);
                    }
                }

                // Renders category buttons dynamically
                function renderCategoryButtons() {
                    categoryButtonsContainer.innerHTML = ''; // Clear existing buttons
                    // Add "All Items" button first
                    const allItemsBtn = document.createElement('button');
                    allItemsBtn.classList.add('category-btn', 'active', 'px-4', 'py-2', 'bg-gray-200', 'rounded-full',
                        'whitespace-nowrap');
                    allItemsBtn.textContent = 'All Items';
                    categoryButtonsContainer.appendChild(allItemsBtn);

                    // Add buttons for fetched categories
                    categories.forEach(cat => {
                        const button = document.createElement('button');
                        button.classList.add('category-btn', 'px-4', 'py-2', 'bg-gray-200', 'rounded-full',
                            'whitespace-nowrap');
                        button.textContent = cat.category;
                        categoryButtonsContainer.appendChild(button);
                    });
                    // Re-attach listeners to new category buttons
                    attachCategoryButtonListeners();
                }

                // Attaches event listeners to category buttons
                function attachCategoryButtonListeners() {
                    document.querySelectorAll('.category-btn').forEach(button => {
                        // Remove existing listeners to prevent duplicates if function is called multiple times
                        button.removeEventListener('click', handleCategoryButtonClick);
                        button.addEventListener('click', handleCategoryButtonClick);
                    });
                }

                // Handler function for category buttons
                function handleCategoryButtonClick() {
                    document.querySelectorAll('.category-btn').forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active'); // 'this' refers to the clicked button
                    const category = this.textContent;
                    filterMenuItems(category);
                }

                // Renders menu items into the grid
                function renderMenuItems(itemsToRender) {
                    menuItemsGrid.innerHTML = ''; // Clear existing items
                    if (itemsToRender.length === 0) {
                        menuItemsGrid.innerHTML =
                            '<p class="col-span-full text-center text-gray-500 py-10">No items found for this category or search.</p>';
                        return;
                    }
                    itemsToRender.forEach(item => {
                        const menuItemDiv = document.createElement('div');
                        menuItemDiv.classList.add(
                            'menu-item', 'bg-white', 'border', 'border-gray-200', 'rounded-lg',
                            'overflow-hidden', 'shadow-sm', 'cursor-pointer', 'hover:shadow-md',
                            'transition-shadow'
                        );
                        menuItemDiv.dataset.id = item.id;
                        menuItemDiv.innerHTML = `
                    <div class="bg-gray-100 h-32 flex items-center justify-center overflow-hidden">
                        ${item.image ? `<img src="${item.image}" alt="${item.name}" class="w-full h-full object-cover">` : `<i class="fas fa-utensils text-3xl text-gray-400"></i>`}
                    </div>
                    <div class="p-3">
                        <h3 class="font-semibold truncate">${item.name}</h3>
                        <p class="text-blue-600 font-bold">Php ${item.price}</p>
                    </div>
                `;
                        menuItemsGrid.appendChild(menuItemDiv);

                        // Add click listener to the newly created item
                        menuItemDiv.addEventListener('click', () => {
                            addToOrder(item.id);
                        });
                    });
                }

                // Toggles the visibility of the order panel
                function toggleOrderPanel() {
                    const orderPanel = document.querySelector('.w-1/2.bg-gray-50');
                    const menuPanel = document.querySelector('.w-1/2.bg-white');
                    const toggleBtn = document.getElementById('toggle-order-panel');

                    orderPanelVisible = !orderPanelVisible;

                    if (orderPanelVisible) {
                        orderPanel.classList.remove('hidden');
                        menuPanel.classList.remove('w-full');
                        menuPanel.classList.add('w-1/2');
                        toggleBtn.innerHTML = '<i class="fas fa-eye-slash mr-2"></i>Hide';
                    } else {
                        orderPanel.classList.add('hidden');
                        menuPanel.classList.remove('w-1/2');
                        menuPanel.classList.add('w-full');
                        toggleBtn.innerHTML = '<i class="fas fa-eye mr-2"></i>Show Cart';
                    }
                }

                // Filters menu items based on category and search term
                function filterMenuItems(category) {
                    const searchTerm = searchInput.value.toLowerCase();
                    let filteredItems = menuItems;

                    // Apply category filter
                    if (category !== 'All Items') {
                        filteredItems = filteredItems.filter(item => item.category === category);
                    }

                    // Apply search filter
                    if (searchTerm) {
                        filteredItems = filteredItems.filter(item =>
                            item.name.toLowerCase().includes(searchTerm) ||
                            item.description.toLowerCase().includes(searchTerm) ||
                            item.category.toLowerCase().includes(searchTerm)
                        );
                    }
                    renderMenuItems(filteredItems);
                }

                // Adds an item to the current order or increments its quantity
                function addToOrder(itemId) {
                    const existingItemIndex = currentOrder.findIndex(item => item.id === itemId);

                    if (existingItemIndex !== -1) {
                        currentOrder[existingItemIndex].quantity += 1;
                        currentOrder[existingItemIndex].subtotal = currentOrder[existingItemIndex].price * currentOrder[
                            existingItemIndex].quantity;
                    } else {
                        const menuItem = menuItems.find(item => item.id ===
                            itemId); // Find the full item object from fetched data
                        if (menuItem) {
                            currentOrder.push({
                                ...menuItem, // Copy all properties from the original menu item
                                quantity: 1,
                                subtotal: menuItem.price
                            });
                        }
                    }
                    updateOrderList();
                }

                // Updates the order list display and total amount
                function updateOrderList() {
                    if (currentOrder.length === 0) {
                        orderListEl.innerHTML = `
                    <div class="flex flex-col items-center justify-center h-full text-gray-400">
                        <i class="fas fa-shopping-cart text-5xl mb-4"></i>
                        <p class="text-lg">No items in order</p>
                        <p class="text-sm">Select items from the menu</p>
                    </div>
                `;
                        orderTotalEl.textContent = 'Php 0.00';
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
                            ${item.remarks ? `<div class="text-xs text-gray-600 italic">Remarks: ${item.remarks}</div>` : ''}
                            <div class="mt-1">
                                <button class="edit-remarks-btn text-blue-500 hover:text-blue-700 text-xs mr-3">
                                    <i class="fas fa-edit mr-1"></i> Remarks
                                </button>
                                <button class="edit-qty-btn text-blue-500 hover:text-blue-700 text-xs">
                                    <i class="fas fa-pencil-alt mr-1"></i> Qty: ${item.quantity}
                                </button>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-blue-600">Php ${item.subtotal.toFixed(2)}</div>
                            <button class="remove-btn text-red-500 hover:text-red-700 text-sm mt-2">
                                <i class="fas fa-times mr-1"></i> Remove
                            </button>
                        </div>
                    </div>
                `;
                    });

                    orderListEl.innerHTML = orderHTML;
                    orderTotalEl.textContent = `Php ${totalAmount.toFixed(2)}`;

                    // IMPORTANT: Re-attach event listeners to dynamically created elements
                    attachOrderListEventListeners();
                }

                // Attaches event listeners to buttons within the order list
                function attachOrderListEventListeners() {
                    // Event listener for Quantity Edit button on each order item
                    document.querySelectorAll('.edit-qty-btn').forEach(btn => {
                        btn.addEventListener('click', (e) => {
                            e.stopPropagation(); // Prevent parent order-item click
                            const itemIndex = parseInt(btn.closest('.order-item').dataset.index);
                            selectedItemForQty = currentOrder[itemIndex];
                            currentItemNameSpan.textContent = selectedItemForQty
                                .name; // Display item name in modal
                            currentQtySpan.textContent = selectedItemForQty.quantity;
                            qtyInput.value = selectedItemForQty.quantity;
                            quantityModal.classList.remove('hidden');
                            qtyInput.focus(); // Focus on the input field
                            qtyInput.select(); // Select the current value
                        });
                    });

                    // Event listener for Remove button on each order item
                    document.querySelectorAll('.remove-btn').forEach(btn => {
                        btn.addEventListener('click', (e) => {
                            e.stopPropagation(); // Prevent parent order-item click
                            const itemIndex = parseInt(btn.closest('.order-item').dataset.index);
                            if (confirm(
                                `Are you sure you want to remove "${currentOrder[itemIndex].name}" from the order?`
                            )) {
                                currentOrder.splice(itemIndex, 1);
                                updateOrderList();
                            }
                        });
                    });

                    // Event listener for Remarks Edit button on each order item
                    document.querySelectorAll('.edit-remarks-btn').forEach(btn => {
                        btn.addEventListener('click', (e) => {
                            e.stopPropagation(); // Prevent parent order-item click
                            const itemIndex = parseInt(btn.closest('.order-item').dataset.index);
                            const currentRemarks = currentOrder[itemIndex].remarks ||
                                ''; // Get existing remarks or empty string
                            const notes = prompt('Enter remarks for this item:', currentRemarks);
                            if (notes !== null) { // User didn't click cancel
                                currentOrder[itemIndex].remarks = notes.trim();
                                updateOrderList();
                            }
                        });
                    });
                }

                // --- Event Listeners ---

                // Header Action Buttons
                document.getElementById('toggle-order-panel').addEventListener('click', toggleOrderPanel);

                // Search Input
                searchInput.addEventListener('input', () => {
                    const activeCategoryBtn = document.querySelector('.category-btn.active');
                    const currentCategory = activeCategoryBtn ? activeCategoryBtn.textContent : 'All Items';
                    filterMenuItems(currentCategory); // Re-filter with current category and new search term
                });


                // Footer Action Buttons
                document.getElementById('quantity-btn').addEventListener('click', () => {
                    alert(
                        'Please click on an item in the current order list (on "Qty: X") to adjust its quantity.'
                    );
                });

                document.getElementById('void-btn').addEventListener('click', () => {
                    if (currentOrder.length > 0 && confirm(
                        'Are you sure you want to void the entire current order? This action cannot be undone.'
                    )) {
                        currentOrder = [];
                        updateOrderList();
                        document.getElementById('order-notes').value = ''; // Clear notes as well
                    } else if (currentOrder.length === 0) {
                        alert('The order list is already empty.');
                    }
                });

                document.getElementById('assign-guest-btn').addEventListener('click', () => {
                    const newGuestName = prompt('Enter new guest name (leave blank to clear):',
                        'John Doe'); // Default for demo
                    if (newGuestName !== null) { // User didn't cancel
                        document.querySelector('header div:nth-child(1) div:nth-child(2) div').textContent =
                            newGuestName ||
                            'Guest';
                    }
                });

                document.getElementById('open-items-btn').addEventListener('click', () => {
                    alert('This functionality would typically open a list of previously saved/open orders.');
                });

                // Quantity Modal Buttons
                document.getElementById('close-quantity-modal').addEventListener('click', () => {
                    quantityModal.classList.add('hidden');
                    selectedItemForQty = null; // Clear selected item when modal closes
                });

                document.getElementById('increase-qty').addEventListener('click', () => {
                    qtyInput.value = parseInt(qtyInput.value) + 1;
                });

                document.getElementById('decrease-qty').addEventListener('click', () => {
                    const currentVal = parseInt(qtyInput.value);
                    if (currentVal > 1) { // Decrease if quantity is more than 1
                        qtyInput.value = currentVal - 1;
                    } else if (currentVal === 1 && selectedItemForQty) {
                        // If quantity is 1 and user tries to decrease, ask to remove
                        if (confirm(`Remove "${selectedItemForQty.name}" from order?`)) {
                            const itemIndex = currentOrder.findIndex(item => item.id === selectedItemForQty.id);
                            if (itemIndex !== -1) {
                                currentOrder.splice(itemIndex, 1);
                            }
                            updateOrderList();
                            quantityModal.classList.add('hidden'); // Close modal after removal
                            selectedItemForQty = null; // Clear selection
                            return; // Stop further processing
                        }
                    }
                });

                document.getElementById('update-qty').addEventListener('click', () => {
                    const newQty = parseInt(qtyInput.value);
                    if (selectedItemForQty) {
                        const itemIndex = currentOrder.findIndex(item => item.id === selectedItemForQty.id);
                        if (itemIndex !== -1) {
                            if (newQty <= 0) { // If updated quantity is 0 or less, remove item
                                if (confirm(`Remove "${selectedItemForQty.name}" from order?`)) {
                                    currentOrder.splice(itemIndex, 1);
                                }
                            } else {
                                currentOrder[itemIndex].quantity = newQty;
                                currentOrder[itemIndex].subtotal = currentOrder[itemIndex].price * newQty;
                            }
                            updateOrderList(); // Update the displayed list
                        }
                    }
                    quantityModal.classList.add('hidden');
                    selectedItemForQty = null; // Clear selection after update
                });

                // Initial render when the DOM is fully loaded
                document.addEventListener('DOMContentLoaded', () => {
                    fetchDataFromAPI
                        (); // This will now fetch data and then call renderMenuItems and updateOrderList
                });
            </script>
            <!-- </body> -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "../../footer1.php"; ?>