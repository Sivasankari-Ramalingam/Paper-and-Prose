<?php
session_start();
include 'dbconn.php';
include 'admin_header.php';

$result = mysqli_query($conn, "SELECT * FROM books ORDER BY stock ASC");
?>

<h2>Inventory</h2>
<table>
    <tr><th>Book</th><th>Stock</th><th>Status</th></tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['title'] ?></td>
            <td><?= $row['stock'] ?></td>
            <td><?= $row['stock'] == 0 ? 'Out of Stock' : 'In Stock' ?></td>
        </tr>
    <?php endwhile; ?>
</table>
