<?php
include 'dbconn.php';

$customer_id = $_GET['customer_id'] ?? '';
$sql = "SELECT * FROM customers WHERE customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $customer_id);
$stmt->execute();
$result = $stmt->get_result();
echo json_encode($result->fetch_assoc());
?>