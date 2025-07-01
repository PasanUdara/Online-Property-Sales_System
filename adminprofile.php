<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");  // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="style/user.css">
</head>
<body>
    <h3>Welcome, <?php echo $_SESSION['admin']; ?>!</h3>
    <p>This is the admin profile page.<a href="adminlogout.php">Logout</a></p>
</body>
</html>