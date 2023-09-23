<?php
require_once('db/product.php');

if (isset($_GET['deleteid'])) {
    $image_id = $_GET['deleteid'];

    $query = "DELETE FROM image_gallery WHERE `image_gallery`.`image_id` = $image_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Product Item Deleted";
        header("Location: product.php");
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
}
