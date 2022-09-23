<?php include './includes/header.php'; ?>
<?php include './database/insert_user.php'; ?>

    <!-- Form Start  -->

    
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
 <h1 class="h">Sign Up</h1>

        <p class="text-danger mt-5"><?php echo $error ?? ""; ?></p>
        <p class="text-success mt-5"><?php echo $succ ?? ""; ?></p>
        <div class="mb-2">
            <label for="name" class="form-label"></label>
            <input type="text" name="name" value="<?php echo $name ?? ""; ?>" class="form-control" id="name" placeholder="Enter Your Name">
        </div>

        <div class="mb-2">
          <label for="email" class="form-label"></label>
          <input type="email" value="<?php echo $email ?? ""; ?>" class="form-control" name="email" id="email" placeholder="Enter Your Email">
        </div>

        <div class="mb-2">
            <label for="phone" class="form-label"></label>
            <input type="text" value="<?php echo $phone ?? ""; ?>" name="phone" class="form-control" id="phone" placeholder="Enter Your Phone Number">
        </div>

        <div class="mb-2">
            <label for="address" class="form-label"></label>
            <textarea name="address" id="address" class="form-control" cols="30" rows="3" placeholder="Enter Your Address"><?php echo $address ?? ""; ?></textarea>
        </div>

        <div class="mb-2">
          <label for="pass" class="form-label"></label>
          <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter Your Password">
        </div>

        <div class="mb-2">
            <label for="cpass" class="form-label"></label>
            <input type="password" name="cpass" class="form-control" id="cpass" placeholder="Enter Your Confirm Password">
          </div>
      
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>

     <!-- Form end  -->

    <?php include './includes/footer.php' ?>