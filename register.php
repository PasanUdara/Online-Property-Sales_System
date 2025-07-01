<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Handle image upload
    $profile_image = $_FILES['profile_image']['name']; // Get image name
    $profile_image_tmp = $_FILES['profile_image']['tmp_name']; // Temporary image file
    $profile_image_size = $_FILES['profile_image']['size']; // Image size
    $image_folder = 'uploads/'.$profile_image; // Define the image folder path

    // Validate image size (2MB limit)
    if ($profile_image_size > 2000000) {
        echo "<script>alert('Image size is too large. Max size is 2MB.');</script>";
    } else {
        // Move uploaded image to the specified folder
        if (move_uploaded_file($profile_image_tmp, $image_folder)) {
            // Insert user data including the image path
            $sql = "INSERT INTO user_form (name, email, password, image) VALUES ('$username', '$email', '$password', '$profile_image')";

            if ($conn->query($sql)) {
                echo "<script>alert('Registration successful!');</script>";
                header("Location: login.php");
                exit();
            } else {
                echo "<div class='error'>Error: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='error'>Failed to upload image. Please try again.</div>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <div class="register-box">
        <h2>Register</h2>
        <form method="POST" enctype="multipart/form-data"> <!-- Added enctype attribute -->
            <div class="textbox">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="textbox">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="textbox">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="textbox">
                <input type="file" name="profile_image" accept="image/*" required> <!-- File input for image -->
            </div>
            <input type="submit" value="Register" class="btn">
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Log in here</a></p>
        </div>
    </div>
</body>
</html>
