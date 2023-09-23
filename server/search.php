<?php
// Database configuration and connection
include 'connect.php';

// Set the response header for JSON
header("Content-Type: application/json");
// Add CORS headers to allow requests from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // GET SEARCH TERM
    $searchTerm = $_POST['search'];

    global $conn;

    $sql = "SELECT * FROM image_gallery WHERE description LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $sql);

    $searchResults = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResults[] = $row;
        }
    }

    mysqli_close($conn);

    // Return search results as JSON
    header("Content-Type: application/json");
    echo json_encode($searchResults);
}

?>
