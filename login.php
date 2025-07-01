<?php
session_start();
include_once ('config.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];



    $sql = "SELECT * FROM user_form WHERE  email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows>0)
    {
        $user = $result->fetch_assoc();

        if($password === $user['password']){
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            header("Location: index.php");
            exit();
        }
        else{
            $error = "Invalid email or password.";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST">
            <div class="textbox">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="textbox">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Login" class="btn">
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>
