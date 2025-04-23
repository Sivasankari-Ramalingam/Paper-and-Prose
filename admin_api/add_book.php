<?php
// Assuming you already have a connection to your database ($dbc)
include 'dbconn.php';
include 'admin_header.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author_first_name = mysqli_real_escape_string($conn, $_POST['a-fname']);
    $author_last_name = mysqli_real_escape_string($conn, $_POST['a-lname']);
    $author_nationality = mysqli_real_escape_string($conn, $_POST['a-nationality']);
    $genre = mysqli_real_escape_string($conn, $_POST['a-genre']);
    $publish_date = mysqli_real_escape_string($conn, $_POST['publish_date']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $book_image = mysqli_real_escape_string($conn, $_POST['book_image']);
    $book_desc = mysqli_real_escape_string($conn, $_POST['book_desc']);

    // Retrieve the last book_id (the one with the highest number in the VARCHAR format)
    $query = "SELECT book_id FROM books ORDER BY book_id DESC LIMIT 1";
    $result = $conn-> query($query);
    $row = $result->fetch_assoc();

    // Assume the book_id follows the pattern 'BOOK001', 'BOOK002', etc.
    $lastBookId = $row['book_id'];
    $prefix = substr($lastBookId, 0, 1);  // For example, 'BOOK'
    $number = substr($lastBookId, 1);     // For example, '001'

    // Increment the number part (ensure it's 3 digits)
    $newNumber = str_pad((int)$number + 1, 3, '0', STR_PAD_LEFT);
    $newBookId = $prefix . $newNumber;    // New book_id will be something like 'BOOK002'

    $query = "INSERT INTO books (book_id, title, publish_date, price, stock_quantity, book_image) 
              VALUES ('$newBookId', '$title', '$publish_date', $price, $stock, '$book_image')";
    $result = $conn->query($query);


    $query = "SELECT author_id FROM authors WHERE first_name = '$author_first_name' AND last_name = '$author_last_name' LIMIT 1";
    $result = $conn->query($query);
    $authorExists = $result->fetch_assoc();


    // Insert new book into books table
    


    if ($authorExists) {
        // If author exists, get the existing author_id
        $author_id = $authorExists['author_id'];
    } else {
        // If author does not exist, generate a new author_id
        // Assuming author_id follows a pattern like AUTHOR001, AUTHOR002, etc.
        $query = "SELECT author_id FROM authors ORDER BY author_id DESC LIMIT 1";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();

        // Generate new author_id based on the highest value
        $lastAuthorId = $row['author_id'];
        $prefix = substr($lastAuthorId, 0, 1);  // For example, 'AUTHOR'
        $number = substr($lastAuthorId, 1);     // For example, '001'

        // Increment the number part (ensure it's 3 digits)
        $newNumber = str_pad((int)$number + 1, 3, '0', STR_PAD_LEFT);
        $author_id = $prefix . $newNumber;  // New author_id will be something like 'AUTHOR002'

        // Insert new author into the authors table
        $query_author = "INSERT INTO authors (author_id, first_name, last_name, nationality, genre) 
                  VALUES ('$author_id', '$author_first_name', '$author_last_name', '$author_nationality', '$genre')";
        $result = $conn->query($query_author);
    }
    $query_book_author = "INSERT INTO book_authors (book_id, author_id) 
              VALUES ('$newBookId', '$author_id')";
    $result = $conn->query($query_book_author);

    

        // Redirect to the manage books page after successful insertion
        header("Location: manage_books.php");
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add New Book</h2>

        <!-- Form -->
        <form method="POST" action="add_book.php">
            <div class="form-group">
                <label for="title">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="title">Author - First Name</label>
                <input type="text" class="form-control" id="a-fname" name="a-fname" required>
            </div>
            <div class="form-group">
                <label for="author">Author - Last Name</label>
                <input type="text" class="form-control" id="a-lname" name="a-lname" required>
            </div>
            <div class="form-group">
                <label for="author">Author - Nationality</label>
                <input type="text" class="form-control" id="a-nationality" name="a-nationality" required>
            </div>
            <div class="form-group">
                <label for="author">Book Genre</label>
                <input type="text" class="form-control" id="genre" name="a-genre" required>
            </div>
            <div class="form-group">
                <label for="title">Publish Date</label>
                <input type="text" class="form-control" id="publish_date" name="publish_date" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock Quantity</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="price">Book Image URL</label>
                <input type="text" class="form-control" id="book_image" name="book_image" required>
            </div>
            <div class="form-group">
                <label for="price">Book Description</label>
                <textarea type="text" class="form-control" id="book_desc" name="book_desc" required> </textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block">Add Book</button>
        </form>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-4"><?= $error ?></div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
