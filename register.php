<?php
include 'dbconn.php'; 
include 'header.php';

$errors = [];
$success = "";



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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $customer_id = generateNextId($conn, "customers", "customer_id", "C");
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $street_address = $_POST['street_address'];
    $apt_no = $_POST['apt_no'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal_code'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    // Username uniqueness check
    $stmt = $conn->prepare("SELECT username FROM customers_login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $errors[] = "Username already exists. Please choose another.";
    } else {
        // Begin transaction
        $conn->begin_transaction();

        try {
            // Insert into customers
            $stmt1 = $conn->prepare("INSERT INTO customers (customer_id, first_name, last_name, phone, email, street_address, apt_no, city, province, postal_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt1->bind_param("ssssssssss", $customer_id, $first_name, $last_name, $phone, $email, $street_address, $apt_no, $city, $province, $postal_code);
            $stmt1->execute();

            // Insert into customers_login
            $stmt2 = $conn->prepare("INSERT INTO customers_login (customer_id, username, pwd) VALUES (?, ?, ?)");
            $stmt2->bind_param("sss", $customer_id, $username, $pwd);
            $stmt2->execute();

            $conn->commit();
            $success = "Registration successful!";
        } catch (Exception $e) {
            $conn->rollback();
            $errors[] = "Registration failed: " . $e->getMessage();
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <h2 class="mb-4 text-center">Register New Customer</h2>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $e) echo "<li>$e</li>"; ?>
                </ul>
            </div>
        <?php elseif ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <form method="POST" action="" id="registrationForm" novalidate autocomplete = "off">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">First Name *</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Street Address *</label>
                    <input type="text" name="street_address" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Apt No *</label>
                    <input type="text" name="apt_no" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">City *</label>
                    <input type="text" name="city" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Province *</label>
                    <input type="text" name="province" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Postal Code *</label>
                    <input type="text" name="postal_code" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Username *</label>
                    <input type="text" name="username" class="form-control" required autocomplete = "off">
                    <div id="usernameFeedback" class="form-text"></div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Password *</label>
                    <input type="password" name="pwd" class="form-control" required minlength="6" autocomplete = "new-password">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-3">Register</button>
                </div>
            </div>
        </form>
    </div>

<script>
        
document.getElementById('username').addEventListener('input', function() {
    const username = this.value;
    const feedback = document.getElementById('usernameFeedback');

    if (username.length < 3) {
        feedback.textContent = "Username must be at least 3 characters.";
        feedback.style.color = "orange";
        return;
    }

    // Send AJAX request
    fetch('check_username.php', {
        method: 'POST',
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "username=" + encodeURIComponent(username)
    })
    .then(res => res.text())
    .then(response => {
        if (response === 'taken') {
            feedback.textContent = "Username is already taken ❌";
            feedback.style.color = "red";
        } else {
            feedback.textContent = "Username is available ✅";
            feedback.style.color = "green";
        }
    })
    .catch(() => {
        feedback.textContent = "Error checking username.";
        feedback.style.color = "red";
    });
});


        // Bootstrap frontend validation
        const form = document.getElementById('registrationForm');
        form.addEventListener('submit', function (e) {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    </script>
</body>
</html>
