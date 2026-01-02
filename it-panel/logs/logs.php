<?php
require "../header.php";
?>
<style>
    /* Your existing CSS */
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
        margin-bottom: 15px;
        /* Added margin for button */
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

    /* Added for real-time loading text */
    .error-message {
        color: red;
        font-weight: bold;
        margin-bottom: 15px;
    }
</style>
<?php require "../sidebar.php"; ?>

<?php
// --- Database Configuration (for index.php to fetch initial IPs) ---
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'allinonedb');

// --- Establish Database Connection ---
$mysqli_initial = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($mysqli_initial->connect_error) {
    die("Database connection failed: " . $mysqli_initial->connect_error);
}

// --- Get IP List from Database for initial table rendering ---
$initialPingData = [];
$result_initial = $mysqli_initial->query("SELECT wifiid, wifiname, wifiip, chkstatus, chktime FROM itinternetwif ORDER BY wifiname ASC");

if ($result_initial && $result_initial->num_rows > 0) {
    while ($row = $result_initial->fetch_assoc()) {
        $initialPingData[] = $row;
    }
    $result_initial->free();
} else {
    $errorMessage = "No IP addresses found in the database. Please populate the `itinternetwif` table.";
}
$mysqli_initial->close(); // Close connection after fetching initial data
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Logs</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header pt-3">
                    <h1 class="h5 mb-3"><b>Network Logs</b> </h1>
                    <?php if (isset($errorMessage)): ?>
                        <p class="error-message"><?php echo $errorMessage; ?></p>
                    <?php else: ?>
                        <p class="info">Last full check: <span
                                id="last-checked-time"><?php echo date("Y-m-d H:i:s"); ?></span></p>
                        <button class="refresh-button" onclick="fetchPingStatus(true)">Force Refresh Now</button>
                    <?php endif; ?>
                </div>

                <div class="card-body table-responsive p-0">
                    <table>
                        <thead>
                            <tr>
                                <th>Location Name</th>
                                <th>IP Address</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody id="ping-results-body">
                            <?php if (isset($errorMessage)): ?>
                                <tr>
                                    <td colspan="4" class="status-unreachable"><?php echo $errorMessage; ?></td>
                                </tr>
                            <?php elseif (empty($initialPingData)): ?>
                                <tr>
                                    <td colspan="4" class="status-unknown">No IP addresses found in the database. Please
                                        populate the `itinternetwif` table.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($initialPingData as $row): ?>
                                    <tr id="row-<?php echo $row['wifiid']; ?>">
                                        <td><?php echo htmlspecialchars($row['wifiname']); ?></td>
                                        <td><?php echo htmlspecialchars($row['wifiip']); ?></td>
                                        <td class="<?php
                                        $status_class = 'status-unknown';
                                        if ($row['chkstatus'] == 'REACHABLE')
                                            $status_class = 'status-reachable';
                                        else if ($row['chkstatus'] == 'UNREACHABLE' || $row['chkstatus'] == 'ERROR / UNREACHABLE')
                                            $status_class = 'status-unreachable';
                                        echo $status_class;
                                        ?>">
                                            <?php echo htmlspecialchars($row['chkstatus'] ?: 'Loading...'); ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($row['chktime'] ?: ''); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require "../../footer1.php"; ?>

<script>
    const pingResultsBody = document.getElementById('ping-results-body');
    const lastCheckedTimeSpan = document.getElementById('last-checked-time');
    const refreshInterval = 7000; // Refresh every 7 seconds (7000 milliseconds). Adjust as needed.

    async function fetchPingStatus(forceRefresh = false) {
        // Update the "Last full check" time immediately
        lastCheckedTimeSpan.textContent = new Date().toLocaleString();

        // Optionally show "Loading..." if force refresh or initial load
        if (forceRefresh || !pingResultsBody.dataset.initialLoadDone) {
            const rows = pingResultsBody.querySelectorAll('tr');
            rows.forEach(row => {
                // Assuming ID is like row-XYZ
                if (row.id && row.id.startsWith('row-')) {
                    const statusCell = row.querySelector('td:nth-child(3)'); // Third column for status
                    const detailsCell = row.querySelector('td:nth-child(4)'); // Fourth column for details
                    if (statusCell) {
                        statusCell.className = 'status-unknown';
                        statusCell.textContent = 'Checking...';
                    }
                    if (detailsCell) {
                        detailsCell.textContent = ''; // Clear old details temporarily
                    }
                }
            });
            pingResultsBody.dataset.initialLoadDone = 'true'; // Mark as loaded
        }

        try {
            const response = await fetch('get_ping_status.php'); // Path to your backend script
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();

            if (data.status === 'success') {
                data.results.forEach(item => {
                    const row = document.getElementById(`row-${item.id}`);
                    if (row) {
                        const statusCell = row.querySelector('td:nth-child(3)'); // Third column for status
                        const detailsCell = row.querySelector('td:nth-child(4)'); // Fourth column for details

                        if (statusCell) {
                            statusCell.className = item.statusClass;
                            statusCell.textContent = item.statusText;
                        }
                        if (detailsCell) {
                            detailsCell.textContent = item.details;
                        }
                    }
                });
            } else {
                console.error('Error fetching ping status:', data.message);
                // Display a general error or specific error from data.message
                if (pingResultsBody.innerHTML.includes('row-')) { // If table was initially populated
                    // Find an existing row to show error, or create a new one
                    const firstRow = pingResultsBody.querySelector('tr');
                    if (firstRow) {
                        firstRow.innerHTML = `<td colspan="4" class="status-unreachable">Error: ${data.message}</td>`;
                    } else {
                        pingResultsBody.innerHTML =
                            `<tr><td colspan="4" class="status-unreachable">Error: ${data.message}</td></tr>`;
                    }
                } else { // If table was initially empty or had an error message
                    pingResultsBody.innerHTML =
                        `<tr><td colspan="4" class="status-unreachable">Error: ${data.message}</td></tr>`;
                }
            }
        } catch (error) {
            console.error('Failed to fetch ping status:', error);
            pingResultsBody.innerHTML =
                `<tr><td colspan="4" class="status-unreachable">Network error or server unreachable. Check console for details.</td></tr>`;
        }
    }

    // Initial fetch when the page loads, if there are IPs to check
    document.addEventListener('DOMContentLoaded', () => {
        // Check if the table body is not showing an error message (i.e., it has initial rows)
        if (!pingResultsBody.querySelector('.status-unreachable') && !pingResultsBody.querySelector(
            '.status-unknown[colspan="4"]')) {
            fetchPingStatus(); // Perform initial fetch to get real-time status
            setInterval(fetchPingStatus, refreshInterval); // Set up interval for continuous refreshing
        }
    });
</script>