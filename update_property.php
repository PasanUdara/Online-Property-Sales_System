<?php
session_start();
require 'config.php';
include_once 'header.php';

// Get the property ID from the URL
$id = $_GET['id'];

// Fetch the property data
$sql = "SELECT * FROM property WHERE id='$id'";
$result = $conn->query($sql);

// Check if the result has any rows
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<script>alert('Property not found!');</script>";
    exit();
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $_POST['location'];
    $price = $_POST['price'];

    // Update the property in the database
    $sql = "UPDATE property SET location='$location', price='$price' WHERE id='$id'";

    if ($conn->query($sql)) {
        echo "<script>alert('Property updated successfully!');</script>";
        header("Location: view_properties.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Property</title>
    <link rel="stylesheet" href="style/property_edit.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <h2>Edit Property</h2>
        <form method="POST">
            <label for="location">Location:</label>
            <input type="text" name="location" value="<?php echo isset($row['location']) ? $row['location'] : ''; ?>" required>
            <label for="price">Price:</label>
            <input type="number" name="price" value="<?php echo isset($row['price']) ? $row['price'] : ''; ?>" required>
            <input type="submit" value="Update Property">
        </form>
        </div>
    </div>
</body>
</html>

<?php
include_once('footer.php');
?>

