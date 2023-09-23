<?php
require_once('db/cudb.php');
$query = "SELECT * from customer";
$result = mysqli_query($conn, $query);

$adminquery = "SELECT * from admin";
$adminresult = mysqli_query($conn, $adminquery);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Customer</title>
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
                <h2 style="color: #6838e1;">User Lists</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center text-center mt-5">
        <div class="col-md-8 col-lg-6">
            <div class="header">
                <h3>Customer Lists</h3>
            </div>
        </div>
    </div>


    <div class="container mt-5 d-flex justify-content-center">

        <table class="table table-bordered w-60">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Join_date</th>
                    <th scope="col">Role</th>
                    <th scope="col">Password</th>

                </tr>
            </thead>
            <tbody class="datac">
                <tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                </tr>

                <td><?= $row['username']; ?></td>
                <td><?= $row['contact']; ?></td>
                <td><?= $row['address']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['join_date']; ?></td>
                <td><?= $row['role']; ?></td>
                <td><?= $row['PASSWORD']; ?></td>

            <?php
                    }
            ?>
            </tbody>
        </table>
    </div>

    <div class="row justify-content-center text-center mt-5">
        <div class="col-md-8 col-lg-6">
            <div class="header">
                <h3>Admin Lists</h3>
            </div>
        </div>
    </div>
    <div class="container mt-5 d-flex justify-content-center">

        <table class="table table-bordered w-60">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Join_date</th>
                    <th scope="col">Role</th>
                    <th scope="col">Password</th>

                </tr>
            </thead>
            <tbody class="datac">
                <tr>
                    <?php
                    while ($adminrow = mysqli_fetch_assoc($adminresult)) {
                    ?>
                </tr>

                <td><?= $adminrow['username']; ?></td>
                <td><?= $adminrow['contact']; ?></td>
                <td><?= $adminrow['address']; ?></td>
                <td><?= $adminrow['email']; ?></td>
                <td><?= $adminrow['join_date']; ?></td>
                <td><?= $adminrow['role']; ?></td>
                <td><?= $adminrow['PASSWORD']; ?></td>

            <?php
                    }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>