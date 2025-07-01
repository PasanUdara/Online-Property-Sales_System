<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
}

// Redirect to login page
header('location:index.php');
exit(); // Prevent further code execution
?>
