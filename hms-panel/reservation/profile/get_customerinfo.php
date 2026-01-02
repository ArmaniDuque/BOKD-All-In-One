<?php
// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "allinonedb";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get pagination parameters
    $start = isset($_GET['start']) ? $_GET['start'] : 0;
    $length = isset($_GET['length']) ? $_GET['length'] : 10;

    // Get search parameters
    $searchValue = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

    // Get total records
    $totalRecordsQuery = "SELECT COUNT(*) as total FROM hmst_customerinfo ";
    $totalRecordsResult = $conn->query($totalRecordsQuery);
    $totalRecordsRow = $totalRecordsResult->fetch(PDO::FETCH_ASSOC);
    $totalRecords = $totalRecordsRow['total'];


    $searchquery = "customerid LIKE :search 
    OR firstname LIKE :search 
    OR middlename LIKE :search 
    OR email1 LIKE :search 
    OR email2 LIKE :search 
    OR number1 LIKE :search 
    OR number2 LIKE :search 
    OR nationality LIKE :search 
    OR province LIKE :search 
    OR tittle LIKE :search 
    OR gender LIKE :search 
    OR membersid LIKE :search 
    OR seniorid LIKE :search 
    OR pwdid LIKE :search
    OR address LIKE :search";

    $searchquery1 = "customerid, firstname, middlename, lastname, email1, email2, number1, number2, nationality, province, tittle, email1, gender, membersid, seniorid, pwdid, address";





    // Get filtered records
    $filteredRecordsQuery = "SELECT COUNT(*) as total FROM hmst_customerinfo WHERE $searchquery";
    $filteredRecordsStmt = $conn->prepare($filteredRecordsQuery);
    $filteredRecordsStmt->bindValue(':search', '%' . $searchValue . '%');
    $filteredRecordsStmt->execute();
    $filteredRecordsRow = $filteredRecordsStmt->fetch(PDO::FETCH_ASSOC);
    $filteredRecords = $filteredRecordsRow['total'];

    // Get data for the current page
    $query = "SELECT * FROM hmst_customerinfo WHERE  $searchquery LIMIT :start, :length";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':search', '%' . $searchValue . '%');
    $stmt->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $stmt->bindValue(':length', (int) $length, PDO::PARAM_INT);
    $stmt->execute();
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare JSON response for DataTables
    $response = [
        "draw" => isset($_GET['draw']) ? intval($_GET['draw']) : 0,
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $filteredRecords,
        "data" => $customers,
    ];

    header('Content-Type: application/json');
    echo json_encode($response);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

$conn = null;
?>