<?php
include 'config.php';

?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ops read data</title>
    <link rel="stylesheet" href="style/read_details.css">
</head>
<body>
<header> <?php
    include "header.php";
    ?>
</header>
<div class="container">
<button class="add-cart"><a href="index.php"
class="text-light">add cart</a>
</button>
</div>

<table class="table">
    <thead>
  <tr>
    <th scope="row">id</th>
    <th scope="row">name</th>
    <th scope="row" >price</th>
    <th scope="row">quantity</th>




  </tr>
</thead>
<tbody>
    <?php
$sql="select * from property_cart_db";
$result=mysqli_query($conn,$sql);
if($result){
 
   while( $row=mysqli_fetch_assoc($result)){

    $id=$row['id'];
    $name=$row['name'];
    $price=$row['price'];
    $quantity=$row['quantity'];

    echo ' <tr>
    <th scope="row">'.$id.'</th>
    <td>'.$name.'</td>
    <td>'.$price.'</td>
    <td>'.$quantity.'</td>
    <td>
    <button><a href="update_cart.php?id=' . $id . '">Update</a></button>
    <button><a href="delete_cart.php?deleteid=' . $id . '">Delete</a></button>
</td>
    </tr>';

   }


}




    ?>

 

</body>

<footer> <?php  include "footer.php"; ?>
</footer>
</html>