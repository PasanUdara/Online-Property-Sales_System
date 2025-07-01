<?php
//Include DB Connection 
require_once 'config.php';

//check the delete_id parameter exists in the URL
if (isset($_GET['delete_id'])){
    $deleteId = $_GET['delete_id'];

    $sql = "DELETE FROM offers WHERE id = '$deleteId'";
    if($conn->query($sql)===TRUE){
        echo "<script>alert ('offer deleted');</script>";
        echo "<script> window.location.href = 'display.php'</script>";
    }else{
        echo "Offer Deleted Failed";
    }
}else{
    echo"delete id parameter not found";
}
$conn->close();
?>