<?php
include_once('header.php');
include_once('config.php');

// SQL query to fetch all FAQ entries from the database
$sql = "SELECT * FROM faq";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
    <link rel="stylesheet" href="style/faq.css">
</head>
<body>
    <div class="faq-container">
       
        <div class="faq-wrapper">

        <h1>Frequently Asked Questions</h1>

            <!-- Loop through each FAQ item fetched from the database -->
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Fetch details for each FAQ entry
                    $question = $row['question'];
                    $answer = $row['answer'];
                    $date = $row['date'];
                    $author = $row['author'];
            ?>

            <div class="faq-item">
                <div class="question">
                    <strong>Question:</strong>
                    <p><?php echo htmlspecialchars($question); ?></p>
                </div>

                <div class="answer">
                    <strong>Answer:</strong>
                    <p><?php echo htmlspecialchars($answer); ?></p>
                </div>

                <div class="meta-info">
                    <span><strong>Date:</strong> <?php echo htmlspecialchars($date); ?></span>
                    <span><strong>Author:</strong> <?php echo htmlspecialchars($author); ?></span>
                </div>
            </div>

            <?php
                }
            } else {
                echo "<p>No FAQs available.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
include_once('footer.php');
?>
