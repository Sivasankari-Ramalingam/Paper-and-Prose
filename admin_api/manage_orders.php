<?php
session_start();
include 'dbconn.php';
include 'admin_header.php';

$result = mysqli_query($conn, "SELECT * FROM orders");
?>

<h2>Manage Orders</h2>

<div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
    <tr><th>Order ID</th><th>User ID</th><th>Order Date</th><th>Order Status</th><th>Total Amount</th></tr> </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['order_id'] ?></td>
            <td><?= $row['customer_id'] ?></td>
            <td><?= $row['order_date'] ?></td>
            <td><?= $row['order_status'] ?></td>
            <td>$<?= $row['total_amount'] ?></td>
            
            
        </tr>
    </tbody>
    <?php endwhile; ?>
</table>
</div>