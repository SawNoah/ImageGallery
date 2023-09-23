<?php
// Database configuration
include 'connect.php';

// Set the response header for JSON
header("Content-Type: application/json");
// Add CORS headers to allow requests from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    createUser();
    
} else {
    // Return a "Method Not Allowed" response for non-POST requests
    http_response_code(405);
    echo json_encode(array("message" => "Method not allowed"));
}


// Create a new user
function createUser()
{
    global $conn;
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $contact = isset($_POST['contact']) ? $_POST['contact'] : null;
    $address = isset($_POST['address']) ? $_POST['address'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    $join_date_input = isset($_POST['join_date']) ? $_POST['join_date'] : null;
    $join_date = date('Y-m-d', strtotime($join_date_input));

    $role = isset($_POST['role']) ? $_POST['role'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    

    if (!$username || !$password) {
        http_response_code(400); // Bad Request
        echo json_encode(array(
            "message" => "Missing required parameters",
            "data"=> [
                "username" => $username,
                "contact"  => $contact,
                "address"   => $address,
                "email"   => $email,
                "join_date" => $join_date,
                "role"  => $role,
                "password"   => $password
            ]
        ));
        return;
    }

    // Determine which table to query based on the user's role
    $table = ($role === 'admin') ? 'Admin' : 'Customer';
    $sql = "INSERT INTO $table (username, contact, address, email, join_date, role, password)
            VALUES ('$username', '$contact', '$address', '$email', '$join_date', '$role', '$password')";

    if ($conn->query($sql) === TRUE) {
        $id = $conn->insert_id;
        http_response_code(201);// Created
        echo json_encode(array(
            "status"  => "Success",
            "$table". "_id" => $id
        ));
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Error signing in: " . $conn->error));
    }
}

// Close the database connection
$conn->close();


?>