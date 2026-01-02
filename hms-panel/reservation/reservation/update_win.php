<?php
// Replace with your actual database credentials
$host = "localhost";
$dbname = "allinonedb";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['guestfolio_id']) && isset($_POST['new_win'])) {
        $guestfolioId = filter_var($_POST['guestfolio_id'], FILTER_SANITIZE_NUMBER_INT);
        $newWin = filter_var($_POST['new_win'], FILTER_SANITIZE_NUMBER_INT);

        if ($guestfolioId > 0 && in_array($newWin, [1, 2, 3, 4])) {
            $stmt = $pdo->prepare("UPDATE hmsguestfolio SET win = :new_win WHERE id = :guestfolio_id");
            $stmt->bindParam(':new_win', $newWin, PDO::PARAM_INT);
            $stmt->bindParam(':guestfolio_id', $guestfolioId, PDO::PARAM_INT);
            // echo "<script>window.location.reload();</script>";
            $stmt->execute();
            if ($stmt->execute()) {
                echo "<script>window.location.reload();</script>";
                echo "Win updated successfully for guestfolio ID: $guestfolioId to Win: $newWin";
            } else {
                echo "Error updating Win.";
            }
        } else {
            echo "Invalid guestfolio ID or Win value.";
        }
    } else {
        echo "Missing guestfolio ID or new Win value.";
    }
} else {
    echo "Invalid request method.";
}

$pdo = null; // Close the database connection
?>