<?php
session_start();
include 'config.php';  // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];  // No hashing method applied

    // Fetch user data from the database
    $select = "SELECT * FROM `admin_form` WHERE username='$username' AND password='$password'";
    $result = $conn->query($select);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;  // Store the admin username in session
        header("Location: admin.php");  // Redirect to admin profile page
        exit();  // Ensure no further code is executed after redirection
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style/user.css">  <!-- Link to the CSS -->
</head>
<body>
    <div class="form-container">
        <form action="adminlogin.php" method="POST">
            <h3>Admin Login</h3>

            <input type="text" name="username" id="username" placeholder="Username" class="box" required>
            <input type="password" name="password" id="password" placeholder="Password" class="box" required>
            <input type="submit" name="submit" value="Login Now" class="btn">
            <input type="checkbox" onclick="togglePassword()"> Show Password
        </form>
    </div>

    <script>
    // JS for form validation and password toggle
    function togglePassword() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }

    document.querySelector('form').addEventListener('submit', function(event) {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (username === "" || password === "") {
            event.preventDefault();
            alert("Please fill in both username and password fields.");
        }
    });
    </script>
</body>
</html>
