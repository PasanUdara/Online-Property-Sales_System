<?php
include_once('config.php'); 
include_once('header.php'); 

$sql = "SELECT propertyName, price, pDescription FROM offers"; 
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Offers</title>
    <link rel="stylesheet" href="style/list_offers.css"> 
</head>
<body>
    <div class="offers-container">
        <h1>Available Offers</h1>
        <div class="offers-table">
            <table border="1">
                <thead>
                    <tr>
                        <th>Property Name</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Check if there are any rows returned
                    if ($result->num_rows > 0) {
                        // Loop through and display the offer details
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['propertyName'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['pDescription'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No offers available at the moment.</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
include_once('footer.php');
?>
