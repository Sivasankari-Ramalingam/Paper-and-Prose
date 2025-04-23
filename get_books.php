<?php

include ('dbconn.php');


$sql = "SELECT 
            b.book_id, 
            b.title, 
            b.publish_date, 
            b.price, 
            b.book_image, 
            b.stock_quantity,
            a.first_name, 
            a.last_name, 
            a.nationality
        FROM 
            books b
        JOIN 
            book_authors ba ON b.book_id = ba.book_id
        JOIN 
            authors a ON ba.author_id = a.author_id";
$result = $conn->query($sql);

$books = [];


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = [
            'book_id' => $row['book_id'],
            'title' => $row['title'],
            'publish_date' => $row['publish_date'],
            'price' => $row['price'],
            'book_image' => $row['book_image'],
            'author_first_name' => $row['first_name'],
            'author_last_name' => $row['last_name'],
            'author_nationality' => $row['nationality']
        ];
    }
}


$conn->close();


header('Content-Type: application/json');
echo json_encode($books);
?>
