<?php
include 'config.php';




if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE `property_cart_db` SET name='$name', price='$price', quantity='$quantity' WHERE id=$id"; 


    $result = mysqli_query($conn,$sql);

    if ($result) {
        //echo "Data inserted successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style/shopping_cart.css">
</head>
<body>
<header> <?php
    include "header.php";
    ?>
</header>
    <h1>Shopping Cart</h1>

    <div class="cart-container">
        <h2>Cart Items</h2>
        <div id="cart-items"></div>
        <p><strong>Total: $<span id="total-price">0.00</span></strong></p>
        <button onclick="checkout()">Checkout</button>
    </div>

    <h2>Add Property</h2>
    <div class="add-property">
        
        <form method="POST" action="">
            <input type="text" id="property-name" placeholder="Property Name" name="name" required>
            <input type="number" id="property-price" placeholder="Property Price" name="price" required>
            <input type="number" id="property-quantity" placeholder="Quantity" name="quantity" required>
            
            <button><a href="update.php?updateid=<?php echo $id; ?>">Update</a></button>
        </form>
    </div>


    <script>
        let cart = [];

        
        function updateCart() {
            let cartItems = document.getElementById('cart-items');
            cartItems.innerHTML = ''; 
            let total = 0; // 

            cart.forEach((item, index) => {
                cartItems.innerHTML += `<div>
                    ${item.name} - $${item.price} x 
                    <input type="number" value="${item.quantity}" onchange="updateQuantity(${index}, this.value)">
                    <button onclick="removeProperty(${index})">Remove</button>
                </div>`;
                total += item.price * item.quantity; 
            });

            document.getElementById('total-price').innerText = total.toFixed(2); 
        }

      
        function removeProperty(index) {
            cart.splice(index, 1); 
            updateCart(); 
        }

        
        function updateQuantity(index, quantity) {
            cart[index].quantity = parseInt(quantity); 
            updateCart(); 
        }

        
        function checkout() {
            alert('Total: $' + document.getElementById('total-price').innerText);
        }

        
        function addToCart(name, price, quantity) {
            cart.push({ name: name, price: parseFloat(price), quantity: parseInt(quantity) });
            updateCart();
        }

        
        addToCart("Sample Property", 50, 2); 
    </script>

</body>

<footer> <?php  include "footer.php"; ?>
</footer>
</html>
