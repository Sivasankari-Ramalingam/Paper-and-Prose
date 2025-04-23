<?php
session_start();
include 'dbconn.php';

// $result = mysqli_query($conn, "SELECT * FROM books");




    $book_id = $_GET['delete'];  // Get the book_id from the URL

    // Perform deletion query
    $query = "DELETE FROM books WHERE book_id = '$book_id'";
    if ($conn->query($query)) {
        echo "Book successfully deleted.";
        // Redirect to the manage_books.php page after successful deletion
        header("Location: manage_books.php");
        exit();
    } else {
        echo "Error deleting book: " . $conn->error;
    }

?>