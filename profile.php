<?php
include 'config.php';
session_start();
include_once('header.php');

// Capture id with null coalescing
$id = $_SESSION['id'] ?? null;

if (!isset($_SESSION['id'])) {
    // If user_id is not set, redirect to login page
    header('location:login.php');
    exit(); // Prevent further execution
}

if (isset($_GET['logout'])) {
    unset($_SESSION['id']); // Unset user_id from session
    session_destroy(); // Destroy session
    header('location:login.php'); // Redirect to login page
    exit(); // Prevent further execution
}

// Fetch user data based on user_id
$select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$id'") or die('query failed');

// Initialize $fetch variable to avoid undefined variable warning
$fetch = null;

if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style/user.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <?php
            // Check if user data was fetched successfully
            if ($fetch) {
                // Display user image or default avatar
                if ($fetch['image'] == '') {
                    echo '<img src="images/default-avatar.png">';
                } else {
                    echo '<img src="uploads/' . $fetch['image'] . '">'; // Added a forward slash to the path
                }
                ?>
                <h3>
                    <?php
                    echo htmlspecialchars($fetch['name']); // Display user's name safely
                    ?>
                </h3>
                <a href="update_profile.php" class="btn">Update Profile</a>
                <a href="profile.php?logout=<?php echo $id; ?>" class="delete-btn">Log out</a>
                <p>New <a href="login.php">Login</a> or <a href="register.php">Registration</a></p>
                <?php
            } else {
                echo '<p>User data not found. Please log in again.</p>'; // Inform user about the missing data
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
include_once('footer.php');
?>
