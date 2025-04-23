<?php
include 'header.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Bookstore</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; }
        .login-container {
            width: 300px;
            margin: 100px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .login-container h2 { text-align: center; margin-bottom: 20px; }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .login-container input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
        }
        .error { color: red; text-align: center; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <?php if (isset($_GET['error'])): ?>
        <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
    <form action="login_user.php" method="post">
        <input type="text" name="username" placeholder="Username or Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
