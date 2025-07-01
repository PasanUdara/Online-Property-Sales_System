<?php
include_once('config.php');
include_once('admin_header.php');

// Check if the ID is set
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Get the current FAQ details
    $sql = "SELECT * FROM faq WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $question = $row['question'];
        $answer = $row['answer'];
        $author = $row['author'];  // Fetch the author from the database
    } else {
        echo "FAQ entry not found.";
        exit;
    }
}

// Handle form submission for updating
if(isset($_POST['submit'])){
    $new_question = $_POST['question'];
    $new_answer = $_POST['answer'];
    $new_author = $_POST['author'];  // New author input

    // Update the FAQ entry in the database
    $sql = "UPDATE faq SET question = ?, answer = ?, author = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $new_question, $new_answer, $new_author, $id);

    if($stmt->execute()){
        echo "<script>
                alert('FAQ updated successfully.');
                window.location.href='faq_lists.php'; // Redirect to the FAQ list page after alert
              </script>";
    } else {
        echo "Error updating FAQ: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/update_faq.css">
    <title>Update FAQ</title>
</head>
<body>
    <div class="faq-container">
        <div class="faq-wrapper">
        <h1>Update FAQ</h1>
        <form method="POST">
            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" id="question" name="question" value="<?php echo $question; ?>" required>
            </div>

            <div class="form-group">
                <label for="answer">Answer:</label>
                <textarea id="answer" name="answer" required><?php echo $answer; ?></textarea>
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" value="<?php echo $author; ?>" required>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Update FAQ">
            </div>
        </form>
        </div>
    </div>

    <!-- Link to external JavaScript file -->
    <script src="js/update_faq.js"></script>
</body>
</html>

<?php
include_once('footer.php');
?>
