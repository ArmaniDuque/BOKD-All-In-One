<?php
header('Content-Type: application/json');
try {
    if (isset($_GET['ratecodeid'])) {
        $ratecodeId = $_GET['ratecodeid'];
    } else {
        // Fetch the first ratecode id if not provided
        $pdo_temp = new PDO('mysql:host=localhost;dbname=dvpro', 'root', '');
        $stmt_temp = $pdo_temp->query('SELECT id FROM ratecode LIMIT 1');
        $first_ratecode = $stmt_temp->fetch(PDO::FETCH_ASSOC);
        if ($first_ratecode) {
            $ratecodeId = $first_ratecode['id'];
        } else {
            echo json_encode([]);
            exit;
        }
    }

    $pdo = new PDO('mysql:host=localhost;dbname=dvpro', 'root', '');
    $stmt = $pdo->prepare('SELECT roomtypes.id, roomtypes.code, roomtypes.adults, roomtypes.kids FROM ratecodedetails JOIN roomtypes ON ratecodedetails.roomtypeid = roomtypes.id WHERE ratecodedetails.ratecodeid = ?');
    $stmt->execute([$ratecodeId]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>