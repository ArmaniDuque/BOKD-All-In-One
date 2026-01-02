<?php
// room_plan_calendar.php

// --- Mock Data (Replacing Database Connection) ---
// This data simulates what would typically come from a database.
// You can modify these arrays to test different scenarios.

$rooms = [
    ['id' => 1, 'room_number' => '101', 'status' => 'Available'],
    ['id' => 2, 'room_number' => '102', 'status' => 'Occupied'],
    ['id' => 3, 'room_number' => '201', 'status' => 'Available'],
    ['id' => 4, 'room_number' => '202', 'status' => 'Maintenance'],
    ['id' => 5, 'room_number' => '301', 'status' => 'Available'],
    ['id' => 6, 'room_number' => '302', 'status' => 'Cleaning'],
    ['id' => 7, 'room_number' => '401', 'status' => 'Available'],
    ['id' => 8, 'room_number' => '402', 'status' => 'Available'],
];

$guests = [
    ['id' => 101, 'first_name' => 'John', 'last_name' => 'Doe'],
    ['id' => 102, 'first_name' => 'Jane', 'last_name' => 'Smith'],
    ['id' => 103, 'first_name' => 'Alice', 'last_name' => 'Johnson'],
    ['id' => 104, 'first_name' => 'Bob', 'last_name' => 'Williams'],
];

$reservations = [
    // Reservation for Room 102 (Occupied)
    ['id' => 1001, 'room_id' => 2, 'guest_id' => 101, 'check_in_date' => '2025-06-01', 'check_out_date' => '2025-06-05', 'reservation_status' => 'Checked-In'],
    // Reservation for Room 301 (Confirmed)
    ['id' => 1002, 'room_id' => 5, 'guest_id' => 102, 'check_in_date' => '2025-06-10', 'check_out_date' => '2025-06-12', 'reservation_status' => 'Confirmed'],
    // Reservation for Room 101 (Booked for later in the month)
    ['id' => 1003, 'room_id' => 1, 'guest_id' => 103, 'check_in_date' => '2025-06-20', 'check_out_date' => '2025-06-23', 'reservation_status' => 'Booked'],
    // Reservation spanning across months (e.g., from end of May to early June)
    ['id' => 1004, 'room_id' => 7, 'guest_id' => 104, 'check_in_date' => '2025-05-28', 'check_out_date' => '2025-06-03', 'reservation_status' => 'Checked-In'],
    // Another reservation for Room 101 (Cancelled)
    ['id' => 1005, 'room_id' => 1, 'guest_id' => 101, 'check_in_date' => '2025-06-05', 'check_out_date' => '2025-06-07', 'reservation_status' => 'Cancelled'],
];

// Map guest IDs to names for easy lookup
$guestNames = [];
foreach ($guests as $guest) {
    $guestNames[$guest['id']] = $guest['first_name'] . ' ' . $guest['last_name'];
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

// --- Prepare Room Availability Data ---
$roomAvailability = [];
foreach ($rooms as $room) {
    $roomAvailability[$room['id']] = [];
    foreach ($calendarDates as $date) {
        $dateKey = $date->format('Y-m-d');
        $occupyingReservation = null;

        foreach ($reservations as $res) {
            // Check if reservation overlaps with the current date for this room
            if ($res['room_id'] == $room['id']) {
                $checkIn = new DateTime($res['check_in_date']);
                $checkOut = new DateTime($res['check_out_date']);

                // A room is occupied from check-in date up to (but not including) check-out date
                if ($date >= $checkIn && $date < $checkOut) {
                    $occupyingReservation = $res;
                    break; // Found an occupying reservation for this date and room
                }
            }
        }

        if ($occupyingReservation) {
            $roomAvailability[$room['id']][$dateKey] = [
                'status' => $occupyingReservation['reservation_status'],
                'guestName' => $guestNames[$occupyingReservation['guest_id']] ?? 'N/A',
                'reservationId' => $occupyingReservation['id'] ?? 'N/A'
            ];
        } else {
            // FIX: Ensure 'guestName' key is always present, even if empty.
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
                    <?php if (empty($rooms)): // This condition will now likely be false as $rooms is always populated ?>
                        <tr>
                            <td colspan="<?php echo count($calendarDates) + 1; ?>"
                                style="text-align: center; padding: 20px;">No rooms found in the mock data.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($rooms as $room): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($room['room_number']); ?></td>
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