
    <?php include './includes/header.php'; ?>


    <?php 

        include './database/db_connect.php';
        $id = $_GET['id'];

        $result = $conn->query("SELECT * FROM products WHERE id = $id");
        $product = $result->fetch_assoc();
        $desc = explode(',' , $product['product_desc']);
        $pictures = explode(',' , $product['pictures']);
    ?>

  <!-- product detail start  -->

   <div class="container-fluid detail">

    <div class="left col-lg-4 ">
        <img width="500px" src="<?php echo './admin/' . $product['thumbnail'] ?>">
    </div>
    <div class="right col-lg-6 col-sm-12 col-md-12">

        <div class="content">
        
            <p class="para"><b> <?php echo $product['name']; ?></b></p>
             
            <p> <span class="p"> <b> Price:</b></span> &nbsp;<span class="price">$<?php echo $product['price'] ?></span></p></p>

            <div class="col-12">
                <ul>
                  <?php for($i = 0; $i < count($desc); $i++): ?>
                    <li><?php echo $desc[$i]; ?></li>
                  <?php endfor; ?>
                </ul>
            </div>

            <div class="row pt-2">
              

                <div class="col-6 pl-5 text-white">

                    <a href="#" style="color:white" ><span style="width:30%;border:1px solid;padding:2% 5%;text-transform: uppercase;font-size:15px;font-weight:600;background-color:rgb(255, 174, 0);border-radius:10px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="ml-2">add to card</span></span></a>
                     <br><br>
                    <a href="#" style="color:white"><span style="width:30%;border:1px solid;padding:2% 5%;text-transform: uppercase;font-size:15px;font-weight:600;background-color:orangered;border-radius:10px;" class="ml-3"><i class="fa fa-bolt" aria-hidden="true"></i><span class="ml-2"> buy now</span></span></a>
                </div>
            </div>

        </div>

    </div>
    <div class="row mt-5 justify-content-between">
        <?php for($i = 0; $i < count($pictures); $i++): ?>
            <div class="col-3">
                <img src="<?php echo 'admin' . $pictures[$i] ?>" width="200px" alt="pic">
            </div>
        <?php endfor; ?>
    </div>
   </div>
  <!-- product detail end  -->

  <?php include './includes/footer.php' ?>