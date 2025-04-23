<?php

include ('dbconn.php');

$sql = "SELECT d.discounted_price, b.*
        FROM deals d
        JOIN books b ON d.book_id = b.book_id";
       

$result = $conn->query($sql);
?>

<div class="container">
  <h2 class="text-center mb-4 text-danger">🔥 Upcoming Deals & Discounts</h2>
  <div class="deals-grid row row-cols-1 row-cols-md-3 g-4">
    <?php while($row = $result->fetch_assoc()): ?>
    <div class="col">
      <div class="card h-100 shadow deal-card position-relative">
      <img src="<?= $row['book_image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($row['title']) ?>">
            <div class="card-body text-center">
              <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
              <p class="card-text mb-1">
                <span class="text-muted text-decoration-line-through">$<?= number_format($row['price'], 2) ?></span>
                <span class="fw-bold text-success ms-2">$<?= number_format($row['discounted_price'], 2) ?></span>
              </p>
              <!-- <button type="button" class="btn btn-info" onclick="addToCart(<?= $row['book_id'] ?>)">Add to Cart</button> -->
              <?php $rowJson = htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8'); ?>
              <!-- <button type="button" class="btn btn-info" onclick="addToCart(<?//= "'" . $rowJson . "'" ?>)">Add to Cart</button> TO BE CORRECTED -->

            </div>
            <?php
            $discount = round((1 - $row['discounted_price'] / $row['price']) * 100);
            ?>
            <div class="discount-badge"><?= $discount ?>% OFF</div>

        
      </div>
    </div>
    <?php endwhile; ?>
  </div>

</div>
<?php $conn->close(); ?>