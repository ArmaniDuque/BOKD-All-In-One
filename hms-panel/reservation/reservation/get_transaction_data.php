<?php
header('Content-Type: application/json');

// Assuming you have an 'App' class with a method to fetch data
$app = new App;

if (isset($_GET['code_id'])) {
    $codeId = $_GET['code_id'];
    $query = "SELECT description FROM hmstransactions WHERE id = ?"; // Assuming 'id' is the primary key
    $descriptions = $app->selectColumn($query, [$codeId], 'description');

    echo json_encode($descriptions);
} else {
    echo json_encode([]);
}
?>