<?php
include 'config.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Corrected SQL query
    $sql = "DELETE FROM `property_cart_db` WHERE id = $id"; 
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo "Deleted successfully"; 
    } else {
        die(mysqli_error($conn));
    }
}
?>
