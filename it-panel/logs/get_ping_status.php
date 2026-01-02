<?php
header('Content-Type: application/json'); // Tell the browser to expect JSON

// --- Database Configuration ---
// IMPORTANT: Make sure these match the credentials in your index.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'allinonedb');

// --- Establish Database Connection ---
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $mysqli->connect_error]);
    exit();
}

// --- Get IP List from Database ---
$ipsToPing = [];
$result = $mysqli->query("SELECT wifiid, wifiname, wifiip FROM itinternetwif ORDER BY wifiname ASC");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ipsToPing[] = $row;
    }
    $result->free();
} else {
    echo json_encode(['status' => 'error', 'message' => 'No IP addresses found in the database. Please populate the `itinternetwif` table.']);
    $mysqli->close();
    exit();
}

// Prepare statement for updating status (using prepared statements for security)
$stmt = $mysqli->prepare("UPDATE itinternetwif SET chkstatus = ?, chktime = NOW() WHERE wifiid = ?");
if (!$stmt) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to prepare update statement: ' . $mysqli->error]);
    $mysqli->close();
    exit();
}

// Determine OS for ping command
$os = strtolower(php_uname('s'));

$pingResults = [];

foreach ($ipsToPing as $location) {
    $id = $location['wifiid'];
    $name = $location['wifiname'];
    $ip = $location['wifiip'];

    $statusClass = 'status-unknown';
    $statusText = 'N/A';
    $details = 'Could not execute ping command.';

    // Construct ping command based on OS
    if (strpos($os, 'win') !== false) {
        // Windows: -n 1 sends 1 packet, -w 1000 sets 1000ms timeout per packet
        $command = "ping -n 1 -w 1000 " . escapeshellarg($ip);
    } else {
        // Linux/Unix: -c 1 sends 1 packet, -W 1 sets 1 second timeout
        $command = "ping -c 1 -W 1 " . escapeshellarg($ip);
    }

    $output = [];
    $return_var = 0;
    exec($command, $output, $return_var);

    if ($return_var === 0) {
        $statusClass = 'status-reachable';
        $statusText = 'REACHABLE';
        $details = 'Responded successfully.';
    } else if (strpos(implode("\n", $output), 'Request timed out') !== false || strpos(implode("\n", $output), 'Destination host unreachable') !== false || strpos(implode("\n", $output), '100% packet loss') !== false) {
        $statusClass = 'status-unreachable';
        $statusText = 'UNREACHABLE';
        $details = 'Request timed out or host unreachable.';
    } else {
        $statusClass = 'status-unreachable';
        $statusText = 'ERROR / UNREACHABLE';
        $details = "Error: " . implode("\n", $output); // Raw output for debug
    }

    // --- Update status in database ---
    $stmt->bind_param('si', $statusText, $id);
    if (!$stmt->execute()) {
        error_log("Failed to update status for ID $id: " . $stmt->error);
    }

    $pingResults[] = [
        'id' => $id,
        'name' => $name,
        'ip_address' => $ip,
        'statusClass' => $statusClass,
        'statusText' => $statusText,
        'details' => $details
    ];
}

// Close the prepared statement and database connection
$stmt->close();
$mysqli->close();

echo json_encode(['status' => 'success', 'results' => $pingResults]);
?>