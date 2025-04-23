<?php
session_start();
include 'dbconn.php'; 
include 'admin_header.php';


if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Fetch admin from the database
    $query = "SELECT * FROM admins WHERE username = '$username' and password = '$password';";
    $result = mysqli_query($conn, $query);

    // Check if the admin exists
    if ($result && mysqli_num_rows($result) === 1) {
        $admin = mysqli_fetch_assoc($result);
            // Start a session for the admin
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin['username'];

            // Redirect to the admin dashboard
            header('Location: admin_dashboard.php');
            exit();
        } else {
            $error = "Invalid password. Please try again.";
        }
    } else {
        $error = "Admin username not found. Please try again.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1>Admin Login</h1>

    <form method="POST" action="admin_login.php" autocomplete = "off">
        <div>
            <label for="username">Admin Username:</label>
            <input type="text" name="username" id="username" required placeholder="Enter username" autocomplete = "off">
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required placeholder="Enter password" autocomplete = "new-password">
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>

    <?php
    // Display error message if any
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>

</body>
</html>
