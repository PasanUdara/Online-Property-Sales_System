<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

require 'config.php';
include_once 'header.php';

// Check for SQL errors
$sql = "SELECT * FROM property";
$result = $conn->query($sql);
if (!$result) {
    die("Error executing query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Properties</title>
    <link rel="stylesheet" href="style/view_property.css">
</head>
<body>
    <div class="container">
        <h2>Properties List</h2>
        <table>
            <tr>
                <th>Location</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <?php if(!empty($row['image'])): ?>
                        <img src="uploads/<?php echo $row['image']; ?>" width="100" />
                    <?php else: ?>
                        <p>No image available</p>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="update_property.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="delete_property.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php
include_once 'footer.php';
?>
