<?php
include 'dbconn.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $stmt = $conn->prepare("SELECT username FROM customers_login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    echo $stmt->num_rows > 0 ? 'taken' : 'available';
}
?>
