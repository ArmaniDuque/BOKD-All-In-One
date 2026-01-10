<?php
// This header allows your HTML page to read the time from the server
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Return current server time in milliseconds
echo json_encode([
    "serverTime" => round(microtime(true) * 1000)
]);
?>