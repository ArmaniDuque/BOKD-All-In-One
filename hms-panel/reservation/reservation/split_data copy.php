<?php
// split_data.php

// This script processes the form submission from the main reservation page

// --- DATABASE CONNECTION ---
// Replace with your actual database credentials
$servername = "localhost";
$username = "root"; // Your database username
$password = "";     // Your database password
$dbname = "allinonedb"; // Your database name

// Create connection using mysqli (to match the provided code's style)
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Database Connection Error!</strong>
            <span class="block sm:inline"> Could not connect to the database: ' . htmlspecialchars($conn->connect_error) . '</span>
            </div>');
}

// Function to generate a unique reservation ID (similar to your existing AJAX logic)
function generateUniqueReservationId($mysqli_conn)
{
    $is_unique = false;
    $new_id = '';
    $max_attempts = 100;
    $attempt = 0;

    while (!$is_unique && $attempt < $max_attempts) {
        $new_id = 'RES' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $check_sql = "SELECT COUNT(*) AS count FROM `hmsreservations` WHERE `reservationid` = ?";
        $stmt = $mysqli_conn->prepare($check_sql);
        $stmt->bind_param("s", $new_id);
        $stmt->execute();
        $check_result = $stmt->get_result();
        $row = $check_result->fetch_assoc();

        if ($row['count'] == 0) {
            $is_unique = true;
        }
        $stmt->close();
        $attempt++;
    }
    return $is_unique ? $new_id : null;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve the data passed from the form
    $original_item_id = $conn->real_escape_string($_POST['item_id'] ?? ''); // Original Reservation ID
    $original_item_name = $conn->real_escape_string($_POST['item_name'] ?? ''); // Customer Name
    $current_total_rooms = (int) ($_POST['current_total_split'] ?? 0); // Number of rooms

    // Basic validation
    if (empty($original_item_id)) {
        die("Error: Original Reservation ID not provided.");
    }
    if ($current_total_rooms <= 1) {
        die("Error: Cannot split data for reservation " . $original_item_id . ". Number of rooms must be greater than 1. Current: " . $current_total_rooms);
    }

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Split Result</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body { font-family: "Inter", sans-serif; @apply bg-gray-100 p-4; }
            .container { @apply mx-auto p-6 bg-white rounded-xl shadow-lg mt-8; }
            .back-button { @apply inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out mt-6; }
        </style>
    </head>
    <body>
    <div class="container">';

    echo "<h1 class='text-2xl font-bold text-gray-800 mb-4'>Splitting Reservation for: <span class='text-blue-600'>" . $original_item_name . " (ID: " . $original_item_id . ")</span></h1>";
    echo "<p class='text-lg text-gray-700 mb-2'>Initiating split process for <span class='font-semibold'>" . $current_total_rooms . "</span> rooms.</p>";

    // --- DATABASE OPERATIONS ---
    $conn->begin_transaction(); // Start a transaction

    try {
        // 1. Fetch the original reservation details
        $stmt_original = $conn->prepare("SELECT * FROM `hmsreservations` WHERE `reservationid` = ?");
        $stmt_original->bind_param("s", $original_item_id);
        $stmt_original->execute();
        $result_original = $stmt_original->get_result();
        $original_reservation_data = $result_original->fetch_assoc();
        $stmt_original->close();

        if (!$original_reservation_data) {
            throw new Exception("Original reservation not found.");
        }

        // 2. Prepare for inserting new split reservations into `hmsreservations`
        $columns = [
            'folioid',
            'customerid',
            'checkindate',
            'checkoutdate',
            'roomtypeid',
            'roomnumber',
            'noofnights',
            'adults',
            'kids',
            'noofsenior',
            'ratecodeid',
            'roomstatus',
            'rate',
            'blockecodeid',
            'companyid',
            'groupid',
            'currencyid',
            'eta',
            'etd',
            'accompany',
            'otherdetails',
            'reservationtype',
            'marketid',
            'sourceid',
            'agentid',
            'originid',
            'paymenttypeid',
            'cardnumber',
            'cardtype',
            'expdate',
            'discount',
            'optiondate',
            'badult',
            'bkids',
            'ladult',
            'lkids',
            'dadult',
            'dkids',
            'status',
            'remarks',
            'created'
        ];
        $column_names_sql = implode(', ', $columns);
        $placeholders_sql = implode(', ', array_fill(0, count($columns), '?'));

        $insert_new_reservation_sql = "INSERT INTO `hmsreservations` (reservationid, noofrooms, $column_names_sql) VALUES (?, 1, $placeholders_sql)";
        $stmt_insert_new_reservation = $conn->prepare($insert_new_reservation_sql);

        // 3. Prepare for inserting into `splitinfo` table
        $insert_splitinfo_stmt = $conn->prepare("INSERT INTO `splitinfo` (parent_reservation_id, part_name, split_number) VALUES (?, ?, ?)");

        echo "<h3 class='text-xl font-semibold text-gray-800 mt-6 mb-3'>New Reservations Created:</h3>";

        // Loop to insert (number of rooms - 1) new reservation records
        for ($i = 1; $i < $current_total_rooms; $i++) {
            $new_reservation_id = generateUniqueReservationId($conn);
            if ($new_reservation_id === null) {
                throw new Exception("Failed to generate a unique ID for a split reservation.");
            }

            $bind_values = [];
            $types_string = "s"; // For new_reservation_id
            $types_string .= "i"; // For noofrooms (which is 1 for new splits)

            // Collect values and determine their types for bind_param
            foreach ($columns as $col) {
                $val = $original_reservation_data[$col];
                if ($col === 'created') {
                    $val = date('Y-m-d H:i:s');
                    $types_string .= "s";
                } else {
                    // Automatically determine type for binding
                    if (is_int($val)) {
                        $types_string .= "i";
                    } elseif (is_float($val)) {
                        $types_string .= "d";
                    } else { // Default to string for others
                        $types_string .= "s";
                    }
                }
                $bind_values[] = $val;
            }

            // Bind parameters for the new reservation insert statement
            // Dynamically create the array of references for call_user_func_array
            $params = [$types_string, $new_reservation_id, 1]; // Fixed first two parameters (reservationid, noofrooms)
            foreach ($bind_values as $key => $val) {
                $params[] = &$bind_values[$key]; // Pass values by reference
            }

            // Use call_user_func_array for dynamic parameter binding
            if (!call_user_func_array([$stmt_insert_new_reservation, 'bind_param'], $params)) {
                throw new Exception("Error binding parameters for new reservation: " . $stmt_insert_new_reservation->error);
            }

            if (!$stmt_insert_new_reservation->execute()) {
                throw new Exception("Error inserting new reservation: " . $stmt_insert_new_reservation->error);
            }
            echo "<p class='text-gray-600'>- Created new reservation ID: <span class='font-medium'>" . htmlspecialchars($new_reservation_id) . "</span> (from original: " . $original_item_id . ")</p>";

            // Insert into 'splitinfo' table
            $split_part_name = $original_item_name . " (Split Part " . $i . ")";
            $insert_splitinfo_stmt->bind_param("ssi", $original_item_id, $split_part_name, $i);
            if (!$insert_splitinfo_stmt->execute()) {
                throw new Exception("Error recording split info: " . $insert_splitinfo_stmt->error);
            }
            echo "<p class='text-gray-600'>- Recorded split detail for " . htmlspecialchars($split_part_name) . "</p>";
        }
        $stmt_insert_new_reservation->close();
        $insert_splitinfo_stmt->close();


        // 4. Update the original reservation's 'noofrooms' to 1
        $update_original_sql = "UPDATE `hmsreservations` SET `noofrooms` = 1 WHERE `reservationid` = ?";
        $stmt_update_original = $conn->prepare($update_original_sql);
        $stmt_update_original->bind_param("s", $original_item_id);
        if (!$stmt_update_original->execute()) {
            throw new Exception("Error updating original reservation: " . $stmt_update_original->error);
        }
        $stmt_update_original->close();

        $conn->commit(); // Commit the transaction
        echo "<p class='text-lg text-green-700 mt-6 font-medium'>Successfully performed splitting. Original reservation updated to 1 room, and " . ($current_total_rooms - 1) . " new reservations created.</p>";

    } catch (Exception $e) {
        $conn->rollback(); // Rollback on error
        echo "<p class='text-lg text-red-600 mt-4'>Error during split process: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<p class='text-gray-600'>The splitting operation for <span class='font-medium'>" . $original_item_name . "</span> failed and changes were rolled back.</p>";
    }

    $conn->close(); // Close the database connection

    echo '<a href="' . basename($_SERVER['PHP_SELF']) . '" class="back-button">Go Back to Reservation List</a>';
    echo '</div></body></html>';

} else {
    // If accessed directly without a POST request
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Access Denied</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body { font-family: "Inter", sans-serif; @apply bg-gray-100 p-4; }
            .container { @apply mx-auto p-6 bg-white rounded-xl shadow-lg mt-8; }
            .back-button { @apply inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out mt-6; }
        </style>
    </head>
    <body>
    <div class="container">
        <h1 class="text-2xl font-bold text-red-600 mb-4">Access Denied!</h1>
        <p class="text-lg text-gray-700">This page should only be accessed via a form submission.</p>
        <a href="index.php" class="back-button">Go Back to Main Page</a>
    </div></body></html>';
}
?>