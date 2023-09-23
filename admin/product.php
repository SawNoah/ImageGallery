<?php
require_once('db/product.php');
$query = "SELECT * from image_gallery";
$result = mysqli_query($conn, $query);


?>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Product Page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/0d592f66fa.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <nav class="navbar navbar-dark bg-purple fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <a class="navbar-brand" href="home.html"><i class="fa-regular fa-image"> The Xhibit</i></a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header bg-purple text-white" data-bs-theme="dark">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><a class="ms-2 link-light link-offset-2 link-underline link-underline-opacity-0" href="../client/profile.html"><i class="fa-solid fa-user"></i><span class="tabs" id="username"></span>
                    </a></h5>
                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3 nav-links">
                        <li class="nav-item"><a class="" href="home.html"><i class="fa-solid fa-house-chimney"></i><span class="tabs">Home</span>
                        </a></li>
                        <li class="nav-item"><a class="" href="product.php"><i class="fa-brands fa-product-hunt"></i><span class="tabs">Products</span>
                        </a></li>
                        <li class="nav-item"><a class="" href="customer.php"><i class="fa-solid fa-users"></i><span class="tabs">Customers</span>
                        </a></li>
                        <li class="nav-item"><a class="" href="order.php"><i class="fa-solid fa-rectangle-list"></i><span class="tabs">Orders</span>
                        </a></li>
                        <li class="nav-item"><a class="" href="about.html"><i class="fa-solid fa-circle-info"></i><span class="tabs">About</span>
                        </a></li>
                        <li class="nav-item"><a class="" href="../client/signin.html"><i class="fa-solid fa-right-from-bracket"></i><span class="tabs">Log out</span>
                        </a></li>
                        <div class="active"></div>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <script>
        // Retrieve user profile data from localStorage
        var userProfileData = JSON.parse(localStorage.getItem('userProfileData'));
    
        if (userProfileData) {
            // Update the profile card with user data
            document.getElementById('username').textContent = userProfileData.username;
            // Populate other elements with user data as needed
        }
    </script>

    <div class="row justify-content-center text-center mt-5">
        <div class="col-md-8 col-lg-6 mt-5">
            <div class="header">    
                <h2 class="mb-3" style="color: #6838e1;">Products List</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-start text-center">
        <div class="col-md-5">
            <div class="header">    
                <a href="controller/add product.php" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Add Product</a>
            </div>
        </div>
    </div>

    


    <div class="container mt-4 d-flex justify-content-center">

        <table class="table table-bordered w-60">
            <thead class="table-secondary">
                <tr class="data text-center">
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Uploaded_Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody class="data text-center">
                <tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                </tr>

                <td><img src="controller/images/<?= $row['image_name']; ?>" width="100" height="105" <?= $row['image_name']; ?>> </td>
                <td><?= $row['description']; ?></td>
                <td><?= $row['uploaded_date']; ?></td>
                <td><?= $row['price']; ?></td>
                <td><?= $row['category']; ?></td>
                <td><a href="update.php? id='<?= $row['image_id']; ?>';"><button type="submit" class="btn btn-primary">Update</button>
                </td>

            <?php
                    }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>