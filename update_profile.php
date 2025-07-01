<?php 
include 'config.php';
session_start();


$id = $_SESSION['id'];

if(isset($_POST['update_profile']))
{
    // Escape inputs
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    // Update name and email
    mysqli_query($conn, "UPDATE `user_form` SET name ='$update_name', email = '$update_email' WHERE id ='$id'") or die('query failed');

    // Get the old password from the database
    $select_old_password = mysqli_query($conn, "SELECT password FROM `user_form` WHERE id = '$id'") or die('query failed');
    $fetch_old_password = mysqli_fetch_assoc($select_old_password);
    $stored_old_password = $fetch_old_password['password'];  // Password from DB (plain-text)

    // Get user input for passwords
    $old_pass = mysqli_real_escape_string($conn, $_POST['update_pass']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

    // Password update logic
    if (!empty($old_pass) || !empty($new_pass) || !empty($confirm_pass))
    {
        if ($old_pass != $stored_old_password) 
        {
            $message[] = 'Old password does not match!';
        } 
        elseif ($new_pass != $confirm_pass) 
        {
            $message[] = 'New password and confirm password do not match!';
        } 
        else 
        {
            mysqli_query($conn, "UPDATE `user_form` SET password ='$confirm_pass' WHERE id ='$id'") or die('query failed');
            $message[] = 'Password updated successfully!';
        }
    }

    // Handle image update
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploads/'.$update_image;

    if (!empty($update_image))
    {
        if ($update_image_size > 2000000) 
        {
            $message[] = 'Image is too large';
        } 
        else 
        {
            $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image ='$update_image' WHERE id ='$id'") or die('query failed');
            if ($image_update_query)
            {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'Image updated successfully!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="style/user.css">
</head>
<body>
    <div class="update-profile">
        <?php
            // Fetch user data for displaying in the form
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$id'") or die('query failed');

            if (mysqli_num_rows($select) > 0)
            {
                $fetch = mysqli_fetch_assoc($select);
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <?php
            // Display user profile image
            if ($fetch['image'] == '')
            {
                echo '<img src="images/default-avatar.png">';
            }
            else
            {
                echo '<img src="uploads/'.$fetch['image'].'">';
            }
            
            // Display messages
            if (isset($message))
            {
                foreach ($message as $message)
                {
                    echo '<div class="message">'.$message.'</div>';
                }
            }
            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>Username : </span>
                    <input type="text" name="update_name" value="<?php echo $fetch['name'] ?>" class="box">
                    <span>E-mail : </span>
                    <input type="email" name="update_email" value="<?php echo $fetch['email'] ?>" class="box">
                    <span>Update Your Picture : </span>
                    <input type="file" name="update_image" accept="image/jpg , image/jpeg , image/png" class="box">
                </div>
                <div class="inputBox">
                    <span>Old password:</span>
                    <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                    <span>New password:</span>
                    <input type="password" name="new_pass" placeholder="enter new password" class="box">
                    <span>Confirm password:</span>
                    <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                </div>
            </div>

            <input type="submit" value="Update Profile" name="update_profile" class="btn">
            <a href="profile.php" class="delete-btn">Go Back</a>
        </form>
    </div>
</body>
</html>
