<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "allinonedb";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the POST data
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['emp_id'])) {
    $emp_id = $conn->real_escape_string($data['emp_id']);
    $emp_name = $conn->real_escape_string($data['emp_name']);
    $date = date('Y-m-d');
    $time = date('H:i:s');

    $sql = "INSERT INTO meal_logs (employee_name, employee_id, scan_date, scan_time) 
            VALUES ('$emp_name', '$emp_id', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Meal logged successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
$conn->close();
?>