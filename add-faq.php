<?php
include_once('config.php');

$question = $_POST['question'];
$answer = $_POST['answer'];
$date = $_POST['date'];
$author = $_POST['author'];

$sql = "INSERT INTO faq (question, answer, date, author) VALUES('$question', '$answer', '$date', '$author')";

if($conn->query($sql)){
    echo "<script>
                alert('FAQ updated successfully.');
                window.location.href='FAQ_form.php';
              </script>";
}
else{
    echo "Error $sql. "
    .mysqli_error($conn);
}

$conn->close();