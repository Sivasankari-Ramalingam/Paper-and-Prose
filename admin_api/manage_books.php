<?php
session_start();
include 'dbconn.php';
include 'admin_header.php';

$result = mysqli_query($conn, "SELECT * FROM books");




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Manage Books</h2>

        <!-- Add New Book Button -->
        <div class="text-right mb-4">
            <a href="add_book.php" class="btn btn-success">Add New Book</a>
        </div>

        <!-- Books Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Publish Date</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['book_id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['publish_date'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['stock_quantity'] ?></td>
                            
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
