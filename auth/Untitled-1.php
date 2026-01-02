<?php
// --- Database Configuration ---
define('DB_HOST', 'localhost'); // Your database host
define('DB_USER', 'root'); // Your database username
define('DB_PASS', ''); // Your database password
define('DB_NAME', 'allinonedb'); // The database name you created

// --- Establish Database Connection ---
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Database connection failed: " . $mysqli->connect_error);
}

// --- Get IP List from Database ---
$ipsToPing = [];
$result = $mysqli->query("SELECT id, name, ip_address FROM ips_to_ping ORDER BY name ASC");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ipsToPing[] = $row;
    }
    $result->free(); // Free result set
} else {
    // No IPs found in database
    $errorMessage = "No IP addresses found in the database. Please populate the `ips_to_ping` table.";
}

// Prepare statement for updating status (using prepared statements for security)
$stmt = $mysqli->prepare("UPDATE ips_to_ping SET last_checked_status = ?, last_checked_time = NOW() WHERE id = ?");
if (!$stmt) {
    die("Failed to prepare update statement: " . $mysqli->error);
}

// Determine OS for ping command
$os = strtolower(php_uname('s'));

// --- HTML and Display ---
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network Connectivity Checker (PHP & DB)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0056b3;
        }

        .info {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #e2e2e2;
        }

        .status-reachable {
            background-color: #d4edda;
            color: #155724;
        }

        /* Light green */
        .status-unreachable {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Light red */
        .status-unknown {
            background-color: #fff3cd;
            color: #856404;
        }

        /* Light yellow */
        .refresh-button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        .refresh-button:hover {
            background-color: #0056b3;
        }

        .warning {
            background-color: #ffc107;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-weight: bold;
            color: #333;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Network Connectivity Status</h1>
        <div class="warning">
            <strong>Important:</strong> This report shows network connectivity from the **web server** where this PHP
            script is hosted, not from your local computer/browser.
        </div>
        <?php if (isset($errorMessage)): ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php else: ?>
            <p class="info">Last checked: <?php echo date("Y-m-d H:i:s"); ?></p>
            <button class="refresh-button" onclick="location.reload()">Refresh Check</button>

            <table>
                <thead>
                    <tr>
                        <th>Location Name</th>
                        <th>IP Address</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ipsToPing as $location) {
                        $id = $location['id'];
                        $name = htmlspecialchars($location['name']);
                        $ip = htmlspecialchars($location['ip_address']);
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

                        // Execute ping command
                        $output = [];
                        $return_var = 0;
                        exec($command, $output, $return_var);

                        // Analyze ping result
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
                            // Show raw output for debug if there's an unexpected error
                            $details = "Error: " . htmlspecialchars(implode("\n", $output));
                        }

                        // --- Update status in database ---
                        // Bind parameters: 'si' for string, integer
                        // s = string (for statusText)
                        // i = integer (for id)
                        $stmt->bind_param('si', $statusText, $id);
                        if (!$stmt->execute()) {
                            error_log("Failed to update status for ID $id: " . $stmt->error);
                            // Optionally, update $details to indicate DB update failure
                        }

                        echo "<tr>";
                        echo "<td>$name</td>";
                        echo "<td>$ip</td>";
                        echo "<td class='$statusClass'>$statusText</td>";
                        echo "<td>$details</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>
<?php
// Close the prepared statement and database connection
if (isset($stmt) && $stmt) {
    $stmt->close();
}
if (isset($mysqli) && $mysqli) {
    $mysqli->close();
}
?>