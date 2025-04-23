<?php
session_start();
include('dbconn.php');
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
// include('header.php');

$data = json_decode(file_get_contents("php://input"), true);
if (isset($data['username']) && isset($data['password'])) {
    $username = trim($data['username']);
    $password = trim($data['password']);

    // Query to get customer details from customers_login
    $query = $conn->prepare("SELECT customers.customer_id, customers.first_name FROM customers_login 
              INNER JOIN customers ON customers_login.customer_id = customers.customer_id
              WHERE username = ? AND pwd = ?");
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $query->store_result();
    
    // $result = $conn->query($query);

    // $stmt = $pdo->prepare($query);
    // $stmt->execute(['username' => $username, 'password' => $password]);
    // $stmt = $conn->prepare("SELECT username FROM customers_login WHERE username = ?");
    // $stmt->bind_param("s", $username);
    // $stmt->execute();

    
    if ($query->num_rows>0) {
        $query->bind_result($customer_id, $first_name);
        $query->fetch();
        // $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $_SESSION['customer_id'] = $customer_id;
        $_SESSION['customer_name'] = $first_name;
        echo json_encode(["status" => "success", "message" => "Login successful"]);
        // header('Location: index.php'); // Redirect to a dashboard or homepage
        // exit();
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
        // $error = "Invalid username or password.";
    }
    $query->close();
}
?>