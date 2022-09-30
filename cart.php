
    <?php include './includes/header.php'; ?>


    <?php
        include './database/db_connect.php';
    ?>



  <!-- product detail start  -->

    <div class="container-fluid detail">
        <div class="card">
            <div class="card-body">
            <div class="row">
            <?php 
            $cart = json_decode($_COOKIE["cart"]);
            foreach ($cart as $c) { 
                $result = $conn->query("SELECT price FROM products WHERE id = $c->id");
                $row = $result->fetch_assoc();
                ?>
                <div class="col-md-5"> 
                    <?php echo $c->name . "<br>" . $row['price']; ?>
                </div>
                <div class="col-md-5"> 
                    <form action="./database/update-cart.php" method="POST">
                        <input type="number" class="" name="quantity" id="quantity" value="<?php echo $c->quantity; ?>">
                        <input type="hidden" name="id" value="<?php echo $c->id; ?>">
                        <input type="submit" value="Update" class="btn btn-warning btn-sm" name="submit">
                    </form>    
                </div>
                <div class="col-md-2">
                    <form action="./database/delete-cart.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $c->id; ?>">
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm" name="submit">
                    </form>
                </div>
             <?php }
            ?>
        </div>
            </div>
        </div>
    </div>
  <!-- product detail end  -->

  <?php include './includes/footer.php' ?>