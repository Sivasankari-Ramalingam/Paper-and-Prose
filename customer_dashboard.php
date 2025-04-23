<?php 
include('header.php');
// session_start();
$customerId = $_SESSION['customer_id'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Welcome <span id="full-name-title"></span> </h2>

    <!-- Customer Info Section -->
    <div id="customer-info" class="mb-5">
      <h4>Customer Details</h4>
      <div class="card p-3">
        <p><strong>Name:</strong> <span id="full-name"></span></p>
        <p><strong>Phone:</strong> <span id="phone"></span></p>
        <p><strong>Email:</strong> <span id="email"></span></p>
        <p><strong>Address:</strong> <span id="address"></span></p>
      </div>
    </div>

    <!-- Orders Section -->
    <div id="orders">
      <h4>Past Orders</h4>
      <div id="orders-container"></div>
    </div>

    <div class="text-center">
      <a href="books.php" class="btn btn-primary btn-lg">Go to Shopping</a>
    </div>
  </div>
  <p> </p>



  <script>
    async function loadDashboard(customerId) {
      try {
        const customerResponse = await fetch(`get_customer.php?customer_id=${customerId}`);
        const customer = await customerResponse.json();

        document.getElementById('full-name-title').textContent = `${customer.first_name} ${customer.last_name}`;
        document.getElementById('full-name').textContent = `${customer.first_name} ${customer.last_name}`;
        document.getElementById('phone').textContent = customer.phone;
        document.getElementById('email').textContent = customer.email;
        document.getElementById('address').textContent = `${customer.street_address}, Apt ${customer.apt_no}, ${customer.city}, ${customer.province}, ${customer.postal_code}`;

        const ordersResponse = await fetch(`get_orders.php?customer_id=${customerId}`);
        const orders = await ordersResponse.json();
        const ordersContainer = document.getElementById('orders-container');
        ordersContainer.innerHTML = '';

        for (const order of orders) {
          const orderCard = document.createElement('div');
          orderCard.className = 'card mb-3';
          orderCard.innerHTML = `
            <div class="card-header">
              <strong>Order #${order.order_id}</strong> | Date: ${order.order_date} | Status: ${order.order_status}
            </div>
            <div class="card-body">
              <p><strong>Total:</strong> $${order.total_amount}</p>
              <ul id="items-${order.order_id}" class="list-group list-group-flush"></ul>
            </div>
          `;
          ordersContainer.appendChild(orderCard);

          const itemsResponse = await fetch(`get_order_items.php?order_id=${order.order_id}`);
          const items = await itemsResponse.json();
          const itemsList = document.getElementById(`items-${order.order_id}`);
          items.forEach(item => {
            const li = document.createElement('li');
            li.className = 'list-group-item';
            li.textContent = `Book ID: ${item.book_id}, Quantity: ${item.quantity}, Price: $${item.price}`;
            itemsList.appendChild(li);
          });
        }
      } catch (err) {
        console.error(err);
      }
    }

    
    

  const customerId = "<?php echo $customerId; ?>";
  if (customerId) {
    loadDashboard(customerId);
  } else {
    document.body.innerHTML = "<div class='container mt-5'><h3 class='text-danger'>Customer not logged in.</h3></div>";
  }
</script>

<?php include 'footer.php'?>
</body>
</html>
