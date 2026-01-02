<?php
/**
 * MEAL MONITORING SYSTEM
 * ----------------------
 * Features:
 * 1. QR Code Scanning (via Camera)
 * 2. Automatic Logging (PHP + MySQL)
 * 3. Success Notifications (Sound + Haptic + UI)
 * 4. Admin Reporting View
 * 5. QR Code Generator (For Stations or App Sharing)
 */

// --- DATABASE CONFIGURATION ---
$db_config = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'name' => 'allinonedb'
];

// --- DATABASE INITIALIZATION ---
$conn = new mysqli($db_config['host'], $db_config['user'], $db_config['pass']);
if ($conn->connect_error) {
    $db_error = "Connection failed: " . $conn->connect_error;
} else {
    $conn->query("CREATE DATABASE IF NOT EXISTS " . $db_config['name']);
    $conn->select_db($db_config['name']);
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

// --- DATA FETCHING ---
$recent_logs = [];
if (!$conn->connect_error) {
    $result = $conn->query("SELECT * FROM meal_logs ORDER BY created_at DESC LIMIT 50");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $recent_logs[] = $row;
        }
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
    <!-- QR Code Generator Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
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
            <div class="flex gap-4 items-center">
                <button onclick="scrollToGenerator()"
                    class="text-xs bg-indigo-500 hover:bg-indigo-400 px-3 py-1 rounded-full transition-colors font-medium">Generate
                    QRs</button>
                <div class="text-xs opacity-80 hidden sm:block">PHP v8.0+ | MySQL</div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto p-4 space-y-6 pb-20">

        <?php if (isset($db_error)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
                <p class="font-bold">Database Error</p>
                <p><?php echo $db_error; ?></p>
            </div>
        <?php endif; ?>

        <!-- Step 1: Identity -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <h2 class="text-lg font-semibold mb-4 text-slate-800">1. Identify Employee</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Employee Name</label>
                    <input type="text" id="emp_name" placeholder="e.g. Sarah Jenkins"
                        class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Employee ID</label>
                    <input type="text" id="emp_id" placeholder="e.g. EMP-9921"
                        class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                </div>
            </div>
        </div>

        <!-- Step 2: Scanner -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <h2 class="text-lg font-semibold mb-4 text-slate-800">2. Scan Station QR</h2>
            <div id="reader" class="overflow-hidden bg-slate-100 rounded-xl min-h-[300px]"></div>
            <p class="mt-4 text-center text-sm text-slate-600">Ensure the employee details are filled before scanning
                the station code.</p>
        </div>

        <!-- Admin: Recent Logs -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <h2 class="text-lg font-semibold mb-4 text-slate-800">Recent Logs</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b text-slate-500 font-medium">
                            <th class="py-3 px-2">Time</th>
                            <th class="py-3 px-2">Employee</th>
                            <th class="py-3 px-2">ID</th>
                            <th class="py-3 px-2">Station Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_logs as $log): ?>
                            <tr class="border-b hover:bg-slate-50 transition-colors">
                                <td class="py-3 px-2 text-slate-400 whitespace-nowrap">
                                    <?php echo date('H:i', strtotime($log['scan_time'])); ?>
                                </td>
                                <td class="py-3 px-2 font-medium"><?php echo htmlspecialchars($log['emp_name']); ?></td>
                                <td class="py-3 px-2 text-slate-500"><?php echo htmlspecialchars($log['emp_id']); ?></td>
                                <td class="py-3 px-2 text-indigo-600 italic">
                                    <?php echo htmlspecialchars($log['station_info']); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($recent_logs)): ?>
                            <tr>
                                <td colspan="4" class="py-10 text-center text-slate-400 italic">Waiting for the first
                                    scan...</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- NEW: QR Generator Section -->
        <div id="admin-generator" class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="text-lg font-semibold text-slate-800">3. QR Generator Tool</h2>
                    <p class="text-sm text-slate-500">Create QR codes for stations or share this app.</p>
                </div>
                <button onclick="generateAppQR()"
                    class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-600 px-3 py-1.5 rounded-lg border font-medium">Generate
                    App Link</button>
            </div>

            <div
                class="flex flex-col md:flex-row gap-8 items-center md:items-start bg-slate-50 p-6 rounded-xl border border-dashed border-slate-300">
                <div class="flex-1 space-y-4 w-full">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Station Label / Data</label>
                        <input type="text" id="qr_input" placeholder="e.g. Canteen Station 1"
                            class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none">
                    </div>
                    <button onclick="generateCustomQR()"
                        class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold hover:bg-indigo-700 transition-shadow shadow-md active:scale-[0.98] transition-transform">
                        Generate QR Code
                    </button>
                    <p class="text-[11px] text-slate-400">Scan this code at the meal station to identify the location in
                        logs.</p>
                </div>

                <div class="flex flex-col items-center gap-4">
                    <div class="bg-white p-4 rounded-xl shadow-sm border">
                        <canvas id="qr-canvas" width="180" height="180"></canvas>
                    </div>
                    <button id="dl_btn" onclick="downloadQR()"
                        class="hidden text-sm text-indigo-600 hover:underline font-medium flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download Image
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Success Notification Modal -->
    <div id="success-modal"
        class="fixed inset-0 bg-slate-900/60 hidden flex items-center justify-center p-4 z-50 backdrop-blur-sm">
        <div
            class="bg-white rounded-3xl p-8 max-w-sm w-full text-center shadow-2xl animate-in fade-in zoom-in duration-300">
            <div
                class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-green-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-slate-900 mb-2">Scan Successful!</h3>
            <p id="modal-msg" class="text-slate-600 mb-6">Details saved to the database.</p>
            <button onclick="closeModal()"
                class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200">
                Got it
            </button>
        </div>
    </div>

    <script>
        // 1. SCANNER LOGIC
        const html5QrCode = new Html5Qrcode("reader");
        const config = {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        };
        const successSound = new Audio('https://assets.mixkit.co/active_storage/sfx/2354/2354-preview.mp3');

        function onScanSuccess(decodedText, decodedResult) {
            const emp_name = document.getElementById('emp_name').value.trim();
            const emp_id = document.getElementById('emp_id').value.trim();

            if (!emp_name || !emp_id) {
                alert("Please fill in Employee Name and ID before scanning!");
                return;
            }

            html5QrCode.pause(); // Stop scanning temporarily

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
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        triggerUIFeedback(emp_name);
                    } else {
                        alert("DB Error: " + data.message);
                        html5QrCode.resume();
                    }
                })
                .catch(err => {
                    console.error(err);
                    html5QrCode.resume();
                });
        }

        function triggerUIFeedback(name) {
            document.getElementById('modal-msg').innerText = `Hello ${name}, your scan was successful.`;
            document.getElementById('success-modal').classList.remove('hidden');
            successSound.play().catch(() => { }); // Play sound
            if (navigator.vibrate) navigator.vibrate([200, 100, 200]); // Vibrate
        }

        function closeModal() {
            window.location.reload(); // Refresh to see logs
        }

        // Start Scanner
        html5QrCode.start({
            facingMode: "environment"
        }, config, onScanSuccess);

        // 2. GENERATOR LOGIC
        let qrGenerator;

        function generateCustomQR() {
            const val = document.getElementById('qr_input').value;
            if (!val) return alert("Please enter some text for the QR code");

            renderQR(val);
        }

        function generateAppQR() {
            const url = window.location.href;
            document.getElementById('qr_input').value = url;
            renderQR(url);
        }

        function renderQR(text) {
            if (!qrGenerator) {
                qrGenerator = new QRious({
                    element: document.getElementById('qr-canvas'),
                    size: 250,
                    level: 'H'
                });
            }
            qrGenerator.value = text;
            document.getElementById('dl_btn').classList.remove('hidden');
        }

        function downloadQR() {
            const canvas = document.getElementById('qr-canvas');
            const link = document.createElement('a');
            link.download = 'mealtrack-qr.png';
            link.href = canvas.toDataURL();
            link.click();
        }

        function scrollToGenerator() {
            document.getElementById('admin-generator').scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>