<?php
// Database configuration and connection
include '../server/connect.php';

// Set the response header for JSON
header("Content-Type: application/json");
// Add CORS headers to allow requests from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    login();
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Method not allowed"));
}

function login()
{
    global $conn;
    $username = isset($_GET['username']) ? $_GET['username'] : null;
    $password = isset($_GET['password']) ? $_GET['password'] : null;
    $role = isset($_GET['role']) ? $_GET['role'] : 'customer';

    if (!$username || !$password) {
        echo json_encode(array("success" => false));
        return;
    }

    // Query the database to check if the user exists and the password is correct
    // Also, check the role to determine which table to query
    $table = ($role === 'admin') ? 'admin' : 'customer';
    $sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        // Fetch the user profile data
        $profile = $result->fetch_assoc();
        // Add the "success" flag and the profile data to the response
        $response = array("success" => true, "profile" => $profile);
        echo json_encode($response);
    } else {
        echo json_encode(array("success" => false));
    }
}
// Close the database connection
$conn->close();

?>

