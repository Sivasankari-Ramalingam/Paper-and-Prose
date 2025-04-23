<?php
session_start();
include 'dbconn.php';
include 'admin_header.php';
$result = mysqli_query($conn, "SELECT * FROM customers");
?>

<h2>Manage Users</h2>

<div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    
    <tr><th>Customer ID</th><th>First Name</th><th>Last Name</th><th>Contact</th><th>Email</th><th>Address</th></tr> </thead> 
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        
                 <tr>
            <td><?= $row['customer_id'] ?></td>
            <td><?= $row['first_name'] ?></td>
            <td><?= $row['last_name'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['street_address'].' '.$row['apt_no'].' '.$row['city'].' '.$row['province'].' '.$row['postal_code'] ?></td>
        </tr> </tbody>
    <?php endwhile; ?>
</table>

</div>
