// Firebase Imports
import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
import { getAuth, signInAnonymously, signInWithCustomToken, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
import { getFirestore, collection, onSnapshot, doc, updateDoc, query, orderBy } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";

document.addEventListener('DOMContentLoaded', async () => {
    const ordersListDiv = document.getElementById('orders-list');

    // --- Firebase Initialization ---
    const appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';
    const firebaseConfig = JSON.parse(typeof __firebase_config !== 'undefined' ? __firebase_config : '{}');

    let app;
    let db;
    let auth;
    let userId; // Will store the current user's ID (for Firestore rules)

    try {
        app = initializeApp(firebaseConfig);
        db = getFirestore(app);
        auth = getAuth(app);

        // Sign in anonymously or with custom token
        // For a kitchen display, anonymous sign-in is simple, but a real app
        // might require specific kitchen staff authentication.
        if (typeof __initial_auth_token !== 'undefined') {
            await signInWithCustomToken(auth, __initial_auth_token);
        } else {
            await signInAnonymously(auth);
        }

        onAuthStateChanged(auth, (user) => {
            if (user) {
                userId = user.uid;
                console.log("Kitchen Firebase initialized. User ID:", userId);
                // Start listening for orders ONLY after auth is ready
                listenForOrders();
            } else {
                console.log("No user signed in for kitchen display.");
                ordersListDiv.innerHTML = '<p class="loading-message">Please ensure you are authenticated to view orders.</p>';
            }
        });

    } catch (error) {
        console.error("Error initializing Firebase for kitchen:", error);
        ordersListDiv.innerHTML = '<p class="loading-message">Failed to load orders. Please check console for errors.</p>';
    }
    // --- End Firebase Initialization ---

    // Function to format timestamp
    function formatTimestamp(timestamp) {
        if (!timestamp) return 'N/A';
        const date = timestamp.toDate ? timestamp.toDate() : new Date(timestamp); // Handle Firebase Timestamp object or raw date
        return date.toLocaleString(); // e.g., "7/9/2025, 1:20:00 PM"
    }

    // Function to render a single order card
    function renderOrderCard(order) {
        const orderCard = document.createElement('div');
        orderCard.classList.add('order-card');
        orderCard.dataset.id = order.id; // Store Firestore document ID

        let itemsHtml = order.items.map(item => `
            <li class="order-item">
                <div class="item-main-details">
                    <span class="item-name-qty">${item.name} <span>x${item.quantity}</span></span>
                    <span class="item-price">$${(item.price * item.quantity).toFixed(2)}</span>
                </div>
                ${item.remarks ? `<p class="item-remarks">Note: ${item.remarks}</p>` : ''}
            </li>
        `).join('');

        orderCard.innerHTML = `
            <div class="order-header">
                <span class="order-id">Order ID: ${order.id.substring(0, 8)}...</span>
                <span class="order-timestamp">${formatTimestamp(order.timestamp)}</span>
            </div>
            <ul class="order-items-list">
                ${itemsHtml}
            </ul>
            <div class="order-total">Total: $${order.total.toFixed(2)}</div>
            <div class="order-status status-${order.status}">${order.status}</div>
            <div class="order-actions">
                <button class="status-btn" data-id="${order.id}" data-status="Accepted">Accept Order</button>
                <button class="status-btn" data-id="${order.id}" data-status="Preparing">Preparing Order</button>
                <button class="status-btn" data-id="${order.id}" data-status="Served">Serving Order</button>
            </div>
        `;

        // Highlight current status button and disable it
        const currentStatusBtn = orderCard.querySelector(`.status-btn[data-status="${order.status}"]`);
        if (currentStatusBtn) {
            currentStatusBtn.classList.add('current-status');
            currentStatusBtn.disabled = true;
        }

        // Add event listeners for status buttons
        orderCard.querySelectorAll('.status-btn').forEach(button => {
            button.addEventListener('click', updateOrderStatus);
        });

        return orderCard;
    }

    // Function to update order status in Firestore
    async function updateOrderStatus(event) {
        const orderId = event.target.dataset.id;
        const newStatus = event.target.dataset.status;

        if (!db) {
            console.error("Firestore DB not initialized.");
            alert("Database not ready. Cannot update status.");
            return;
        }

        try {
            const orderRef = doc(db, `artifacts/${appId}/public/data/orders`, orderId);
            await updateDoc(orderRef, {
                status: newStatus
            });
            console.log(`Order ${orderId} status updated to ${newStatus}`);
            // UI will automatically update via onSnapshot listener
        } catch (error) {
            console.error("Error updating order status:", error);
            alert("Failed to update order status.");
        }
    }

    // Function to listen for real-time order updates
    function listenForOrders() {
        // Query to get all orders, ordered by timestamp (newest first)
        // Note: orderBy requires an index in Firestore if not on a single field.
        // For simplicity, we're not using orderBy here to avoid index creation issues.
        // If you need sorting, you'd add: query(collection(db, ...), orderBy('timestamp', 'desc'))
        const ordersCollectionRef = collection(db, `artifacts/${appId}/public/data/orders`);
        const q = query(ordersCollectionRef); // No orderBy for simplicity

        onSnapshot(q, (snapshot) => {
            ordersListDiv.innerHTML = ''; // Clear existing orders
            if (snapshot.empty) {
                ordersListDiv.innerHTML = '<p class="loading-message">No new orders at the moment.</p>';
                return;
            }

            // Sort orders by timestamp client-side (newest first)
            const orders = [];
            snapshot.forEach(doc => {
                orders.push({ id: doc.id, ...doc.data() });
            });
            orders.sort((a, b) => (b.timestamp?.toDate() || 0) - (a.timestamp?.toDate() || 0));


            orders.forEach(order => {
                const orderCard = renderOrderCard(order);
                ordersListDiv.appendChild(orderCard);
            });
        }, (error) => {
            console.error("Error listening to orders:", error);
            ordersListDiv.innerHTML = '<p class="loading-message">Error loading orders. Please refresh.</p>';
        });
    }

    // Initial message before orders load
    ordersListDiv.innerHTML = '<p class="loading-message">Waiting for Firebase authentication...</p>';
});