<?php
require_once('db/product.php');

if (isset($_POST['update'])) {
    $image_id = $_POST['image_id']; // Capture the image_id to update a specific record
    $description = $_POST['description'];
    $price = $_POST['price'];
    $uploaded_date = $_POST['uploaded_date'];
    $category = $_POST['category'];

    // Check if a new image file is uploaded
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];

        $location = "./images/";
        $image = $location . $name;

        move_uploaded_file($name, $finalImage);

        // Update the database with the new image file
        $query = "UPDATE `image_gallery` SET `image_name`='$name', `description`='$description', `price`='$price', `uploaded_date`='$uploaded_date', `category`='$category' WHERE `image_id` = $image_id";
    } else {
        // No new image file is uploaded, update without changing the image
        $query = "UPDATE `image_gallery` SET `description`='$description', `price`='$price', `uploaded_date`='$uploaded_date', `category`='$category' WHERE `image_id` = $image_id";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Product Item updated";
        header("Location: product.php");
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>OrderList</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/0d592f66fa.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <!-- ... (your navigation and header) ... -->

    <div class="container mt-5 col-md-8 border rounded">
        <div class="container mt-5 col-md-8">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="title">
                <h2 class="form-control bg-purple text-center text-light">Update form</h2>
            </div>
            <div class="my-3"> <!-- Hidden input for image_id -->
                <input type="hidden" name="image_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            </div>
            <div class="my-3">
                <input type="text" name="description" class="form-control" placeholder="Enter Description" required>
            </div>
            <div class="my-3">
                <input type="text" name="category" class="form-control" placeholder="Enter Category" required>
            </div>
            <div class="my-3">
                <input type="file" name="image" id="image" class="form-control" accept=".png, .jpg, .jpeg">
            </div>
            <div class="my-3">
                <input type="number" name="price" class="form-control" min="0" placeholder="Enter Price" required>
            </div>
            <div class="my-3">
                <input type="text" name="uploaded_date" class="form-control" placeholder="Enter UploadedDate" required>
            </div>
            <div class="my-3">
                <button type="submit" name="update" value="UPDATE PRODUCT" class="btn btn-primary">UPDATE PRODUCT</button>
            </div>
        </form>
        </div>
    </div>
</body>

</html>
