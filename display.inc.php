<?php
//insert DB Connection
require_once 'config.php';

//Retrieve data from the database
$sql = "SELECT * FROM offers";
$result= $conn->query($sql);

if($result->num_rows> 0){
    while($row = $result -> fetch_assoc()){
        echo"<tr>";
        echo"<td>" .$row["id"] . "</td>";
        echo"<td>" .$row["propertyName"] . "</td>";
        echo"<td>" .$row["price"] . "</td>";
        echo"<td>" .$row["pDescription"] . "</td>";
        echo"<td>";
        echo"<button onClick=\"redirectToUpdateForm(".$row["id"].")\">Update</button>";
        echo"<a href=\"delete_offer.php?delete_id=".$row["id"]."\">Delete</a>";
        echo"</td>";
        echo"</tr>";
   }
}
 else{
    echo"No data available";
 }
 $conn->close();
?>