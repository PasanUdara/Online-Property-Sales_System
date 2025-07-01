<?php
session_start();
include 'config.php';  // Include the database connection

// Check if the admin session exists, if not redirect to login
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}

include_once('admin_header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ops Solutions</title>
    <link rel="stylesheet" href="style/admin.css">
    <script src="js/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="container-top">
            <h1 class="container-top-h1">Admin Dashboard</h1>
            <button onclick="btn2()" class="container-top-btn">Navigate</button>
            <div id="admin-actions">
                <a href="#" class="admin-action">Customer</a>
                <a href="#" class="admin-action">Buyer</a>
                <a href="FAQ_form.php" class="admin-action">Add FAQ</a>
            </div>
            <a href="faq_lists.php" class="update-faq">Update FAQ</a>
        </div>
        <div class="container-bottom">
           <div class="container-bottom1">
            <img src="Img/chart1.png" alt="" class="container-bottom1-img">
            <img src="Img/chart3.png" alt="" class="container-bottom1-img">
           </div>
           <img src="Img/chart2.png" class="container-bottom2-img">
        </div>
    </div>
</body>
</html>

<?php
include_once('footer.php');
?>
