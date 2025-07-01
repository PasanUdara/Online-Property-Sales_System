<?php
session_start();
require 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM property WHERE id='$id'";

if ($conn->query($sql)) {
    echo "<script>alert('Property deleted successfully!');</script>";
    header("Location: view_properties.php");
} else {
    echo "Error: " . $conn->error;
}
?>
