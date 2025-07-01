<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $_POST['location'];
    $price = $_POST['price'];
    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = "uploads/" . $image_name;

    // Move uploaded file to the uploads directory
    if (move_uploaded_file($image_tmp_name, $image_folder)) {
        $sql = "INSERT INTO property (location, price, image) VALUES ('$location', '$price', '$image_folder')";

        if ($conn->query($sql)) {
            echo "<script>alert('Property added successfully!');</script>";
            header("Location: dashboard.php");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>

<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Property</title>
    <link rel="stylesheet" href="style/add_property.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <h2>Add Property</h2>
        <form method="POST" enctype="multipart/form-data">
            <label for="location">Location:</label>
            <input type="text" name="location" required>
            <label for="price">Price:</label>
            <input type="number" name="price" required>
            <label for="image">Image:</label>
            <input type="file" name="image" required>
            <input type="submit" value="Add Property">
        </form>
        </div>
    </div>
</body>
</html>

<?php
include_once 'footer.php';
?>