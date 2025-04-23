<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bookstore</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    
    <!-- hero section -->

    <section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Where every story begins</h1>
                <p>Explore. Experience. Expand.</p>
                <a href="books.php" class="btn btn-primary">Shop Now</a>
            </div>
        </div>
    </div>
</section> 

<section class="new-arrivals">
    <div class = "container">
        <div class = "row">
            <h1> New books </h1>
        </div>  
        <div class = "new-books">
            <?php include 'get_new_books.php' ?>
        </div>
    </div>
    
</section>

<section class="deals-section py-5 bg-light">
    <?php include 'get_deals.php' ?>
</section>

<!-- TESTIMONIAL SECTION -->

<section style="color: #000; background-color: #212529;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-xl-8 text-center" style="color:white";>
        <h3 class="fw-bold mb-4">Testimonials</h3>
        <p class="mb-4 pb-2 mb-md-5 pb-md-0">
          Real Reviews from Real Readers!
        </p>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="card">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="images/person1.jpeg"
                class="rounded-circle shadow-1-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Teresa May</h5>
            <h6 class="font-weight-bold my-3">Founder at ET Company</h6>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <!-- <i class="bi bi-star-fill" style="color: blue;"></i> -->


            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>Finally, a bookstore that has a wide range of genres and affordable prices! From bestsellers to classics, they’ve got everything. I’ve already recommended it to all my book-loving friends.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="card">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="images/person2.jpeg"
                class="rounded-circle shadow-1-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Maggie McLoan</h5>
            <h6 class="font-weight-bold my-3">Photographer at Studio LA</h6>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>I ordered three books and received them earlier than expected, all in perfect condition. The packaging was neat and secure — no dog-eared pages or bent covers. I’m impressed!
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-0">
        <div class="card">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="images/person3.jpeg"
                class="rounded-circle shadow-1-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Alexa Horwitz</h5>
            <h6 class="font-weight-bold my-3">Front-end Developer in NY</h6>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-fill" style="color: blue;"></i>
            <i class="bi bi-star-half" style="color: blue;"></i>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>I love how this store offers everything from academic books to fiction and even rare finds. Plus, the prices are better than most other sites I’ve used. I’ll definitely be shopping here again.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <?php include 'footer.php'?>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
