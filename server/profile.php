<?php

include_once "signin.php";

// Set the response header for JSON
header("Content-Type: application/json");
// Add CORS headers to allow requests from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Get a specific order
function getProfile()
{   
    
    global $conn;
    $username = isset($_GET['username']) ? $_GET['username'] : null;
    
    $role = isset($_GET['role']) ? $_GET['role'] : 'customer';
    $table = ($role === 'admin') ? 'admin' : 'customer';

    $sql = "SELECT * FROM $table WHERE username = $username";
    $result = $conn->query($sql);
    $profile = $result->fetch_assoc();

    if ($profile) {
        echo json_encode($profile);
    } else {
        http_response_code(404); // Not Found
        echo json_encode(array("message" => "Order not found"));
    }
}
// Close the database connection
$conn->close();
?>