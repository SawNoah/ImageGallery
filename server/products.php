<?php
// Database configuration and connection
include 'connect.php';

// Set the response header for JSON
header("Content-Type: application/json");
// Add CORS headers to allow requests from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    getProducts();
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // This block handles the order recording when a product is purchased/downloaded
    recordOrder();
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Method not allowed"));
}

function getProducts()
{
    global $conn;

    $sql = "SELECT * FROM image_gallery";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $products = array();
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        echo json_encode($products);
    } else {
        echo json_encode(array());
    }
}

function recordOrder()
{
    global $conn;

    $imageId = isset($_POST['image_id']) ? $_POST['image_id'] : null;
    $customerId = isset($_POST['customer_id']) ? $_POST['customer_id'] : null;

    if (!$imageId || !$customerId) {
        http_response_code(400); // Bad Request
        echo json_encode(array("message" => "Invalid request"));
        return;
    }

    // Insert the order into the 'orders' table
    $orderDate = date('Y-m-d H:i:s');
    $sql = "INSERT INTO orders (image_id, customer_id, order_date) VALUES ($imageId, $customerId, '$orderDate')";
    
    if ($conn->query($sql) === TRUE) {
        // Generate a download link for the image (replace 'images/' with the actual folder path)
        $imagePath = '../admin/controller/images/' . getImagePathById($imageId);
        
        // Respond with the download link
        echo json_encode(array("message" => "Order recorded", "download_link" => $imagePath));
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Order recording failed"));
    }
}


function getImagePathById($imageId)
{
    global $conn;

    $sql = "SELECT image_name FROM image_gallery WHERE image_id = $imageId";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        return $row['image_name'];
    }

    return null;
}
// Close the database connection
$conn->close();
?>
