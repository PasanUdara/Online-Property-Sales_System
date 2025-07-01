<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Offers</title>
    <link rel="stylesheet" href="style/insert.css">
</head>
<body>
    <h1>Property Offers</h1>

    <!-- Create Offer Form -->
    <div class="form">
        <form id="offerForm" method="POST" action="add_offers.inc.php">
            <input type="hidden" id="offerId" name="offerId">

            <label for="property_name">Property Name:</label>
            <input type="text" id="propertyName" name="propertyName" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>

            <label for="pDescription">Description:</label>
            <textarea id="pDescription" name="pDescription" required></textarea>

            <button type="submit" id="submitButton">Add Offer</button>
        </form>
    </div>
    <script src="insert.js"></script>
</body>
</html>