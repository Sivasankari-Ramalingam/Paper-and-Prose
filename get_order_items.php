<?php
include 'dbconn.php';

$order_id = $_GET['order_id'] ?? '';
$sql = "SELECT * FROM orderitems WHERE order_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$items = [];
while ($row = $result->fetch_assoc()) {
  $items[] = $row;
}
echo json_encode($items);
?>
