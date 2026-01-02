<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Allows other PCs to fetch the time
// Return the current server time in milliseconds
echo json_encode(['serverTime' => round(microtime(true) * 1000)]);
?>