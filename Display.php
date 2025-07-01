<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/display.css">
</head>
<body>
    <h1>Offers data display page</h1>
    <!-- Offers Table -->
    <div class="offers-list">
        <table border='1'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Property Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="offersTableBody">
                <!-- Dynamic content goes here -->
                 <?php include 'display.inc.php';?>
            </tbody>
        </table>
    </div>
    <script src="insert.js"></script>

</body>
</html>