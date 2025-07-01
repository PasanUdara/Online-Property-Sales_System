<?php
include_once('admin_header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Input Form</title>
    <link rel="stylesheet" href="style/faq-form.css">
    <script src="js/script.js"></script>
</head>
<body>
    <div class="faq-container">
        <div class="div-wrapper">
        <h1>Submit FAQ</h1>

<form action="add-faq.php" method="POST">
    <div class="form-group">
        <label for="question">Question:</label>
        <textarea id="question" name="question" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label for="answer">Answer:</label>
        <textarea id="answer" name="answer" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
    </div>

    <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>
    </div>

    <button  type="submit">Submit FAQ</button>
</form>
        </div>
    </div>
</body>
</html>


<?php
include_once('footer.php');
?>
