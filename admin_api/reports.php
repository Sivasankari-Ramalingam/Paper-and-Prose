<?php
session_start();
include 'dbconn.php';

// Sample queries
$topBooks = mysqli_query($conn, "
    SELECT b.title, SUM(oi.quantity) AS sold 
    FROM order_items oi 
    JOIN books b ON oi.book_id = b.id 
    GROUP BY oi.book_id 
    ORDER BY sold DESC LIMIT 5
");

$monthlySales = mysqli_query($conn, "
    SELECT DATE_FORMAT(order_date, '%Y-%m') AS month, SUM(total_amount) AS revenue 
    FROM orders 
    WHERE status = 'Delivered' 
    GROUP BY month
");
?>

<h2>Reports & Analytics</h2>

<h3>Top 5 Bestselling Books</h3>
<table>
    <tr><th>Book</th><th>Sold</th></tr>
    <?php while ($row = mysqli_fetch_assoc($topBooks)): ?>
        <tr><td><?= $row['title'] ?></td><td><?= $row['sold'] ?></td></tr>
    <?php endwhile; ?>
</table>

<h3>Monthly Sales Revenue</h3>
<table>
    <tr><th>Month</th><th>Revenue ($)</th></tr>
    <?php while ($row = mysqli_fetch_assoc($monthlySales)): ?>
        <tr><td><?= $row['month'] ?></td><td><?= $row['revenue'] ?></td></tr>
    <?php endwhile; ?>
</table>
