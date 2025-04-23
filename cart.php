<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <?php include 'header.php'; 
    
    ?>
    <!-- <style>
        .cart-item { border-bottom: 1px solid #ccc; padding: 10px 0; display: flex; justify-content: space-between; align-items: center; }
        .controls button { margin: 0 5px; }
        .cart-summary { margin-top: 20px; font-weight: bold; }
    </style> -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Your Cart</h1>
<div id="cart-container"></div>
<div class="cart-summary" id="cart-summary"></div>

<form action="checkout.php" method="POST" id="checkout-form">
    <input type="hidden" name="cart_data" id="cart-data">
    <button class="btn btn-primary" type="submit" id="checkout">Proceed to Checkout</button>
</form>

<script>
function saveCart(cart) {
    localStorage.setItem("book_cart", JSON.stringify(cart));
    const totalItems = cart.reduce((acc, item) => acc + item.quantity, 0);
    localStorage.setItem("book_cartCount", totalItems);
    if (typeof updateCartCount === "function") updateCartCount(totalItems);
}

function displayCart() {
    const cart = JSON.parse(localStorage.getItem("book_cart")) || [];
    const cartContainer = document.getElementById("cart-container");
    const cartSummary = document.getElementById("cart-summary");
    const cartDataInput = document.getElementById("cart-data");

    cartContainer.innerHTML = '';
    let subtotal = 0;

    if (cart.length === 0) {
        cartContainer.innerHTML = "<p>Your cart is empty.</p>";
        cartSummary.innerHTML = '';
        return;
    }

    cart.forEach((item, index) => {
        const itemSubtotal = item.price * item.quantity;
        subtotal += itemSubtotal;

        const div = document.createElement("div");
        // div.classList.add("cart-item");
        div.classList.add("card", "mb-3");
        div.innerHTML = `
            <div class="card-body">
                <h3 class="card-title">${item.title}</h3>
                <p class="card-text">Price: $${Number(item.price).toFixed(2)}</p>
                <div class="controls d-flex align-items-center mb-2 gap-2 flex-wrap">
                    <button class = "btn btn-outline-secondary btn-sm" onclick="changeQuantity(${index}, -1)">-</button>
                    Quantity: ${item.quantity}
                    <button class = "btn btn-outline-secondary btn-sm" onclick="changeQuantity(${index}, 1)">+</button>
                    <button class="btn btn-outline-danger btn-sm" onclick="removeItem(${index})" style="color:red;">Remove</button>
                </div>
                <p>Subtotal: $${itemSubtotal.toFixed(2)}</p>
            </div>
        `;
        cartContainer.appendChild(div);
    });

    const taxRate = 0.10;
    const tax = subtotal * taxRate;
    const total = subtotal + tax;

    cartSummary.innerHTML = `
        Subtotal: $${subtotal.toFixed(2)}<br>
        Tax (10%): $${tax.toFixed(2)}<br>
        <strong>Total: $${total.toFixed(2)}</strong>
    `;

    cartDataInput.value = JSON.stringify(cart);
}

function changeQuantity(index, delta) {
    let cart = JSON.parse(localStorage.getItem("book_cart")) || [];
    cart[index].quantity += delta;
    if (cart[index].quantity <= 0) {
        cart.splice(index, 1); 
    }
    saveCart(cart);
    displayCart();
}

function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem("book_cart")) || [];
    cart.splice(index, 1);
    saveCart(cart);
    displayCart();
}

function checkLogin(){
    if (!isLoggedIn) {
        alert("Please log in to add items to your cart.");
        window.location.href = 'login.php'; 
        return;
      }
}

document.addEventListener("DOMContentLoaded", () => {
    
    displayCart();
    // document.getElementById("checkout").addEventListener("click", checkLogin());
});
</script>

</body>
</html>
