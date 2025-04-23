<?php
include 'dbconn.php';

$customer_id = $_GET['customer_id'] ?? '';
$sql = "SELECT * FROM orders WHERE customer_id = ? ORDER BY order_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $customer_id);
$stmt->execute();
$result = $stmt->get_result();
$orders = [];
while ($row = $result->fetch_assoc()) {
  $orders[] = $row;
}
echo json_encode($orders);
?>