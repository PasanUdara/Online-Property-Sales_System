<?php
include_once('config.php');
include_once('admin_header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/faq_list.css">
    <script src="js/script.js"></script>
    <title>Ops Solutions</title>
</head>
<body>
    <div class="faq-list-container">
        <h1>Update FAQ</h1>
        <div class="faq-table-container">
            <table border="1">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th> 
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM faq"; 
                    $result = $conn->query($sql);

                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td data-label='Question'>" . $row["question"] . "</td>";
                            echo "<td data-label='Answer'>" . $row["answer"] . "</td>";
                            echo "<td data-label='Actions'>
                                    <a href='update_faq_form.php?id=" . $row["id"] . "'><button class='update-btn'>Update</button></a>
                                    <a href='delete_faq.php?id=" . $row["id"] . "'><button class='delete-btn'>Delete</button></a>
                                  </td>";
                            echo "</tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
include_once 'footer.php';
?>
