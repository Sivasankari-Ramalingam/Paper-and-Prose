<?php
session_start();
include 'admin_header.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'dbconn.php'; 
// Fetch data for summary cards
$totalBooks = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM books"))['count'];
$totalOrders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM orders"))['count'];
$totalUsers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM customers"))['count'];
$outOfStock = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM books WHERE stock_quantity = 0"))['count'];
$revenue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_amount) AS sum FROM orders"))['sum'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">
   
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">Admin Dashboard</h1>

    <!-- Summary Cards -->
    <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                            <h5 class="card-title">Total Books: </h5> <p class="card-text"> <?= $totalBooks ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                        <p class="card-text"><?= $totalOrders ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Total Customers</h5>
                        <p class="card-text"><?= $totalUsers ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">Out of Stock</h5>
                        <p class="card-text"><?= $outOfStock ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Revenue</h5>
                        <p class="card-text">$<?= number_format($revenue, 2) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <h2 class="mb-4">Reports</h2>
        <div class="row">
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="manage_books.php" class="btn btn-outline-primary btn-block">Books</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="manage_users.php" class="btn btn-outline-success btn-block">Customers</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="manage_orders.php" class="btn btn-outline-danger btn-block">Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>