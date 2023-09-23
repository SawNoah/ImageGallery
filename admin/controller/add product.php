<?php
include_once "../db/product.php";


if (isset($_POST['submit'])) {
    $image = $_POST['image'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $uploaded_date = $_POST['uploaded_date'];
    $category = $_POST['category'];


    $name = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    $location = "./images/";
    $image = $location . $name;

    $target_dir = "images/";
    $finalImage = $target_dir . $name;

    move_uploaded_file($temp, $finalImage);

    $insert = "INSERT INTO image_gallery(image_name,description,price,uploaded_date,category) VALUES ('$name','$description',' $price','$uploaded_date', '$category')";

    if ($conn->query($insert) === TRUE) {
        echo "Data inserted successfully";
        header("Location: ../product.php");
    } else {
        echo "error:" . $insert . "<br>" . $conn->error;
        header("Location: ../product.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="add product" content="width=device-width, initial-scaled=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styleadd.css">
    <title>Add Product</title>
</head>

<body>
    <div class="form">
        <form action="add product.php" method="POST" enctype="multipart/form-data">
            <h3>ADD PRODUCT</h3>


            
            <input type="text" name="category" placeholder="Enter Category" required>
            <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg" required>
            <input type="number" name="price" min="0" placeholder="Enter Price" required>
            <input type="text" name="description" placeholder="Enter Description" required>
            <input type="text" name="uploaded_date" placeholder="Enter Upload Date : YY/MM/DD" required>

            <input type="submit" name="submit" value="UPLOAD PRODUCT" class="btn btn-primary  text-dark">


        </form>
    </div>



</body>

</html>