<?php
// api.php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Allow requests from any origin (for development)
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight OPTIONS request (important for CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once 'db_connect.php'; // Include the database connection file (now in the same directory)

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', trim($request_uri, '/'));

// Determine the endpoint from the URI
// This logic needs to be robust to handle different server configurations
// For a structure like `pos/api.php/endpoint`, the endpoint is the part after `api.php`
$endpoint = '';
$api_script_name = './api.php/';
$api_script_name_index = array_search($api_script_name, $uri_segments);

if ($api_script_name_index !== false && isset($uri_segments[$api_script_name_index + 1])) {
    $endpoint = $uri_segments[$api_script_name_index + 1];
} else {
    // Fallback for cases where api.php might be the last segment or not explicitly in path
    // e.g., if using .htaccess rewrite rules
    // This assumes the last segment is the endpoint if it's not api.php itself.
    $last_segment = end($uri_segments);
    if ($last_segment !== $api_script_name) {
        $endpoint = $last_segment;
    }
}

// Function to send JSON response
function sendResponse($data, $statusCode = 200)
{
    http_response_code($statusCode);
    echo json_encode($data);
    exit();
}

// Function to handle errors
function sendError($message, $statusCode = 500)
{
    sendResponse(['error' => $message], $statusCode);
}

switch ($method) {
    case 'GET':
        switch ($endpoint) {
            case 'categories':
                // CHANGE: Updated table name from 'posmenucategory' to 'poscategory'
                $sql = "SELECT id, category, sequence, icon, color, others FROM poscategory ORDER BY sequence ASC, category ASC";
                $result = $conn->query($sql);
                if ($result) {
                    $categories = [];
                    while ($row = $result->fetch_assoc()) {
                        $categories[] = $row;
                    }
                    sendResponse($categories);
                } else {
                    sendError("Error fetching categories: " . $conn->error);
                }
                break;

            case 'subcategories':
                // CHANGE: Updated table name from 'posmenusubcategory' to 'possubcategory'
                $sql = "SELECT subcatid, subcategory, sequence, categoryid, icon FROM possubcategory ORDER BY sequence ASC, subcategory ASC";
                $result = $conn->query($sql);
                if ($result) {
                    $subcategories = [];
                    while ($row = $result->fetch_assoc()) {
                        $subcategories[] = $row;
                    }
                    sendResponse($subcategories);
                } else {
                    sendError("Error fetching subcategories: " . $conn->error);
                }
                break;

            case 'menuitems':
                // This table name 'posmenu' was already consistent.
                // The status check 'status = '1'' is also kept as per your code.
                $sql = "SELECT menuid, name, description, price, price1, categoryid, subcategoryid, status FROM posmenu WHERE status = '1'";
                $result = $conn->query($sql);
                if ($result) {
                    $menuItems = [];
                    while ($row = $result->fetch_assoc()) {
                        $menuItems[] = $row;
                    }
                    sendResponse($menuItems);
                } else {
                    sendError("Error fetching menu items: " . $conn->error);
                }
                break;

            case 'order':
                $customer_id = $_GET['customerid'] ?? 'Walk-in';
                $sql = "SELECT orderid, customerid, date, time, overallstatus, totalamount, tableid, discount, pax, otherinfo1 FROM posorder WHERE customerid = ? AND overallstatus = 'Pending' ORDER BY createdat DESC LIMIT 1";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("s", $customer_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $order = $result->fetch_assoc();
                    $stmt->close();
                    if ($order) {
                        sendResponse($order);
                    } else {
                        sendResponse(null); // No pending order found
                    }
                } else {
                    sendError("Error preparing order query: " . $conn->error);
                }
                break;

            case 'orderitems':
                $order_id = $_GET['orderid'] ?? '';
                if (empty($order_id)) {
                    sendError("Order ID is required", 400);
                }
                // CHANGE: Updated table name from 'posordeitem' to 'posorderitems'
                $sql = "SELECT orderitemid, orderid, menuid, category, quantity, price, remarks, status FROM posorderitems WHERE orderid = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("s", $order_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $orderItems = [];
                    while ($row = $result->fetch_assoc()) {
                        $orderItems[] = $row;
                    }
                    $stmt->close();
                    sendResponse($orderItems);
                } else {
                    sendError("Error preparing order items query: " . $conn->error);
                }
                break;

            default:
                sendError("Invalid API endpoint", 404);
                break;
        }
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input) {
            sendError("Invalid JSON input", 400);
        }

        switch ($endpoint) {
            case 'order':
                $customer_id = $input['customerid'] ?? 'Walk-in';
                $table_id = $input['tableid'] ?? 'TBD';
                $pax = $input['pax'] ?? 1;
                $date = date('Y-m-d');
                $time = date('H:i:s');
                $overallstatus = "Pending";
                $totalamount = 0;
                $discount = 0;

                $order_id = 'ORD-' . strtoupper(uniqid()); // Simple unique ID

                $sql = "INSERT INTO posorder (orderid, customerid, date, time, overallstatus, totalamount, tableid, discount, pax, createdat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("ssssdsdis", $order_id, $customer_id, $date, $time, $overallstatus, $totalamount, $table_id, $discount, $pax);
                    if ($stmt->execute()) {
                        sendResponse(['message' => 'Order created successfully', 'orderid' => $order_id]);
                    } else {
                        sendError("Error creating order: " . $stmt->error);
                    }
                    $stmt->close();
                } else {
                    sendError("Error preparing order insert: " . $conn->error);
                }
                break;

            case 'orderitems':
                $order_id = $input['orderid'] ?? null;
                $menu_id = $input['menuid'] ?? null;
                $quantity = $input['quantity'] ?? null;
                $price = $input['price'] ?? null;
                $remarks = $input['remarks'] ?? '';
                $status = $input['status'] ?? 'Pending';
                $category = $input['category'] ?? '';

                if (!$order_id || !$menu_id || !is_numeric($quantity) || !is_numeric($price)) {
                    sendError("Missing required fields for order item", 400);
                }

                $date = date('Y-m-d');
                $time = date('H:i:s');

                $sql_check = "SELECT orderitemid, quantity FROM posorderitems WHERE orderid = ? AND menuid = ?";
                $stmt_check = $conn->prepare($sql_check);
                if ($stmt_check) {
                    $stmt_check->bind_param("ss", $order_id, $menu_id);
                    $stmt_check->execute();
                    $result_check = $stmt_check->get_result();
                    $existing_item = $result_check->fetch_assoc();
                    $stmt_check->close();

                    if ($existing_item) {
                        $new_quantity = $existing_item['quantity'] + $quantity;
                        $sql_update = "UPDATE posorderitems SET quantity = ?, price = ?, remarks = ?, status = ? WHERE orderitemid = ?";
                        $stmt_update = $conn->prepare($sql_update);
                        if ($stmt_update) {
                            $stmt_update->bind_param("idssi", $new_quantity, $price, $remarks, $status, $existing_item['orderitemid']);
                            if ($stmt_update->execute()) {
                                sendResponse(['message' => 'Order item updated successfully', 'orderitemid' => $existing_item['orderitemid']]);
                            } else {
                                sendError("Error updating order item: " . $stmt_update->error);
                            }
                            $stmt_update->close();
                        } else {
                            sendError("Error preparing order item update: " . $conn->error);
                        }
                    } else {
                        $order_item_id = 'OITEM-' . strtoupper(uniqid());
                        $sql_insert = "INSERT INTO posorderitems (orderitemid, orderid, menuid, category, quantity, price, remarks, status, date, time, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
                        $stmt_insert = $conn->prepare($sql_insert);
                        if ($stmt_insert) {
                            $stmt_insert->bind_param("ssssdsssss", $order_item_id, $order_id, $menu_id, $category, $quantity, $price, $remarks, $status, $date, $time);
                            if ($stmt_insert->execute()) {
                                sendResponse(['message' => 'Order item added successfully', 'orderitemid' => $order_item_id]);
                            } else {
                                sendError("Error adding order item: " . $stmt_insert->error);
                            }
                            $stmt_insert->close();
                        } else {
                            sendError("Error preparing order item insert: " . $conn->error);
                        }
                    }
                } else {
                    sendError("Error checking existing order item: " . $conn->error);
                }
                break;

            default:
                sendError("Invalid API endpoint", 404);
                break;
        }
        break;

    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input) {
            sendError("Invalid JSON input", 400);
        }

        switch ($endpoint) {
            case 'orderitems':
                $order_item_id = $input['orderitemid'] ?? null;
                $remarks = $input['remarks'] ?? null;
                $quantity = $input['quantity'] ?? null;
                $price = $input['price'] ?? null;
                $status = $input['status'] ?? null;

                if (!$order_item_id) {
                    sendError("Order item ID is required", 400);
                }

                $updates = [];
                $params = [];
                $types = "";

                if ($remarks !== null) {
                    $updates[] = "remarks = ?";
                    $params[] = $remarks;
                    $types .= "s";
                }
                if ($quantity !== null && is_numeric($quantity)) {
                    $updates[] = "quantity = ?";
                    $params[] = $quantity;
                    $types .= "i";
                }
                if ($price !== null && is_numeric($price)) {
                    $updates[] = "price = ?";
                    $params[] = $price;
                    $types .= "d";
                }
                if ($status !== null) {
                    $updates[] = "status = ?";
                    $params[] = $status;
                    $types .= "s";
                }

                if (empty($updates)) {
                    sendError("No fields to update", 400);
                }

                $sql = "UPDATE posorderitems SET " . implode(", ", $updates) . " WHERE orderitemid = ?";
                $params[] = $order_item_id;
                $types .= "s";

                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param($types, ...$params);
                    if ($stmt->execute()) {
                        sendResponse(['message' => 'Order item updated successfully', 'orderitemid' => $order_item_id]);
                    } else {
                        sendError("Error updating order item: " . $stmt->error);
                    }
                    $stmt->close();
                } else {
                    sendError("Error preparing order item update: " . $conn->error);
                }
                break;

            case 'order':
                $order_id = $input['orderid'] ?? null;
                $total_amount = $input['totalamount'] ?? null;
                $discount = $input['discount'] ?? null;
                $overall_status = $input['overallstatus'] ?? null;
                // $overall_status = $input['overallstatus'] ?? "Pending";

                if (!$order_id) {
                    sendError("Order ID is required", 400);
                }

                $updates = [];
                $params = [];
                $types = "";

                if ($total_amount !== null && is_numeric($total_amount)) {
                    $updates[] = "totalamount = ?";
                    $params[] = $total_amount;
                    $types .= "d";
                }
                if ($discount !== null && is_numeric($discount)) {
                    $updates[] = "discount = ?";
                    $params[] = $discount;
                    $types .= "d";
                }
                if ($overall_status !== null) {
                    $updates[] = "overallstatus = ?";
                    $params[] = $overall_status;
                    $types .= "s";
                }

                if (empty($updates)) {
                    sendError("No fields to update", 400);
                }

                $sql = "UPDATE posorder SET " . implode(", ", $updates) . " WHERE orderid = ?";
                $params[] = $order_id;
                $types .= "s";

                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param($types, ...$params);
                    if ($stmt->execute()) {
                        sendResponse(['message' => 'Order updated successfully', 'orderid' => $order_id]);
                    } else {
                        sendError("Error updating order: " . $stmt->error);
                    }
                    $stmt->close();
                } else {
                    sendError("Error preparing order update: " . $conn->error);
                }
                break;

            default:
                sendError("Invalid API endpoint", 404);
                break;
        }
        break;

    case 'DELETE':
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input) {
            sendError("Invalid JSON input", 400);
        }

        switch ($endpoint) {
            case 'orderitems':
                $order_item_id = $input['orderitemid'] ?? null;
                if (!$order_item_id) {
                    sendError("Order item ID is required", 400);
                }
                $sql = "DELETE FROM posorderitems WHERE orderitemid = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("s", $order_item_id);
                    if ($stmt->execute()) {
                        sendResponse(['message' => 'Order item deleted successfully', 'orderitemid' => $order_item_id]);
                    } else {
                        sendError("Error deleting order item: " . $stmt->error);
                    }
                    $stmt->close();
                } else {
                    sendError("Error preparing order item delete: " . $conn->error);
                }
                break;

            default:
                sendError("Invalid API endpoint", 404);
                break;
        }
        break;

    default:
        sendError("Method not allowed", 405);
        break;
}

$conn->close();