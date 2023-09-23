<?php
$conn = mysqli_connect("localhost", "root", "", "image_gallery");

// Check the connection
if (!$conn) {
    die(mysqli_error($con));
}
