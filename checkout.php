<?php

include 'header.php';
include 'dbconn.php';
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['cart_data'])) {
    $cart = json_decode($_POST['cart_data'], true);

   

    function generateNextId($conn, $table, $column, $prefix, $padLength = 3) {
        $query = "SELECT $column FROM $table ORDER BY $column DESC LIMIT 1";
        $result = $conn->query($query);

        if ($result && $row = $result->fetch_assoc()) {
            $lastId = $row[$column];
            $num = (int)substr($lastId, strlen($prefix));
            $newNum = $num + 1;
        } 
        
        else {
            $newNum = 1;
        }

        return $prefix . str_pad($newNum, $padLength, '0', STR_PAD_LEFT);
    }

    $order_id = generateNextId($conn, "orders", "order_id", "O");

    $user_id = $_SESSION['customer_id'];
    $total_price = 0;
    $order_status = 'ordered';
    $order_date = date("Y-m-d");

    foreach ($cart as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }
    
    
    
    $stmt = $conn->prepare("INSERT INTO orders (order_id, customer_id, order_date, order_status, total_amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $order_id, $user_id, $order_date, $order_status, $total_price);
    $stmt->execute();

    $stmtStock = $conn->prepare("UPDATE books SET stock_quantity = stock_quantity - ? WHERE book_id = ?");
    
    foreach ($cart as $item) {
    
    $stmtStock->bind_param("is", $item['quantity'], $item['book_id']);
    
    $stmtStock->execute();
    }
    // $order_id = $stmt->insert_id;
    $stmt->close();
    $stmtStock->close();

    
    $stmtItem = $conn->prepare("INSERT INTO orderitems (order_item_id, order_id, book_id, quantity, price) VALUES (?, ?, ?, ?, ?)");
    foreach ($cart as $item) {
        $order_item_id = generateNextId($conn, "orderitems", "order_item_id", "OI");
        $stmtItem->bind_param("sssid", $order_item_id, $order_id, $item['book_id'], $item['quantity'], $item['price']);
        $stmtItem->execute();
    }
    $stmtItem->close();

    
    echo "<div class='container mt-5'>";
echo "<div class='text-center mb-4'>";
echo "<h2 class='text-success'>Thank you for your order!</h2>";
echo "<p class='text-muted'><strong>Order ID:</strong> $order_id</p>";
echo "<p><strong>Order Date:</strong> " . date("Y-m-d H:i:s") . "</p>";
echo "</div>";


echo "<div class='card'>";
echo "<div class='card-header bg-primary text-white'>";
echo "<h4 class='mb-0'>🧾 Receipt</h4>";
echo "</div>";

echo "<div class='table-responsive'>";
echo "<table class='table table-striped table-bordered align-middle' border='1' cellpadding='10' cellspacing='0'>
    <thead class='table-dark'>
        <tr>
            <th>Book Title</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>";

foreach ($cart as $item) {
    $item_price = number_format($item['price'], 2);
    $subtotal = number_format($item['price'] * $item['quantity'], 2);
    echo "<tr>
            <td>{$item['title']}</td>
            <td>{$item['quantity']}</td>
            <td>\${$item_price}</td>
            <td>\${$subtotal}</td>
        </tr>";
}



$tax = $total_price * 0.10;
$grand_total = $total_price + $tax;

echo "</tbody></table> </div>
        <div class='text-end mt-3'>
      <p><strong>Subtotal:</strong> \$" . number_format($total_price, 2) . "</p>
      <p><strong>Tax (10%):</strong> \$" . number_format($tax, 2) . "</p>
      <p><strong>Total:</strong> \$" . number_format($grand_total, 2) . "</p> </div>";

      echo "</div>"; // card-body
      echo "</div>"; // card
      echo "</div>"; // container  

echo "<p style='margin-top:20px;'>Thank you for shopping with us! 🙏</p>";


    echo "<script>localStorage.removeItem('book_cart'); localStorage.removeItem('book_cartCount');</script>";
} else {
    echo "<p>Cart is empty or request is invalid.</p>";
}
?>
