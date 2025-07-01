<?php
   //include connection PHP File
   require_once "config.php";

   if ($_SERVER["REQUEST_METHOD"] == "POST"){
       $propertyName = $_POST["propertyName"];
       $price = $_POST["price"];
       $pDescription = $_POST["pDescription"];

       //insert data into the database
       $sql ="INSERT INTO offers (propertyName,price,pDescription) VALUES('$propertyName','$price','$pDescription')";

       //check if the insert was successful
       if($conn->query($sql)===TRUE){
        echo"<script>alert('Data Added Successfully')</script>";
        echo"<script>window.location.href='Display.php'</script>";
       }
       else{
        echo "Error:" .$sql."<br>".$conn->error;
       }
   }
   //close the connection
   $conn->close();
?>