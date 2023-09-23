<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "image_gallery";

// Create a connection
$conn = mysqli_connect("$servername", "$username", "$password", "$dbname");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

// Perform a query
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
