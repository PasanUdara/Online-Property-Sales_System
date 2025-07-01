<?php
  //Include Db Connection 
  require_once 'connection.php'; 

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id=$_POST['id']; // Ensure you have the id field in the form
    $propertyName=$_POST["propertyName"];
    $price=$_POST["price"];
    $pDescription=$_POST["pDescription"];

    //update data in the database
    $sql ="UPDATE offers SET propertyName = '$propertyName', price = '$price', pDescription = '$pDescription'
    WHERE id='$id'";

    //check if update was successful
    if($conn->query($sql)===TRUE){
        echo"<script>alert('offer Details updated successfully');</script>";
        echo "<script>window.location.href='Display.php';</script>";
        exit(); 
    }else{
        echo"Details Updated Failded:".$conn->error;
    }
}
    //close connection
    $conn->close();
?>