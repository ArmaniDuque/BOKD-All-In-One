<?php
// $ratecodeId = $_GET['ratecodeid'];
// $roomtypeId = $_GET['roomtypeid'];
// $day = $_GET['day'];
// $pdo = new PDO('mysql:host=localhost;dbname=dvpro', 'root', '');
// $stmt = $pdo->prepare("SELECT $day FROM ratecodedetails WHERE ratecodeid = ? AND roomtypeid = ?");
// $stmt->execute([$ratecodeId, $roomtypeId]);
// echo $stmt->fetchColumn();
?>
<?php
try {
    $ratecodeId = $_GET['ratecodeid'];
    $roomtypeId = $_GET['roomtypeid'];
    $day = $_GET['day'];
    $pdo = new PDO('mysql:host=localhost;dbname=dvpro', 'root', '');
    $stmt = $pdo->prepare("SELECT $day, packageid FROM ratecodedetails WHERE ratecodeid = ? AND roomtypeid = ?");
    $stmt->execute([$ratecodeId, $roomtypeId]);
    echo $stmt->fetchColumn(); // Correct placement of echo
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>