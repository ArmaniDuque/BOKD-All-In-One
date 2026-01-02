// script.js

// --- Global State Variables ---
let menuCategories = [];
let menuSubcategories = [];
let menuItems = [];
let currentOrder = null; // Stores the active order from the database
let orderItems = []; // Stores order items for the current order
let currentCategory = 'ALL';
let currentSubcategory = null;
let menuSearchTerm = '';
let amountTendered = 0;

// --- DOM Elements ---
const orderIdDisplay = document.getElementById('order-id-display');
const currentDateDisplay = document.getElementById('current-date');
const currentTimeDisplay = document.getElementById('current-time');
const mainCategoriesContainer = document.getElementById('main-categories');
const subCategoriesContainer = document.getElementById('sub-categories');
const menuItemsDisplay = document.getElementById('menu-items-display');
const menuSearchInput = document.getElementById('menuSearchInput');
const orderItemsList = document.getElementById('order-items-list');
const amountTenderedInput = document.getElementById('amountTendered');
const changeDueInput = document.getElementById('changeDue');

// --- API Base URL ---
// IMPORTANT: This path is relative to your index.html
// Since api.php is now in the same directory as index.html, it's directly accessible.
const API_BASE_URL = './api.php/';

// --- API Utility Functions ---
async function fetchData(endpoint, params = {}) {
    const url = new URL(API_BASE_URL + endpoint, window.location.href); // Use window.location.href as base
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));
    try {
        const response = await fetch(url);
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.error || `HTTP error! status: ${response.status}`);
        }
        return await response.json();
    } catch (error) {
        console.error(`Error fetching ${endpoint}:`, error);
        alert(`Failed to load data: ${error.message}. Check console for details.`);
        return null;
    }
}

async function postData(endpoint, data) {
    try {
        const response = await fetch(API_BASE_URL + endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.error || `HTTP error! status: ${response.status}`);
        }
        return await response.json();
    } catch (error) {
        console.error(`Error posting to ${endpoint}:`, error);
        alert(`Failed to save data: ${error.message}. Check console for details.`);
        return null;
    }
}

async function putData(endpoint, data) {
    try {
        const response = await fetch(API_BASE_URL + endpoint, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.error || `HTTP error! status: ${response.status}`);
        }
        return await response.json();
    } catch (error) {
        console.error(`Error updating ${endpoint}:`, error);
        alert(`Failed to update data: ${error.message}. Check console for details.`);
        return null;
    }
}

async function deleteData(endpoint, data) {
    try {
        const response = await fetch(API_BASE_URL + endpoint, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.error || `HTTP error! status: ${response.status}`);
        }
        return await response.json();
    } catch (error) {
        console.error(`Error deleting ${endpoint}:`, error);
        alert(`Failed to delete data: ${error.message}. Check console for details.`);
        return null;
    }
}


// --- UI Update Functions ---

function updateDateTime() {
    const now = new Date();
    currentDateDisplay.textContent = now.toLocaleDateString('en-PH', { month: 'long', day: 'numeric', year: 'numeric' });
    currentTimeDisplay.textContent = now.toLocaleTimeString('en-PH', { hour: '2-digit', minute: '2-digit' });
}

function calculateOrderTotals() {
    let subtotal = 0;
    let totalDiscount = 0;

    orderItems.forEach(item => {
        subtotal += parseFloat(item.price) * parseInt(item.quantity);
        // Example: If an item has a 'discounted' status, assume its 'price' is already discounted
        // For 'Bottled Water' (MENU005) specifically, we can simulate a discount calculation
        // You'll need to adjust this logic based on how discounts are stored in your DB
        if (item.menuid === 'MENU005' && item.status === 'discounted') {
            // This part assumes you have a way to know the original price.
            // For a real system, 'price' in posordeitem should be the actual price charged.
            // If discount is a separate field, use that.
            // For now, let's just make sure the total is calculated correctly from `item.price`
            // If `item.price` already reflects the discount, `totalDiscount` would be calculated differently.
            // If you want to show a discount for a specific item, you'd need `original_price` in posordeitem table.
            // For now, `totalDiscount` will just reflect the `discount` field from the `posorder` table if available.
        }
    });

    const vatRate = 0.12;
    const taxableAmount = subtotal - (currentOrder?.discount || 0); // Use order-level discount if available
    const vatAmount = taxableAmount * vatRate;

    const totalAmountDue = taxableAmount + vatAmount;

    document.getElementById('subtotal').textContent = `₱ ${subtotal.toFixed(2)}`;
    document.getElementById('total-discount').textContent = `₱ ${(currentOrder?.discount || 0).toFixed(2)}`;
    document.getElementById('vat-amount').textContent = `₱ ${vatAmount.toFixed(2)}`;
    document.getElementById('total-amount-due').textContent = `₱ ${totalAmountDue.toFixed(2)}`;

    // Update currentOrder object (will be updated in DB via PUT request)
    if (currentOrder) {
        currentOrder.totalamount = totalAmountDue;
        // The discount is already part of currentOrder from DB fetch or initial creation
        // We should send this update to the DB
        putData('order', {
            orderid: currentOrder.orderid,
            totalamount: totalAmountDue,
            discount: currentOrder.discount // Ensure discount is also updated if changed
        });
    }

    // Calculate change due
    const change = amountTendered - totalAmountDue;
    changeDueInput.value = `₱ ${Math.max(0, change).toFixed(2)}`;
}

function renderOrderItems() {
    orderItemsList.innerHTML = ''; // Clear existing items

    if (orderItems.length === 0) {
        orderItemsList.innerHTML = '<p class="no-items-message">No items in order yet.</p>';
    } else {
        orderItems.forEach(item => {
            const menuItem = menuItems.find(m => m.menuid === item.menuid);
            const itemName = menuItem ? menuItem.name : 'Unknown Item';
            const itemElement = document.createElement('div');
            itemElement.classList.add('order-item');
            if (item.status === 'discounted') { // Assuming 'discounted' status is set in DB or logic
                itemElement.classList.add('item-discounted');
            }
            itemElement.dataset.orderItemId = item.orderitemid;

            itemElement.innerHTML = `
                <div class="item-main-details">
                    <span class="item-qty">${item.quantity}</span>
                    <span class="item-name">${itemName}</span>
                    <span class="item-unit-price">₱ ${parseFloat(item.price).toFixed(2)}</span>
                    <span class="item-amount">₱ ${(parseFloat(item.price) * parseInt(item.quantity)).toFixed(2)}</span>
                    <span class="item-action">
                        <button class="remove-item-btn" data-order-item-id="${item.orderitemid}">
                            <i class="fas fa-times"></i>
                        </button>
                    </span>
                </div>
                <div class="item-notes-section">
                    <input
                        type="text"
                        class="item-notes-input"
                        placeholder="Add notes (e.g., extra gravy, no sauce)"
                        value="${item.remarks || ''}"
                        data-order-item-id="${item.orderitemid}"
                    />
                </div>
            `;
            orderItemsList.appendChild(itemElement);
        });
    }
    calculateOrderTotals();
    // Scroll to bottom
    orderItemsList.scrollTop = orderItemsList.scrollHeight;
}

function renderMainCategories() {
    mainCategoriesContainer.innerHTML = '';
    // Add "ALL" category first
    const allCategoryBtn = document.createElement('button');
    allCategoryBtn.classList.add('category-tab', 'active');
    allCategoryBtn.dataset.categoryId = 'ALL';
    allCategoryBtn.textContent = 'ALL';
    mainCategoriesContainer.appendChild(allCategoryBtn);

    menuCategories.sort((a, b) => (a.sequence || 0) - (b.sequence || 0) || a.category.localeCompare(b.category)).forEach(category => {
        const btn = document.createElement('button');
        btn.classList.add('category-tab');
        btn.dataset.categoryId = category.id;
        btn.textContent = category.category;
        mainCategoriesContainer.appendChild(btn);
    });

    // Set initial active category
    const activeBtn = mainCategoriesContainer.querySelector(`[data-category-id="${currentCategory}"]`);
    if (activeBtn) {
        activeBtn.classList.add('active');
    }
}

function renderSubcategories() {
    subCategoriesContainer.innerHTML = '';
    subCategoriesContainer.style.display = 'none'; // Hide by default

    if (currentCategory === 'ALL') {
        return; // No subcategories for 'ALL'
    }

    const subcategoriesForCurrentCategory = menuSubcategories.filter(sub => sub.categoryid === currentCategory)
                                                            .sort((a, b) => (a.sequence || 0) - (b.sequence || 0) || a.subcategory.localeCompare(b.subcategory));

    if (subcategoriesForCurrentCategory.length > 0) {
        subCategoriesContainer.style.display = 'flex'; // Show subcategory bar

        // Add "All [Category Name]" subcategory
        const categoryName = menuCategories.find(c => c.id === currentCategory)?.category || '';
        const allSubBtn = document.createElement('button');
        allSubBtn.classList.add('subcategory-tab', 'active');
        // CHANGE: Ensure 'All' subcategory button also uses a distinct ID format
        allSubBtn.dataset.subcategoryId = `ALL_${currentCategory}`; // Example: ALL_FOOD, ALL_DRINKS
        allSubBtn.textContent = `All ${categoryName}`;
        subCategoriesContainer.appendChild(allSubBtn);

        subcategoriesForCurrentCategory.forEach(sub => {
            const subBtn = document.createElement('button');
            subBtn.classList.add('subcategory-tab');
            subBtn.dataset.subcategoryId = sub.subcatid; // Use the actual subcatid from DB
            subBtn.textContent = sub.subcategory;
            subCategoriesContainer.appendChild(subBtn);
        });

        // Set initial active subcategory to "All [CategoryName]"
        currentSubcategory = allSubBtn.dataset.subcategoryId;
        allSubBtn.classList.add('active');
    }
}

function renderMenuItems() {
    menuItemsDisplay.innerHTML = ''; // Clear existing items

    // --- DEBUGGING LOGS ---
    console.log('--- Rendering Menu Items ---');
    console.log('currentCategory:', currentCategory);
    console.log('currentSubcategory (before filtering):', currentSubcategory);
    console.log('menuSearchTerm:', menuSearchTerm);
    console.log('Total menuItems fetched from DB:', menuItems.length);
    // --- END DEBUGGING LOGS ---

    let filteredItems = menuItems.filter(item => item.status === '1');
    console.log('Filtered by status (Available, status=1):', filteredItems.length);

    if (currentCategory !== 'ALL') {
        filteredItems = filteredItems.filter(item => item.categoryid === currentCategory);
        console.log('Filtered by main category:', currentCategory, '->', filteredItems.length);
    }

    // IMPORTANT CHANGE: Refined subcategory filtering logic
    // We now directly use currentSubcategory (which holds the subcatid or 'ALL_CATEGORY')
    if (currentSubcategory && !currentSubcategory.startsWith('ALL_')) { // If a specific subcategory ID is selected
        // We no longer need to find the object by name, as currentSubcategory *is* the ID.
        // We just need to filter items where item.subcategoryid matches currentSubcategory.
        filteredItems = filteredItems.filter(item => item.subcategoryid === currentSubcategory);
        console.log('Filtered by specific subcategory ID:', currentSubcategory, '->', filteredItems.length);
    } else {
        console.log('Subcategory filter is "ALL" or not set, no specific subcategory filtering applied.');
    }


    if (menuSearchTerm) {
        const searchTermLower = menuSearchTerm.toLowerCase();
        filteredItems = filteredItems.filter(item =>
            item.name.toLowerCase().includes(searchTermLower) ||
            (item.description && item.description.toLowerCase().includes(searchTermLower))
        );
        console.log('Filtered by search term:', menuSearchTerm, '->', filteredItems.length);
    }

    if (filteredItems.length === 0) {
        menuItemsDisplay.innerHTML = '<p class="no-items-message">No items found for this selection.</p>';
    } else {
        filteredItems.forEach(item => {
            const btn = document.createElement('button');
            btn.classList.add('menu-item-btn');
            btn.dataset.menuid = item.menuid;
            btn.innerHTML = `${item.name}<br><small>₱ ${parseFloat(item.price).toFixed(2)}</small>`;
            menuItemsDisplay.appendChild(btn);
        });
    }
}

// --- Event Handlers ---

async function handleMainCategoryClick(event) {
    const clickedCategoryBtn = event.target.closest('.category-tab');
    if (clickedCategoryBtn) {
        mainCategoriesContainer.querySelectorAll('.category-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        clickedCategoryBtn.classList.add('active');

        currentCategory = clickedCategoryBtn.dataset.categoryId;
        currentSubcategory = null; // Reset subcategory when main category changes
        menuSearchInput.value = ''; // Clear search
        menuSearchTerm = '';

        console.log('Main Category Clicked:', currentCategory);
        renderSubcategories();
        renderMenuItems();
    }
}

async function handleSubcategoryClick(event) {
    const clickedSubcategoryBtn = event.target.closest('.subcategory-tab');
    if (clickedSubcategoryBtn) {
        subCategoriesContainer.querySelectorAll('.subcategory-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        clickedSubcategoryBtn.classList.add('active');

        // CHANGE: currentSubcategory now directly holds the subcatid from the button's dataset
        currentSubcategory = clickedSubcategoryBtn.dataset.subcategoryId;
        menuSearchInput.value = ''; // Clear search
        menuSearchTerm = '';

        console.log('Subcategory Clicked:', currentSubcategory);
        renderMenuItems();
    }
}

async function handleMenuItemClick(event) {
    const clickedMenuItemBtn = event.target.closest('.menu-item-btn');
    if (clickedMenuItemBtn && currentOrder) {
        const menuid = clickedMenuItemBtn.dataset.menuid;
        const menuItem = menuItems.find(item => item.menuid === menuid);

        if (!menuItem) {
            alert('Menu item not found!');
            return;
        }

        const existingOrderItem = orderItems.find(item => item.menuid === menuid && item.orderid === currentOrder.orderid);

        let response;
        if (existingOrderItem) {
            // Update quantity of existing item
            response = await putData('orderitems', {
                orderitemid: existingOrderItem.orderitemid,
                quantity: parseInt(existingOrderItem.quantity) + 1,
                price: parseFloat(menuItem.price) // Ensure price is current
            });
        } else {
            // Add new item to order
            response = await postData('orderitems', {
                orderid: currentOrder.orderid,
                menuid: menuItem.menuid,
                category: menuItem.categoryid, // Assuming categoryid from posmenu is what you want for posorderitem.category
                quantity: 1,
                price: parseFloat(menuItem.price),
                remarks: '',
                status: 'Pending',
            });
        }

        if (response) {
            await fetchOrderItems(currentOrder.orderid); // Re-fetch all order items to update UI
        }
    } else if (!currentOrder) {
        alert('Please wait while the order is being initialized or refresh the page.');
    }
}

async function handleRemoveOrderItem(event) {
    const removeBtn = event.target.closest('.remove-item-btn');
    if (removeBtn && currentOrder) {
        const orderItemIdToRemove = removeBtn.dataset.orderItemId;
        const response = await deleteData('orderitems', { orderitemid: orderItemIdToRemove });
        if (response) {
            await fetchOrderItems(currentOrder.orderid); // Re-fetch all order items to update UI
        }
    }
}

async function handleItemNotesInput(event) {
    const notesInput = event.target.closest('.item-notes-input');
    if (notesInput && currentOrder) {
        const orderItemId = notesInput.dataset.orderItemId;
        const newNotes = notesInput.value;
        // Debounce this if typing rapidly, but for now, direct update
        const response = await putData('orderitems', { orderitemid: orderItemId, remarks: newNotes });
        if (response) {
            // Update local state for immediate UI reflection without full re-fetch
            const updatedOrderItems = orderItems.map(item =>
                item.orderitemid === orderItemId ? { ...item, remarks: newNotes } : item
            );
            orderItems = updatedOrderItems;
            // No need to call renderOrderItems() as only the input value changed
        }
    }
}

function handleMenuSearchInput() {
    menuSearchTerm = menuSearchInput.value;
    renderMenuItems();
}

function handleAmountTenderedChange() {
    amountTendered = parseFloat(amountTenderedInput.value) || 0;
    calculateOrderTotals();
}

// --- Data Fetching and Initialization ---

async function fetchAllData() {
    // Fetch categories
    const categories = await fetchData('categories');
    if (categories) {
        menuCategories = categories;
        renderMainCategories();
    } else {
        console.error("Failed to fetch categories.");
        mainCategoriesContainer.innerHTML = '<p class="loading-message">Failed to load categories.</p>';
    }

    // Fetch subcategories
    const subcategories = await fetchData('subcategories');
    if (subcategories) {
        menuSubcategories = subcategories;
        renderSubcategories(); // Initial render based on default category
    } else {
        console.error("Failed to fetch subcategories.");
        subCategoriesContainer.innerHTML = '<p class="loading-message">Failed to load subcategories.</p>';
    }

    // Fetch menu items
    const items = await fetchData('menuitems');
    if (items) {
        menuItems = items;
        renderMenuItems();
    } else {
        console.error("Failed to fetch menu items.");
        menuItemsDisplay.innerHTML = '<p class="loading-message">Failed to load menu items.</p>';
    }
}

async function initializeOrder() {
    let order = await fetchData('order', { customerid: 'Walk-in' }); // Try to get existing pending order

    if (!order) {
        // If no pending order, create a new one
        const newOrderResponse = await postData('order', { customerid: 'Walk-in' });
        if (newOrderResponse && newOrderResponse.orderid) {
            order = {
                orderid: newOrderResponse.orderid,
                customerid: 'Walk-in',
                date: new Date().toISOString().split('T')[0],
                time: new Date().toTimeString().split(' ')[0],
                overallstatus: 'Pending',
                totalamount: 0,
                tableid: 'TBD',
                discount: 0,
                pax: 1,
            };
        } else {
            alert('Failed to initialize new order. Please check server logs.');
            return;
        }
    }
    currentOrder = order;
    orderIdDisplay.textContent = currentOrder.orderid;
    await fetchOrderItems(currentOrder.orderid);
}

async function fetchOrderItems(orderId) {
    const items = await fetchData('orderitems', { orderid: orderId });
    if (items) {
        orderItems = items;
        renderOrderItems();
    } else {
        console.error("Failed to fetch order items.");
        orderItemsList.innerHTML = '<p class="no-items-message">Failed to load order items.</p>';
    }
}


// --- Initial Setup ---
document.addEventListener('DOMContentLoaded', async () => {
    updateDateTime();
    setInterval(updateDateTime, 1000); // Update time every second

    await fetchAllData(); // Fetch all menu data first
    await initializeOrder(); // Then initialize/load the current order and its items

    // Add event listeners
    mainCategoriesContainer.addEventListener('click', handleMainCategoryClick);
    subCategoriesContainer.addEventListener('click', handleSubcategoryClick);
    menuItemsDisplay.addEventListener('click', handleMenuItemClick);
    orderItemsList.addEventListener('click', handleRemoveOrderItem);
    orderItemsList.addEventListener('input', handleItemNotesInput); // For notes input
    menuSearchInput.addEventListener('input', handleMenuSearchInput);
    amountTenderedInput.addEventListener('input', handleAmountTenderedChange);
});
