document.addEventListener('DOMContentLoaded', () => {
    const tabButtons = document.querySelectorAll('.tab-button');
    const menuContents = document.querySelectorAll('.menu-content');
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    const cartPanel = document.querySelector('.cart-panel');
    const toggleCartBtn = document.querySelector('.toggle-cart-btn');
    const closeCartBtn = document.querySelector('.close-cart-btn');
    const cartItemsList = document.getElementById('cart-items');
    const cartTotalSpan = document.getElementById('cart-total');
    const cartItemCountSpan = document.getElementById('cart-item-count');
    const checkoutBtn = document.getElementById('checkout-btn');

    let cart = []; // Array to store cart items

    // --- Tab Switching Logic (No changes needed here) ---
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            tabButtons.forEach(btn => btn.classList.remove('active'));
            menuContents.forEach(content => content.classList.remove('active'));

            button.classList.add('active');
            const category = button.dataset.category;
            const targetContent = document.getElementById(category);
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });

    // --- Cart Functionality ---

    // Function to update the cart display
    function updateCartDisplay() {
        cartItemsList.innerHTML = ''; // Clear current cart display
        let total = 0;
        let itemCount = 0;

        cart.forEach(item => {
            const listItem = document.createElement('li');
            listItem.dataset.id = item.id; // Set data-id on the li for easy lookup

            // HTML for each cart item, including quantity controls and remarks section
            listItem.innerHTML = `
                <div class="cart-item-main-row">
                    <span class="cart-item-info">
                        <span class="cart-item-name">${item.name}</span>
                        <div class="cart-item-quantity-controls">
                            <button class="quantity-btn decrease-quantity-btn" data-id="${item.id}">-</button>
                            <span class="cart-item-quantity-display">${item.quantity}</span>
                            <button class="quantity-btn increase-quantity-btn" data-id="${item.id}">+</button>
                        </div>
                    </span>
                    <span class="cart-item-price">Php ${(item.price * item.quantity).toFixed(2)}</span>
                    <button class="remove-item-btn" data-id="${item.id}">&times;</button>
                </div>
                <div class="cart-item-remarks-wrapper">
                    <p class="cart-item-remarks-display ${item.remarks ? '' : 'hidden'}">${item.remarks ? item.remarks : ''}</p>
                    <textarea class="cart-item-remarks-input hidden" data-id="${item.id}" placeholder="Add notes for this item...">${item.remarks}</textarea>
                    <button class="add-edit-note-btn" data-id="${item.id}">${item.remarks ? 'Edit Note' : 'Add Note'}</button>
                </div>
            `;
            cartItemsList.appendChild(listItem);
            total += item.price * item.quantity;
            itemCount += item.quantity;
        });

        cartTotalSpan.textContent = `Php ${total.toFixed(2)}`;
        cartItemCountSpan.textContent = itemCount;

        // Add event listeners to dynamically created buttons and textareas
        document.querySelectorAll('.remove-item-btn').forEach(button => {
            button.addEventListener('click', removeItemFromCart);
        });

        document.querySelectorAll('.add-edit-note-btn').forEach(button => {
            button.addEventListener('click', toggleRemarksInput);
        });

        document.querySelectorAll('.cart-item-remarks-input').forEach(textarea => {
            textarea.addEventListener('blur', saveRemarks); // Save when textarea loses focus
            textarea.addEventListener('keypress', (event) => {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent new line on Enter
                    saveRemarks(event);
                    textarea.blur(); // Remove focus after saving
                }
            });
        });

        // NEW: Add event listeners for quantity buttons
        document.querySelectorAll('.increase-quantity-btn').forEach(button => {
            button.addEventListener('click', increaseQuantity);
        });
        document.querySelectorAll('.decrease-quantity-btn').forEach(button => {
            button.addEventListener('click', decreaseQuantity);
        });
    }

    // Function to add an item to the cart (no changes needed)
    addToCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const listItem = event.target.closest('li');
            const id = listItem.dataset.id;
            const name = listItem.dataset.name;
            const price = parseFloat(listItem.dataset.price);

            const existingItem = cart.find(item => item.id === id);

            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ id, name, price, quantity: 1, remarks: '' });
            }

            updateCartDisplay();
            if (!cartPanel.classList.contains('active')) {
                cartPanel.classList.add('active');
                toggleCartBtn.classList.add('hide');
            }
        });
    });

    // Function to remove an item from the cart (no changes needed)
    function removeItemFromCart(event) {
        const idToRemove = event.target.dataset.id;
        const itemIndex = cart.findIndex(item => item.id === idToRemove);

        if (itemIndex > -1) {
            // This function is typically called by the 'x' button to remove the entire item,
            // or when decreaseQuantity leads to 0.
            cart.splice(itemIndex, 1);
        }
        updateCartDisplay();
        if (cart.length === 0 && cartPanel.classList.contains('active')) {
            cartPanel.classList.remove('active');
            toggleCartBtn.classList.remove('hide');
        }
    }

    // NEW: Function to increase item quantity
    function increaseQuantity(event) {
        const itemId = event.target.dataset.id;
        const itemInCart = cart.find(item => item.id === itemId);

        if (itemInCart) {
            itemInCart.quantity++;
            updateCartDisplay();
        }
    }

    // NEW: Function to decrease item quantity
    function decreaseQuantity(event) {
        const itemId = event.target.dataset.id;
        const itemInCart = cart.find(item => item.id === itemId);

        if (itemInCart) {
            if (itemInCart.quantity > 1) {
                itemInCart.quantity--;
            } else {
                // If quantity becomes 0, remove the item entirely
                removeItemFromCart({ target: { dataset: { id: itemId } } }); // Simulate event for removeItemFromCart
                return; // Exit to avoid double updateDisplay call
            }
            updateCartDisplay();
        }
    }

    // --- Remarks Specific Functions (No changes needed here) ---
    function toggleRemarksInput(event) {
        const itemId = event.target.dataset.id;
        const listItem = event.target.closest('li');
        const remarksDisplay = listItem.querySelector('.cart-item-remarks-display');
        const remarksInput = listItem.querySelector('.cart-item-remarks-input');
        const addEditBtn = listItem.querySelector('.add-edit-note-btn');

        if (remarksInput.classList.contains('hidden')) {
            remarksDisplay.classList.add('hidden');
            remarksInput.classList.remove('hidden');
            remarksInput.focus();
            addEditBtn.textContent = 'Save Note';
            addEditBtn.style.backgroundColor = '#28a745';
        } else {
            saveRemarks({ target: remarksInput });
            remarksInput.classList.add('hidden');
            remarksDisplay.classList.remove('hidden');
            addEditBtn.textContent = remarksInput.value ? 'Edit Note' : 'Add Note';
            addEditBtn.style.backgroundColor = '#6c757d';
        }
    }

    function saveRemarks(event) {
        const itemId = event.target.dataset.id;
        const remarksText = event.target.value.trim();
        const itemInCart = cart.find(item => item.id === itemId);

        if (itemInCart) {
            itemInCart.remarks = remarksText;
        }

        const listItem = event.target.closest('li');
        const remarksDisplay = listItem.querySelector('.cart-item-remarks-display');
        remarksDisplay.textContent = remarksText;
        if (remarksText) {
            remarksDisplay.classList.remove('hidden');
        } else {
            remarksDisplay.classList.add('hidden');
        }

        if (event.type === 'blur' || event.key === 'Enter') {
            const remarksInput = event.target;
            const addEditBtn = listItem.querySelector('.add-edit-note-btn');
            remarksInput.classList.add('hidden');
            remarksDisplay.classList.remove('hidden');
            addEditBtn.textContent = remarksInput.value ? 'Edit Note' : 'Add Note';
            addEditBtn.style.backgroundColor = '#6c757d';
        }
    }


    // --- Cart Panel Visibility Toggles (No changes needed) ---
    toggleCartBtn.addEventListener('click', () => {
        cartPanel.classList.add('active');
        toggleCartBtn.classList.add('hide');
    });

    closeCartBtn.addEventListener('click', () => {
        cartPanel.classList.remove('active');
        toggleCartBtn.classList.remove('hide');
    });

    // --- Checkout Button (Example) ---
    checkoutBtn.addEventListener('click', () => {
        if (cart.length > 0) {
            const orderDetails = cart.map(item => ({
                id: item.id,
                name: item.name,
                quantity: item.quantity,
                price: item.price,
                remarks: item.remarks
            }));
            console.log("Order Details:", orderDetails);
            alert(`Proceeding to checkout with ${cartItemCountSpan.textContent} items for a total of ${cartTotalSpan.textContent}.\nCheck console for order details including remarks.`);

            cart = []; // Clear cart
            updateCartDisplay();
            cartPanel.classList.remove('active');
            toggleCartBtn.classList.remove('hide');
        } else {
            alert("Your cart is empty! Please add some items first.");
        }
    });

    // Initial cart display update
    updateCartDisplay();
});