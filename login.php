<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
      <h3 class="text-center mb-3">Login</h3> 

    <form id="loginform" method="POST" autocomplete = "off">
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" id="username" name="username" class="form-control" required autocomplete = "off">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required autocomplete = "new-password">
    </div>

    <div class="d-grid mb-3">  
        <input type="submit" value="Login">
    </div>
    <div class="text-center">
        <a href = 'register.php'> Create new account </a> </span>
    </div>
    </form> </div> </div>
    <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

    <script>
        document.getElementById("loginform").addEventListener("submit", async function(event) {
            event.preventDefault();

            const email = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            
            fetch("login_user.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json", // Sending JSON data
        },
        body: JSON.stringify({ username: email, password: password }), // Send JSON request
    })
    .then(response => response.json()) // Convert response to JSON
    .then(data => {
        if (data.status === "success") {
            alert("Login successful!");
            window.location.href = "customer_dashboard.php"; 
        } else {
            alert(data.message); 
        }
    })
    .catch(error => console.error("Error:", error));
});
            
    </script>
</body>
</html>
