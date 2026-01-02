<?php
// Set headers for CORS (Cross-Origin Resource Sharing)
// This is crucial if your HTML file is served from a different domain/port than this PHP script.
header("Access-Control-Allow-Origin: *"); // IMPORTANT: Be specific in production, e.g., 'http://your-frontend-domain.com'
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET"); // Allow only GET requests for fetching data
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// --- Database Configuration ---
$host = 'localhost'; // Your database host (e.g., 'localhost', '127.0.0.1')
$db = 'allinonedb'; // Your database name
$user = 'root';      // Your database username
$pass = '';          // Your database password (LEAVE EMPTY IF NO PASSWORD, OR PROVIDE IT)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch results as associative arrays
    PDO::ATTR_EMULATE_PREPARES => false,                  // Disable emulation for better security and performance
];

$pdo = null; // Initialize PDO connection variable
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Log the error for debugging purposes (e.g., to a file)
    error_log("Database connection error: " . $e->getMessage());
    // Send a generic error response to the client
    http_response_code(500); // Internal Server Error
    echo json_encode(["error" => "Database connection failed. Please try again later."]);
    exit(); // Stop script execution
}

// --- API Endpoint Logic ---
$action = $_GET['action'] ?? ''; // Get the 'action' parameter from the URL (e.g., api.php?action=getMenu)

$response = [];

try {
    switch ($action) {
        case 'getMenu':
            // Select all necessary fields from posmenu
            // Using `menuid` as `id` for consistency with frontend expectations
            $stmt = $pdo->query("SELECT `menuid`, `name`, `description`, `price`, `price1`, `categoryid`, `status`, `subcategoryid` FROM `posmenu` WHERE `status` = 1"); // Assuming status = 1 means 'available'
            $menuItems = $stmt->fetchAll();
            $response['menuItems'] = $menuItems;
            break;

        case 'getCategories':
            // Select all necessary fields from poscategory
            $stmt = $pdo->query("SELECT `id`, `category`, `sequence`, `icon`, `color`, `others` FROM `poscategory` ");
            $categories = $stmt->fetchAll();
            $response['categories'] = $categories;
            break;

        case 'getSubcategories':
            // Select all necessary fields from possubcategory
            // Using `subcatid` as `id` and `subcategory` as `name` for consistency
            $stmt = $pdo->query("SELECT `subcatid`, `subcategory`, `sequence`, `categoryid`, `icon`, `created_at` FROM `possubcategory` ");
            $subcategories = $stmt->fetchAll();
            $response['subcategories'] = $subcategories;
            break;

        default:
            http_response_code(400); // Bad Request
            $response = ["error" => "Invalid API action specified."];
            break;
    }
} catch (\PDOException $e) {
    // Log the specific query error
    error_log("Database query error for action '$action': " . $e->getMessage());
    // Send a generic error response to the client
    http_response_code(500);
    $response = ["error" => "An error occurred while fetching data from the database."];
}

// Send the JSON response back to the client
echo json_encode($response);

// Close the database connection (optional, PHP usually handles this at script end)
$pdo = null;
?>