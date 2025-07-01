<?php
session_start();  // Start session to track user login status
require 'config.php'; // Include your database configuration

// Fetch user profile data if logged in
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM user_form WHERE email='$email'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    $user_image = $user['image']; // Get the profile image from the database
    $user_name = $user['name'];  // Get the user's name from the database
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/header.css">
    <title>Ops Solution</title>
</head>
<body>
<div class="nav">
    <div class="nav-left">
        <a href="index.php">
            <img class="logo" src="Img/logo.png" alt="Ops solutions">
        </a>
        <a class="links" href="property_listing.php">Properties</a>
        <a class="links" href="list_offers.php">Offers</a>
    </div>

    <div class="nav-right">
        <div class="nav-right-links">
            <a class="links" href="about_us.php">About</a>
            <a class="links" href="#">Sales</a>
            <a class="links" href="add_contact.php">Contact</a>
        </div>

        <?php
        if (isset($_SESSION['email'])) {
            $profile_image = (!empty($user_image)) ? "uploads/" . $user_image : "Img/default-avatar.png";

            echo '<span class="user-name">Hello, ' . $user_name . '</span>'; 
            echo '<a class="links" href="dashboard.php">Dashboard</a>';
            echo '<a class="links" href="profile.php">Profile</a>';
            echo '<a class="profile-img" href="profile.php">
                    <img src="'.$profile_image.'" alt="User Profile" class="user-profile">
                  </a>';
            echo '<a class="links" href="logout.php">Logout</a>';
        } else {
            echo '<a class="login" href="login.php">Log in</a>';
            echo '<a class="reg" href="register.php">Register</a>';
        }
        ?>

        <div class="cart">
            <a href="shopping_cart.php"><img class="cart-img" src="Img/cart.svg" alt="Cart"></a>
        </div>
    </div>
</div>
</body>
</html>
