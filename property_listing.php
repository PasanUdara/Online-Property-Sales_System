<?php
// Include database connection
include_once('config.php');
include_once('header.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/property_listing.css">
    <title>Property Listings</title>
</head>
<body>
    <div class="container">
    <div class="property-list-container">
        <h1>Available Properties</h1>
        <div class="property-grid">
            <?php
            // Fetch properties from the database
            $sql = "SELECT * FROM property";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='property-card'>";
                    echo "<img src='uploads/" . $row['image'] . "' alt=''>";
                    echo "<div class='property-info'>";
                    echo "<p class='price'>$" . $row['price'] . "</p>";
                    echo "<p class='location'>" . $row['location'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "No properties available.";
            }

            $conn->close(); // Close connection after use
            ?>
        </div>
    </div>
    </div>
</body>
</html>

<?php
include_once('footer.php');
?>
