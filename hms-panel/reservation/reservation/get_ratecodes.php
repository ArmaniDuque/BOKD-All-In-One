<?php
// header('Content-Type: application/json');
// $pdo = new PDO('mysql:host=localhost;dbname=allinonedb', 'root', '');
// $stmt = $pdo->query('SELECT id, code FROM ratecode');
// echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
<?php
header('Content-Type: application/json');
try {
    $pdo = new PDO('mysql:host=localhost;dbname=allinonedb', 'root', '');
    $stmt = $pdo->query('SELECT id, code FROM hmsratecode');
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>