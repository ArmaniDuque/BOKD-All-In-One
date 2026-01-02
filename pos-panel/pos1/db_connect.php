<?php
// db_connect.php

// Database configuration
define('DB_SERVER', 'localhost'); // Your database host (e.g., 'localhost' or an IP address)
define('DB_USERNAME', 'root'); // Your database username - IMPORTANT: Fill this in!
define('DB_PASSWORD', ''); // Your database password - IMPORTANT: Fill this in!
define('DB_NAME', 'allinonedb'); // Your database name

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    // In a production environment, you might log this error and show a generic message
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to UTF-8 for proper character handling
$conn->set_charset("utf8mb4");
?>