<?php
session_start(); 
if (!isset($_SESSION['customer_id']) && basename($_SERVER['PHP_SELF']) == 'books.php') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookstore</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
    <style>
        
        /* header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #f8f8f8;
            border-bottom: 1px solid #ddd;
        } */

        /* .logo {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        } */

        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            text-decoration: none;
            color: white !important;
            /* font-weight: 500; */
            transition: color 0.3s;
        }

        nav ul li a:hover {
            background-color: #007BFF !important;
        }

        .session-id {
            display: none; 
            font-size: 10px;
            color: gray;
        }
    </style> 
</head>
<body>

<header>
    <!-- <a href="index.php" class="logo"><img src='logo.png' style = 'height:50%; width:50%; text-align:left;'> </a> -->
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
            <img src="images/logo_new.png" alt="logo" style = 'height:30%; width:30%; text-align:left;'>
            </a>     

        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="books.php">Books</a></li>
                    <li class="nav-item"><a href="about.php">About</a></li>
                    <li class="nav-item"><a href="contact.php">Contact</a></li>

                        <?php if (isset($_SESSION['customer_id'])): ?>
                            <span class="nav-link">👋 Welcome, <?php echo htmlspecialchars($_SESSION['customer_name']); ?>!</span>
                            <li class="nav-item"><a href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a href="login.php">Login</a></li>
                        <?php endif; ?>
                   
                        <!-- <li class="nav-item"><a href="cart.php">Cart<span id="cart-count" class="badge bg-danger"><?php echo $cart_count; ?></span></a></li> -->
                        <li class="nav-item"> <a href="cart.php">Cart (<span id="cart-count">0</span>)</a> </li>

                </ul>
            </div>
        </div>
    </nav>
</header>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    
    
        let cartBadge = document.getElementById("cart-count");
        let collections = [];
    
        // let logoutBtn = document.getElementById("logoutBtn");

        if (!cartBadge) {
            console.warn("Cart badge not found on this page.");
            return; 
        }
    
        let cartCount = localStorage.getItem("cartCount") || 0;

        // Update cart count
        if (cartCount === null) {
             localStorage.setItem("cartCount", 0);
            cartCount = 0;
        } else {
        cartCount = parseInt(cartCount);
    }
        
        updateCartCount(cartCount);
    

    

    

    

// if (logoutBtn) {
//         logoutBtn.addEventListener("click", function (e) {
//             e.preventDefault(); // Prevent default link behavior

//             fetch("logout.php", {
//                 method: "POST",
//                 headers: { "Content-Type": "application/json" },
//             })
//             .then(response => response.json())
//             .then(data => {
//                 if (data.status === "success") {
//                     alert(data.message);
//                     window.location.href = "index.php"; // Redirect to homepage
//                 }
//             })
//             .catch(error => console.error("Error:", error));
//         });
//     }
    
// });


    
    });   

//     function updateCartCount(count) {
//         let cartBadge = document.getElementById("cart-count");
//     if (cartBadge) {
//         cartBadge.textContent = count;
//     }
// }

function updateCartCount(count = null) {
    const cartBadge = document.getElementById("cart-count");

    // If not passed, fetch from localStorage
    if (count === null) {
        count = localStorage.getItem("book_cartCount") || 0;
    }

    if (cartBadge) {
        cartBadge.textContent = count;
    }
}
    
</script>
  </body>
  </html>