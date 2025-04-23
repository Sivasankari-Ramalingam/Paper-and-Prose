<?php

include ('dbconn.php');


$sql = "SELECT * from new_books_view";
            
$result = $conn->query($sql);

?>

<?php if ($result->num_rows > 0): ?>
<div id="newBooksCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner">

    <?php
    $first = true;
    while ($row = $result->fetch_assoc()):
    ?>
      <!-- <div class="carousel-item <?= $first ? 'active' : '' ?>">
        <div class="d-flex justify-content-center">
          <div class="card shadow" style="width: 18rem;">
            <img src="<?= $row['book_image'] ?? 'images/hero.jpeg' ?>" class="card-img-top" alt="<?= htmlspecialchars($row['title']) ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
              <p class="card-text"><small class="text-muted">By <?= htmlspecialchars($row['first_name'].' '.$row['last_name']) ?></small></p>
              <p class="card-text"><?= htmlspecialchars(substr($row['books_description'], 0, 100)) ?>...</p>
              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#descModal<?= $row['book_id'] ?>">View More</a>
            </div>
          </div>
        </div>
      </div> -->

      <div class="carousel-item <?= $first ? 'active' : '' ?>">
        <div class="d-flex justify-content-center">
          <div class = "d-flex align-items-center gap-4" data-bs-theme="light" style="background-color: white;">
            <div class="card shadow" style="width: 18rem;">
              <img src="<?= $row['book_image'] ?? 'images/hero.jpeg' ?>" class="card-img-top" alt="<?= htmlspecialchars($row['title']) ?>">
            </div>
            <!-- <div class="col-1 card-body" data-bs-theme="light" style="background-color: white;"> <p> </p> </div> -->
            <div class="card-body"  data-bs-theme="light" style="background-color: white; max-width:18rem;">
              <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
              <p class="card-text"><small class="text-muted">By <?= htmlspecialchars($row['first_name'].' '.$row['last_name']) ?></small></p>
              <p class="card-text"><?= htmlspecialchars(substr($row['books_description'], 0, 100)) ?>...</p>
              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#descModal<?= $row['book_id'] ?>">View More</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal for description -->
      <div class="modal fade" id="descModal<?= $row['book_id'] ?>" tabindex="-1" aria-labelledby="descModalLabel<?= $row['book_id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="descModalLabel<?= $row['book_id'] ?>"><?= htmlspecialchars($row['title']) ?> - Description</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p><?= nl2br(htmlspecialchars($row['books_description'])) ?></p>
            </div>
          </div>
        </div>
      </div>

    <?php
      $first = false;
    endwhile;
    ?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#newBooksCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#newBooksCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
<?php else: ?>
  <div class="alert alert-warning text-center">No new books in the last 30 days.</div>
<?php endif; ?>


