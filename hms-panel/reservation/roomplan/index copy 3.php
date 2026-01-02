<?php
// room_plan_calendar.php

// --- Database Connection ---
// IMPORTANT: Replace 'root' and '' with your actual database username and password.
$host = 'localhost';
$db = 'allinonedb'; // Your database name
$user = 'root';       // Your database username
$pass = '';           // Your database password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// --- Date Handling ---
$currentMonth = isset($_GET['month']) ? new DateTime($_GET['month'] . '-01') : new DateTime();
$currentMonth->setTime(0, 0, 0); // Reset time to start of day

$startOfMonth = clone $currentMonth;
$startOfMonth->modify('first day of this month');

$endOfMonth = clone $currentMonth;
$endOfMonth->modify('last day of this month');

$calendarDates = [];
$interval = new DateInterval('P1D'); // 1 day interval
$period = new DatePeriod($startOfMonth, $interval, $endOfMonth->modify('+1 day')); // +1 day to include the end date

foreach ($period as $date) {
    $calendarDates[] = $date;
}
// Remove the extra day added for DatePeriod
array_pop($calendarDates);

// --- Fetch Rooms from 'hmsroomsetup' table ---
$rooms = [];
$roomNumberToIdMap = []; // To map room_number from hmsreservations to rooms.id
try {
    // Fetch rooms from hmsroomsetup and map roomstatusid to a readable status
    // Adjust the CASE statement below if your roomstatusid values or their meanings are different.
    // For example, if roomstatusid 6 means 'Out of Order', add 'WHEN 6 THEN 'Out of Order''
    $stmt = $pdo->query("
        SELECT
            id,
            roomnumber,
            CASE roomstatusid
                WHEN 1 THEN 'Available'
                WHEN 2 THEN 'Occupied'
                WHEN 3 THEN 'Maintenance'
                WHEN 4 THEN 'Cleaning'
                WHEN 5 THEN 'Booked'
                ELSE 'Unknown' -- Default for unmapped status IDs
            END AS status
        FROM
            hmsroomsetup
        ORDER BY
            roomnumber ASC
    ");
    foreach ($stmt->fetchAll() as $room) {
        $rooms[] = $room; // Keep original room data
        $roomNumberToIdMap[$room['roomnumber']] = $room['id']; // Map room_number to room.id
    }
} catch (\PDOException $e) {
    // Fallback if 'hmsroomsetup' table doesn't exist or query fails
    error_log("Error fetching rooms from hmsroomsetup: " . $e->getMessage());
    // Fallback to a very basic mock if DB fetch fails.
    if (empty($rooms)) {
        $rooms = [
            ['id' => 1, 'room_number' => '101', 'status' => 'Available'],
            ['id' => 2, 'room_number' => '102', 'status' => 'Available'],
            ['id' => 3, 'room_number' => '201', 'status' => 'Available'],
        ];
        foreach ($rooms as $room) {
            $roomNumberToIdMap[$room['room_number']] = $room['id'];
        }
    }
}


// --- Fetch Guests from 'hmst_customerinfo' ---
$guestNames = [];
try {
    $stmt = $pdo->query("SELECT id, firstname, lastname FROM hmst_customerinfo");
    foreach ($stmt->fetchAll() as $guest) {
        $guestNames[$guest['id']] = $guest['firstname'] . ' ' . $guest['lastname'];
    }
} catch (\PDOException $e) {
    error_log("Error fetching guest info: " . $e->getMessage());
    // Fallback for guest names if table or query fails
    $guestNames = [
        101 => 'Mock Guest 1',
        102 => 'Mock Guest 2',
    ];
}


// --- Fetch Reservations from 'hmsreservations' ---
$reservations = [];
try {
    $stmt = $pdo->prepare("
        SELECT
            hr.roomnumber,
            hr.checkindate,
            hr.checkoutdate,
            hr.roomstatus AS reservation_status, -- Assuming roomstatus maps to reservation_status
            hr.customerid AS guest_id,
            hr.reservationid AS reservation_id -- Include reservationid if needed for details
        FROM
            hmsreservations hr
        WHERE
            (hr.checkindate <= :end_of_month AND hr.checkoutdate >= :start_of_month)
    ");
    $stmt->execute([
        ':start_of_month' => $startOfMonth->format('Y-m-d'),
        ':end_of_month' => $endOfMonth->format('Y-m-d')
    ]);
    $fetchedReservations = $stmt->fetchAll();

    // Map fetched reservations to the structure expected by $roomAvailability logic
    foreach ($fetchedReservations as $res) {
        // Ensure room_id is based on the 'hmsroomsetup' table's ID
        $roomId = $roomNumberToIdMap[$res['roomnumber']] ?? null;

        if ($roomId !== null) {
            $reservations[] = [
                'room_id' => $roomId,
                'guest_id' => $res['guest_id'],
                'check_in_date' => $res['checkindate'],
                'check_out_date' => $res['checkoutdate'],
                'reservation_status' => $res['reservation_status'],
                'reservationId' => $res['reservation_id']
            ];
        } else {
            error_log("Room number '{$res['roomnumber']}' from hmsreservations not found in hmsroomsetup table.");
        }
    }
} catch (\PDOException $e) {
    error_log("Error fetching reservations: " . $e->getMessage());
    // Fallback for reservations if table or query fails
    $reservations = [
        ['room_id' => 1, 'guest_id' => 101, 'check_in_date' => '2025-06-01', 'check_out_date' => '2025-06-05', 'reservation_status' => 'Checked-In'],
        ['room_id' => 2, 'guest_id' => 102, 'check_in_date' => '2025-06-10', 'check_out_date' => '2025-06-12', 'reservation_status' => 'Confirmed'],
    ];
}


// --- Prepare Room Availability Data ---
$roomAvailability = [];
foreach ($rooms as $room) {
    $roomAvailability[$room['id']] = []; // Use room.id as the key
    foreach ($calendarDates as $date) {
        $dateKey = $date->format('Y-m-d');
        $occupyingReservation = null;

        foreach ($reservations as $res) {
            // Check if reservation overlaps with the current date for this room
            if ($res['room_id'] == $room['id']) { // Check against rooms.id
                $checkIn = new DateTime($res['check_in_date']);
                $checkOut = new DateTime($res['check_out_date']);

                // A room is occupied from check-in date up to (but not including) check-out date
                if ($date >= $checkIn && $date < $checkOut) {
                    $occupyingReservation = $res;
                    break;
                }
            }
        }

        if ($occupyingReservation) {
            $roomAvailability[$room['id']][$dateKey] = [
                'status' => $occupyingReservation['reservation_status'],
                'guestName' => $guestNames[$occupyingReservation['guest_id']] ?? 'N/A',
                'reservationId' => $occupyingReservation['reservationId'] ?? 'N/A'
            ];
        } else {
            // Ensure 'guestName' key is always present, even if empty.
            $roomAvailability[$room['id']][$dateKey] = [
                'status' => $room['status'] === 'Available' ? 'Available' : $room['status'],
                'guestName' => '' // Assign an empty string to guestName for non-reserved days
            ];
        }
    }
}

// Helper to get cell background color based on status
function getStatusColor($status)
{
    switch ($status) {
        case 'Available':
            return '#D1FAE5'; // bg-green-200
        case 'Occupied':
        case 'Checked-In':
            return '#FEE2E2'; // bg-red-300
        case 'Booked':
        case 'Confirmed':
            return '#DBEAFE'; // bg-blue-300
        case 'Maintenance':
            return '#FEF3C7'; // bg-yellow-300
        case 'Cleaning':
            return '#EDE9FE'; // bg-purple-200
        case 'Cancelled':
        case 'No-Show':
            return '#D1D5DB'; // bg-gray-400
        default:
            return '#F3F4F6'; // bg-gray-100
    }
}

// Helper to get text color for sticky header/column (not directly used in this HTML, but kept for consistency)
function getTextColor($status)
{
    switch ($status) {
        case 'Available':
            return '#065F46'; // text-green-800
        case 'Occupied':
        case 'Checked-In':
            return '#991B1B'; // text-red-800
        case 'Booked':
        case 'Confirmed':
            return '#1E40AF'; // text-blue-800
        case 'Maintenance':
            return '#92400E'; // text-yellow-800
        case 'Cleaning':
            return '#5B21B6'; // text-purple-800
        case 'Cancelled':
        case 'No-Show':
            return '#4B5563'; // text-gray-800
        default:
            return '#4B5563'; // text-gray-800
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Plan Calendar</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f3f4f6;
        /* bg-gray-100 */
    }

    .container {
        max-width: 100%;
        margin: 1rem auto;
        background-color: #ffffff;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
        /* border-gray-200 */
        background-color: #f9fafb;
        /* bg-gray-50 */
    }

    .header h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1f2937;
        /* text-gray-800 */
        margin: 0;
    }

    .button {
        padding: 0.5rem 1rem;
        background-color: #3b82f6;
        /* bg-blue-500 */
        color: #ffffff;
        border-radius: 0.375rem;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
    }

    .button:hover {
        background-color: #2563eb;
        /* hover:bg-blue-600 */
    }

    .table-container {
        overflow-x: auto;
        width: 100%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
        /* Ensures columns have fixed widths */
    }

    thead th {
        background-color: #f9fafb;
        /* bg-gray-50 */
        padding: 0.75rem 0.5rem;
        text-align: center;
        font-size: 0.75rem;
        font-weight: 500;
        color: #6b7280;
        /* text-gray-500 */
        text-transform: uppercase;
        letter-spacing: 0.05em;
        min-width: 80px;
        /* min-w-[80px] */
        border-bottom: 1px solid #e5e7eb;
    }

    thead th:first-child {
        position: sticky;
        left: 0;
        background-color: #f9fafb;
        /* bg-gray-50 */
        z-index: 10;
        border-right: 1px solid #e5e7eb;
        text-align: left;
        padding-left: 1rem;
    }

    tbody td {
        padding: 0.5rem 0.5rem;
        text-align: center;
        font-size: 0.75rem;
        color: #1f2937;
        /* text-gray-900 */
        white-space: nowrap;
        border: 1px solid #e5e7eb;
        /* border-gray-200 */
        border-radius: 0.125rem;
        /* rounded-sm */
        overflow: hidden;
        /* Hide overflow content */
        text-overflow: ellipsis;
        /* Add ellipsis for overflow */
    }

    tbody td:first-child {
        position: sticky;
        left: 0;
        background-color: #ffffff;
        font-weight: 500;
        border-right: 1px solid #e5e7eb;
        z-index: 5;
        text-align: left;
        padding-left: 1rem;
    }

    tbody tr:hover {
        background-color: #f9fafb;
        /* hover:bg-gray-50 */
    }

    .legend {
        padding: 1rem;
        border-top: 1px solid #e5e7eb;
        /* border-gray-200 */
        background-color: #f9fafb;
        /* bg-gray-50 */
    }

    .legend h3 {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .legend-item {
        display: flex;
        align-items: center;
        margin-right: 1rem;
        font-size: 0.875rem;
    }

    .legend-color-box {
        width: 1rem;
        height: 1rem;
        border-radius: 9999px;
        /* rounded-full */
        margin-right: 0.5rem;
    }

    .flex-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <?php
            $prevMonth = clone $currentMonth;
            $prevMonth->modify('-1 month');
            $nextMonth = clone $currentMonth;
            $nextMonth->modify('+1 month');
            ?>
            <a href="?month=<?php echo $prevMonth->format('Y-m'); ?>" class="button">Previous</a>
            <h2><?php echo $currentMonth->format('F Y'); ?></h2>
            <a href="?month=<?php echo $nextMonth->format('Y-m'); ?>" class="button">Next</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Room</th>
                        <?php foreach ($calendarDates as $date): ?>
                        <th>
                            <?php echo $date->format('M j'); ?>
                            <br />
                            <span style="color: #9CA3AF;"><?php echo $date->format('D'); ?></span>
                        </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($rooms)): ?>
                    <tr>
                        <td colspan="<?php echo count($calendarDates) + 1; ?>"
                            style="text-align: center; padding: 20px;">No rooms found in the database. Please ensure the
                            'hmsroomsetup' table is populated.</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($room['roomnumber']); ?></td>
                        <?php foreach ($calendarDates as $date): ?>
                        <?php
                                    $dateKey = $date->format('Y-m-d');
                                    // Use null coalescing operator to safely access $roomAvailability
                                    $cellData = $roomAvailability[$room['id']][$dateKey] ?? ['status' => 'Unknown', 'guestName' => ''];
                                    $displayContent = $cellData['guestName'] ? substr($cellData['guestName'], 0, 1) : substr($cellData['status'], 0, 1);
                                    $title = $cellData['guestName'] ? $cellData['status'] . ': ' . $cellData['guestName'] : $cellData['status'];
                                    ?>
                        <td style="background-color: <?php echo getStatusColor($cellData['status']); ?>; border: 1px solid #e5e7eb; border-radius: 0.125rem;"
                            title="<?php echo htmlspecialchars($title); ?>">
                            <?php echo htmlspecialchars($displayContent); ?>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="legend">
            <h3>Legend:</h3>
            <div class="flex-wrap">
                <div class="legend-item">
                    <span class="legend-color-box" style="background-color: #D1FAE5;"></span> Available
                </div>
                <div class="legend-item">
                    <span class="legend-color-box" style="background-color: #FEE2E2;"></span> Occupied / Checked-In
                </div>
                <div class="legend-item">
                    <span class="legend-color-box" style="background-color: #DBEAFE;"></span> Booked / Confirmed
                </div>
                <div class="legend-item">
                    <span class="legend-color-box" style="background-color: #FEF3C7;"></span> Maintenance
                </div>
                <div class="legend-item">
                    <span class="legend-color-box" style="background-color: #EDE9FE;"></span> Cleaning
                </div>
                <div class="legend-item">
                    <span class="legend-color-box" style="background-color: #D1D5DB;"></span> Cancelled / No-Show
                </div>
            </div>
        </div>
    </div>
</body>

</html>