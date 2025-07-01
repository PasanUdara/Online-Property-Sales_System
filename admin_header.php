<?php
session_start();  // Start session to track user login status
require 'config.php'; // Include your database configuration

// Fetch user profile data if logged in
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
    $sql = "SELECT * FROM admin_form WHERE username='$admin'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    $user_name = $user['username']; // Get the profile image from the database
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
        <a class="links" href="admin.php">Properties</a>
        <a class="links" href="#">Offers</a>
    </div>

    <div class="nav-right">
        <div class="nav-right-links">
            <a class="links" href="#">About</a>
            <a class="links" href="#">Sales</a>
            <a class="links" href="#">Contact</a>
        </div>

        <?php
        // Check if the user is logged in
        if (isset($_SESSION['admin'])) {
            // If the user has a profile image, display it, otherwise show a default avatar

            // Display the user's name and "Dashboard", "Profile" links if the user is logged in
            echo '<span class="user-name">Hello, ' . $user_name . '</span>';  // Display the user's name
            echo '<a class="links" href="adminprofile.php">Profile</a>';
            echo '<a class="links" href="adminlogout.php">Logout</a>';
        } 
        ?>

        <div class="cart">
            <a href="admin.php"><img class="cart-img" src="Img/admin-dashboard.svg" alt="Cart"></a>
        </div>
    </div>
</div>
</body>
</html>
