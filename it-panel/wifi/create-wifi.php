<?php
/**
 * MEAL MONITORING SYSTEM
 * ----------------------
 * Features:
 * 1. QR Code Scanning (via Camera)
 * 2. Automatic Logging (PHP + MySQL)
 * 3. Success Notifications (Sound + Haptic + UI)
 * 4. Admin Reporting View
 */

// --- DATABASE CONFIGURATION ---
// Update these to match your local environment (e.g., XAMPP defaults)
$db_config = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'name' => 'allinonedb'
];

// --- DATABASE INITIALIZATION ---
// This block automatically handles connection and table creation for the demo
$conn = new mysqli($db_config['host'], $db_config['user'], $db_config['pass']);
if ($conn->connect_error) {
    $db_error = "Connection failed: " . $conn->connect_error;
} else {
    // Create DB if not exists
    $conn->query("CREATE DATABASE IF NOT EXISTS " . $db_config['name']);
    $conn->select_db($db_config['name']);
    // Create logs table
    $table_sql = "CREATE TABLE IF NOT EXISTS meal_logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        emp_id VARCHAR(50) NOT NULL,
        emp_name VARCHAR(100) NOT NULL,
        scan_date DATE NOT NULL,
        scan_time TIME NOT NULL,
        station_info TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->query($table_sql);
}

// --- BACKEND API LOGIC ---
// Handles the AJAX request from the JavaScript scanner
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'save_scan') {
    header('Content-Type: application/json');

    $input = json_decode(file_get_contents('php://input'), true);
    $emp_id = $conn->real_escape_string($input['emp_id']);
    $emp_name = $conn->real_escape_string($input['emp_name']);
    $qr_data = $conn->real_escape_string($input['qr_data']);
    $date = date('Y-m-d');
    $time = date('H:i:s');

    $sql = "INSERT INTO meal_logs (emp_id, emp_name, scan_date, scan_time, station_info) 
            VALUES ('$emp_id', '$emp_name', '$date', '$time', '$qr_data')";

    if ($conn->query($sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Meal logged successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }
    exit;
}

// --- DATA FETCHING (For Admin View) ---
$recent_logs = [];
if (!$conn->connect_error) {
    $result = $conn->query("SELECT * FROM meal_logs ORDER BY created_at DESC LIMIT 50");
    while ($row = $result->fetch_assoc()) {
        $recent_logs[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Meal Monitor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .qr-scanner-video {
            border-radius: 1rem !important;
        }

        #reader__dashboard_section_csr button {
            background-color: #4F46E5 !important;
            color: white !important;
            padding: 0.5rem 1rem !important;
            border-radius: 0.5rem !important;
            border: none !important;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen">

    <nav class="bg-indigo-600 text-white p-4 shadow-lg">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                </svg>
                MealTrack Pro
            </h1>
            <div class="text-xs opacity-80">PHP v8.0+ | MySQL</div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto p-4 space-y-6 pb-20">

        <?php if (isset($db_error)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
                <p class="font-bold">Database Error</p>
                <p><?php echo $db_error; ?></p>
                <p class="text-sm">Make sure MySQL is running and your credentials are correct.</p>
            </div>
        <?php endif; ?>

        <!-- Step 1: Simulated User Identity -->
        <div id="setup-section" class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <h2 class="text-lg font-semibold mb-4">1. Identify Employee</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Employee Name</label>
                    <input type="text" id="emp_name" placeholder="e.g. Sarah Jenkins"
                        class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Employee ID</label>
                    <input type="text" id="emp_id" placeholder="e.g. EMP-9921"
                        class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
            </div>
            <p class="mt-3 text-xs text-slate-500 italic">* In a live system, this would be handled by a secure login
                session.</p>
        </div>

        <!-- Step 2: The QR Scanner -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <h2 class="text-lg font-semibold mb-4">2. Scan Canteen QR</h2>
            <div id="reader" class="overflow-hidden"></div>
            <p class="mt-4 text-center text-sm text-slate-600">Scan the QR code displayed at the meal station to log
                your meal.</p>
        </div>

        <!-- Admin Table: View Logs -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <h2 class="text-lg font-semibold mb-4">Recent Logs</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b text-slate-500 font-medium">
                            <th class="py-3 px-2">Time</th>
                            <th class="py-3 px-2">Employee</th>
                            <th class="py-3 px-2">ID</th>
                            <th class="py-3 px-2">Station</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_logs as $log): ?>
                            <tr class="border-b hover:bg-slate-50 transition-colors">
                                <td class="py-3 px-2 text-slate-400">
                                    <?php echo date('H:i', strtotime($log['scan_time'])); ?>
                                </td>
                                <td class="py-3 px-2 font-medium"><?php echo htmlspecialchars($log['emp_name']); ?></td>
                                <td class="py-3 px-2 text-slate-500"><?php echo htmlspecialchars($log['emp_id']); ?></td>
                                <td class="py-3 px-2 truncate max-w-[100px]">
                                    <?php echo htmlspecialchars($log['station_info']); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($recent_logs)): ?>
                            <tr>
                                <td colspan="4" class="py-10 text-center text-slate-400">No logs found. Start scanning!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Success Modal Notification -->
    <div id="success-modal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-3xl p-8 max-w-sm w-full text-center shadow-2xl transform transition-all">
            <div
                class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">Scan Successful!</h3>
            <p id="modal-msg" class="text-slate-600 mb-6">Your meal has been recorded in the database.</p>
            <button onclick="closeModal()"
                class="w-full py-3 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition-colors">
                Great!
            </button>
        </div>
    </div>

    <script>
        // Setup Scanner
        const html5QrCode = new Html5Qrcode("reader");
        const config = {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        };

        // Pre-load Success Audio
        const successSound = new Audio('https://assets.mixkit.co/active_storage/sfx/2354/2354-preview.mp3');

        function onScanSuccess(decodedText, decodedResult) {
            const emp_name = document.getElementById('emp_name').value;
            const emp_id = document.getElementById('emp_id').value;

            if (!emp_name || !emp_id) {
                alert("Please enter Employee Name and ID first!");
                return;
            }

            // Pause scanning while processing
            html5QrCode.pause();

            // Send data to PHP Backend
            fetch('?action=save_scan', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    emp_id: emp_id,
                    emp_name: emp_name,
                    qr_data: decodedText
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        triggerSuccessNotification(emp_name);
                    } else {
                        alert("Error saving: " + data.message);
                        html5QrCode.resume();
                    }
                })
                .catch(err => {
                    console.error(err);
                    html5QrCode.resume();
                });
        }

        function triggerSuccessNotification(name) {
            // 1. Visual Feedback (Modal)
            document.getElementById('modal-msg').innerText = `Hello ${name}, your meal for today is logged.`;
            document.getElementById('success-modal').classList.remove('hidden');

            // 2. Audio Feedback
            successSound.play();

            // 3. Haptic Feedback (Vibrate phone)
            if (navigator.vibrate) {
                // Vibrate pattern: 200ms on, 100ms off, 200ms on
                navigator.vibrate([200, 100, 200]);
            }
        }

        function closeModal() {
            document.getElementById('success-modal').classList.add('hidden');
            // Reload page to update the table (simple way to refresh data)
            window.location.reload();
        }

        // Start the camera
        html5QrCode.start({
            facingMode: "environment"
        }, config, onScanSuccess);
    </script>
</body>

</html>