<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Management</title>
    <link rel="stylesheet" href="menu_management_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="menu-management-container">
        <header class="dashboard-header">
            <h1>Menu Management</h1>
            <div class="header-actions">
                <div class="search-box">
                    <input type="text" placeholder="Search Menu Items..." class="search-input">
                    <i class="fas fa-search search-icon"></i>
                </div>
                <div class="export-buttons">
                    <button class="export-btn">
                        <i class="fas fa-download"></i> Export <i class="fas fa-caret-down"></i>
                        <div class="dropdown-content">
                            <a href="#">CSV</a>
                            <a href="#">Excel</a>
                            <a href="#">PDF</a>
                        </div>
                    </button>
                    <button class="print-btn"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </header>

        <div class="content-area">
            <aside class="menu-form-panel">
                <h2>Add/Edit Menu Item</h2>
                <form id="menuItemForm">
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="FOOD">FOOD</option>
                            <option value="BEVERAGES">BEVERAGES</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subCategory">Sub Category:</label>
                        <select id="subCategory" name="subCategory">
                            <option value="">Select Sub Category</option>
                            <option value="APERITIF">APÉRITIF</option>
                            <option value="WHISKEY">WHISKEY</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="menuName">Menu Name:</label>
                        <input type="text" id="menuName" name="menuName" placeholder="e.g., Johnnie Walker Red Label"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="3"
                            placeholder="Brief description of the item..."></textarea>
                    </div>

                    <div class="form-group price-group">
                        <div class="price-input">
                            <label for="price">Standard Price:</label>
                            <input type="number" id="price" name="price" step="0.01" min="0" placeholder="e.g., 250.00"
                                required>
                        </div>
                        <div class="price-input">
                            <label for="price1">Wholesale Price (Optional):</label>
                            <input type="number" id="price1" name="price1" step="0.01" min="0"
                                placeholder="e.g., 210.00">
                        </div>
                    </div>

                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="isAvailable" name="isAvailable" checked>
                        <label for="isAvailable">Available</label>
                    </div>

                    <button type="submit" class="save-btn"><i class="fas fa-save"></i> Save Menu Item</button>
                    <div id="form-feedback" class="feedback-message"></div>
                </form>
            </aside>

            <main class="menu-list-panel">
                <h2>List of Menu Items</h2>
                <div class="table-responsive">
                    <table class="menu-table">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Menu Name <i class="fas fa-sort sort-icon"></i></th>
                                <th>Category <i class="fas fa-sort sort-icon"></i></th>
                                <th>Sub Category <i class="fas fa-sort sort-icon"></i></th>
                                <th>Standard Price <i class="fas fa-sort sort-icon"></i></th>
                                <th>Wholesale Price <i class="fas fa-sort sort-icon"></i></th>
                                <th>Status <i class="fas fa-sort sort-icon"></i></th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-item-id="1">
                                <td class="actions">
                                    <button class="action-icon edit-btn" title="Edit"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="action-icon delete-btn" title="Delete"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                                <td>Kahlua</td>
                                <td>BEVERAGES</td>
                                <td>APÉRITIF</td>
                                <td class="text-right">250.00</td>
                                <td class="text-right">4.50</td>
                                <td class="status-available">Available</td>
                                <td></td>
                            </tr>
                            <tr data-item-id="2">
                                <td class="actions">
                                    <button class="action-icon edit-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-icon delete-btn"><i class="fas fa-trash-alt"></i></button>
                                </td>
                                <td>Campari Bitter</td>
                                <td>BEVERAGES</td>
                                <td>APÉRITIF</td>
                                <td class="text-right">210.00</td>
                                <td class="text-right">4.20</td>
                                <td class="status-available">Available</td>
                                <td></td>
                            </tr>
                            <tr data-item-id="3">
                                <td class="actions">
                                    <button class="action-icon edit-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-icon delete-btn"><i class="fas fa-trash-alt"></i></button>
                                </td>
                                <td>Johnnie Walker Red Label</td>
                                <td>BEVERAGES</td>
                                <td>WHISKEY</td>
                                <td class="text-right">320.00</td>
                                <td class="text-right">7.80</td>
                                <td class="status-available">Available</td>
                                <td></td>
                            </tr>
                            <tr data-item-id="4">
                                <td class="actions">
                                    <button class="action-icon edit-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-icon delete-btn"><i class="fas fa-trash-alt"></i></button>
                                </td>
                                <td>Jim Beam</td>
                                <td>BEVERAGES</td>
                                <td>WHISKEY</td>
                                <td class="text-right">220.00</td>
                                <td class="text-right">4.50</td>
                                <td class="status-not-available">Not Available</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-controls">
                    <span>Showing 1 to 10 of 228 entries</span>
                    <div class="pagination-buttons">
                        <button class="page-btn disabled">Previous</button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <button class="page-btn">...</button>
                        <button class="page-btn">16</button>
                        <button class="page-btn">Next</button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
    // Basic client-side JavaScript for demonstration (not full functionality)
    document.addEventListener('DOMContentLoaded', function() {
        // Simulate form submission
        const menuItemForm = document.getElementById('menuItemForm');
        const formFeedback = document.getElementById('form-feedback');

        menuItemForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent actual form submission

            // In a real application, you'd send this data to your server
            const formData = new FormData(menuItemForm);
            const data = Object.fromEntries(formData.entries());
            console.log('Form Submitted Data:', data);

            formFeedback.textContent = 'Menu item saved successfully!';
            formFeedback.style.color = '#28a745'; // Green for success
            menuItemForm.reset(); // Clear form after submission

            setTimeout(() => {
                formFeedback.textContent = ''; // Clear message after a few seconds
            }, 3000);
        });

        // Example of dynamic subcategory loading (simplified)
        const categorySelect = document.getElementById('category');
        const subCategorySelect = document.getElementById('subCategory');
        const subCategories = {
            'FOOD': ['Appetizers', 'Main Course', 'Desserts'],
            'BEVERAGES': ['APÉRITIF', 'WHISKEY', 'Soft Drinks', 'Coffee'],
            '': ['Select Sub Category'] // Default for no category selected
        };

        categorySelect.addEventListener('change', function() {
            const selectedCategory = this.value;
            const options = subCategories[selectedCategory] || subCategories[''];

            subCategorySelect.innerHTML = ''; // Clear current options
            options.forEach(sub => {
                const option = document.createElement('option');
                option.value = sub;
                option.textContent = sub;
                subCategorySelect.appendChild(option);
            });
        });

        // Handle table action buttons (for demonstration)
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.closest('tr').dataset.itemId;
                alert('Edit item ID: ' + itemId);
                // In a real app, populate the form with item data for editing
            });
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.closest('tr').dataset.itemId;
                if (confirm('Are you sure you want to delete item ID: ' + itemId + '?')) {
                    alert('Deleting item ID: ' + itemId);
                    // In a real app, send delete request to server and remove row from DOM
                    this.closest('tr').remove();
                }
            });
        });
    });
    </script>
</body>

</html>