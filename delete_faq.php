<?php

include_once('config.php');

if(isset($_GET['id'])){

    $faq_id = $_GET['id'];

    $sql = "DELETE FROM faq WHERE id = '$faq_id'";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
                alert('FAQ deleted.');
                window.location.href='faq_lists.php'; // Redirect to the FAQ list page after alert
              </script>";
    }
    else{
        echo "Account Deleted Failed!";
    }
}
else{
    echo "delete id parameter not found";
}

?>

