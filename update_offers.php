<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Property Offer</title>
    <link rel="stylesheet" href="style/update.css">
</head>
<body>
    <div class="update-form-container">
        <h2>Update Property Offer</h2>
        <form action="./update.inc.php" method="post">
            <input type="hidden" name="id" value="1">

            <label for="propertyName">Property Name:</label><br>
            <input type="text" id="propertyName" name="propertyName" ><br>

            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price"><br>

            <label for="pDescription">Description:</label><br>
            <textarea id="pDescription" name="pDescription"></textarea><br>

            <button type="submit">Update</button>
        </form>
    </div>
    <script src="insert.js"></script>
</body>
</html>


