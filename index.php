<?php include './includes/header.php'; ?>
    <!-- slider start  -->

    <?php include './database/db_connect.php';
      $result = $conn->query("SELECT * FROM products");
    ?>

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      
      </div>

      <div class="carousel-inner">

        <div class="carousel-item active" data-bs-interval="10000">

          <img src="././images/banner 9.jpg" class="d-block w-100 img" >

          <div class="carousel-caption d-sm-block d-md-block scroll">
            <h5>Our Products</h5>
            <p>Shop our best products.</p>
            <button type="button" class="btn btn-success">Shop Now</button>
          </div>

        </div>

        
        <div class="carousel-item">
          <img src="././images/banner 9.jpg" class="d-block w-100 img" >

          <div class="carousel-caption d-sm-block d-md-block scroll">
            <h5 class="h5">Our Products</h5>
            <p>Shop our best products.</p>
            <button type="button" class="btn btn-success">Shop Now</button>
          </div>

        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- slider end  -->

    <!-- product section start  -->

    <h1 class="h1">Our products</h1>
    <hr>
    <div class="container-fluid">
  
    <?php while($row = $result->fetch_assoc()): ?>
      <?php $desc = explode(',' , $row['product_desc']) ?>
      <a style="text-decoration: none; color: black;" href="./product.php?id=<?php echo $row['id']; ?>">
        <div class="card" style="width: 18rem;">
          <img src="<?php echo './admin/' . $row['thumbnail'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['name'] ?></h5>
            <p class="card-text">
                <ul>
                  <?php for($i = 0; $i < count($desc); $i++): ?>
                    <li><?php echo $desc[$i]; ?></li>
                  <?php endfor; ?>
                </ul>
            </p>
            <a href="#" class="btn btn-success">Buy Now</a>
          </div>
        </div>
      </a>
     <?php endwhile; ?>
  </div>

    <!-- product section end  -->

  

 <?php include './includes/footer.php'; ?>