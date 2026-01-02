

// script.js

// --- Global State Variables ---
// These variables hold the main data and current state of your POS application.
// They are declared with 'let' because their values will change as the user interacts with the system.

let menuCategories = []; // An array to store the main menu categories (e.g., FOOD, DRINKS) fetched from the database.
let menuSubcategories = []; // An array to store subcategories (e.g., Main Course, Hot Beverages) fetched from the database.
let menuItems = []; // An array to store all individual menu items (e.g., Adobo Pork, Coffee) fetched from the database.
let currentOrder = null; // An object that will hold the details of the currently active customer order (e.g., order ID, total amount).
                          // It's initialized to null, meaning no order is active yet.
let orderItems = []; // An array to store the specific items that have been added to the 'currentOrder'.
let currentCategory = 'ALL'; // A string that tracks the currently selected main category tab. Defaults to 'ALL' to show all items.
let currentSubcategory = null; // A string that tracks the currently selected subcategory tab. Defaults to null.
let menuSearchTerm = ''; // A string that stores the text entered in the menu search bar.
let amountTendered = 0; // A number that stores the amount of money the customer has paid.

// --- DOM Elements ---
// These constants store references to specific HTML elements on your page.
// Using 'const' is good practice because these references won't change after they are found.

const orderIdDisplay = document.getElementById('order-id-display'); // Reference to the HTML element that displays the current order ID.
const currentDateDisplay = document.getElementById('current-date'); // Reference to the element displaying the current date.
const currentTimeDisplay = document.getElementById('current-time'); // Reference to the element displaying the current time.
const mainCategoriesContainer = document.getElementById('main-categories'); // Container for the main category buttons (e.g., FOOD, DRINKS).
const subCategoriesContainer = document.getElementById('sub-categories'); // Container for the subcategory buttons (e.g., Appetizers, Main Course).
const menuItemsDisplay = document.getElementById('menu-items-display'); // Container where individual menu item buttons are displayed.
const menuSearchInput = document.getElementById('menuSearchInput'); // The input field for searching menu items.
const orderItemsList = document.getElementById('order-items-list'); // The list where items added to the current order are shown.
const amountTenderedInput = document.getElementById('amountTendered'); // The input field where the cashier enters the amount paid.
const changeDueInput = document.getElementById('changeDue'); // The input field that displays the change due to the customer.

// --- API Base URL ---
// This constant defines the base URL for your PHP API.
// It's crucial for making AJAX requests to your backend.

const API_BASE_URL = './api.php/'; // Specifies that 'api.php' is in the same directory as this script.

// --- API Utility Functions ---
// These are reusable asynchronous functions that handle communication with your PHP backend using the Fetch API.
// They abstract away the complexities of making HTTP requests (GET, POST, PUT, DELETE) and handling JSON responses.

async function fetchData(endpoint, params = {}) {
    // 'endpoint': e.g., 'categories', 'menuitems', 'order'.
    // 'params': an object of query parameters (e.g., { orderid: 'ORD123' }).
    const url = new URL(API_BASE_URL + endpoint, window.location.href); // Constructs the full URL for the API request.
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key])); // Adds any provided parameters to the URL as query strings.
    try {
        const response = await fetch(url); // Sends a GET request to the constructed URL. 'await' pauses execution until response is received.
        if (!response.ok) { // Checks if the HTTP response status is not in the 200-299 range (e.g., 404, 500).
            const errorData = await response.json(); // Tries to parse the error response as JSON.
            throw new Error(errorData.error || `HTTP error! status: ${response.status}`); // Throws an error with a more descriptive message.
        }
        return await response.json(); // Parses the successful response body as JSON and returns it.
    } catch (error) {
        console.error(`Error fetching ${endpoint}:`, error); // Logs the error to the browser console for debugging.
        alert(`Failed to load data: ${error.message}. Check console for details.`); // Shows a user-friendly alert.
        return null; // Returns null to indicate failure.
    }
}

async function postData(endpoint, data) {
    // 'endpoint': e.g., 'order', 'orderitem'.
    // 'data': the JavaScript object to send as JSON in the request body.
    try {
        const response = await fetch(API_BASE_URL + endpoint, {
            method: 'POST', // Specifies that this is a POST request (used for creating new resources).
            headers: {
                'Content-Type': 'application/json', // Tells the server that the request body is JSON.
            },
            body: JSON.stringify(data), // Converts the JavaScript 'data' object into a JSON string to send.
        });
        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.error || `HTTP error! status: ${response.status}`);
        }
        return await response.json(); // Returns the JSON response from the server (e.g., success message, new ID).
    } catch (error) {
        console.error(`Error posting to ${endpoint}:`, error);
        alert(`Failed to save data: ${error.message}. Check console for details.`);
        return null;
    }
}

async function putData(endpoint, data) {
    // 'endpoint': e.g., 'order', 'orderitem'.
    // 'data': the JavaScript object containing fields to update.
    try {
        const response = await fetch(API_BASE_URL + endpoint, {
            method: 'PUT', // Specifies that this is a PUT request (used for updating existing resources).
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
    // 'endpoint': e.g., 'orderitem'.
    // 'data': the JavaScript object containing the ID of the resource to delete.
    try {
        const response = await fetch(API_BASE_URL + endpoint, {
            method: 'DELETE', // Specifies that this is a DELETE request (used for removing resources).
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
// These functions are responsible for updating the visual elements of the POS interface.

function updateDateTime() {
    // Gets the current date and time and updates the display elements.
    const now = new Date(); // Creates a new Date object representing the current moment.
    currentDateDisplay.textContent = now.toLocaleDateString('en-PH', { month: 'long', day: 'numeric', year: 'numeric' }); // Formats and displays the date.
    currentTimeDisplay.textContent = now.toLocaleTimeString('en-PH', { hour: '2-digit', minute: '2-digit' }); // Formats and displays the time.
}

function calculateOrderTotals() {
    // Calculates the subtotal, discounts, VAT, and total amount due for the current order.
    let subtotal = 0; // Initializes subtotal to zero.
    let totalDiscount = 0; // Initializes total discount to zero.

    orderItems.forEach(item => { // Loops through each item currently in the 'orderItems' array.
        subtotal += parseFloat(item.price) * parseInt(item.quantity); // Adds the item's total price (price * quantity) to the subtotal.
                                                                     // parseFloat and parseInt ensure they are treated as numbers.
        // Example: If an item has a 'discounted' status, assume its 'price' is already discounted
        // For 'Bottled Water' (MENU005) specifically, we can simulate a discount calculation
        // You'll need to adjust this logic based on how discounts are stored in your DB
        if (item.menuid === 'MENU005' && item.status === 'discounted') {
            // This conditional block is a placeholder for more complex discount logic.
            // Currently, it doesn't modify subtotal or totalDiscount.
        }
    });

    const vatRate = 0.12; // Defines the VAT rate (12%).
    const taxableAmount = subtotal - (currentOrder?.discount || 0); // Calculates the amount subject to VAT, subtracting any overall order discount.
                                                                    // `currentOrder?.discount || 0` safely gets discount or defaults to 0 if currentOrder or discount is null/undefined.
    const vatAmount = taxableAmount * vatRate; // Calculates the VAT amount.

    const totalAmountDue = taxableAmount + vatAmount; // Calculates the final total amount the customer needs to pay.

    // Updates the text content of the summary display elements.
    document.getElementById('subtotal').textContent = `₱ ${subtotal.toFixed(2)}`;
    document.getElementById('total-discount').textContent = `₱ ${(currentOrder?.discount || 0).toFixed(2)}`;
    document.getElementById('vat-amount').textContent = `₱ ${vatAmount.toFixed(2)}`;
    document.getElementById('total-amount-due').textContent = `₱ ${totalAmountDue.toFixed(2)}`;

    // Update currentOrder object (will be updated in DB via PUT request)
    if (currentOrder) { // Checks if there's an active order.
        currentOrder.totalamount = totalAmountDue; // Updates the total amount in the local 'currentOrder' object.
        // The discount is already part of currentOrder from DB fetch or initial creation
        // We should send this update to the DB
        console.log('Sending order total update to DB:'); // Debugging log.
        console.log('  orderid:', currentOrder.orderid); // Debugging log.
        console.log('  totalamount:', totalAmountDue); // Debugging log.
        console.log('  discount:', currentOrder.discount); // Debugging log.
        putData('order', { // Sends a PUT request to update the 'posorder' table in the database.
            orderid: currentOrder.orderid,
            totalamount: totalAmountDue,
            discount: currentOrder.discount // Ensures discount is also updated if changed.
        });
    }

    // Calculate change due
    const change = amountTendered - totalAmountDue; // Calculates the change.
    changeDueInput.value = `₱ ${Math.max(0, change).toFixed(2)}`; // Displays the change, ensuring it's not negative.
}

function renderOrderItems() {
    // Clears and re-renders the list of items in the current order on the left panel.
    orderItemsList.innerHTML = ''; // Clears all existing HTML inside the order items list.

    if (orderItems.length === 0) { // Checks if there are no items in the order.
        orderItemsList.innerHTML = '<p class="no-items-message">No items in order yet.</p>'; // Displays a message if the list is empty.
    } else {
        orderItems.forEach(item => { // Loops through each item in the 'orderItems' array.
            const menuItem = menuItems.find(m => m.menuid === item.menuid); // Finds the full menu item details from the 'menuItems' array using its ID.
            const itemName = menuItem ? menuItem.name : 'Unknown Item'; // Gets the item name, or 'Unknown Item' if not found.
            const itemElement = document.createElement('div'); // Creates a new div element for each order item.
            itemElement.classList.add('order-item'); // Adds a CSS class for styling.
            if (item.status === 'discounted') { // Checks if the item has a 'discounted' status.
                itemElement.classList.add('item-discounted'); // Adds a class for visual indication of discount.
            }
            itemElement.dataset.orderItemId = item.orderitemid; // Stores the order item's unique ID as a data attribute on the HTML element.

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
            `; // Sets the inner HTML of the item element, including quantity, name, price, amount, remove button, and notes input.
            orderItemsList.appendChild(itemElement); // Adds the newly created item element to the order items list.
        });
    }
    calculateOrderTotals(); // Recalculates and updates the order totals after rendering items.
    // Scroll to bottom
    orderItemsList.scrollTop = orderItemsList.scrollHeight; // Scrolls the order list to the bottom.
}

function renderMainCategories() {
    // Renders the main category tabs (e.g., ALL, FOOD, DRINKS).
    mainCategoriesContainer.innerHTML = ''; // Clears existing category tabs.
    // Add "ALL" category first
    const allCategoryBtn = document.createElement('button'); // Creates a button for the "ALL" category.
    allCategoryBtn.classList.add('category-tab', 'active'); // Adds CSS classes and sets it as active by default.
    allCategoryBtn.dataset.categoryId = 'ALL'; // Sets a data attribute to identify this category.
    allCategoryBtn.textContent = 'ALL'; // Sets the button text.
    mainCategoriesContainer.appendChild(allCategoryBtn); // Adds the "ALL" button to the container.

    menuCategories.sort((a, b) => (a.sequence || 0) - (b.sequence || 0) || a.category.localeCompare(b.category)).forEach(category => {
        // Sorts categories by sequence, then alphabetically, and loops through them.
        const btn = document.createElement('button'); // Creates a button for each category.
        btn.classList.add('category-tab'); // Adds CSS class.
        btn.dataset.categoryId = category.id; // Sets the category ID as a data attribute.
        btn.textContent = category.category; // Sets the category name as button text.
        mainCategoriesContainer.appendChild(btn); // Adds the button to the container.
    });

    // Set initial active category
    const activeBtn = mainCategoriesContainer.querySelector(`[data-category-id="${currentCategory}"]`); // Finds the button corresponding to the current active category.
    if (activeBtn) {
        activeBtn.classList.add('active'); // Adds the 'active' class if found.
    }
}

function renderSubcategories() {
    // Renders the subcategory tabs based on the currently selected main category.
    subCategoriesContainer.innerHTML = ''; // Clears existing subcategory tabs.
    subCategoriesContainer.style.display = 'none'; // Hides the subcategory container by default.

    if (currentCategory === 'ALL') {
        return; // If 'ALL' main category is selected, there are no subcategories to show, so exit.
    }

    const subcategoriesForCurrentCategory = menuSubcategories.filter(sub => sub.categoryid === currentCategory)
                                                            .sort((a, b) => (a.sequence || 0) - (b.sequence || 0) || a.subcategory.localeCompare(b.subcategory));
    // Filters 'menuSubcategories' to get only those belonging to the 'currentCategory', then sorts them.

    if (subcategoriesForCurrentCategory.length > 0) { // Checks if there are any subcategories for the current main category.
        subCategoriesContainer.style.display = 'flex'; // Shows the subcategory container if there are subcategories.

        // Add "All [Category Name]" subcategory
        const categoryName = menuCategories.find(c => c.id === currentCategory)?.category || ''; // Finds the name of the current main category.
        const allSubBtn = document.createElement('button'); // Creates a button for "All [Category Name]".
        allSubBtn.classList.add('subcategory-tab', 'active'); // Adds CSS classes and sets it as active.
        allSubBtn.dataset.subcategoryId = `ALL_${currentCategory}`; // Sets a unique data attribute for this "All" subcategory.
        allSubBtn.textContent = `All ${categoryName}`; // Sets the button text.
        subCategoriesContainer.appendChild(allSubBtn); // Adds the "All" subcategory button.

        subcategoriesForCurrentCategory.forEach(sub => { // Loops through each relevant subcategory.
            const subBtn = document.createElement('button'); // Creates a button for each subcategory.
            subBtn.classList.add('subcategory-tab'); // Adds CSS class.
            subBtn.dataset.subcategoryId = sub.subcatid; // Stores the actual subcategory ID from the database as a data attribute.
            subBtn.textContent = sub.subcategory; // Sets the subcategory name as button text.
            subCategoriesContainer.appendChild(subBtn); // Adds the button to the container.
        });

        // Set initial active subcategory to "All [CategoryName]"
        currentSubcategory = allSubBtn.dataset.subcategoryId; // Sets the 'currentSubcategory' state to the "All" subcategory's ID.
        allSubBtn.classList.add('active'); // Ensures the "All" subcategory button is visually active.
    }
}

function renderMenuItems() {
    // Clears and re-renders the menu item grid based on current filters.
    menuItemsDisplay.innerHTML = ''; // Clears all existing menu item buttons.

    // --- DEBUGGING LOGS --- (These help you see the state during filtering)
    console.log('--- Rendering Menu Items ---');
    console.log('currentCategory:', currentCategory);
    console.log('currentSubcategory (before filtering):', currentSubcategory);
    console.log('menuSearchTerm:', menuSearchTerm);
    console.log('Total menuItems fetched from DB:', menuItems.length);
    console.log('Full menuItems data:', menuItems); // Logs the entire raw menuItems array.
    // --- END DEBUGGING LOGS ---

    let filteredItems = menuItems.filter(item => item.status === '1'); // Starts by filtering items that have a status of '1' (which means 'Available' in your DB).
    console.log('Filtered by status (Available, status=1):', filteredItems.length); // Logs how many items are left after status filtering.

    if (currentCategory !== 'ALL') { // If a specific main category is selected (not 'ALL').
        filteredItems = filteredItems.filter(item => item.categoryid === currentCategory); // Filters items to only include those matching the 'currentCategory' ID.
        console.log('Filtered by main category:', currentCategory, '->', filteredItems.length); // Logs results after main category filtering.
    }

    // IMPORTANT CHANGE: Refined subcategory filtering logic
    // This block handles filtering by specific subcategories.
    if (currentSubcategory && !currentSubcategory.startsWith('ALL_')) { // Checks if a subcategory is selected AND it's not the "All [Category]" placeholder.
        // We now directly use currentSubcategory (which holds the subcatid or 'ALL_CATEGORY')
        // We no longer need to find the object by name, as currentSubcategory *is* the ID.
        // We just need to filter items where item.subcategoryid matches currentSubcategory.
        filteredItems = filteredItems.filter(item => item.subcategoryid === currentSubcategory); // Filters items to only include those matching the 'currentSubcategory' ID.
        console.log('Filtered by specific subcategory ID:', currentSubcategory, '->', filteredItems.length); // Logs results after subcategory filtering.
    } else {
        console.log('Subcategory filter is "ALL" or not set, no specific subcategory filtering applied.'); // Logs if no specific subcategory filter is active.
    }


    if (menuSearchTerm) { // If there's text in the search bar.
        const searchTermLower = menuSearchTerm.toLowerCase(); // Converts search term to lowercase for case-insensitive search.
        filteredItems = filteredItems.filter(item =>
            item.name.toLowerCase().includes(searchTermLower) || // Checks if item name includes the search term.
            (item.description && item.description.toLowerCase().includes(searchTermLower)) // Checks if item description includes the search term (if description exists).
        );
        console.log('Filtered by search term:', menuSearchTerm, '->', filteredItems.length); // Logs results after search filtering.
    }

    if (filteredItems.length === 0) { // If no items are found after all filters.
        menuItemsDisplay.innerHTML = '<p class="no-items-message">No items found for this selection.</p>'; // Displays a "no items" message.
    } else {
        filteredItems.forEach(item => { // Loops through the final filtered items.
            const btn = document.createElement('button'); // Creates a button for each menu item.
            btn.classList.add('menu-item-btn'); // Adds CSS class.
            btn.dataset.menuid = item.menuid; // Stores the menu item's ID as a data attribute.
            btn.innerHTML = `${item.name}<br><small>₱ ${parseFloat(item.price).toFixed(2)}</small>`; // Sets button text with name and formatted price.
            menuItemsDisplay.appendChild(btn); // Adds the button to the menu items grid.
        });
    }
}

// --- Event Handlers ---
// These functions respond to user interactions (clicks, input changes).

async function handleMainCategoryClick(event) {
    // Handles clicks on the main category tabs.
    const clickedCategoryBtn = event.target.closest('.category-tab'); // Finds the closest category button that was clicked.
    if (clickedCategoryBtn) { // Ensures a category button was indeed clicked.
        mainCategoriesContainer.querySelectorAll('.category-tab').forEach(tab => {
            tab.classList.remove('active'); // Removes 'active' class from all main category tabs.
        });
        clickedCategoryBtn.classList.add('active'); // Adds 'active' class to the clicked tab.

        currentCategory = clickedCategoryBtn.dataset.categoryId; // Updates the 'currentCategory' state.
        currentSubcategory = null; // Resets 'currentSubcategory' when the main category changes.
        menuSearchInput.value = ''; // Clears the search input.
        menuSearchTerm = ''; // Clears the search term state.

        console.log('Main Category Clicked:', currentCategory); // Debugging log.
        renderSubcategories(); // Re-renders subcategories based on the new main category.
        renderMenuItems(); // Re-renders menu items based on the new filters.
    }
}

async function handleSubcategoryClick(event) {
    // Handles clicks on the subcategory tabs.
    const clickedSubcategoryBtn = event.target.closest('.subcategory-tab'); // Finds the closest subcategory button that was clicked.
    if (clickedSubcategoryBtn) { // Ensures a subcategory button was indeed clicked.
        subCategoriesContainer.querySelectorAll('.subcategory-tab').forEach(tab => {
            tab.classList.remove('active'); // Removes 'active' class from all subcategory tabs.
        });
        clickedSubcategoryBtn.classList.add('active'); // Adds 'active' class to the clicked tab.

        // CHANGE: currentSubcategory now directly holds the subcatid from the button's dataset
        currentSubcategory = clickedSubcategoryBtn.dataset.subcategoryId; // Updates 'currentSubcategory' with the actual subcategory ID.
        menuSearchInput.value = ''; // Clears the search input.
        menuSearchTerm = ''; // Clears the search term state.

        console.log('Subcategory Clicked:', currentSubcategory); // Debugging log.
        renderMenuItems(); // Re-renders menu items based on the new subcategory filter.
    }
}

async function handleMenuItemClick(event) {
    // Handles clicks on individual menu item buttons to add them to the order.
    const clickedMenuItemBtn = event.target.closest('.menu-item-btn'); // Finds the clicked menu item button.
    if (clickedMenuItemBtn && currentOrder) { // Ensures a menu item button was clicked and an order is active.
        const menuid = clickedMenuItemBtn.dataset.menuid; // Gets the menu item ID from the button's data attribute.
        const menuItem = menuItems.find(item => item.menuid === menuid); // Finds the full menu item details from the 'menuItems' array.

        if (!menuItem) { // If the menu item somehow isn't found in the local data.
            alert('Menu item not found!'); // Alert the user.
            return; // Stop execution.
        }

        // --- DEBUGGING LOGS ---
        console.log('Adding/Updating Order Item:');
        console.log('  Menu Item ID:', menuid);
        console.log('  Menu Item Price (from menuItems):', menuItem.price);
        console.log('  Menu Item Category ID:', menuItem.categoryid);
        // --- END DEBUGGING LOGS ---

        const existingOrderItem = orderItems.find(item => item.menuid === menuid && item.orderid === currentOrder.orderid); // Checks if this item is already in the current order.

        let response;
        if (existingOrderItem) { // If the item already exists in the order.
            // Update quantity of existing item
            console.log('  Existing item found. Updating quantity to:', parseInt(existingOrderItem.quantity) + 1); // Debugging log.
            response = await putData('orderitems', { // Sends a PUT request to update the quantity of the existing order item.
                orderitemid: existingOrderItem.orderitemid,
                quantity: parseInt(existingOrderItem.quantity) + 1, // Increments quantity by 1.
                price: parseFloat(menuItem.price) // Ensures the price is current (in case it changed).
            });
        } else { // If the item is new to the order.
            // Add new item to order
            console.log('  No existing item. Adding new item with quantity 1.'); // Debugging log.
            response = await postData('orderitems', { // Sends a POST request to add a new order item.
                orderid: currentOrder.orderid,
                menuid: menuItem.menuid,
                category: menuItem.categoryid, // Passes the category ID.
                quantity: 1, // Sets initial quantity to 1.
                price: parseFloat(menuItem.price), // Passes the item's price.
                remarks: '', // Initializes remarks as empty.
                status: 'Pending', // Sets initial status as 'Pending'.
            });
        }

        if (response) { // If the API call was successful.
            await fetchOrderItems(currentOrder.orderid); // Re-fetches all order items to update the UI with the latest data from the database.
        }
    } else if (!currentOrder) { // If no current order is active.
        alert('Please wait while the order is being initialized or refresh the page.'); // Prompts the user.
    }
}

async function handleRemoveOrderItem(event) {
    // Handles clicks on the 'X' button to remove an item from the order.
    const removeBtn = event.target.closest('.remove-item-btn'); // Finds the clicked remove button.
    if (removeBtn && currentOrder) { // Ensures a remove button was clicked and an order is active.
        const orderItemIdToRemove = removeBtn.dataset.orderItemId; // Gets the order item ID from the button's data attribute.
        const response = await deleteData('orderitems', { orderitemid: orderItemIdToRemove }); // Sends a DELETE request to remove the item from the database.
        if (response) { // If the API call was successful.
            await fetchOrderItems(currentOrder.orderid); // Re-fetches all order items to update the UI.
        }
    }
}

async function handleItemNotesInput(event) {
    // Handles changes in the notes input field for an order item.
    const notesInput = event.target.closest('.item-notes-input'); // Finds the notes input field.
    if (notesInput && currentOrder) { // Ensures a notes input was interacted with and an order is active.
        const orderItemId = notesInput.dataset.orderItemId; // Gets the order item ID.
        const newNotes = notesInput.value; // Gets the new notes text.
        // Debounce this if typing rapidly, but for now, direct update
        console.log('Updating item notes for:', orderItemId, 'New notes:', newNotes); // Debugging log.
        const response = await putData('orderitems', { orderitemid: orderItemId, remarks: newNotes }); // Sends a PUT request to update the remarks in the database.
        if (response) { // If the API call was successful.
            // Update local state for immediate UI reflection without full re-fetch
            const updatedOrderItems = orderItems.map(item =>
                item.orderitemid === orderItemId ? { ...item, remarks: newNotes } : item
            ); // Updates the local 'orderItems' array to reflect the change immediately.
            orderItems = updatedOrderItems; // Assigns the updated array back.
            // No need to call renderOrderItems() as only the input value changed
        }
    }
}

function handleMenuSearchInput() {
    // Handles input changes in the menu search bar.
    menuSearchTerm = menuSearchInput.value; // Updates the 'menuSearchTerm' state.
    renderMenuItems(); // Re-renders menu items to apply the search filter.
}

function handleAmountTenderedChange() {
    // Handles changes in the "Amount Tendered" input field.
    console.log('Amount Tendered input value:', amountTenderedInput.value); // Debugging log.
    amountTendered = parseFloat(amountTenderedInput.value) || 0; // Parses the input value as a float, defaulting to 0 if invalid.
    console.log('Parsed Amount Tendered:', amountTendered); // Debugging log.
    calculateOrderTotals(); // Recalculates and updates order totals and change.
}

// --- Data Fetching and Initialization ---
// These functions are responsible for loading initial data and setting up the order.

async function fetchAllData() {
    // Fetches all necessary static data (categories, subcategories, menu items) from the backend.
    // Fetch categories
    const categories = await fetchData('categories'); // Calls API to get categories.
    if (categories) { // If successful.
        menuCategories = categories; // Stores categories.
        renderMainCategories(); // Renders main category tabs.
    } else {
        console.error("Failed to fetch categories."); // Logs error.
        mainCategoriesContainer.innerHTML = '<p class="loading-message">Failed to load categories.</p>'; // Displays error message.
    }

    // Fetch subcategories
    const subcategories = await fetchData('subcategories'); // Calls API to get subcategories.
    if (subcategories) { // If successful.
        menuSubcategories = subcategories; // Stores subcategories.
        renderSubcategories(); // Renders subcategory tabs.
    } else {
        console.error("Failed to fetch subcategories.");
        subCategoriesContainer.innerHTML = '<p class="loading-message">Failed to load subcategories.</p>';
    }

    // Fetch menu items
    const items = await fetchData('menuitems'); // Calls API to get menu items.
    if (items) { // If successful.
        menuItems = items; // Stores menu items.
        renderMenuItems(); // Renders menu item grid.
    } else {
        console.error("Failed to fetch menu items.");
        menuItemsDisplay.innerHTML = '<p class="loading-message">Failed to load menu items.</p>';
    }
}

async function initializeOrder() {
    // Initializes or loads the current customer order.
    let order = await fetchData('order', { customerid: 'Walk-in' }); // Tries to fetch an existing 'Pending' order for 'Walk-in' customer.

    if (!order) { // If no existing pending order is found.
        // If no pending order, create a new one
        const newOrderResponse = await postData('order', { customerid: 'Walk-in' }); // Sends a POST request to create a new order.
        if (newOrderResponse && newOrderResponse.orderid) { // If new order creation is successful.
            order = { // Creates a local order object with default values.
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
            alert('Failed to initialize new order. Please check server logs.'); // Alerts if new order creation failed.
            return; // Stops execution.
        }
    }
    currentOrder = order; // Sets the 'currentOrder' global variable.
    orderIdDisplay.textContent = currentOrder.orderid; // Displays the order ID on the UI.
    await fetchOrderItems(currentOrder.orderid); // Fetches and renders items belonging to this order.
}

async function fetchOrderItems(orderId) {
    // Fetches all order items for a given order ID.
    const items = await fetchData('orderitems', { orderid: orderId }); // Calls API to get order items for the specific order.
    if (items) { // If successful.
        orderItems = items; // Stores order items.
        renderOrderItems(); // Renders the order items list.
    } else {
        console.error("Failed to fetch order items.");
        orderItemsList.innerHTML = '<p class="no-items-message">Failed to load order items.</p>';
    }
}


// --- Initial Setup ---
// This block runs when the entire HTML document has been loaded and parsed.

document.addEventListener('DOMContentLoaded', async () => {
    // This is an event listener that waits for the DOM (Document Object Model) to be fully loaded.
    // The 'async' keyword means this function can use 'await'.

    updateDateTime(); // Calls the function to display the current date and time.
    setInterval(updateDateTime, 1000); // Sets up an interval to update the date and time every 1000 milliseconds (1 second).

    await fetchAllData(); // Calls the function to fetch all static menu data. 'await' ensures this completes before proceeding.
    await initializeOrder(); // Calls the function to initialize or load the current order. 'await' ensures this completes.

    // Add event listeners
    // These lines attach functions to specific events on HTML elements, making the UI interactive.
    mainCategoriesContainer.addEventListener('click', handleMainCategoryClick); // When a main category button is clicked, call 'handleMainCategoryClick'.
    subCategoriesContainer.addEventListener('click', handleSubcategoryClick); // When a subcategory button is clicked, call 'handleSubcategoryClick'.
    menuItemsDisplay.addEventListener('click', handleMenuItemClick); // When a menu item button is clicked, call 'handleMenuItemClick'.
    orderItemsList.addEventListener('click', handleRemoveOrderItem); // When a remove button inside the order list is clicked, call 'handleRemoveOrderItem'.
    orderItemsList.addEventListener('input', handleItemNotesInput); // When the notes input field changes, call 'handleItemNotesInput'.
    menuSearchInput.addEventListener('input', handleMenuSearchInput); // When text is typed into the search bar, call 'handleMenuSearchInput'.
    amountTenderedInput.addEventListener('input', handleAmountTenderedChange); // When the amount tendered input changes, call 'handleAmountTenderedChange'.
});
