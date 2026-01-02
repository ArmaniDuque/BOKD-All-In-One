<?php
// header('Content-Type: application/json');
// $roomtypeId = $_GET['roomtypeid'];
// $pdo = new PDO('mysql:host=localhost;dbname=allinonedb', 'root', '');
// $stmt = $pdo->prepare('SELECT roomnumber FROM roomsetup WHERE roomtypeid = ?');
// $stmt->execute([$roomtypeId]);
// echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
<?php
header('Content-Type: application/json');
try {
    $roomtypeId = $_GET['roomtypeid'];
    $pdo = new PDO('mysql:host=localhost;dbname=allinonedb', 'root', '');
    $stmt = $pdo->prepare('SELECT roomnumber FROM hmsroomsetup WHERE roomtypeid = ?');
    $stmt->execute([$roomtypeId]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>